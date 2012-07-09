<?php
/**
 * @author Elmor
 * @copyright 2010
 */

/**
 * funtion getRandomStrings - generates the random string of given length case
 * @author Elmor
 * @copyright 2010
 * @param     $length -  length of the random string
 *            $case - upper, lower, both
 * @return string
*/
    function getRandomStrings($length, $case = 'lower')
    {
/* 
create an array of banned latin chars - to similar to cirylic ones
both in lower & upper case
*/
        $ban_chr = array('a', 'b', 'c', 'e', 'o', 'p', 'x', 'l',
                          'A','B','C','E','H','K','M','O','P','T','X' );

// depending on case of string define the range of choise                           
        switch($case)
        {
            case 'both':
                $rand_ch = array_merge(range('A','Z'),range('a','z') );
            break;
            
            case 'upper':
                $rand_ch = range('A','Z');
            break;
            
            case 'lower':
            default:
                $rand_ch = range('a','z');
            break;
        }

// add numbers no 0 - it's similar to capital o - O0
        $rand_ch = array_merge( range(1, 9),$rand_ch  );
        
// delete the banned characters        
        $rand_ch = array_diff($rand_ch, $ban_chr);

//shuffle the array        
        shuffle($rand_ch);
        
// cutting from the array needed length        
        $chars = array_slice($rand_ch, 0, $length);
        
// implode — Join array elements with a string        
        return implode('', $chars);
        
    }


///////////////////////////////////////////////////////////////////////////////////////////////////


$captcha_size = 5;

//starting session    
    session_start();

// get random string
   $string = getRandomStrings($captcha_size, 'lower');

//captcha param hight & width   
   $cap_wid = 108;
   $cap_hig = 25;
   

// pixels at the bottom for the string : press to change   
   $cap_low = 15; 
   
// number of lines in captcha
   $cap_lines = 4;    
    
//build the empty image for captcha    
    $captcha = imagecreatetruecolor( $cap_wid, $cap_hig +$cap_low);
    
// get the random color for the background    
    $bg = imagecolorallocate($captcha, mt_rand(10,50),mt_rand(0,250),mt_rand(0,250));
    
//random color for the text of the captcha
//int mt_rand ( int $min , int $max ) - Generate a better random value
    $font_color = imagecolorallocate( $captcha, mt_rand(220, 255), mt_rand(220, 255),mt_rand(220, 255) );
    
// create black & white images    
    $white = imagecolorallocate($captcha, 255,255,255);
    $black = imagecolorallocate($captcha, 0,0,0);

//Performs a flood fill starting at the given coordinate (top left is 0, 0) with the given color in the image.
// leave bellow the space for the text     
    imagefill($captcha, 0,0, $white);
    imagefilledrectangle($captcha, 0, 0, $cap_wid, $cap_hig, $bg);
    
// scatter the given number of random length lines    
    for( $i = 0; $i < $cap_lines; $i++)
    {
//create the color different for every line        
        $color = imagecolorallocate($captcha, mt_rand(170,255), mt_rand(170,255), mt_rand(170,255) );
        
//draw the line between the random points
        imageline( $captcha,
                   mt_rand(0, $cap_wid - 1),
                   mt_rand(0, $cap_hig - 1),
                   mt_rand(0, $cap_wid - 1),
                   mt_rand(0, $cap_hig - 1),
                   $color
                   );        
    }
    
// write the $string with captcha text to image    
    imagestring($captcha, 5, 33,4,$string, $font_color);
        
    $how_ref = 'Press to change' ;
    
    imagestring($captcha, 3, 2, 26, $how_ref, $black);
    
//save the string in the session    
    $_SESSION['captcha'] = $string;
    
// sending brouser headers, so it knows what to wait !    
    header('Content-Type: image/png');
    
// sending the image to standart output    
   imagepng($captcha);
    
?>
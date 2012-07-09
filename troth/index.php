<?php
/**
 * @author Elmor
 * @copyright 2010
*/

    error_reporting(E_ALL);

/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Establish charset
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
    header("Content-Type: text/html; charset=utf-8;");

/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Seting up the key, that lets us access the files
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    define( 'SITE_KEY', true);

/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Set encoding for mb-> utf
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    
    mb_internal_encoding("UTF-8");
    
    
// start of buffering of the output
    ob_start();    

    
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Connect to the configuration file
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
     include './config.php';
    
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Connect to the file of the language
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    header('Cache-control: private');

    session_start();    
        
    if( !empty($_GET['lang']) )
    {
// get the lang variable from $_get array        
        $lang = htmlspecialchars($_GET['lang']);
        switch($lang)
        {
            case 'ru':
            case 'en':
                $_SESSION['lang'] = $lang;
                setcookie('lang', $lang, time()+(3600*24*30)  );
                break;

            
        }          
// setting the cookie & registering the session        
    }
    elseif( isset($_COOKIE['lang']) )
    {
        $lang = htmlspecialchars($_COOKIE['lang']);
    }    
    else
        $lang = 'ru';
        
/** working with the languages for safetz measures!*/
switch( $lang )
    {
/** 
 * switch on the russian language
*/
        case 'en':
            $lang = 'en';
        break;
        
/**
 * switch on the english language
 * for safety measures in all the rest instances switching the english
*/
        case  'ru':
        default:
            $lang = 'ru';
        break;                        
    }         

    include_once SITE_ROOT. 'language/'. $lang . '.php' ;
        
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 *  variables
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    include SITE_ROOT. './variables.php';
    
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Include general functions
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    include SITE_ROOT. './libs/default.php';
    
    $page = $GET['page'];
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Including the general output... in here, it is date ^)
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    include SITE_ROOT. './libs/view.php';
    
/** ////////////////////////////////////////////////////////////////////////
   * Connect to the mysql functions file
////////////////////////////////////////////////////////////////////////*/ 
    include SITE_ROOT . './libs/mysql.php';
     

/**
 * Switching of pages & so on...
*/

    
    switch( $page )
    {
/** 
 * switching the main module
 */  
        case 'articles':
            include SITE_ROOT. 'modules/articles/router.php';
        break;


         case 'news':
         default:
             include SITE_ROOT . 'modules/news/controller.php';
             break;



    }         


    
// getting the final output & cleaning the buffer    
    $content = ob_get_contents();
    ob_end_clean();    
    


/** /////////////////////////////////////////////////////////////////
 * Gettong the metatags of the page
///////////////////////////////////////////////////////////////// */

    $title = getMeta('title', $page);
    $keywords = getMeta('keywords', $page); 
    $description = getMeta('description', $page);
    
/** ///////////////////////////////////////////////////////////////// 
 * Include the output template
/////////////////////////////////////////////////////////////////  */
    include SITE_ROOT. './skins/tpl/index.tpl';
    
?>
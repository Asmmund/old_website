<?php

 /** ///////////////////////////////////////////////////////////////////////
  * //////////////////////cheking protection key
  * ///////////////////////////////////////////////////////////////////////
 */
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('../404.html') );
    };


/**
 * @author Elmor
 * @copyright 2010
* Replacement function. bb-tags and smilies     
* @param string  
* @return string    
str_ireplace — Case-insensitive version of str_replace(). works with SITE_ROOT constant
*/


    function bbTags( $text )
    {
        $bb = array (
                    '[B]', 
                    '[/B]', 
                    '[I]', 
                    '[/I]', 
                    '[S]', 
                    '[/S]', 
                    '[U]', 
                    '[/U]',
                    '[A]', 
                    '[|]',
                    '[/A]',
 
/** Smiles begin */                    
                    '[OUCH]', 
                    '[SURPRIZED_NO]', 
                    '[:(]', 
                    '[WOHOO]',
                    '[SICK]',
                    '[:D]',
                    '[YES]',
                    '[LOL]',
                    '[SCARED]',
                    "[:((]",
                    '[DONT_KNOW]',
                    '[:=P]',
                    '[WINDOW]',
                    '[HAMMER]'
/** Smiles end */                     
                   );  
                   
/* array of items to be replaced!*/
        $tag = array(
                     '<b>', 
                     '</b>', 
                     '<i>', 
                     '</i>', 
                     '<s>', 
                     '</s>', 
                     '<u>', 
                     '</u>', 
                     "<a  target='_new' href=http://",
                     ">",
                     '</a>',
                     
/** Smiles begin */                       
                     '<img src="/skins/images/smiles/1.gif"  hight=40 width=40/>', // <img src="smailes/1.gif" /> as an example 0 width=60/>', // <img src="smailes/1.gif" /> as an example 
                     '<img src="/skins/images/smiles/2.gif"  hight=40 width=40/>', // <img src="smailes/1.gif" /> as an example  50/>', // <img src="smailes/1.gif" /> as an example  
                     '<img src="/skins/images/smiles/5.gif"  hight=40 width=40/>', 
                     '<img src="/skins/images/smiles/6.gif"  hight=40 width=40/>', 
                     '<img src="/skins/images/smiles/7.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/8.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/9.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/10.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/11.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/14.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/15.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/17.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/18.gif"  hight=40 width=40/>',
                     '<img src="/skins/images/smiles/19.gif"  hight=40 width=40/>'
/** Smiles end */                     
/*  with what to replace items from the first array*/
                       
                ); 
                 
        return str_ireplace($bb, $tag, $text);     
// case INsensetive replacement of items in an array 
        
    }

?>
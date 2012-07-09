<?php
/**
 * @author Elmor
 * @copyright 2010
*/
    //error_reporting(0);
///////////////////////////////////////////////////////////////////////////////////////
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Establish charset
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
    header("Content-Type: text/html; charset=utf-8;");



/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Seting up the key, that lets us access the files
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    define( 'SITE_KEY', true);




/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Debug
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    define('IRB_TRACE', true);
    
// start of buffering of the output
    ob_start();    

/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * remove! on finish!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */ 
    //require './debug.php';
    
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Connect to the configuration file
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
     require 'config.php';
    
    
    
  
    
    
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Connect to the file of the language
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    header('Cache-control: private');

 //   session_register('captcha');
//    session_start();    
        
    if( !empty($_GET['lang']) )
    {
// get the lang variable from $_get array        
        $lang = $_GET['lang'] ;
        
// setting the cookie & registering the session        
        $_SESSION['lang'] = $lang;
        setcookie('lang', $lang, time()+(3600*24*30)  );
    }
    elseif( isset($_COOKIE['lang']) )
    {
        $lang = $_COOKIE['lang'];
    }    
    else
        $lang = 'en';
        
/** working with the languages for safetz measures!*/
switch( $lang )
    {
/** 
 * switch on the russian language
*/
        case 'ru':
            $lang = 'ru';
        break;
        
/**
 * switch on the english language
 * for safety measures in all the rest instances switching the english
*/
        case  'en':
        default:
            $lang = 'en';
        break;                        
    }         

    include_once SITE_ROOT. 'language'.DIRECTORY_SEPARATOR. $lang . '.php' ;
        
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 *  variables
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    require SITE_ROOT. 'variables.php';
    
/** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * require general functions
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    require SITE_ROOT. 'libs'.DIRECTORY_SEPARATOR.'default.php';
    

    
/** ////////////////////////////////////////////////////////////////////////
   * Connect to the mysql functions file
////////////////////////////////////////////////////////////////////////*/ 
    require SITE_ROOT . 'libs'.DIRECTORY_SEPARATOR.'mysql.php';
     
/** ////////////////////////////////////////////////////////////////////////
 * file of menus of dynamic articles ;) 
//////////////////////////////////////////////////////////////////////// */ 
      require SITE_ROOT . 'libs'.DIRECTORY_SEPARATOR.'menus.php';
/**
 * Switching of pages & so on...
*/
    $page = $GET['page'];
    /** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Including the general output... in here, it is date ^)
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    require SITE_ROOT. 'libs'.DIRECTORY_SEPARATOR.'view.php';
    
    switch( $page )
    {
        
/** 
 * switching the module of the guestbook 
*/
        case 'guestbook':
            require SITE_ROOT. 'modules'.DIRECTORY_SEPARATOR.
          'guestbook'.DIRECTORY_SEPARATOR.'router.php';
        break;
/** 
 * switching the main module
 */  

        case 'main':
            require SITE_ROOT. 'modules'.DIRECTORY_SEPARATOR.'main'.
          DIRECTORY_SEPARATOR.'router.php';
        break;


/** 
 * switching the 'important'module
 */
    case 'map':
        require SITE_ROOT . 'modules'.DIRECTORY_SEPARATOR.
      'map'.DIRECTORY_SEPARATOR.'router.php';
    break;

/** 
 * switching the 'important'module
 */  

        case 'important':
            require SITE_ROOT. 'modules'.DIRECTORY_SEPARATOR.
          'important'.DIRECTORY_SEPARATOR.'router.php';
        break;

       
/** 
 * jQuery module
*/
        case 'jquery':
            require SITE_ROOT . 'modules'.DIRECTORY_SEPARATOR.
          'jquery'.DIRECTORY_SEPARATOR.'router.php';
        break;         
        
/**
 * Info module
*/        
        case 'info':
            require SITE_ROOT . 'modules'.DIRECTORY_SEPARATOR.'info'.DIRECTORY_SEPARATOR.'router.php';
        break;          

/**
 * Registering on this webpage
*/
    case 'register':
        require SITE_ROOT . 'modules'.DIRECTORY_SEPARATOR.'register'.DIRECTORY_SEPARATOR.'router.php';
    break;
/**
 * Downloads
*/
    case 'download':
        require SITE_ROOT . 'modules'.DIRECTORY_SEPARATOR.'download'.DIRECTORY_SEPARATOR.'router.php';
    break;

/**
 * require the news module as the default
*/

        case 'news':
        default:
            require SITE_ROOT. 'modules'.DIRECTORY_SEPARATOR.'news'.DIRECTORY_SEPARATOR.'router.php';
        break;                        
    }         


    
// getting the final output & cleaning the buffer    
    $content = ob_get_contents();
    ob_end_clean();    
    
/** /////////////////////////////////////////////////////////////////
 * switching on the menu of languages
///////////////////////////////////////////////////////////////// */     
    ob_start();
        include_once SITE_ROOT. 'skins'.DIRECTORY_SEPARATOR.
          'tpl'.DIRECTORY_SEPARATOR.'language.tpl';
        $language_menu = ob_get_contents();
    ob_end_clean();

/**
 * working with sessions
 */
     if( !isset($_SESSION['user_data']) )
         $enter_exit = '<a href=" ' . href('page=register', 'module=enter' ). '" title="' . TITLE_ENTER . '">' .  ENTER . '</a>';
     else
         $enter_exit = '<li><a href=" ' . href('page=register', 'module=office' ). '" title="' . TITLE_OFFICE . '">' .  OFFICE . '</a></li>' 
                       . '<li><a href=" ' . href('page=register', 'module=exit' ). '" title="' . TITLE_EXIT . '">' .  EXIT_USER . '</a></li>';
/** /////////////////////////////////////////////////////////////////
 * Gettong the metatags of the page
///////////////////////////////////////////////////////////////// */

    $title = getMeta('title', $page);
    $keywords = getMeta('keywords', $page); 
    $description = getMeta('description', $page);
    
/** ///////////////////////////////////////////////////////////////// 
 * require the output template
/////////////////////////////////////////////////////////////////  */
    require SITE_ROOT. 'skins'.DIRECTORY_SEPARATOR.
      'tpl'.DIRECTORY_SEPARATOR.'index.tpl';
    
?>
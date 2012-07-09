<?php
/**
 * Admin panel
 * @author Elmor
 * @copyright 2010
*/

//    echo md5("root"); use of md5 for sequrity...

/** ///////////////////////////////////////////////////////////////////////////////////////
 * ////////////////////// Establish charset & error level
/////////////////////////////////////////////////////////////////////////////////////*/
    header("Content-Type: text/html; charset=utf-8;");
    error_reporting(-1);
    
//   include SITE_ROOT. 'libs/debug.php'; debuging    
    

/** /////////////////////////////////////
 * Setting the access constant of the site
///////////////////////////////////// */
    define( 'SITE_KEY', true);    

/** /////////////////////////////////////
 * Setting the Admin panel ident
 /////////////////////////////////////*/
    define('SITE_ADMIN', true);
    
/** ////////////////////////////////////////
 *     start of capturing output (buffering) & start of session
//////////////////////////////////////// */

    ob_start();
   
    session_start();

/** /////////////////////////////////////
 * Connect to the main configuration file
 * way to the file should be without ANY CONSTANTS!
 ///////////////////////////////////// */
    include  '../config.php'; 
    
/** /////////////////////////////////////
 *     Connect to the file of the language

 ///////////////////////////////////// */
     include SITE_ROOT. 'language/en.php';

/** /////////////////////////////////////
 *     Including file of variables
 ///////////////////////////////////// */
     include SITE_ROOT. 'variables.php';

/** /////////////////////////////////////
 *     Include the general functions & debug
 ///////////////////////////////////// */
    include SITE_ROOT. 'libs/default.php';
  
    

    
    /** !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * Connect to the file of the language
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
    

    
        
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
        
/** working with the languages for safetz measures!
switch( $lang )
    {
/**
 * switch on the english language

        case  'en':
            $lang = 'en';
        break;
        
/** 
 * switch on the russian language

        case 'ru':
            $lang = 'ru';
        break;
        
/**
 * for safetz measures in all the rest instances switching the english

        default:
            $lang = 'en';
        break;                        
    }  
*/
          
$lang = 'en';
    include_once SITE_ROOT. 'language/'. $lang . '.php' ;
    $page = $GET['page'];
/** ////////////////////////////////////////////////////////////////////////
   * Connect to the mysql functions file
////////////////////////////////////////////////////////////////////////*/ 
    
    include SITE_ROOT . 'libs/mysql.php'; 
/** /////////////////////////////////////
 *     Including view
 ///////////////////////////////////// */
     include SITE_ROOT. 'libs/view.php';
        
/** /////////////////////////////////////
 *     Switching of modules.
 ///////////////////////////////////// */
    if( !empty($_SESSION['admin']) )
    {
        switch ( $GET['page'] )
        {
            case 'news':
                include SITE_ROOT. 'admin/news/router.php';
            break;
        
            case 'main':
                include SITE_ROOT. 'admin/main/router.php';
            break;
            
            case 'guestbook':
                include SITE_ROOT. 'admin/guestbook/router.php';
            break;
            
            case 'register':
                include SITE_ROOT . 'admin/register/router.php';
            break;
            
            case 'meta':
                include SITE_ROOT. 'admin/meta/router.php';
            break;
            
            case 'jquery':
                include SITE_ROOT . 'admin/jquery/router.php';
            break;  
            
            case 'info':
                include SITE_ROOT . 'admin/info/router.php';
            break;  
            
            case 'exit':
                include SITE_ROOT. 'admin/sequrity/exit.php';
            break;
        
            default:
                include SITE_ROOT. 'admin/main/router.php';
            break;
        }
    
    }
    else
        include SITE_ROOT. 'admin/sequrity/enter.php';
    
     
/** /////////////////////////////////////
 *     Get the output!
 ///////////////////////////////////// */
    $content = ob_get_contents() ;
    ob_end_clean();    
    
    
/** /////////////////////////////////////
 *     Main template of the site & OUTPUT!
 ///////////////////////////////////// */
         include SITE_ROOT.'skins/tpl/admin.tpl';
         
?>
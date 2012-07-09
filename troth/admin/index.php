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
    error_reporting(E_ALL);
    
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
     include SITE_ROOT. 'language/ru.php';

/** /////////////////////////////////////
 *     Including file of variables
 ///////////////////////////////////// */
     include SITE_ROOT. 'variables.php';

/** /////////////////////////////////////
 *     Include the general functions & debug
 ///////////////////////////////////// */
    include SITE_ROOT. 'libs/default.php';
  
    
/** /////////////////////////////////////
 *     Including view
 ///////////////////////////////////// */
     include SITE_ROOT. 'libs/view.php';
    

    
/** ////////////////////////////////////////////////////////////////////////
   * Connect to the mysql functions file
////////////////////////////////////////////////////////////////////////*/ 
    
    include SITE_ROOT . 'libs/mysql.php';         
/** /////////////////////////////////////
 *     Switching of modules.
 ///////////////////////////////////// */
    if( !empty($_SESSION['admin']) )
    {
        switch ( $GET['page'] )
        {
            case 'articles':
                include SITE_ROOT . 'admin/articles/router.php';
                break;
                
            case 'news':
                include SITE_ROOT. 'admin/news/controller.php';
            break;
        
            case 'meta':
                include SITE_ROOT. 'admin/meta/router.php';
            break;
            
            case 'exit':
                include SITE_ROOT. 'admin/sequrity/exit.php';
            break;
        
            default:
                include SITE_ROOT. 'admin/news/router.php';
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
<?php
/**
 * @author Elmor
 * @copyright 2010
 * Router of the main module
 */
  /** ////////////////////////////////////////////////////////
 * Security measures
//////////////////////////////////////////////////////// */ 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT . './404.html') );
    }
 
/** //////////////////////////////////////////////////
 *SETTING THE CURRENT DIR


 * http://php.net/manual/en/language.constants.predefined.php
 __FILE__ - one of the magic constants, The full path and filename of the file. 

 * dirname - Given a string containing a path to a file, this function will return the name of the directory.

* basename — Returns filename component of path

//////////////////////////////////////////////////*/

    $modul = basename( dirname(__FILE__) );
    

/** /////////////////////////////////////////////////////////////
 * if-else for the controller
///////////////////////////////////////////////////////////// */ 
    switch( $GET['module'])
    {
        case 'register':
            include SITE_ROOT . 'modules/register/register_controller.php';
        break; 
        
        case 'exit':
            include SITE_ROOT . 'modules/register/exit_controller.php';
        break;
        
        case 'office':
            include SITE_ROOT . 'modules/register/office_controller.php';
        break;
        
        case 'activate':
            include SITE_ROOT . 'modules/register/activate_controller.php';
        break;
            
        case 'restore';
            include SITE_ROOT . 'modules/register/restore_controller.php';
        break;
            
        case 'enter':
        default:
            include SITE_ROOT . 'modules/register/enter_controller.php';
        break;    
    }
        
/** ///////////////////////////////////////////////////////////////////
 * Including the view of the module
/////////////////////////////////////////////////////////////////// */
    include  SITE_ROOT. 'modules/'. $modul. '/view.php';
  
?>

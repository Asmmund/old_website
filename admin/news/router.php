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
        exit( file_get_contents(SITE_ROOT. '404.html') );
    }
 
/** //////////////////////////////////////////////////
 * SETTING THE CURRENT DIR


 * http://php.net/manual/en/language.constants.predefined.php
 __FILE__ - one of the magic constants, The full path and filename of the file. 

 * dirname - Given a string containing a path to a file, this function will return the name of the directory.

* basename — Returns filename component of path

//////////////////////////////////////////////////*/
    $modul = basename( dirname(__FILE__) );
    

/** /////////////////////////////////////////////////////////////
 * if-else for the controller
///////////////////////////////////////////////////////////// */  
    if( $GET['module'] && file_exists( SITE_ROOT. 'admin/'. $modul. '/'. $GET['module']. '_controller.php' ) )
        include SITE_ROOT. 'admin/'. $modul. '/'.  $GET['module'].'_controller.php';
    else
    {
        header( "HTTP/1.1 404 Not Found");
        exit( file_get_contents(SITE_ROOT.'404.html'));
    }
        
/** ///////////////////////////////////////////////////////////////////
 * Including the view of the module
/////////////////////////////////////////////////////////////////// */
    include  SITE_ROOT. 'admin/'. $modul. '/view.php';

?>


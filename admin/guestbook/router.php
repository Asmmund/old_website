<?php
/**
 * @author Elmor
 * @copyright 2010
 */
/**
 * chesking the passkey ;)
*/
    if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT. '404.html') );
    }
///////////////////////////////////////////////////////// 
/** //////////////////////////////////////////////////
 setting the current dir 
//////////////////////////////////////////////////*/
    $modul = basename(dirname(__FILE__)); 

/** /////////////////////////////////////////////////////////////
 * if-else for the controller
///////////////////////////////////////////////////////////// */ 
    if( $GET['module'] && file_exists( SITE_ROOT. 'admin/'. $modul. '/'. $GET['module']. '_controller.php' ) )
        include SITE_ROOT. 'admin/'. $modul. '/'. $GET['module']. '_controller.php';
    else
    {
        header( "HTTP/1.1 404 Not Found");
        exit( file_get_contents(SITE_ROOT. '403.html'));
    }
	
/** ///////////////////////////////////////////////////////////////////
 * Including the view of the module
/////////////////////////////////////////////////////////////////// */
    include SITE_ROOT.'admin/'. $modul .'/view.php';
?>
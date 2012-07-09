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
        exit( file_get_contents('../.././404.html') );
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
/////////////////////////////////////////////////////////////  */
    include SITE_ROOT . 'modules/' . $modul . '/read_controller.php';
        
/** ///////////////////////////////////////////////////////////////////
 * Including the view of the module
/////////////////////////////////////////////////////////////////// */
    include  SITE_ROOT. 'modules/'. $modul. '/view.php';
?>
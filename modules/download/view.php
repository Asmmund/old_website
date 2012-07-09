<?php
/**
 * @author Elmor
 * @copyright 2010
 * View of the main module
 */
/** ////////////////////////////////////////////////////////////////////////
   * ////////////////////////Security mesures
////////////////////////////////////////////////////////////////////////*/ 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT.'404.html') );
    }


/** ///////////////////////////////////////////
 * Inclusion
///////////////////////////////////////////////// */ 
    include SITE_ROOT.'skins'. DIRECTORY_SEPARATOR.'tpl'. DIRECTORY_SEPARATOR.
      $modul .DIRECTORY_SEPARATOR.'show.tpl';
    
    
?>
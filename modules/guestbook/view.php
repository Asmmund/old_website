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
        exit( file_get_contents('../.././404.html') );
    }


/** ///////////////////////////////////////////
 * Inclusion
///////////////////////////////////////////////// */ 
    include './skins/tpl/'.$modul .'/show.tpl';
    
    
?>
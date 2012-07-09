<?php
/**
 * @author Elmor
 * @copyright 2010
 */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('../../404.html') );
    }
 
/** /////////////////////////////////////////////////////
 * Switching the output tpl
///////////////////////////////////////////////////// */     
    include SITE_ROOT. 'shins/tpl/admin/'. $modul. 'show.tpl';
echo 'including '. __FILE__. '<br>';
?>
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
    switch($GET['module'])
    {
        case 'read':
        default:
            include SITE_ROOT . 'skins/tpl/admin/register/main.tpl';
    }
?>
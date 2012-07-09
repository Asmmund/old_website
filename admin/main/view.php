<?php
/**
 * @author Elmor
 * @copyright 2010
 */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents( SITE_ROOT . '404.html') );
    }
 
/** /////////////////////////////////////////////////////
 * Switching the output tpl
///////////////////////////////////////////////////// */     
    switch($GET['module'])
    {
        case 'read':
            include SITE_ROOT. 'skins/tpl/admin/main/show.tpl';
        break;
        
        case 'edit':
            include SITE_ROOT. 'skins/tpl/admin/main/article_edit.tpl';
        break;
        
        default:
            include SITE_ROOT. 'skins/tpl/admin/main/show.tpl';
    }
?>
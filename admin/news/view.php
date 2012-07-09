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
///////////////////////////////////////////////////////// 

 switch($GET['module'])
    {
        case 'read':
            include SITE_ROOT. 'skins/tpl/admin/news/show.tpl';
        break;
        
        case 'edit':
            include SITE_ROOT. 'skins/tpl/admin/news/news_edit.tpl';
        break;
        
        default:
            include SITE_ROOT. 'skins/tpl/admin/news/show.tpl';
    }

    
    
  
?>

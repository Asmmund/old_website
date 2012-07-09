<?php
/**
 * @author Elmor
 * @copyright 2010
 */
/** ////////////////////////////////////////////////////////
 * Security measures
//////////////////////////////////////////////////////// */ 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('../.././404.html') );
    }

/**  ////////////////////////////////////////////////////////
  * switching of modules
//////////////////////////////////////////////////////// */
 
switch($GET['module'])
    {
        case 'works':
            include SITE_ROOT. 'skins/tpl/important/works.tpl';
        break;
        
        case 'resume':
            include SITE_ROOT. 'skins/tpl/important/resume.tpl';
        break;
        
        default:
            include SITE_ROOT. 'skins/tpl/important/works.tpl';
    }
?>
<script src="<?php echo SITE_HOST;?>skins/js/jquery.js"></script>

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
            include SITE_ROOT. 'skins/tpl/admin/jquery/show.tpl';
        break;
        
        case 'edit':
            include SITE_ROOT. 'skins/tpl/admin/jquery/edit_jquery.tpl';
        break;
        
        default:
            include SITE_ROOT. 'skins/tpl/admin/jquery/show.tpl';
    }
?>
<?php
/**
 * Exit!
 * @author Elmor
 * @copyright 2010
 */
if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_HOST . '404.html') );
    }
    
/** //////////////////////////////////////////////////
 * Unsetting the session
////////////////////////////////////////////////// */
    session_unset();
    session_destroy();
    reDirect('host');     
    
    
?>
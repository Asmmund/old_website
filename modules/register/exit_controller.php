<?php
/**
 * @author Elmor
 * @copyright 2010
 */
/** //////////////////////////////////////////////////////////////////////////////////////////////////
 * /////////////////////// chesking the passkey ;)
///////////////////////////////////////////////////////////////////////////////////////////////////////// */
    if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT . './404.html') );
    }
    unset($_SESSION['user_data']);
    session_destroy();
    setcookie('hash', '', time() - 3600*24, '/');
    
    reDirect('page=register', 'module=enter');
?>
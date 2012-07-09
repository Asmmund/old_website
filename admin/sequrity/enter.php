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
    
/** ///////////////////////////////////////////////////////////////
 * Check of sequrity
 * go through each $admins (in ./config.php ) and compare
 * if correct -> redirect
///////////////////////////////////////////////////////////////// */
    foreach( $admins as $admin => $pass )
        if( $POST['value1']===$admin && md5($POST['value2']) === $pass )
            $_SESSION['admin'] = true;
            
            
    if(isset($_SESSION['admin']))    
        reDirect();    
/////////////////////////////////////////////////////////////////
    $POST = htmlChars($POST);
    
/** ////////////////////////////////////////////////////////////////////
 * Connect to the entry form
//////////////////////////////////////////////////////////////////// */
    include SITE_ROOT. '/skins/tpl/admin/sequrity.tpl';             

?>
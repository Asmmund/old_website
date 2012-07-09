<?php
/**
 * view of the meta
 * @author Elmor
 * @copyright 2010
 */
/** ////////////////////////////////////////////////////////////////////
 *             Generating the security key
//////////////////////////////////////////////////////////////////// */
    if( !defined('SITE_KEY') )
    {
        header('HTTP/1.1 404 Not Found');
        exit( file_get_contents('../404.html') );
    };
    
    
/** //////////////////////////////////////////////////////////////////////
 * if metatags are not set, we take meaning from the language file
////////////////////////////////////////////////////////////////////// */
    $POST['value1'] = getMeta('title', $GET['module'])? getMeta('title', $GET['module']): SITE_NO_TITLE;
    
    $POST['value2'] = getMeta('keywords', $GET['module'])? getMeta('keywords', $GET['module']): SITE_NO_KEYWORDS;     
    $POST['value3'] = getMeta('description', $GET['module'])? getMeta('description', $GET['module']): SITE_NO_DESCRIPTION;
     
// setting the default warning for no module
    $moduls = !empty( $language[$GET['module']] ) ? $language[$GET['module']] : NOT_SELECTED;
     
    
    
// use the htmlchars function ;)    
    $POST = htmlChars($POST);


/** ////////////////////////////////////////////////////////////////////
 *                          Include the template
///////////////////////////////////////////////////////////////////// */
    include SITE_ROOT. 'skins/tpl/admin/meta/form_setup.tpl';

?>
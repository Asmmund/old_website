<?php
/**
 * @author Elmor
 * @copyright 2010
*/
/**
 * chesking the passkey ;)
*/
    if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('./404.html') );
    }
 
/*
 * Difectory separator for dif server os
 */
     //define('DIRECTORY_SEPARATOR','/');

/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * Admin's name & pass
 /////////////////////////////////////////////////////////////////////////////////////////////////// */
    $admins = array(
                     "El'Mor" => '92b072f16f08c168677ae09bb67012b2',  //El'Mor
                     'Michael' => '953f2dff50faf09a8270f8f57be750da', 
                     'Vika' => '3360a55fe23cdfa025303ee4fd9777b0' //Petrova
              ); 

/** ////////////////////////////////////////////////////////////////////////////////////////////////
 * Number of posts in paginator
//////////////////////////////////////////////////////////////////////////////////////////////// */ 

    define('IRB_NUM_POSTS', 6);
  

/** ////////////////////////////////////////////////////////////////////////////////////////////////
 * switching on the CRAFT FREE URL's module
//////////////////////////////////////////////////////////////////////////////////////////////// */
    define('SITE_REWRITE','on');
    
    
    

/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * establishing a physical path to the root of the server
 /////////////////////////////////////////////////////////////////////////////////////////////////// */    
    if( !defined('SITE_ADMIN') ) {
      define( 'SITE_ROOT',  dirname($_SERVER['SCRIPT_FILENAME']) .DIRECTORY_SEPARATOR )  ;      
    } else {
      define( 'SITE_ROOT',  dirname($_SERVER['SCRIPT_FILENAME']).DIRECTORY_SEPARATOR
        .'..'.DIRECTORY_SEPARATOR )  ;            
    }
    
    
/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * establishing the root of the site for HTTP
 /////////////////////////////////////////////////////////////////////////////////////////////////// */    
     define('SITE_HOST', 'http://'. $_SERVER['HTTP_HOST'] .DIRECTORY_SEPARATOR );

/** //////////////////////////////////////////////////////////////////////////////////////////////// 
* * establishing the root of the site for HTTP
/////////////////////////////////////////////////////////////////////////////////////////////////// */    
    define('SITE_SALT', 'SDLFSDJDSDSO235R2');     
     
/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * //////////////////////////////////// MYSQL OPTIONS BEGIN
 /////////////////////////////////////////////////////////////////////////////////////////////////// */    
            
            
// Name of the table of metatags    
    define('MYSQL_METATAGS', 'elmor_metadata');            

//table of the articles
    define('MYSQL_ARTICLES', 'elmor_articles');
    
// table of jquery scripts
    define('MYSQL_JQUERY', 'elmor_jquery');
    
// table of info files    
    define('MYSQL_DBINFO', 'elmor_info');

// table of registered users    
    define('MYSQL_REG_USR', 'elmor_user');    
// DATABASE PREFIX            
    define('MYSQL_PREFIX', 'elmor_');
            
// database server
    define('MYSQL_DBSERVER', 'localhost');
            
// Mysql user
    define('MYSQL_DBUSER', 'elmor_db'); //asashiin_elmor root 
            
// MYSQL password            
    define('MYSQL_DBPASSWORD', '3elmor_db#');//elmorpass 
            
// MYSQL database            
    define( 'MYSQL_DATABASE', 'elmor_db');



?>
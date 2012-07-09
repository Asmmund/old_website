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
 


/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * Admin's name & pass
 /////////////////////////////////////////////////////////////////////////////////////////////////// */
    $admins = array(
                     'Sigwald' => '4f3d2ed424d',
                     'Lavega' => '4f3d2ed424d',
                     'Asmmund' => '4f3d2ed424d'  
              ); 


/** ////////////////////////////////////////////////////////////////////////////////////////////////
 * switching on the CRAFT FREE URL's module
//////////////////////////////////////////////////////////////////////////////////////////////// */
    define('SITE_REWRITE','on');
    
    define('IRB_NUM_WORD_NEWS_MAIN', '5');
    
    define('NUM_WORD_NEWS_MAIN', '5');
    
    /**     
* Quantity of news on page  
* Количество новостей на странице   
*/       
   define('IRB_NUM_NEWS_MAIN', '4');
    define('SITE_ARTICLES_MAIN', '5');

/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * establishing a physical path to the root of the server
 /////////////////////////////////////////////////////////////////////////////////////////////////// */    
    define( 'SITE_ROOT', str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']) .'/troth/' )  ;      
    
    
/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * establishing the root of the site for HTTP
 /////////////////////////////////////////////////////////////////////////////////////////////////// */    
     define('SITE_HOST', 'http://'. $_SERVER['HTTP_HOST'] .'/troth/' );
    define('IRB_HOST', 'http://'. $_SERVER['HTTP_HOST'] .'/troth/');

     
/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * //////////////////////////////////// MYSQL OPTIONS BEGIN
 /////////////////////////////////////////////////////////////////////////////////////////////////// */    
            
    define('IRB_DBPREFIX', '');        
            
// database server
    define('MYSQL_DBSERVER', 'localhost');
            
// Mysql user
    define('MYSQL_DBUSER', 'asashiin_elmor'); 
            
// MYSQL password            
    define('MYSQL_DBPASSWORD', 'elmorpass');
            
// MYSQL database            
    define( 'MYSQL_DATABASE', 'asashiin_elmor');

// Name of the table of metatags    
    define('MYSQL_METATAGS', 'asatru_metadata');            

//table of the articles
    define('MYSQL_ARTICLES', 'asatru_articles');
    
    define('MYSQL_NEWS', 'asatru_news');
    

?>
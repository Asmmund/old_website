<?php
/**
 * @author Elmor
 * @copyright 2010
 * ENGLISH
 */
 /** 
  * Protecting  PHP file from unothorided access
 */
 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT. './404.html') );
    };
    
    
    
    
/**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 * Title
 */
 define('MAIN_TITLE', 'Russian commonwealth of Asatru'); 
 
/**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 * links at top 
 */
    define('LINK_MAIN', 'News');
    
    define('LINK_PHOTO', 'Photo');
    
    define('LINK_LOG', 'Logretta');
    
    define('LINK_ART', 'Articles');
    
    define('LINK_CON', 'Contacts'); 
    
    
    

define('NO_NEWS', 'No news!'); 
    define('IRB_LANG_ALL_NEWS',          'All News');
    
 define('FULL_NEWS','Read completely...');
 $lang_month_string = array(
                                    '01'     => 'january',
                                    '02'     => 'febuary',
                                    '03'     => 'march',
                                    '04'     => 'april',
                                    '05'     => 'may',
                                    '06'     => 'june',
                                    '07'     => 'july',
                                    '08'     => 'august',
                                    '09'     => 'september',
                                    '10'     => 'october',
                                    '11'     => 'november',
                                    '12'     => 'december'
                              );    
  
    define( 'NO_ARTICLES', 'No Articles');
    
      $language = array( 
                            'articles'       =>    'Articles',
                            'news'       =>    'News'
                         );

    
?>
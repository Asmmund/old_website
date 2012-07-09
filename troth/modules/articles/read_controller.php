<?php
/**
 * @author Elmor
 * @copyright 2010
 * Choose the random value from the array
 */
 
 /** //////////////////////////////////////////////////////////////////////////////////////////////////
 * /////////////////////// chesking the passkey ;)
///////////////////////////////////////////////////////////////////////////////////////////////////////// */
    if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents( SITE_ROOT . './404.html') );
    }
        


/**
 * @author Elmor
 * @copyright 2010
 * function returning the article 
 * @param $page - url of the article (UNIQUE!)
 * @return array or false..
 * works with MYSQL_ARTICLES constant - the name of the table
*/

    function getArticle( $id )
    {
// sequring ourselfes from attack        
        $id = mysql_escape_string( $id );
        
// query for selecting the info        
        $query = 'SELECT `id`, `page`, `name`, `text` 
                  FROM `' . MYSQL_ARTICLES . '`  
                  WHERE `id` = "' . $id . '" LIMIT 1;' ;
        
        $res = mysqlQuery($query);

// if there are results, return them, else return false        
        if(mysql_num_rows($res) >0 )
            {
                $row =  mysql_fetch_assoc($res) ;
                return $row;    
            }
        else
            return false;    
    }
    
/**    ///////////////////////////////////////////////////////////////////////////////////////
 * Reading page
/////////////////////////////////////////////////////////////////////////////////////// */
    if(is_numeric($GET['id']) )
    {
        $article =  getArticle($GET['id']); 
    }
    else
        include SITE_ROOT . 'skins/tpl/articles/intro.tpl';
     
        


/**    ///////////////////////////////////////////////////////////////////////////////////////
 * building menu
/////////////////////////////////////////////////////////////////////////////////////// */
    include SITE_ROOT .'libs/irb_paginator.php';
    $paginator = new IRB_Paginator($GET['num'], SITE_ARTICLES_MAIN);   

   $res = $paginator -> countQuery("SELECT `id`, `page`, `name`, `text` FROM `".  MYSQL_ARTICLES ."`
	                   ORDER BY `id` DESC");

    $page_menu = $paginator -> createMenu();

         if(mysql_num_rows($res) > 0)
         {
              while ($row = mysql_fetch_assoc($res))
              {
                  $row['subtitle'] = htmlspecialchars($row['name']);
                  $row['text'] = '';
                  $row['url'] = href('module=read', 'id='. $row['id'] );
                  $row['link'] = FULL_NEWS;
                  $tpl = getTpl('news/rows');
              $news .= parseTpl($tpl, $row);
              }
         }
         else
         {
              $news = NO_ARTICLES;
              
         }

    
     
?>
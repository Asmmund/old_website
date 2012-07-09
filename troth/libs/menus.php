<?php
/**
 * @author Elmor
 * @copyright 2010
 * view php
 */
   /** ///////////////////////////////////////////////////////////////////////
  * //////////////////////cheking protection key
  * ///////////////////////////////////////////////////////////////////////
 */
 
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT. '404.html') );
    };

 /**
 * @author Elmor
 * @copyright 2010
 * function of creating menu of articles 
 * @param 
 * @return string or false..
 * works with MYSQL_DBINFO constant - the name of the table and "pages_menu" css class
*/    
    function createMenuInfo()
    {
// set the start of the menu        
        $menu = '<ul >';
/* 
reading from the  mysql table values
*/       
        $query = 'SELECT *
                  FROM ' . MYSQL_DBINFO . ';';
                  
        $res = mysqlQuery( $query );
        
// going through each row & making a link        
        while( $article = mysql_fetch_assoc($res) )
        {
            $menu .= '<li>
                          <a href="' . href( 'page=info', 'module=read', 'id=' . $article['page']) . '">' . $article['name'] 
                          . '</a>
                      </li>';
            
        }
        return $menu . '</ul>';
    }
/**
 * @author Elmor
 * @copyright 2010
 * function of creating menu of articles 
 * @param 
 * @return string or false..
 * works with MYSQL_JQUERY constant - the name of the table + "pages_menu" css class
*/    
    function createJqueryMenu()
    {
// set the start of the menu        
        $menu = '<ul >';
/* 
reading from the  mysql table values
*/       
        $query = 'SELECT *
                  FROM ' . MYSQL_JQUERY . ';';
                  
        $res = mysqlQuery( $query );
        
// going through each row & making a link        
        while( $jquery = mysql_fetch_assoc($res) )
        {
            $menu .= '<li>
                           
                          <a href="' . href('page=jquery', 'module=read', 'id=' . $jquery['id']) . '  ">' . $jquery['name'] . '</a>
                     </li><br>';
        }
        return $menu . '</ul>';
    }        
    
      
/**
 * @author Elmor
 * @copyright 2010
 * function of creating menu of articles 
 * @param 
 * @return string or false..
 * works with MYSQL_ARTICLES constant - the name of the table and "pages_menu" css class
*/    
    function createMenuArticles()
    {
// set the start of the menu        
        $menu = '<ul >';
/* 
reading from the  mysql table values
*/       
        $query = 'SELECT *
                  FROM ' . MYSQL_ARTICLES . ';';
                  
        $res = mysqlQuery( $query );
        
// going through each row & making a link        
        while( $article = mysql_fetch_assoc($res) )
        {
            $menu .= '<li>
                          <a href="' . href('page=main', 'module=read',  'id=' . $article['page']) . '">' . $article['name'] 
                          . '</a>
                      </li>';
            
        }
        return $menu . '</ul>';
    }
?>
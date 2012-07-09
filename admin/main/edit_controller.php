<?php
/**
 * @author Elmor
 * @copyright 2010
 * Edit controller of the admin/main page
 */

/** ////////////////////////////////////////////////////////
 * Security measures
//////////////////////////////////////////////////////// */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT . '404.html') );
    }

/**
 * @author Elmor
 * @copyright 2010
 * function returning the article 
 * @param $page - url of the article (UNIQUE!)
 * @return array or false..
 * works with MYSQL_ARTICLES constant - the name of the table
*/

    function getArticle( $page )
    {
// sequring ourselfes from attack        
        $page = mysql_escape_string( $page );
        
// query for selecting the info        
        $query = 'SELECT * 
                  FROM ' . MYSQL_ARTICLES . '  
                  WHERE page = "' . $page . '" LIMIT 1;' ;
        
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
    
    
/**
 * @author Elmor
 * @copyright 2010
 * function of updating articles 
 * @param $name - name of the article
 *        $page - url of the article (UNIQUE!)
          $text - updatet text 
 * @return true of false
 * works with MYSQL_ARTICLES constant - the name of the table
*/
    function updateArticle( $page, $name, $text )
    {
// sequrity measures        
        $text = mysql_escape_string( $text );
        $name = mysql_escape_string( $name );
        $page = mysql_escape_string( $page );
        
        $check = 'SELECT *
                  FROM ' . MYSQL_ARTICLES . '
                  WHERE page = "' . $page . '";';
          $chk = mysqlQuery( $check);
          
          if(mysql_num_rows($chk) > 0 )
          {
// query for updating 
                $query =  'UPDATE ' . MYSQL_ARTICLES . ' 
                          SET name = "' . $name . '",
                          text = "' . $text . '"
                          WHERE page = "' . $page . '";';

// and updating         
                $res = mysqlQuery($query);
                return true;
        }
        else
            return false;
    }
    
/////////////////////////////////////////////////////////////////////////////////////////////
// used in *.tpl file    
    $article = getArticle($GET['id']);
    
// if the edit button is pressed then save the changes and go to module read    
    if( $ok )
    {
        updateArticle($article['page'], $POST['value1'], $POST['value2'] );
        reDirect('module=read');
    }    




?>
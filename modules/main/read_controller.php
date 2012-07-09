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
    
 
 
    
/**    ///////////////////////////////////////////////////////////////////////////////////////
 * Reading page
/////////////////////////////////////////////////////////////////////////////////////// */
    $article =  getArticle($GET['id']) ;
     
      
?>
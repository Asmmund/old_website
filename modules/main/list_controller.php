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
 * function of creating menu of articles 
 * @param 
 * @return string or false..
 * works with MYSQL_ARTICLES constant - the name of the table and "pages_menu" css class
*/    
    function createList()
    {
// set the start of the menu        
        $menu = '';
/* 
reading from the  mysql table values
*/       
        $query = 'SELECT *
                  FROM ' . MYSQL_ARTICLES . ';';
                  
        $res = mysqlQuery( $query );
        
// going through each row & making a link        
        while( $article = mysql_fetch_assoc($res) )
        {
            $menu .= '<a href="' . href('page=main', 'module=read',  'id=' . $article['page']) . '">' . $article['name'] 
                          . '</a> <br><br>';
            
        }
        return $menu ;
    }        
?>
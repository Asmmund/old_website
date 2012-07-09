<?php
/**
 * @author Elmor
 * @copyright 2010
 */

/** ////////////////////////////////////////////////////////
 * Security measures
//////////////////////////////////////////////////////// */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('../../404.html') );
    }
///////////////////////////////////////////////////////// 
$info = array();
/**
 * @author Elmor
 * @copyright 2010
 * function of creating menu of articles 
 * @param 
 * @return string or false..
 * works with MYSQL_DBINFO constant - the name of the table and "pages_menu" css class
*/    
    function createMenu()
    {
// set the start of the menu        
        $menu = '<ul class=pages_menu><br>';
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
                          <input name="form[array1][]" type=checkbox value="' . $article['id'] . '"> 
                          <a href="' . href( 'module=edit', 'id=' . $article['page']) . '">' . $article['name'] 
                          . '</a>';
            
        }
        return $menu . '</ul><br>';
    }
   
/**
 * @author Elmor
 * @copyright 2010
 * function of creating articles 
 * @param $page - url of the page (UNIQUE!)
          $name -   text name of the article
 * @return true or false..
 * works with MYSQL_DBINFO constant - the name of the table
*/    
    function createArticle($page, $name)
    {
// lower the url adress of the article        
        $page = mb_strtolower($page);
        
        
//sequrity measures        
        $page = mysql_escape_string( $page ) ;
        $name = mysql_escape_string( $name );

/* cheking the existense of 
such row... if the check is negarive
mysql_num_rows($chk) == 0 then proseed, else we
return false.
*/
        $check = 'SELECT *
                  FROM ' . MYSQL_DBINFO . '
                  WHERE page = "' . $page . '";';
        $chk = mysqlQuery( $check);
          
/*
preg_match("#^[a-z]+$#ui", $page) - the $page variable is using only small latin letters
*/
        if(preg_match("#^[a-z]+$#ui", $page))
            if( mysql_num_rows($chk) == 0)
                {
// query of adding info        
                    $query = 'INSERT  INTO ' . MYSQL_DBINFO . ' (
                              page,
                              name,
                              text)
                              VALUES (
                              "' . $page . '",
                              "' . $name . '",
                              "' . $name . '")';
                   
                    $res = mysqlQuery($query);
                    return true;
              }
              else
                  return false;
        else
            return false;
    }
///////////////////////////////////////////////////////// 
        
/** /////////////////////////////////////////////////////////
 * New page
///////////////////////////////////////////////////////// */ 
    if( $ok && $POST['value1'] && $POST['value2'] )
    {
//creating an article        
       if( !createArticle($POST['value1'], $POST['value2']))
           $info[] = 'Error!';
       else 
//refreshing brouser        
        reDirect();    
    }
/** /////////////////////////////////////////////////////////
 * Deleting page
///////////////////////////////////////////////////////// */
   
   if($delete)
   {
// query to delete articles that were marked in the chechbox         
        mysqlQuery("DELETE FROM `". MYSQL_DBINFO. "`  
                    WHERE `id` IN (". implode(', ', array_map('intval', $POST['array1'])) .")"  
                      );
                      
        reDirect();         

   } 
        
        
?>
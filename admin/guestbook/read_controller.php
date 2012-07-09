<?php
/** Admin page controller
 * @author Elmor
 * @copyright 2010
 */
  /** ////////////////////////////////////////////////////////////////////////
   * ////////////////////////Security mesures
////////////////////////////////////////////////////////////////////////*/ 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('../../404.html') );
    };




/** ////////////////////////////////////////////////////////////////////////
   * deleting rows
////////////////////////////////////////////////////////////////////////*/ 
    if($ok)
    {
/* 
array array_map ( callback $callback , array $arr1 [, array $... ] )

array_map() returns an array containing all the elements of arr1 after 
applying the callback function to each one. The number of parameters
that the callback function accepts should match the number of arrays 
passed to the array_map() 
*/        
        mysqlQuery("DELETE FROM `". MYSQL_PREFIX. "guest`  
                     WHERE `id` IN (". implode(', ', array_map('intval', $POST['array1'])) .")"  
                      );
                      
        reDirect();                      
    }    
    

/** ////////////////////////////////////////////////////////////////////////
   * reading rows
////////////////////////////////////////////////////////////////////////*/ 

/** including paginator & wording with it */    
    include SITE_ROOT. 'libs/irb_paginator.php';
    
    $paginator = new IRB_Paginator( $GET['num'], IRB_NUM_POSTS );
    
    $res = $paginator -> countQuery("SELECT * FROM `".  MYSQL_PREFIX ."guest`
	                                 ORDER BY `id` DESC");
                                     
    $page_menu = $paginator -> createMenu();
    
/** End of paginator block */    
    
    $gen_out = '';
    
/* 
If the amount of rows <> 0, then weconnect to the bbTags function
go through the rows and output them
*/    
    if( mysql_num_rows($res) > 0 )
    {
        include SITE_ROOT. 'libs/bbTags($text).php';
        $cont = getTpl('admin/guestbook/rows');
        
        while( $row = htmlChars(mysql_fetch_assoc($res)) )
        {
            $row ['date']= $row['date'] ;
            $row['text'] = nl2br( bbTags($row['text']) );
            $gen_out .= parseTpl($cont, $row);
            
        }
    }
    
    
    
    
    
?>
<?php
/**
 * @author Elmor
 * @copyright 2010
 * admin's page Read controller of the news
 */
 
/** ////////////////////////////////////////////////////////
 * Security measures
//////////////////////////////////////////////////////// */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_HOST . '404.html') );
    }
///////////////////////////////////////////////////////// 


/** /////////////////////////////////////////////////////////
 * dELETING
(1) echo '<pre>';
        var_dump($POST['array1']);
        echo '</pre>';
        
(2)         mysqlQuery("DELETE FROM 'asashiin_elmor'.'". MYSQL_PREFIX. "news'  
                     WHERE '". MYSQL_PREFIX. "news'.`id` IN (". implode(', ', array_map('intval', $POST['array1'])) .")"        
///////////////////////////////////////////////////////// */


 if($delete )
    {    
        mysqlQuery("DELETE FROM ".
                       MYSQL_PREFIX. "news 
                    WHERE ".
                    MYSQL_PREFIX. "news.id 
                    IN (". implode(', ', array_map('intval', $POST['array1'])) .")"  
                      );
                      
        reDirect();   
  
    }     
    
/** /////////////////////////////////////////////////////////
 * OK
///////////////////////////////////////////////////////// */         
if($ok)
    {
//if the login field is empty, then output the error        
        if( !$POST['value2'] )
            $info[] = NEWS_NOT_ENTERED;
  
            
        if( count($info)== 0 )
        {
            mysqlQuery("INSERT INTO `". MYSQL_PREFIX ."news`  
                        SET  
                        `text` = '". escapeString( htmlChars($POST['value2'])) ."'"  
                         );
                         
            reDirect();
        }
    }
    else 
        $info[] = NEWS_ENTER;
        
/** ////////////////////////////////////////////////////////////////////////
   * reading the information
//////////////////////////////////////////////////////////////////////// */

 
    include   SITE_ROOT.'libs/irb_paginator.php'; // including the paginator class
       
    $paginator = new IRB_Paginator($GET['num'], IRB_NUM_POSTS);   

   $res = $paginator -> countQuery("SELECT * FROM `".  MYSQL_PREFIX ."news`
	                   ORDER BY `id` DESC");

    $page_menu = $paginator -> createMenu();

// setting general output                               
    $gen_out  = ''; 

    


   
                           

   
    
/** ///////////////////////////////////////////////////////////////////////
reading from Db & inputing it into $gen_out 
//////////////////////////////////////////////////////////////////////////*/    
// counts the number of inputs in the base   
  if(mysql_num_rows($res) >0 )
    {
//including site bbTags function        
        include SITE_ROOT.'libs/bbTags($text).php';
        
        
// getting the content of the tpl, asingnin it to the $cont variable        
        $cont = getTpl('admin/news/rows');
        
// reading input one by one from the db  & cheching it via function
//mysql_fetch_assoc — Fetch a result row as an associative array        
        while( $row = htmlChars(mysql_fetch_assoc($res)) )
        {
//getting the date of message            
            $row['date'] = $row['date'];//formatDate(, false);
            
//reading the text of the message!            
            $row['text'] = nl2br( bbTags( htmlChars($row['text']) ) );
            
// getting ready for output word of the tpl for this row            
            $gen_out .= parseTpl($cont, $row).'<br>';
            
        }
    }
        
        
?>
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
        exit( file_get_contents(SITE_ROOT . './404.html') );
    }
    
    

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
        $cont = getTpl('news/rows');
        
// reading input one by one from the db  & cheching it via function
//mysql_fetch_assoc — Fetch a result row as an associative array        
        while( $row = htmlChars(mysql_fetch_assoc($res)) )
        {
//getting the date of message            
            $row['date'] = $row['date'];//formatDate(, false);
            
//reading the text of the message!            
            $row['text'] = nl2br( bbTags( $row['text'] ) );
            
// getting ready for output word of the tpl for this row            
            $gen_out .= parseTpl($cont, $row).'<br>';
            }
    }
?>
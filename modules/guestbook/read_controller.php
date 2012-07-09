<?php
/**
 * @author Elmor
 * @copyright 2010
 */
/** ////////////////////////////////////////////////////////////////////////
   * ////////////////////////Security mesures
////////////////////////////////////////////////////////////////////////*/ 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT . './404.html') );
    };


    include SITE_ROOT . 'libs/mail.php';



    $res  = mysqlQuery("SELECT *
                        from ". MYSQL_REG_USR . "
                        WHERE login = '" .escapeString($_SESSION['user_data']['login']) . "';" );
                        
     $user_data1 = mysql_fetch_assoc($res);                                                                   
/** ////////////////////////////////////////////////////////////////////////
   * block of writing entering messages
////////////////////////////////////////////////////////////////////////*/
            if ($user_data1['activate'] == 0)
            $info[] = ACTIVATE_NEED_ACCOUNT;
        if(($ok))
            if ($user_data1['activate']>0)
    {
//if the message field is empty then output the error                    
        if( !$POST['value2'] )
            $info[] = GUESTBOOK_EMPTY_MESSAGE;

        if( !empty($POST['value2']) )
        {
            mysqlQuery("INSERT INTO `". MYSQL_PREFIX ."guest`  
                        SET  
                        `name` = '". escapeString($_SESSION['user_data']['login']) ."',  
                        `text` = '". escapeString($POST['value2']) ."'"  
                         );
            allertEmail( $admin_mail,  $message_new_guestbook, $text_email_guestbook, $headers_general);                         
            reDirect();
            
        }
     
    }
    else 
        $info[] = GUESTBOOK_ENTER_MESSAGE;

        
        
/** ////////////////////////////////////////////////////////////////////////
   * reading the information
//////////////////////////////////////////////////////////////////////// */ 
    include   SITE_ROOT.'libs/irb_paginator.php'; // including the paginator class
       
    $paginator = new IRB_Paginator($GET['num'], IRB_NUM_POSTS);   

   $res = $paginator -> countQuery("SELECT * FROM `".  MYSQL_PREFIX ."guest`
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
        $cont = getTpl('guestbook/rows');
        
// reading input one by one from the db  & cheching it via function
//mysql_fetch_assoc — Fetch a result row as an associative array        
        while( $row = htmlChars(mysql_fetch_assoc($res)) )
        {
//getting the date of message            
            $row['date'] = $row['date'];//formatDate(, false);
            
//reading the text of the message!            
            $row['text'] = nl2br( bbTags( $row['text'] ) );
            
// getting ready for output word of the tpl for this row            
            $gen_out .= parseTpl($cont, $row);
            
        }
    }    
?>
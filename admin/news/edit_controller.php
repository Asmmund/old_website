<?php
/**
 * @author Elmor
 * @copyright 2010
 * Edit controller of the news
 */
 
/** ////////////////////////////////////////////////////////
 * Security measures
//////////////////////////////////////////////////////// */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT.'404.html') );
    }

    
    
    
    
/**     ////////////////////////////////////////////////////////////////////////
 * Saving the eddited row
//////////////////////////////////////////////////////////////////////// 

*/
    if($ok)
    {
        if(!$POST['value2'])
            $info[]= NOT_EMPTY;
            
//If there are no errors, then we update the row in mysql & redirect        
        if( count($info)==0)
        {
            mysqlQuery(" UPDATE `".MYSQL_DATABASE."`.`".MYSQL_PREFIX."news` 
                          SET `text` = '". escapeString(htmlChars($POST['value2']) )."' 
                          WHERE `".MYSQL_PREFIX."news`.`id` =".$GET['id']." LIMIT 1 ; ");
                          
                          
            reDirect('module=read');
        }
    }
 
    
    
/** ////////////////////////////////////////////////////////////////////////
   * reading row FOR edit
////////////////////////////////////////////////////////////////////////*/ 
// SENDING query to select needed row   
   $news_edit = mysqlQuery("SELECT *
                                FROM `elmor_news`
                                WHERE id =".$GET['id']. "
                                LIMIT 0 , 2");

// assigning $row the needed row
    $row = mysql_fetch_assoc($news_edit);

// seting up the news value
    $POST['value2'] = $row['text'];

                           
?>
Edit controller of news
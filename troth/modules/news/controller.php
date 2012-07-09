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
* News  generation
*/    

        include SITE_ROOT .'libs/irb_paginator.php';
        include SITE_ROOT . 'bbcode/irb_bbdecoder.php';     
        $paginator = new IRB_Paginator($GET['num'], IRB_NUM_NEWS_MAIN);
    
        $res = $paginator -> countQuery("SELECT `id`, `date`,`subtitle`,`public`,
                                         DATE_FORMAT(`date`,'%d') AS `day`, 
                                         DATE_FORMAT(`date`,'%m') AS `month`,
                                         DATE_FORMAT(`date`,'%Y') AS `year`, 
                                         SUBSTRING_INDEX(`text`,' '," . IRB_NUM_WORD_NEWS_MAIN . ") AS `text`
                                           FROM `" . MYSQL_NEWS . "`
                                           WHERE `public` = '1'  
                                               ORDER BY `id` DESC" 
                                                 );
                                                
        $page_menu = $paginator -> createMenu();                                                               
              
         if(mysql_num_rows($res) > 0)
         {
              while ($row = mysql_fetch_assoc($res))
              {
                  $row['date'] = $row['day'] .' '. $lang_month_string[$row['month']] .' '. $row['year'];
                  $row['subtitle'] = htmlspecialchars($row['subtitle']);
                  $row['text'] = createBBtags($row['text'], false) . "...";
                  $row['url'] = href('module=read', 'id='. $row['id'] );
                  $row['link'] = FULL_NEWS;
                  $tpl = getTpl('news/rows');
              $news .= parseTpl($tpl, $row);
              }
         }
         else
         {
              $news = NO_NEWS;
         }

    

    
    if(is_numeric($GET['id']) )
    {
        $query = "SELECT `id`, `subtitle`,
                  DATE_FORMAT(`date`,'%d') AS `day`, 
                  DATE_FORMAT(`date`,'%m') AS `month`,
                  DATE_FORMAT(`date`,'%Y') AS `year`, 
                  `text`
                  FROM `" . MYSQL_NEWS . "`
                  WHERE `public` = '1' AND
                  `id` = " . $GET['id'] . "
                  LIMIT 1;";
                  
        $ress = mysqlQuery($query);
        
        if( mysql_num_rows($ress) > 0 )
        {
            $row = mysql_fetch_assoc($ress);
            
            $row['date'] = $row['day'] .' '. $lang_month_string[$row['month']] .' '. $row['year'];
            $row['subtitle'] = htmlspecialchars($row['subtitle']);
            $row['text'] = createBBtags($row['text']);
            
            $tpl = getTpl('news/main');
            $cont = parseTpl($tpl, $row);
        }
        

        echo $cont;
    }
    else
        include SITE_ROOT . 'skins/tpl/news/intro.tpl';
        //echo '<div style ="height:550px;"></div>';
?>

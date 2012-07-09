<?php
/**
 * @author Elmor
 * @copyright 2010
 */
/** ////////////////////////////////////////////////////////////////////
 *             Generating the security key
 * 
//////////////////////////////////////////////////////////////////// */
    if( !defined('SITE_KEY') )
    {
        header('HTTP/1.1 404 Not Found');
        exit( file_get_contents(SITE_ROOT . '404.html') );
    };
/**
* We connect a BB-decoder
* Подключаем файл BB-декодер
*/  
   include SITE_ROOT .'/bbcode/irb_bbdecoder.php';

    /** //////////////////////////////////////////////////
     *  delete if entry module == delete
    ////////////////////////////////////////////////// */
    if( $GET['module'] === 'delete' )
    {
        $query = "DELETE FROM " . MYSQL_NEWS . "
                   WHERE `id` = " . (int)$GET['id'] . "
                   LIMIT 1;";
        
        mysqlQuery($query);
                   
        reDirect('module=read', 'id=all');
    }
    
/**
* setting  public 
*/    
    if($GET['module'] === 'public' )
    {
        $query = "UPDATE `" . MYSQL_NEWS . "`
                   SET `public` = '1'
                   WHERE `id` = '" . (int)$GET['id'] . "'
                   LIMIT 1;";
        mysqlQuery($query);
        reDirect('module=read', 'id=all');
    }

/**
* HIDING THE POST
*/    
    if($GET['module'] === 'nopublic' )
    {
        $query = "UPDATE `" . MYSQL_NEWS . "`
                   SET `public` = '0'
                   WHERE `id` = '" . (int)$GET['id'] . "'
                   LIMIT 1;";
        mysqlQuery($query);
        reDirect('module=read', 'id=all');
    }
    
/**
* Adding the new post
*/    
    
    if($GET['module'] === 'new' )
    {
        $query = "INSERT INTO `" . MYSQL_NEWS . "`
                   SET
                       `subtitle` = 'Новая новость',
                       `text` = 'Новая новость',
                       `public` = '0';";
        mysqlQuery($query);
        reDirect('module=edit', 'id=' . mysql_insert_id());
    }
    
/**
* Edditing
*/    
    if($GET['module'] === 'edit')
    {
        if($ok)
        {
            $query = "UPDATE `" . MYSQL_NEWS . "`
                      SET `subtitle` ='" . escapeString($POST['value1']) . "' ,
                          `text` = '" . escapeString($POST['value2']) . "'
                      WHERE `id` = '" . (int)$GET['id'] . "'
                      LIMIT 1;";
                      
            mysqlQuery($query);
        }
        
        $query = "SELECT `id`, `date`, `subtitle`, `text`, `public`
                  FROM `" . MYSQL_NEWS . "`
                  WHERE `id` = '" . (int)$GET['id'] . "'
                  LIMIT 1;";
        $res = mysqlQuery($query);
        
        $row = htmlChars(mysql_fetch_assoc($res));
        
        $POST['value1'] = $row['subtitle'];
        $POST['value2'] = $row['text'];
    }
    else
       $POST = htmlChars($POST);



    if(!empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], 'news') === false)
        $GET['news'] = 'all';

    $tpl = getTpl('admin/news/rows');
    $news = '';
    $page_menu = '';
    
    if(is_numeric($GET['news']))
    {

/**
* News generation by id
* Генерация новости по id
*/
        $res = mysqlQuery("SELECT `id`, `subtitle`, `text`,`public`,
                           DATE_FORMAT(`date`,'%d') AS `day`, 
                           DATE_FORMAT(`date`,'%m') AS `month`,
                           DATE_FORMAT(`date`,'%Y') AS `year` 
                             FROM `". MYSQL_NEWS ."`  
                                 WHERE `id` = " . (int)$GET['news']);


        if (mysql_num_rows($res) > 0)
        {
            $row = mysql_fetch_assoc($res);

            $row['date'] = $row['day'] .' '. $lang_month_string[$row['month']] .' '. $row['year'];
            $row['subtitle'] = htmlspecialchars($row['subtitle']);
            $row['text'] = createBBtags($row['text']);
            $row['url'] = href('news=all');
            
            $row['public_url']  = !empty($row['public']) ? 
                   href('module=nopublic', 'id='. $row['id']) : href('module=public', 'id='. $row['id']);
            
            $row['public_link'] = !empty($row['public']) ? 
                                   'Закрыть доступ': 'Открыть доступ';             
            $row['link'] = 'Читать все новости';

            $news = parseTpl($tpl, $row);
        }
        else
        {
            header("HTTP/1.1 404 Not Found");
            exit(file_get_contents(SITE_ROOT . '/404.html'));
        } 

    }
    else
    {     
/**
* News line generation 
* Генерация ленты новостей
*/            
        include SITE_ROOT .'libs/irb_paginator.php';     
        $paginator = new IRB_Paginator($GET['num'], IRB_NUM_NEWS_MAIN);
    
        $res = $paginator -> countQuery("SELECT `id`, `date`,`subtitle`,`public`,
                                         DATE_FORMAT(`date`,'%d') AS `day`, 
                                         DATE_FORMAT(`date`,'%m') AS `month`,
                                         DATE_FORMAT(`date`,'%Y') AS `year`, 
                                         SUBSTRING_INDEX(`text`,' '," . IRB_NUM_WORD_NEWS_MAIN . ") AS `text`
                                           FROM `" . MYSQL_NEWS . "`  
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
                  $row['url'] = href('id=' . $row['id']);
                  $row['link'] = FULL_NEWS;
                   $row['public_url']  = !empty($row['public']) ? 
                          href('module=nopublic', 'id='. $row['id']) : href('module=public', 'id='. $row['id']);
                                   
                  $row['public_link'] = !empty($row['public']) ? 
                                         'Закрыть доступ' : 'Открыть доступ';
                  $news .= parseTpl($tpl, $row);
              }
         }
         else
         {
              $news = NO_NEWS;
         }

    }



    include SITE_ROOT . 'skins/tpl/admin/news/show.tpl'; 
?>
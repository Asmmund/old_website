<?php
/**
 * @author Elmor
 * @copyright 2010
 * Russian
 */
 /** 
  * Protecting  PHP file from unothorided access
 */
 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT. './404.html') );
    };
    
    
 /**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 * Admin panel 
 */

  $language = array( 
                            'articles'       =>    'Статьи',
                            'news'       =>    'Новости',
                         );
    
    define('SETTING_METADATA', 'Установка метаданных для модуля:');
    define('SITE_NO_TITLE', 'Введите заголовок!');
    define('SITE_NO_KEYWORDS', 'Введите ключевые слова!');
    define('SITE_NO_DESCRIPTION', 'Введите описание!');
    define('TITLE', 'Заголовок');
    define('KEYWORDS', 'Ключевые слова');
    define('DESCRIPTION', 'Описание');

    define('STATIC_PAGES', 'Статьи');
    define('STATIC_NAME_URL', 'Ссылка на статью (только латинские буквы)');
    define( 'STATIC_NAME_LINK', 'Название статьи(ввод любой)');
    define('EDITING_PAGE', 'Редактировать страницу:');
    define('ADMIN_DELETE', 'Удалить Выделенное');
    define('ADD', 'Добавить');

 /**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 * links at top 
 */
    define('LINK_MAIN', 'Новости');
    
    define('LINK_PHOTO', 'Фото');
    
    define('LINK_LOG', 'Логретта');
    
    define('LINK_ART', 'Статьи');
    
    define('LINK_CON', 'Контакты');


 /** !!!!!!!!!!!!!!!!!!!! */
     
    
    
    

define('NO_NEWS', 'Новости отсутствуют'); 
    define('IRB_LANG_ALL_NEWS',          'Все новости');
    define('IRB_LANG_FULL_NEWS',         'Читать полностью...');
 define('FULL_NEWS','Читать полностью...');
    
 
 $lang_month_string = array(
                                    '01'     => 'января',
                                    '02'     => 'февраля',
                                    '03'     => 'марта',
                                    '04'     => 'апреля',
                                    '05'     => 'мая',
                                    '06'     => 'июня',
                                    '07'     => 'июля',
                                    '08'     => 'августа',
                                    '09'     => 'сентября',
                                    '10'     => 'октября',
                                    '11'     => 'ноября',
                                    '12'     => 'декабря'
                              );    
  
 define( 'NO_ARTICLES', 'Нет статей');
?>
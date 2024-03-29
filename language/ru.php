<?php
/**
 * @author Elmor
 * @copyright 2010
 
 * Russian
 
 */
 /** //////////////////////////////////////////////////////////////////////////////
  * Protecting  PHP file from unothorided access
////////////////////////////////////////////////////////////////////////////// */
 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('.././404.html') );
    };
    
    
    
    
/**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 * language settings
 * 
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 *  MYSQL  ERROR MESSAGES!
 * ////////////////////////////////////////////////////////////////////////////////////////////////
*/     

/* At the moment SERVER of the database is not connected. 
        The webpage couldn\'t be displayed properly.*/
    define( 'MYSQL_N0_CONNECT', 'В данный момент времени нет доступа к серверу БД. Веб-страница неможет быть 
    отображена правильно!');

 /*  At the moment the database is not working. 
        The webpage couldn\'t be displayed properly.*/   
    define(     'MYSQL_NO_DB_SELECT', 'В данный момент времени нет соединения с БД.
                Веб-страница неможет быть отображена правильно!');
        
        
        
  /**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 *                                              Menu         
 * ////////////////////////////////////////////////////////////////////////////////////////////////
*/
    define( 'I_DO', 'Я Умею'); //I Can:
    
    define ( 'Pages', 'Страницы');//Pages
      
/**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 *                                              Menu options        
 * ////////////////////////////////////////////////////////////////////////////////////////////////
*/
    define('MENU_SECTION1_ITEM1', 'Новости');//News 
    define('MENU_SECTION1_ITEM2', 'Статические страницы'); //Main
    define('MENU_SECTION1_ITEM3', 'Гостевая Книга');//Guestbook
    define('STUFF', 'Разности'); //Different stuff!

    


/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * news module
///////////////////////////////////////////////////////////////////////////////////////////////// */               
    define( 'NEWS_NOT_ENTERED', 'Новости не введены!'); //News are not entered!
    define ('NEWS_ENTER', 'Введите Новости!'); //Enter Your news!       
       
       
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Guestbook module
///////////////////////////////////////////////////////////////////////////////////////////////// */               
    define('GUESTBOOK_NAME', 'Имя'); //Name:
    define('GUESTBOOK_MESSAGE', 'Сообщение'); //Message:

    define('GUESTBOOK_ENTER_MESSAGE', 'Введите Ваше сообщение'); //Enter Your Message!
    
    define('GUESTBOOK_EMPTY_LOGIN','Поле имени пустое' ); //Name field is empty!
    define('GUESTBOOK_EMPTY_MESSAGE', 'Поле сообщения пустое'); //Message field is empty!
           
       
    
/** //////////// ////////////////////////////////////
* Admin's panel
/////////////////////////////////////////////////////// */       
    define('ADMIN_DELETE', 'Удалить'); //Delete
    DEFINE('ADD', 'Добавить');
    
    
           
/** //////////// array modules names for metatags formating in admin's panel /////////////////// */
    $language = array(
                      'main' => 'Статические страницы', //Main page
                      'guestbook' => 'Гостевая Книга', //Guestbook
					  'news' => 'Новости'); //News       
       
        

    
    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Admin's Panel variables
///////////////////////////////////////////////////////////////////////////////////////////////// */        
   define('ADMIN_PANEL', 'Панель администрирования'); //Admin\'s Panel
    
    define('MENU_METATAGS', 'Метатеги'); //Metatags
    define('MENU_EXIT', 'Выход'); //Exit
         


/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Metatags 
///////////////////////////////////////////////////////////////////////////////////////////////// */        
    define('SETTING_METADATA', 'Установка Метаданных для модуля'); //Setting Metadata for module
    
    define('TITLE', 'Заглавие'); //Title
    define('KEYWORDS', 'Ключевые слова'); //Keywords
    define('DESCRIPTION', 'Описание'); //Description
    
       
       define('SITE_NO_TITLE', 'У страницы заглавие не установлено!'); //Title is not set!
       define( 'SITE_NO_KEYWORDS', 'Ключевые слова не установлены!'); //No keywords are set!
       define('SITE_NO_DESCRIPTION', 'Описание не введено'); //No description is entered!
   
       define( 'NOT_SELECTED', 'Не выбран'); //Not selected!


/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Static Pages
///////////////////////////////////////////////////////////////////////////////////////////////// */ 
    define('EDITING_PAGE', 'Редактирование страницы'); //Editing page
    define('SITE_INVALID_DATA', 'Информация неверна'); //Data is not correct!
    define('SITE_DOUBLE_LINK', 'УРЛ существует'); //Url exists!

    define('STATIC_PAGES', 'Статьи'); //Static Pages
    define('STATIC_NAME_URL', 'Имя УРЛ (только латиница!)'); //Name Url (only latin)
    define('STATIC_NAME_LINK', 'Название УРЛ'); //Name Link
    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 24.08.10
///////////////////////////////////////////////////////////////////////////////////////////////// */ 
    define('GENERAL_HEADER','Домашняя страница Элмора. Добро пожаловать! Очень рад Вас видеть.'); // To be displayed at  the top of the page
    define('ALT_CUR_LANG', 'Текущий язык'); // ALT text of the current language image
    define('PAGE_TOP', 'На верх страницы'); //footer link to the top
    define('CHOOSE_LANG', 'Выберете язык'); //sign to choose language
    define('ELMOR_HOST', 'Щедрый Хост'); // Host of the site
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 26.08.10
///////////////////////////////////////////////////////////////////////////////////////////////// */ 
    define('EDITING_NEWS', 'Редакируем страницу'); //Editting News
    define('GEN_RETURN', 'Назад'); //Return
    define('NOT_EMPTY', 'Не может быть пустым!'); //Can\' be empty

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 28.08.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('TO_THE_SITE', 'Посмотреть на сайт'); //Look at Site 

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 31.08.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('IMPORTANT', 'Важно'); //Important
    define('WHAT_HERE', 'Что работает'); //Works
    define('RESUME', 'Резюме'); // resume
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 08.09.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('GALLERY', 'Галерея'); //GALLERY
        
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 21.09.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('ENTER_CAPTCHA', 'Введите Код:'); // Enter Captcha:
    define('WRONG_CAPTCHA', 'Неправильный Код'); // Wrong Captcha!
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 24.10.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('MODULE_INFO', 'Информация'); //Info

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 26.10.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('TITLE_IMPORTANT','Резюме и разное'); //
    define('TITLE_I_DO','Новости, Гостевая и прочее'); // 
    define('TITLE_JQUERY','Подтверждение тому, что jQuery прост!');// 
    define('TITLE_MODULE_INFO','Информация(и обо мне тоже)'); //
    define('TITLE_STATIC_PAGES','Статьи по интересам');// 
    define('TITLE_STUFF','Разные разности');//
    define('MAIN', 'Карта сайта'); //Main
    define('TITLE_OFFICE', 'Редактировать профиль пользователя');
    define('TITLE_ENTER', 'Войти на сайт как зарегестрированный пользователь');
    define('TITLE_REGISTER', 'Зарегестрироваться на сайте');


/** //////////// array modules names for metatags formating in admin's panel /////////////////// */
  $language = array(
                      'important' => 'Важное',
                      'news' => 'Новости',
                      'register' => 'Регистрация на сайте',
                      'guestbook' => 'Гостевая Книга',
					  'jquery' => 'jQuery scripts',
                      'info' => 'Информация',
                      'main' => 'Статьи',
                      'map' => 'Карта Сайта');       
       
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 29.10.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('MAP_MAIN', 'Статьи по Германскому Неоязычестве (Трот, Асатру и тд.)'); // 
     define('MAP_INFO', 'Разная Информация вроде Контактов и тд');
    define('MAP_JQUERY', 'Примеры работы jQuery');
    define('MAP_RESUME', 'Моё резюме');
    define('MAP_WORK', 'Что работает на этом вебсайте');
    define('MAP_NEWS', 'Новости этого сайта');
    define('MAP_GUESTBOOK', ' Гостевая книга этого сайта');
    define('MAP_REGISER', 'Зайти на сайт как зарегестрированный пользователь');

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 02.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('REGISTER', 'Регистрация');   
    define('LOGIN', 'Логин');
    define('PASSWORD', 'Пароль');
    define('REPEAT_PASS', 'Повсторите пароль');  
    define('PICK_ANOTHER', ' занят, выберете другой!');
    define('LOGIN_EMPTY', 'Поле логина пустое!');
    define('DIFFERENT_PASS', 'Пароли должны совпадать!');
    define('SHORT_PASS', 'Пароль слишком короток(Пароль>4)');
    define('LONG_PASS', 'Логин слишком длинный (Логин<20)');
    define('REMEMBER_YOU', 'Запомнить Вас?');
    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 03.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('ENTER', 'Войти');
    define('WELLCOME_1', 'Добро пожаловать <b class=imp>');
    define('WELLCOME_2','</b>, приятно Вас видеть!');
    define('WRONG_USER_PASS', 'Неверный логин и/или пароль');     

    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 04.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('EXIT_USER', 'Выход');
    
    define('ENTER_REAL_EMAIL', 'Введите настоящий почтовый ящик');
    define('ENTER_EMAIL', 'Введите почтовый ящик!');
    define('ERROR_IN_EMAIL', 'Ошибка при заполнении поля почтового ящика.');
    define('RESTORE_PASS','Забыли пароль?');
    define('ACTIVATE_ACCOUNT', 'Активировать профиль');

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 05.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
     define('CODE_NOT_CORRECT', 'Код неправильный!');    
     define('EMAIL_SEND' , 'Код активации был отправлен на ');
     define('ERROR_EMAIL', 'Ошибка отправки почты!');
     define('NO_EMAIL', 'Нет такого зарегестрированного ящика!');
     define('OR_CAN', ' или вы можете ');
     define('RESTORE_FORGOTTEN' , 'восстановить забытый пароль');
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 06.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
     define('ACTIVATE_INVALID', 'Неправильный код активации!');
     define('EMAIL_SEND_CODE1', 'На почтовый ящик ');
     define('EMAIL_SEND_CODE2', ' был отправлен код активации.');
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 07.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
     define('OFFICE', 'Личный Кабинет');
     define('UPDATE', 'Обновить');
     define('INFO_UPDATED', 'Данная запись была обновлена!');
    define('ACTIVATE_NEED_ACCOUNT', 'Вам нужно сначала активировать аккаунт, тогда вы сможете оставлять сообщения');

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 28.05.2011
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('DOWNLOAD', 'Download');
    define('TITLE_DOWNLOAD', 'Скачать');
    
     
?>
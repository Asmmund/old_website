<?php
/**
 * @author Elmor
 * @copyright 2010
 * ENGLISH
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
 * language settings
 * 
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 *  MYSQL  ERROR MESSAGES!
 * ////////////////////////////////////////////////////////////////////////////////////////////////
*/     
    define( 'MYSQL_N0_CONNECT', 'At the moment SERVER of the database is not connected. 
        The webpage couldn\'t be displayed properly.');
    
    define(     'MYSQL_NO_DB_SELECT', ' At the moment the database is not working. 
        The webpage couldn\'t be displayed properly.');
        
        
        
        
  /**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 *                                              Menu         
 * ////////////////////////////////////////////////////////////////////////////////////////////////
*/
    define( 'I_DO', 'I Can:');
    
    define ( 'Pages', 'Pages');
      
/**
 * ////////////////////////////////////////////////////////////////////////////////////////////////
 *                                              Menu options        
 * ////////////////////////////////////////////////////////////////////////////////////////////////
*/
    define('MENU_SECTION1_ITEM1', 'News'); 
    define('MENU_SECTION1_ITEM2', 'Main');
    define('MENU_SECTION1_ITEM3', 'Guestbook');
    define('STUFF', 'Different stuff!');

    


/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * news module
///////////////////////////////////////////////////////////////////////////////////////////////// */               
    define( 'NEWS_NOT_ENTERED', 'News are not entered!');
    define ('NEWS_ENTER', 'Enter Your news!');       
       
       
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Guestbook module
///////////////////////////////////////////////////////////////////////////////////////////////// */               
    define('GUESTBOOK_NAME', 'Name:');
    define('GUESTBOOK_MESSAGE', 'Message: ');

    define('GUESTBOOK_ENTER_MESSAGE', ' Enter Your Message!');
    
    define('GUESTBOOK_EMPTY_LOGIN','Name field is empty!' );
    define('GUESTBOOK_EMPTY_MESSAGE', ' Message field is empty!');
           
       
    
/** //////////// ////////////////////////////////////
* Admin's panel
/////////////////////////////////////////////////////// */       
    define('ADMIN_DELETE', 'Delete');
    DEFINE('ADD', 'ADD');
    
    
           

        

    
    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Admin's Panel variables
///////////////////////////////////////////////////////////////////////////////////////////////// */        
   define('ADMIN_PANEL', 'Admin\'s Panel');
    
    define('MENU_METATAGS', 'Metatags');
    define('MENU_EXIT', 'Exit');
         


/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Metatags 
///////////////////////////////////////////////////////////////////////////////////////////////// */        
    define('SETTING_METADATA', 'Setting Metadata for module');
    
    define('TITLE', 'Title');
    define('KEYWORDS', 'Keywords');
    define('DESCRIPTION', 'Description');
    
       
       define('SITE_NO_TITLE', 'Title is not set!');
       define( 'SITE_NO_KEYWORDS', 'No keywords are set!');
       define('SITE_NO_DESCRIPTION', 'No description is entered!');
   
       define( 'NOT_SELECTED', 'Not selected!');


/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Static Pages
///////////////////////////////////////////////////////////////////////////////////////////////// */ 
    define('EDITING_PAGE', 'Editing page:');
    define('SITE_INVALID_DATA', 'Data is not correct!');
    define('SITE_DOUBLE_LINK', 'Url exists!');

    define('STATIC_PAGES', 'Articles');
    define('STATIC_NAME_URL', 'Name Url (only latin & <u> unique</u>)');
    define('STATIC_NAME_LINK', 'Name Article');
    
    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 24.08.10
///////////////////////////////////////////////////////////////////////////////////////////////// */ 
    define('GENERAL_HEADER','Elmor\'s Homepage. Welcome! Really nice to see you.'); // To be displayed at  the top of the page
    define('ALT_CUR_LANG', 'Current language'); // ALT text of the current language image
    define('PAGE_TOP', 'Go to top'); //footer link to the top
    define('CHOOSE_LANG', 'Choose Language'); //sign to choose language
    define('ELMOR_HOST', 'Generous Host'); // Host of the site

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 26.08.10
///////////////////////////////////////////////////////////////////////////////////////////////// */ 
    define('EDITING_NEWS', 'Editting News'); 
    define('GEN_RETURN', 'Return'); 
    define('NOT_EMPTY', 'Can\' be empty!'); 

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 28.08.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('TO_THE_SITE', 'Look at Site');
    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 31.08.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('IMPORTANT', 'Important'); //
    define('WHAT_HERE', 'What works'); //
    define('RESUME', 'Resume'); //
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 08.09.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('GALLERY', 'Gallery'); //GALLERY

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 21.09.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('ENTER_CAPTCHA', 'Enter Captcha:'); // 
    define('WRONG_CAPTCHA', 'Wrong Captcha!'); //      
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 21.10.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define ('JQUERY_UNITS', 'jQuery units');
    define('NAME_JQUERY', 'Name jQuery');
    define('EDITING_JQUERY', 'Editing jQuery');
    define('JQUERY_TEXT', 'jQuery text');

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 24.10.10
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('MODULE_INFO', 'Info'); //
    define('TITLE_EXIT', 'Exit as registered user');
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * Titles of menu
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('TITLE_IMPORTANT','Resume & etc ;)'); //
    define('TITLE_I_DO','News,Guestbook etc'); // 
    define('TITLE_JQUERY','Units that show how easy jQuery is');// 
    define('TITLE_MODULE_INFO','Information( about me)'); //
    define('TITLE_STATIC_PAGES','Articles of interest');// 
    define('TITLE_STUFF','Different stuff');//
    define('MAIN', 'Sitemap'); //
    define('TITLE_OFFICE', 'Edit yout profile');
/** //////////// array modules names for metatags formating in admin's panel /////////////////// */
    $language = array(
                      'important' => 'Improtant',
                      'news' => 'News',
                      'register' => 'Register on this Homepage',
                      'guestbook' => 'Guestbook',
					  'jquery' => 'jQuery scripts',
                      'info' => 'Info',
                      'main' => 'Articles',
                      'map' => 'Website Map',
                      'download' => 'Downloads'
                      );       
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 *  sitmap
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('MAP_MAIN', 'Articles  on germanic paganism, mainly in Russian!'); // 
    define('MAP_INFO', 'Different information like contacts etc.');
    define('MAP_JQUERY', 'jQuery units - to show how jQuery works');
    define('MAP_RESUME', 'My resume');
    define('MAP_WORK', 'What works here');
    define('MAP_NEWS', 'News of this Homepage');
    define('MAP_GUESTBOOK', ' Guestbook of this Homepage');
    define('MAP_REGISER', 'Enter website as registered user');
    
    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 02.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('REGISTER', 'Register');   
    define('LOGIN', 'Login');
    define('PASSWORD', 'Password');
    define('REPEAT_PASS', 'Repeat password');  
    define('PICK_ANOTHER', ' is buisy! Pick another one!');
    define('LOGIN_EMPTY', 'Login is empty!');
    define('DIFFERENT_PASS', 'Passwords must be the same!');
    define('SHORT_PASS', 'Password is too short (Password>4)');
    define('LONG_PASS', 'Login is too long (Login<20)');
    define('REMEMBER_YOU', 'Remember you?');
    
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 03.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('ENTER', 'Enter');
    define('WELLCOME_1', 'Welcome <b class=imp>');
    define('WELLCOME_2','</b>, nice to see you!');
    define('WRONG_USER_PASS', 'Wrong username and/or password');     
    define('TITLE_ENTER', 'Enter the Homepage for registered users');
    define('TITLE_REGISTER', 'Register on this Homepage');

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 04.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('EXIT_USER', 'Exit');
    
    define('ENTER_REAL_EMAIL', 'Enter real E-Mail');
    define('ENTER_EMAIL', 'Enter E-Mail!');
    define('ERROR_IN_EMAIL', 'There is an error in E-Mail');
    define('RESTORE_PASS','Restore Password');
    define('ACTIVATE_ACCOUNT', 'Activate account');

/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 05.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
     define('CODE_NOT_CORRECT', 'Code is not correct!');    
     define('EMAIL_SEND' , 'Activation code  was send to ');
     define('ERROR_EMAIL', 'There was an error sending email!');
     define('NO_EMAIL', 'No such registered email!');
     define('OR_CAN', ' or you can ');
     define('RESTORE_FORGOTTEN' , 'restore forgotten password');
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 06.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
     define('ACTIVATE_INVALID', 'Code is not correct!');
     define('EMAIL_SEND_CODE1', 'On email adress ');
     define('EMAIL_SEND_CODE2', ' was send an activation code.');
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 07.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
     define('OFFICE', 'Office');
     define('UPDATE', 'Update');
     define('INFO_UPDATED', 'Information on this record was updated!');
    define('ACTIVATE_NEED_ACCOUNT', 'You need to activate your account before posting any messages');
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 10.11.2010
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('DELETE_OLD', 'Delete not activated older 10 than days');
/** /////////////////////////////////////////////////////////////////////////////////////////////////
 * 28.05.2011
///////////////////////////////////////////////////////////////////////////////////////////////// */
    define('DOWNLOAD', 'Download');
    define('TITLE_DOWNLOAD', 'You can download from this website');
?>
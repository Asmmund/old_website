<?php
/**
 * @author Elmor
 * @copyright 2010
 */
/** //////////////////////////////////////////////////////////////////////////////////////////////////
 * /////////////////////// chesking the passkey ;)
///////////////////////////////////////////////////////////////////////////////////////////////////////// */
    if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT . './404.html') );
    }

/** //////////////////////////////////////////////////////////////////////////////////////////////////
 *  Entry of the user
////////////////////////////////////////////////////////////////////////////////////////////////// */ 
// if user registered or user chose to keep the connection before that    
    if( !$ok && isset($_COOKIE['hash']))
    {
        include SITE_ROOT . 'modules/register/functions.php';
        $_SESSION['user_data'] = getLogin($_COOKIE['hash']);
    }
//of if new user is entering chech given info    
    elseif($ok)
    {
        $res = mysqlQuery("SELECT *
                           FROM " . MYSQL_REG_USR . "
                           WHERE login = '" . escapeString($POST['value1']) . "'
                           AND password = '" . md5($POST['value2'] . SITE_SALT) . "'
                           ;" );
                           
        if(mysql_num_rows($res) > 0)
        {
            $_SESSION['user_data'] = mysql_fetch_assoc($res);
            if($POST['value4'])
            {
                include SITE_ROOT . 'modules/register/functions.php';
                setAutoLogin($_SESSION['user_data']['id']);
            }
        }
    }
    if(!empty($_SESSION['user_data']) )
        $info[] = WELLCOME_1 . htmlChars($_SESSION['user_data']['login']) . WELLCOME_2;
    elseif($ok)
       $info[] = WRONG_USER_PASS;        
?>
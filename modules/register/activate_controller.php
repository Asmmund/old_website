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
    
// set variable to true - meaning errors for security    
    $error = true;
    
    if($ok && !empty($POST['value1']))
    {
        include SITE_ROOT . 'modules/register/functions.php';
         if( $user_data = getLogin($POST['value1'],true))
         {
            mysqlQuery("UPDATE " . MYSQL_REG_USR . "
                        SET activate = '1'
                        WHERE id = '" . $user_data['id'] . "' ;");
                        
            $_SESSION['user_data'] = $user_data;
            $_SESSION['email'] = $user_data['email'];
            
            if($POST['value4'])
                setAutoLogin($_SESSION['user_data']['id']);

//deleting users that were not autorised for 10 days                
            $res = mysqlQuery("DELETE FROM " . MYSQL_REG_USR . "
                               WHERE activate != '1'
                               AND date < NOW() - INTERVAL 10 DAY;");
                               
            reDirect('page=register', 'module=office', 'id=0');
         }
         else
             $info = ACTIVATE_INVALID;
    }
    $info[] = EMAIL_SEND_CODE1 . (isset($_SESSION['email'])?$_SESSION['email']:'') . EMAIL_SEND_CODE2;

?>
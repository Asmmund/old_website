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
    
    
           if( $ok )
    {
// varification of the entered data        
/*        if(  empty($_SESSION['captcha']) || ($_SESSION['captcha'] !== $_POST['txtCaptcha'])  )
             $info[] = WRONG_CAPTCHA;
*/                                          
        if( !$POST['value1'])
            $info[] = LOGIN_EMPTY;
        elseif(mb_strlen($POST['value1']) > 20 )
            $info[] = LONG_PASS;
        
            
        if(mb_strlen($POST['value2']) < 4 )
            $info[] = SHORT_PASS;
                
        if( $POST['value2'] !== $POST['value3'])
            $info [] = DIFFERENT_PASS;    
        
        if(!$POST['value5'])
            $info[] = ENTER_EMAIL;
// preg_match preg_match — Perform a regular expression match
        elseif(!preg_match("/^[a-z0-9_.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $POST['value5']))
            $info[] = ERROR_IN_EMAIL;
        
        
        
        $chk = "SELECT *
                FROM ". MYSQL_REG_USR . "
                WHERE login = '" . escapeString($POST['value1']) . "';";
        $res = mysqlQuery($chk);
        if(mysql_num_rows($res) > 0)
             $info[] = LOGIN . ' <b class=imp>' . htmlChars($POST['value1']) . '</b> ' . PICK_ANOTHER;
        
//registration of the new user        
        if(count($info) == 0)
        {
            include SITE_ROOT . 'modules/register/functions.php';
            include SITE_ROOT . 'libs/mail.php';
            
            mysqlQuery("INSERT INTO ". MYSQL_REG_USR ."  
                    SET 
                    login    = '". escapeString($POST['value1']) ."',  
                    password = '". md5($POST['value2'] . SITE_SALT) ."' ,
                    email = '" . escapeString($POST['value5']) . "';"   
                    );  
    
            

// mysql_insert_id — Get the ID generated in the last query
            $id = mysql_insert_id();
            $hash = md5( randStr() . $id);
            
// fixing the $hash in DB            
            mysqlQuery("UPDATE " . MYSQL_REG_USR . "
                        SET hash ='" . $hash . "'
                        WHERE id = '" . $id . "'
                        ;");
                        
            $_SESSION['email'] = $POST['value4'];
            
            include SITE_ROOT . 'libs/mail.php';
            
                    
              allertEmail($POST['value5'], $res_sub, $res_mes, $headers_general);
              
              allertEmail($admin_mail,$new_user_sb, $new_user_mes, $headers_general);
              
              
              /*                 
              include SITE_ROOT . 'libs/irb_mailer.php';
              $mail = new IRB_Mailer($res_mes);
              
              $mail -> createTo($POST['value5']);
              $mail -> createSubject($res_sub);
              $mail -> createFrom($hp_mail);
              $mail -> setHtml();
              $error = $mail -> sendMail();
              */
              reDirect('module=activate');    
        }
    }
      
           
    


?>
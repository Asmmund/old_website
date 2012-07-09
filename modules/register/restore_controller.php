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
    
    include SITE_ROOT . 'libs/mail.php';
// for security measures set $error as true at the beggining
    $error = true;

// if code entered correctly, then proseed
if($ok && !empty($GET['id']) )
    {
        include SITE_ROOT . 'modules/register/functions.php';
        
        if( $user_data = getLogin($GET['id'], true) )
        {
            $_SESSION['user_data'] = $user_data;
            
            if($POST['value2'])
                setAutoLogin($_SESSION['user_data']['id']);
                
            reDirect('host');
            
        }
        else
            $info[] = CODE_NOT_CORRECT;
    } 
    elseif($ok)
    {
// looking for email & login in subd        
        $res = mysqlQuery(" SELECT email, id
                            FROM " . MYSQL_REG_USR . "
                            WHERE login = '". escapeString($POST['value1']). "'
                            AND email = '" . escapeString($POST['value2']) . "' ;" );
     
// if such row exists, then we sed an email with hash & update hash in database        
        if(mysql_num_rows($res) > 0)
        {
            include SITE_ROOT . 'modules/register/functions.php';
            
            $row = mysql_fetch_assoc($res);
            
            $hash = md5( randStr() . $row['id']);

            $res_sub = 'Restoring password';
    
       
            $res_mes = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                               <html>
                               <head>
                               </head>

                               <body>
                               <center>
                               There was a request from your e-mail address to restore  account at <b>'. SITE_HOST . '</b><br><br>
                               To restore account follow <a href="' . href('page=register', 'module=restore' , 'id='. $hash) .'">THIS LINK </a><br><br>
                               And in the activation field enter this code :<b>' . $hash . '</b><br><br>
                               Thank you !
                                
                                </center>
                               </body>
                               </html>';    
                               
                               
            mysqlQuery("UPDATE " . MYSQL_REG_USR . "
                        SET hash = '" . $hash . "'
                        WHERE id = '" . escapeString($row['id']) . "' ;");
            
           
           /*
            include SITE_ROOT . 'libs/irb_mailer.php';
            
            
            $mail = new IRB_Mailer($res_mes);
            $mail -> createTo();  
            $mail -> createSubject($res_sub);  
            $mail -> createFrom($hp_mail, $hp_mail); 
            $mail -> setHtml();
            $error = $mail -> sendMail();
            var_dump($error); */              
            if( allertEmail($row['email'], $res_sub, $res_mes, $headers_general))
                $info[] = EMAIL_SEND . $row['email'];
            else
                $info[] = ERROR_EMAIL;  
                        
    }
     else
            $info[] = NO_EMAIL;
    }        
?>
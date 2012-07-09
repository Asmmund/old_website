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

/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * Config of the guestbook email warnings
 /////////////////////////////////////////////////////////////////////////////////////////////////// */    
      $message_new_guestbook = 'New message in the Guestbook';
      
      $text_email_guestbook = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                               <html>
                               <head>
                               </head>

                               <body>
                               <a href="' . href('page=guestbook' , 'module=read') . '#posts"> New message in the guestbook</a><br>
                               <hr width=40%>
                               <a href="http://elmor.456room.org/admin/guestbook/read/0/0"> Admin of the guestbook</a><br>
                               Message send - '. date("d.m.Y H:i:s").'<br>
                           
                               </body>
                               </html>';
      $headers_general = 'Content-Type:text/html;charset:utf8\r\n;';
      $headers_general.= 'From: Homepage<elmor@456room.org>\r\n\r\n';
      $hp_mail = 'Homepage<elmor@456room.org>';
      $admin_mail = 'antony.ermolenko@gmail.com';
      

/** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * Restoring password
 /////////////////////////////////////////////////////////////////////////////////////////////////// */    
    
             $res_sub = 'Activating user profile';
    
       
            $res_mes = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                               <html>
                               <head>
                               </head>

                               <body>
                               <center>
                               From your email account  there was a request to activate user profile on <b> 
                               ' . SITE_HOST .'</b><br><br>
                               To access the User profile follow <a href="' 
                                    . href('page=register', 'module=activate', 'id=' . $hash ) .'">THIS LINK</a>
                               and in activation field enter this code <b>' . $hash . '</b><br><br>
                               Code is active up to ' . date('d.m.Y', time() + 60*60*24*10) .'
                               </center> 
                               </body>
                               </html>';
                               
    
    
    $new_user_sb = 'New user!';
    $new_user_mes = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
                               <html>
                               <head>
                               </head>

                               <body>
                               <center>
                               New user on<b>' . SITE_HOST .'</b><br><br>
                               With Login <b>'. $POST['value1'] . '</b><br>
                               Registered at ' . date('d.m.Y') .'<br>
                               <a href="http://elmor.456room.org/admin/register/read/0/0" title="Edit">Edit</a>
                                
                                </center>
                               </body>
                               </html>';
                       
    
      
?>
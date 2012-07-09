<?php
/**
 * controller of the office
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
    
    
// Updating the personal information 
    if($ok)
    {
          if(mb_strlen($POST['value2']) < 4 )
            $info[] = SHORT_PASS;
                
        if( $POST['value2'] !== $POST['value3'])
            $info [] = DIFFERENT_PASS;    
        
        if(!$POST['value4'])
            $info[] = ENTER_EMAIL;
// preg_match preg_match — Perform a regular expression match
        elseif(!preg_match("/^[a-z0-9_.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $POST['value4']))
            $info[] = ERROR_IN_EMAIL;
            
        if(count($info) == 0)
        {
            $pass = !empty($POST['value2'])? "password = '" . md5($POST['value2'] . SITE_SALT ). "', ": null;
            
            mysqlQuery("UPDATE " . MYSQL_REG_USR . "
                        SET " . $pass. "
                        email = '" . escapeString($POST['value4']) . "'
                        WHERE id = '" . (int)$_SESSION['user_data']['id'] . "'
                        ;");     
                        
            if(mysql_affected_rows() >0 )
                $info[] = INFO_UPDATED;
        }
    }
/**
 * read the information
*/
    $res = mysqlQuery("SELECT *
                       FROM " . MYSQL_REG_USR . "
                       WHERE id = '" . $_SESSION['user_data']['id'] . "';");
    if(mysql_num_rows($res)>0)
        $data = htmlChars(mysql_fetch_assoc($res));

?>

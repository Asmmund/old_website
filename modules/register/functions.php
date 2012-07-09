<?php
/**
 * file of functions (used in registration module ONLY!)
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
    
/**
 * @author Elmor
 * @copyright 2010
 * function for generating random string 
 * @param int
 * @return string..
*/
    function randStr( $num = 10)
    {
//getting initial arrays         
        $a = range('!', '@');
        $b = range ('a', 'z');
        $c = range ( 'A', 'Z');
        
// creating sofisticated array out of initial 3 !        
        $arr = array_merge($a, $b);
        $arr = array_merge($arr, $a);
        $arr = array_merge($arr, $c);
        
// $key - resulting output, and microtime — Return current Unix timestamp with microseconds
        $key = '';
        $rand = microtime(true);
        
// for each number(up to needed) we shuffle array $a, then return the given letter of the array
// number of it found by formula. then get system time for the next time        
        for($i = 0; $i<$num; $i++)
        {
            shuffle($a);
            $key .= $arr[(round(($rand * 1000 - floor($rand * 1000)),2) * 100 )];
            $rand = microtime(true);
        }
        
//return resulting string        
        return $key;
    }    
    
/**
 * @author Elmor
 * @copyright 2010
 * function of setting up autologin 
 * @param int
 * @return void
*/    
    function setAutoLogin($id)
    {
// getting random hash        
        $hash = md5( randStr() . $id);

//setting cookie with the help of random hash        
        setcookie('hash', $hash, time()+ 3600 + 24 + 30, '/');
        
//updating mysql table with info about the hash        
        $res = mysqlQuery("UPDATE ". MYSQL_REG_USR . "
                           SET hash = '". $hash . "'
                           WHERE id = '". $id . "'");
    }

/**
 * @author Elmor
 * @copyright 2010
 * function of getting autologin info 
 * @param $hash = string
 *        $activate = bool
 * @return array or void
*/    
    function getLogin( $hash, $activate = false)
    {
// setting up $and variable - used in case of activate        
        $and = '';
        
// if variable active is passed  then :        
        if(!$activate)
            $and = "AND activate = '1'";
            
            $res = mysqlQuery("SELECT *
                               FROM ". MYSQL_REG_USR . "
                               WHERE hash = '" . escapeString($hash) . "'
                               ". $and . " ;");
                               
       if(mysql_num_rows($res) > 0 )
           return mysql_fetch_assoc($res);
       else
           return false;                        
    }


?>
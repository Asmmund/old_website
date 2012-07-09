<?php
/**
 * @author Elmor
 * @copyright 2010
 */
    /** ///////////////////////////////////////////////////////////////////////
  * //////////////////////cheking protection key
  * ///////////////////////////////////////////////////////////////////////
 */
 
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT. '404.html') );
    };

/**
 * @author Elmor
 * @copyright 2010
 * Function of processing strings for mysql
 * @param string to be prosecced
 * @return result of work
*/   
    function escapeString( $string)
    {
// if $string is array, than call the function itself again
// else work with mysql_real_escape_string
// mysql_real_escape_string — Escapes special characters in a string for use in a SQL statement        
        if( is_array( $string) )
            $string = array_map('escapeString', $string);
        else
            $string = mysql_real_escape_string(htmlChars($string));
            
       return $string;    
        
    }


/**
 * @author Elmor
 * @copyright 2010
 * Function to ease the setting the connection
 * @param string with mysql query
 * @return result of work
 * 
 * works with Cruft Free URLs or without it
*/   
function mysqlQuery($sql, $print = false) 
    { 
        $result = mysql_query($sql, MYSQL_CONNECT_VAR); 

        if($result === false || $print) 
        { 
         
            $error =  mysql_error(); 
            $trace =  debug_backtrace(); 
            
            $head = $error ?'<b style="color:red">MySQL error: </b><br> 
            <b style="color:green">'. $error .'</b><br><br>':NULL;     
             
            $error_log = date("Y-m-d h:i:s") .' '. $head .' 
            <b>Query: </b><br> 
            <pre><span style="color:#CC0000">'. $trace[0]['args'][0] .'</pre></span><br><br>
            <b>File: </b><b style="color:#660099">'. $trace[0]['file'] .'</b><br> 
            <b>Line: </b><b style="color:#660099">'. $trace[0]['line'] .'</b>'; 
             
/** 
* @TODO To clean in release 
*/ 
//----------------------------- 
           die($error_log); 
//----------------------------- 

            file_put_contents(SITE_ROOT .'log/mysql.log', strip_tags($error_log) ."<br><br>", FILE_APPEND); 
            header("HTTP/1.1 404 Not Found"); 
            die(file_get_contents(SITE_ROOT .'/404.html')); 
        } 
        else 
            return $result; 
    } ;   
    
    
    
    
    
    
    
    
    
    
/**
 * Connection settings of the MYSQL DB
*/    
    
// connection settings for the mysql server
    $db_irbis = mysql_connect( MYSQL_DBSERVER, MYSQL_DBUSER, MYSQL_DBPASSWORD ) or die( mysql_error());
    
// constant to define connection
    define( 'MYSQL_CONNECT_VAR', $db_irbis );
    
// select table from the databaze!
    mysql_select_db( MYSQL_DATABASE,MYSQL_CONNECT_VAR ) or die( mysql_error() ); 
    
/**
 * input coding of the page
*/
    mysqlQuery('SET NAMES utf8');          
    mysqlQuery('SET CHARACTER SET utf8');  
    mysqlQuery('SET COLLATION_CONNECTION="utf8_general_ci"');       
?>
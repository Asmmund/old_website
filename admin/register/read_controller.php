<?php
/**
 * @author Elmor
 * @copyright 2010
 */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('../../404.html') );
    }
///////////////////////////////////////////////////////// 


    $tpl = getTpl('admin/register/user');

    $res = mysqlQuery("SELECT *
                       FROM " . MYSQL_REG_USR . "");

    while( $row = mysql_fetch_assoc($res))
    {
        
        $row = htmlChars($row);
        
// getting ready for output word of the tpl for this row            
        $gen_out .= "
        <tr>
            <td><input name=form[array1][] type=checkbox value=" . $row['id'] .">#" .$row['id'] . "</td>
            <td>" . $row['login'] . "</td>
            <td>". $row['date'] . "</td>
            <td>". $row['email'] . "</td>
            <td>" . ( ($row['activate']==0)?'<B class="info">Not activated</B>': 'activated') . "</td>
        </tr>
        
        ";
            
    }
    
    
/** if ok button is pressed  delete chosen posts*/
    
    if($ok)
    {
        /* 
array array_map ( callback $callback , array $arr1 [, array $... ] )

array_map() returns an array containing all the elements of arr1 after 
applying the callback function to each one. The number of parameters
that the callback function accepts should match the number of arrays 
passed to the array_map() 
*/        
        mysqlQuery("DELETE FROM " . MYSQL_REG_USR . "  
                     WHERE `id` IN (". implode(', ', array_map('intval', $POST['array1'])) .")"  
                      );
                      
        reDirect();          
    }
/** if delete button was pressed  delete not activated users older than 10 days*/    
    if($delete)
    {
        //deleting users that were not autorised for 10 days                
            $res = mysqlQuery("DELETE FROM " . MYSQL_REG_USR . "
                               WHERE activate != '1'
                               AND date < NOW() - INTERVAL 10 DAY;");
            reDirect();
    }
?>
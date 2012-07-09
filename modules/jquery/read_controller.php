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
        exit( file_get_contents('../.././404.html') );
    }
        

/**
 * @author Elmor
 * @copyright 2010
 * function returning the jQuery units 
 * @param $id - id of the jquery unit(UNIQUE!)
 * @return array or false..
 * works with MYSQL_JQUERY constant - the name of the table
*/

    function getJquery( $id )
    {
// sequring ourselfes from attack        
        $page = mysql_escape_string( $id );
        
// query for selecting the info        
        $query = "SELECT * 
                  FROM " . MYSQL_JQUERY . "  
                  WHERE id = " . $id . " LIMIT 1;" ;
        
        $res = mysqlQuery($query);
        

// if there are results, return them, else return false        
        if(mysql_num_rows($res) >0 )
            {
                $row =  mysql_fetch_assoc($res) ;
                return $row;    
            }
        else
            return false;    
    }
    
   

 
    
/**    ///////////////////////////////////////////////////////////////////////////////////////
 * Reading page
/////////////////////////////////////////////////////////////////////////////////////// */
    $jquery = getJquery($GET['id']) ;
     
      
?>
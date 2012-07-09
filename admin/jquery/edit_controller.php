<?php
/**
 * @author Elmor
 * @copyright 2010
 */
/** ////////////////////////////////////////////////////////
 * Security measures
//////////////////////////////////////////////////////// */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT . '404.html') );
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



/**
 * @author Elmor
 * @copyright 2010
 * function of updating articles 
 * @param $id - id of the unit
 *        $name - name of the article
 *        $text - updatet text 
 * @return true of false
 * works with MYSQL_JQUERY constant - the name of the table
*/
    function updateJquery( $id,  $name, $text )
    {
// sequrity measures        
        $text = mysql_escape_string( $text );
        $name = mysql_escape_string( $name );
        $id = mysql_escape_string( $id );
        
        $check = 'SELECT *
                  FROM ' . MYSQL_JQUERY . '
                  WHERE id = "' . $id . '";';
          $chk = mysqlQuery( $check);
          
          if(mysql_num_rows($chk) > 0 )
          {
// query for updating 
                $query =  'UPDATE ' . MYSQL_JQUERY . ' 
                          SET name = "' . $name . '",
                          text = "' . $text . '"
                          WHERE id = "' . $id . '";';

// and updating         
                $res = mysqlQuery($query);
                return true;
        }
        else
            return false;
    }
    
    
///////////////////////////////////////////////////////////////////////////////////
    $jquery = getJquery($GET['id']);

// if the edit button was pressed then we save the edited text & fo to read module    
    if($ok)
    {
        updateJquery($jquery['id'], $POST['value1'], $POST['value2']);
        
        reDirect('module=read');
            
    }

?>
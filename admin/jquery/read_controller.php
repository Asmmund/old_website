<?php
/**
 * @author Elmor
 * @copyright 2010
 */
   if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents(SITE_ROOT . '404.html') );
    }
///////////////////////////////////////////////////////// 
 
    
/**
 * @author Elmor
 * @copyright 2010
 * function returning the jQuery units 
 * @param $id - id of the jquery unit(UNIQUE!)
 * @return array or false..
 * works with MYSQL_JQUERY constant - the name of the table
*/

 


/**
 * @author Elmor
 * @copyright 2010
 * function creating the jQuery unit 
 * @param none
 * @return true or false..
 * works with MYSQL_JQUERY constant - the name of the table
*/
    function createJquery($name, $text)
    {

//sequrity measures        
        $page = mysql_escape_string( $page ) ;
        $name = mysql_escape_string( $name );

/* cheking the existense of 
such row... if the check is negarive
mysql_num_rows($chk) == 0 then proseed, else we
return false.
*/
        $check = 'SELECT *
                  FROM ' . MYSQL_JQUERY . '
                  WHERE name = "' . $name . '";';
        $chk = mysqlQuery( $check);
          

            if( mysql_num_rows($chk) == 0)
                {
// query of adding info        
                    $query = 'INSERT  INTO ' . MYSQL_JQUERY . ' (
                              name,
                              text)
                              VALUES (
                              "' . $name . '",
                              "' . $text . '");';
                   
                    $res = mysqlQuery($query);
                    return true;
              }
              else
                  return false;
    }
    
/**
 * @author Elmor
 * @copyright 2010
 * function of creating menu of articles 
 * @param 
 * @return string or false..
 * works with MYSQL_JQUERY constant - the name of the table + "pages_menu" css class
*/    
    function jqueryMenu()
    {
// set the start of the menu        
        $menu = '<ul class=pages_menu><br>';
/* 
reading from the  mysql table values
*/       
        $query = 'SELECT *
                  FROM ' . MYSQL_JQUERY . ';';
                  
        $res = mysqlQuery( $query );
        
// going through each row & making a link        
        while( $jquery = mysql_fetch_assoc($res) )
        {
            $menu .= '<li>
                          <input name="form[array1][]" type=checkbox value="' . $jquery['id'] . '"> 
                          <a href="' . href('module=edit', 'id=' . $jquery['id']) . '  ">' . $jquery['name'] . '</a>
                          ';
        }
        return $menu . '</ul><br>';
    }        

/** ////////////////////////////////////////////////////////////////////////////////////////////////
 * CREATING new jQuery
//////////////////////////////////////////////////////////////////////////////////////////////// */
    if( $ok && $POST['value1'])
    {
        if( !createJquery($POST['value1'], $POST['value1']))
            $info[] = 'Error!';
        else
            reDirect();
    } 
    
/** ////////////////////////////////////////////////////////////////////////////////////////////////
 * deleting units
//////////////////////////////////////////////////////////////////////////////////////////////// */
    if( $delete )
    {
        mysqlQuery( "DELETE FROM `". MYSQL_JQUERY. "`  
                    WHERE `id` IN (". implode(', ', array_map('intval', $POST['array1'])) .")");
                    reDirect();
    }

?>
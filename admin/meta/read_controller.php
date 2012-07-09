<?php
/**
 * Controller of the metatags

 * @author Elmor
 * @copyright 2010
 */
/** ////////////////////////////////////////////////////////////////////
 *             Generating the security key
 * 
//////////////////////////////////////////////////////////////////// */
    if( !defined('SITE_KEY') )
    {
        header('HTTP/1.1 404 Not Found');
        exit( file_get_contents(SITE_ROOT . '404.html') );
    };

/** ////////////////////////////////////////////////////////////////////////// 
 * Including file scanning lib
////////////////////////////////////////////////////////////////////////// */ 
    include SITE_ROOT . 'libs/scan.php';    
/**
 * @author Elmor
 * @copyright 2010
 * function of updating metatags 
 * @param $tag - tag to find in MySql table
 *        $page - page the tag we're looking for.
 * @return true of false
 * works with MYSQL_METATAGS constant - the name of the table
*/
    function updateMeta($tag, $data, $page)
    {
// sequrity measures        
        $tag = escapeString( $tag );
        $data = escapeString( $data );
        $page = escapeString( $page );
// cheching		
        $check = 'SELECT *
                  FROM ' . MYSQL_METATAGS . '
                  WHERE page = "' . $page . '";';
          $chk = mysqlQuery( $check);
// if the result is positive          
          if(mysql_num_rows($chk) > 0 )
          {
// query for updating tag
                $query = 'UPDATE ' . MYSQL_METATAGS . ' 
                          SET ' . $tag . ' = "' . $data . ' "
                          WHERE page = "' . $page . '" LIMIT 1;';

// and updating tag        
                $res = mysqlQuery($query);
                return true;
        }
        else
            return false;
    }
    
    
/**
 * @author Elmor
 * @copyright 2010
 * function of creating metatags 
 * @param $page - page the tag we're creating for.
 * @return true or false..
 * works with MYSQL_METATAGS constant - the name of the table
*/  
  
    function createMeta($page)
    {
//sequrity measures        
        $page = escapeString( $page ) ;

/* cheking the existense of 
such row... if the check is negarive
mysql_num_rows($chk) == 0 then proseed, else we
return false.*/
        $check = 'SELECT *
                  FROM ' . MYSQL_METATAGS . '
                  WHERE page = "' . $page . '";';
          $chk = mysqlQuery( $check);
          
          if( mysql_num_rows($chk) == 0)
                  {
// query of adding info        
                    $query = 'INSERT  INTO ' . MYSQL_METATAGS . ' (
                             page,
                             title,
                             description,
                             keywords)
                             VALUES (
                             "' . $page . '",
                             "' . SITE_NO_TITLE . '",
                             "' . SITE_NO_DESCRIPTION . '",
                             "' . SITE_NO_KEYWORDS . '"); ';
                   
                       $res = mysqlQuery($query);
                       return true;
                  }
               else
                    return false;
    }
    
  
      
/** ///////////////////////////////////////////////////////////////////////
 * @author Elmor
 * @copyright 2010
 * Function of generating the menu of modules
 * 
 * @param list of names of modules
 * @return list of modules
/////////////////////////////////////////////////////////////////////// */
    function pagesMenu($language)
    {
//getting the array of names of modules
        $files = getFiles();

// for each module create the row in mysql table
// don't forget that         
        foreach ($files as $module)
            createMeta($module);
        
        $query = 'SELECT *
                  FROM ' . MYSQL_METATAGS .  ' ;';
                  
        $chk = mysqlQuery($query);
        
        if (mysql_num_rows($chk) > 0)
            $links = $chk;
        else
            $links = array(null, array(null, null) );

// setting the menu as the list id="navMenu"       
        $menu = '<ul class=\'pages_menu\'>';   
      
        while( $row = htmlChars(mysql_fetch_assoc($links)) )
        
// paste link per module & connect the string to the language file         
            $menu .= '<li>    
                      <a href="'.  href( 'module=' . $row['page']  ) .'" >'. $language[$row["page"]] ."</a>   
                      </li><br>";
        return $menu. '</ul><br>';
    }    
    
    
/** //////////////////////////////////////////////////////////////////////////////////////////////////
 *    setting the data for meta-tags 
////////////////////////////////////////////////////////////////////////////////////////////////// */
    
    
//if the ok button was pressed    
    if( $ok )
    {
// updating MySql table with inputed data        
        updateMeta('title',$POST['value1'], $GET['module']);
        updateMeta('keywords',$POST['value2'], $GET['module']);
        updateMeta('description',$POST['value3'], $GET['module']);
// redirecting        
        reDirect();
                                       
    }
?>
<?php
/**
 * @author Elmor
 * @copyright 2010
 * view php
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

    
    
/** ///////////////////////////////////////////////////////////////////////
  * ////////////////////// security function of proccessing arrays
  * @param array or string
  * @return array or string
  * ///////////////////////////////////////////////////////////////////////
*/
    function htmlChars( $data)
    {

// if this element is an array, we call the function for every element
        if( is_array($data) )
            $data = array_map( "htmlChars", $data);

// if it's not an array, then applay the htmlspecialchars function to the element        
        else
            $data = htmlspecialchars($data);

//return the processed $data;            
       return $data;        
    }
    
 

/** ///////////////////////////////////////////////////////////////////////
  * ////////////////////// Function of reading a template ;)
  * @param template name itself
  * @return string with file content of the template
  * ///////////////////////////////////////////////////////////////////////
*/
    function getTpl( $tpl )
    {
// if tpl file exists, then we return it's content ;) else output the error        
        if( file_exists(SITE_ROOT. 'skins/tpl/'. $tpl. '.tpl' ) )
            return file_get_contents(SITE_ROOT. 'skins/tpl/'. $tpl. '.tpl' );
        else
            die( 'The template <b>'. $tpl. '.tpl</b> is absent!' );
    } 
 
 


/** ///////////////////////////////////////////////////////////////////////
  * ////////////////////// function of parsing(syntacs analysis) the URL
  * @param $template itself & 
  * @return File content of the template
  * ///////////////////////////////////////////////////////////////////////
*/
    function parseTpl( $cont, $data ='' )
    {
// chech, wether the $data is an array,        
        if( is_array($data))
        {
// imports variables from an tpl to the current executing script
// the prefix is to devide the variables - so it could be seen!
            extract( $data, EXTR_PREFIX_ALL, 'tpl' );

// capturing the output with the text of the tpl            
            ob_start();
                eval( '?>'. $cont. '<?php ');
                $cont = ob_get_contents();
            ob_end_clean();
        }
        
        return $cont;
    }
    
 
 
 
/**
 * @author Elmor
 * @copyright 2010
 * function returning the metatags data for page 
 * @param $tag - tag to find in MySql table
 *        $page - page the tag we're looking for.
 * @return string or false..
 * works with MYSQL_METATAGS constant - the name of the table
*/

 
   
 
   function getMeta($tag, $page)
    {
// sequring ourselfes from attack        
        $tag = mysql_escape_string(  $tag );
        $page = mysql_escape_string( $page );
        
// query for selecting the info        
        $query = 'SELECT ' . $tag .'
                  FROM ' . MYSQL_METATAGS . '  
                  WHERE page = "' . $page . '" LIMIT 1;' ;
        
        $res = mysql_query($query);

// if there are results, return them, else return false        
        if(mysql_num_rows($res) >0 )
            {
                $row = mysql_fetch_assoc($res);
                return htmlspecialchars($row[$tag]);    
            }
        else
            return false;    
    }
    
    
    
/** ///////////////////////////////////////////////////////////////////////
 * getting metatags
 ///////////////////////////////////////////////////////////////////////*/
    $title = getMeta('title', $page);
    $keywords = getMeta('keywords', $page);
    $description =  getMeta('description', $page);
     
 
 
?>
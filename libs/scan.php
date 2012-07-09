<?php 

/** ////////////////////////////////////////////////////////////////////
 *             Generating the security key
 * 
//////////////////////////////////////////////////////////////////// */
    if( !defined('SITE_KEY') )
    {
        header('HTTP/1.1 404 Not Found');
        exit( file_get_contents(SITE_ROOT . '404.html') );
    };

//////////////////////////////////////////////////////////////////////////    

  

/** ///////////////////////////////////////////////////////////////////////
 * @author Elmor
 * @copyright 2010
 * Function of scanning directory
 * 
 * @param 
 * @return array containing the names of all of the modules!
/////////////////////////////////////////////////////////////////////// */
    function getFiles()
    {
// make it static, not to scan over&over for 1 entry        
        static $files;
        
// if it's the first time the script is ran...        
        if( empty($files) )
        {
//scanning directory ./skins/tpl (modules are there)
            $files = scandir( SITE_ROOT. '/skins/tpl');
            
// delete the system files            
//array_diff - Returns an array containing all the entries from array1 that are not present
// in any of the other arrays. 


            $files = array_diff( $files,  array(  
                                             '.',   
                                             '..',   
                                             'admin', 
                                             'admin.tpl', 
                                             'index.tpl',   
                                             'footer.tpl',
                                             'header.tpl',
                                             "list.tpl",
                                             'lang_div.tpl') );
        }
        
//return the names of modules!        
        return $files;
    }
    
  
  


?>
<?php
/**
 * @author Elmor
 * @copyright 2010
* including variables
*/
/**
 * chesking the passkey ;)
*/
    if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('./404.html') );
    };


/** //////////////////////////////////////////////////
 
 * function of removing the 'magic' quotes
 * @param array to be cleared of slashes
 * @return array cleared of slashes
   
////////////////////////////////////////////////// */
    function stripslashesDeep( $data)
    {
        return is_array($data) ? array_map( 'stripslashesDeep', $data) : stripslashes($data) ;
    }    
    
/** using this function */
    if( get_magic_quotes_gpc())
    {
        $_GET = stripslashesDeep($_GET);
        $_POST = stripslashesDeep($_POST);
        $_COOKIE = stripslashesDeep($_COOKIE);
    };    
    





/////////////////////////////////////////////////////




/** /////////////////////////////////////////////
 *         Array of $_GET params 
///////////////////////////////////////////// */
   $GET = array(  
                  'page' => 'news',  
                  'module'  => 'read',  
                  'id'   => 'all', 
                  'num'  => 0,  
                );  
/** /////////////////////////////////////////////////////
 *        Initializing the $_GET parametres
///////////////////////////////////////////////////// */
//to check, wether the SITE_REWRITE const is set or not
    if( SITE_REWRITE == 'on' && !empty($_GET['route']) )
    {
        
//return an array of substrings - parts of an adress, divided by the '/' char!         
        $param = explode('/', trim($_GET['route'], '/') );
        $param_counter = 0;
        
// using foreach cycle, we go through each value of an array,and read it from GET if it's not empty        
        foreach( $GET as $variable => $value )
        {
            if( !empty( $param[$param_counter] ) )
                $GET[$variable] = $param[$param_counter];
                
// increase the $param_count, to go through the $_get array
// it's set up via the .htaccess ;)
            ++$param_counter;                
        }
        
    }
// else, if the SITE_REWRITE const is false (no cragt free urls ), then we assign meanings to variables    
    elseif ( count($_GET) )
    {
         foreach( $GET as $variable => $value )
             if( !empty($_GET[$variable]) )
                 $GET[$variable] = $_GET [$variable];
    };
       
       



       
////////////////////////////////////////////////////////////////////////////////////

/** /////////////////////////////////////////////
 *         Array of $_POST params 
 * Rermember - value1 etc - it's for  uses of different kinds!
 * Uses:
 * 1)  ./skins/tpl/admin/meta/form_setup.tpl
///////////////////////////////////////////// */
$POST = array (
               'value1' => '',
               'value2' => '',
               'value3' => '',
               'value4' => '' ,
               'value5' => '',
               
               'array1' => array(),
               'array2' => array(),
               'array3' => array()
               );
               
               
/** ////////////////////////////////////////////////
 * Getting $_POST params
//////////////////////////////////////////////// */
// if the $_POST['form']  exists, then we
if( !empty( $_POST['form'] ))
    $POST = array_merge( $_POST['form'], array_diff_key($POST, $_POST['form']) );











////////////////////////////////////////////////////////////////////////////////////



/** ///////////////////////////////////////////////////////////////////
 *                            Buttons
/////////////////////////////////////////////////////////////////// */
$ok = !empty( $_POST['ok'] ) ? true : false;
$delete = !empty( $_POST['delete'] ) ? true : false;

////////////////////////////////////////////////////////////////////////////////////

/** /////////////////////////////////////////////
 *         Other variables
///////////////////////////////////////////////*/
    $title = '';
    $keywords = '';
    $description = '';
    $info = array();
 
 /** //////////////////////////////////////////////////////////////////////////////////////////////// 
 * * Admin's metatags file location
 /////////////////////////////////////////////////////////////////////////////////////////////////// */
  
              
?>
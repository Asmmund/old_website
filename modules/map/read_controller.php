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
        exit( file_get_contents(SITE_ROOT . './404.html') );
    }
    
/** including the scan function of modules */    
    
    include SITE_ROOT . 'libs/scan.php';
 /** ///////////////////////////////////////////////////////////////////////
 * @author Elmor
 * @copyright 2010
 * Function of generating the menu of modules
 * @param list of names of modules
 * @return list of modules
/////////////////////////////////////////////////////////////////////// */
    function pagesMenu($language)
    {
//getting the array of names of modules
        $files = getFiles();

        $menu = '';
        
        foreach($language as $key => $value)
        {
             
             if( ($key == 'main') )
                 $menu .= '<br><br><a href="' . href('page=' . $key, 'module=list'). '">' . MAP_MAIN . '</a><hr width=30% style="color: blue;">';
             elseif($key == 'info')    
                 $menu .= '<br><br><a href="' . href('page=' . $key, 'module=list'). '">' . MAP_INFO . '</a><hr width=30% style="color: blue;">';
             elseif(($key == 'jquery'))    
                 $menu .= '<br><br><a href="' . href('page=' . $key, 'module=list'). '">' . MAP_JQUERY . '</a><hr width=30% style="color: blue;">';
             elseif( $key == 'register')
             {
                $menu .= '<br><br><a href="' . href('page=' . $key, 'module=enter'). '">' . TITLE_ENTER. '</a>';
                $menu .= '<br><br><a href="' . href('page=' . $key, 'module=register'). '">' . TITLE_REGISTER. '</a><hr width=30%>';
             }    
             elseif( $key == 'important')
                 $menu .= '<br><br><a href="' . href('page=' . $key, 'module=work'). '">' .  MAP_WORK . '</a><hr width=30% style="color: blue;">' .
                             '<br><br><a href="' . href('page=' . $key, 'module=resume'). '">' . MAP_RESUME . '</a><hr width=30% style="color: blue;">
                  ';
             elseif( $key == 'news')    
                 $menu .= '<br><br><a href="' . href('page=' . $key, 'module=read'). '">' . MAP_NEWS  . '</a><hr width=30% style="color: blue;">';
             elseif( $key == 'guestbook' )
                 $menu .= '<br><br><a href="' . href('page=' . $key, 'module=read'). '">' . MAP_GUESTBOOK  . '</a><hr width=30% style="color: blue;">';
             
          
        }

        return $menu;
    }        
    

?>
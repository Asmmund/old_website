<?php
/**
 * @author Elmor
 * @copyright 2010
 * View of the main module
 */
/** ////////////////////////////////////////////////////////////////////////
   * ////////////////////////Security mesures
////////////////////////////////////////////////////////////////////////*/ 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('../.././404.html') );
    }
    
    
    
    $POST = htmlChars($POST);
    $GET['id'] = !empty($GET['id'])?htmlChars($GET['id']):'';

/** ///////////////////////////////////////////
 * Inclusion
///////////////////////////////////////////////// */ 
  switch($GET['module'])
  {
       case 'register':
           include SITE_ROOT . 'skins/tpl/register/register.tpl';
       break; 
       
       case 'activate':
           include SITE_ROOT . 'skins/tpl/register/activate.tpl';
       break;
       
       case 'office':
           include SITE_ROOT . 'skins/tpl/register/office.tpl';
       break;
           
       case 'restore':
           if(!$error || !empty($GET['id']))
               include SITE_ROOT . 'skins/tpl/register/activate.tpl';
           else
               include SITE_ROOT . 'skins/tpl/register/restore.tpl';
       break;
       
       case 'enter':
       default:
           include SITE_ROOT . 'skins/tpl/register/enter.tpl';
       break; 
  } ; 
    
?>
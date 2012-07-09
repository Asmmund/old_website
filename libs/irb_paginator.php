<?php  
  
  
  
/** ////////////////////////////////////////////////////////////////////////
   * ////////////////////////Security mesures
////////////////////////////////////////////////////////////////////////*/ 
  if( !defined('SITE_KEY') )
    {
        header('./101 404 Not Found');
        exit( file_get_contents('../../404.html') );
    };
   
/**
 * IRB_Paginator - Class of division of the information on a paginal mode
 * NOTE: Requires PHP version 5 or later 
 * @package IRB_Paginator
 * @author IT studio IRBIS-team
 * @copyright © 2009 IRBIS-team
 * @version 0.1
 * @license http://www.opensource.org/licenses/rpl1.5.txt
 */

class IRB_Paginator
{
    
  /////////////////////////////////////////////////
  //               PUBLIC
  /////////////////////////////////////////////////    
  
/**
* Establishes page number.
* @var int
*/ 
    public $NumPage         =  1;  
/**
* Establishes quantity of numbers.
* @var int
*/ 
    public $NumRows         =  1;   
      
/**
* Establishes quantity of columns.
* @var int
*/ 
    public $NumColumns      =  1;
                   
/**
* Establishes a prefix of tables of a database.
* @var string
*/ 
    public $TablePrefix     =  '';
                   
/**
* Includes mod_rewrite.
* @var string
*/ 
    public $ModRewrite      =  SITE_REWRITE; 
           
/**
* Includes a debugging mode.
* @var boolean
*/ 
    public $PaginatorDebug  =  true;
    
/**
* Establishes a file of messages on errors.
* @var array
*/ 
    public $ErrorInfo      =  array(
                                       'no_query'    =>  'There is no inquiry for processing',
                                       'no_cache'    =>  'It is impossible to clear a cache',
                                       'no_rows'     =>  'The number of numbers or columns should be more zero',
                                   );    
        
  /////////////////////////////////////////////////
  //         PROPERTIES AND  PRIVATE
  ////////////////////////////////////////////////
    private $PageUrl        =  '';
    private $TableTotal     =  0;
    private $TableCount     =  0;    
    private $QueryString    =  '';
    private $RowsCache      =  0;
    private $NoCache        =  false;
    private $TimeStart      =  0;
                                       
  /////////////////////////////////////////////////
  //                METHODS 
  /////////////////////////////////////////////////    
    
/**
* Constructor
* @param int $rows 
* @param int $columns 
* @param string $prefix
* @Establishes quantity of numbers , columns and prefix database.
*/    
  public function __construct($page = 1, $rows = 1, $columns = 1) 
  {
    if($rows > 1)
        $this->NumPage     = (int)$page;    
    
    if($rows > 1)
        $this->NumRows     = $rows;

    if($columns > 1)
        $this->NumColumns  = $columns;
          
    if(!empty($prefix))     
        $this->TablePrefix = $prefix;
       
  } 
  
/**
* Operates a cache of difficult inquiries
* @param string $query      
* @access public       
* @return void
*/    
  public function countQuery($query) 
  {
    if(empty($query))
       $this->paginatorDebug(__METHOD__, 'no_query');
       
    $query = str_replace("\n", " ", $query);         
    preg_match("#FROM(.+)#i", $query, $table);
   
    $result = mysqlQuery("SELECT COUNT(*) AS `cnt`
                           FROM ". $table[1]);
      
    $this->TableCount = mysql_result($result, 0); 
      
    $res = mysqlQuery($query . $this->createLimit())                        
    or $this->paginatorDebug(__METHOD__, 'mysql_error');
       
    return $res;                       
  }
  
/**
* Operates a cache of difficult inquiries
* @param string $query      
* @access public
* @return void
*/    
  public function calcQuery($query = '') 
  {
    if(empty($query))
       $this->paginatorDebug(__METHOD__, 'no_query');  

    $query = preg_replace('#SELECT#i', 'SELECT SQL_CALC_FOUND_ROWS ', $query);
    
    $res = mysqlQuery($query . ' LIMIT '. $this->NumPage .', '. $this->NumRows * $this->NumColumns);
                   
    $this->TableCount = mysql_result(mysqlQuery('SELECT FOUND_ROWS()'), 0);
    
    $this->createLimit();
   
    return $res;                        
  }
     
/**
* Calculates a position and prepares a limit for inquiry
* @param int $page      
* @access public
* @return string
*/    
  public function createLimit()
  { 
    if($this->NumRows == 0 || $this->NumColumns == 0)
       $this->paginatorDebug(__METHOD__, 'no_rows');
         
    $this->TableTotal = intval(($this->TableCount - $this->NumColumns) / $this->NumRows * $this->NumColumns) - 1;
          
    if($this->NumPage < 1) 
       $this->NumPage = 1;
            
    if(empty($this->TableTotal) || $this->TableTotal < $this->TableCount)
        $this->TableTotal = $this->TableCount;
                          
    if($this->NumPage > $this->TableTotal) 
        $this->NumPage = $this->TableTotal; 
                         
    $start = $this->NumPage * $this->NumRows * $this->NumColumns - $this->NumRows * $this->NumColumns;
         
    if($start < 0)
       $start = 0;
             
    return ' LIMIT '. $start .', '. $this->NumRows * $this->NumColumns;
        
  }
   
/**
* Prepares parametres for a hyperlink and chooses a menu variant
* @param string $url
* @param int $level 
* @param string $lib 
* @access public
* @return string
*/    
  public function createMenu($lib = '')
  {               
      
    if(empty($lib))
        return  $this->defaultMenu(); 
    else
        return $this->selectMenu($lib); 
  }
         
/**
* Generates the navigation menu by default     
* @access private
* @return string
*/    
  private function defaultMenu()
  {      
    $total = ceil($this->TableTotal / $this->NumRows / $this->NumColumns);
    $menu = "\n<!-- IRB_Paginator begin -->\n<div class=\"IRB_paginator_block\">\n\n";    
                          
    if($total < 13)
    {
                                    
        for ($i = 1; $i <= $total;  $i++)
        {
            if($this->NumPage == $i)
                $menu .= $this->createLink($i, $i, '_active');
            else
                $menu .= $this->createLink($i);                
        }
    }
    else
    {
        $for = $this->NumPage - 1;
             
        if($for < 1)
            $for = 1;
            
        if($this->NumPage > 10)
            $menu .= $this->createLink(($this->NumPage - 10), '-10', '_top');             
                  
        if($this->NumPage > 1)
            $menu .= $this->createLink($for, '<<', '_top');
             
        if($this->NumPage == 7)
            $menu .= $this->createLink(1, '1', '_top') . $this->createLink('', '<b>...</b>', '_active');
        elseif($this->NumPage > 7)
            $menu .= $this->createLink(1) .
                     $this->createLink(2) . 
                     $this->createLink('', '<b>...</b>', '_active');
                 
       if($this->NumPage <= 4 && $total > 4)
       {            
            $count = ($total < 10)? $total : 10;
            
            for ($i = 1; $i <= $count;  $i++)
            {
                if($this->NumPage == $i)
                    $menu .= $this->createLink($i, $i, '_active');
                else
                    $menu .= $this->createLink($i);                 
            }
            
       }
       else
       {
            if($this->NumPage - 5 < 1)
            {
                $i = 1;
                $count = 10;                
            }                
            elseif($this->NumPage >= $total)
            {
                $i = $total - 10; 
                $count = $total; 
            }
            else
            {
                $i = $this->NumPage - 5;
                $count = $total;                
            }
                
            if($count - $i > 10)
                $count = $i + 10;
                        
            if($count > $total)
                $count = $total;
                                
                  for (  ; $i <= $count;  $i++)
                  {                        
                    
                      if($this->NumPage == $i)
                          $menu .= $this->createLink($i, $i, '_active'); 
                      elseif($i >= $this->NumPage - 5) 
                          $menu .= $this->createLink($i);
                      elseif($i <= $this->NumPage + 6) 
                          $menu .= $this->createLink($i);       
                  }                  
        
        }
            
        if($total > 12)
        {    
            if($this->NumPage < $total - 6)
                $menu .= $this->createLink('', '<b>...</b>', '_active') .
                         $this->createLink(($total - 1));
                   
            if($this->NumPage < $total - 5)        
                $menu .= $this->createLink($total);
        }
             
            
            if($this->NumPage < $total) 
                $menu .= $this->createLink(($this->NumPage + 1), '>>', '_top');
                   
            $end = ($this->NumPage  + 10 > $total)? $total:$this->NumPage + 10;
                     
            if($this->NumPage < $total - 5)
                $menu .= $this->createLink($end, '10+', '_top');                           

       }         
       
      $menu .= "\n</div>\n<!-- IRB_Paginator end -->\n";       
 
      return $menu;
  }
  
/**
* Makes a hyperlink
* @param int $page
* @param string $num, $class
* @access public
* @return string
*/      
  public function createLink($page, $num = '', $class = '')
  {               
      if(empty($num))
         $num = $page;
      
      if($class == '_active')
          return "<span class=\"imp\">&nbsp;[". $num ."]&nbsp;</span>\n";
      else
          return "<span ". "\">&nbsp;
		  <a href=\"". href('num='. $page )."\" />". $num ."</a>\n&nbsp;</span>\n"; 
  }
   
   
/**
* Function of diagnosing of errors
* @param string $method
* @param string $error 
* @access private
* @return void
*/    
  private function paginatorDebug($method, $error)
  {               
    if($this->PaginatorDebug)                         
        die('<b>' . $method .':</b><br>
        <b style="color:red">'. $this->ErrorInfo[$error] .'</b>
        <br>'. mysql_error()); 
  }    
  
} 

?>
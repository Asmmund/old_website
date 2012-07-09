<?php

/**
 * IRB_Paginator - Class of division of the information on a paginal mode
 * NOTE: Requires PHP version 5 or later 
 * @package IRB_Paginator
 * @author IT studio IRBIS-team (www.irbis-team.com)
 * @copyright © 2010 IRBIS-team
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
* Includes mod_rewrite.
* @var string
*/ 
    public $LevelPage      =  'num';
           
  /////////////////////////////////////////////////
  //         PROPERTIES AND  PRIVATE
  ////////////////////////////////////////////////

    private $TableTotal     =  0;
    private $TableCount     =  0;    

/**
* Constructor
* @param int $page
* @param int $rows 
* @param int $columns 
*/    
    public function __construct($page = 1, $rows = 1, $columns = 1) 
    {
        if($rows > 1)
            $this->NumPage     = (int)$page;    
    
        if($rows > 1)
            $this->NumRows     = $rows;

        if($columns > 1)
            $this->NumColumns  = $columns; 
			
			      
    } 

/**
* Operates a cache of difficult inquiries
* @param string $query      
* @access public       
* @return void
*/    
    public function countQuery($query) 
    {
       
        $query = str_replace(" ", " ", $query);         
        preg_match("#FROM(.+)#i", $query, $table);
   
        $result = mysqlQuery("SELECT COUNT(*) AS `cnt`
                           FROM ". $table[1]);
      
        $this->TableCount = mysql_result($result, 0); 
      
        $res = mysqlQuery($query . $this->createLimit());
       
        return $res;                       
    }
	
/**
* Operates a cache of difficult inquiries
* @param string $query      
* @access public
* @return void
*/    
    public function calcQuery($query) 
    {
        // Заменяем SELECT на SELECT SQL_CALC_FOUND_ROWS
        $query = preg_replace('#SELECT#i', 'SELECT SQL_CALC_FOUND_ROWS ', $query);
        // Выполняем основной запрос
        $res = mysqlQuery($query . ' LIMIT '. $this->NumPage .', '. $this->NumRows * $this->NumColumns);
        // Считаем к-во рядов           
        $this->TableCount = mysql_result(mysqlQuery('SELECT FOUND_ROWS()'), 0);
        // Запускаем метод для менюшки
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
* Generates the navigation menu     
* @access private
* @param string $link
* @return string
*/    
    function createMenu($level = 'num')
    {   
        $this->LevelPage = $level; 
			
        $count = ceil($this->TableTotal / $this->NumRows / $this->NumColumns);
        $menu = " <!-- IRB_Paginator begin --> ";

        if($count < 13)
        {          
            $i = 1;    
            $cnt = $count;            
        }
        else
        {
            if($this->NumPage > 10)
                $menu .= $this->createLink(($this->NumPage - 10), '-10&lt;', '_top');
				        
            if($count > 12)
            {    
                if($this->NumPage == 7)
                    $menu .= $this->createLink(1, 1);
                elseif($this->NumPage == 8)        
                    $menu .= $this->createLink(1, 1) 
                          .  $this->createLink(2, 2);                                      
                elseif($this->NumPage > 7)        
                    $menu .= $this->createLink(1, 1) 
                          .  $this->createLink(2, 2) 
                          .  $this->createLink(0, '...', '_top', false);
            }    


            if($this->NumPage - 5 < 1)
            {  
                $i = 1;
                $cnt = 10;                
            }                
            elseif($this->NumPage >= $count)
            { 
                $i = $count - 10; 
                $cnt = $count; 
            }
            else
            {   
                $i = $this->NumPage - 5;
                $cnt = $count;                
            }


            if($this->NumPage < 6) 
                $cnt = $i + 9;           
            elseif($count - $i > 10)
                $cnt = $i + 10;
            elseif($count > $count)
                $cnt = $count;            
        }        

      
        while($i <= $cnt)
        {
            if($i == $this->NumPage)
                $menu .= $this->createLink($i, $i, '_active', false);
            else
                $menu .= $this->createLink($i, $i);
                   
             $i++;           
        }  
       
        if($count > 12)
        {    
            if($this->NumPage < $count - 6)
                $menu .= $this->createLink(0, '...', '_top', false)
				      . $this->createLink(($count - 1), ($count - 1));
                   
            if($this->NumPage < $count - 5)        
                $menu .= $this->createLink($count, $count);
        }              
 
       $end = ($this->NumPage  + 10 > $count) ? $count : $this->NumPage + 10;
                     
       if($this->NumPage < $count - 5 && $count - $this->NumPage >= 10)
           $menu .= $this->createLink($end, '&gt;+10', '_top');
                                   
        return $menu ."  <!-- IRB_Paginator end --> ";    
    }

/**
* Makes a hyperlink
* @param int $page
* @param string $link, $class
* @param bolean $active
* @access private
* @return string
*/      
    private function createLink($page = 1, $link = '', $class = '', $active = true)
    {                   

        if(empty($link))
           $link = $page;
     
        if($active)
            return "<span  style='padding:0; margin:0;' class=\"IRB_paginator". $class ."\"> "
                 . "<a href=\"". href($this->LevelPage .'='. $page) ."\" />". $link ."</a> </span> ";
        else
            return "<span style='padding:0; margin:0;' class=\"IRB_paginator". $class ."\"> ". $link ." </span> "; 
    }

}

?>
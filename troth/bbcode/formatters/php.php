<?php    

/**
* Форматтер PHP кода
*/ 
//////////////////////////////////////////////////

/**   
* Функция подcветки PHP кода
* @param string $str  //обрабатываеемая строка
* @return string  
*/  
        function PHP($code)
        {        

            $code  = htmlspecialchars_decode($code);
            
            if(substr($code,0,2) == "<?") 
                $code = "<?php\n".trim($code, "<?ph");

            $arr = range(1, substr_count($code, "\n") + 1);

            $num = implode("\n", $arr);
                    
                $line = '<div style="float:left;' 
                                     .' border-right:1px solid;' 
                                     .' background-color:#000066;'
                                     .' padding-left:3px;'
                                     .' padding-right:3px;'                                 
                                     .' margin-right:2px;font-size:13px'
                                     .' margin-top:-5px;'
                                     .' text-align:right;">'
                                     ."<code style=\"color:#FFFFFF\">\n". $num  ."\n</code></div>";

                                     
            return '<div class="php">'
                   . $line . highlight_string($code, true) .
                   '</div>'; 
        }
        

        
        
        
        
        
        
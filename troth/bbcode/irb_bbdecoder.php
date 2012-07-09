<?php
// Конфига
    include_once dirname(__FILE__) .'/config.php'; 

/**   
* Основная функция интерпретатора
* @param string $text   //обрабатываемый текст
* @return string 
*/   
    function createBBtags($text, $replace = true)
    {   
/**
Разбираем массивы. 
Это для более удобной конфиги (их вообще то можно было сразу в разные прописать).
Ну а что бы не дергать каждый раз, объявим статическими.
*/            
        static $bb_open, $bb_close, $bb_single, $tmp_open, $tmp_close, 
               $tmp_single, $max_len, $links, $images, $video, 
               $html_open, $html_close, $html_single, $formatters;
            
            if(empty($bb_open))
            {
                global $configBBcode;
                extract($configBBcode);
            
                $bb_open      = array_keys($setup_bb);
                $bb_close     = array_values($setup_bb);                                                        
                $html_open    = array_keys($setup_html);
                $html_close   = array_values($setup_html);
                $bb_single    = array_keys($single_tags);
                $html_single  = array_values($single_tags);
            } 
        
    //  Oчистим текст от иероглифов
        $text = str_replace($tmp_open, '', $text);
        $text = str_replace($tmp_close, '', $text);
        $text = str_replace($tmp_single, '', $text);
                  
        $text = str_replace("\r", "", $text);
        $text = str_replace("\t", "    ", $text);
        
/**  
Если режим очистки - 
удаляем бб-теги из текста
*/                  
    if(!$replace)
    {              
        $text = str_replace($bb_open, '', $text);
        $text = str_replace($bb_close, '', $text);
        $text = str_replace($bb_single, '', $text);
        $text = preg_replace('#\[(code|url|img|video)[^\s]*?\].*?\[/\\1\]#usi', '', $text); 

    }
    else
    {        
/** 
Если включен режим bb-тегов, 
заменим заявленные теги на одиночные символы и дальше по тексту 
Используется функция str_ireplace(), чтобы BB-теги были регистронезависимыми
*/ 

                   
        $text = str_ireplace($bb_open, $tmp_open, $text);
        $text = str_ireplace($bb_close, $tmp_close, $text);
        $text = str_ireplace($bb_single, $tmp_single, $text);   
/** 
Начинается разбор полетов. Сначала уничтожаем пустые теги.
Тут же за одно считаем, сколько открывающих и сколько закрывающих
*/ 
        $open_cnt = array();
   
        foreach($tmp_open as $k => $v)
        {
           $text = preg_replace("#". $v ."\s*?". $tmp_close[$k] ."#us", "", $text);
           $cnt = substr_count($text, $v);
           
           if($cnt > 0)
           {
               $open_cnt[$v] = $cnt;
               $close_cnt[$v] = substr_count($text, $tmp_close[$k]);
           }              
        }
        
/** 
Дальше уничтожаем непарные теги
Регулярка составлена так, что удаляет последний заявленный символ
Это дает возможность удалить незакрытые теги с конца текста,
не трогая закрытые.
*/     
        foreach($open_cnt as $k => $v)
        {
                
            if($v > $close_cnt[$k])
            {
                for($i = 0; $i < $v - $close_cnt[$k]; ++$i)
                    $text = preg_replace('#'. $k .'(?!.*'. $k .')#us', '', $text);
            }
        
        }
    }             
// Обрабатываем текст        
        $text = mBwordwrap($text, 100);                 
        $text = htmlspecialchars($text);
           
        //Функция getFormat() сама разберется, какой форматтер использовать. 
        if(count($formatters))
            $text = preg_replace_callback('#\[code=([^\] ]+?)\](.+?)\[/code=\\1\]#si', 'getFormat', $text);         
        //Обработка ссылок. Пройдут только те, которые начинаются с http:// и https:// и не содержат пробелов        
        if($links)
        {                   
            $text = preg_replace_callback('#\[url=http(s*)://([^\] ]+?)\](.+?)\[/url\]#si', 'createLink1', $text);
            $text = preg_replace_callback('#\[url\]http(s*)://(.+?)\[/url\]#si', 'createLink2', $text);
        }    
        //Картинки. Тоже http:// и без пробелов. На вс. случай запретим GET параметры      
        if($images)    
            $text = preg_replace_callback('#\[img\]http://([^\] \?]+?)\[/img\]#si', 'createImg', $text); 
            
        //Видео. Та же песня      
        if($video)    
            $text = preg_replace_callback('#\[video\]http://([^\] \?]+?).flv\[/video\]#si', 'createSwf', $text);         
             
/** 
Если включен режим bb-тегов,
меняем обратно временные символы на HTML теги
*/    
    if($replace)
    {       
        $text = str_replace($tmp_open, $html_open, $text);
        $text = str_replace($tmp_close, $html_close, $text);
        $text = str_replace($tmp_single, $html_single, $text);
    }        
// Сохраняем оригинальное форматирование                
        $text = str_replace('  ', '&nbsp;&nbsp;', $text);    
        $text = nl2br($text);
// За ушкО на солнышкО                       
        return $text;            
    } 
    
 /**   
* Функция - аналог wordwrap()  для кодировки UTF-8
* @param string $str  //обрабатываеемая строка
* @param int $width     //максимальная длина слова
* @param string $break //разделитель
* @return string  
*/ 
           
    function mBwordwrap($text, $width = 90, $break = "\n")
    {
       return preg_replace('#([^\s]{'. $width .'})#u', '$1'. $break , $text);
    }  

/**   
* Функции генерации ссылок
* @param array $match 
* @return string 
*/ 
    
    function createLink1($match)
    {  
        $match[2] = str_replace("\n", "", $match[2]);
        return '<a href="http'. $match[1] .'://'. htmlspecialchars($match[2]) 
             . '" target="_blanck" >'. htmlspecialchars($match[3]) .'</a>';
    }
    
    function createLink2($match)
    {  
        $match[2] = str_replace("\n", "", $match[2]);
        return '<a href="http'. $match[1] .'://'. htmlspecialchars($match[2]) 
             . '" target="_blanck" >'. htmlspecialchars($match[2]) .'</a>'; 
    }

/**   
* Функция генерации картинок
* @param array $match 
* @return string 
*/
        
    function createImg($match)
    {  
        $match[1] = str_replace("\n", "", $match[1]);
        return '<img src="http://'. htmlspecialchars($match[1]) .'" border="0" />'; 
    }
    
/**   
* Функция генерации видеоролика
* @param array $match 
* @return string 
*/
        
    function createSwf($match)
    {  
        $match[1] = str_replace("\n", "", $match[1]);
        return  '<center><object type="application/x-shockwave-flash" data="'
              . IRB_BB_PATH .'/images/video.swf" height="300" width="400">'
              . '<param name="bgcolor" value="#333333" /><param name="allowFullScreen" value="true" />'
              . '<param name="allowScriptAccess" value="always" />'
              . '<param name="movie" value="'
              . IRB_BB_PATH .'/images/video.swf" />'
              . '<param name="FlashVars" value="way=http://'
              . htmlspecialchars($match[1]) .'.flv&amp;swf='
              . IRB_BB_PATH .'/images/video.swf&amp;w=400&amp;h=300&amp;'
              . 'pic=http://&amp;autoplay=0&amp;tools=1&amp;'
              . 'skin=white&amp;volume=70&amp;q=&amp;comment=" />'
              . '</object></center>';
    }   
    
/**   
* Функция подключения форматтеров.  
* Подключает нужный и вызывает функцию
* @param array $match   //массив значений
* @return string 
*/        
    function getFormat($match)
    {  
    // Разбираем конфигу
        global $configBBcode;
    // Получаем название форматтера         
        $format = str_replace("\n", "", strtolower($match[1]));
    // Проверяем, есть ли такой в наличии
        if(in_array($format, $configBBcode['formatters']))
        {
    // Подключаем нужный файл
             include_once dirname(__FILE__) .'/formatters/'. $format .'.php';
             // Запускаем функцию из переменной
             return  $format($match[2]); 
        }
            
        return 'No formatter '. $match[1]; 
    }

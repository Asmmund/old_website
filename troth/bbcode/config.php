<?php   
/**
* Конфигурационный файл интерпретатора BB-тегов
*/
/////////////////////////////////////////////////////////////////////////


    // Путь до корня скрипта
    define('IRB_BB_PATH', IRB_HOST .'bbcode'); 

    $configBBcode = array(
                           // Максимальная длина слова
                          'max_len'      => 80,
                            
                          // Распознование ссылок                            
                          'links'        => true,
                            
                          // Распознование картинок                            
                          'images'       => true,
                          
                          // Распознование видео                            
                          'video'        => true,
						                                                                                       
            // Парные BB-теги
             'setup_bb'    => array(
                                       '[b]'                =>   '[/b]',
                                       '[i]'                =>   '[/i]',
                                       '[s]'                =>   '[/s]',
                                       '[u]'                =>   '[/u]',
                                       '[sub]'              =>   '[/sub]',
                                       '[sup]'              =>   '[/sup]',
                                       '[justify]'          =>   '[/justify]',
                                       '[left]'             =>   '[/left]',                                       
                                       '[right]'            =>   '[/right]',
                                       '[center]'           =>   '[/center]',
                                       '[quote]'            =>   '[/quote]',
                                       '[list=ol]'          =>   '[/list=ol]',
                                       '[list=ul]'          =>   '[/list=ul]',
                                       '[*]'                =>   '[/*]',
                                       '[size=1]'           =>   '[/size=1]',
                                       '[size=2]'           =>   '[/size=2]', 
                                       '[size=3]'           =>   '[/size=3]', 
                                       '[size=4]'           =>   '[/size=4]', 
                                       '[size=5]'           =>   '[/size=5]', 
                                       '[h=5]'              =>   '[/h=5]',
                                       '[h=4]'              =>   '[/h=4]', 
                                       '[h=3]'              =>   '[/h=3]', 
                                       '[h=2]'              =>   '[/h=2]', 
                                       '[h=1]'              =>   '[/h=1]',
                                       '[color=gray]'       =>   '[/color=gray]',
                                       '[color=green]'      =>   '[/color=green]',
                                       '[color=purple]'     =>   '[/color=purple]',
                                       '[color=olive]'      =>   '[/color=olive]',
                                       '[color=silver]'     =>   '[/color=silver]',
                                       '[color=aqua]'       =>   '[/color=aqua]',
                                       '[color=yellow]'     =>   '[/color=yellow]',
                                       '[color=blue]'       =>   '[/color=blue]',
                                       '[color=orange]'     =>   '[/color=orange]',
                                       '[color=red]'        =>   '[/color=red]',                                       

                                    ),
                                                 
             // Парные HTML-теги (на них заменяются теги из предыдущего массива)                     
             'setup_html'  => array(
                                       '<b>'                                      =>   '</b>',
                                       '<i>'                                      =>   '</i>',
                                       '<s>'                                      =>   '</s>',
                                       '<u>'                                      =>   '</u>',
                                       '<sub>'                                    =>   '</sub>', 
                                       '<sup>'                                    =>   '</sup>', 
                                       '<p align="justify">'                      =>   '</p>', 
                                       '<p align="left">'                         =>   '</p>', 
                                       '<p align="right">'                        =>   '</p>', 
                                       '<p align="center">'                       =>   '</p>',
                                       '<p class="quote"><b>цитата:</b><br />'    =>   '</p>',
                                       '<ol>'                                     =>   '</ol>',
                                       '<ul>'                                     =>   '</ul>',                                       
                                       '<li>'                                     =>   '</li>',
                                       '<span style="font-size:11px">'            =>   '</span>',
                                       '<span style="font-size:14px">'            =>   '</span>',
                                       '<span style="font-size:18px">'            =>   '</span>',
                                       '<span style="font-size:24px">'            =>   '</span>',
                                       '<span style="font-size:32px">'            =>   '</span>',
                                       '<h5>'                                     =>   '</h5>',
                                       '<h4>'                                     =>   '</h4>',                                       
                                       '<h3>'                                     =>   '</h3>',
                                       '<h2>'                                     =>   '</h2>',
                                       '<h1>'                                     =>   '</h1>',                                       
                                       '<span style="color:gray">'                =>   '</span>',
                                       '<span style="color:green">'               =>   '</span>',
                                       '<span style="color:purple">'              =>   '</span>',
                                       '<span style="color:olive">'               =>   '</span>',
                                       '<span style="color:silver">'              =>   '</span>',
                                       '<span style="color:aqua">'                =>   '</span>',
                                       '<span style="color:yellow">'              =>   '</span>',
                                       '<span style="color:blue">'                =>   '</span>',
                                       '<span style="color:orange">'              =>   '</span>',
                                       '<span style="color:red">'                 =>   '</span>',
                                   ), 
               // Не парные теги (смайлики и иже с ними)                       
             'single_tags' => array(
                                      '[(]'      =>   '<img src="'. IRB_BB_PATH .'/smiles/(.gif" />',
                                      '[angry]'  =>   '<img src="'. IRB_BB_PATH .'/smiles/angry.gif" />',
                                      '[worry]'  =>   '<img src="'. IRB_BB_PATH .'/smiles/worry.gif" />',
                                      '[break]'  =>   '<img src="'. IRB_BB_PATH .'/smiles/break.gif" />',
                                      '[cry]'    =>   '<img src="'. IRB_BB_PATH .'/smiles/cry.gif" />',
                                      '[D]'      =>   '<img src="'. IRB_BB_PATH .'/smiles/D.gif" />',
                                      '[fear]'   =>   '<img src="'. IRB_BB_PATH .'/smiles/fear.gif" />',
                                      '[think]'  =>   '<img src="'. IRB_BB_PATH .'/smiles/think.gif" />',
                                      '[ii]'     =>   '<img src="'. IRB_BB_PATH .'/smiles/ii.gif" />',
                                      '[sorrow]' =>   '<img src="'. IRB_BB_PATH .'/smiles/sorrow.gif" />',
                                      '[no]'     =>   '<img src="'. IRB_BB_PATH .'/smiles/no.gif" />',
                                      '[tongue]' =>   '<img src="'. IRB_BB_PATH .'/smiles/tongue.gif" />',
                                      '[wacko]'  =>   '<img src="'. IRB_BB_PATH .'/smiles/wacko.gif" />',
                                      '[woo]'    =>   '<img src="'. IRB_BB_PATH .'/smiles/woo.gif" />',

                                   ),
                                                     
             // Форматтеры. Форматтер должен присутствовать в комплекте (в папке formatters)                      
             'formatters'  => array(
                                      '[code=php]'  =>  'php',
                                   ),        

                                                     
/** 
Массивы символов замены. Для корректной обработки теги нужно заменить на
одиночные символы, иначе можно порвать тег. Количество символов должно соответствовать количеству тегов.
Используются редко используемые символы 
*/
    
        // Открывающие теги
                'tmp_open'   => array(
                                       'ᐁ', 'ᐂ', 'ᐃ', 'ᐄ', 'ᐅ', 'ᐆ', 'ᐇ', 'ᐉ', 'ᐊ', 'ᐋ', 
                                       'ᐌ', 'ᐍ', 'ᐎ', 'ᐏ', 'ᐐ', 'ᐑ', 'ᐒ', 'ᐓ', 'ᐔ', 'ᐕ', 
                                       'ᐫ', 'ᐬ', 'ᐭ', 'ᐮ', 'ᐯ', 'ᐰ', 'ᐱ', 'ᐲ', 'ᐳ', 'ᐴ', 
                                       'ᐵ', 'ᐷ', 'ᐸ', 'ᐹ', 'ᐺ', 'ᐻ', 'ᐼ', 'ᐽ', 'ᐾ', 'ᐿ', 
                                       'ᑌ', 'ᑍ', 'ᑎ', 'ᑏ', 'ᑐ', 'ᑑ', 'ᑒ', 'ᑔ', 'ᑕ', 'ᑖ',

                                    ),                              
                           
        // Закрывающие теги                  
                'tmp_close'  => array(
                                        
                                       'ᑗ', 'ᑘ', 'ᑙ', 'ᑚ', 'ᑛ', 'ᑜ', 'ᑝ', 'ᑞ', 'ᑟ', 'ᑠ',  
                                       'ᑡ', 'ᑢ', 'ᑣ', 'ᑤ', 'ᑥ', 'ᑧ', 'ᑨ', 'ᑩ', 'ᑪ', 'ᑫ',
                                       'ᑬ', 'ᑭ', 'ᑮ', 'ᑯ', 'ᑰ', 'ᑱ', 'ᑲ', 'ᑳ', 'ᑴ', 'ᑵ', 
                                       'ᑶ', 'ᑷ', 'ᑸ', 'ᑹ', 'ᑺ', 'ᑻ', 'ᑼ', 'ᑽ', 'ᑾ', 'ᑿ', 
                                       'ᒀ', 'ᒁ', 'ᒂ', 'ᒌ', 'ᒍ', 'ᒎ', 'ᒏ', 'ᒐ', 'ᒑ', 'ᒒ',

                                    ),                            
        // Одиночные теги                                  
                'tmp_single' => array(                  
                                       'ᒓ', 'ᒔ', 'ᒕ', 'ᒖ', 'ᒗ', 'ᒘ', 'ᒙ', 'ᒚ', 'ᒛ', 'ᒜ', 
                                       'ᒝ', 'ᒞ', 'ᒟ', 'ᒠ', 'ᒣ', 'ᒤ', 'ᒥ', 'ᒦ', 'ᒧ', 'ᒨ', 
                                       'ᒩ', 'ᒪ', 'ᒫ', 'ᒬ', 'ᒭ', 'ᒮ', 'ᒯ', 'ᒰ', 'ᒱ', 'ᒲ', 
                                       'ᒳ', 'ᒴ', 'ᒵ', 'ᒶ', 'ᒷ', 'ᒸ', 'ᒹ', 'ᒺ', 'ᓀ', 'ᓁ', 
                                       'ᓂ', 'ᓃ', 'ᓄ', 'ᓅ', 'ᓆ', 'ᓇ', 'ᓈ', 'ᓉ', 'ᓊ', 'ᓋ', 
                                    ),
                     );
   
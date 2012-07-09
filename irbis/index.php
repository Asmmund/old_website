<?php   

   

///////////////////////////////////////////////////////////////////////////////////////// 
//                                 ВЫЗОВ КЛАССА 
/////////////////////////////////////////////////////////////////////////////////////////    
   
       $form['to']        = !empty($_POST['to'])?$_POST['to']:NULL;
       $form['fromname']  = !empty($_POST['fromname'])?$_POST['fromname']:NULL;
       $form['fromemail'] = !empty($_POST['fromemail'])?$_POST['fromemail']:NULL;       
       $form['subject']   = !empty($_POST['subject'])?$_POST['subject']:NULL;              
       $message = $form['message'] = !empty($_POST['message'])?$_POST['message']:NULL;   
       
   if(!empty($_POST['ok']))
   {

/**   
* Подключаем класс    
*/   
      include 'irb_mailer.php';  
         
/**    
* Сообщения об ошибках на русском языке   
*/  
       $language    = array(   
                       
                     'no_text'          => 'Нет текста письма',  
                     'no_file'          => 'Не указан путь до файла',                        
                     'no_path'          => 'Нет файла по указанному пути',
                     'no_open'          => 'Не удалось открыть файл',
                     'no_addresse'      => 'Нет адреса получателя',  
                     'not_correct'      => 'E-mail указан некорректно',  
                     'no_sender'        => 'Нет отправителя',                     
                     'no_theme'         => 'Нет темы письма',  
                     'no_send'          => 'По техническим причинам отправка письма  
                                            в данный момент невозможна', 
                  
                        );  
/**       
* Добавим картинку в тело письма  
*/ 
    if(!empty($_POST['html']) && !empty($_POST['img']))
        $message = '<img src="cid:img" /><br>'. $form['message'];
     
/**       
* Создаем новый объект. Сообщение - обязательный параметр   
* Язык по дефолту - английский. Можно не указывать.  
*/   
    $mail = new IRB_Mailer($message, $language); 
      
/**       
* Чтобы вставить картинку в тело письма, вызываем этот метод
* Аргумент - cid, переданный в src тега <img> в сообщении
*/ 
    if(!empty($_POST['html']) && !empty($_POST['img']))       
        $mail -> attacheImg('img'); 
/**       
* Если нужно - прикрепляем файл. Если нет - не пишем этот вызов    
* Второй параметр указывать не обязательно. Тогда сохранится родное имя файла.
* Также можно указать расширение.
* Можно прикрепить несколько файлов, несколько раз вызвав метод.   
*/   

  
      if($_FILES['file']['error'] === 0)
      {
          $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); 
          $mail -> attacheFile($_FILES['file']['tmp_name'], $_FILES['file']['name']);
      } 
      else
      {
           $mail -> attacheFile('pic1.gif', 'kartinko.gif');       
      }     
/**    
* Выставляем тип. 
*/    
      if(!empty($_POST['html']))
          $mail -> setHtml();   
     
/**    
* Кому, от кого, тема.    
*/    
      $mail -> createTo($form['to']);    
      $mail -> createFrom($form['fromname'], $form['fromemail']);    
      $mail -> createSubject($form['subject']);  
    
/**     
* Отправка. При удачной вернет NULL, при фиаско - текст ошибки    
*/   
     $info = $mail -> sendMail();
     
     if(empty($info))
     {
        header('location: /?yes');
        exit;
     }
          
   }     

  if(isset($_GET['yes']))
      $info = 'Ваше письмо отправлено';
       
  $form = array_map('htmlspecialchars', $form);
?>

<html>
<body>
<b style="color:red"><?php echo !empty($info)?nl2br($info):'&nbsp;'; ?></b><br />
<div style="text-align:center;">
<form action="?" method="post" enctype="multipart/form-data">
Кому<br />
<input name="to" size="60" type="text" value="<?php echo $form['to']; ?>" /><br />
От кого (имя)<br />
<input name="fromname" size="60" type="text" value="<?php echo $form['fromname']; ?>"  /><br />
От кого (E-mail)<br />
<input name="fromemail" size="60" type="text" value="<?php echo $form['fromemail']; ?>"  /><br />
Тема<br />
<input name="subject" size="60" type="text" value="<?php echo $form['subject']; ?>"  /><br /><br />
Сообщение&nbsp;&nbsp; (HTML)
<input name="html" type="checkbox" value="1" /><br />
<textarea name="message" cols="60" rows="10"><?php echo $form['message']; ?></textarea><br />
Файл<br />
<input name="file" type="file" /><br />
Поместить картинку в тело письма
<input name="img" type="checkbox" value="1" /><br />
<br />
<input name="ok" type="submit" />
</form>

</div>
</body>
</html>














  

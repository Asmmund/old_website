<?php

/**  
 * IRB_Mailer - PHP email transport class  
 * NOTE: Requires PHP version 5 or later   
 * Info: http://irbis-team.com   
 * @package irb_mailer  
 * @author IT studio IRBIS-team  
 * @copyright © 2010 IRBIS-team  
 * @version 0.2  
 * @license http://www.opensource.org/licenses/rpl1.5.txt  
 */   
class IRB_Mailer   
{   

  /////////////////////////////////////////////////  
  //               PUBLIC  
  /////////////////////////////////////////////////  

  /**  
   * Establishes the address of the addressee  
   * Устанавливает адрес получателя     
   * @var string  
   */        
  public $to       = '';   
    
  /**  
   * Sets the From name for the message.  
   * Устанавливает имя отправителя     
   * @var string  
   */       
  public $from     = '';  
    
  /**  
   * Sets the From email address for the message.  
   * Устанавливает адрес отправителя     
   * @var string  
   */      
  public $mailfrom = ''; 
     
  /**  
   * Sets the Subject of the message.  
   * Устанавливает тему сообщения   
   * @var string  
   */       
  public $subject = '';   
    
  /**  
   * Sets the Body of the message.   
   * Устанавливает тело сообщения     
   * @var string  
   */           
  public $message = '';  
    
  /**  
   * Sets the Charset of the message.   
   * Устанавливает кодировку сообщения     
   * @var string  
   */           
  public $charset = 'utf-8';  
        
  /**  
   * Errors of performance of the program.  
   * @var array  
   */    
  public $mailererrors    = array(   
                       
                     'no_text'          => 'There is no message text',  
                     'no_file'          => 'The path to a file is not specified',  
                     'no_path'          => 'There is no file on the specified path', 
                     'no_open'          => 'It was not possible to open a file',                      
                     'no_addresse'      => 'There is no addresse',  
                     'not_correct'      => 'The e-mail address is not correct',  
                     'no_sender'        => 'There is no sender',                     
                     'no_theme'         => 'There is no theme',  
                     'no_send'          => 'For technical reasons letter sending  
                                            is impossible at present', 
                  
                                 );      
  /////////////////////////////////////////////////  
  //         PROPERTIES AND  PRIVATE  
  /////////////////////////////////////////////////       
    private $boundary1     = '';    
    private $boundary2     = ''; 
    private $plain         = '';     
    private $html          = ''; 
    private $attachimg     = '';
    private $attachment    = '';           
    private $multipart     = ''; 
    private $header        = '';                
    private $errors        = array();    
    private $dummy         = 'Your post client does not support specification MIME 1.0     
    For correct display of the letter you should replace the post program.';  
    private $mime = array(  
      'ai'    =>  'application/postscript',  
      'aif'   =>  'audio/x-aiff',  
      'aifc'  =>  'audio/x-aiff',  
      'aiff'  =>  'audio/x-aiff',  
      'avi'   =>  'video/x-msvideo',  
      'bin'   =>  'application/macbinary',  
      'bmp'   =>  'image/bmp',  
      'cpt'   =>  'application/mac-compactpro',  
      'css'   =>  'text/css',  
      'dcr'   =>  'application/x-director',  
      'dir'   =>  'application/x-director',   
      'doc'   =>  'application/msword',  
      'dvi'   =>  'application/x-dvi',  
      'dxr'   =>  'application/x-director',  
      'eml'   =>  'message/rfc822',  
      'eps'   =>  'application/postscript',  
      'gif'   =>  'image/gif',  
      'gtar'  =>  'application/x-gtar',  
      'htm'   =>  'text/html',  
      'html'  =>  'text/html',  
      'jpe'   =>  'image/jpeg',  
      'jpeg'  =>  'image/jpeg',  
      'jpg'   =>  'image/jpeg',  
      'hqx'   =>  'application/mac-binhex40',  
      'js'    =>  'application/x-javascript',  
      'log'   =>  'text/plain',  
      'mid'   =>  'audio/midi',  
      'midi'  =>  'audio/midi',  
      'mif'   =>  'application/vnd.mif',  
      'mov'   =>  'video/quicktime',  
      'movie' =>  'video/x-sgi-movie',  
      'mp2'   =>  'audio/mpeg',  
      'mp3'   =>  'audio/mpeg',  
      'mpe'   =>  'video/mpeg',  
      'mpeg'  =>  'video/mpeg',  
      'mpg'   =>  'video/mpeg',  
      'mpga'  =>  'audio/mpeg',  
      'oda'   =>  'application/oda',  
      'pdf'   =>  'application/pdf',  
      'php'   =>  'application/x-httpd-php',  
      'php3'  =>  'application/x-httpd-php',  
      'php4'  =>  'application/x-httpd-php',  
      'phps'  =>  'application/x-httpd-php-source',  
      'phtml' =>  'application/x-httpd-php',  
      'png'   =>  'image/png',  
      'ppt'   =>  'application/vnd.ms-powerpoint',  
      'ps'    =>  'application/postscript',  
      'qt'    =>  'video/quicktime',  
      'ra'    =>  'audio/x-realaudio',  
      'ram'   =>  'audio/x-pn-realaudio',  
      'rm'    =>  'audio/x-pn-realaudio',  
      'rpm'   =>  'audio/x-pn-realaudio-plugin',  
      'rtf'   =>  'text/rtf',  
      'rtx'   =>  'text/richtext',  
      'rv'    =>  'video/vnd.rn-realvideo',  
      'shtml' =>  'text/html',  
      'sit'   =>  'application/x-stuffit',  
      'smi'   =>  'application/smil',  
      'smil'  =>  'application/smil',  
      'swf'   =>  'application/x-shockwave-flash',  
      'tar'   =>  'application/x-tar',  
      'text'  =>  'text/plain',  
      'txt'   =>  'text/plain',  
      'tgz'   =>  'application/x-tar',  
      'tif'   =>  'image/tiff',  
      'tiff'  =>  'image/tiff',  
      'wav'   =>  'audio/x-wav',  
      'wbxml' =>  'application/vnd.wap.wbxml',  
      'wmlc'  =>  'application/vnd.wap.wmlc',  
      'word'  =>  'application/msword',  
      'xht'   =>  'application/xhtml+xml',  
      'xhtml' =>  'application/xhtml+xml',  
      'xl'    =>  'application/excel',  
      'xls'   =>  'application/vnd.ms-excel',  
      'xml'   =>  'text/xml',  
      'xsl'   =>  'text/xml',  
      'zip'   =>  'application/zip'  
    );     
     
  /////////////////////////////////////////////////  
  // METHODS, VARIABLES  
  /////////////////////////////////////////////////   

/**  
* Constructor.     
* @param string $message        
* @Establishes a symbol of carrying over of a line and dividers 
*/          
   public function __construct($message = '', $language = false)    
   {  
        
      $this->boundary1 = '=='. uniqid(time() + 1);  
      $this->boundary2 = '=='. uniqid(time() + 2);  
             
      if(is_array($language))  
          $this->mailererrors = $language;    
        
      if(!empty($message))  
      {                    
          $this->message  = $message;  
          $this->plain .= "Content-type: text/plain; charset=\"". $this->charset ."\"\r\n";  
          $this->plain .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
      }  
      else  
          $this->errors[] = $this->mailererrors['no_text'];                              
     
   } 
    
/**  
* Adds a "To" address..  
* Устанавливает адрес "Кому"  
* @access public  
* @param string  $to           
* @return void  
*/     
   public function createTo($to = '')   
   {   
      if(empty($to))   
           $this->errors[] = $this->mailererrors['no_addresse'];    
      elseif(!$this->checkEmail($to))  
           $this->errors[] = $this->mailererrors['not_correct'];   
       else  
           $this->to = $to;  
   }  
       
/**  
* Adds a "From" address.  
* Устанавливает адрес "От кого"  
* @access public  
* @param string  $from           
* @return void  
*/     
   public function createFrom($from = '', $mailfrom = '')   
   {   
       if(empty($from)) 
       {      
           $this->errors[] = $this->mailererrors['no_sender'];  
           return; 
       }  
       else 
       {   
           $this->from = '=?'. $this->charset .'?b?'. base64_encode($from) .'?='; 

           if(empty($mailfrom))
               $mailfrom = $from;

           if($this->checkEmail($mailfrom)) 
               $this->mailfrom = ' <'. $mailfrom .'>'; 

           $this->createHeader(); 
       }         
   }       
          
/**  
* Deduces a script error.  
* Проверка корректности электронного адреса  
* @param string  $to      
* @access private     
* @return string or boolean  
*/        
   private function checkEmail($to)   
   {   
       if (function_exists('filter_var'))  
           return filter_var($to, FILTER_VALIDATE_EMAIL); 
       else 
           return preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $to); 
   } 
         
/**  
* Adds a Subject.  
* Устанавливает тему сообщения  
* @access public  
* @param string  $subject           
* @return void  
*/      
   public function createSubject($subject = false)   
   {   
      if($subject)   
          $this->subject = '=?'. $this->charset .'?b?'. base64_encode($subject) .'?=';   
      else   
          $this->errors[] = $this->mailererrors['no_theme'];         
   } 

/**    
* Method of formation of the basic headings   
* Метод формирования основных заголовков    
* @access private     
* @param string  $subject             
* @return void    
*/              
   private function createHeader() 
   { 
      $host = str_replace('www.', '', $_SERVER['HTTP_HOST']); 
      $this->header  = "Date: ". date('D, d M Y h:i:s O') ."\r\n";        
      $this->header .= "From: ". $this->from . $this->mailfrom ."\r\n";  
      $this->header .= "Message-ID: <". md5(uniqid(time())) ."@". $host .">\r\n";       
      $this->header .= "X-Mailer:  IRB_Mailer 0.2 (www.irbis-team.com)\r\n";       
      $this->header .= "MIME-Version: 1.0\r\n";    
   }  
        
/**  
* Sets message type to HTML.  
* Устанавливает HTML формат сообщения  
* @access public           
* @return void  
*/      
   public function setHtml($set = true)    
   {    
        
       if($set) 
       { 
           $this->html    = "Content-type: text/html; charset=\"". $this->charset ."\"\r\n"; 
           $this->html   .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
           $this->html   .= chunk_split(base64_encode($this->message)) ."\r\n"; 
           $this->message = strip_tags($this->message) ."\r\n";            
       } 

   }   
    
/** 
* Method of an attachment of a file.  
* Метод помещения картинки в тело письма  
* @access public      
* @param string  $file      
* @return void  
*/     
   public function attacheImg($filename = 'imd')    
   {    
       $this->attachimg = "Content-ID: <". $filename ."> \r\n\r\n";
   } 
     
/** 
* Method of an attachment of a file.  
* Метод прикрепления файла   
* @access public      
* @param string  $file and $filename        
* @return void  
*/     
   public function attacheFile($file = '', $filename = '')    
   {   
       if(!empty($file)) 
       {    
          if(!empty($this->attachment)) 
              $this->attachment .= "--". $this->boundary1 ."\r\n";  
                              
          if(is_file($file))    
          {  
              if(!$f = @fopen($file, 'rb')) 
              { 
                  $this->errors[] = $this->mailererrors['no_open'];     
                  return;           
              } 
             
              $buffer = fread($f, filesize($file)); 
              fclose($f); 
                           
              if(empty($filename))    
                  $filename = basename($file);  
              else    
                  $filename = '=?'. $this->charset .'?b?'. base64_encode($filename) .'?='; 
                  
              if (function_exists('mime_content_type')) 
                  $type = mime_content_type($file); 
            
              $ext = pathinfo($filename, PATHINFO_EXTENSION);  
            
              if(empty($type) && in_array($ext, array_keys($this->mime)))  
                  $type = $this->mime[$ext]; 
                   
              if(empty($type))  
                  $type = 'application/octet-stream'; 
                               
              $this->attachment .= "Content-type: ". $type .'; name="'. $filename ."\"\r\n";  
              $this->attachment .= "Content-disposition: attachment; filename=\"". $filename ."\"\r\n";  
              $this->attachment .= "Content-Transfer-Encoding: base64\r\n";

              if(!empty($this->attachimg) && getimagesize($file))
                  $this->attachment .= $this->attachimg;
              else
                  $this->attachment .= "\r\n";
  
              $this->attachment .= chunk_split(base64_encode($buffer)) ."\r\n\r\n";  
         }  
         else     
             $this->errors[] = $this->mailererrors['no_file'];  

      }  
      else     
          $this->errors[] = $this->mailererrors['no_path'];  
   } 
    
   
/**  
* Forms a letter body  
* Формирует тело письма  
* @access private          
* @return void  
*/   
  private function createMultipart()    
  {  
          $this->multipart  = $this->dummy ."\r\n\r\n";  
          $this->plain     .= chunk_split(base64_encode($this->message))."\r\n"; 
             
      if(empty($this->html) && empty($this->attachment))  
      {  
          $this->header    .= "Content-type: multipart/mixed; "   
                           .  "boundary=\"". $this->boundary1 ."\"\r\n";
                                
          $this->multipart .= "--". $this->boundary1 ."\r\n";           
          $this->multipart .= $this->plain;                               
          $this->multipart .= "--". $this->boundary1 ."--\r\n";       
      } 
      elseif(empty($this->html)) 
      { 
          $this->header    .= "Content-type: multipart/mixed; "   
                           .  "boundary=\"". $this->boundary1 ."\"\r\n"; 
                                
          $this->multipart .= "--". $this->boundary1 ."\r\n";                 
          $this->multipart .= "Content-type: multipart/related; "   
                           .  "boundary=\"". $this->boundary2 ."\"\r\n\r\n"; 
           
          $this->multipart .= "--". $this->boundary2 ."\r\n"; 
          $this->multipart .= $this->plain;                                         
          $this->multipart .= "--". $this->boundary2 ."--\r\n"; 
          $this->multipart .= "--". $this->boundary1 ."\r\n";     
          $this->multipart .= $this->attachment; 
          $this->multipart .= "--". $this->boundary1 ."--";                             
      } 
      elseif(empty($this->attachment)) 
      { 
          $this->header    .= "Content-type: multipart/alternative; "   
                           .  "boundary=\"". $this->boundary2 ."\"\r\n"; 
                                
          $this->multipart .= "--". $this->boundary2 ."\r\n";                     
          $this->multipart .= $this->plain;                                         
          $this->multipart .= "--". $this->boundary2 ."\r\n"; 
          $this->multipart .= $this->html; 
          $this->multipart .= "--". $this->boundary2 ."--";                             
      } 
      else 
      { 
          $this->header    .= "Content-type: multipart/mixed; "   
                           .  "boundary=\"". $this->boundary1 ."\"\r\n"; 
                                
          $this->multipart .= "--". $this->boundary1 ."\r\n";               
          $this->multipart .= "Content-type: multipart/alternative; "   
                           .  "boundary=\"". $this->boundary2 ."\"\r\n\r\n"; 
  
          $this->multipart .= "--". $this->boundary2 ."\r\n";                                     
          $this->multipart .= $this->plain;                                         
          $this->multipart .= "--". $this->boundary2 ."\r\n"; 
          $this->multipart .= $this->html; 
          $this->multipart .= "--". $this->boundary2 ."\r\n";     
          $this->multipart .= "--". $this->boundary1 ."\r\n";     
          $this->multipart .= $this->attachment; 
          $this->multipart .= "--". $this->boundary1 ."--";                                   
      }       
  }  
        
/**  
* Deduces a script error.  
* Диагностика ошибок      
* @access private     
* @return string or boolean  
*/       
   private function checkData()   
   {   
      if(count($this->errors))    
          return "IRB_Mailer error: \n". implode(PHP_EOL, $this->errors);   
      else   
          return false;     
   }  

/**  
* Sends mail using the PHP mail() function.  
* Отправляет письмо используя PHP функцию  mail()     
* @access public     
* @return string   
*/     
   public function sendMail()  
   {           
           
         if(!$error = $this->checkData())  
         {     
            $this->createMultipart();  
        
            if(!mail($this->to, $this->subject, $this->multipart, $this->header, '-f'. $this->from))  
                return "IRB_Mailer error: \n". $this->mailererrors['no_send'];  
            else  
                return NULL;  
        }  
        else  
        {  
            return $error;  
        }  
   } 

}
   
   

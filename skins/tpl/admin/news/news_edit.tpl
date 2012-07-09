<!-- ./skins/tpl/guestbook/news_edit.tpl begin -->

<!-- Outputting the News name in language of choise -->
    <h2 class="alt"><?php echo EDITING_NEWS;?> № <?php echo $row['id'];?>
        <a href="<?php echo href('module=read');?>" > <?php echo GEN_RETURN; ?></a></h2>


<!-- THe info array - error mesages for this happening-->
<?php echo '<p align=justify class="info">'.getInfo($info). '</p>';?>


<!--  java function for inputting  tags( smiles, and etc) in text on click-->
<script type="text/javascript" language="javascript"> 

 function tag(tag1, tag2)   
  {   
     if ((document.selection))   
     {   
       document.getElementById('mess').focus(); 
       var text = document.post.document.selection.createRange().text   
       document.post.document.selection.createRange().text = tag1 + text + tag2;   
     } else if(document.forms['post'].elements['form[value2]'].selectionStart != undefined) {   
         var element    = document.forms['post'].elements['form[value2]'];   
         var str        = element.value;   
         var start      = element.selectionStart;   
         var length     = element.selectionEnd - element.selectionStart;   
         element.value  = str.substr(0, start) + tag1 + str.substr(start, length) + tag2 + str.substr(start + length);  
     }   
  } 
 
</script>  
    
    
    
<div id="posts">


 
    <div class="news_post_front">
         <form action="" method="post" name="post">
            <b class="imp"><?php echo $row['date']; ?>  </b><br><br>
        
        <img style="cursor:pointer" src="/skins/images/smiles/bold.gif"  alt="Жирный" onclick="tag('[b]','[/b]')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/italics.gif" alt="Курсив" onclick="tag('[i]','[/i]')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/underline.gif" alt="Подчеркнутый" onclick="tag('[u]','[/u]')">  
         | 
        <img style="cursor:pointer" src="/skins/images/smiles/10.gif" width=30 height="30" onclick="tag('[LOL]','')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/8.gif" width=30 height="30" onclick="tag('[:D]','')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/9.gif" width=30 height="30" onclick="tag('[YES]','')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/17.gif" width=30 height="30" onclick="tag('[:=P]','')">
        <img style="cursor:pointer" src="/skins/images/smiles/6.gif"  width=30 height="30" onclick="tag('[WOHOO]','')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/11.gif" width=30 height="30" onclick="tag('[SCARED]','')">
        <img style="cursor:pointer" src="/skins/images/smiles/1.gif" width=30 height="30" onclick="tag('[OUCH]','')"> 
        <br>
        <img style="cursor:pointer" src="/skins/images/smiles/strikethrough.gif" alt="Зачеркнутый" onclick="tag('[s]','[/s]')">
         <img style="cursor:pointer" src="/skins/images/smiles/link.jpg" width=30 height="30"  onclick="tag('[A]url[|]discription[/A]','')">
        |
        <img style="cursor:pointer" src="/skins/images/smiles/2.gif" width=30 height="30" onclick="tag('[SURPRIZED_NO]','')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/5.gif" width=30 height="30" onclick="tag('[:(]','')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/7.gif" width=30 height="30" onclick="tag('[SICK]','')"> 
        <img style="cursor:pointer" src="/skins/images/smiles/14.gif" width=30 height="30" onclick="tag('[:((]','')">
        <img style="cursor:pointer" src="/skins/images/smiles/15.gif" width=30 height="30" onclick="tag('[DONT_KNOW]','')">
        <img style="cursor:pointer" src="/skins/images/smiles/18.gif" width=30 height="30" onclick="tag('[WINDOW]','')">
        <img style="cursor:pointer" src="/skins/images/smiles/19.gif" width=30 height="30" onclick="tag('[HAMMER]','')">
        <br /><br />  

<!-- addon to function, inpitting the tags in the text of the message
src="smiles/2.gif" - what is to dispaly 
onclick="tag('***************','')"  - what is to be put in the message (text2 in here)

-->  
    
       <textarea name="form[value2]" id="mess" cols="40" rows="10"><?php echo $POST['value2']; ?></textarea><br><br>
        
        <input name="ok" value=" O K " type="submit">
        </form>
        
        
    </div>

</div>

<!-- ./skins/tpl/guestbook/news_edit.tpl end -->
<!-- ./skins/tpl/guestbook/show.tpl begin -->

<!-- Outputting the guestbook name in language of choise -->
<h2 class="alt"><?php echo MENU_SECTION1_ITEM3;?></h2>

<!-- THe info array - error mesages for this happening-->
<?php echo '<p class="info">'.getInfo($info). '</p>';?>

<!-- The entering form 1) name & 2) message into post array-->
<div style="text-align:center;">


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

<script type="text/javascript"> 
            // function of updating captcha
            
            function refreshCaptcha() 
            { 
                img = document.getElementById('imgCaptcha'); 
                img.src = <?php echo SITE_HOST;?> + 'libs/captcha.php?' + Math.random(); 
                return false 
            } 
</script>   

    <form name="post" method="post" action="">
       
      
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
        <br /> 

<!-- addon to function, inpitting the tags in the text of the message
src="smiles/2.gif" - what is to dispaly 
onclick="tag('***************','')"  - what is to be put in the message (text2 in here)

-->  
        <b class='alt'><?php echo GUESTBOOK_MESSAGE; ?></b><br>
        <textarea name="form[value2]" id="mess" cols="40" rows="10"><?php echo $POST['value2']; ?></textarea><br><br>
        
                         
        <input name="ok" value=" O K " type="submit">
    </form>
    
    

<br>
<div id="posts">
    <?php echo $page_menu; ?> <br>
    <!--general output -->
    <?php echo $gen_out.'<br>'; 
     echo $page_menu; ?>



</div>

</div>

<!-- ./skins/tpl/guestbook/show.tpl end --> 
<!-- ./skins/tpl/admin/news/show.tpl begin -->
<h2>Новости</h2>
<form action="" method="post">
<?php echo $page_menu; ?>
<div style="padding:10px">
<div style="float:right;padding:10px; width:500px; min-height:400px; color:#000000; background-color:#FFFFFF; border:1px solid">
    <script type="text/javascript" >
    var irb_bb_path = '<?php echo IRB_BB_PATH ?>/images/';
    </script>     
    <script type="text/javascript" src="<?php echo IRB_BB_PATH ?>/js/bb.js"></script>

<div id="main"></div>
<!-- window with smiles end -->  
                  

<!-- form begin --> 
<form action="" method="post">
Заголовок:<br />
  <input size="70" name="form[value1]" type="text" value="<?php echo $POST['value1'];?>" /><br />
<br />
<select name="color" onchange="click_bb('text', 'color=' + this.options[this.selectedIndex].value)">
  <option value="цвет">цвет</option>
  <option value="gray">серый</option>
  <option value="green">зеленый</option>
  <option value="purple">фиолетовый</option>
  <option value="olive">оливковый</option>
  <option value="silver">серебряный</option>
  <option value="aqua">морской</option>
  <option value="yellow">желтый</option>
  <option value="blue">синий</option>
  <option value="orange">оранжевый</option>
  <option value="red">красный</option>  
</select>
&nbsp;
<select name="size" onchange="click_bb('text', 'size=' + this.options[this.selectedIndex].value)">
  <option value="размер">размер</option>
  <option value="1">мелкий</option>
  <option value="2">небольшой</option>
  <option value="3">средний</option>
  <option value="4">большой</option>
  <option value="5">огромный</option>
</select>
&nbsp;
<select name="head" onchange="click_bb('text', 'h=' + this.options[this.selectedIndex].value)">
  <option value="размер">заголовки</option>
  <option value="1">H1</option>
  <option value="2">H2</option>
  <option value="3">H3</option>
  <option value="4">H4</option>
  <option value="5">H5</option>
</select>
<br />

<img id="1" src="<?php echo IRB_BB_PATH ?>/images/bold.gif" 
onmouseover="change(1, 'bold_on')" onmouseout="change(1, 'bold')" onclick="click_bb('text', 'b');" />&nbsp;
<img id="2" src="<?php echo IRB_BB_PATH ?>/images/italics.gif" 
onmouseover="change(2, 'italics_on')" onmouseout="change(2, 'italics')" onclick="click_bb('text', 'i');" />&nbsp;
<img id="3" src="<?php echo IRB_BB_PATH ?>/images/underline.gif" 
onmouseover="change(3, 'underline_on')" onmouseout="change(3, 'underline')" onclick="click_bb('text', 'u');" />&nbsp;
<img id="4" src="<?php echo IRB_BB_PATH ?>/images/strikethrough.gif" 
onmouseover="change(4, 'strikethrough_on')" onmouseout="change(4, 'strikethrough')" onclick="click_bb('text', 's');" />&nbsp;
<img id="5" src="<?php echo IRB_BB_PATH ?>/images/subscript.gif" 
onmouseover="change(5, 'subscript_on')" onmouseout="change(5, 'subscript')" onclick="click_bb('text', 'sub');" />&nbsp;
<img id="6" src="<?php echo IRB_BB_PATH ?>/images/superscript.gif" 
onmouseover="change(6, 'superscript_on')" onmouseout="change(6, 'superscript')" onclick="click_bb('text', 'sup');" />&nbsp;
<img id="7" src="<?php echo IRB_BB_PATH ?>/images/justify.gif" 
onmouseover="change(7, 'justify_on')" onmouseout="change(7, 'justify')" onclick="click_bb('text', 'justify');" />&nbsp;
<img id="8" src="<?php echo IRB_BB_PATH ?>/images/left.gif" 
onmouseover="change(8, 'left_on')" onmouseout="change(8, 'left')" onclick="click_bb('text', 'left');" />&nbsp;
<img id="9" src="<?php echo IRB_BB_PATH ?>/images/center.gif" 
onmouseover="change(9, 'center_on')" onmouseout="change(9, 'center')" onclick="click_bb('text', 'center');" />&nbsp;
<img id="10" src="<?php echo IRB_BB_PATH ?>/images/right.gif" 
onmouseover="change(10, 'right_on')" onmouseout="change(10, 'right')" onclick="click_bb('text', 'right');" />&nbsp;  
<br />
<img id="11" src="<?php echo IRB_BB_PATH ?>/images/list_ordered.gif" 
onmouseover="change(11, 'list_ordered_on')" onmouseout="change(11, 'list_ordered')" onclick="click_bb('text', 'list=ol');" />&nbsp;
<img id="12" src="<?php echo IRB_BB_PATH ?>/images/list_unordered.gif" 
onmouseover="change(12, 'list_unordered_on')" onmouseout="change(12, 'list_unordered')" onclick="click_bb('text', 'list=ul');" />&nbsp;
<img id="22" src="<?php echo IRB_BB_PATH ?>/images/li.gif" 
onmouseover="change(22, 'li_on')" onmouseout="change(22, 'li')" onclick="click_bb('text', '*');" />&nbsp;
<img id="17" src="<?php echo IRB_BB_PATH ?>/images/view_php.gif" 
onmouseover="change(17, 'view_php_on')" onmouseout="change(17, 'view_php')" onclick="click_bb('text', 'code=php');" />&nbsp;
<img id="23" src="<?php echo IRB_BB_PATH ?>/images/no_bb.gif" onmouseover="change(23, 'no_bb_on')" 
onmouseout="change(23, 'no_bb')" onclick="click_bb('text', 'code=nobb');" />&nbsp;
<img id="18" src="<?php echo IRB_BB_PATH ?>/images/quote.gif" 
onmouseover="change(18, 'quote_on')" onmouseout="change(18, 'quote')" onclick="click_bb('text', 'quote');" />&nbsp;
<img id="20" src="<?php echo IRB_BB_PATH ?>/images/insert_hyperlink.gif" 
onmouseover="change(20, 'insert_hyperlink_on')" onmouseout="change(20, 'insert_hyperlink')" onclick="click_url();" />&nbsp;
<img id="21" src="<?php echo IRB_BB_PATH ?>/images/insert_picture.gif" 
onmouseover="change(21, 'insert_picture_on')" onmouseout="change(21, 'insert_picture')" onclick="click_bb('text', 'img');" />&nbsp;
<br />  
<textarea id="text" name="form[value2]" cols="60" rows="15" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo $POST['value2'] ?></textarea>
<br />
<input type="submit" name="ok" value="Cохранить" />
<input type="button" onclick="window.location.href='<?php echo href('module=new') ?>'" value="Добавить новость" />  
<br>
<div  style="float:left">
<?php echo $news; ?>
</div>
   
</div> 
<div style="clear:both"></div> 
</div>
</form>
<!-- ./skins/tpl/admin/news/show.tpl end -->
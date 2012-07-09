<!-- ./skins/tpl/admin/main/form_edit.tpl begin -->
<script type="text/javascript">
	WYSIWYG.attach('editor', full);
</script>

<form action="" method="post">
    <h3><?php echo EDITING_PAGE;?> <b class="alt"><?php echo $article['name'];?> </b> </h3>
        &nbsp;&nbsp;<a href="<?php echo href('module=read')?>">К списку</a>
    <h4><?php echo STATIC_NAME_LINK;?></h4>
    <input name="form[value1]" type="text" size="70" value="<?php echo $article['name'];?>"><br><br>
    
    <textarea id="editor" name="form[value2]" style="width:850px;height:400px;"><?php echo $article['text'];?></textarea>
    <br>
    <input name="ok" type="submit" value="Сохраниро и выйти">
</form>
<!-- ./skins/tpl/admin/main/form_edit.tpl end -->
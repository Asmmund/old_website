<!-- ./skins/tpl/admin/main/form_edit.tpl begin -->
<script type="text/javascript">
	WYSIWYG.attach('editor', full);
</script>

<form action="" method="post">
    <h3><?php echo EDITING_PAGE;?> <b class="alt"><?php echo $page;?> </b> </h3>
        &nbsp;&nbsp;<a href="<?php echo href('module=read')?>">Return</a>
    <h4><?php echo STATIC_NAME_LINK;?></h4>
    <input name="form[value1]" type="text" size="70" value="<?php echo $page;?>"><br><br>
    
    <textarea id="editor" name="form[value2]" style="width:850px;height:400px;"><?php echo $edittext;?></textarea>
    <br>
    <input name="ok" type="submit" value="Edit">
</form>
<!-- ./skins/tpl/admin/main/form_edit.tpl end -->
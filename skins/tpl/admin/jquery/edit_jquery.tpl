<!-- ./skins/tpl/admin/jquery/edit_jquery.tpl begin -->
<div class="guest_post"">

<form action="" method="post">
    <h3><?php echo EDITING_JQUERY;?> <b class="alt"><?php echo $jquery['name'];?> </b>
         <a href="<?php echo href('module=read')?>">Return</a> </h3>
        
    <h4><?php echo NAME_JQUERY;?></h4>
        <input name="form[value1]" type="text" size="70" value="<?php echo $jquery['name'];?>"><br><br>
    <h4><?php echo JQUERY_TEXT;?></h4>
        <textarea name="form[value2]"  ><?php echo $jquery['text'];?></textarea>
    <br><br>
    <input name="ok" type="submit" value="Edit">
</form>

</div>
<!-- ./skins/tpl/admin/jquery/edit_jquery.tpl end -->
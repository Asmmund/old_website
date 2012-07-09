<!-- ./skins/tpl/admin/main/show.tpl begin -->
<div class="guest_post"">




<form action="" method="post">

<div style="float:left;padding:5px; width:320px;">
    <h2 class="alt"> <?php echo STATIC_PAGES; ?></h2>
    <b class="info"><?php echo getInfo($info);?></b>
    <h4><?php echo STATIC_NAME_URL; ?></h4>
    <input name="form[value1]" type="text" size="50" value="<?php echo $POST['value1'];?>">
    <h4><?php echo STATIC_NAME_LINK; ?></h4>
    <input name="form[value2]" type="text" size="50" value="<?php echo $POST['value2'];?>">
    <br>
    <br><br>
    <input name="ok" type="submit" value="<?php echo ADD;?>">
    
</div>

<div style="float:right;width:200px; padding: 0px 0px 0px 20px; background-color: #EEEEEE; ">
    <h4 class="alt"><?php echo EDITING_PAGE; ?></h4>
    <?php echo createMenu($links); ?><br>
<br><br><br>    
    <input name="delete" type="submit" value="<?php echo ADMIN_DELETE;?>" style=" margin-left:50px;color:red"  onclick="return confirm('<?php echo ADMIN_DELETE;?>')">
</div>
<br><br>
<div style="both:clear"></div>
    
</form>


</div>

<!-- ./skins/tpl/admin/main/show.tpl end -->
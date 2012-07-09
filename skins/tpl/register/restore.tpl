<!-- skins/tpl/register/restore.tpl begin -->
<div id="posts">
    <div class="mysql_list">
        <div class="login">
<h2><?php echo RESTORE_PASS;?></h2>

<form action="" method="post">

<!-- THe info array - error mesages -->
    <?php echo '<p class="info">'.getInfo($info). '</p>';?><br>

    <?php echo LOGIN;?><br>
    <input name="form[value1]" type="text" value="<?php echo $POST['value1'];?>"> <br><br>

    <?php echo ENTER_EMAIL;?><br>
    <input name="form[value2]" type="text" value="<?php echo $POST['value2'];?>"><br><br>

    <input type="submit" name="ok" value="<?php echo RESTORE_PASS;?>"><br>

</form>
        </div>
    </div>
</div>

<!-- skins/tpl/register/restore.tpl end -->
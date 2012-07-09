<!-- skins/tpl/register/enter.tpl begin -->
<div class="board">
<div class="mysql_list">
    <div class="login">
    
      
<h2><?php echo ENTER;?></h2>

<!-- THe info array - error mesages -->
<?php echo '<p class="info">'.getInfo($info). '</p>';?>


<form action="" method="post">

    <?php echo LOGIN;?><br>
    <input type="text" name="form[value1]" value="<?php echo $POST['value1'];?>"><br><br>
    
    <?php echo PASSWORD;?><br>
    <input name="form[value2]" type="password"><br><br>

     <input name="form[value4]" type="checkbox" value="1" <?php echo returnCheck(1, $POST['value4']);?>>
        <?php echo REMEMBER_YOU;?><br><br>

    <input name="ok" type="submit" value="<?php echo ENTER;?>"><br><br>
    
    <a href="<?php echo href('page=register', 'module=register');?>"><?php echo REGISTER;?></a>
        <?php echo OR_CAN;?>
            <a href="<?php echo href('page=register', 'module=restore');?>"><?php echo RESTORE_FORGOTTEN;?></a>
</form>
</div>
</div>
</div>


<!-- skins/tpl/register/enter.tpl end -->
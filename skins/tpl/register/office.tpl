<!-- skins/tpl/register/office.tpl begin -->
<div class="board">

    <div class="mysql_list">
    <div class="login">
    
<h2 ><?php echo OFFICE;?></h2>

<!-- THe info array - error mesages -->
<?php echo '<p class="info">'.getInfo($info). '</p>';?>

<form action="" method="post">

    <?php echo LOGIN;?> :
    <h3 class="info"><?php echo $data['login'];?></h3>

    <?php echo PASSWORD;?><br>
    <input name="form[value2]" type="password"><br>
    
    <?php echo REPEAT_PASS;?><br>
    <input name="form[value3]" type="password"><br>
    
    <?php echo ENTER_EMAIL;?><br>
    <input type="text" name="form[value4]" value="<?php echo $data['email'];?>"> <br><br>
    
    <input type="submit" name="ok" value="<?php echo UPDATE;?>">

</form>
</div>
</div>
</div>
<!-- skins/tpl/register/office.tpl end -->
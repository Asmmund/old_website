<!-- skins/tpl/register/activate begin -->
<h2><?php echo ACTIVATE_ACCOUNT;?></h2>

<!-- THe info array - error mesages -->
<?php echo '<p class="info">'.getInfo($info). '</p>';?> <br>

<form action="" method="post">
    <?php echo ACTIVATION_CODE;?><br>
    <input type="text" name="form[value1]" size="50" value="<?php echo $GET['id'];?>"><br><br>
    
    <input name="form[value2]" type="checkbox" value="1"
        <?php echo returnCheck(1, $POST['value2']);?>><?php echo REMEMBER_YOU;?><br><br>
        
    <input type="submit" name="ok" value="<?php echo ENTER;?>">
        
    
</form>



<!-- skins/tpl/register/activate end -->
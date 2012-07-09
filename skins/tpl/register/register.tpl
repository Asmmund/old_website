<!-- skins/tpl/register/register.tpl begin -->
<div class="info_art">

    <div class="mysql_list">
    <div class="login">

<h2><?php echo REGISTER;?></h2>

<!-- THe info array - error mesages -->
<?php echo '<p class="info">'.getInfo($info). '</p>';?>

<form action="" method="post">
    <?php echo LOGIN;?><br>
    <input name="form[value1]" type="text" value="<?php echo $POST['value1'];?>" ><br><br>
    
    <?php echo PASSWORD;?><br>
    <input name="form[value2]" type="password"><br><br>
    
    <?php echo REPEAT_PASS;?><br>
    <input name="form[value3]" type="password"><br><br>

    <?php echo ENTER_REAL_EMAIL;?><br>
    <input name="form[value5]" type="text" value="<?php echo $POST['value5'];?>"><br><br>

    <input name="form[value4]" type="checkbox" value="1" <?php echo returnCheck(1, $POST['value4']); ?>>
        <?php echo REMEMBER_YOU;?><br><br>
<?php /*        
<!-- Captcha begin -->        
    <input type="image" id="imgCaptcha" src="<?php echo SITE_HOST;?>libs/captcha.php"  value=""  
                            onclick="return refreshCaptcha();" />
                            
    <input type="text" name="txtCaptcha" value="" maxlength="5" size="5" />                        
<!-- Captcha end -->

*/ ?>    

    <input name="ok" type="submit" value="<?php echo REGISTER;?>"><br>
</form>

</div>
    </div>
    </div>
<!-- skins/tpl/register/register.tpl end -->
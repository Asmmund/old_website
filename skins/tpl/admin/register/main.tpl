<!-- skins/tpl/admin/register/main.tpl begin -->
<div class="mysql_list">
<form action="" method="post">

<table width="90%" border="1" align=center>
    <th># user</th>
    <th>Login</th>
    <th>Date of reg.</th>
    <th>Email</th>
    <th class="info">Activated?</th>
<?php echo $gen_out;?>

</table><br>

<input type="submit" name="ok" value="<?php echo DELETE;?>"> <input type="submit" name="delete" value="<?php echo DELETE_OLD;?>">
</form>

</div>

<!-- skins/tpl/admin/register/main.tpl end -->
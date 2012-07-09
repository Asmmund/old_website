<!-- ./skins/tpl/admin/meta/form_setup.tpl  begin -->
<div style="padding: 10px">

    <div style="float:left; pagging-left:10px; width:350px" >
        <h2 ><?php echo SETTING_METADATA;?> <br><b class="alt"><?php echo $moduls;?></b></h2><br><br><br>
        <form action="" method="post">
<!-- Title of the webpage value1 - not to mix it up later-->
            <h4><?php echo TITLE; ?></h4>
            <input name="form[value1]" type=text size="70" value="<?php echo $POST['value1'];?>">
<!-- Keywords of the webpage value2 - not to mix it up later -->    
            <h4><?php echo KEYWORDS; ?></h4>
            <textarea name="form[value2]"  cols="50" rows="8" ><?php echo $POST['value2'];?></textarea>
<!-- Description of the webpage value3 - not to mix it up later -->    
            <h4><?php echo DESCRIPTION; ?></h4>
            <textarea name="form[value3]"  cols="50" rows="8" ><?php echo $POST['value3'];?></textarea>
            <br>
            <input name="ok" type="submit" value=" O K "> 
        </form>
    </div>
    
    
    <div style="float:right;width:150px; margin:0px;padding-right: 0px;">
        <?php echo pagesMenu($language);?>
    </div>
    
    <div style="clear:both"></div>
</div>



<!-- ./skins/tpl/admin/meta/form_setup.tpl end -->
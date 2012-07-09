<!-- ./skins/tpl/admin/guestbook/rows.tpl begin -->
<div style='width: 70%; min-height:100px; margin:5px; margin-left:10%; padding:5px' class="guest_post">
    <div class="delete">
        <input name="form[array1][]" type=checkbox value="<?php echo $tpl_id;?>">
    </div>
     <?php  echo $tpl_date;?> / <b class="imp"><?php echo $tpl_name;?></b>
    <hr width=30% align='left'>
    <?php echo $tpl_text;?>
</div>


<!-- ./skins/tpl/admin/guestbook/rows.tpl end -->
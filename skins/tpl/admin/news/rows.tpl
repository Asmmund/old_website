<!-- skin ./skins/tpl/guestbook/rows.tpl begin -->


<div class="news_post_front" >
    <div class="delete"> 
         <input name="form[array1][]" type=checkbox value="<?php echo $tpl_id;?>">№ <?php echo $tpl_id;?>  
     </div>
     
    <a href="<?php echo href('module=edit', 'id='. $tpl_id); ?>"> <b class="imp"><?php  echo $tpl_date;?></b> </a>     
    <hr width=30% align='left'>
    <?php echo $tpl_text;?>
</div>
</form>
<!-- skin ./skins/tpl/guestbook/rows.tpl end-->
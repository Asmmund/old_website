<!-- ./skins/tpl/admin/news/rows.tpl begin -->
    <div  style="padding:5px; margin-top:3px; border:1px solid">
    <a href="<?php echo $tpl_public_url; ?>"><?php echo $tpl_public_link; ?></a> <br />
    <a href="<?php echo href('module=edit', 'id='. $tpl_id); ?>">Редактировать</a> <br />
    <a href="<?php echo href('module=delete', 'id='. $tpl_id); ?>" onclick="return confirm('Удалить?')">Удалить</a> 
    <hr />       
    <p><?php echo $tpl_date ?><br /> 
    <b><?php echo $tpl_subtitle; ?></b></p>
    <p><?php echo $tpl_text; ?></p>
    <div style="text-align:right"><a href="<?php echo $tpl_url; ?>"><?php echo $tpl_link; ?></a></div>    
    </div>
<!-- ./skins/tpl/admin/news/rows.tpl end -->
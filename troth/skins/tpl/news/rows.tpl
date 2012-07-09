<!-- ./skins/tpl/news/rows.tpl begin -->
    <div  style="padding-top:5px; margin-top: 3px; width:190px; border:0px ">    
    <p><b style="font-weight:bold;color:red;" ><?php echo $tpl_date ?></b><br /> 
    <b style="font-weight:bold;"><?php echo $tpl_subtitle; ?></b></p>
    <p><?php echo $tpl_text; ?></p>
    
    <div style="text-align:right">
        <a href="<?php echo $tpl_url; ?>">
            <?php echo $tpl_link; ?>
        </a>
    </div>
     
    </div>
    <hr width=30%>
<!-- ./skins/tpl/news/rows.tpl end -->
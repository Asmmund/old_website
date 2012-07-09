
<!-- divider & lang menu  begin-->
<div id="outer-image">
    <div class="current_lang">
    <!-- Current language-->
         <img src="<?php echo SITE_HOST; ?>skins/images/languages/<?php echo $lang;?>.gif" 
            height="30" width="60" alt="<?php echo ALT_CUR_LANG; ?>" >
    </div>

    <!-- Choose your language begin-->    
        <div class="choose_lang">
            < <?php echo CHOOSE_LANG; ?>
        </div>
    <!-- Choose your language end-->         


    <div class="lang_menu">
        <!-- English-->
         <a href="<?php echo SITE_HOST;?>index.php?lang=en">
             <img src="<?php echo SITE_HOST; ?>skins/images/languages/en.gif"   ></a>

        <!-- Russian-->
         <a href="<?php echo SITE_HOST;?>index.php?lang=ru">
              <img src="<?php echo SITE_HOST; ?>skins/images/languages/ru.gif"  height="24" width="30"></a>
    </div>
    
</div>
<!-- divider & lang menu  end-->
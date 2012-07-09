<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" type="text/css" href="/skins/css/old.css">
<!-- WYSIWYG  skripts Begin -->
    <script type="text/javascript" src="/editor/scripts/wysiwyg.js"></script>
    <script type="text/javascript" src="/editor/scripts/wysiwyg-settings.js"></script>
<!-- WYSIWYG  skripts End --> 

    <link rel="icon" 
      type="image/png" 
      href="<?php echo SITE_HOST;?>skins/images/admin.ico">
   
</head>

<body>
<div id="content">

<?php
// including header 
    include SITE_ROOT. 'skins/tpl/header.tpl';

// including lang menu and divider
 //   include SITE_ROOT . 'skins/tpl/lang_div.tpl';
?>

<!-- Menu begin -->
<div id="navbar">
        
        <ul>
        
    <!--Menu 1 Begin-->                   
                   <li><h3 class="alt" style="text-align:center;"><?php echo ADMIN_PANEL; ?></h3>
                       <ul>
                           <li><a href="<?php echo href('page=register', 'module=read'); ?>" title="<?php echo MENU_REGISTER;?>"><?php echo REGISTER;?></a></li>
                           <li><a href="<?php echo href('page=meta', 'module=main'); ?>" title="<?php echo MENU_METATAGS;?>"><?php echo MENU_METATAGS;?></a></li> 
                           <li><a href="<?php echo href('page=news', 'module=read'); ?>" title="<?php echo MENU_SECTION1_ITEM1;?>"><?php echo MENU_SECTION1_ITEM1;?></a></li>
                           <li><a href="<?php echo href('page=main', 'module=read'); ?>" title="<?php echo MENU_SECTION1_ITEM2;?>"><?php echo MENU_SECTION1_ITEM2;?></a></li>  
                           <li><a href="<?php echo href('page=guestbook','module=read'); ?>" title="<?php echo MENU_SECTION1_ITEM3;?>"><?php echo MENU_SECTION1_ITEM3;?></a></li>
                           <li><a href="<?php echo href('page=jquery','module=read', 'id=0');?>" title="jQuery scripts">jQuery</a></li>
                           <li><a href="<?php echo href('page=info','module=read', 'id=0');?>" title="<?php echo MODULE_INFO;?>"><?php echo MODULE_INFO;?></a></li>
                           <li><a href='<?php echo SITE_HOST;?>' ><?php echo TO_THE_SITE;?></a></li>
                           <li><a href="<?php echo href('page=exit');?>" onclick="return confirm('<?php echo MENU_EXIT;?>')"><?php echo MENU_EXIT;?></a></li>
                  </ul>
            </li><br>
    <!-- onclick="return confirm('<?php echo 'Sure?';?>')" Menu 1 end-->                


                
                </ul> 
            </div>
<!-- menu end-->

<!-- Main text begin -->
    <div id="main-text">
        <?php
           echo $content; 
           
           include SITE_ROOT. 'skins/tpl/footer.tpl';
        ?>
        
        
       
        
    </div>
<!-- Main text end-->

</div>

    
</body>
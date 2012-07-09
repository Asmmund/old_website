<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo SITE_HOST;?>skins/css/old.css">
<!-- WYSIWYG  skripts Begin -->
    <script type="text/javascript" src="<?php echo SITE_HOST;?>editor/scripts/wysiwyg.js"></script>
    <script type="text/javascript" src="<?php echo SITE_HOST;?>editor/scripts/wysiwyg-settings.js"></script>
<!-- WYSIWYG  skripts End --> 

    <link rel="icon" 
      type="image/png" 
      href=" ">
   
</head>

<body>
<div id="content">

<!-- Menu begin -->
<div id="navbar">
        
        <ul>
        
    <!--Menu 1 Begin-->                   
                   <li><h3 class="alt" style="text-align:center;">Панель Администратора</h3>
                       <ul>
                           <li><a href="<?php echo href('page=meta'); ?>" title="Редактирование метаданных">Редактирование метаданных</a></li> 
                           <li><a href="<?php echo href('page=news', 'module=read'); ?>" title="Новости">Новости</a></li>
                           <li><a href="<?php echo href('page=articles', 'module=read'); ?>" title="Статьи">Статьи</a></li>
                           <li><a href='<?php echo SITE_HOST;?>' target="_new">Посмотреть на сайт</a></li>
                           <li><a href="<?php echo href('page=exit');?>" onclick="return confirm('Вы уверены?')">Выход</a></li>
                  </ul>
            </li><br/>
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
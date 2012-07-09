<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head profile="http://www.w3.org/2005/10/profile">
	<title><?php echo $title; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="author" content="Elmor">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description;?>">
    <link type="text/css" rel="stylesheet" href="/skins/css/vertical.css">
    <link type="text/css" rel="stylesheet" href="/skins/css/core-style.css">
    <link type="text/css" rel="stylesheet" href="/skins/css/paginator.css">
    <script src="skins/js/vertical.js"></script>
    <script src="<?php echo SITE_HOST;?>skins/js/jquery.js"></script>
	<link rel="icon"
      type="image/ico" 
      href="<?php echo SITE_HOST;?>skins/images/favicon.ico">
    
</head>

<body>
<!-- php include for article menu to work begin -->
<?php

?>
<!-- php include for article menu to work end -->

<div id="content">


<?php
// including header 
    include SITE_ROOT. 'skins/tpl/header.tpl';

// including lang menu and divider
    include SITE_ROOT . 'skins/tpl/lang_div.tpl';
?>


<!-- Menu begin -->
<div style="float: left;">
<ul id="navmenu-v">
 <!-- Menu begin -->

        <!--Enter site begin 
        <a href="<?php echo href('page=register', 'module=enter' );?>" title="<?php echo TITLE_ENTER; ?>"><?php echo ENTER;?></a>
        -->                   
                           <?php echo $enter_exit;?>
        <!--Enter site end -->        
        <!--Menu important module Begin-->                   
                   <li><a class="imp" href="<?php echo href('page=download', 'module=read');?>"
                            title="<?php echo TITLE_DOWNLOAD;?>"><?php echo DOWNLOAD;?> &raquo;</a>
                   </li>
    <!--Menu important module end--> 
        
        <!--Menu important module Begin-->                   
                   <li><a class="imp" title="<?php echo TITLE_IMPORTANT;?>"><?php echo IMPORTANT;?> &raquo;</a>
                       <ul>
                           <li><a href="<?php echo href('page=important', 'module=works');?>"><?php echo WHAT_HERE;?></a></li>                        
                           <li><a href="<?php echo href('page=important', 'module=resume');?>"><?php echo RESUME;?></a></li>
                       </ul>
                   </li>
    <!--Menu important module end--> 



    <!--Menu news and guestbook module Begin-->
            <li><a class="imp" title="<?php echo TITLE_I_DO;?>"><?php echo I_DO; ?> &raquo;</a>
                <ul>
                    <li><a href="<?php echo href('page=news', 'module=read');?>#posts" title="<?php echo MENU_SECTION1_ITEM1; ?>"><?php echo MENU_SECTION1_ITEM1; ?></a></li>
                    <li><a href="<?php echo href('page=guestbook', 'module=read');?>" title="<?php echo MENU_SECTION1_ITEM3; ?>"><?php echo MENU_SECTION1_ITEM3; ?></a></li>
                    <li></li>
                </ul>
            </li>
    <!--Menu news and guestbook module end-->                



<!-- Menu jQuery module  begin -->     
                   <li><a href="<?php echo href('page=jquery', 'module=list');?>" class="imp" title="<?php echo TITLE_JQUERY;?>">jQuery &raquo;</a>
                       <?php echo createJqueryMenu();?> 
                   
                   </li>
<!-- Menu jQuery module end -->
    
    
    
<!-- Menu info module begin -->        
                   <li><a href="<?php echo href('page=info', 'module=list');?>" class="imp" title="<?php echo TITLE_MODULE_INFO;?>"><?php echo MODULE_INFO;?>  &raquo;</a>
                       <?php echo createMenuInfo(); ?>
                   
                   </li>
<!-- Menu info module end -->        
                           
<!-- Menu articles module begin -->        
                   <li><a href="<?php echo href('page=main', 'module=list');?>" class="imp" title="<?php echo TITLE_STATIC_PAGES;?>"><?php echo STATIC_PAGES;?> &raquo; </a>
                       <?php echo createMenuArticles();?>
                   </li>    
<!-- Menu articles module end -->        
                        
    
<?php /**    
<!--Menu galery  Begin-->                   
                   <li><a class="imp" title="<?php echo TITLE_STUFF;?>"><?php echo STUFF;?> &raquo;</a>
                       <ul>
                           <li><a href="<?php echo SITE_HOST;?>gallery/index.php" target='_new'><?php echo GALLERY;?></a></li>
                       </ul>
                   </li>
<!--Menu galery  end-->                   
*/ ?>

               </ul>    
   
</ul>
</div>
<!-- menu end-->

<!-- Main text begin -->
    <div id="main-text">
        <div class="location">
<!-- Location begin -->
    
<!-- Map of the website module begin -->    
    <a href="<?php echo href('page=map', 'module=read');?>"><?php echo MAIN; ?></a> &raquo;
<!-- Map of the website module end -->    
     
        <?php
        
/** download module */
    if($page == 'download')
    echo DOWNLOAD;
/** Important module  */ 
        
        if ( ($page == 'important') && ($GET['module'] == 'works') )
            echo IMPORTANT . ' &raquo; ' . WHAT_HERE;
        if ( ($page == 'important') && ($GET['module'] == 'resume') )
            echo IMPORTANT . ' &raquo; ' . RESUME;
        
/** News */        
         if( ($page == 'news')  )
                echo I_DO . ' &raquo; ' . MENU_SECTION1_ITEM1;

/** Guestbook */                
            if ($page == 'guestbook')
                echo I_DO . ' &raquo; ' . MENU_SECTION1_ITEM3;
/** jQuery */
            if( $page == 'jquery')
            {
?>              <a href="<?php echo href('page=jquery', 'module=list');?>">jQuery</a> &raquo;
    
<?php
                 echo  $jquery['name'];
             }
                
/** Info module */
            if( $page == 'info' )
             {
?>              <a href="<?php echo href('page=info', 'module=list');?>"><?php echo MODULE_INFO;?></a> &raquo;
    
<?php
                 echo  $article['name'];
             }    


/** main module */                
            if($page == 'main') 
            {
?>              <a href="<?php echo href('page=main', 'module=list');?>"><?php echo STATIC_PAGES;?></a> &raquo;
    
<?php
                 echo  $article['name'];
             }    
        
?>        
        
<!-- Location end -->        
        </div>    
<?php        
        
     
        
        
        
               echo $content; 
            
            include SITE_ROOT. 'skins/tpl/footer.tpl';
        ?>
        
        
        
    </div>
<!-- Main text end-->

</div>

</body>
</html>
<!DOCTYPE html> 
<html>

<head>
  <title>Personal presentation</title>
  <base href="<?php echo SITE_ROOT; ?>" />
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="<?php echo SITE_ROOT; ?>/templates/default/css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="<?php echo SITE_ROOT; ?>/templates/default/js/modernizr-1.5.min.js"></script>
</head>
<body>
  <div id="main">		

    <header>
        <?php include APP_PATH . "views/modules/mod_external/mod_default_template/mod_header/index.php"; ?>
        <nav>
	    <div id="menubar">
                <ul id="nav">

                <?php include APP_PATH . "views/modules/mod_external/mod_default_template/navbar/index.php"; ?>

                </ul>
            </div><!--close menubar-->	
        </nav>
    </header><!--close header-->
    
    <?php include APP_PATH . "views/modules/mod_external/mod_default_template/mod_slider/index.php"; ?> 
	
    <div id="site_content">			  
        <div class="sidebar_container">        		
            <?php include APP_PATH . "views/modules/mod_external/mod_default_template/sidebar/index.php"; ?>
        </div><!--close sidebar_container-->		   
	<div id="content">
            <div class="content_item">

                [VIEW]
			  
            </div><!--close content_item-->
        </div><!--close content-->   
    </div><!--close site_content-->  	
	
  </div><!--close main-->
  
  <footer>
      <?php include APP_PATH . "views/modules/mod_external/mod_default_template/mod_footer/index.php"; ?>
  </footer>   
</body>
</html>

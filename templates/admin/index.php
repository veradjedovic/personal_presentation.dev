<?php 

use app\classes\Session as Session;

if(!Session::get("status")||Session::get("status")!=ADMIN){
	header("location: " . SITE_ROOT . "/login");
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_head/index.php"; ?>
<!-- END  HEAD-->

<!-- BEGIN BODY-->
<body class="padTop53">

     <!-- MAIN WRAPPER -->
    <div id="wrap">

        <!-- HEADER SECTION -->
        <?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_header/index.php"; ?>
        <!-- END HEADER SECTION -->

        <!-- MENU SECTION -->
        <?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_menu/index.php"; ?>
        <!--END MENU SECTION -->

        <!--PAGE CONTENT -->
        <?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_content/index.php"; ?>
        <!--END PAGE CONTENT -->

    </div>
    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_footer/index.php"; ?>
    <!--END FOOTER -->
    <!-- GLOBAL SCRIPTS -->
    <?php // include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_scripts/index.php"; ?>
    <!-- END GLOBAL SCRIPTS -->
    
</body>
<!-- END BODY-->   
</html>

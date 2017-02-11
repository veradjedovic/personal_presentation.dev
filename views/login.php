<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>BCORE Admin Dashboard Template | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/templates/admin/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/templates/admin/assets/css/login.css" />
    <link rel="stylesheet" href="<?php echo SITE_ROOT; ?>/templates/admin/assets/plugins/magic/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
        
    <div id ="message" class="success">                  
        <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
    </div>     
        
    <div class="text-center">
        <img src="<?php echo SITE_ROOT; ?>/templates/admin/assets/img/logo.png" id="logoimg" alt=" Logo" />
    </div>
    
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="<?php echo SITE_ROOT; ?>/login/" class="formInsert form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your email and password
                </p>
                <input name="tb_email" type="text" placeholder="Email" class="form-control" />
                <input name="tb_password" type="password" placeholder="Password" class="form-control" />
                <button class="submit btn text-muted text-center btn-danger" type="submit">Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email"  required="required" placeholder="Your E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
            </form>
        </div>
        <div id="signup" class="tab-pane">
            <form action="index.html" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Please Fill Details To Register</p>
                 <input type="text" placeholder="First Name" class="form-control" />
                 <input type="text" placeholder="Last Name" class="form-control" />
                <input type="text" placeholder="Username" class="form-control" />
                <input type="email" placeholder="Your E-mail" class="form-control" />
                <input type="password" placeholder="password" class="form-control" />
                <input type="password" placeholder="Re type password" class="form-control" />
                <button class="btn text-muted text-center btn-success" type="submit">Register</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
            <li><a class="text-muted" href="#signup" data-toggle="tab">Signup</a></li>
        </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo SITE_ROOT; ?>/templates/admin/assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="<?php echo SITE_ROOT; ?>/templates/admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo SITE_ROOT; ?>/templates/admin/assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

    <script type="text/javascript">
//        
//      $('.submit').click(function(e){
//       
//        e.preventDefault();      
//        $(".message").html("");
//        
//        $.ajax({
//            
//            url: $('.formInsert').attr('action'),      
//            type: $('.formInsert').attr('method'),         
//            data: $('.formInsert').serialize(),       
//            dataType: 'json',
//            
//            success: function(response) {
//                
//                console.log(response); 
//                
//                if(response.error == false){
//                    if (response.redirect) {
//                        // data.redirect contains the string URL to redirect to
//                        window.location.href = response.redirect;
//                    }
//                } else {
//                    $("#message").html(response.message ).addClass( "alert alert-danger alert-dismissable" );
//                }     
//            }
//        });        
//    });
//    
    </script>
      
</body>
    <!-- END BODY -->
</html>

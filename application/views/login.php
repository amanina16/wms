<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?php echo base_url() ?>ui/img/favicon.png">

    <title>WMS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>ui/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ui/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url() ?>ui/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>ui/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ui/css/style-responsive.css" rel="stylesheet" />


</head>

  <body class="login-body">

    <div class="container">
	
	<form class="form form-signin" action="<?php echo base_url('Login/aksi_login'); ?>" method="post">
        <h2 class="form-signin-heading">Warehouse Management System</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            
            <button class="btn btn-lg btn-login btn-block" type="submit">Login</button>
          
        </div>

          <!-- Modal -->
          
          <!-- modal -->

      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>ui/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>ui/js/bootstrap.bundle.min.js"></script>


  </body>
</html>

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
    <link href="<?php echo base_url() ?>ui/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/css/owl.carousel.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>ui/assets/gritter/css/jquery.gritter.css" />
    
	<!--dynamic table-->
    <link href="<?php echo base_url() ?>ui/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>ui/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>ui/assets/data-tables/DT_bootstrap.css" />
   
    <!--right slidebar-->
    <link href="<?php echo base_url() ?>ui/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="<?php echo base_url() ?>ui/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ui/css/style-responsive.css" rel="stylesheet" />

  </head>

  <body >

  <section id="container">
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <!--logo start-->
            <a href="<?php echo base_url() ?>ui/index.html" class="logo">Ware<span>House</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
               
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo base_url() ?>ui/#">
                            <img alt="" src="<?php echo base_url() ?>ui/img/avatar1_small.jpg">
                            <span class="username"><?= $username_login; ?> </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>
							<li><a onclick="return confirm('Apakah Anda ingin keluar?')" href="<?php echo base_url('login/logout'); ?>">Log Out</a></li>
                        </ul>
                    </li>
                    <li class="sb-toggle-right">
                        <i class="fa  fa-align-right"></i>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->


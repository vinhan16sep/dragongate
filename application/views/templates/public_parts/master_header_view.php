<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dragon Gate</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="<?php echo site_url('assets/public/img/fav-icon/icon.png') ?>">


    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/style.css') ?>">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/responsive.css') ?>">


    <!-- Fix Internet Explorer ______________________________________-->

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="vendor/html5shiv.js"></script>
    <script src="vendor/respond.js"></script>
    <![endif]-->

    <!-- Js File_________________________________ -->

    <!-- j Query -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/jquery.2.2.3.min.js') ?>"></script>
    <!-- Bootstrap Select JS -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/bootstrap-select/dist/js/bootstrap-select.js') ?>"></script>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/bootstrap/bootstrap.min.js') ?>"></script>

    <!-- Vendor js _________ -->
    <!-- Camera Slider -->
    <script type='text/javascript' src='<?php echo site_url('assets/public/vendor/Camera-master/scripts/jquery.mobile.customized.min.js') ?>'></script>
    <script type='text/javascript' src='<?php echo site_url('assets/public/vendor/Camera-master/scripts/jquery.easing.1.3.js') ?>'></script>
    <script type='text/javascript' src='<?php echo site_url('assets/public/vendor/Camera-master/scripts/camera.min.js') ?>'></script>
    <!-- Mega menu  -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/bootstrap-mega-menu/js/menu.js') ?>"></script>

    <!-- WOW js -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/WOW-master/dist/wow.min.js') ?>"></script>
    <!-- owl.carousel -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/owl-carousel/owl.carousel.min.js') ?>"></script>
    <!-- js count to -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/jquery.appear.js') ?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/jquery.countTo.js') ?>"></script>
    <!-- Fancybox -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/vendor/fancybox/dist/jquery.fancybox.min.js') ?>"></script>
    <!-- Query Loader -->
    <script src="<?php echo site_url('assets/public/vendor/queryloader/queryLoader3.js') ?>" type="text/javascript"></script>

    <!-- Theme js -->
    <script type="text/javascript" src="<?php echo site_url('assets/public/js/theme.js') ?>"></script>


</head>

<body>
<div class="main-page-wrapper">

    <!--
    =============================================
        Theme Header
    ==============================================
    -->
    <header class="theme-menu-wrapper menu-style-two">
        <div class="header-wrapper">
            <div class="container">
                <!-- Logo -->
                <div class="logo float-left tran4s"><a href="<?php echo base_url('homepage') ?>"><img src="<?php echo site_url('assets/public/img/logo/logoDG.png') ?>" alt="Logo"></a></div>

                <!-- ============================ Theme Menu ========================= -->
                <nav class="theme-main-menu float-right navbar" id="mega-menu-wrapper">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav">
                            <li class="dropdown-holder menu-list active">
                                <a href="<?php echo base_url('homepage') ?>" class="tran3s">Home</a>
                            </li>
                            <li class="dropdown-holder menu-list">
                                <a href="<?php echo base_url('services') ?>" class="tran3s">Services</a>
                            </li>
                            <li class="dropdown-holder menu-list">
                                <a href="<?php echo base_url('works') ?>" class="tran3s">Works</a>
                            </li>
                            <li class="dropdown-holder menu-list">
                                <a href="<?php echo base_url('about') ?>" class="tran3s">About</a>
                            </li>
                            <li class="login-button">
                                <a href="<?php echo base_url('contact') ?>" class="tran3s">Contact Us</a>
                            </li>
                            <!--<li class="login-button">
                                <a href="#" class="tran3s" data-toggle="modal" data-target=".signUpModal">login</a>
                            </li>-->
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav> <!-- /.theme-main-menu -->
            </div> <!-- /.clearfix -->
        </div>
    </header> <!-- /.theme-menu-wrapper -->
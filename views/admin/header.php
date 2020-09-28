
<?php $settings = new Settings(); $AdminExternal=new AdminExternal();  ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo URL; ?>/views/assets/img/<?php echo $settings->icon; ?>" type="image/x-icon">

    <meta name="author" content="Hakan SANDAL"/>
  <title>NKÜ - Admin - Yemekhane</title>
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">





    <!-- Bootstrap -->
  <link href="<?php echo URL; ?>/views/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo URL; ?>/views/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo URL; ?>/views/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo URL; ?>/views/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo URL; ?>/views/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo URL; ?>/views/admin/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo URL; ?>/views/admin/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">




    <!-- Datatables -->

    <link href="<?php echo URL; ?>/views/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>/views/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>/views/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>/views/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>/views/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo URL; ?>/views/admin/build/css/custom.min.css" rel="stylesheet">

    <!--SummerNote--->
    <link href="<?php echo URL; ?>/views/admin/lib/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="<?php echo URL; ?>/views/admin/lib/medium-editor/default.css" rel="stylesheet">


</head>

<body class="nav-md">




<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">


        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
          <div class="profile_pic">
            <img src="<?php echo URL; ?>/views/admin/production/images/NKUadminlogo.png" alt="..." class="img-circle profile_img">
          </div>
          <div class="profile_info">
            <h2>Namık Kemal</h2>
            <h5>Üniversitesi</h5>

          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>Genel</h3>
            <ul class="nav side-menu">
                <li ><a href = "<?php echo URL;?>/admin/panel" ><i class="fa fa-home" style = "font-size: 20px" ></i > Anasayfa</a >

                </li >


            <?php $AdminExternal->MenuControl(); ?>



            </ul>
          </div>

        </div>
        <!-- /sidebar menu -->


      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
          <ul class=" navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
                <span class="mr-3"><?php echo strtoupper(Session::get("adminName")); ?></span><img src="<?php echo URL; ?>/views/admin/production/images/adminuserlogo.png" class="mr-3" width="30px" alt="">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
ADMIN
              </a>
              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="<?php echo URL;?>/admin/passwordChange"> <i class="fa fa-user pull-right"></i> Şifre Değiştir</a>


                <a class="dropdown-item"  href="<?php echo URL;?>/admin/Adminlogout"><i class="fas fa-sign-out-alt pull-right"></i> Çıkış Yap</a>
              </div>
            </li>


          </ul>
        </nav>
      </div>
    </div>
    <!-- /top navigation -->
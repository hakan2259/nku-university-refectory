<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo URL; ?>/views/assets/img/favicon.ico" type="image/x-icon">
    <meta name="author" content="Hakan SANDAL"/>

    <title>NKÜ - Admin - Giriş</title>

    <!-- Bootstrap -->
    <link href="<?php echo URL; ?>/views/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo URL; ?>/views/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo URL; ?>/views/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo URL; ?>/views/admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo URL; ?>/views/admin/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="<?php echo URL;?>/user/loginControl">
                    <img src="<?php echo URL;?>/views/admin/production/images/NKUloginlogo.png" width="150px" style="margin-top: -40px">
                    <div>
                        <input type="text" name="admin_username" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" name="admin_password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <input type="hidden" name="adminToken" value="<?php echo $data["adminToken"]; ?>"/>
                        <input type="hidden" name="loginType" value="admin"/>
                        <input class="btn btn-default submit" value="Oturum Aç" type="submit" style="font-size: 18px"/>

                    </div>



                    <div class="separator">


                        <div class="clearfix"></div>
                        <br />

                        <div>

                            <p>&copy; <script>document.write(new Date().getFullYear());</script> <a href="http://www.nku.edu.tr/" target="_blank">Tekirdağ Namık Kemal Üniversitesi</a></p>
                        </div>
                    </div>
                </form>

                <?php


                if (isset($data["info"])) :


                    echo $data["info"];



                endif;
                ?>
            </section>
        </div>


    </div>
</div>
</body>
</html>

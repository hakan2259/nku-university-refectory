<?php $settings = new Settings(); $cache= new Cache();
$cache->CacheControl("1");





if(isset($_GET['lang']) && !empty($_GET['lang'])){
    $_SESSION['lang'] = $_GET['lang'];

    if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){
        echo "<script type='text/javascript'> location.reload(); </script>";
    }
}

// Include Language file
if(isset($_SESSION['lang'])){
    include "config/lang_".$_SESSION['lang'].".php";
}else{
    include "config/lang_tr.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $settings->title; ?></title>

    <meta name="description" content="<?php echo $settings->description; ?>"/>
    <meta name="keywords" content="<?php echo $settings->keywords; ?>"/>
    <meta name="author" content="Hakan SANDAL"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="<?php echo URL; ?>/views/assets/css/style.php" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/views/assets/css/slick.css"/>


    <link rel="icon" href="<?php echo URL; ?>/views/assets/img/<?php echo $settings->icon; ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
    </style>





</head>

<body>


<header>

    <nav class="navbar navbar-color fixed-top navbar-expand-lg text-white">


        <a href="<?php echo URL; ?>" class="navbar-brand"><span><img
                        src="<?php echo URL; ?>/views/assets/img/<?php echo $settings->front_logo; ?>" width="250px" height="50px"></span><span
                    class="refectory-text"><?=_REFECTORY?></span></a>
        <div>
            <span class="btn-refectory-top">REFECTORY</span>

            <button type="button" class="navbar-toggler btn-icon" data-toggle="collapse" data-target="#navbar-nku"
                    aria-controls="navbar-nku">

                <div><img src="<?php echo URL; ?>/views/assets/img/NKULogoBeyaz.png" class="btn-icon-img"></div>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-nku">
            <ul class="navbar-nav ml-auto">


                <?php
                if (Session::get("userId") && Session::get("username")):
                  Session::SignInControl("users",Session::get("username"),Session::get("userId"));

                    ?>

                    <li class="nav-item dropdown" style="cursor:pointer">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <span><?php echo strtoupper(Session::get("name")); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default"
                             aria-labelledby="navbarDropdownMenuLink-333">
                            <a href="<?php echo URL;?>/user/reservation" class="dropdown-item"><?=_RESERVATION?></a>
                            <a href="<?php echo URL; ?>/user/basket" class="dropdown-item"><?=_BASKET?>
                                <span class="ml-2 badge badge-info" id="BasketStatus"></span>
                            </a>
                            <a class="dropdown-item" href="<?php echo URL; ?>/user/logout"><?=_LOGOUT?></a>


                        </div>

                    </li>
                <?php

                else:
                    ?>
                    <li>

                        <a href="<?php echo URL; ?>/user/login" class="nav-link text-white"><?= _LOGIN ?></a>

                    </li>

                <?php
                endif;
                ?>


                <form method='get' action='' id='form_lang' >
                    <select name='lang' onchange='changeLang();' class="mt-2 multilanguage">
                        <option value='tr' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'tr'){ echo "selected"; } ?> >TR</option>
                        <option value='en' <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo "selected"; } ?> >EN</option>
                    </select>
                </form>
            </ul>
        </div>


    </nav>
</header>

   

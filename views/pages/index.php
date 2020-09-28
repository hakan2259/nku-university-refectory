<?php require 'views/header.php';


?>


<section>
    <div class="jumbotron text-center"
         style="background-image: url(<?php echo URL; ?>/views/assets/img/<?php echo $settings->banner; ?>);">

        <div class="overflow"></div>
        <div class="intro">

            <h1><?= _WELCOME ?></h1>
            <h2><?= _WELCOMELOGINTEXT ?></h2>
            <a href="<?php echo URL; ?>/user/login" type="submit" class="btn-login"><?= _BANNERLOGIN ?></a>
        </div>

    </div>
</section>
<main>
    <div class="video">
        <div class="container" style="text-align: center;">
            <h2 class="video-header"><?= _AUTOMATION ?></h2>
            <iframe frameborder="0" height="540" src="<?php echo $settings->video_link; ?>"
                    width="100%"></iframe>
        </div>
    </div>
    <div class="refectory-info">
        <div class="container" style="text-align: center;">
            <h2 class="video-header"><?= _REFECTORYINFO ?></h2>


            <?php

            foreach ($data["card_info"] as $value3):
                ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <?php echo $value3["card"]; ?>
                    </div>
                </div>
            <?php
            endforeach;
            ?>


            <div class="slider_wrap mt-5">
                <div class="banner_slider">
                    <?php
                    foreach ($data["slider"] as $value) :

                        ?>
                        <img src="<?php echo URL; ?>/views/assets/img/slider/<?php echo $value["image_url"]; ?>"
                             height="1000px" width="700px">

                    <?php
                    endforeach;
                    ?>
                </div>


                <div class="thumbnail_slider_area mt-3">
                    <div class="container">
                        <div class="row thumbnail_slider">
                            <?php
                            foreach ($data["slider"] as $value2):
                                ?>
                                <img src="<?php echo URL; ?>/views/assets/img/slider/<?php echo $value2["image_url"]; ?>"
                                     alt="">
                            <?php
                            endforeach;
                            ?>


                        </div>
                    </div>
                </div>


            </div>


</main>


<?php require 'views/footer.php'; ?> 		
        
        
        
       
<footer>
    <div class="mt-5 pt-5 pb-5  footer">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-xs-12 footer-logo mb-5">
                    <img src="<?php echo URL; ?>/views/assets/img/<?php echo $settings->footer_logo; ?>" width="271px" height="70px">
                </div>

            </div>
            <div class="row">
                <div class="col-lg-6 col-xs-6 location">
                    <h4 class="mt-lg-0 mt-sm-4"><?=_REFECTORYADMİNDİRECTORATE?></h4>
                    <hr>
                    <p><i class="fa fa-map-marker mr-3"></i><?=_ADDRESS?> : <?php echo $settings->address; ?>
                    </p>
                    <p><i class="fa fa-envelope-o mr-3"></i><?=_EMAIL?> : <?php echo $settings->email; ?></p>
                    <p><i class="fa fa-phone mr-3"></i><?=_PHONE?> : <?php echo $settings->phone; ?></p>
                    <p><i class="fa fa-print mr-3"></i><?=_FAX?> : <?php echo $settings->fax; ?></p>
                </div>


                <div class="col-lg-6 col-xs-6 footer-img">
                    <img src="<?php echo URL; ?>/views/assets/img/<?php echo $settings->footer_img; ?>">
                </div>

            </div>
            <!-- Social buttons -->
            <div class="mt-5">
                <ul class="list-unstyled list-inline text-center">
                    <li class="list-inline-item">
                        <a class="btn-floating mx-1" href="<?php echo $settings->facebook_url; ?>" target="_blank">
                            <ion-icon name="logo-facebook" class="social-media-icon logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating mx-1" href="<?php echo $settings->twitter_url; ?>" target="_blank">
                            <ion-icon name="logo-twitter" class="social-media-icon logo-twitter"></ion-icon>                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating mx-1" href="<?php echo $settings->ios_url; ?>" target="_blank">
                            <ion-icon name="logo-apple" class="social-media-icon logo-apple"></ion-icon>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-li mx-1" href="<?php echo $settings->android_url; ?>"
                           target="_blank">
                            <ion-icon name="logo-android" class="social-media-icon logo-android"></ion-icon>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-dribbble mx-1" href="<?php echo $settings->instagram_url; ?>"
                           target="_blank">
                            <ion-icon name="logo-instagram" class="social-media-icon logo-instagram"></ion-icon>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn-floating btn-dribbble mx-1" href="<?php echo $settings->youtube_url; ?>"
                           target="_blank">
                            <ion-icon name="logo-youtube" class="social-media-icon logo-youtube"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Social buttons -->


        </div>

    </div>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">&copy;
        <script>document.write(new Date().getFullYear());</script>
        <?=_COPYRIGHT?>:
        <a href="http://www.nku.edu.tr/" target="_blank">Namık Kemal Üniversitesi</a> - <?=_ALLRIGHTS?>.
    </div>
    <!-- Copyright -->

</footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="<?php echo URL; ?>/views/assets/js/jquery.min.js"></script>

<script>

    //Basket Control
    $('#BasketStatus').load("<?php echo URL; ?>/GeneralTask/BasketControl");


    //Add Basket
    $(document).ready(function () {
        //Basket Add
        $('#MenuSepeteEkleForm input[type="button"]').click(function () {

            var id = $(this).attr('data-value');
            var r_place = $('#r_place' + id + ' option:selected').val();
            //alert(r_place);

            $.post("<?php echo URL;?>/GeneralTask/Add", {"menu_id": id, "r_place": r_place}, function () {
                $('#BasketStatus').load("<?php echo URL; ?>/GeneralTask/BasketControl");
                $('.myBtnClass' + id).css("background-color","#D4EDDA");
            });


        });


    });

    //Basket Delete
    function MenuDelete(id) {
        $.post("<?php echo URL;?>/GeneralTask/Delete", {"menu_id": id}, function () {
            window.location.reload();
        });

        //alert(value);
    }


    //Update Basket
    $('#UpdateMenuForm input[type="button"]').click(function () {
        var id = $(this).attr('data-value');
        var r_place = $('#basketR_place' + id + ' option:selected').val();

        $.post("<?php echo URL;?>/GeneralTask/Update", {"menu_id": id, "r_place": r_place}, function () {
            window.location.reload();
        });
        //alert(r_place);
    })


</script>
<script type="text/javascript" src="<?php echo URL; ?>/views/assets/js/slick.min.js"></script>

<script>

    $(function () {
        $('.banner_slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            fade: true,
            cssEase: 'linear',
            asNavFor: '.thumbnail_slider'


        })

        $('.thumbnail_slider').slick({
            slidesToShow: 7,
            slidesToScroll: 1,
            asNavFor: '.banner_slider',
            dots: false,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,
            centerMode: true,
            focusOnSelect: true
        });
    })
</script>

<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
<script>
    function changeLang(){
        document.getElementById('form_lang').submit();
    }
</script>


</html>

<?php
$cache->CacheCreate();
?>
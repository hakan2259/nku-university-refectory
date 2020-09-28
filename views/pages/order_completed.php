<?php require 'views/header.php'; ?>


<?php
if (isset($data["totalPrice"])):
    if (Session::get("userId") && Session::get("username")):
        Session::SignInControl("users", Session::get("username"), Session::get("userId"));


        ?>

        <div class="container" style="margin-top: 110px; text-align: center; border: 1px solid #E5E5E5;">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="alert alert-success mt-2">TEŞEKKÜRLER Randevunuz Başarıyla Oluşturulmuştur.</h3>
                    <p>Toplam Tutar : <?php
                        if (isset($data["totalPrice"])):
                            echo $data["totalPrice"] . " TL";

                        endif;
                        ?></p>
                    <hr>
                    <p>ÖDEMENİZ BAŞARIYLA GERÇEKLEŞMİŞTİR.</p>
                </div>
            </div>
        </div>
    <?php
    else:
        header("Location:" . URL);
    endif;


//totalPrice Gelemediyse
else:
    if (isset($data["info"])):
        echo $data["info"];
    endif;
endif;


?>


<?php require 'views/footer.php'; ?>
        
        
        
       
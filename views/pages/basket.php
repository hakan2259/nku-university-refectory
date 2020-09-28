

<?php require 'views/header.php'; ?>


<div style="margin-top: 120px;" class="container">
    <?php
    if (Session::get("userId") && Session::get("username")):
    Session::SignInControl("users",Session::get("username"),Session::get("userId"));
    ?>
<?php
if (isset($_COOKIE["meal"])):
 ?>
    <h3 style="text-align: center">
        <a href="<?php echo URL; ?>/GeneralTask/EmptyBasket" class="btn btn-info">Sepeti Boşalt</a>
        Sepetinizdeki Menü Sayısı(<?php echo count($_COOKIE["meal"]); ?>)</h3>


    <?php

        $totalPrice = 0;
        echo '<form id="UpdateMenuForm">';
        echo '<div class="row">';

        foreach ($_COOKIE["meal"] as $id => $rplace):
            $menuSelect = $settings->MenuSelect($id);
            $total_calorie = ($menuSelect[0]["soups_calorie"] + $menuSelect[0]["main_meals_calorie"] + $menuSelect[0]["after_main_meals_calorie"] + $menuSelect[0]["desserts_calorie"]);
            echo '
            <div class="col-md-6 mt-3">
           <div class="card">
          <div class="card-body">
           <h5 class="card-title">' . $menuSelect[0]["menu_date"] . ' <span style="float: right;">';

            ?>
            <input type="button" class="btn btn-sm btn-success" data-value="<?php echo $menuSelect[0]["id"]; ?>"
                   value="GÜNCELLE">

            <a onclick='MenuDelete("<?php echo $menuSelect[0]["id"] ?>")' class="btn btn-sm btn-danger"
               style="color: #fff; cursor: pointer;">SİL</a>
            <?php
            echo '</span></h5>
          </div>
         <ul class="list-group list-group-flush">
        <li class="list-group-item">' . $menuSelect[0]["soups"] . '<span class="ml-3 badge badge-info">' . $menuSelect[0]["soups_calorie"] . ' kcal</span> </li>
        <li class="list-group-item">' . $menuSelect[0]["main_meals"] . '<span class="ml-3 badge badge-info">' . $menuSelect[0]["main_meals_calorie"] . ' kcal</span> </li>
        <li class="list-group-item">' . $menuSelect[0]["after_main_meals"] . '<span class="ml-3 badge badge-info">' . $menuSelect[0]["after_main_meals_calorie"] . ' kcal</span></li>
              <li class="list-group-item">' . $menuSelect[0]["desserts"] . '<span class="ml-3 badge badge-info">' . $menuSelect[0]["desserts_calorie"] . ' kcal</span></li>
              
                 <li class="list-group-item">Toplam Kalori : <span style="margin-right: 210px" class="ml-3 badge badge-info">' . $total_calorie . ' kcal</span>Fiyatı : <span class="ml-3">' . $menuSelect[0]["menu_price"] . ' ₺</span></li>
        </ul>
<div class="card-body">';
            ?>
            <select class="form-control form-control-lg" id="basketR_place<?php echo $menuSelect[0]["id"]; ?>">
                <option selected disabled>Yemekhane Seçiniz</option>
                <?php foreach ($settings->refectory_places as $row2): ?>
                    <option value="<?php echo $row2["id"]; ?>" <?php
                    if ($row2["id"] == $rplace):
                        echo 'selected';
                    endif; ?> >
                        <?php echo $row2["place_name"]; ?>
                    </option>
                <?php
                endforeach;
                ?>

            </select>


            <?php
            echo '</div>
</div>
</div>';

            $totalPrice += $menuSelect[0]["menu_price"];
        endforeach;

        echo '</form>';


    ?>


</div>
<div class="alert alert-dark mt-2" style="text-align: right">
    Toplam Fiyat : <?php echo $totalPrice; ?> ₺
</div>

<div style="text-align: right">
    <a href="<?php echo URL;?>/user/reservation" class="btn btn-primary" style="cursor: pointer; color: #fff;">
        Rezervasyon Sayfasına Dön
    </a>
    <a  href="<?php echo URL;?>/user/buying" class="btn btn-primary" style="cursor: pointer; color: #fff;">
        Satın Al
    </a>
</div>
<?php
else:
echo '<div class="alert alert-info text-center" style="font-size: 20px">SEPETİNİZDE MENÜ BULUNMAMAKTADIR</div>';
echo '<div style="text-align: right">
    <a href="'.URL.'/user/reservation" class="btn btn-primary" style="cursor: pointer;color:#fff;">
        Rezervasyon Sayfasına Dön
    </a></div>';
endif;
?>
<?php
else:
    header("Location:".URL);
endif;
?>
</div>


<?php require 'views/footer.php'; ?>


        
       

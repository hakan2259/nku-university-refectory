

<?php require 'views/header.php'; ?>


<div style="margin-top: 120px">
<?php
if (Session::get("userId") == true && Session::get("username")):
    Session::SignInControl("users",Session::get("username"),Session::get("userId"));
?>
    <div class="content">


        <div class="header" style="text-align: center;">
            <h3><?=_RESERVATION?></h3>
            <h4><?=_LUNCH?>/<?=_DINNER?></h4>


        </div>

        <!--Table 4--->
<form id="MenuSepeteEkleForm">
        <div class="row">

            <?php
            foreach ($settings->menu as $row):
                ?>
                <div class="col-md-3 mt-3">

                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["menu_date"]; ?>
                                <input value="+" type="button" class="myBtnClass<?php echo $row["id"]; ?>"
                                       data-value="<?php echo $row["id"]; ?>" <?php if (date("Y-m-d") == $row["menu_date"]):
                                    echo "disabled";
                                endif;
                                ?> style="float: right; width: 40px; height: 40px">
                            </h5>

                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $row["soups"]; ?><span class="ml-3 badge badge-info"><?php echo $row["soups_calorie"];?> kcal</span></li>
                            <li class="list-group-item"><?php echo $row["main_meals"]; ?><span class="ml-3 badge badge-info"><?php echo $row["main_meals_calorie"];?> kcal</span></li>
                            <li class="list-group-item"><?php echo $row["after_main_meals"]; ?><span class="ml-3 badge badge-info"><?php echo $row["after_main_meals_calorie"];?> kcal</span></li>
                            <li class="list-group-item"><?php echo $row["desserts"]; ?><span class="ml-3 badge badge-info"><?php echo $row["desserts_calorie"];?> kcal</span></li>
                            <li class="list-group-item">Toplam Kalori : <span class="ml-3 badge badge-info"><?php echo ($row["soups_calorie"] + $row["main_meals_calorie"] + $row["after_main_meals_calorie"] + $row["desserts_calorie"]); ?> kcal</span></li>
                        </ul>
                        <div class="card-body">
                            <select class="custom-select my-1 mr-sm-2" id="r_place<?php echo $row["id"]; ?>">
                                <option selected disabled><?=_CHOOSEREFECTORY?></option>
                                <?php
                                foreach ($settings->refectory_places as $r_place) :


                                    ?>
                                    <option value="<?php echo $r_place["id"]; ?>"><?php echo $r_place["place_name"]; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

            <?php
            endforeach;
            ?>

        </div>
</form>
        <?php
        else:
            header("Location:".URL);
        endif;
        ?>
    </div>



    <?php require 'views/footer.php'; ?>




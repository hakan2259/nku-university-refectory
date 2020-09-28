<?php require 'views/admin/header.php'; ?>

    <!-- page content -->
    <div class="right_col" role="main">

        <?php


        if (isset($data["info"])) :


            echo $data["info"];


        endif;
        ?>
        <!-- top tiles -->
        <div class="clearfix"></div>
        <div class="row">

            <?php
            //Menu INSERT
            if (isset($data["menuInsert"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Menü Yönetimi <small><a href="<?php echo URL;?>/admin/menus" style="font-weight: bold">Menüler</a> / Menü Ekleme </small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/menuInsertPost">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Çorba <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="soup" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Çorba Kalori <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="soup_calorie" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ana Yemek <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="main_food" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ana Kalori <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="main_food_calorie" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ana Yemek 2 <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="main_food_2" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="last-name">Ana Yemek 2 Kalori <span class="required">*</span>
                                                </label>
                                                <div class="col-md-8 col-sm-8 ">
                                                    <input type="number" name="main_food_2_calorie" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tatlı <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="desserts" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tatlı Kalori <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="desserts_calorie" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tarih <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="date" name="menu_date" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Fiyatı <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="menu_price" required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>


                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" class="btn btn-success btn-sm">EKLE</button>


                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                <?php
                endif;
            endif;
            ?>

            <!--*********************************************MENU INSERT-->


            <?php
            //MENU UPDATE
            if (isset($data["menuUpdate"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Menü Yönetimi <small><a href="<?php echo URL;?>/admin/menus" style="font-weight: bold">Menüler</a> / Menü Bilgilerini Güncelleme </small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <br />
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/menuUpdatePost">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Çorba <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="soup" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["soups"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Çorba Kalori <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="soup_calorie" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["soups_calorie"]; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ana Yemek <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="main_food" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["main_meals"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ana Kalori <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="main_food_calorie" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["main_meals_calorie"]; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ana Yemek 2 <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="main_food_2" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["after_main_meals"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="last-name">Ana Yemek 2 Kalori <span class="required">*</span>
                                                </label>
                                                <div class="col-md-8 col-sm-8 ">
                                                    <input type="number" name="main_food_2_calorie" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["after_main_meals_calorie"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tatlı <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="desserts" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["desserts"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tatlı Kalori <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="desserts_calorie" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["desserts_calorie"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tarih <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="date" name="menu_date" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["menu_date"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Fiyatı <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="number" name="menu_price" required="required" class="form-control" value="<?php echo $data["menuUpdate"][0]["menu_price"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <select class="form-control" name="menu_status">
                                                        <option>Choose option</option>
                                                        <option value="0" <?php if($data["menuUpdate"][0]["status"] == 0): echo "selected"; else: false; endif; ?>>Pasif</option>
                                                        <option value="1" <?php if($data["menuUpdate"][0]["status"] == 1): echo "selected"; else: false; endif; ?>>Aktif</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>




                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" class="btn btn-success btn-sm">GÜNCELLE</button>
                                            <input type="hidden" name="menu_id" value="<?php echo $data["menuUpdate"][0]["id"]; ?>">
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>

                <?php
                endif;
            endif;
            ?>

            <!--*********************************************MENU UPDATE-->


            <!--********************************************* MENU SELECT-->
            <?php
            //Users Select
            if (isset($data["data"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Menü Yönetimi <small>Menüler</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a href="<?php echo URL; ?>/admin/MenuInsert" class="btn btn-primary" style="float: right">Ekle</a>
                                        <div class="card-box table-responsive">

                                            <table id="datatable-buttons" class="table table-striped table-bordered"

                                                   style="width:100%;">
                                                <thead>
                                                <tr>
                                                    <th>Çorba</th>
                                                    <th>Çorba Kalori</th>
                                                    <th>Ana Yemek</th>
                                                    <th>Ana Yemek Kalori</th>
                                                    <th>Ana Yemek 2</th>
                                                    <th>Ana Yemek 2 Kalori</th>
                                                    <th>Tatlı</th>
                                                    <th>Tatlı Kalori</th>
                                                    <th>Tarih</th>
                                                    <th>Fiyat</th>
                                                    <th>Durum</th>
                                                    <th>İşlemler</th>

                                                </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach ($data["data"] as $value) :

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $value["soups"]; ?></td>
                                                        <td><?php echo $value["soups_calorie"]; ?></td>
                                                        <td><?php echo $value["main_meals"]; ?></td>
                                                        <td><?php echo $value["main_meals_calorie"]; ?></td>
                                                        <td><?php echo $value["after_main_meals"]; ?></td>
                                                        <td><?php echo $value["after_main_meals_calorie"]; ?></td>

                                                        <td><?php echo $value["desserts"]; ?></td>
                                                        <td><?php echo $value["desserts_calorie"]; ?></td>
                                                        <td><?php echo $value["menu_date"]; ?></td>

                                                        <td><?php echo $value["menu_price"]; ?></td>


                                                        <td><?php if ($value["status"] == 1):
                                                                echo "<span class='text-success'>Aktif</span>";
                                                            else:
                                                                echo "<span class='text-danger'>Pasif</span>";
                                                            endif;
                                                            ?></td>

                                                        <td>
                                                            <a href="<?php echo URL; ?>/admin/MenusUpdate/<?php echo $value["id"]; ?>"
                                                               class="fa fa-edit"
                                                               style="font-size: 25px; color: #62C81E;"></a>
                                                            <a href="<?php echo URL; ?>/admin/MenusDelete/<?php echo $value["id"]; ?>"
                                                               class="fa fa-trash ml-2"
                                                               style="font-size: 25px; color: red;"></a></td>
                                                    </tr>

                                                <?php
                                                endforeach;
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                endif;
            endif;
            ?>
            <!--********************************************* MENU SELECT-->

        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
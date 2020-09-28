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
            //MENU UPDATE
            if (isset($data["contact"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Sistem Yönetimi <small>İletişim Bilgileri Güncelleme </small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/contactUpdate">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Adres <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="address" required="required" class="form-control" value="<?php echo $data["contact"][0]["address"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="email" name="email" required="required" class="form-control" value="<?php echo $data["contact"][0]["email"]; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Telefon <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="phone" required="required" class="form-control" value="<?php echo $data["contact"][0]["phone"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Faks <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="fax" required="required" class="form-control" value="<?php echo $data["contact"][0]["fax"]; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Facebook URL <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="facebook_url" required="required" class="form-control" value="<?php echo $data["contact"][0]["facebook_url"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Twitter URL <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="twitter_url" required="required" class="form-control" value="<?php echo $data["contact"][0]["twitter_url"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">İOS URL <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="ios_url" required="required" class="form-control" value="<?php echo $data["contact"][0]["ios_url"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Android URL <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="android_url" required="required" class="form-control" value="<?php echo $data["contact"][0]["android_url"]; ?>">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">İnstagram URL <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="instagram_url" required="required" class="form-control" value="<?php echo $data["contact"][0]["instagram_url"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Youtube URL <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="youtube_url" required="required" class="form-control" value="<?php echo $data["contact"][0]["youtube_url"]; ?>">
                                                </div>
                                            </div>
                                        </div>






                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" class="btn btn-success btn-sm">GÜNCELLE</button>
                                            <input type="hidden" name="contact_id" value="<?php echo $data["contact"][0]["id"]; ?>">
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
                                <h2>Kullanıcı Yönetimi <small>Kullanıcılar</small></h2>
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

                                            <table id="datatable" class="table table-striped table-bordered"

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
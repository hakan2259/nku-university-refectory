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


            <!--********************************************* Admin User SELECT-->
            <?php

            //Users Select
            if (isset($data["adminUserManagement"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Admin Kullanıcı Yönetimi <small>Admin Kullanıcıları</small></h2>
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
                                        <a href="<?php echo URL; ?>/admin/adminUserManagementInsert"
                                           class="btn btn-primary"
                                           style="float: right">Yeni Yönetici Ekle</a>
                                        <div class="card-box table-responsive">

                                            <table id="datatable" class="table table-striped table-bordered"
                                                   style="width:100%;">
                                                <thead>
                                                <tr>
                                                    <th>Adı</th>
                                                    <th>Soyadı</th>
                                                    <th>Kullanıcı Adı</th>
                                                    <th>İşlemler</th>

                                                </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach ($data["adminUserManagement"] as $value) :

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $value["firstname"]; ?></td>
                                                        <td><?php echo $value["lastname"]; ?></td>
                                                        <td><?php echo $value["username"]; ?></td>

                                                        <td>
                                                            <a href="<?php echo URL; ?>/admin/adminUserManagementUpdate/<?php echo $value["id"]; ?>"
                                                               class="fa fa-edit"
                                                               style="font-size: 25px; color: #62C81E;"></a>
                                                            <?php
                                                            if (Session::get("adminId") != $value["id"]):
                                                            ?>

                                                            <a href="<?php echo URL; ?>/admin/userAdminManagementDelete/<?php echo $value["id"]; ?>"
                                                               class="fa fa-trash ml-2"
                                                               style="font-size: 25px; color: red;"></a></td>

                                                        <?php

                                                        endif;
                                                        ?>


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
            <!--********************************************* ADMİN USER SELECT-->


            <?php
            //ADMİN USER INSERT
            if (isset($data["adminUserManagementInsert"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Admin Kullanıcı Yönetimi <small><a href="<?php echo URL;?>/admin/adminUserManagement" style="font-weight: bold">Admin Kullanıcıları</a> / Kullanıcı Ekleme </small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content" id="InsertFormMain">

                                <br/>
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                      method="post" action="<?php echo URL; ?>/admin/adminUserManagementInsertPost">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align"
                                                       for="first-name">Yönetici Adı <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="admin_firstname" required="required"
                                                           class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align"
                                                       for="first-name">Yönetici Soyadı <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="admin_lastname" required="required"
                                                           class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align"
                                                       for="first-name">Yönetici Kullanıcı Adı <span
                                                            class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="admin_username" required="required"
                                                           class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align"
                                                       for="first-name">Yönetici Şifre <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="password" name="admin_password" required="required"
                                                           class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align"
                                                       for="first-name">Yönetici Şifre (Tekrar) <span
                                                            class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="password" name="admin_repeat_username"
                                                           required="required" class="form-control" value="">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Kullanıcı Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="user_management"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Randevu Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="appointment_management"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Menü Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="menu_management"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Yemekhane Ö.Bilgiler
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="refectory_info_management"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Slider Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="design_management"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Yönetici Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="admin_management"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Sistem Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="system_management"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Sistem Bakım
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="system_maintenance"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >SQL Yedek Al
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="checkbox"
                                                           class="form-control" name="sql_backup_management"
                                                           style="font-size: 8px">
                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <span id="sec" class="text-success mr-5" style="cursor: pointer;">Tümünü Seç</span>
                                            <span id="kaldir" class="text-danger" style="cursor:pointer;">Tümünü Kaldır</span>


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

            <!--*********************************************ADMİN USER INSERT-->


            <?php
            //ADMİN USER UPDATE
            if (isset($data["adminUserManagementUpdate"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Admin Kullanıcı Yönetimi <small><a href="<?php echo URL;?>/admin/adminUserManagement" style="font-weight: bold">Admin Kullanıcıları</a> / Kullanıcı Güncelleme </small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content" id="UpdateFormMain">

                                <br/>
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                      method="post" action="<?php echo URL; ?>/admin/adminUserManagementUpdatePost">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align"
                                                       for="first-name">Yönetici Adı <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="admin_firstname" required="required"
                                                           class="form-control"
                                                           value="<?php echo $data["adminUserManagementUpdate"][0]["firstname"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align"
                                                       for="first-name">Yönetici Soyadı <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="admin_lastname" required="required"
                                                           class="form-control"
                                                           value="<?php echo $data["adminUserManagementUpdate"][0]["lastname"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align"
                                                       for="first-name">Yönetici Kullanıcı Adı <span
                                                            class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="admin_username" required="required"
                                                           class="form-control"
                                                           value="<?php echo $data["adminUserManagementUpdate"][0]["username"]; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Randevu Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["appointment_management"] == 1 ? "checked" : NULL;
                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="appointment_management"
                                                           style="font-size: 8px" <?php echo $value; ?>>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Kullanıcı Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["user_management"] == 1 ? "checked" : NULL;
                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="user_management"
                                                           style="font-size: 8px" <?php echo $value; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Menü Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["menu_management"] == 1 ? "checked" : NULL;

                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="menu_management"
                                                           style="font-size: 8px" <?php echo $value; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Yemekhane Ö.Bilgiler
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["refectory_info_management"] == 1 ? "checked" : NULL;

                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="refectory_info_management"
                                                           style="font-size: 8px" <?php echo $value; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Tasarım Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["design_management"] == 1 ? "checked" : NULL;

                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="design_management"
                                                           style="font-size: 8px" <?php echo $value; ?>>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Yönetici Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["admin_user_management"] == 1 ? "checked" : NULL;

                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="admin_management"
                                                           style="font-size: 8px" <?php echo $value; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Sistem Yönetimi
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["system_management"] == 1 ? "checked" : NULL;

                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="system_management"
                                                           style="font-size: 8px" <?php echo $value; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Sistem Bakım
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["system_maintenance"] == 1 ? "checked" : NULL;
                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="system_maintenance"
                                                           style="font-size: 8px" <?php echo $value;?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-6 col-sm-6 label-align"
                                                >Sistem Yedek Alma
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <?php
                                                    $value = $data["adminUserManagementUpdate"][0]["sql_backup_management"] == 1 ? "checked" : NULL;
                                                    ?>
                                                    <input type="checkbox"
                                                           class="form-control" name="sql_backup_management"
                                                           style="font-size: 8px" <?php echo $value;?>>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="ln_solid"></div>




                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <span id="sec" class="text-success mr-5" style="cursor: pointer;">Tümünü Seç</span>
                                            <span id="kaldir" class="text-danger" style="cursor:pointer;">Tümünü Kaldır</span>


                                        </div>

                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                             <input type="hidden" name="admin_id" value="<?php echo $data["adminUserManagementUpdate"][0]["id"]; ?>">

                                            <button type="submit" class="btn btn-success btn-sm">YÖNETİCİ GÜNCELLE</button>

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

            <!--*********************************************ADMİN USER UPDATE-->


        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
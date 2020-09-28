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
        //SLİDERS INSERT
        if (isset($data["slidersInsert"])):
            if (!$_POST):
                ?>
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Slider Yönetimi <small><a href="<?php echo URL;?>/admin/sliders" style="font-weight: bold">Slider Resimler</a> / Slider Resim Ekle</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <br/>
                            <form action="<?php echo URL; ?>/admin/SlidersInsertPost" method="POST"
                                  enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Resim <span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-10 col-sm-10 ">
                                                <input type="file" name="res[]" required="required" class="form-control"
                                                       value="">

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

        <!--*********************************************SLİDERS INSERT-->



        <!--*********************************************Sliders UPDATE-->
        <?php
        //SLİDERS INSERT
        if (isset($data["slidersUpdate"])):
            if (!$_POST):
                ?>
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Slider Yönetimi <small><a href="<?php echo URL;?>/admin/sliders" style="font-weight: bold">Slider Resimler</a> / Slider Resim Güncelleme</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <br/>
                            <form action="<?php echo URL; ?>/admin/SlidersUpdatePost" method="POST"
                                  enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-2 col-sm-2 label-align">Resim <span
                                                        class="required">*</span>
                                            </label>
                                            <div class="col-md-10 col-sm-10 ">
                                                <img src="<?php echo URL;?>/views/assets/img/slider/<?php echo $data["slidersUpdate"][0]["image_url"]; ?>" class="img-fluid" width="250px">
                                                <input type="file" name="slider_img" required="required" class="form-control"
                                                       value="">

                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                        <button type="submit" class="btn btn-success btn-sm">GÜNCELLE</button>
                                        <input type="hidden" name="slider_id" value="<?php echo $data["slidersUpdate"][0]["id"]; ?>">


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
        <!--*********************************************Sliders UPDATE-->


        <!--********************************************* Sliders SELECT-->
        <?php
        //Refectories Select
        if (isset($data["sliders"])):
            if (!$_POST):
                ?>
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Slider Yönetimi <small>Slider Resimler</small></h2>
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
                                    <a href="<?php echo URL; ?>/admin/SlidersInsert" class="btn btn-primary"
                                       style="float: right">Ekle</a>
                                    <div class="card-box table-responsive">

                                        <table id="datatable" class="table table-striped table-bordered"

                                               style="width:100%;">
                                            <thead>
                                            <tr>

                                                <th>Slider Resim</th>
                                                <th>İşlemler</th>


                                            </tr>
                                            </thead>


                                            <tbody id="orders">
                                            <?php foreach ($data["sliders"] as $value) :

                                                ?>
                                                <tr id="slide_<?php echo $value["id"]; ?>">

                                                    <td style="text-align: center">
                                                        <img src="<?php echo URL; ?>/views/assets/img/slider/<?php echo $value["image_url"]; ?>"
                                                             width="250px"></td>

                                                    <td>
                                                        <a href="<?php echo URL; ?>/admin/SlidersUpdate/<?php echo $value["id"]; ?>"
                                                           class="fa fa-edit"
                                                           style="font-size: 25px; color: #62C81E;"></a>
                                                        <a href="<?php echo URL; ?>/admin/SlidersDelete/<?php echo $value["id"]; ?>"
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
        <!--********************************************* Sliders SELECT-->

    </div>
    <!-- /top tiles -->

</div>
<!-- /page content -->
<?php require 'views/admin/footer.php'; ?>




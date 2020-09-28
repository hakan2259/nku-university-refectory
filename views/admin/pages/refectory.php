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
            //REFECTORY INSERT
            if (isset($data["refectoriesInsert"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Menü Yönetimi <small><a href="<?php echo URL;?>/admin/refectories" style="font-weight: bold">Yemekhaneler</a> / Yemekhane Ekleme </small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/RefectoriesInsertPost">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Yemekhane <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="refectory_place" required="required" class="form-control" value="">
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

            <!--*********************************************REFECTORY INSERT-->

            <?php
            //REFECTORY UPDATE
            if (isset($data["refectoriesUpdate"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Menü Yönetimi <small><a href="<?php echo URL;?>/admin/refectories" style="font-weight: bold">Yemekhaneler</a> / Yemekhane Bilgileri Güncelleme </small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/RefectoriesUpdatePost">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Yemekhane <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="refectory_place" required="required" class="form-control" value="<?php echo $data["refectoriesUpdate"][0]["place_name"]; ?>">
                                                </div>
                                            </div>
                                        </div>





                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="last-name">
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <select class="form-control" name="refectory_status">
                                                        <option>Choose option</option>
                                                        <option value="0" <?php if($data["refectoriesUpdate"][0]["status"] == 0): echo "selected"; else: false; endif; ?>>Pasif</option>
                                                        <option value="1" <?php if($data["refectoriesUpdate"][0]["status"] == 1): echo "selected"; else: false; endif; ?>>Aktif</option>

                                                        </select>
                                                </div>
                                            </div>
                                        </div>




                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" class="btn btn-success btn-sm">GÜNCELLE</button>
                                            <input type="hidden" name="refectory_id" value="<?php echo $data["refectoriesUpdate"][0]["id"]; ?>">
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

            <!--*********************************************REFECTORY UPDATE-->




            <!--********************************************* REFECTORY SELECT-->
            <?php
            //Refectories Select
            if (isset($data["refectory"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Menü Yönetimi <small>Yemekhaneler</small></h2>
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
                                        <a href="<?php echo URL; ?>/admin/RefectoriesInsert" class="btn btn-primary" style="float: right">Ekle</a>
                                        <div class="card-box table-responsive">

                                            <table id="datatable-buttons" class="table table-striped table-bordered"

                                                   style="width:100%;">
                                                <thead>
                                                <tr>
                                                    <th>Yemekhaneler</th>
                                                    <th>Durum</th>
                                                    <th>İşlemler</th>


                                                </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach ($data["refectory"] as $value) :

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $value["place_name"]; ?></td>



                                                        <td><?php if ($value["status"] == 1):
                                                                echo "<span class='text-success'>Aktif</span>";
                                                            else:
                                                                echo "<span class='text-danger'>Pasif</span>";
                                                            endif;
                                                            ?></td>

                                                        <td>
                                                            <a href="<?php echo URL; ?>/admin/RefectoriesUpdate/<?php echo $value["id"]; ?>"
                                                               class="fa fa-edit"
                                                               style="font-size: 25px; color: #62C81E;"></a>
                                                            <a href="<?php echo URL; ?>/admin/RefectoriesDelete/<?php echo $value["id"]; ?>"
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
            <!--********************************************* REFECTORY SELECT-->

        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
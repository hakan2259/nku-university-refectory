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
            if (isset($data["refectory_info"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Yemekhane Önemli Bilgiler <small>Bilgiler</small></h2>
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
                                        <a href="<?php echo URL; ?>/admin/refectoryInfoInsert"
                                           class="btn btn-primary"
                                           style="float: right">Yeni Ekle</a>
                                        <div class="card-box table-responsive">

                                            <table id="datatable" class="table table-striped table-bordered"
                                                   style="width:100%;">
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Card</th>

                                                    <th>İşlemler</th>

                                                </tr>
                                                </thead>


                                                <tbody>
                                                <?php foreach ($data["refectory_info"] as $value) :

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $value["id"]; ?></td>
                                                        <td><?php echo $value["card"]; ?></td>


                                                        <td>
                                                            <a href="<?php echo URL; ?>/admin/refectoryInfoUpdate/<?php echo $value["id"]; ?>"
                                                               class="fa fa-edit"
                                                               style="font-size: 25px; color: #62C81E;"></a>

                                                            <a href="<?php echo URL; ?>/admin/refectoryInfoDelete/<?php echo $value["id"]; ?>"
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
            <!--********************************************* ADMİN USER SELECT-->


            <?php
            //REFECTORY INFO UPDATE
            if (isset($data["refectoryInfoUpdate"])):
                if(!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Yemekhane Önemli Bilgiler <small><a href="<?php echo URL;?>/admin/refectoryInfo" style="font-weight: bold">Bilgiler</a> / Bilgi Güncelle</small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/refectoryInfoUpdatePost">


                                    <textarea id="summernote" name="cardInfo" class="form-control" required="required">
                                        <?php
                                         echo $data["refectoryInfoUpdate"][0]["card"];
                                        ?>
                                    </textarea>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" class="btn btn-success btn-sm">GÜNCELLE</button>
                                            <input type="hidden" name="refectoryInfo_id" value="<?php echo $data["refectoryInfoUpdate"][0]["id"]; ?>">
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

            <!--*********************************************REFECTORY INFO UPDATE-->





            <?php
            //REFECTORY INFO INSERT
            if (isset($data["refectoryInfoInsert"])):
                if(!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Yemekhane Önemli Bilgiler <small><a href="<?php echo URL;?>/admin/refectoryInfo" style="font-weight: bold">Bilgiler</a> / Bilgi Ekle</small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/refectoryInfoInsertPost">


                                    <textarea id="summernote" name="cardInfo" class="form-control" required="required">

                                    </textarea>

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

            <!--*********************************************REFECTORY INFO INSERT-->

        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
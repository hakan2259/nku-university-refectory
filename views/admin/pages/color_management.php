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
            //colorManagement UPDATE
            if (isset($data["colorManagement"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tema Renk Yönetimi <small>Renk Güncelleme </small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/colorManagementPost">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align">Body Color
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="body_color"  required="required" class="form-control jscolor" value="<?php echo $data["colorManagement"][0]["body_color"]; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align">Theme Color
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="theme_color" required="required" class="form-control jscolor" value="<?php echo $data["colorManagement"][0]["theme_color"]; ?>">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align">Login Modal Color
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="login_modal_color" required="required" class="form-control jscolor" value="<?php echo $data["colorManagement"][0]["login_modal_color"]; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-2 col-sm-2 label-align">Login Button
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="login_btn" required="required" class="form-control jscolor" value="<?php echo $data["colorManagement"][0]["login_btn"]; ?>">
                                                </div>
                                            </div>
                                        </div>


                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" class="btn btn-success btn-sm">GÜNCELLE</button>
                                            <input type="hidden" name="color_id" value="<?php echo $data["colorManagement"][0]["id"]; ?>">
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

            <!--*********************************************colorManagement UPDATE-->






        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
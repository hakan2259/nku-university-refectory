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
            // ---*********************************************PASSWORD CHANGE-->
            if (isset($data["passwordChange"])):
                if(!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Şifre Yönetimi <small>Şifre Değiştirme</small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/passwordChangePost">
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mevcut Şifre <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input  class="form-control" type="password" name="current_password" required="required">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Yeni Şifre <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="password" name="new_password" required="required" class="form-control">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Yeni Şifre (Tekrar) <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="password" name="repeat_new_password" required="required" class="form-control">
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" class="btn btn-success btn-sm">ŞİFRE DEĞİŞTİR</button>
                                            <input type="hidden" name="admin_id" value="<?php echo $data["passwordChange"]; ?>">
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

            <!--*********************************************PASSWORD CHANGE-->






        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
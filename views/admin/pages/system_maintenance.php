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




            <!--********************************************* System Maintenance SELECT-->
            <?php
            //MENU UPDATE
            if (isset($data["systemMaintenance"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Sistem Bakım <small>Bakım Yap </small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/systemMaintenancePost">

                                    <div class="row">







                                    </div>

                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 offset-md-12 text-center">

                                            <input type="submit" class="btn btn-success btn-sm" name="systemBtn" value="BAKIM YAP">
                                            <?php
                                            $values = $AdminExternal->GetSingleData("settings");
                                            ?>
                                            <div class="ln_solid"></div>
                                            <span class="text-center" style="font-size:18px">Sistem Bakım Zamanı : <?php echo $values[0]["maintenance_time"];?>  </span>

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
            <!--********************************************* System Maintenance SELECT-->

        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
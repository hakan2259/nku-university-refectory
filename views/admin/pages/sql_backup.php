<?php require 'views/admin/header.php'; ?>

<style>

    .switch {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 160px;
        height: 50px;
        text-align: center;
        margin: -30px 0 0 -75px;
        background: #00bc9c;
        transition: all 0.2s ease;
        border-radius: 25px;
    }
    .switch span {

        width: 20px;
        height: 4px;
        top: 50%;
        left: 50%;
        margin: -2px 0px 0px -4px;
        background: #fff;
        display: block;
        transform: rotate(-45deg);
        transition: all 0.2s ease;
    }

    input[type=radio] {
        display: none;
    }
    .switch label {
        cursor: pointer;
        color: rgba(0,0,0,0.2);
        width: 70px;
        line-height: 50px;
        transition: all 0.2s ease;
    }
    label[for=yes] {
        position: absolute;
        left: 0px;
        height: 20px;
    }
    label[for=no] {
        position: absolute;
        right: 0px;
    }
    #no:checked ~ .switch {
        background: #eb4f37;
    }
    #no:checked ~ .switch span {
        background: #fff;
        margin-left: -8px;
    }
    #no:checked ~ .switch span:after {
        background: #fff;
        height: 20px;
        margin-top: -8px;
        margin-left: 8px;
    }
    #yes:checked ~ .switch label[for=yes] {
        color: #fff;
    }
    #no:checked ~ .switch label[for=no] {
        color: #fff;
    }
</style>

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
            //SQL BACKUP
            if (isset($data["sqlBackup"])):
                if (!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Sql Yedek Alma İşlemi <small>Sql Yedek Al </small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                                      method="post" action="<?php echo URL; ?>/admin/sqlBackupPost">

                                    <div class="row">


                                    </div>
                                    <div class="item form-group">


                                        <div class="col-md-12 col-sm-12 offset-md-12 text-center">
                                            <div class="toggle-radio pt-5">
                                                <input type="radio" name="sqlBackupPreference" id="yes" value="local" checked="checked">
                                                <input type="radio" name="sqlBackupPreference" id="no" value="pc">
                                                <div class="switch">
                                                    <label for="yes">LOCAL</label>
                                                    <label for="no">PC</label>
                                                    <span></span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="item form-group">


                                        <div class="col-md-12 col-sm-12 offset-md-12 text-center">


                                            <input type="submit" class="btn btn-success btn-sm" name="systemBtn"
                                                   value="YEDEK AL">
                                            <?php
                                            $values = $AdminExternal->GetSingleData("settings");
                                            ?>
                                            <div class="ln_solid"></div>
                                            <span class="text-center"
                                                  style="font-size:18px">Sistem Yedek Zamanı : <?php echo $values[0]["sql_backup_time"]; ?>  </span>

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
            <!--********************************************* SQL BACKUP-->

        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
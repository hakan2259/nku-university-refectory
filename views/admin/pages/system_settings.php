<?php require 'views/admin/header.php'; ?>

    <!-- page content -->
    <div class="right_col" role="main">

        <?php


        if (isset($data["info"])) :


            if (is_array($data["info"])) :

                foreach ($data["info"] as $deger) :


                    echo'<div class="alert alert-danger mt-5">'.$deger.'</div>';

                    echo $data["yonlen"];

                endforeach;

            else:

                echo $data["info"];
            endif;






        endif;
        ?>
        <!-- top tiles -->
        <div class="clearfix"></div>
        <div class="row">

            <!--********************************************* USERS SELECT-->


            <?php
            //Users Select
            if (isset($data["systemSetting"])):
                if(!$_POST):
            ?>
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Sistem Yönetimi <small>Sistem Ayarları Güncelleme</small></h2>
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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/systemSettingsUpdate" enctype="multipart/form-data">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Otomasyon Video URL <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="video_link" required="required" class="form-control" value="<?php echo $data["systemSetting"][0]["video_link"]; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="title" required="required" class="form-control" value="<?php echo $data["systemSetting"][0]["title"]; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" >Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  required="required" class="form-control" name="description" data-parsley-minlength="20" data-parsley-maxlength="300">
                                        <?php echo $data["systemSetting"][0]["description"]; ?>
                                    </textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Keywords <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea  required="required" class="form-control" name="keywords"  data-parsley-minlength="20" data-parsley-maxlength="300">
                                        <?php echo $data["systemSetting"][0]["keywords"]; ?>
                                    </textarea>
                                </div>
                            </div>





                            <div class="ln_solid"></div>

                            <div class="row">
                                 <div class="col-md-4">
                                     <div class="item form-group">
                                         <label class="col-form-label col-md-3 col-sm-3 label-align">Logo <span class="required">*</span>
                                         </label>
                                         <div class="col-md-9 col-sm-9 ">
                                               <img src="<?php echo URL;?>/views/assets/img/<?php echo $data["systemSetting"][0]["front_logo"]; ?>" class="img-fluid" style="background-color: #01AEBC">
                                             <input class="form-control" name="front_logo" type="file" width="50px">
                                         </div>

                                     </div>
                                 </div>

                                <div class="col-md-4">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Banner <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <img src="<?php echo URL;?>/views/assets/img/<?php echo $data["systemSetting"][0]["banner"]; ?>" class="img-fluid">
                                            <input class="form-control" name="banner" type="file" width="50px">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Footer Image <span class="required">*</span>
                                        </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <img src="<?php echo URL;?>/views/assets/img/<?php echo $data["systemSetting"][0]["footer_img"]; ?>" class="img-fluid">
                                            <input class="form-control" name="footer_img" type="file" width="50px">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Footer Logo <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <img src="<?php echo URL;?>/views/assets/img/<?php echo $data["systemSetting"][0]["footer_logo"]; ?>" class="img-fluid" style="background-color: #01AEBC">
                                            <input class="form-control" name="footer_logo" type="file" width="50px">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Icon <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <img src="<?php echo URL;?>/views/assets/img/<?php echo $data["systemSetting"][0]["icon"]; ?>" class="img-fluid" width="100px">
                                            <input class="form-control" name="icon" type="file" width="50px">
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                    <button type="submit" class="btn btn-success btn-sm">GÜNCELLE</button>
                                    <input type="hidden" name="setting_id" value="<?php echo $data["systemSetting"][0]["id"]; ?>">

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
            <!--********************************************* USERS SELECT-->

        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
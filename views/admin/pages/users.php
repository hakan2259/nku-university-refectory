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

            <?php
            //Users ALL UPDATE
            if (isset($data["userAllUpdate"])):
                if(!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Kullanıcı Yönetimi <small><a href="<?php echo URL;?>/admin/users" style="font-weight: bold;">Kullanıcılar</a> / Toplu Güncelle</small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/userAllUpdatePost" enctype="multipart/form-data">
                                    <div class="item form-group">


                                        <div class="col-md-12 col-sm-12 offset-md-12 text-center">
                                            <div class="toggle-radio pt-5">
                                                <input type="radio" name="filePreference" id="yes" value="xml" checked="checked">
                                                <input type="radio" name="filePreference" id="no" value="json">
                                                <div class="switch">
                                                    <label for="yes">XML</label>
                                                    <label for="no">JSON</label>
                                                    <span></span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosya <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="file" name="file" class="form-control" required="required">
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" value="userInsertBtn" class="btn btn-success btn-sm">YÜKLE</button>

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

            <!--*********************************************USERS ALL UPDATE-->


            <?php
            //Users ALL DELETE
            if (isset($data["userAllDelete"])):
                if(!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Kullanıcı Yönetimi <small><a href="<?php echo URL;?>/admin/users" style="font-weight: bold;">Kullanıcılar</a> / Toplu Silme</small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/userAllDeletePost" enctype="multipart/form-data">
                                    <div class="item form-group">


                                        <div class="col-md-12 col-sm-12 offset-md-12 text-center">
                                            <div class="toggle-radio pt-5">
                                                <input type="radio" name="filePreference" id="yes" value="xml" checked="checked">
                                                <input type="radio" name="filePreference" id="no" value="json">
                                                <div class="switch">
                                                    <label for="yes">XML</label>
                                                    <label for="no">JSON</label>
                                                    <span></span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosya <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="file" name="file" class="form-control" required="required">
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" value="userDeleteBtn" class="btn btn-success btn-sm">YÜKLE</button>

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

            <!--*********************************************USERS ALL DELETE-->

            <?php
            //Users INSERT
            if (isset($data["userInsert"])):
                if(!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Kullanıcı Yönetimi <small><a href="<?php echo URL;?>/admin/users" style="font-weight: bold;">Kullanıcılar</a> / Toplu Ekle</small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/userInsertPost" enctype="multipart/form-data">
                                    <div class="item form-group">


                                        <div class="col-md-12 col-sm-12 offset-md-12 text-center">
                                            <div class="toggle-radio pt-5">
                                                <input type="radio" name="filePreference" id="yes" value="xml" checked="checked">
                                                <input type="radio" name="filePreference" id="no" value="json">
                                                <div class="switch">
                                                    <label for="yes">XML</label>
                                                    <label for="no">JSON</label>
                                                    <span></span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Dosya <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="file" name="file" class="form-control" required="required">
                                        </div>
                                    </div>



                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" value="userInsertBtn" class="btn btn-success btn-sm">YÜKLE</button>

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

            <!--*********************************************USERS INSERT-->



            <?php
            //Users UPDATE
            if (isset($data["userUpdate"])):
                if(!$_POST):
                    ?>
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Kullanıcı Yönetimi <small><a href="<?php echo URL;?>/admin/users" style="font-weight: bold;">Kullanıcılar</a> / Kullanıcı Bilgilerini Güncelleme</small></h2>
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
                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo URL; ?>/admin/userUpdatePost">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Okul Numarası <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="school_no" required="required" class="form-control" value="<?php echo $data["userUpdate"][0]["school_number"]; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Adı <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="firstname" required="required" class="form-control" value="<?php echo $data["userUpdate"][0]["firstname"]; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Soyadı <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="lastname" required="required" class="form-control" value="<?php echo $data["userUpdate"][0]["lastname"]; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kullanıcı Adı <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input  class="form-control" type="text" name="username" required="required" value="<?php echo $data["userUpdate"][0]["username"]; ?>">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">E-Posta <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input  class="form-control" type="email" name="email" required="required" value="<?php echo $data["userUpdate"][0]["email"]; ?>">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Telefon <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input  class="form-control" type="text" name="phone" required="required" value="<?php echo $data["userUpdate"][0]["phone"]; ?>">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Mesleği <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input  class="form-control" type="text" name="job_title" required="required" value="<?php echo $data["userUpdate"][0]["job_title"]; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align"></label>
                                        <div class="col-md-6 col-sm-6 ">

                                            <select class="form-control" name="status">
                                                <option>Choose option</option>
                                                <option value="0" <?php if($data["userUpdate"][0]["status"] == 0): echo "selected"; else: false; endif;?>>Pasif</option>
                                                <option value="1" <?php if($data["userUpdate"][0]["status"] == 1): echo "selected"; else: false; endif;?>>Aktif</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-6 col-sm-6 offset-md-3 text-center">

                                            <button type="submit" class="btn btn-success btn-sm">GÜNCELLE</button>
                                            <input type="hidden" name="user_id" value="<?php echo $data["userUpdate"][0]["id"]; ?>">
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

            <!--*********************************************USERS UPDATE-->




            <!--********************************************* USERS SELECT-->
            <?php
            //Users Select
            if (isset($data["data"])):
                if(!$_POST):
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




                                <div class="dropdown" style="float: right; margin-right: 20px">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="margin-right: 115px">
                                        Yönetim
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo URL;?>/admin/userInsert"><i class="fas fa-plus mr-2" style="font-size: 20px; color: #62C81E;"></i>Toplu Kullanıcı Ekleme</a>
                                        <a class="dropdown-item" href="<?php echo URL;?>/admin/userAllUpdate"><i class="fas fa-retweet mr-2" style="font-size: 20px; color: #1ABB9C;"></i>Toplu Kullanıcı Güncelleme</a>
                                        <a class="dropdown-item" href="<?php echo URL;?>/admin/userAllDelete"><i class="fas fa-minus mr-2" style="font-size: 20px; color: #1ABB9C;"></i>Toplu Kullanıcı Silme</a>

                                    </div>
                                </div>

                                <div class="card-box table-responsive">

                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                           style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>Okul Numarası</th>
                                            <th>Adı</th>
                                            <th>Soyadı</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>E-Posta</th>
                                            <th>Telefon</th>
                                            <th>Mesleği</th>
                                            <th>Durum</th>
                                            <th>İşlemler</th>

                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php foreach ($data["data"] as $value) :

                                            ?>
                                            <tr>
                                                <td><?php echo $value["school_number"]; ?></td>
                                                <td><?php echo $value["firstname"]; ?></td>
                                                <td><?php echo $value["lastname"]; ?></td>
                                                <td><?php echo $value["username"]; ?></td>
                                                <td><?php echo $value["email"]; ?></td>
                                                <td><?php echo $value["phone"]; ?></td>
                                                <td><?php echo $value["job_title"]; ?></td>
                                                <td><?php if ($value["status"] == 1):
                                                        echo "<span class='text-success'>Aktif</span>";
                                                    else:
                                                        echo "<span class='text-danger'>Pasif</span>";
                                                    endif;
                                                    ?></td>

                                                <td>
                                                    <a href="<?php echo URL; ?>/admin/UserUpdate/<?php echo $value["id"]; ?>" class="fa fa-edit" style="font-size: 25px; color: #62C81E;"></a>
                                                    <a href="<?php echo URL; ?>/admin/UserDelete/<?php echo $value["id"]; ?>" class="fa fa-trash ml-2" style="font-size: 25px; color: red;"></a> </td>
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
            <!--********************************************* USERS SELECT-->

        </div>
        <!-- /top tiles -->

    </div>
    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
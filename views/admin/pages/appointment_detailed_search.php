<?php require 'views/admin/header.php'; ?>


    <!-- page content -->
    <div class="right_col" role="main">


        <!-- top tiles -->
        <div class="clearfix"></div>


        <div class="row">

            <!-- BAŞLIK -->
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="row mb-2">
                        <div class="col-lg-12 col-xl-12 col-md-12 text-center"><h1
                                    class="h5  text-gray-800"><i class="fa fa-search mr-3"></i> RANDEVU ARAMA </h1>
                        </div>

                    </div>


                    <div class="col-xl-12 col-md-12 mb-12 text-center mt-3">
                        <div class="row">

                            <div class="col-lg-3 col-xl-3 col-md-12 mt-1"><span class="h5 text-gray-800">Randevu
                                        Numarası :</span></div>

                            <div class="col-xl-2 col-lg-2">

                                <?php

                                Form::Olustur("1", array(
                                    "action" => URL . "/admin/appointmentDetailedSearch",
                                    "method" => "POST"
                                ));

                                Form::Olustur("2", array("type" => "text", "name" => "appointment_number", "class" => "form-control"));

                                ?>


                            </div>

                            <div class="col-lg-3 col-xl-3 col-md-12 mt-1"><span class="h5 text-gray-800">Kullanıcı
                                        Bilgisi :</span></div>


                            <div class="col-xl-3 col-lg-3 ">
                                <?php


                                Form::Olustur("2", array("type" => "text", "name" => "user_info", "class" => "form-control", "id" => "aramakutusu"));

                                ?>


                            </div>

                            <div class="col-xl-1 col-lg-1 mb-4">

                                <?php

                                Form::Olustur("2", array("type" => "submit", "value" => "ARA", "class" => "btn btn-sm btn btn-primary", "style" => "height:40px; width:70px"));


                                ?>


                            </div>


                            <div class="col-lg-3 col-xl-3 col-md-12 mt-1"><span class="h5 text-gray-800">Tarih
                                        Aralığı :</span></div>


                            <div class="col-xl-3 col-lg-3">
                                <?php


                                Form::Olustur("2", array("type" => "date", "name" => "tarih1", "class" => "form-control"));

                                ?>


                            </div>


                            <div class="col-xl-3 col-lg-3">
                                <?php


                                Form::Olustur("2", array("type" => "date", "name" => "tarih2", "class" => "form-control","style"=>"margin-bottom:15px"));
                                Form::Olustur("kapat");
                                ?>


                            </div>

                            <div class="col-xl-2 col-lg-2">

                                <div style="text-align: center">


                                    <a href="<?php echo URL?>/admin/appointmentExcelExport"><i class="fas fa-file-excel fa-3x mr-4" style="color: #1F6E43;"></i></a>
                                    <a href="<?php echo URL;?>/admin/appointmentWordExport"><i class="fas fa-file-word fa-3x" style="color: #3EA0E6;"></i></a>
                                </div>

                            </div>



                        </div>

                        <?php


                        if (isset($data["default"])) :


                            echo '<div class="alert alert-warning mt-5 text-center">
<h4>YUKARIDAN ARAMA KRİTERİ SEÇİNİZ</h4>
</div>';


                        endif;

                        ?>


                    </div>


                    <!--********************************************* APPOINTMENT SELECT-->


                    <?php
                    // SİPARİŞLERİN TÜMÜNÜN GÖRÜNDÜĞÜ YER
                    if (isset($data["data"])) :



                    $ordernum = array();
                    foreach ($data["data"] as $value) :
                        $ordernum[] = $value["order_no"];
                    endforeach;


                    $ordernumUnique = array_unique($ordernum, SORT_STRING);
                    $son = join(",", $ordernumUnique);
                    Session::set("numbers", $son);


                    echo '<div style="text-align: center">

              
<h4 style="margin-top: 10px">'.$data["aramakriter"].'</h4>

</div>';








                    foreach ($ordernumUnique

                    as $value) :

                    $veriler = $AdminExternal->joinislemi(
                        array(
                            "orders.menu_price As menuPrice",
                            "orders.school_no As schoolNo",
                            "orders.payment_type As payment",
                            "orders.created_at As created_at",
                            "users.firstname As name",
                            "users.lastname  As surname",


                        ),
                        array(
                            "orders",
                            "users",

                        ),
                        "(orders.order_no=$value) AND (orders.user_id=users.id)"
                    );

                    ?>


                    <!-- TOPLAM FİYAT -->


                    <!-- SİPARİŞİN İSKELETİ BAŞLIYOR -->
                    <div class="row  p-1 mt-2 pb-0">
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                            <span>Randevu No :</span> <span class="spantext"><?php echo $value; ?></span>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                            <span>Okul No :</span> <span class="spantext"><?php echo $veriler[0]["schoolNo"]; ?></span>
                        </div>


                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                            <span>Kullanıcı Adı :</span> <span
                                    class="spantext"><?php echo $veriler[0]["name"] . " " . $veriler[0]["surname"]; ?></span>
                        </div>


                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc">
                            <span>Ödeme Türü :</span> <span
                                    class="spantext"><?php echo $veriler[0]["payment"]; ?></span>
                        </div>

                        <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 pt-3 geneltext bg-gradient-mvc"
                             id="detaygoster">
                            <span>Tarih :</span> <span class="spantext"><?php echo $veriler[0]["created_at"]; ?></span>


                        </div>


                        <!--  ÜRÜNLER-->

                        <div class="x_content ml-3">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 p-0">


                                <div class="row">

                                    <div class="col-lg-7 bg-gradient-gri text-dark kalinyap p-2"
                                         style="font-weight: bold">YEMEKHANE
                                    </div>
                                    <div class="col-lg-2 bg-gradient-gri text-dark kalinyap p-2"
                                         style="font-weight: bold">MENU FİYATI
                                    </div>
                                    <div class="col-lg-3 bg-gradient-gri text-dark kalinyap p-2"
                                         style="font-weight: bold">RANDEVU TARİHİ
                                    </div>

                                </div>

                                <?php

                                $veriler2 = $AdminExternal->joinislemi(
                                    array(
                                        "orders.menu_price As menuPrice",
                                        "orders.appointment_date As appointmentDate",
                                        "refectory_places.place_name As placeName",


                                    ),
                                    array(
                                        "orders",
                                        "refectory_places",

                                    ),
                                    "(orders.order_no=$value) AND (orders.refectory_place_id=refectory_places.id)"
                                );
                                $toplam = array();

                                foreach ($veriler2 as $value):

                                    echo '<div class="row border border-light">     
<div class="col-lg-7 text-dark kalinyap p-2">' . $value["placeName"] . '</div>
<div class="col-lg-2 text-dark kalinyap p-2">' . $value["menuPrice"] . ' ₺</div>
         <div class="col-lg-3 text-dark kalinyap p-2">' . $value["appointmentDate"] . '</div>
                     </div> ';
                                    $toplam[] = $value["menuPrice"];
                                endforeach;


                                ?>


                                <!-- TOPLAM FİYAT -->

                                <div class="row">

                                    <div class="col-lg-9 text-dark kalinyap p-2"></div>
                                    <div class="col-lg-2  geneltext2 text-right p-2"><span>TOPLAM FİYAT :</span>
                                    </div>
                                    <div class="col-lg-1  geneltext2 text-left kalinyap p-2"><span>

					<?php
                    print_r(number_format(array_sum($toplam), "2", ",", ".") . "₺");

                    ?></span></div>

                                </div>
                                <!-- TOPLAM FİYAT -->
                                <hr>


                            </div>

                            <!--  ÜRÜNLER-->


                        </div>

                        <!-- SİPARİŞİN İSKELETİ BİTİYOR -->

                        <?php


                        endforeach;


                        ?>

                        <?php

                        // SİPARİŞLERİN TÜMÜNÜN GÖRÜNDÜĞÜ YER


                        endif; ?>


                    </div>
                </div>
            </div>
        </div>
        <!-- /top tiles -->

    </div>

    <!-- /page content -->
<?php require 'views/admin/footer.php'; ?>
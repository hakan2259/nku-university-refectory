<?php require 'views/admin/header.php'; ?>


    <!-- page content -->
    <div class="right_col" role="main">


        <!-- top tiles -->
        <div class="clearfix"></div>
        <?php

        echo '<div class="text-center">';
        if (isset($data["info"])) :


            echo $data["info"];


        endif;
        echo '</div>';
        ?>

        <div class="row">


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


            ?>


            <!-- BAŞLIK -->
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="row text-left border-bottom-mvc mb-2">


                        <div class="col-lg-2 col-xl-2 col-md-12 border-left-mvc text-left"><h1
                                    class="h5  text-gray-800"> RANDEVULAR </h1>
                        </div>


                        <div class="col-lg-2 col-xl-2 col-md-12" style="margin-top: 10px"><span
                                    class="h6 text-gray-800">Toplam
                    Randevu : <?php echo count($ordernumUnique); ?></span></div>


                        <div class="col-xl-8 col-md-12 mb-12 text-right">
                            <div class="row">

                                <div class="col-xl-4">

                                    <?php

                                    Form::Olustur("1", array(
                                        "action" => URL . "/admin/appointmentSearch",
                                        "method" => "POST"
                                    ));

                                    Form::OlusturSelect("1", array("name" => "aramatercih", "class" => "form-control", "id" => "aramaselect"));

                                    Form::OlusturOption(array("value" => "sipno"), false, "Randevu Numarası");

                                    Form::OlusturOption(array("value" => "uyebilgi"), false, "Kullanıcı Bilgisi");

                                    Form::OlusturSelect("2", null);


                                    ?>


                                </div>

                                <div class="col-xl-4">
                                    <?php


                                    Form::Olustur("2", array("type" => "text", "name" => "aramaverisi", "class" => "form-control", "id" => "aramakutusu"));

                                    ?>


                                </div>
                                <div class="col-xl-2">

                                    <a href="<?php echo URL?>/admin/appointmentExcelExport"><i class="fas fa-file-excel fa-3x mr-4" style="color: #1F6E43;"></i></a>
                                    <a href="<?php echo URL;?>/admin/appointmentWordExport"><i class="fas fa-file-word fa-3x" style="color: #3EA0E6;"></i></a>


                                </div>
                                <div class="col-xl-2">

                                    <?php

                                    Form::Olustur("2", array("type" => "submit", "value" => "ARA", "class" => "btn btn btn-primary", "id" => "btnReload"));


                                    Form::Olustur("kapat"); ?>


                                </div>

                            </div>


                        </div>

                    </div>
                    <!-- BAŞLIK -->

                    <?php

                    foreach ($ordernumUnique as $value) :

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
                                <span>Okul No :</span> <span
                                        class="spantext"><?php echo $veriler[0]["schoolNo"]; ?></span>
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
                                <span>Tarih :</span> <span
                                        class="spantext"><?php echo $veriler[0]["created_at"]; ?></span>


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
<?php

class user extends Controller
{


    function __construct()
    {
        parent::UploadLibrary(array("View", "Bilgi", "Form", "CsrfToken"));

        $this->Modelyukle('user');
        Session::init();

    }

    function login()
    {

        $this->View->goster("pages/login", array(
            "source" => URL . "/views/captcha/captcha.php?type=auto",
            "userToken" => $this->CsrfToken->userCodeCreate()

        ));







    }

    function basket()
    {

        return $this->View->goster("pages/basket");
    }


    function logout()
    {

        Session::destroy();
        $this->Bilgi->direction("/refectory");
    }

    function loginControl()
    {
        if ($_POST):
            if ($_POST["loginType"] == "user"):
                $username = $this->Form->get("username")->bosmu();
                $userToken = $this->Form->get("userToken")->bosmu();
                $security = $this->Form->get("security")->bosmu();
                $password = $this->Form->get("password")->bosmu();

                if (!empty($this->Form->error)):

                    $this->View->goster("pages/login",
                        array(

                            "info" => $this->Bilgi->warning("warning", "Kullanıcı Adı veya Şifre Boş Olamaz!"),
                            "source" => URL . "/views/captcha/captcha.php?type=auto"

                        ));

                elseif ($security != Session::get("code")):

                    $this->View->goster("pages/login",
                        array(

                            "info" => $this->Bilgi->warning("warning", "Doğrulama Kodu Hatalıdır!"),
                            "source" => URL . "/views/captcha/captcha.php?type=auto"
                        ));
                      
            

               /*elseif ($userToken != Session::get("userToken")):

                    $this->View->goster("pages/login",
                        array(
                            "info" => $this->Bilgi->warning("warning", "Sistem Hatası Var!"),
                            "source" => URL . "/views/captcha/captcha.php?type=auto"
                        ));*/

                else:
                    $password = $this->Form->encoding($password);
                    $result = $this->model->LoginControl("users", "username='$username' or email='$username' and password='$password' and status=1");
                    if ($result):
                        //$this->Bilgi->basarili("Giriş Başarılı","user/panel");
                        $this->Bilgi->direction("/user/reservation");


                        Session::set("userId", $result[0]["id"]); //üyenin idsini taşıyoruz..
                        Session::set("name", $result[0]["firstname"]);
                        Session::set("username", $result[0]["username"]);


                    ////kullanıcı paneline gidicek yükleme
                    else:
                        $this->View->goster("pages/login", array(
                            "info" => $this->Bilgi->warning("danger", "Kullanıcı Adı ve Şifre Hatalıdır!"),
                            "source" => URL . "/views/captcha/captcha.php?type=auto"
                        ));
                    endif;
                endif;
            elseif ($_POST["loginType"] == "admin"):
                $admin_username = $this->Form->get("admin_username")->bosmu();
                $admin_password = $this->Form->get("admin_password")->bosmu();
                $adminToken = $this->Form->get("adminToken")->bosmu();
                if (!empty($this->Form->error)):

                    $this->View->goster("admin/login",
                        array(

                            "info" => $this->Bilgi->warning("warning", "Kullanıcı Adı veya Şifre Boş Olamaz!")
                        ));
                elseif ($adminToken != Session::get("adminToken")):

                    $this->View->goster("admin/login",
                        array(
                            "info" => $this->Bilgi->warning("warning", "Sistem Hatası Var!"),

                        ));

                else:
                    $admin_password = $this->Form->encoding($admin_password);
                    $result = $this->model->LoginControl("administrator", "username='$admin_username' and password='$admin_password'");
                    if ($result):
                        //$this->Bilgi->basarili("Giriş Başarılı","user/panel");
                        $this->Bilgi->direction("/admin/panel");

                        Session::set("adminId", $result[0]["id"]); //üyenin idsini taşıyoruz..
                        Session::set("adminName", $result[0]["firstname"]);
                        Session::set("adminUsername", $result[0]["username"]);

                    ////kullanıcı paneline gidicek yükleme
                    else:
                        $this->View->goster("admin/login", array(
                            "info" => $this->Bilgi->warning("danger", "Kullanıcı Adı ve Şifre Hatalıdır!")
                        ));
                    endif;
                endif;


            endif;
        endif;

    }

    function reservation()
    {
        $this->View->goster("pages/reservation");
    }

    function buying()
    {
        $this->View->goster("pages/initialize_checkout_form");


    }

    function orderCompleted($value = false)
    {

        if ($value):
            $crated_At = date("d.m.Y");
            $orderNo = mt_rand(0, 999999999);
            $userId = Session::get("userId");
            $paymentType = "Sanal Pos";
            $getUser = $this->model->Select("users","where id=".$userId);
            $this->model->TopluislemBaslat();
            if (isset($_COOKIE["meal"])):
                foreach ($_COOKIE["meal"] as $id => $r_place):
                    $getMenu = $this->model->Select("menu", "where id=" . $id);

                    $orderCompleted = $this->model->SiparisTamamlama(
                        array(
                            $orderNo,
                            $getUser[0]["school_number"],
                            $userId,
                            $getMenu[0]["id"],
                            $r_place,
                            $paymentType,
                            $getMenu[0]["menu_price"],
                            1,
                            $getMenu[0]["menu_date"],
                            $crated_At
                        )
                    );

                    $total[] = $getMenu[0]["menu_price"];

                endforeach;
                $this->model->TopluislemTamamla();
                Cookie::EmptyBasket();
                $totalPrice = array_sum($total);


                $this->View->goster("pages/order_completed",
                    array(
                        "totalPrice" => $totalPrice
                    ));

                header("Refresh:1; url=" . URL);

            else:

                $this->Bilgi->direction("/");


            endif;

        else:

            $this->View->goster("pages/order_completed",
                array("info" => $this->Bilgi->warning("success", "BAŞARISIZ")));

        endif;


    }


    function buyingControl()
    {
        $this->View->goster("pages/odemekontrol");
    }

}


?>
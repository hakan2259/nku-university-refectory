<?php

class admin extends Controller
{

    public $authorityControl, $sorguhatasi, $searchValue;

    function __construct()
    {
        parent::UploadLibrary(array("View", "Bilgi", "Form", "Upload", "FileExport", "FileOperations", "CsrfToken"));

        $this->Modelyukle('admin');
        Session::init();

        if (!Session::get("adminId") && !Session::get("adminUsername")):

            $this->login();

            exit();
        else:
            $this->authorityControl = new AdminExternal();
        endif;


    }

    function login()
    {
        if (Session::get("adminId") && Session::get("adminUsername")):
            $this->View->goster('admin/index');

        else:
            $this->View->goster('admin/login', array(
                "adminToken" => $this->CsrfToken->adminCodeCreate()
            ));
        endif;

    }

    function Index()
    {
        $this->panel();
    }

    function panel()
    {
        $this->View->goster('admin/index');
    }

    //---------------------Appointment--------------------------
    function appointment()
    {
        $this->authorityControl->LookAtYourAuthority("appointment_management");;

        $this->View->goster("admin/pages/appointment", array(
            "data" => $this->model->Select("orders", "order by id desc"),
            "totalData" => $this->model->toplamRandevu("orders")


        ));
    } // Appointment Coming

    function appointmentDelete($orderNo)
    {

        $this->authorityControl->LookAtYourAuthority("appointment_management");
        $result = $this->model->Delete("orders", "order_no=" . $orderNo);

        if ($result):

            $this->View->goster("admin/pages/appointment",
                array(
                    "info" => $this->Bilgi->basarili("SİLME BAŞARILI", "/admin/appointment", 1)

                ));

        else:
            $this->View->goster("admin/pages/appointment",
                array(
                    "info" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU!", "/admin/appointment", 1)

                ));
        endif;
    }// Appointment Delete

    function appointmentSearch()
    {
        $this->authorityControl->LookAtYourAuthority("appointment_management");
        if ($_POST) :
            $aramatercih = $this->Form->get("aramatercih")->bosmu();

            $aramaverisi = $this->Form->get("aramaverisi")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/appointment",
                    array(
                        "info" => $this->Bilgi->hata("BİLGİ GİRİLMELİDİR.", "/admin/appointment", 1)
                    ));


            else:


                if ($aramatercih == "sipno") :


                    $this->View->goster("admin/pages/appointment", array(

                        "data" => $this->model->Arama("orders", "order_no LIKE '" . $aramaverisi . "'")
                    ));

                elseif ($aramatercih == "uyebilgi"):


                    $bilgicek = $this->model->Arama("users",
                        "id LIKE '%" . $aramaverisi . "%' or 
			firstname LIKE '%" . $aramaverisi . "%'  or 
			lastname LIKE '%" . $aramaverisi . "%' or 
			email LIKE '%" . $aramaverisi . "%' or
			school_number LIKE '%" . $aramaverisi . "%' or
			city LIKE '%" . $aramaverisi . "%'");


                    if ($bilgicek):

                        $this->View->goster("admin/pages/appointment", array(
                            "data" => $this->model->Select("orders", "where user_id=" . $bilgicek[0]["id"]
                            )
                        ));

                    else:

                        $this->View->goster("admin/pages/appointment",
                            array(
                                "info" => $this->Bilgi->hata("HİÇBİR KRİTER UYUŞMADI.", "/admin/appointment", 2)
                            ));
                    endif;

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/panel");


        endif;


    } //Appointment Search

    function appointmentDetailedSearch()
    {
        $this->authorityControl->LookAtYourAuthority("appointment_management");
        if ($_POST) :
            $appointmentNumber = $this->Form->get("appointment_number", true);
            $userInfo = $this->Form->get("user_info", true);
            $tarih1 = $this->Form->get("tarih1", true);
            $tarih2 = $this->Form->get("tarih2", true);

            $year = substr($tarih1, 0, 4);
            $month = substr($tarih1, 5, 2);
            $day = substr($tarih1, 8, 2);
            $tarih1son = $day . "-" . $month . "-" . $year;
            $year2 = substr($tarih2, 0, 4);
            $month2 = substr($tarih2, 5, 2);
            $day2 = substr($tarih2, 8, 2);
            $tarih2son = $day2 . "-" . $month2 . "-" . $year2;


            if (!empty($appointmentNumber)) : $this->searchValue .= "Randevu Numarası : " . $appointmentNumber . ""; endif;
            if (!empty($tarih1son) && !empty($tarih2son)) : $this->searchValue .= " Başlangıç Tarihi : " . $tarih1son . " - Bitiş Tarihi : " . $tarih2son; endif;


            if (!empty($userInfo)) :

                $bilgicek = $this->model->Arama("users",
                    "id LIKE '%" . $userInfo . "%' or 
			firstname LIKE '%" . $userInfo . "%'  or 
			lastname LIKE '%" . $userInfo . "%' or 
			email LIKE '%" . $userInfo . "%' or
			school_number LIKE '%" . $userInfo . "%' or
			city LIKE '%" . $userInfo . "%'");


                if ($bilgicek):

                    $this->View->goster("admin/pages/appointment_detailed_search", array(
                        "data" => $this->model->Arama("orders", "user_id='" . $bilgicek[0]["id"] . "' and
                        order_no LIKE '%" . $appointmentNumber . "%'"
                        ),
                        "aramakriter" => $this->searchValue
                    ));

                endif;

            elseif (!empty($appointmentNumber)) :

                $this->View->goster("admin/pages/appointment_detailed_search", array(
                    "data" => $this->model->Arama("orders", "order_no LIKE '%" . $appointmentNumber . "%'"),
                    "aramakriter" => $this->searchValue
                ));

            elseif (!empty($tarih1) && !empty($tarih2)):

                $this->View->goster("admin/pages/appointment_detailed_search", array(
                    "data" => $this->model->Arama("orders", "appointment_date BETWEEN '" . $tarih1son . "' and '" . $tarih2son . "'"),
                    "aramakriter" => $this->searchValue
                ));

            else:

                $this->View->goster("admin/pages/appointment_detailed_search", array(
                    "default" => true
                ));


            endif;


        else:
            $this->View->goster("admin/pages/appointment_detailed_search", array(
                "default" => true
            ));


        endif;


    } //Appointment Detailed Search

    function appointmentExcelExport()
    {
        $this->authorityControl->LookAtYourAuthority("appointment_management");
        $getNumbers = Session::get("numbers");
        $this->model->GetExcelSetting2("order_no,school_no,menu_price,payment_type,appointment_date from orders where order_no IN(" . $getNumbers . ")");
        $this->FileExport->Excelaktar("RANDEVULAR", NULL, array("Randevu Numarası", "Okul Numarası", "Menü Fiyatı", "Ödeme Türü", "Randevu Tarihi"),
            $this->model->contents[0], "xls");


    }//Appointment Excel Export

    function appointmentWordExport()
    {
        $this->authorityControl->LookAtYourAuthority("appointment_management");
        $getNumbers = Session::get("numbers");
        $this->model->GetExcelSetting2("order_no,school_no,menu_price,payment_type,appointment_date from orders where order_no IN(" . $getNumbers . ")");
        $this->FileExport->Excelaktar("RANDEVULAR", NULL, array("Randevu Numarası", "Okul Numarası", "Menü Fiyatı", "Ödeme Türü", "Randevu Tarihi"),
            $this->model->contents[0], "docx");


    }//Appointment Excel Export


    //appointmentDetailedSearch
    //---------------------Appointment--------------------------

    //---------------------Users--------------------------
    function users()
    {
        $this->authorityControl->LookAtYourAuthority("user_management");
        $this->View->goster("admin/pages/users", array(
            "data" => $this->model->Select("users", false)
        ));
    } // Users Coming

    function UserDelete($id)
    {
        $this->authorityControl->LookAtYourAuthority("user_management");
        $result = $this->model->Delete("users", "id=" . $id);

        if ($result):

            $this->View->goster("admin/pages/users",
                array(
                    "info" => $this->Bilgi->basarili("SİLME BAŞARILI", "/admin/users", 1)

                ));

        else:
            $this->View->goster("admin/pages/users",
                array(
                    "info" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU!", "/admin/users", 1)

                ));
        endif;
    }// Users Delete

    function UserUpdate($id)
    {
        $this->authorityControl->LookAtYourAuthority("user_management");
        $this->View->goster("admin/pages/users", array(
            "userUpdate" => $this->model->Select("users", "where id=" . $id)
        ));
    } // Users Update GET

    function userUpdatePost()
    {
        $this->authorityControl->LookAtYourAuthority("user_management");
        if ($_POST) :
            $school_number = $this->Form->get("school_no")->bosmu();
            $firstname = $this->Form->get("firstname")->bosmu();
            $lastname = $this->Form->get("lastname")->bosmu();
            $username = $this->Form->get("username")->bosmu();
            $email = $this->Form->get("email")->bosmu();
            $phone = $this->Form->get("phone")->bosmu();
            $job_title = $this->Form->get("job_title")->bosmu();
            $status = $_POST["status"];
            $user_id = $this->Form->get("user_id")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/users",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/users", 2)
                    ));

            else:


                $result = $this->model->Update("users",
                    array("school_number", "firstname", "lastname", "username", "email", "phone", "job_title", "status"),
                    array($school_number, $firstname, $lastname, $username, $email, $phone, $job_title, $status), "id=" . $user_id);


                if ($result):

                    $this->View->goster("admin/pages/users",
                        array(
                            "info" => $this->Bilgi->basarili("BAŞARILI", "/admin/users", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/users",
                        array(
                            "info" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/admin/users", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/users");


        endif;

    } // Users Update POST

    function userInsert()
    {
        $this->authorityControl->LookAtYourAuthority("user_management");
        $this->View->goster("admin/pages/users", array(
            "userInsert" => true
        ));
    } // Users ALL Insert GET

    function userInsertPost()
    {
        $this->authorityControl->LookAtYourAuthority("user_management");

        $tercih = $this->Form->RadioButtonGet("filePreference");
        if ($tercih == "xml"):
            $this->FileOperations->VerileriAyikla("file", "/users/user", array("*identity_number", "*school_number", "*firstname", "*lastname", "*username", "*email", "*password", "*phone", "*address", "*country", "*city", "*job_title", "status"));


        else:

            $this->FileOperations->JsonVerileriAyikla("file");

        endif;

        if (!empty($this->FileOperations->error)) :

            $this->View->goster("admin/pages/users",
                array(
                    "info" => $this->Bilgi->hata("Yüklenen Dosya Açılamadı!.", "/admin/users", 2)
                ));

        else:

            $result = $this->model->InsertAll("users",
                array("identity_number", "school_number", "firstname", "lastname", "username", "email", "password", "phone", "address", "country", "city", "job_title", "status"),
                $this->FileOperations->verileritut);


            if ($result):

                $this->View->goster("admin/pages/users",
                    array(
                        "info" => $this->Bilgi->basarili("EKLEME BAŞARILI", "/admin/users", 2)
                    ));

            else:

                $this->View->goster("admin/pages/users",
                    array(
                        "info" => $this->Bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.", "/admin/users", 2)
                    ));

            endif;
        endif;


    } // ALL Users Insert POST

    /*function userExcelExport()
    {
        $this->model->GetExcelSetting("users", false, "users");
        $this->FileExport->Excelaktar("Kullanıcı Bilgileri", NULL, array("Kimlik Numarası", "Okul Numarası", "Adı", "Soyadı", "Kullanıcı Adı", "E-posta", "Telefon", "Mesleği"),
            $this->model->contents);

    }//Users Excel Export*/

    /*function userTxtExport()
    {

        $this->FileExport->TxtCreate($this->model->Select("users", false));
    }//Users TXT Export*/

    function userAllUpdate()
    {
        $this->authorityControl->LookAtYourAuthority("user_management");
        $this->View->goster("admin/pages/users", array(
            "userAllUpdate" => true
        ));
    } // Users ALL Update GET

    function userAllUpdatePost()
    {
        $this->authorityControl->LookAtYourAuthority("user_management");

        $tercih = $this->Form->RadioButtonGet("filePreference");
        if ($tercih == "xml"):
            $this->FileOperations->TopluGuncellemeXML("file", "/users/user");

        else:

            $this->FileOperations->TopluGuncellemeJSON("file");

        endif;

        if (!empty($this->FileOperations->error)) :

            $this->View->goster("admin/pages/users",
                array(
                    "info" => $this->Bilgi->hata("Yüklenen Dosya Açılamadı!.", "/admin/users", 2)
                ));

        else:

            $this->model->TopluislemBaslat();

            for ($a = 0; $a < count($this->FileOperations->verilerdizi); $a++):

                $sonuc = $this->model->Update("users",
                    $this->FileOperations->sutunlardizi[$a],
                    $this->FileOperations->verilerdizi[$a],
                    "id=" . $this->FileOperations->verilerdizi[$a][0]);

                if (!$sonuc):
                    $this->sorguhatasi = true;
                else:
                    $this->sorguhatasi = false;
                endif;

            endfor;

            if ($this->sorguhatasi):
                $this->model->İslemlerigerial();

            else:
                $this->model->TopluislemTamamla();
            endif;

            if (!$this->sorguhatasi):

                $this->View->goster("admin/pages/users",
                    array(
                        "info" => $this->Bilgi->basarili("İÇERİ AKTARIM BAŞARILI", "/admin/users", 2)

                    ));

            else:

                $this->View->goster("admin/pages/users",
                    array(
                        "info" => $this->Bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.", "/admin/users", 2)
                    ));

            endif;
        endif;


    } // ALL Users Update POST

    function userAllDelete()
    {
        $this->authorityControl->LookAtYourAuthority("user_management");
        $this->View->goster("admin/pages/users", array(
            "userAllDelete" => true
        ));
    } // Users ALL Delete GET

    function userAllDeletePost()
    {

        $this->authorityControl->LookAtYourAuthority("user_management");

        $tercih = $this->Form->RadioButtonGet("filePreference");
        if ($tercih == "xml"):
            $sonhal = $this->FileOperations->TopluSilmeXml("file", "/users/user");

        else:

            $sonhal = $this->FileOperations->TopluSilmeJson("file");

        endif;

        if (!empty($this->FileOperations->error)) :

            $this->View->goster("admin/pages/users",
                array(
                    "info" => $this->Bilgi->hata("Yüklenen Dosya Açılamadı!.", "/admin/users", 2)
                ));

        else:

            $sonuc = $this->model->Delete("users", "id IN($sonhal)");

            if ($sonuc):

                $this->View->goster("admin/pages/users",
                    array(
                        "info" => $this->Bilgi->basarili("ÜRÜNLER SİLİNDİ.", "/admin/users", 2)

                    ));

            else:

                $this->View->goster("admin/pages/users",
                    array(
                        "info" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.", "/admin/users", 2)
                    ));

            endif;
        endif;


    } // ALL Users Delete POST

    //--------------------Users---------------------------


    //---------------------Menus--------------------------
    function menus()
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        $this->View->goster("admin/pages/menus", array(
            "data" => $this->model->Select("menu", false)
        ));
    } // Menus Coming

    function MenusDelete($id)
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        $result = $this->model->Delete("menu", "id=" . $id);

        if ($result):

            $this->View->goster("admin/pages/menus",
                array(
                    "info" => $this->Bilgi->basarili("SİLME BAŞARILI", "/admin/menus", 1)

                ));

        else:
            $this->View->goster("admin/pages/menus",
                array(
                    "info" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU!", "/admin/menus", 1)

                ));
        endif;
    }// Menus Delete

    function MenusUpdate($id)
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        $this->View->goster("admin/pages/menus", array(
            "menuUpdate" => $this->model->Select("menu", "where id=" . $id)
        ));
    } // Menus Update GET

    function menuUpdatePost()
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        if ($_POST) :

            $soup = $this->Form->get("soup")->bosmu();
            $soup_calorie = $this->Form->get("soup_calorie")->bosmu();
            $main_food = $this->Form->get("main_food")->bosmu();
            $main_food_calorie = $this->Form->get("main_food_calorie")->bosmu();
            $main_food_2 = $this->Form->get("main_food_2")->bosmu();
            $main_food_2_calorie = $this->Form->get("main_food_2_calorie")->bosmu();
            $desserts = $this->Form->get("desserts")->bosmu();
            $desserts_calorie = $this->Form->get("desserts_calorie")->bosmu();
            $menu_date = $this->Form->get("menu_date")->bosmu();
            $menu_price = $this->Form->get("menu_price")->bosmu();
            $menu_status = $_POST["menu_status"];
            $menu_id = $this->Form->get("menu_id")->bosmu();
            $update_at = date('d-m-Y');


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/menus",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/menus", 2)
                    ));

            else:


                $result = $this->model->Update("menu",
                    array("soups", "soups_calorie", "main_meals", "main_meals_calorie", "after_main_meals", "after_main_meals_calorie", "desserts", "desserts_calorie", "menu_date", "menu_price", "status", "updated_at"),
                    array($soup, $soup_calorie, $main_food, $main_food_calorie, $main_food_2, $main_food_2_calorie, $desserts, $desserts_calorie, $menu_date, $menu_price, $menu_status, $update_at), "id=" . $menu_id);


                if ($result):

                    $this->View->goster("admin/pages/menus",
                        array(
                            "info" => $this->Bilgi->basarili("GÜNCELLEME BAŞARILI", "/admin/menus", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/menus",
                        array(
                            "info" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/admin/menus", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/menus");


        endif;

    } // Menus Update POST

    function MenuInsert()
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        $this->View->goster("admin/pages/menus", array(
            "menuInsert" => true
        ));
    } // Menus Insert GET

    function menuInsertPost()
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        if ($_POST) :

            $soup = $this->Form->get("soup")->bosmu();
            $soup_calorie = $this->Form->get("soup_calorie")->bosmu();
            $main_food = $this->Form->get("main_food")->bosmu();
            $main_food_calorie = $this->Form->get("main_food_calorie")->bosmu();
            $main_food_2 = $this->Form->get("main_food_2")->bosmu();
            $main_food_2_calorie = $this->Form->get("main_food_2_calorie")->bosmu();
            $desserts = $this->Form->get("desserts")->bosmu();
            $desserts_calorie = $this->Form->get("desserts_calorie")->bosmu();
            $menu_date = $this->Form->get("menu_date")->bosmu();
            $menu_price = $this->Form->get("menu_price")->bosmu();

            $year = substr($menu_date, 0, 4);
            $month = substr($menu_date, 5, 2);
            $day = substr($menu_date, 8, 2);

            $endMenuDate = $day . "-" . $month . "-" . $year;
            $created_at = date("d-m-Y");
            $updated_at = date("d-m-Y");


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/menus",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/menus", 2)
                    ));

            else:


                $result = $this->model->Insert("menu",
                    array("soups", "soups_calorie", "main_meals", "main_meals_calorie", "after_main_meals", "after_main_meals_calorie", "desserts", "desserts_calorie", "menu_date", "menu_price", "created_at", "updated_at"),
                    array($soup, $soup_calorie, $main_food, $main_food_calorie, $main_food_2, $main_food_2_calorie, $desserts, $desserts_calorie, $endMenuDate, $menu_price, $created_at, $updated_at));


                if ($result):

                    $this->View->goster("admin/pages/menus",
                        array(
                            "info" => $this->Bilgi->basarili("EKLEME BAŞARILI", "/admin/menus", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/menus",
                        array(
                            "info" => $this->Bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.", "/admin/menus", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/menus");


        endif;

    } // Menus Insert POST


    //---------------------Menus--------------------------


    //---------------------System Settings--------------------------

    function systemSettings()
    {
        $this->authorityControl->LookAtYourAuthority("system_management");
        $this->View->goster("admin/pages/system_settings", array(
            "systemSetting" => $this->model->Select("settings", false)
        ));

    } //System Settings Coming


    function systemSettingsUpdate()
    {
        $this->authorityControl->LookAtYourAuthority("system_management");
        if ($_POST) :

            $video_link = $this->Form->get("video_link")->bosmu();
            $title = $this->Form->get("title")->bosmu();
            $description = $this->Form->get("description")->bosmu();
            $keywords = $this->Form->get("keywords")->bosmu();
            $setting_id = $this->Form->get("setting_id")->bosmu();


            if ($this->Upload->uploadPostAl("front_logo")) : $this->Upload->UploadDosyaKontrol("front_logo"); endif;

            if ($this->Upload->uploadPostAl("banner")) : $this->Upload->UploadDosyaKontrol("banner"); endif;

            if ($this->Upload->uploadPostAl("footer_img")) : $this->Upload->UploadDosyaKontrol("footer_img"); endif;

            if ($this->Upload->uploadPostAl("footer_logo")) : $this->Upload->UploadDosyaKontrol("footer_logo"); endif;

            if ($this->Upload->uploadPostAl("icon")) : $this->Upload->UploadDosyaKontrol("icon"); endif;


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/system_settings",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/systemSettings", 2)
                    ));

            elseif (!empty($this->Upload->error)) :

                $this->View->goster("admin/pages/system_settings",
                    array(
                        "info" => $this->Upload->error,
                        "yonlen" => $this->Bilgi->sureliYonlen(3, "/admin/systemSettings")
                    ));


            else:

                $sutunlar = array("video_link", "title", "description", "keywords");

                $veriler = array($video_link, $title, $description, $keywords);


                if ($this->Upload->uploadPostAl("front_logo")) :
                    $sutunlar[] = "front_logo";
                    $veriler[] = $this->Upload->Yukle("front_logo", true, RESİMYOL);
                endif;

                if ($this->Upload->uploadPostAl("banner")) :
                    $sutunlar[] = "banner";
                    $veriler[] = $this->Upload->Yukle("banner", true, RESİMYOL);
                endif;
                if ($this->Upload->uploadPostAl("footer_img")) :
                    $sutunlar[] = "footer_img";
                    $veriler[] = $this->Upload->Yukle("footer_img", true, RESİMYOL);
                endif;
                if ($this->Upload->uploadPostAl("footer_logo")) :
                    $sutunlar[] = "footer_logo";
                    $veriler[] = $this->Upload->Yukle("footer_logo", true, RESİMYOL);
                endif;
                if ($this->Upload->uploadPostAl("icon")) :
                    $sutunlar[] = "icon";
                    $veriler[] = $this->Upload->Yukle("icon", true, RESİMYOL);
                endif;


                $sonuc = $this->model->Update("settings",
                    $sutunlar,
                    $veriler, "id=" . $setting_id);


                if ($sonuc):

                    $this->View->goster("admin/pages/system_settings",
                        array(
                            "info" => $this->Bilgi->basarili("ÜRÜN BAŞARIYLA GÜNCELLENDİ", "/admin/systemSettings", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/system_settings",
                        array(
                            "info" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/admin/systemSettings", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/systemSettings");


        endif;


    } //System Settings Update POST

    //---------------------System Settings--------------------------


    //---------------------Contact--------------------------

    function Contact()
    {
        $this->authorityControl->LookAtYourAuthority("system_management");
        $this->View->goster("admin/pages/contact", array(
            "contact" => $this->model->Select("contact", false)
        ));

    } //Contact  Coming

    function contactUpdate()
    {
        $this->authorityControl->LookAtYourAuthority("system_management");
        if ($_POST) :

            $address = $this->Form->get("address")->bosmu();
            $email = $this->Form->get("email")->bosmu();
            $phone = $this->Form->get("phone")->bosmu();
            $fax = $this->Form->get("fax")->bosmu();
            $facebook_url = $this->Form->get("facebook_url")->bosmu();
            $twitter_url = $this->Form->get("twitter_url")->bosmu();
            $ios_url = $this->Form->get("ios_url")->bosmu();
            $android_url = $this->Form->get("android_url")->bosmu();
            $instagram_url = $this->Form->get("instagram_url")->bosmu();
            $youtube_url = $this->Form->get("youtube_url")->bosmu();
            $contact_id = $this->Form->get("contact_id")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/contact",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/Contact", 2)
                    ));

            else:


                $result = $this->model->Update("contact",
                    array("address", "email", "phone", "fax", "facebook_url", "twitter_url", "ios_url", "android_url", "instagram_url", "youtube_url"),
                    array($address, $email, $phone, $fax, $facebook_url, $twitter_url, $ios_url, $android_url, $instagram_url, $youtube_url), "id=" . $contact_id);


                if ($result):

                    $this->View->goster("admin/pages/contact",
                        array(
                            "info" => $this->Bilgi->basarili("GÜNCELLEME BAŞARILI", "/admin/Contact", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/contact",
                        array(
                            "info" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/admin/Contact", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/Contact");


        endif;

    } // Contact Update POST

    //---------------------Contact--------------------------


    //---------------------Refectories--------------------------
    function refectories()
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        $this->View->goster("admin/pages/refectory", array(
            "refectory" => $this->model->Select("refectory_places", false)
        ));

    } //Refectories  Coming

    function RefectoriesDelete($id)
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        $result = $this->model->Delete("refectory_places", "id=" . $id);

        if ($result):

            $this->View->goster("admin/pages/refectory",
                array(
                    "info" => $this->Bilgi->basarili("SİLME BAŞARILI", "/admin/refectory", 1)

                ));

        else:
            $this->View->goster("admin/pages/refectory",
                array(
                    "info" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU!", "/admin/refectory", 1)

                ));
        endif;
    }// Refectory Delete

    function RefectoriesUpdate($id)
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        $this->View->goster("admin/pages/refectory", array(
            "refectoriesUpdate" => $this->model->Select("refectory_places", "where id=" . $id)
        ));
    } // Refectory Update GET

    function RefectoriesUpdatePost()
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        if ($_POST) :

            $refectory_place = $this->Form->get("refectory_place")->bosmu();

            $refectory_status = $_POST["refectory_status"];
            $refectory_id = $this->Form->get("refectory_id")->bosmu();
            $refectory_updated_at = date("Y-m-d H:i:s");


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/refectory",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/refectory", 2)
                    ));

            else:


                $result = $this->model->Update("refectory_places",
                    array("place_name", "status", "updated_at"),
                    array($refectory_place, $refectory_status, $refectory_updated_at), "id=" . $refectory_id);


                if ($result):

                    $this->View->goster("admin/pages/refectory",
                        array(
                            "info" => $this->Bilgi->basarili("GÜNCELLEME BAŞARILI", "/admin/refectory", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/refectory",
                        array(
                            "info" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/admin/refectory", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/refectory");


        endif;

    } // Refectories Update POST

    function RefectoriesInsert()
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        $this->View->goster("admin/pages/refectory", array(
            "refectoriesInsert" => true
        ));
    } // Refectory Insert GET

    function RefectoriesInsertPost()
    {
        $this->authorityControl->LookAtYourAuthority("menu_management");
        if ($_POST) :

            $refectory_place = $this->Form->get("refectory_place")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/refectory",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/refectory", 2)
                    ));

            else:


                $result = $this->model->Insert("refectory_places",
                    array("place_name"),
                    array($refectory_place));


                if ($result):

                    $this->View->goster("admin/pages/refectory",
                        array(
                            "info" => $this->Bilgi->basarili("EKLEME BAŞARILI", "/admin/refectory", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/refectory",
                        array(
                            "info" => $this->Bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.", "/admin/refectory", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/refectory");


        endif;

    } // Refectories Insert POST

    //---------------------Refectories--------------------------


    //---------------------Sliders--------------------------

    function sliders()
    {
        $this->authorityControl->LookAtYourAuthority("design_management");
        $this->View->goster("admin/pages/sliders", array(
            "sliders" => $this->model->Select("refectory_slider", false)
        ));

    } //Sliders  Coming

    function SliderSortable()
    {
        print_r($_GET["orders"]);


    } //Slider Sortable

    function SlidersInsert()
    {
        $this->authorityControl->LookAtYourAuthority("design_management");
        $this->View->goster("admin/pages/sliders", array(
            "slidersInsert" => true
        ));
    } // Slider Insert GET

    function SlidersInsertPost()
    {
        $this->authorityControl->LookAtYourAuthority("design_management");
        $this->Upload->UploadResimYeniEkleme("res", 1);


        if (!empty($this->Form->error)) :

            $this->View->goster("admin/pages/sliders",
                array(
                    "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/sliders", 2)
                ));

        elseif (!empty($this->Upload->error)) :

            $this->View->goster("admin/pages/sliders",
                array(
                    "info" => $this->Bilgi->hata("Uzantı veya Resim Boyutu Hatası.", "/admin/sliders", 2)
                ));

        else:


            $dosyayukleme = $this->Upload->Yukle(false, false, SLİDERRESİMYOL);

            $sonuc = $this->model->Insert("refectory_slider",
                array("image_url"),
                array($dosyayukleme[0]));


            if ($sonuc):

                $this->View->goster("admin/pages/sliders",
                    array(
                        "info" => $this->Bilgi->basarili("ÜRÜN BAŞARIYLA EKLENDİ", "/admin/sliders", 2)
                    ));

            else:

                $this->View->goster("admin/pages/sliders",
                    array(
                        "info" => $this->Bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.", "/admin/sliders", 2)
                    ));

            endif;


        endif;


    }// Slider Insert POST

    function SlidersUpdate($id)
    {
        $this->authorityControl->LookAtYourAuthority("design_management");
        $this->View->goster("admin/pages/sliders", array(
            "slidersUpdate" => $this->model->Select("refectory_slider", "where id=" . $id)
        ));
    } // Slider Update GET

    function SlidersUpdatePost()
    {
        $this->authorityControl->LookAtYourAuthority("design_management");
        if ($_POST) :


            $slider_id = $this->Form->get("slider_id")->bosmu();
            if ($this->Upload->uploadPostAl("slider_img")) : $this->Upload->UploadDosyaKontrol("slider_img"); endif;


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/sliders",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/sliders", 2)
                    ));

            elseif (!empty($this->Upload->error)) :

                $this->View->goster("admin/pages/sliders",
                    array(
                        "info" => $this->Upload->error,
                        "yonlen" => $this->Bilgi->sureliYonlen(3, "/admin/sliders")
                    ));


            else:


                if ($this->Upload->uploadPostAl("slider_img")) :
                    $sutunlar[] = "image_url";
                    $veriler[] = $this->Upload->Yukle("slider_img", true, SLİDERRESİMYOL);
                endif;


                $sonuc = $this->model->Update("refectory_slider",
                    $sutunlar,
                    $veriler, "id=" . $slider_id);


                if ($sonuc):

                    $this->View->goster("admin/pages/sliders",
                        array(
                            "info" => $this->Bilgi->basarili("ÜRÜN BAŞARIYLA GÜNCELLENDİ", "/admin/sliders", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/sliders",
                        array(
                            "info" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/admin/sliders", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/sliders");


        endif;


    } //Slider Update POST

    function SlidersDelete($id)
    {
        $this->authorityControl->LookAtYourAuthority("design_management");
        $sonuc = $this->model->Delete("refectory_slider", "id=" . $id);


        if ($sonuc):

            $this->View->goster("admin/pages/sliders",
                array(
                    "info" => $this->Bilgi->basarili("SİLME BAŞARILI", "/admin/sliders", 2)
                ));

        else:

            $this->View->goster("admin/pages/sliders",
                array(
                    "info" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.", "/admin/sliders", 2)
                ));

        endif;
    }//Slider Delete
    //---------------------Sliders--------------------------


    //---------------------Design Management--------------------------
    function colorManagement()
    {
        $this->authorityControl->LookAtYourAuthority("design_management");
        $this->View->goster("admin/pages/color_management", array(
            "colorManagement" => $this->model->Select("color_management", false)
        ));

    } //Color Management  Coming

    function colorManagementPost()
    {
        $this->authorityControl->LookAtYourAuthority("design_management");
        if ($_POST) :


            $body_color = $this->Form->get("body_color")->bosmu();
            $theme_color = $this->Form->get("theme_color")->bosmu();
            $login_modal_color = $this->Form->get("login_modal_color")->bosmu();
            $login_btn = $this->Form->get("login_btn")->bosmu();
            $color_id = $this->Form->get("color_id")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/color_management",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/colorManagement", 2)
                    ));


            else:

                $result = $this->model->Update("color_management",
                    array("body_color", "theme_color", "login_modal_color", "login_btn"),
                    array($body_color, $theme_color, $login_modal_color, $login_btn), "id=" . $color_id);


                if ($result):

                    $this->View->goster("admin/pages/color_management",
                        array(
                            "info" => $this->Bilgi->basarili("RENKLER BAŞARIYLA GÜNCELLENDİ", "/admin/colorManagement", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/color_management",
                        array(
                            "info" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/admin/colorManagement", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/");


        endif;


    } //Color Management Update POST

    //---------------------Design Management--------------------------


    //---------------------systemMaintenance--------------------------

    function systemMaintenance()
    {
        $this->authorityControl->LookAtYourAuthority("system_maintenance");

        $this->View->goster("admin/pages/system_maintenance", array(
            "systemMaintenance" => true
        ));

    } //system Maintenance  Coming

    function systemMaintenancePost()
    {
        $this->authorityControl->LookAtYourAuthority("system_maintenance");
        if ($_POST["systemBtn"]) :


            $bakim = $this->model->Care(DBNAME);

            if ($bakim):

                $this->View->goster("admin/pages/system_maintenance",
                    array(
                        "info" => $this->Bilgi->basarili("BAKIM BAŞARIYLA YAPILDI.", "/admin/systemMaintenance", 2)
                    ));

            else:

                $this->View->goster("admin/pages/system_maintenance",
                    array(
                        "info" => $this->Bilgi->hata("BAKIM  SIRASINDA HATA OLUŞTU.", "/admin/systemMaintenance", 2)
                    ));

            endif;


        else:
            $this->Bilgi->direction("/admin/systemMaintenance");


        endif;

    } // Do Maintenance


    function sqlBackup()
    {
        $this->authorityControl->LookAtYourAuthority("sql_backup_management");

        $this->View->goster("admin/pages/sql_backup", array(
            "sqlBackup" => true
        ));

    } //SQL Backup  Coming

    function getSqlBackup($value)
    {
        $this->FileExport->SqlBackupDownload($value);

    } //SQL Pc Download

    function sqlBackupPost()
    {
        $this->authorityControl->LookAtYourAuthority("sql_backup_management");
        if ($_POST["systemBtn"]) :

            $backup = $this->model->SqlBackup(DBNAME);

            $sqlBackupPre = $this->Form->RadioButtonGet("sqlBackupPreference");
            if ($backup[0]):
                if ($sqlBackupPre == "local"):


                    $create = fopen(BACKUPPATH . date("d.m.Y") . ".sql", "w+");
                    fwrite($create, $backup[1]);
                    fclose($create);

                    $this->View->goster("admin/pages/sql_backup",
                        array(
                            "info" => $this->Bilgi->basarili("YEDEK BAŞARIYLA ALINDI.", "/admin/sqlBackup", 2)
                        ));


                else:
                    $this->getSqlBackup($backup[1]);
                endif;

            else:

                $this->View->goster("admin/pages/sql_backup",
                    array(
                        "info" => $this->Bilgi->hata("YEDEK ALMA SIRASINDA HATA OLUŞTU.", "/admin/sqlBackup", 2)
                    ));
            endif;


        else:
            $this->Bilgi->direction("/admin/sqlBackup");


        endif;

    } // Get Sql Backup


    //---------------------systemMaintenance--------------------------

    function Adminlogout()
    {

        Session::destroy();
        $this->Bilgi->direction("/admin/login");
    } // Admin Logout

    //---------------------Admin Password------------------------------

    function passwordChange()
    {
        $this->View->goster("admin/pages/password_change", array(
            "passwordChange" => Session::get("adminId")
        ));

    } //Admin Password  Form Get

    function passwordChangePost()
    {
        if ($_POST) :

            $mevcutsifre = $this->Form->get("current_password")->bosmu();
            $yen1 = $this->Form->get("new_password")->bosmu();
            $yen2 = $this->Form->get("repeat_new_password")->bosmu();
            $adminid = $this->Form->get("admin_id")->bosmu();
            $sifre = $this->Form->RepeatPassword($yen1, $yen2); // ŞİFRELİ YENİ HALİ ALIYORUM
            /*
            ÖNCE GELEN ŞFİREYİ SORGULAMAM LAZIM DOĞRUMU DİYE, EĞER MEVCUT ŞİFRE DOĞRU İSE
            DEVAM EDECEK HATALI İSE İŞLEM BİTECEK

            */

            $mevcutsifre = $this->Form->encoding($mevcutsifre);

            if (!empty($this->Form->error)) :
                $this->View->goster("admin/pages/password_change",
                    array(
                        "passwordChange" => Session::get("adminId"),
                        "info" => $this->Bilgi->hata("Girilen bilgiler hatalıdır.", "/admin/panel", 2)
                    ));

            else:


                $sonuc2 = $this->model->LoginControl("administrator", "username='" . Session::get("adminUsername") . "' and password='$mevcutsifre'");

                if ($sonuc2):

                    $sonuc = $this->model->Update("administrator",
                        array("password"),
                        array($sifre), "id=" . $adminid);

                    if ($sonuc):


                        $this->View->goster("admin/pages/password_change",
                            array(
                                "passwordChange" => Session::get("adminId"),
                                "info" => $this->Bilgi->basarili("ŞİFRE DEĞİŞTİRME BAŞARILI", "/admin/panel", 2)
                            ));


                    else:

                        $this->View->goster("admin/pages/password_change",
                            array(
                                "passwordChange" => Session::get("adminId"),
                                "info" => $this->Bilgi->hata("Şifre değiştirme sırasında hata oluştu.", "/admin/panel", 2)
                            ));

                    endif;

                else:


                    $this->View->goster("admin/pages/password_change",
                        array(
                            "passwordChange" => Session::get("adminId"),
                            "info" => $this->Bilgi->hata("Mevcut şifre hatalıdır.", "/admin/panel", 2)
                        ));


                endif;

            endif;


        else:

            $this->Bilgi->direction("/");
        endif;


    }//Admin Password Update Post

    //---------------------Admin Password------------------------------


    //---------------------Admin User Management------------------------------
    function adminUserManagement()
    {
        $this->View->goster("admin/pages/admin_user_management", array(
            "adminUserManagement" => $this->model->Select("administrator", false)
        ));
    } // Admin User Coming

    function userAdminManagementDelete($id)
    {
        $sonuc = $this->model->Delete("administrator", "id=" . $id);


        if ($sonuc):

            $this->View->goster("admin/pages/admin_user_management",
                array(
                    "info" => $this->Bilgi->basarili("SİLME BAŞARILI", "/admin/adminUserManagement", 2)
                ));

        else:

            $this->View->goster("admin/pages/admin_user_management",
                array(
                    "info" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.", "/admin/adminUserManagement", 2)
                ));

        endif;
    } // Admin User Delete

    function adminUserManagementInsert()
    {
        $this->View->goster("admin/pages/admin_user_management", array(
            "adminUserManagementInsert" => true
        ));
    } // Admin User Insert Get

    function adminUserManagementInsertPost()
    {
        if ($_POST) :

            $admin_firstname = $this->Form->get("admin_firstname")->bosmu();
            $admin_lastname = $this->Form->get("admin_lastname")->bosmu();
            $admin_username = $this->Form->get("admin_username")->bosmu();
            $admin_password1 = $this->Form->get("admin_password")->bosmu();
            $admin_password2 = $this->Form->get("admin_repeat_username")->bosmu();
            $password = $this->Form->RepeatPassword($admin_password1, $admin_password2);

            //Checkbox
            $user_management = $this->Form->CheckboxGet("user_management");
            $appointment_management = $this->Form->CheckboxGet("appointment_management");
            $menu_management = $this->Form->CheckboxGet("menu_management");
            $refectory_info_management = $this->Form->CheckboxGet("refectory_info_management");
            $design_management = $this->Form->CheckboxGet("design_management");
            $admin_management = $this->Form->CheckboxGet("admin_management");
            $system_management = $this->Form->CheckboxGet("system_management");
            $system_maintenance = $this->Form->CheckboxGet("system_maintenance");
            $sql_backup_maintenance = $this->Form->CheckboxGet("sql_backup_management");


            if (!empty($this->Form->error)) :
                $this->View->goster("admin/pages/admin_user_management",
                    array(
                        "info" => $this->Bilgi->hata("Girilen bilgiler hatalıdır.", "/admin/adminUserManagement", 2)
                    ));

            else:

                $result = $this->model->Insert("administrator",
                    array("firstname", "lastname", "username", "password", "appointment_management","user_management", "menu_management", "refectory_info_management", "design_management", "admin_user_management", "system_management", "system_maintenance","sql_backup_management"),
                    array($admin_firstname, $admin_lastname, $admin_username, $password,$appointment_management, $user_management, $menu_management, $refectory_info_management, $design_management, $admin_management, $system_management, $system_maintenance,$sql_backup_maintenance));

                if ($result):


                    $this->View->goster("admin/pages/admin_user_management",
                        array(

                            "info" => $this->Bilgi->basarili("YÖNETİCİ EKLEME BAŞARILI", "/admin/adminUserManagement", 2)
                        ));


                else:

                    $this->View->goster("admin/pages/admin_user_management",
                        array(

                            "info" => $this->Bilgi->hata("Yönetici ekleme sırasında hata oluştu.", "/admin/adminUserManagement", 2)
                        ));

                endif;

            endif;
        else:
            $this->Bilgi->direction("/");
        endif;
    } // Admin User Insert Get

    function adminUserManagementUpdate($id)
    {
        $this->View->goster("admin/pages/admin_user_management", array(
            "adminUserManagementUpdate" => $this->model->Select("administrator", "where id=" . $id)
        ));
    } // Admin User Update Get

    function adminUserManagementUpdatePost()
    {
        if ($_POST) :

            $admin_firstname = $this->Form->get("admin_firstname")->bosmu();
            $admin_lastname = $this->Form->get("admin_lastname")->bosmu();
            $admin_username = $this->Form->get("admin_username")->bosmu();
            $admin_id = $this->Form->get("admin_id")->bosmu();

            //Checkbox
            $user_management = $this->Form->CheckboxGet("user_management");
            $appointment_management = $this->Form->CheckboxGet("appointment_management");
            $menu_management = $this->Form->CheckboxGet("menu_management");
            $refectory_info_management = $this->Form->CheckboxGet("refectory_info_management");
            $design_management = $this->Form->CheckboxGet("design_management");
            $admin_management = $this->Form->CheckboxGet("admin_management");
            $system_management = $this->Form->CheckboxGet("system_management");
            $system_maintenance = $this->Form->CheckboxGet("system_maintenance");
            $sql_backup_management = $this->Form->CheckboxGet("sql_backup_management");



            if (!empty($this->Form->error)) :
                $this->View->goster("admin/pages/admin_user_management",
                    array(
                        "info" => $this->Bilgi->hata("Girilen bilgiler hatalıdır.", "/admin/adminUserManagement", 2)
                    ));

            else:

                $result = $this->model->Update("administrator",
                    array("firstname", "lastname", "username", "appointment_management","user_management", "menu_management", "refectory_info_management", "design_management", "admin_user_management", "system_management", "system_maintenance", "sql_backup_management"),
                    array($admin_firstname, $admin_lastname, $admin_username, $appointment_management,$user_management, $menu_management, $refectory_info_management, $design_management, $admin_management, $system_management, $system_maintenance, $sql_backup_management), "id=" . $admin_id);

                if ($result):


                    $this->View->goster("admin/pages/admin_user_management",
                        array(

                            "info" => $this->Bilgi->basarili("YÖNETİCİ GÜNCELLEME BAŞARILI", "/admin/adminUserManagement", 2)
                        ));


                else:

                    $this->View->goster("admin/pages/admin_user_management",
                        array(

                            "info" => $this->Bilgi->hata("Yönetici güncelleme sırasında hata oluştu.", "/admin/adminUserManagement", 2)
                        ));

                endif;

            endif;
        else:
            $this->Bilgi->direction("/");
        endif;
    } // Admin User Update POST


    //---------------------Admin User Management------------------------------


    //---------------------Refectory Important Info------------------------------

    function refectoryInfo()
    {
        $this->View->goster("admin/pages/refectory_info", array(
            "refectory_info" => $this->model->Select("refectory_info", false)
        ));
    } // Refectory Info Coming

    function refectoryInfoDelete($id)
    {
        $sonuc = $this->model->Delete("refectory_info", "id=" . $id);


        if ($sonuc):

            $this->View->goster("admin/pages/refectory_info",
                array(
                    "info" => $this->Bilgi->basarili("SİLME BAŞARILI", "/admin/refectoryInfo", 2)
                ));

        else:

            $this->View->goster("admin/pages/refectory_info",
                array(
                    "info" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.", "/admin/refectoryInfo", 2)
                ));

        endif;
    } // Refectory Info Delete

    function refectoryInfoUpdate($id)
    {
        $this->View->goster("admin/pages/refectory_info", array(
            "refectoryInfoUpdate" => $this->model->Select("refectory_info", "where id=" . $id)
        ));
    } // Refectory Info Update GET

    function refectoryInfoUpdatePost()
    {
        if ($_POST) :

            $cardInfo = $_POST["cardInfo"];

            $refectoryInfo_id = $this->Form->get("refectoryInfo_id")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/refectory_info",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/refectoryInfo", 2)
                    ));

            else:


                $result = $this->model->Update("refectory_info",
                    array("card"),
                    array($cardInfo), "id=" . $refectoryInfo_id);


                if ($result):

                    $this->View->goster("admin/pages/refectory_info",
                        array(
                            "info" => $this->Bilgi->basarili("GÜNCELLEME BAŞARILI", "/admin/refectoryInfo", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/refectory_info",
                        array(
                            "info" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/admin/refectoryInfo", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/refectoryInfo");


        endif;

    } //Refectory Info Update POST

    function refectoryInfoInsert()
    {
        $this->View->goster("admin/pages/refectory_info", array(
            "refectoryInfoInsert" => true
        ));
    } // Refectory Info Insert GET

    function refectoryInfoInsertPost()
    {
        if ($_POST) :

            $cardInfo = $_POST["cardInfo"];


            if (!empty($this->Form->error)) :

                $this->View->goster("admin/pages/refectory_info",
                    array(
                        "info" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/admin/refectoryInfo", 2)
                    ));

            else:


                $result = $this->model->Insert("refectory_info",
                    array("card"),
                    array($cardInfo));


                if ($result):

                    $this->View->goster("admin/pages/refectory_info",
                        array(
                            "info" => $this->Bilgi->basarili("EKLEME BAŞARILI", "/admin/refectoryInfo", 2)
                        ));

                else:

                    $this->View->goster("admin/pages/refectory_info",
                        array(
                            "info" => $this->Bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.", "/admin/refectoryInfo", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direction("/admin/refectoryInfo");


        endif;

    } //Refectory Info Insert POST

    //---------------------Refectory Important Info------------------------------
}


?>
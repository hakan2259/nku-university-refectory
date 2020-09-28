<?php

class GeneralTask extends Controller
{


    function __construct()
    {
        parent::UploadLibrary(array("Bilgi"));

        $this->Modelyukle('GeneralTask');
        Session::init();
    }


    function Add()
    {
        if ($_POST):
            Cookie::Add($_POST["menu_id"], $_POST["r_place"]);
        endif;
    }

    function Delete()
    {
        if ($_POST):
            Cookie::Delete($_POST["menu_id"]);
        endif;
    }

    function Update()
    {
        if ($_POST):
            Cookie::Update($_POST["menu_id"], $_POST["r_place"]);
        endif;
    }

    function EmptyBasket()
    {
        $this->Bilgi->direction("/user/basket");
        Cookie::EmptyBasket();

    }

    function BasketControl()
    {
        if (isset($_COOKIE["meal"])):
           echo count($_COOKIE["meal"]);
        endif;
    }


}


?>
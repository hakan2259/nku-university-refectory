<?php

class Bilgi
{

    function basarili($deger,$yol,$sure=3) {


        return '<div class="alert alert-success mt-5 text-center">'.$deger.'</div>'
            . header("Refresh:".$sure."; url=".URL.$yol);
    }

    function hata($deger=false,$yol,$sure=3) {


        return '<div class="alert alert-danger mt-5 text-center">'.$deger.'</div>'
            . header("Refresh:".$sure."; url=".URL.$yol);
    }

    function sureliYonlen($zaman,$yol) {


        return  header("Refresh:".$zaman."; url=".URL.$yol);
    }



    function warning($type = "danger", $text)
    {


        return '<div class="alert alert-' . $type . ' mt-2 p-2">' . $text . '</div>';
    }


    function direction($path)
    {

        return header("Location:" . URL . $path);
    }

    function SweetAlert($adres,$baslik,$metin,$durum){
        return '<script> BilgiPenceresi("'.$adres.'","'.$baslik.'","'.$metin.'","'.$durum.'")</script>';

    }

}


?>
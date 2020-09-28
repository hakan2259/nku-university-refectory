<?php

class Form extends Bilgi
{

    public $deger, $veri;
    public $error = array();


    function get($key, $tercih = false)
    {

        if ($tercih):
            $this->veri = htmlspecialchars(strip_tags($_POST[$key]));
            return $this->veri;
        else:

            $this->deger = $key;


            $this->veri = htmlspecialchars(strip_tags($_POST[$key]));

            return $this;
        endif;


    }

    function CheckboxGet($key)
    {
        if (!isset($_POST[$key])):
            return 0;
        else:
            if ($_POST[$key] == "on"):
                return 1;

            endif;
        endif;


    }

    function RadioButtonGet($key)
    {
        return $_POST[$key];
    }

    function bosmu()
    {


        if (empty($this->veri)) :
            $this->error[] = $this->deger . " boş olamaz";


            return $this;

        else:

            return $this->veri;


        endif;

    }


    function encoding($data)
    {
        return base64_encode(gzdeflate(gzcompress(serialize($data))));
    }

    function decoding($data)
    {
        return unserialize(gzuncompress(gzinflate(base64_decode($data))));
    }

    function RepeatPassword($value1, $value2)
    {

        if ($value1 != $value2) :

            $this->error[] = "Girilen şifreler uyumsuz";


        else:

            return $this->encoding($value1);

        endif;


    } // şifreler uyuşuyor mu


    public static function Olustur($kriter, array $veri = NULL, $textmetin = false, $check = false)
    {

        /*
        1 form
        2 input
        3 textarea

        */
        switch ($kriter):

            case "1":
                echo '<form ';
                break;
            case "2":
                echo '<input ';
                break;
            case "3":
                echo '<textarea ';
                break;
            case "kapat":
                echo '</form> ';
                break;
        endswitch;


        if (isset($veri)) :


            foreach ($veri as $anahtar => $deger) :

                echo $anahtar . "='" . $deger . "' ";

            endforeach;

            if (isset($check)):
                echo $check;
            endif;

            echo ($kriter == 3) ? '>' . $textmetin . '</textarea>' : '>'; // ternay tek satır sorgu

        endif;


        /* 2.YÖNTEM

        // "method@POST",
        echo '<form ';

        foreach ($veri as  $deger) :

        $bol=explode("@",$deger);
        // $bol

        echo $bol[0]."='".$bol[1]."' ";


        endforeach;

        echo '>';

    */
    }

    public static function OlusturSelect($kriter, array $veri = NULL)
    {

        if ($kriter == 1) :

            echo '<select ';


            foreach ($veri as $anahtar => $deger) :

                echo $anahtar . "='" . $deger . "' ";

            endforeach;


            echo '>';

        elseif ($kriter == 2):


            echo '</select>';

        endif;


    }

    public static function OlusturOption(array $option = NULL, $selected = false, $optionmetin)
    {

        echo '<option ';
        //  Form::OlusturOption(array("value"=>0),"Tedarik");


        foreach ($option as $anahtar => $deger) :

            echo $anahtar . "='" . $deger . "' " . $selected . " ";

        endforeach;
        echo "> " . $optionmetin . "</option>";


    }


}


?>
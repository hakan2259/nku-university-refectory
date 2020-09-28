<?php

class  Cookie
{
    public static function Add($id, $rplace)
    {
        setcookie('meal[' . $id . ']', $rplace, time() + 60 * 60 * 24, "/");


    }

    public static function Look()
    {
        if (isset($_COOKIE["meal"])):
            foreach ($_COOKIE["meal"] as $id => $rplace):
                echo "food id: " . $id . "Yemekhane :" . $rplace . "<br>";
            endforeach;
         else:
             //eğerki öğün yok ise uyarı döndürebilir.
            return false;
        endif;

    }

    public static function Delete($id)
    {
        if (isset($_COOKIE["meal"])):

            setcookie('meal[' . $id . ']', false, time()-2, "/");

        endif;

    }


    public static function Update($id,$rplace)
    {
        if (isset($_COOKIE["meal"])):

            setcookie('meal[' . $id . ']', $rplace, time() + 60 * 60 * 24, "/");

        endif;

    }

    public static function EmptyBasket()
    {
        if (isset($_COOKIE["meal"])):
            foreach ($_COOKIE["meal"] as $id => $rplace):
                setcookie('meal[' . $id . ']', $rplace, time()-2, "/");
            endforeach;

        endif;

        if (!isset($_COOKIE["meal"])):
            //SEPET BŞALINCA BURASI DÖNECEK
                return true;
            endif;

    }



}

?>
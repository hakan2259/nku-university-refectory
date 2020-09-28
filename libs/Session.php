<?php

class  Session
{
    public static $db;

    public static function init()
    {
        self::$db = new Database();
        session_start();


    }


    public static function set($key, $value)
    {


        $_SESSION[$key] = $value;


    }

    public static function get($key)
    {

        if (isset($_SESSION[$key]))

            return $_SESSION[$key];

    }

    public static function destroy()
    {

        session_destroy();


    }

    public static function SignInControl($tableName,$value1, $value2)
    {

        $result = self::$db->listele($tableName, "where username='" . $value1 . "' and id=" . $value2);

        if (!isset($result[0])):
            self::destroy();
        endif;


    }


}


?>
<?php


class ExternalFunctions extends Model
{



    function __construct()
    {
        parent::__construct();



    }

    function GetUserInfo(){
        return $this->db->listele("users", "where id=" . Session::get("userId"));

    }
    function GetMenu($id){
        return $this->db->listele("menu", "where id=" . $id);
    }


}
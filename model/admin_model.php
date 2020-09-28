<?php

class admin_model extends Model
{

    public $titles, $contents;

    function __construct()
    {
        parent:: __construct();
    }
    function TopluislemBaslat() {
        return $this->db->beginTransaction();

    }

    function TopluislemTamamla() {
        return $this->db->commit();
    }

    function İslemlerigerial() {
        return $this->db->rollBack();
    }

    function Select($tablename, $conditional)
    {
        return $this->db->listele($tablename, $conditional);
    }

    function Delete($tablename, $conditional)
    {
        return $this->db->sil($tablename, $conditional);
    }

    function Update($tablename, $columns, $datas, $conditional)
    {
        return $this->db->guncelle($tablename, $columns, $datas, $conditional);

    }
    function Arama($tabloisim,$kosul) {


        return $this->db->arama($tabloisim,$kosul);
    }

    function SipesifikVerial($tabloisim) {

        return $this->db->sipesifiklistele($tabloisim);

    }

    function toplamRandevu($tableName){
        return $this->db->appointmentTotal($tableName);
    }

    function Insert($tablename, $column, $datas)
    {
        return $this->db->Ekle($tablename, $column, $datas);
    }

    function InsertAll($tablename, $column, $datas)
    {
        return $this->db->TopluEkle($tablename, $column, $datas);
    }

    function Care($value)
    {
        return $this->db->sistembakim($value);

    }
    function SQlBackup($value)
    {
        return $this->db->sqlbackup($value);

    }

    function LoginControl($tablename, $condition)
    {

        return $this->db->giriskontrol($tablename, $condition);

    }

    function GetExcelSetting($tablename, $conditional, $type)
    {
        switch ($type):

            case 'users':
                foreach ($this->db->listele($tablename, $conditional) as $values):

                    $this->contents[] = array($values["identity_number"],$values["school_number"],$values["firstname"], $values["lastname"], $values["username"], $values["email"]
                    , $values["phone"], $values["job_title"]);
                endforeach;

                break;

        endswitch;


    }


    function GetExcelSetting2($tablename)
    {

        $this->contents[] = $this->db->sipesifiklistele($tablename);


    }
}

?>
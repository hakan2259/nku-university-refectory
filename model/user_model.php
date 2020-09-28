<?php

class user_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}



    function LoginControl($tablename,$condition) {

        return $this->db->giriskontrol($tablename,$condition);

    }
    function Select($tablename, $conditional)
    {
        return $this->db->listele($tablename, $conditional);
    }


    function TopluislemBaslat() {
        return $this->db->beginTransaction();

    }
    function SiparisTamamlama($veriler) {

        return $this->db->siparisTamamla($veriler);

    } // SİPARİŞ TAMAMLAMA

    function TopluislemTamamla() {
        return $this->db->commit();
    }

    function İslemlerigerial() {
        return $this->db->rollBack();
    }


	

	
	
	

	
	

	
}




?>
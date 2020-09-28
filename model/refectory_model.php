<?php

class refectory_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}

	function contact($tablename){
		return $this->db->listele($tablename);
		
	 }

	 function slider($tablename){
		return $this->db->listele($tablename);
		
	 }
	 function cardInfo($tablename){
		return $this->db->listele($tablename);
		
	 }
	 
	

	
	
	

	
	

	
}




?>
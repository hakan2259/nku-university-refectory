<?php

class  Model  {
	
	
	function __construct() {		
		$this->db= new Database();
	}


	function setting(){
		return $this->db->listele("settings");
		
	 }
	
	
	
	
	

	
	

	
}




?>
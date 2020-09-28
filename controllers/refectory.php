<?php

class refectory extends Controller  {
	
	
	function __construct()
    {
        parent::UploadLibrary(array("View"));


        @Session::init();
    }


	function Index(){
        $this->Modelyukle('refectory');
        $this->View->goster("pages/index",array(
            "slider" => $this->model->slider("refectory_slider"),
            "card_info" => $this->model->cardInfo("refectory_info"),

        ));
    }

	
}



?>
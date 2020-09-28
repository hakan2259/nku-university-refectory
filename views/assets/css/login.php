<?php header("Content-type:text/css");

include_once ("../../../config/database.php");

class LoginColorManagement extends PDO{

    function __construct()
    {
        parent::__construct('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);


        $colors = $this->prepare("select * from color_management");
        $colors->execute();
        $datas = $colors->fetch();

        $this->bodyColor=$datas["body_color"];
        $this->loginModalColor = $datas["login_modal_color"];
        $this->loginBtn = $datas["login_btn"];



    }
}

$loginColors = new LoginColorManagement;
?>
@import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');
*{
    font-family: 'Lora', serif;

}
body{
    background-color: #<?=$loginColors->bodyColor ?>;
}
.main-section{
    margin: 0 auto;
    margin-top: 140px;
    padding: 0px;
}
.modal-content{
    background-color: #<?=$loginColors->loginModalColor ?>;
    opacity: .95;
    padding: 0 18px;
    box-shadow: 0px 0px 3px #3E3935;
}

.user-img{
    margin-top: -60px;
    margin-bottom: 35px;
}
.user-img img{
    height: 120px;
    width: 120px;
    box-shadow: 0px 0px 3px #3E3935;
    border-radius: 50%;
}
.form-group{
    margin-bottom: 25px;
}
.form-group input{
    height: 42px;
    border-radius: 5px;
    border: 0;
    font-size: 16px;
    padding-left: 40px;
}
.fa-user,.fa-lock{
   
    position: absolute;
    font-size: 22px;
    color: #555e60;
    left: 28px;
    padding-top: 10px;
}
button{
    width: 40%;
    margin: 5px 0 25px;
}
.btn{
    background-color: #<?=$loginColors->loginBtn ?>;
    color: #fff;
    font-size: 19px;
    padding: 7px 14px;
    border-radius: 5px;
   
}
.btn:hover, .btn:focus{
    color:#fff!important;
}
.fa-sign-in{
    margin-right: 7px;
}
.forgot{
    padding: 5px 0 25px;
}
.forgot a{
    color: #fff;
}
.footer-line{
    background-color: #fff;
    
}

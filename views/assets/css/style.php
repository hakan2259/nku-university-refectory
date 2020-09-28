<?php header("Content-type:text/css");
include_once ("../../../config/database.php");

class ColorManagement extends PDO{

    function __construct()
    {
        parent::__construct('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);


        $colors = $this->prepare("select * from color_management");
        $colors->execute();
        $datas = $colors->fetch();

        $this->bodyColor = $datas["body_color"];
        $this->themeColor = $datas["theme_color"];
        $this->loginModalColor = $datas["login_modal_color"];
        $this->loginBtn = $datas["login_btn"];


    }
}

$colorSs = new ColorManagement;


?>
@import url('https://fonts.googleapis.com/css2?family=Lora&display=swap');


*{
    font-family: 'Lora', serif!important;

}
body{
  background-color: #<?=$colorSs->bodyColor?>;
}
.navbar-color{
    background-color:#<?=$colorSs->themeColor?>;
    padding: 20px;
    
}
.navbar-brand{
    margin-left: -30px;
}
.multilanguage{
background-color: #<?=$colorSs->themeColor?>;
border: none;
color: white;
cursor: pointer;
width: 50px
}


.btn-icon{
    border: 1px solid #3E3935; 
    border-radius: 5px;
   
  
}
.btn-icon-img{
    width: 40px;
    height: 40px;
}
.btn-refectory-top{
    display: flex;
    flex-direction: column;
    display: none;
}
.btn-icon:hover{
    background-color: #3E3935;
}
.refectory-text{
    color: #fff;
}
.jumbotron{
   height: 525px;
   background-size: cover;
   
   background-position: center;
   color: #fff;
   margin-top: 100px;
   border-radius: 0px!important;

}

.jumbotron h1,h2{
    margin: 30px 0;
    font-size: 30px;
    line-height: 1.5;
    font-weight: bold;
    text-shadow: 5px 5px 10px #3E3935;
   
}
.jumbotron h2{

    font-size: 20px;

}

.jumbotron .btn-login{
    border: none;
    background-color: #<?=$colorSs->themeColor?>;
    color: #fff;
    width: 100px;
    padding: 10px;
    box-shadow: 5px 5px 10px #3E3935;
}

.overflow{
    position: absolute;
    top: 0;
    left: 0;
    height: 625px;
    width: 100%;
    background: rgba(62, 57, 53,.3);
}

.intro{
padding-top: 45px;
position: relative;
}




@media only screen and (max-width: 500px) {
    .refectory-text{
      display: none;
    }
    .btn-icon-img{
        width: 20px;
        height: 20px;
       
    }
    .btn-refectory-top{
        display: block;
        font-size:14px;
        
    }
    .btn-icon{
        float: right;
        margin-right: 18px;
    }
    

   
    
  }
  .video-header{
      text-shadow: none;
      font-weight: normal;
  }


  .banner_slider img{
    cursor: pointer;
  }
  .thumbnail_slider img{
    max-width: 100px;
  }
  .thumbnail_slider_area{
    width: 100%;
   
  }
  .thumbnail_slider img{
    border: 1px solid #3E3935;
    margin-left: 30px;
    cursor: pointer;
   
 
    
  
  }

  @media only screen and (max-width: 700px){
    .thumbnail_slider img{
      margin-left: 15px;
    }
  }


  .social-media-icon {
    padding: 10px;
    font-size: 15px;
    width: 50%;
    text-align: center;
    text-decoration: none;
    margin: 5px 2px;
    border-radius: 50%;
    cursor: pointer;
  }
  
  .social-media-icon:hover {
      opacity: 0.7;
  }
 
  .logo-facebook {
    background: #3B5998;
    color: white;
  }
  
  .logo-twitter {
    background: #55ACEE;
    color: white;
  }
  
  .logo-google {
    background: #dd4b39;
    color: white;
  }
  
  .logo-linkedin {
    background: #007bb5;
    color: white;
  }
  
  .logo-youtube {
    background: #bb0000;
    color: white;
  }
  
  .logo-instagram {
    background: #125688;
    color: white;
  }
  .logo-android {
    background: #a4c639;
    color: white;
  }
  .logo-apple{
    color: #fff;
    background-color: #959595;
    border: 1px solid #fff;
  }
  .footer-copyright{
    background-color: #3E3935;
    color: #979797;
  }
  .footer-copyright a{
 color: #979797;
  }
  .footer-copyright a:hover{
    color: #fff;
  }
.footer{
  background-color: #<?=$colorSs->themeColor?>;
  color: #fff;
  margin-bottom: -50px;
}
.footer-logo{
  text-align: center;
  
}
.footer-img img{
  width: 100%;
  border-radius: 50%;
  box-shadow:5px 5px 5px 5px rgba(0,0,0,0.30);

}



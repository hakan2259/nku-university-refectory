<?php
if (!Session::get("userId") == true && !Session::get("username")):
    Session::SignInControl("users",Session::get("username"),Session::get("userId"));
?>
<?php $settings= new Settings();  ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yemekhane | Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>/views/assets/css/login.php">

    <meta name="description" content="<?php echo $settings->description; ?>" />
    <meta name="keywords" content="<?php echo $settings->keywords; ?>" />
    <meta name="author" content="Hakan SANDAL" />
    <link rel="icon" href="<?php echo URL; ?>/views/assets/img/<?php echo $settings->icon; ?>" type="image/x-icon">

</head>

<body>
    <section>
        <div class="modal-dialog text-center">
            <div class="col-sm-10 main-section">
                <div class="modal-content">
                    <div class="col-12 user-img">
                      <img src="<?php echo URL; ?>/views/assets/img/NKULogoBeyaz.png">

                    </div>
                 <?php
                 if(isset($data["info"])):

                 echo $data["info"];
                 endif;
                 ?>
                    <form class="col-12" method="POST" action="<?php echo URL; ?>/user/loginControl">
                         <div class="form-group">
                             <i class="fa fa-user"></i>
                             <input type="text" class="form-control" placeholder="Kullanıcı Adı veya E-posta" name="username">
                         </div>
                         <div class="form-group">
                             <i class="fa fa-lock"></i>
                            <input type="password" class="form-control" placeholder="Şifre" name="password">
                        </div>
                         <div class="row">
                             <div class="col-5">
                                 <div class="form-group">
                                     <img src="<?php echo $data["source"]; ?>">
                                 </div>

                             </div>
                             <div class="col-7">

                                     <input type="text" class="form-control" name="security" style="height: 42px;background-color: #E9F1FE;">



                             </div>
                       
                         </div>
                      
                          
                        <input type="hidden" name="userToken" value="<?php echo $data["userToken"]; ?>"/>
                        <input type="hidden" name="loginType" value="user"/>
                        <button class="btn" type="submit"><i class="fa fa-sign-in"></i>Giriş</button>
                    
                        <div class="col-12 forgot">

                            <a href="https://sifre.nku.edu.tr/?islem=islemsecimi" target="_blank">Şifrenizi mi unuttunuz?</a>
                        </div>

                      
                    </form>
                 
                </div> <!---End of Modal Content-->
               
            
              
               
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
         
            &copy; 2019-2020 <a href="http://www.nku.edu.tr/" target="_blank" class="ml-2">Namık Kemal Üniversitesi</a>
        </div>
      
    </section>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
else:
    header("Location:".URL.'/reservation');
endif;
?>
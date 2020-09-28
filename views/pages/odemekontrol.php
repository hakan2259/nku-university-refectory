<?php   session_start(); ob_start();
	  require_once('config/config.php');



if (isset($_SESSION["userId"]) && isset($_SESSION["username"]) ) :
	Session::SignInControl("users", Session::get("username"), Session::get("userId"));



	$request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
				$request->setLocale(\Iyzipay\Model\Locale::TR);
				$request->setConversationId("123456789");
				$request->setToken($_POST['token']);
				$checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());

				if ($checkoutForm->getStatus()=="success" && $checkoutForm->getPaymentStatus()=="SUCCESS"):

							header("Location:http://localhost/university_refectory/user/orderCompleted/true");
				else:

							print_r($checkoutForm->getErrorMessage());
							header("Location:http://localhost/university_refectory/user/orderCompleted/false");

				endif;
					  
					  

else:
	// OTURUM KONTROLÜ YAPIYOR
	header("Location:http://localhost/university_refectory");
	
	endif;
	
	?>
	




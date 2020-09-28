<?php

    require_once('config/config.php');
    $ExternalFunctions = new ExternalFunctions();
    $result = $ExternalFunctions->GetUserInfo();


# create request class
    $request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
    $request->setLocale(\Iyzipay\Model\Locale::TR);
    $request->setConversationId("123456789");

    $request->setCurrency(\Iyzipay\Model\Currency::TL);
    $basketID = strtoupper(substr(md5(mt_rand(0, 999999999)), 0, 6));
    $request->setBasketId($basketID);
    $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
    $request->setCallbackUrl("http://localhost/university_refectory/user/buyingControl");
    $request->setEnabledInstallments(array(2, 3, 6, 9));

    $buyer = new \Iyzipay\Model\Buyer();
    $buyer->setId($result[0]["id"]);
    $buyer->setName($result[0]["firstname"]);
    $buyer->setSurname($result[0]["lastname"]);
    $buyer->setGsmNumber($result[0]["phone"]);
    $buyer->setEmail($result[0]["email"]);
    $buyer->setIdentityNumber($result[0]["identity_number"]);
    $buyer->setRegistrationAddress($result[0]["address"]);
    $buyer->setIp($_SERVER["REMOTE_ADDR"]);
    $buyer->setCity($result[0]["city"]);
    $buyer->setCountry($result[0]["country"]);
    $request->setBuyer($buyer);

    $shippingAddress = new \Iyzipay\Model\Address();
    $shippingAddress->setContactName($result[0]["firstname"] . " " . $result[0]["lastname"]);
    $shippingAddress->setCity($result[0]["city"]);
    $shippingAddress->setCountry($result[0]["country"]);
    $shippingAddress->setAddress($result[0]["address"]);
    $request->setShippingAddress($shippingAddress);

    $billingAddress = new \Iyzipay\Model\Address();
    $billingAddress->setContactName($result[0]["firstname"] . " " . $result[0]["lastname"]);
    $billingAddress->setCity($result[0]["city"]);
    $billingAddress->setCountry($result[0]["country"]);
    $billingAddress->setAddress($result[0]["address"]);
    $request->setBillingAddress($billingAddress);


if (Session::get("userId") && Session::get("username")):
    Session::SignInControl("users", Session::get("username"), Session::get("userId"));
    foreach ($_COOKIE["meal"] as $id => $r_place):


        $getMenu = $ExternalFunctions->GetMenu($id);
        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId($id);
        $firstBasketItem->setName("Unknown");
        $firstBasketItem->setCategory1("Unknown");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $basketItems[] = $firstBasketItem;
        $total[] = $getMenu[0]["menu_price"];
    endforeach;
    $total_price = array_sum($total);
    $firstBasketItem->setPrice($total_price);
    $request->setPrice($total_price);
    $request->setPaidPrice($total_price);
    $request->setBasketItems($basketItems);

# make request
    $checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

# print result
    if ($checkoutFormInitialize->getStatus() == "success"):
        print_r($checkoutFormInitialize->getCheckoutFormContent());
    else:
        $checkoutFormInitialize->getErrorMessage();
    endif;
else:
// OTURUM KONTROLÜ YAPIYOR
    header("Location:http://localhost/university_refectory");
endif;


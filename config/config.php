<?php

require_once(dirname(__DIR__).'/helper/sanalpos/IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey('sandbox-yN4yGvgZeehS1MsPjNAJc6Q13huxZsn5');
        $options->setSecretKey('sandbox-xk2if3IqmA4w7cdFZZQ2dNHQukzxYagp');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }
}
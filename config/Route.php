<?php

class Route
{
    protected $defaultController;
    protected $defaultMethod;

    protected $controller;
    protected $method;
    protected $parameters = array();


    function __construct()
    {
        include 'config/router.php';
        $this->defaultController = $route["controller"];
        $this->defaultMethod = $route["method"];
        $this->ParseURL();

        //Yüklemeler Yapılacak

        if (file_exists('controllers/' . $this->controller . '.php')):

            require_once('controllers/' . $this->controller . '.php');
            $this->controller = new $this->controller;

            if (method_exists($this->controller, $this->method)):

                call_user_func_array([$this->controller, $this->method], $this->parameters);
            else:
                $this->defaultLoad();
            endif;

        else:
            $this->defaultLoad();
        endif;

    }

    protected function ParseURL()
    {
        $url = isset($_GET["url"]) ? $_GET["url"] : null;
        $url = rtrim($url, '/');


        if (!empty($url)):
            $url = explode('/', $url);
            $this->controller = isset($url[0]) ? $url[0] : $this->defaultController;
            $this->method = isset($url[1]) ? $url[1] : $this->defaultMethod;
            unset($url[0], $url[1]);

            $this->parameters = !empty($url) ? array_values($url) : array();


        else:
            $this->controller = $this->defaultController;
            $this->method = $this->defaultMethod;
            $this->parameters = array();
        endif;

    }

    protected function defaultLoad()
    {
        require_once('controllers/' . $this->defaultController . '.php');
        $this->defaultController = new $this->defaultController;
        call_user_func_array([$this->defaultController, $this->defaultMethod], $this->parameters);
    }
}


?>
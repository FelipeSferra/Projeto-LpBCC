<?php

namespace app\core;

class Router
{
    private $uriEx;

    public function __construct()
    {
        $this->init();
        $this->execute();
    }

    private function init()
    {
        $uri = $_SERVER['REQUEST_URI'];

        $uri = str_replace("?", "/", $uri);

        $ex = explode("/", $uri);

        $ex = array_values(array_filter($ex));

        for ($i = 0; $i < UNSET_COUNT; $i++)
            unset($ex[$i]);
        $this->uriEx = ($ex = array_values(array_filter($ex)));
    }

    public function execute()
    {
        $class = "HomeController";
        $method = "index";

        if (isset($this->uriEx[0])) {
            $c = "app\\site\\controller\\" . ucfirst($this->uriEx[0]) . "Controller";
            if (class_exists($c)) {
                $class = ucfirst($this->uriEx[0]) . "Controller";
            }
        }
        if (isset($this->uriEx[1])) {
            if (method_exists($c, $this->uriEx[1])) {
                $method = $this->uriEx[1];
            }
        }

        $controller = "app\\site\\controller\\" . $class;

        call_user_func_array(
            [
                new $controller(),
                $method
            ],
            $this->GetParams()
        );
    }

    private function GetParams()
    {
        $p = [];

        if (count($this->uriEx) > 2) {
            for ($i = 2; $i < count($this->uriEx); $i++) {
                $p[] = $this->uriEx[$i];
            }
        }

        return $p;
    }
}

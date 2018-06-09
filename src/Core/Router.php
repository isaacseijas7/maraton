<?php

namespace App\Core;

class Router
{
    protected $type = null;
    protected $url = null;
    protected $controller = null;
    protected $method = null;
    protected $arguments = [];

    public function __construct()
    {
        //
    }

    public function __call($name, $arguments)
    {
        $this->type = strtoupper($name);
        $data = explode("@", $arguments[1]);
        $this->url = $arguments[0];
        $this->controller = $data[0];
        $this->method = $data[1];

        if ($this->checkUrlAndMethod()) {
            return;
        }

        return $this->callController();
    }

    private function checkUrlAndMethod()
    {
        return $_SERVER['REQUEST_METHOD'] != $this->type || $_SERVER['REQUEST_URI'] != $this->url;
    }

    protected function callController()
    {
        $class = '\\App\Controllers\\' . $this->controller;
        $controller = new $class();

        return $controller->{$this->method}();
    }
}
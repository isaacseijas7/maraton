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

    public function request_path()
    {
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($request_uri, $script_name);
        if (empty($parts))
        {
            return '/';
        }
        $path = implode('/', $parts);
        if (($position = strpos($path, '?')) !== FALSE)
        {
            $path = substr($path, 0, $position);
        }
        return '/'.$path;
    }

    private function checkUrlAndMethod()
    {
        return $_SERVER['REQUEST_METHOD'] != $this->type || $this->request_path() != $this->url;
    }

    protected function callController()
    {
        $class = '\\App\Controllers\\' . $this->controller;
        $controller = new $class();

        return $controller->{$this->method}();
    }
}
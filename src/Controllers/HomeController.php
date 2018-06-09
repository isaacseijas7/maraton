<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $user = "Carlos Fernandes";

        return view('index', compact('user'));
    }

    public function home()
    {
        $user = 'Desde home';

        return view('index', ['user' => $user]);
    }
}
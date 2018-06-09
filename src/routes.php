<?php

use App\Facades\Route;

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home');

Route::get('/users/{user}', 'HomeController@user');
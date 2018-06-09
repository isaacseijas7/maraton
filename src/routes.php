<?php

use App\Facades\Route;

Route::post('/', 'HomeController@me');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@home');


<?php

  use Illuminate\Support\Facades\Route;

  /*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
  */

  Route::get('/', function() {
    return view('welcome');
  });

  Route::get('/callback', function() {
    return "1) Сделать маршрут, который возвращает результат работы callback function;";
  });

  Route::get('/products', function() {
    return view('products');
    //2) сделать маршрут, который возвращает представление;
  });

  Route::get('product/{name?}', function($name = NULL) {
    return view('product', ["name" => $name]);
  });

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

  Route::get('/products', 'ProductController@index');
  Route::get('/products/{id}', 'ProductController@show');
  Route::get('/users', 'UsersController@index');
  Route::get('/about', function (){
    return view('about');
  });

  Route::view('/test', 'test');

  //  Route::get('/callback', function() {
  //    return "1) Сделать маршрут, который возвращает результат работы callback function;";
  //  });

  //  Route::get('/products', function() {
  //    return view('products');
  //    //2) сделать маршрут, который возвращает представление;
  //  });

  //  Route::get('product/{name?}', function($name = 1) {
  //    return view('product', ["name" => $name]);
  //  });

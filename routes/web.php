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

Route::get('/', function () {
  return view('welcome');
});

Route::get('tests', 'TestController@index');
Route::get('tests/{id}', 'TestController@show');

Route::get('users', 'UsersController@index');
Route::get('users/{id}', 'UsersController@show');
Route::get('about', function () {
  return view('about');
});

Route::view('/test', 'test');

/**
 * Routes for Dashboard
 */

Route::name('dashboard.')
  ->namespace('Dashboard')
  ->prefix('dashboard')
  ->group(function () {

    Route::get('/', 'DashboardController@index');


    Route::namespace('Tests')
      ->group(function () {
        Route::resource('tests', 'TestController');
      });

    Route::namespace('Questions')
      ->group(function () {
        Route::resource('questions', 'QuestionController')->shallow();
      });

    Route::namespace('Answers')
      ->group(function () {
        Route::resource('answers', 'AnswerController');
      });

    Route::resource('tests.questions', 'Questions\QuestionController');
  });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

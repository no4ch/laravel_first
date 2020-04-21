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

/**
 * Routes for tests
 */

Route::name('tests.')
  ->namespace('Tests')
  ->prefix('tests')
  ->group(function (){

    Route::get('/', 'TestController@index');

    Route::get('{id}', 'TestController@show')
      ->middleware('auth');
  });

/**
 * Routes for Dashboard
 */

Route::name('dashboard.')
  ->middleware(['auth', 'roles:admin'])
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

    Route::namespace('Files')
      ->group(function (){
        Route::resource('files', 'FileController');
      });

    Route::resource('tests.questions', 'Questions\QuestionController');
    Route::resource('questions.answers', 'Answers\AnswerController');

//    Route::get('files', 'Files\FileController@index')->name('files.index');
//    Route::post('files/upload', 'Files\FileController@upload')->name('files.upload');
  });

Auth::routes();
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider')->name('login.facebook');
Route::get('user/facebook', 'Auth\LoginController@handleProviderCallback');

/**
 * Routes for Spa
 */

Route::get('/about/{any}', 'SpaController@index')->where('any', '.*');

Route::post('/api/results', 'Api\ResultsController@checkResults');

//Route::get('test', function (){
//  return view('test');
//});

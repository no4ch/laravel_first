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

Route::get('/home', 'HomeController@index')->middleware(['auth']);
Route::post('/home', 'HomeController@saveGroup')->middleware(['auth', 'roles:admin|user']);

/**
 * Routes for tests
 */

Route::name('tests.')
    ->middleware([
        'auth', 'roles:student'
    ])
    ->namespace('Tests')
    ->prefix('tests')
    ->group(function () {

        Route::get('/', 'TestController@index');

        Route::get('{id}', 'TestController@show')->middleware('auth');
    });

Route::get('/profile', 'Users\UserController@index')->middleware('auth')->name('profile');
Route::patch('/profile', 'Users\UserController@update')->middleware('auth')->name('profile');

Route::get('/results', 'Users\Results\ResultController@index')->name('results');

/**
 * Routes for Dashboard
 */

Route::name('dashboard.')
    ->middleware([
        'auth', 'roles:admin'
    ])
    ->namespace('Dashboard')
    ->prefix('dashboard')
    ->group(function () {

        Route::get('/', 'DashboardController@index');

        Route::namespace('Tests')->group(function () {
                Route::resource('tests', 'TestController');
            });

        Route::namespace('Questions')->group(function () {
                Route::resource('questions', 'QuestionController')->shallow();
            });

        Route::namespace('Answers')->group(function () {
                Route::resource('answers', 'AnswerController');
            });

        Route::namespace('Files')->group(function () {
                Route::resource('files', 'FileController')->only(['index', 'update', 'edit']);
            });

        Route::namespace('Groups')->group(function () {
                Route::resource('groups', 'GroupController');
            });

        Route::namespace('AccessToTests')
            ->group(function () {
                Route::resource('access-to-tests', 'AccessToTestsController')->only(['index', 'create', 'store', 'destroy']);
            });

        Route::namespace('Results')
            ->group(function () {
                Route::resource('results', 'ResultController')->only(['index']);
            });

        Route::resource('tests.questions', 'Questions\QuestionController');
        Route::resource('questions.answers', 'Answers\AnswerController');

    });

Auth::routes();
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider')->name('login.facebook');
Route::get('user/facebook', 'Auth\LoginController@handleProviderCallback');

/**
 * Routes for Spa
 */

Route::get('/about/{any}', 'SpaController@index')->where('any', '.*');

Route::post('/api/results', 'Api\ResultsController@checkResults');

Route::get('test', function () {
    return view('test');
});



















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

// Route::get('/', function () {
//     return "asdasdasd";
// });

Auth::routes();

//Route::get('pages-404', 'NazoxController@index');
    Route::get('/', 'HomeController@root');
 //Route::get('{any}', 'HomeController@index');

// Route::get('index/{locale}', 'LocaleController@lang');
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/login/editor', 'Auth\LoginController@showWriterLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
    Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');


    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/login/editor', 'Auth\LoginController@editorLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
    Route::post('/register/writer', 'Auth\RegisterController@createWriter');

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

    Route::get('/', 'HomeController@root');
    //Route::get('{any}', 'HomeController@index');
    Route::group(['namespace' => 'Auth'],function(){
        Route::post('login', 'LoginController@attemptLogin');
        Route::post('logout', 'LoginController@attemptLogout');
    });

    //------------ Admin routes
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'],function(){
        Route::get('/', 'AdminController@index');
        Route::get('/dashboard', 'AdminController@index');
    });

    //------------ Editor routes
    Route::group(['prefix' => 'editor', 'namespace' => 'Editor', 'middleware' => 'auth:editor'],function(){
        Route::get('/', 'EditorController@index');
    });

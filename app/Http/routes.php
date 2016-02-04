<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'MainController@index');
    Route::get('/transporting/{id}', 'MainController@view')->name('transporting.view');


    Route::get('/dashboard', ['as' => 'dashboard.main', 'uses' => 'Dashboard\MainController@index']);
    Route::get('/dashboard/transporting', ['as' => 'dashboard.transporting.index', 'uses' => 'Dashboard\TransportingController@index']);
    Route::get('/dashboard/transporting/{id}', ['as' => 'dashboard.transporting.view', 'uses' => 'Dashboard\TransportingController@view']);

    Route::get('/dashboard/good/{id}', ['as' => 'dashboard.good.view', 'uses' => 'Dashboard\GoodController@view']);
});

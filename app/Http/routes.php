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

    // index -- список всех
    Route::get('/dashboard/transporting', ['as' => 'dashboard.transporting.index', 'uses' => 'Dashboard\TransportingController@index']);

    Route::get('/dashboard/transporting/create', ['as' => 'dashboard.transporting.create', 'uses' => 'Dashboard\TransportingController@create']);
    Route::post('/dashboard/transporting', ['as' => 'dashboard.transporting.store', 'uses' => 'Dashboard\TransportingController@store']);

    Route::get('/dashboard/transporting/{id}', ['as' => 'dashboard.transporting.view', 'uses' => 'Dashboard\TransportingController@view']);
    Route::post('/dashboard/transporting/{id}', ['as' => 'dashboard.transporting.update', 'uses' => 'Dashboard\TransportingController@update']);
    Route::get('/dashboard/transporting/{id}/delete', ['as' => 'dashboard.transporting.delete', 'uses' => 'Dashboard\TransportingController@destroy']);




    Route::get('/dashboard/transporting/{transportingId}/good', ['as' => 'dashboard.good.index', 'uses' => 'Dashboard\GoodController@index']);
    Route::get('/dashboard/transporting/{transportingId}/good/{id}', ['as' => 'dashboard.good.view', 'uses' => 'Dashboard\GoodController@view']);

});

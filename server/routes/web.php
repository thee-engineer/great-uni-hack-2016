<?php

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
    return redirect('/events');
});

Auth::routes();

Route::group(['prefix' => '/events'], function() {
  Route::get('/add', 'EventController@create')->middleware('auth');
  Route::post('/add', 'EventController@store')->middleware('auth');
  Route::get('/', 'EventController@index');
  Route::get('/{id}', 'EventController@show_get');
  Route::post('/{id}', 'EventController@show_post');
  Route::get('/edit/{id}', 'EventController@edit')->middleware('auth');
  Route::post('/edit/{id}', 'EventController@update')->middleware('auth');
});
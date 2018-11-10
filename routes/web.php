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
    return view('welcome');
});
Route::get('/entregas', 'EntregaController@index');
Route::get('/entregas/create', 'EntregaController@create');
Route::post('/entregas/store', 'EntregaController@store');
Route::get('/entregas/{id}/edit', 'EntregaController@edit');
Route::post('/entregas/{id}/update', 'EntregaController@update');
Route::get('/entregas/{id}/delete', 'EntregaController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

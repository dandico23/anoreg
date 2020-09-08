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

Auth::routes();

Route::get('/home', 'CartoriosController@index')->middleware('auth')->name('home');
Route::get('/cartorios/import', 'CartoriosController@importXml')->middleware('auth');
Route::post('/cartorios/import', 'CartoriosController@storeByXml')->middleware('auth');
Route::post('/cartorios/busca', 'CartoriosController@searchCartorio')->middleware('auth');
Route::resource('/cartorios', 'CartoriosController')->middleware('auth');

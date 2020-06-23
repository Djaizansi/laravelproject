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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/wall', 'WallController@index')->name('wall')->middleware('auth');
Route::post('/write', 'WallController@write')->name('write');
Route::get('/movie', 'MovieController@index')->name('movie')->middleware('auth');
Route::get('/seance', 'SeanceController@index')->name('seance')->middleware('auth');
Route::get('/seance/create', 'SeanceController@create')->name('create')->middleware('auth');
Route::post('/seance/create', 'SeanceController@add_seance')->name('add_seance')->middleware('auth');
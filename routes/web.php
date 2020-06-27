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

//Profile
Route::middleware ('auth', 'verified')->group (function () {
    Route::resource ('profile', 'ProfileController', [
        'only' => ['edit', 'update', 'destroy', 'show'],
        'parameters' => ['profile' => 'user']
    ]);
});

//Vehicule
Route::get('/voiture','VoitureController@index')->name('boutique')->middleware('auth');
Route::get('/voiture/show/{id}','VoitureController@show',function($id){ return $id; })->name('show')->middleware('auth');
Route::get('/voiture/update/{id}','VoitureController@showFormUpdate',function($id){ return $id; })->name('formUpdate')->middleware('auth');
Route::post('/voiture/update/{id}','VoitureController@update',function($id){ return $id; })->name('update')->middleware('auth');
Route::get('/voiture/create','VoitureController@showForm')->name('form')->middleware('auth');
Route::post('/voiture/create','VoitureController@store')->name('store');
Route::post('/voiture/delete/{id}','VoitureController@destroy',function($id){ return $id; })->name('delete')->middleware('auth');
Route::get('/panier','PanierController@index')->name('panier')->middleware('auth');
Route::get('/ajax','VoitureController@ajax')->name('ajax')->middleware('auth');


/* Route::get('/user/profile', 'UserController@index')->name('profile');
Route::post('/user/update', 'UserController@update')->name('editUser'); */
/* Route::get('/wall', 'WallController@index')->name('wall')->middleware('auth');
Route::post('/write', 'WallController@write')->name('write');
Route::get('/movie', 'MovieController@index')->name('movie')->middleware('auth');
Route::get('/seance', 'SeanceController@index')->name('seance')->middleware('auth');
Route::get('/seance/create', 'SeanceController@create')->name('create')->middleware('auth');
Route::post('/seance/create', 'SeanceController@add_seance')->name('add_seance')->middleware('auth'); */
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
Route::get('/voiture/update/{id}','VoitureController@showForm',function($id){ return $id; })->name('formUpdate')->middleware('auth');
Route::post('/voiture/update/{id}','VoitureController@update',function($id){ return $id; })->name('update')->middleware('auth');
Route::get('/voiture/create','VoitureController@showForm')->name('form')->middleware('auth');
Route::post('/voiture/create','VoitureController@store')->name('store');
Route::get('/voiture/delete/{id}','VoitureController@destroy',function($id){ return $id; })->name('delete')->middleware('auth');
/* Route::get('/panier','PanierController@index')->name('panier')->middleware('auth'); */
Route::get('/ajax','VoitureController@ajax')->name('ajax')->middleware('auth');

//Marque
Route::get('/marque','MarqueController@show')->name('showMarque')->middleware('auth');
Route::get('/marque/create','MarqueController@showForm')->name('formMarque')->middleware('auth');
Route::get('/marque/update/{id}','MarqueController@showForm',function($id){ return $id; })->name('formUpdateMarque')->middleware('auth');
Route::get('/marque/delete/{id}','MarqueController@destroy',function($id){ return $id; })->name('deleteMarque')->middleware('auth');
Route::post('/marque/update/{id}','MarqueController@update',function($id){ return $id; })->name('updateMarque')->middleware('auth');
Route::post('/marque/create','MarqueController@create')->name('createMarque')->middleware('auth');

//Modele
Route::get('/modele','ModeleController@show')->name('showModele')->middleware('auth');
Route::get('/modele/create','ModeleController@showForm')->name('formModele')->middleware('auth');
Route::get('/modele/update/{id}','ModeleController@showForm',function($id){ return $id; })->name('formUpdateModele')->middleware('auth');
Route::get('/modele/delete/{id}','ModeleController@destroy',function($id){ return $id; })->name('deleteModele')->middleware('auth');
Route::post('/modele/update/{id}','ModeleController@update',function($id){ return $id; })->name('updateModele')->middleware('auth');
Route::post('/modele/create','ModeleController@create')->name('createModele')->middleware('auth');

//Location
Route::get('/location/{id}','LocationController@showForm',function($id){ return $id; })->name('formLocation')->middleware('auth');
Route::post('/location/{id}','LocationController@create',function($id){ return $id; })->name('createLocation')->middleware('auth');
Route::get('/location','LocationController@show')->name('showLocation')->middleware('auth');
Route::get('/ajax/{id}','LocationController@ajax',function($id){ return $id; })->name('ajaxPrice')->middleware('auth');
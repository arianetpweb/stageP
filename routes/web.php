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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::group(['namespace'=>'\App\Http\Controllers'], function (){

 Route::get('/welcome', 'UsersController@index')->name('welcome');
 Route::get('/inscriptions', 'UsersController@sign')->name('inscriptions');
 Route::post('/register', 'UsersController@store')->name('post_register');
 Route::get('/acceuil', 'UsersController@create')->name('get_register');
 Route::post('/connexion', 'UsersController@connexion')->name('post_traitement');
 Route::post('/tache', 'UsersController@addtask')->name('add');

});

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
    Route::group(['middleware'=>'auth'], function (){
        Route::get('/', 'UsersController@index')->name('index');
        Route::post('/tasks', 'TaskController@addtask')->name('add_task');
        Route::put('/tasks/{id}', 'TaskController@updateTask')->name('update_task');
        Route::delete('/tasks/{id}', 'TaskController@deleteTask')->name('delete_task');
        Route::post('/logout', 'UsersController@logout')->name('post_logout');
    });

    Route::group(['middleware'=>'guest'], function (){
        Route::get('/login', 'UsersController@login')->name('get_login');
        Route::get('/register', 'UsersController@signup')->name('get_register');
        Route::post('/register', 'UsersController@register')->name('post_register');
        Route::post('/login', 'UsersController@authenticate')->name('post_login');

    });
});

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

Route::get('/movies', 'MovieController@index');
Route::get('/movies/sort/{sortby}', 'MovieController@sort');
Route::get('/movies/{title}', 'MovieController@search');
//Route::get('/movie/{id}', 'MovieController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('name-url',['middleware'=>'guest', 'uses'=>'MyController@myMethod']);

Route::group(['middleware'=>'web'], function(){
Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
	Route::resource('authors','AuthorsController');
});
});

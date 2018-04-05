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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'events'], function () {
    Route::get('/', 'EventController@index')->name('indexEvent');
    Route::get('show/{id}', 'EventController@show');
});

Route::group(['prefix'=>'news'], function (){
    Route::get('/','NewsController@index')->name('indexNews');
    Route::match(['get','post'],'create','NewsController@create');
    Route::match(['get', 'put'], 'update/{id}', 'NewsController@update');
    Route::get('show/{id}', 'NewsController@show');
    Route::delete('delete/{id}', 'NewsController@destroy');
    Route::get('readXML', 'NewsController@readXML');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
Route::group(['middleware' => 'browser'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('category', 'CategoryController')->except('index');

    Route::resource('post', 'PostController')->except('index');
});

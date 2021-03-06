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
    return view('site.index');
});*/

Auth::routes(['register'=>false]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@contactus')->name('contactus');
Route::post('/', ['as'=>'store','uses'=>'HomeController@store']);

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


Route::prefix('dashboard')
    ->name('dashboard.')
    ->namespace('Dashboard')
//    ->middleware(['auth', 'role:super_admin|admin'])
    ->group(function () {

        Route::get('', function () {
            return view('dashboard.home');
        })->name('index');

        Route::resource('users','UsersController')->except('show');

        Route::resource('categories', 'CategoriesController')->except('show');

        Route::resource('roles', 'RolesController')->except('show');

        Route::resource('ourteams', 'OurTeamsController')->except('show');

        Route::resource('meals','MealsController')->except('show');


        Route::resource('aboutus','AboutUsController')->only(['index','store']);



    });


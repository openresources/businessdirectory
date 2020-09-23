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

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::resource('sectors', 'SectorController');
Route::resource('sectors.businesses', 'Sector\BusinessController');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('welcome', 'auth.welcome');
    Route::resource('businesses', 'BusinessController');
});

Route::resource('search', 'SearchController')->only('index');

Route::view('/register/verify', 'auth.verify')->name('register.verify');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix(config('app.admin_prefix'))
    ->name('admin.')->group(function () {

        Route::middleware('auth')->group(function () {
                Route::get('/', 'DashboardController@index')->name('index');
        });
    });

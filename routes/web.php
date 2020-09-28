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
// Registror routes
Route::prefix('registror')->group(function(){
  Route::get('/', 'Users\Registror\RegistrorController@index')->name('registror.dashboard');
  Route::get('login', 'Auth\RegistrorLogin@showLoginForm')->name('registror.login');
  Route::post('login', 'Auth\RegistrorLogin@login')->name('registror.login.submit');
});

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
//student/candidate authentication
Auth::routes();
Route::get('login', 'CandidateController@signin')->name('login');
Route::post('login', 'Auth\StudentLogin@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'CandidateController@signin')->name('register');
Route::get('/home', 'HomeController@index')->name('home');
//Admin routes
// Admin routes
Route::prefix('admin')->group(function(){
    Route::get('/', 'Users\Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLogin@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLogin@login')->name('admin.login.submit');
});
// Registror routes
Route::prefix('registror')->group(function(){
  Route::get('/', 'Users\Registror\RegistrorController@index')->name('registror.dashboard');
  Route::get('applicants', 'Users\Registror\RegistrorController@applicants')->name('applicants');
  Route::get('students', 'Users\Registror\RegistrorController@students')->name('students');
  Route::get('marks', 'Users\Registror\RegistrorController@marks')->name('marks');
  Route::get('status', 'Users\Registror\RegistrorController@learning_status')->name('staus');
  Route::get('login', 'Auth\RegistrorLogin@showLoginForm')->name('registror.login');
  Route::post('login', 'Auth\RegistrorLogin@login')->name('registror.login.submit');
});
//Application routes
Route::prefix('application')->group(function(){
  Route::get('/','CandidateController@index')->name('student.application');
  Route::get('/signin','HomeController@index')->name('signin');
  Route::post('register', 'CandidateController@store')->name('create.account');
  Route::post('basicdata', 'ApplicationsController@addBasicData')->name('application.basicdata');
  Route::post('livingplace', 'ApplicationsController@addLivingPlace')->name('application.livingplace');
});




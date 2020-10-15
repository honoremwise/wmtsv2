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
    Route::post('admin.logout', 'Auth\AdminLogin@logout')->name('admin.logout');
    Route::post('/addrole', 'Users\Admin\AdminController@addRole')->name('admin.role');
    Route::post('/addschedule', 'Users\Admin\AdminController@addSchedule')->name('admin.schedule');
    Route::get('/adduser', 'Users\Admin\AdminController@addUser')->name('admin.user');
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
  Route::post('languages', 'ApplicationsController@addLanguages')->name('application.addlanguage');
  Route::post('education', 'ApplicationsController@addEducation')->name('application.addeducation');
  Route::post('religious', 'ApplicationsController@addReligous')->name('application.religious');
  Route::post('essay', 'ApplicationsController@addEssay')->name('application.essay');
  Route::post('biograph', 'ApplicationsController@addBiograph')->name('application.autobiograph');
  Route::post('photo', 'ApplicationsController@addPhoto')->name('document.photo');
  Route::post('diploma', 'ApplicationsController@addDiploma')->name('document.diploma');
  Route::post('degree', 'ApplicationsController@addDegree')->name('document.degree');
  Route::post('mastereducation', 'ApplicationsController@masterEducation')->name('master.education');
  Route::post('payment', 'ApplicationsController@addPayment')->name('document.payment');
  Route::post('nationaId', 'ApplicationsController@addNationalId')->name('document.nationaId');
  Route::post('recommendation', 'ApplicationsController@addRecommendation')->name('document.recommendationletter');
  Route::post('myapplication','ApplicationsController@submitApplication')->name('application.submit');
  Route::post('logout','ApplicationsController@logout')->name('application.logout');

});
//Admissions officer routes
Route::prefix('admissions')->group(function()
{
  Route::get('/','Users\Admissions\AdmissionController@index')->name('admissionofficer');
  Route::get('login','Auth\AdmissionLogin@showLoginForm')->name('admission.login');
  Route::post('login','Auth\AdmissionLogin@login')->name('authentication.check');
});

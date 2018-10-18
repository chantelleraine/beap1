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

Route::get('/', 'PagesController@index');
Route::get('/dashboard', 'PagesController@dashboard');
Route::get('/illustrations', 'PagesController@illustrations');

Route::resource('calamityposts', 'PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('student/login','StudentsAuth\StudentLoginController@showLoginForm')->name('student.login');
Route::post('student/login','StudentsAuth\StudentLoginController@login')->name('student.login.submit');
Route::post('student/logout','StudentsAuth\StudentLoginController@studentLogout')->name('student.logout');

Route::get('student/', 'StudentController@index')->name('student.dashboard');
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

Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/dashboard', 'HomeController@postlogin');
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout')->name('home.logout');
Route::get('/userprofile', 'HomeController@userprofile')->name('home.userprofile');
Route::post('/changepass', 'HomeController@changepass');
Route::get('/lienhe', 'HomeController@lienhe')->name('home.lienhe');



Route::get('/khambenh', 'KhamBenhController@index');
Route::get('/tuvan', 'TuVanController@index');
Route::get('/xetnghiem', 'XetNghiemController@index');
Route::get('/thuoc', 'ThuocController@index');
Route::get('/chandoanhinhanh', 'CDHAController@index');


Route::get('/admin', 'AdminController@index');
Route::get('/sendsms', 'AdminController@show_listsms');
Route::get('/custum', 'AdminController@custum');
Route::post('/custum', 'AdminController@custumedit');
Route::get('/listhopdong', 'AdminController@show_listSMS_json');
Route::get('/sendsms/benhnhan_byhopdong/{hopdong_id}', 'AdminController@show_benhnhan_byhopdong');
Route::post('/sendSmsContent', 'AdminController@sendSmsContent');
Route::any('{slug}','HomeController@login');

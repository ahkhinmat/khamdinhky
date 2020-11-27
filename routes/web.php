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
/* home */
Route::get('/', 'HomeController@index');
Route::get('/dashboard', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/dashboard', 'HomeController@postlogin');
Route::get('/login', 'HomeController@login');
Route::get('/logout', 'HomeController@logout');
/* home */

Route::get('/khambenh', 'KhamBenhController@index');
Route::get('/tuvan', 'TuVanController@index');
Route::get('/xetnghiem', 'XetNghiemController@index');
Route::get('/thuoc', 'ThuocController@index');
Route::get('/chandoanhinhanh', 'CDHAController@index');


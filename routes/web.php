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

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('user/edit', 'HomeController@editMember');
Route::post('/user/simpan', 'HomeController@uploadMember');
Route::put('/user/update', 'HomeController@updateMember');
Route::post('/register','Auth\RegisterController@regis');
Route::post('perusahaan/upload', 'PerusahaanController@uploadBerkas');
Route::resource('/perusahaan','PerusahaanController');
Route::resource('laporan', 'LaporanController');
Route::post('laporan/terpilih', 'LaporanController@laporan_terpilih');
Route::post('laporan/all', 'LaporanController@laporan_all');

Route::get('send',  'TelegramController@getSendMessage');
Route::post('send', 'TelegramController@postSendMessage');
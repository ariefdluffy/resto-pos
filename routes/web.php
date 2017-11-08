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
Route::post('/register','Auth\RegisterController@regis');
Route::post('/transaksi/subtotal', 'TransaksiController@SimpanTransaksi');
Route::put('/transaksi/{id}', 'TransaksiController@ProsesTransaksi');
Route::post('/transaksi/proses', 'TransaksiController@ProsesTransaksi');
Route::post('/kategori/simpankategori','KategoriController@SimpanKategori');
Route::post('/kategori/simpanrak','KategoriController@SimpanRak');
Route::resource('/produk','BarangController');
Route::resource('/transaksi','TransaksiController');

// Route::resource('laporan', 'LaporanController');
// Route::post('laporan/terpilih', 'LaporanController@laporan_terpilih');
// Route::post('laporan/all', 'LaporanController@laporan_all');

Route::get('send',  'TelegramController@getSendMessage');
Route::post('send', 'TelegramController@postSendMessage');
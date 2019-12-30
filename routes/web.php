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

Route::get('/', function () {

    return view('home');

});

Auth::routes();


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');

//kategori punya
Route::get('/kategori', 'KategoriController@index')                             ->name('kategori');
Route::post('/kategori', 'KategoriController@prosestambah')                     ->name('tambahkategori');
Route::get('/users/kategori/ubah/{KdKategori}', 'KategoriController@ubah')      ->name('ubahkategori');
Route::post('/kategori/prosesubahkategori', 'KategoriController@prosesubah')    ->name('prosesubahkategori');
Route::get('/users/kategori/delete/{KdKategori}', 'KategoriController@hapus');



// Pelanggan Punya
Route::get('/pelanggan', 'PelangganController@index')                           ->name('pelanggan');
Route::post('/pelanggan', 'PelangganController@prosestambah')                   ->name('tambahpelanggan');
Route::post('/pelanggan/prosesubahpelanggan', 'PelangganController@prosesubah' )->name('prosesubahpelanggan');
Route::get('/users/pelanggan/delete/{KdPlg}', 'PelangganController@hapus');



// Barang Punya
Route::get('/barang', 'BarangController@index')                                 ->name('barang');
Route::post('/barang', 'BarangController@prosestambah' )                        ->name('tambahbarang');
Route::post('/barang/prosesubahbarang', 'BarangController@prosesubah' )         ->name('prosesubahbarang');
Route::get('/users/barang/delete/{KdBrg}', 'BarangController@hapus');


// Transaction Punya
Route::get('/transaction', 'TransactionController@index')                       ->name('transaction');
Route::post('/transaction', 'TransactionController@prosestambah')               ->name('tambahtransaction');
Route::post('/transaction/tambahkeranjang', 'TransactionController@tambahkeranjang')               ->name('tambahkeranjang');




// Request Ajax
Route::post('/transaction/barang', 'ajax\AjaxController@caribarang');
Route::post('/transaction/pelanggan', 'ajax\AjaxController@caripelanggan');

// Report

Route::get('/users/kategori/cetak_pdf', 'ReportController@cetak_pdf')          ->name('pdf');
Route::get('/user/kategori/export_excel', 'ReportController@export_excel')     ->name('excel');


// Chart

Route::get('/dashboard', 'UserChartController@index')                           ->name('chart');

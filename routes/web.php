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

//Login
Route::get('/login','Controller_login@index');
Route::post('/login/cek','Controller_login@cek');

//Logout
Route::get('/logout','Controller_login@logout');



//Frontend
Route::get('/home','Controller_frontend@index');

//Pilih
Route::get('/pilihKatalog/{id}','Controller_pilihKatalog@index');
Route::get('/pilihProduk/{id}','Controller_pilihProduk@index');

//Keranjang
Route::get('/keranjang/{id}','Controller_keranjang@keranjang');
Route::get('/addKeranjang/{id}','Controller_keranjang@addKeranjang');
Route::get('/hapusKeranjang/{id}','Controller_keranjang@hapusKeranjang');

//Backend
Route::get('/dashboard','Controller_backend@index');

//User
Route::get('/user','Controller_user@index');
Route::get('/user/insert','Controller_user@insert');
Route::get('/user/edit','Controller_user@edit');
Route::get('/user/hapus/{id}','Controller_user@hapus');

//Katalog
Route::get('/katalog','Controller_katalog@index');
Route::post('/katalog/insert','Controller_katalog@insert');
Route::post('/katalog/edit/{id}','Controller_katalog@edit');

//Kategori
Route::get('/kategori','Controller_kategori@index');
Route::get('/kategori/insert','Controller_kategori@insert');
Route::get('/kategori/edit','Controller_kategori@edit');
Route::get('/kategori/hapus/{id}','Controller_kategori@hapus');

//Produk
Route::get('/produk/{id}','Controller_produk@index');
Route::post('/produk/insert/{id}','Controller_produk@insert');
Route::post('/produk/edit/{id}','Controller_produk@edit');

//POS
Route::get('/pos','Controller_pos@index');
Route::get('/pos/insert','Controller_pos@insert');

//penjualan
Route::get('/penjualan','Controller_penjualan@index');





//Futsal
Route::get('/futsal','Controller_futsal@index');
Route::post('/futsal/insert','Controller_futsal@insert');
Route::post('/futsal/edit/{id}','Controller_futsal@edit');

//Sepak Bola
Route::get('/sepakbola','Controller_sepakbola@index');
Route::post('/sepakbola/insert','Controller_sepakbola@insert');
Route::post('/sepakbola/edit/{id}','Controller_sepakbola@edit');

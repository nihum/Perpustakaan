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
    return view('auth.login');
});

Route::group(['middleware' => ['isAdmin']], function() {

//anggota

Route::get('/anggota/add','AnggotaControl@add');
Route::post('/anggota/save','AnggotaControl@save');
Route::get('/anggota/delete/{id}','AnggotaControl@delete');
Route::get('/anggota/edit/{id}','AnggotaControl@edit');


//buku

Route::get('/buku/add','BukuControl@add');
Route::post('/buku/save','BukuControl@save');
Route::get('/buku/delete/{id}','BukuControl@delete');
Route::get('/buku/edit/{id}','BukuControl@edit');

//pengarang
Route::get('/pengarang' , 'PengarangControl@index');
Route::get('/pengarang/add','PengarangControl@add');
Route::post('/pengarang/save','PengarangControl@save');
Route::get('/pengarang/delete/{id}','PengarangControl@delete');
Route::get('/pengarang/edit/{id}','PengarangControl@edit');

//penerbit
Route::get('/penerbit','PenerbitControl@index');
Route::get('/penerbit/add','PenerbitControl@add');
Route::post('/penerbit/save','PenerbitControl@save');
Route::get('/penerbit/delete/{id}','PenerbitControl@delete');
Route::get('/penerbit/edit/{id}','PenerbitControl@edit');

//kategori
Route::get('/kategori','KategoriControl@index');
Route::get('/kategori/add','KategoriControl@add');
Route::post('/kategori/save','KategoriControl@save');
Route::get('/kategori/delete/{id}','KategoriControl@delete');
Route::get('/kategori/edit/{id}','KategoriControl@edit');

// Koleksi

Route::get('/koleksi/add','KoleksiControl@add');
Route::post('/koleksi/save','KoleksiControl@save');
Route::get('/koleksi/delete/{id}','KoleksiControl@delete');
Route::get('/koleksi/edit/{id}','KoleksiControl@edit');

//Rak
Route::get('/rak','RakControl@index');
Route::get('/rak/add','RakControl@add');
Route::post('/rak/save','RakControl@save');
Route::get('/rak/delete/{id}','RakControl@delete');
Route::get('/rak/edit/{id}','RakControl@edit');

//peminjaman
Route::get('/trans/peminjaman', 'TransaksiControl@peminjaman');
Route::post('/trans/peminjaman', 'TransaksiControl@peminjaman');
Route::post('/trans/peminjaman/save', 'TransaksiControl@save_peminjaman');

//Data Pinjam
Route::get('/trans/data_pinjam', 'PinjamControl@Data_pinjam');

//pengembalian
Route::get('/trans/pengembalian', 'TransaksiControl@pengembalian');
Route::post('/trans/pengembalian', 'TransaksiControl@pengembalian');
Route::post('/trans/pengembalian/save', 'TransaksiControl@save_pengembalian');

//report anggota
Route::get('/rpt/anggota', 'ReportControl@rpt_anggota');

//report buku
Route::get('/rpt/buku', 'ReportControl@rpt_buku');

//report pinjam
Route::get('/rpt/pinjam', 'ReportControl@rpt_pinjam');

//report QR code
Route::get('/rpt/qrcode_buku', 'ReportControl@rpt_QRCode_Buku');
Route::get('/rpt/qrcode_anggota', 'ReportControl@rpt_QRCode_Anggota');

//akses ke data user
Route::get('user', 'UsersControl@index');
Route::get('user/add', 'UsersControl@add');
Route::get('user/edit/{id}', 'UsersControl@edit');
Route::post('user/save', 'UsersControl@save');
Route::get('user/delete/{id}', 'UsersControl@delete');
});

Route::group(['middleware' => ['isOperator']], function() {

//anggota
Route::get('/anggota','AnggotaControl@index');
//Buku
Route::get('/buku','BukuControl@index');
//koleksi
Route::get('/koleksi','KoleksiControl@index');

//Data Pinjam
Route::get('/trans/data_pinjam', 'PinjamControl@Data_pinjam');
Route::get('/trans/peminjaman', 'TransaksiControl@peminjaman');
Route::post('/trans/peminjaman', 'TransaksiControl@peminjaman');
Route::post('/trans/peminjaman/save', 'TransaksiControl@save_peminjaman');

// pengembalian
Route::get('/trans/pengembalian', 'TransaksiControl@pengembalian');
Route::post('/trans/pengembalian', 'TransaksiControl@pengembalian');
Route::post('/trans/pengembalian/save', 'TransaksiControl@save_pengembalian');

//report anggota
Route::get('/rpt/anggota', 'ReportControl@rpt_anggota');
Route::get('/anggota/history/{id}','AnggotaControl@history');

//report buku
Route::get('/rpt/buku', 'ReportControl@rpt_buku');

//report pinjam
Route::get('/rpt/pinjam', 'ReportControl@rpt_pinjam');

//report QR code
Route::get('/rpt/qrcode_buku', 'ReportControl@rpt_QRCode_Buku');

//cetak kartu anggota
Route::get('/rpt/kartu_anggota/{id}', 'ReportControl@rpt_kartu_anggota');

//entertaint game
Route::get('/hextris', function(){
    return view('hextris');
});

});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
// Mobile Server
Route::get('/mobile/get_buku','MobileControl@get_Buku');
Route::get('/mobile/get_koleksi/{kd_buku}','MobileControl@get_Koleksi');
Route::post('/mobile/registrasi','MobileControl@registrasi');
Route::post('/mobile/login','MobileControl@login');
Route::get('/mobile/get_pinjam/{status}','MobileControl@get_pinjam');

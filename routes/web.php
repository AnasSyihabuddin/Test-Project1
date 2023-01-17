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

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('/mst-pangkat','App\Http\Controllers\MstPangkatController');

Route::resource('/mst-jabatan','App\Http\Controllers\MstJabatanController');

Route::resource('/pegawai','App\Http\Controllers\PegawaiController');

Route::get('/riwayat-pangkat','App\Http\Controllers\RiwayatPangkatController@index');
Route::get('/riwayat-pangkat/proses/{id}','App\Http\Controllers\RiwayatPangkatController@proses')
->name('riwayat-pangkat.index1');
Route::get('/riwayat-pangkat/cetak/{id}','App\Http\Controllers\RiwayatPangkatController@cetak')
->name('riwayat-pangkat.cetak');
Route::get('/riwayat-pangkat/create/{id}','App\Http\Controllers\RiwayatPangkatController@create');
Route::post('/riwayat-pangkat/store','App\Http\Controllers\RiwayatPangkatController@store')
->name('riwayat-pangkat.store');
Route::get('/riwayat-pangkat/{id}/edit','App\Http\Controllers\RiwayatPangkatController@edit')
->name('riwayat-pangkat.edit');
Route::patch('/riwayat-pangkat/update/{id}','App\Http\Controllers\RiwayatPangkatController@update')
->name('riwayat-pangkat.update');
Route::get('/riwayat-pangkat/show/{id}','App\Http\Controllers\RiwayatPangkatController@show')
->name('riwayat-pangkat.show');
Route::delete('/riwayat-pangkat/destroy/{id}','App\Http\Controllers\RiwayatPangkatController@destroy')
->name('riwayat-pangkat.destroy');

//UTS
Route::resource('/data-online','App\Http\Controllers\DataOnlineController');



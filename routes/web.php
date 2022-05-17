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
    return view('admin.layouts.master');
});

Route::resource('/provinsi','App\Http\Controllers\ProvinsiController');
Route::resource('/kecamatan','App\Http\Controllers\KecamatanController');
Route::resource('/kelurahan','App\Http\Controllers\KelurahanController');
Route::resource('/pegawai','App\Http\Controllers\PegawaiController');
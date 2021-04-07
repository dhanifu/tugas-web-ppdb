<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);

Route::get('/user-check', 'HomeController@cek');

Route::name('siswa.')->group(function () {
    Route::middleware('auth', 'role:siswa')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::namespace('Siswa')->group(function () {
        Route::get('siswa-baru', 'DaftarController@index')->name('siswa-baru.index');
        Route::post('siswa-baru', 'DaftarController@store')->name('siswa-baru.store');
    });
});


Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace('Admin')->group(function () {
        Route::resource('/siswa', 'SiswaController');
        Route::post('/siswa/pdf', 'SiswaController@printPdf')->name('siswa.pdf');
    });
});

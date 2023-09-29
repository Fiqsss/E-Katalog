<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;


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
//registrasi

Route::middleware(['auth'])->group(function () {
    // Admin
    Route::middleware(['admin'])->group((function () {
        Route::get('/admin/home', [ProdukController::class, 'adminhome'])->name('adminhome')->middleware('admin');
        Route::put('/produkupdate/{produk_id}', [ProdukController::class, 'produkupdate'])->name('produkupdate');
        Route::get('/admin/tambahproduk', [ProdukController::class, 'tambahproduk'])->name('tambahproduk');
        Route::post('/insertproduk', [ProdukController::class, 'insertproduk'])->name('insertproduk');
        Route::get('/delete/{id}', [ProdukController::class, 'delete'])->name('delete');
        Route::put('/edittransaksi/{id}', [TransaksiController::class, 'edittransaksi'])->name('edittransaksi');

        Route::post('/admin/home', [ProdukController::class, 'cari'])->name('cari');
        Route::get('admin/transaksi', [ProdukController::class, 'transaksi'])->name('transaksi');
        Route::get('/transaksidelete/{id}', [TransaksiController::class, 'delete'])->name('transaksidelete');
        Route::post('/inserttransaksi', [TransaksiController::class, 'inserttransaksi'])->name('inserttransaksi');
        Route::post('/status', [TransaksiController::class, 'status'])->name('status');

        // User
        Route::get('/admin/user', [UserController::class, 'adminuser'])->name('adminuser');
        Route::post('/insertuser', [UserController::class, 'insertuser'])->name('insertuser');
        Route::get('/hapususer/{id}', [UserController::class, 'hapususer'])->name('hapususer');
        Route::put('/updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser');
        // regis
        Route::post('/register', [RegisController::class, 'store'])->name('register');

    }));

    Route::middleware(['operator'])->group(function () {
        Route::get('/operator/home', [ProdukController::class, 'operatorhome'])->name('operatorhome')->middleware('operator');
        Route::get('/operator/transaksi', [ProdukController::class, 'transaksioperator'])->name('transaksioperator');
        Route::post('/operator/home', [ProdukController::class, 'opratorcari'])->name('opratorcari');
    });


    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // error
    Route::get('/admin404', function () {
        return view('error.admin404');
    })->name('admin404');

    Route::get('/operator404', function () {
        return view('error.operator404');
    })->name('operator404');
});


Route::middleware(['guest'])->group(function () {
    // login Operator
    Route::get('/', [LoginController::class, 'adminlogin']);
    Route::get('/operator/login', [LoginController::class, 'operatorlogin'])->name('operatorlogin');
    Route::post('/loginoperator', [LoginController::class, 'loginoperator'])->name('loginoperator');
    Route::get('/login', [LoginController::class, 'operatorlogin'])->name('operatorlogin');
    // login admin
    Route::get('/admin/login', [LoginController::class, 'adminlogin'])->name('adminlogin');
    Route::post('/loginadmin', [LoginController::class, 'loginadmin'])->name('loginadmin');
    Route::get('/login', [LoginController::class, 'adminlogin'])->name('adminlogin');
    Route::get('/lupapassword', [UserController::class, 'getlupapassword'])->name('getlupapassword');
    Route::post('/lupapassword', [UserController::class, 'lupapassword'])->name('lupapassword');
    Route::get('/reset-password/{token}', [UserController::class, 'resetpassword'])->name('password.reset');
    Route::post('/reset-password', [UserController::class, 'reset'])->name('password.update');
});
<?php

use App\Models\Produk;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;

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
Route::middleware(['auth'])->group(function () {
    // Rute-rute yang hanya dapat diakses oleh pengguna yang telah login

// User
Route::get('/admin/user',[UserController::class, 'adminuser'])->name('adminuser');
Route::post('/insertuser',[UserController::class,'insertuser'])->name('insertuser');
Route::get('/hapususer/{id}',[UserController::class,'hapususer'])->name('hapususer');
Route::put('/updateuser/{id}',[UserController::class, 'updateuser'])->name('updateuser');


// home

Route::get('/admin/home',[ProdukController::class, 'adminhome'])->name('adminhome');
Route::put('/produkupdate/{id}', [ProdukController::class, 'produkupdate'])->name('produkupdate');
Route::get('/admin/home',[ProdukController::class,'adminhome'])->name('adminhome');
Route::get('/admin/tambahproduk', [ProdukController::class, 'tambahproduk'])->name('tambahproduk');
Route::post('/insertproduk',[ProdukController::class, 'insertproduk'])->name('insertproduk');
Route::get('/delete/{id}',[ProdukController::class, 'delete'])->name('delete');

// Route::get('/', function (){return view('admin/login');});
//registrasi
Route::post('/register', [RegisController::class, 'store'])->name('register');
// Operator
Route::get('/operator/home',[ProdukController::class,'operatorhome']);

});
// login admin
Route::get('/',function(){return view('admin.login');});
Route::get('/login',[LoginController::class,'adminlogin'])->name('adminlogin');
Route::get('/admin/login',[LoginController::class,'adminlogin'])->name('adminlogin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// login Operator
Route::get('/operator/login',[LoginController::class,'operatorlogin'])->name('operatorlogin');
Route::post('/loginoperator',[LoginController::class,'loginoperator'])->name('loginoperator');


// Transaction
Route::get('/transaction',[TransactionController::class ,'index'])->name('indextransaksi');

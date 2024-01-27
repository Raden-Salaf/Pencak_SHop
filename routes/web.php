<?php

use App\Http\Controllers\DashboardCon;
use App\Http\Controllers\LoginCon;
use App\Http\Controllers\RegisterCon;
use App\Http\Controllers\userCon;
use App\Http\Controllers\produkCon;
use App\Http\Controllers\pembelianCon;
use Illuminate\Support\Facades\Route;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[produkCon::class, 'home'])->name('homeproduk');
Route::get('/login',[LoginCon::class,'login'])->name('login');
Route::post('actionlogin',[LoginCon::class,'actionlogin'])->name('actionlogin');
Route::get('dashboard',[DashboardCon::class,'index'])->name('dashboard')->middleware('auth');
Route::get('actionlogout',[LoginCon::class,'actionlogout'])->name('actionlogout')->middleware('auth');
Route::get('register', [RegisterCon::class, 'register'])->name('register'); 
Route::post('register/action', [RegisterCon::class, 'actionregister'])->name('actionregister');
Route::get('/user/tampil', [userCon::class, 'index'])->name('indexUser')->middleware('auth');
Route::get('/user/input', [userCon::class, 'input'])->name('inputUser')->middleware('auth');
Route::post('/user/storeinput', [userCon::class, 'storeinput'])->name('storeInputUser')->middleware('auth');
Route::get('/user/update/{id}', [userCon::class, 'update'])->name('updateUser')->middleware('auth');
Route::post('/user/storeupdate', [userCon::class, 'storeupdate'])->name('storeUpdateUser')->middleware('auth');
Route::get('/user/delete/{id}', [userCon::class, 'delete'])->name('deleteUser')->middleware('auth');
Route::get('/produk/tampil', [produkCon::class, 'index'])->name('indexproduk')->middleware('auth');
Route::get('/produk/input', [produkCon::class, 'input'])->name('inputproduk')->middleware('auth');
Route::post('/produk/storeinput', [produkCon::class, 'storeinput'])->name('storeInputproduk')->middleware('auth');
Route::get('/produk/update/{id}', [produkCon::class, 'update'])->name('updateproduk')->middleware('auth');
Route::post('/produk/storeupdate', [produkCon::class, 'storeupdate'])->name('storeUpdateproduk')->middleware('auth');
Route::get('/produk/delete/{id}', [produkCon::class, 'delete'])->name('deleteproduk')->middleware('auth');
Route::get('/produk/upload', [produkCon::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/produk/uploadproses', [produkCon::class, 'uploadproses'])->name('uploadproses')->middleware('auth');
Route::get('/pembelian/tampil', [pembelianCon::class, 'index'])->name('indexpembelian')->middleware('auth');
Route::get('/pembelian/input', [pembelianCon::class, 'input'])->name('inputpembelian')->middleware('auth');
Route::post('/pembelian/storeinput', [pembelianCon::class, 'storeinput'])->name('storeInputpembelian')->middleware('auth');
Route::get('/pembelian/update/{id}', [pembelianCon::class, 'update'])->name('updatepembelian')->middleware('auth');
Route::post('/pembelian/storeupdate', [pembelianCon::class, 'storeupdate'])->name('storeUpdatepembelian')->middleware('auth');
Route::get('/pembelian/delete/{id}', [pembelianCon::class, 'delete'])->name('deletepembelian')->middleware('auth');
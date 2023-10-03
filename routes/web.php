<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use App\Models\Pelanggan;

// use App\Http\Controllers\HomeController;
//login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/cek', [UserController::class, 'ceklogin'])->name('ceklogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//route untuk yang sudah login
Route::group(['middleware'=>'auth'],function(){
    
    Route::get('/', [DashboardController::class, 'admin']);
    // Route::get('/', [DashboardController::class, 'home']);
    Route::get('/blog', [DashboardController::class, 'blog']);
    Route::get('/profile', [DashboardController::class, 'profile']);
    Route::get('/contact', [DashboardController::class, 'contact']);
    //route  untuk admin
    Route::group(['middleware' => ['cekUserLogin:1']], function(){
        Route::resource('/pelanggan', PelangganController::class);
        Route::resource('/produk', ProdukController::class);
        Route::resource('/pemasok', PemasokController::class);
        Route::resource('/barang', BarangController::class);
        Route::get('/user', [UserController::class, 'user']);
        Route::get('exportpemasok', [PemasokController::class, 'pemasokExport'])->name('exportpemasok');
        Route::get('pdfpemasok', [PemasokController::class, 'pemasokPdf'])->name('pdfpemasok');
        Route::post('pemasok/import/pemasok', [PemasokController::class, 'importData'])->name('import-pemasok');
    });

    //route untuk kasir
    Route::group(['middleware'=> ['cekUserLogin:2']],function(){
        Route::resource('/pembelian', PembelianController::class);
        Route::get('/penjualan/{no_faktur}', [PenjualanController::class, 'penjualan']);
        Route::post('/penjualan', [PenjualanController::class, 'store']);
        Route::get('exportpembelian', [PembelianController::class, 'pembelianExport'])->name('exportpembelian');
        Route::post('importpembelian', [PembelianController::class, 'pembelianImport'])->name('importpembelian');
        Route::get('/histori', [PembelianController::class, 'histori']);
        Route::get('downloadpdf', [PembelianController::class, 'downloadPdf'])->name('downloadpdf');
    });
});


// Route::get('/home',[DashboardController::class,'admin']);
// Route :: get('/',[DashboardController::class,'home']);
// Route :: get('/blog',[DashboardController::class,'blog']);
// Route::get('/profile',[DashboardController::class,'profile']);
// Route::get('/contact',[DashboardController::class,'contact']);
// Route::resource('/pelanggan',PelangganController::class);
// Route::resource('/produk',ProdukController::class);
// Route::resource('/pemasok',PemasokController::class);
// Route::resource('/barang', BarangController::class);
// Route::get('/user', [UserController::class, 'user']);

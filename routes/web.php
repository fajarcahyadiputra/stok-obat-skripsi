<?php

use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatMasukController;
use App\Http\Controllers\OrderObatController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('aksi_login');
// Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'permision']], function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/user', UserController::class);
    Route::post('/user/{id}', [UserController::class, 'update']);
    Route::resource('/supplier', SupplierController::class);
    Route::post('/obat/{kode_obat}', [ObatController::class, 'update']);
    Route::resource('/obat', ObatController::class)->except("PUT");
    Route::resource('/satuan', SatuanController::class);
    Route::resource('/obat-masuk', ObatMasukController::class);
    Route::resource('/order-obat', OrderObatController::class)->names([
        'create' => 'transaksi.create',
        'edit' => 'transaksi.edit',
        'index' => "transaksi.show"
    ]);
    Route::resource('/customer', CustomerController::class);
    Route::get("/batal-order", [OrderObatController::class, "batal"]);
    Route::get('/cetak-faktur/pdf/{nomer_faktur}', [OrderObatController::class, 'cetakFakturPdf']);
    Route::get('/transaksi/detail/{nomer_faktur}', [OrderObatController::class, 'detailTransaksi']);
    // Route::get('/tambah-barang-masuk', [BarangMasukController::class, 'halamanTambah'])->name('tambah.barang-masuk');
    // Route::get('/edit-barang-masuk/{id}', [BarangMasukController::class, 'halamanEdit'])->name('edit.barang_masuk');
    // Route::resource('/barang-keluar', BarangKeluarController::class);
    // Route::get('/tambah-barang-keluar', [BarangKeluarController::class, 'halamanTambah'])->name('tambah.barang-keluar');
    // Route::get('/edit-barang-keluar/{id}', [BarangKeluarController::class, 'halamanEdit'])->name('edit.barang-keluar');
    // Route::get('/surat-jalan-barang-keluar/{id}', [BarangKeluarController::class, 'laporanSuratjalan'])->name('suratjalan.barang-keluar');
    // Route::get('/detail-barang-keluar/{id}', [BarangKeluarController::class, 'viewDetailBarangKeluar']);

    Route::post('/report-pdf', [ReportController::class, 'reportPdf'])->name('report-pdf');
    Route::get('/report', [ReportController::class, 'index'])->name('report-index');

    Route::post('/tambah-keranjang', [OrderObatController::class, 'addCart'])->name('tambahObatToCart');
});

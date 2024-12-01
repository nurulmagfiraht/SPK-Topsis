<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\PenilaianKaryawan;
use App\Http\Controllers\PenilaianKPIController;
use App\Http\Controllers\SPKController;
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

Route::get('/admin', function () {
    return view('admin.admin');
});

Route::get('/cobekgurih', function () {
    return view('cobekgurih');
});

Route::get('/admin-kpi', [KPIController::class,'index'])->name('kpi.index');

Route::get('/admin-datakaryawan', [KaryawanController::class,'index'])->name('admin-datakaryawan.index');

Route::get('/admin-absensi', [AbsensiController::class,'index'])->name('admin-absensi.index');

Route::get('/admin-datauser', [DataUserController::class,'index'])->name('admin-datauser.index');

Route::get('/admin-penilaian', [PenilaianKPIController::class,'index'])->name('admin-penilaian.index');

Route::get('/edit-penilaiankaryawan/{id}', [PenilaianKaryawan::class,'index'])->name('edit-penilaiankaryawan.index');

Route::get('/admin-hasilspk', [SPKController::class,'index'])->name('admin-hasilspk.index');

Route::post('/admin-absensi', [AbsensiController::class,'import'])->name('admin.absensi.index');

// Rute untuk KPI
Route::resource('kpi', KPIController::class);

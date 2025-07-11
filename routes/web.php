<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KPIController;
use App\Http\Controllers\SPKController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PenilaianKaryawan;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\PenilaianKPIController;

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


Route::get('/cobekgurih', function () {
    return view('cobekgurih');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin-kpi', [KPIController::class,'index'])->name('kpi.index');

    Route::get('/admin-datakaryawan', [KaryawanController::class,'index'])->name('admin-datakaryawan.index');

    Route::get('/admin-absensi', [AbsensiController::class,'index'])->name('admin-absensi.index');

    Route::get('/admin-datauser', [DataUserController::class,'index'])->name('admin-datauser.index');

    Route::get('/admin-penilaian', [PenilaianKPIController::class,'index'])->name('admin-penilaian.index');

    Route::get('/edit-penilaiankaryawan/{id}', [PenilaianKaryawan::class,'index'])->name('edit-penilaiankaryawan.index');

    Route::get('/admin-hasilspk', [SPKController::class,'index'])->name('admin-hasilspk.index');

    Route::post('/admin-absensi', [AbsensiController::class,'import'])->name('admin.absensi.index');

    Route::get('/admin-departemen', [DepartemenController::class, 'index'])->name('admin-departemen.index');

    Route::get('/admin-departemen/{departemen}/{divisi}', [DepartemenController::class, 'show'])->name('admin-showdivisi.show');

    // Rute untuk KPI
    Route::resource('kpi', KPIController::class);

    Route::post('/edit-penilaiankaryawan', [PenilaianKaryawan::class, 'store'])->name('edit-penilaiankaryawan.store');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Route::put('/users/{id}/role', [UserController::class, 'updateRole'])->name('users.updateRole');

    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    
    Route::put('/update-role/{id}', [UserController::class, 'updateRole'])->name('users.updateRole');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
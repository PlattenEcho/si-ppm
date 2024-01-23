<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranController;
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
    return view('landing_page');
})->name('landing');

Route::get('/404', function () {
    return view('404');
});


Route::controller(LoginController::class)->group(function () {
    //Login
    Route::get('/login', function () {
        return view('login');
    })->middleware('guest')->name('login');
    Route::get('/admin/login', function () {
        return view('admin.login');
    })->middleware('guest');
    Route::post('/login', 'authenticateMahasiswa')->middleware('guest');
    Route::post('/login-non-mahasiswa', 'authenticateNonMahasiswa')->middleware('guest');

    //Register
    Route::get('/register', function () {
        return view('register');
    })->middleware('guest');
    ;
    Route::post('/register', 'register')->middleware('guest');
    ;

    //Logout
    Route::post('/logout', 'logout')->middleware('auth');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'viewDashboardMahasiswa')->middleware('mahasiswa')->name('mahasiswa.dashboard');
    Route::get('/admin', 'viewDashboardAdmin')->middleware('admin')->name('admin.dashboard');
    Route::get('/admin/daftar-peserta', 'viewDaftarPeserta')->middleware('admin')->name('admin.daftarPeserta');
    Route::get('/admin/pengaturan', 'viewPengaturan')->middleware('admin')->name('admin.pengaturan');
    Route::post('/admin/pengaturan', 'savePengaturan')->name('admin.savePengaturan');
});

Route::controller(PendaftaranController::class)->group(function () {
    Route::get('/pendaftaran', 'viewPendaftaran')->name('pendaftaran');
    Route::post('/pendaftaran', 'storeDataDiri')->name('storeDataDiri');

    Route::get('/pendaftaran/pilih-bidang', 'viewPilihBidang')->middleware('auth', 'checkDataDiri')->name('formPilihBidang');
    Route::post('/pendaftaran/pilih-bidang', 'storePilihBidang')->name('storePilihBidang');

    Route::get('/pendaftaran/cek-ulang', 'viewCekUlang')->middleware('auth', 'checkDataComplete')->name('formCekUlang');
    Route::post('/pendaftaran/cek-ulang', 'storePendaftaran')->name('storePendaftaran');

    Route::get('/pendaftaran/cek-status', 'viewCekStatus')->middleware('auth', 'checkPendaftaran')->name('cekStatus');
});

Route::get('/view-mail', function () {
    $name = 'Mahardika Putra Wardhana';
    $status = "Verifikasi Berhasil";
    $mail = new App\Mail\StatusPendaftaranMail($name, $status);
    return $mail->render();
});

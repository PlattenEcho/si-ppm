<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Models\Pendaftaran;
use App\Models\Pengaturan;
use Illuminate\Support\Carbon;
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
    $pengaturan = DB::table('pengaturan')->first();
    $tutup = $pengaturan->tanggal_tutup;
    $toDate = Carbon::parse($pengaturan->tanggal_tutup);
    $fromDate = Carbon::now();
    $days = $toDate->diffInDays($fromDate);

    if ($pengaturan->buka_tidak == 1) {
        $countPendaftaran = Pendaftaran::whereBetween('created_at', [$pengaturan->tanggal_buka, $pengaturan->tanggal_tutup])->count();
        if ($countPendaftaran >= $pengaturan->kuota) {
            $status = 2; //Kuota Habis
        }else if($pengaturan->kuota - $countPendaftaran < 30){
            $status = 0;
        } else if($days < 10 &&  !$toDate->isPast()){
            $status = 4; 
        } else if($toDate->isPast()){
            $status = 2;//Ditutup
        }
        else {
            $status = 1; //Kuota Ada
        }
    } else {
        $status = 2; //Pendaftaran Ditutup
    }

    return view('landing_page', compact('status', 'tutup'));
})->name('landing')->middleware('isVerified');

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

    //Email Verification
    Route::get('/email-verification', 'viewEmailVerification');
    Route::post('/email-verification', 'verificate');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'viewDashboardMahasiswa')->middleware('mahasiswa')->name('mahasiswa.dashboard');
    Route::get('/admin', 'viewDashboardAdmin')->middleware('admin')->name('admin.dashboard');
    Route::get('/admin/daftar-peserta', 'viewDaftarPeserta')->middleware('admin')->name('admin.daftarPeserta');
    Route::get('/admin/cetak-laporan', 'viewCetakLaporan')->middleware('admin')->name('admin.cetakLaporan');
    Route::get('/admin/pdf-print', 'viewPDF')->middleware('admin')->name('admin.viewPDF');
    Route::get('/admin/pengaturan', 'viewPengaturan')->middleware('admin')->name('admin.pengaturan');
    Route::post('/admin/pengaturan', 'savePengaturan')->name('admin.savePengaturan');
    Route::post('/admin/pengumuman', 'updatePengumuman' )->name('admin.updatePengumuman');
});

Route::controller(PendaftaranController::class)->group(function () {
    Route::get('/pendaftaran', 'viewPendaftaran')->middleware('isVerified')->name('pendaftaran');
    Route::post('/pendaftaran', 'storeDataDiri')->name('storeDataDiri');

    Route::get('/pendaftaran/pilih-bidang', 'viewPilihBidang')->middleware('auth', 'isVerified', 'checkDataDiri')->name('formPilihBidang');
    Route::post('/pendaftaran/pilih-bidang', 'storePilihBidang')->name('storePilihBidang');

    Route::get('/pendaftaran/cek-ulang', 'viewCekUlang')->middleware('auth', 'isVerified', 'checkDataComplete')->name('formCekUlang');
    Route::post('/pendaftaran/cek-ulang', 'storePendaftaran')->name('storePendaftaran');

    Route::get('/pendaftaran/cek-status', 'viewCekStatus')->middleware('auth', 'isVerified', 'checkPendaftaran')->name('cekStatus');
});

Route::get('/view-mail', function () {
    $name = 'Mahardika Putra Wardhana';
    $status = "Verifikasi Berhasil";
    $mail = new App\Mail\StatusPendaftaranMail($name, $status);
    return $mail->render();
});

Route::get('/view-code-email', function () {
    $kode = '3NSB3';
    $name = 'Mahardika Putra Wardhana';
    $mail = new App\Mail\SendVerificationCodeEmail($name, $kode);
    return $mail->render();
});

Route::get('/admin-pendaftaran-mail', function () {
    $pendaftaran = Pendaftaran::firstorfail();
    $mail = new App\Mail\AdminPendaftaranMail($pendaftaran);
    return $mail->render();
});
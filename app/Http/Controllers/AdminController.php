<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{

    public function viewDashboardAdmin()
    {
        $data = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [65, 59, 80, 81, 56],
        ];

        $pengaturan = Pengaturan::first();
        $belumVerifikasi = Pendaftaran::where('status_pendaftaran', 1)->count();
        $sudahVerifikasi = Pendaftaran::where('status_pendaftaran', 2)->count();
        $seleksi = Pendaftaran::where('status_pendaftaran', 4)->count();

        return view('admin.dashboard', compact('data', 'pengaturan', 'belumVerifikasi', 'sudahVerifikasi', 'seleksi'));
    }

    public function viewDaftarPeserta()
    {
        return view('admin.daftar_peserta');
    }

    public function viewPengaturan()
    {
        $pengaturan = Pengaturan::first();

        return view('admin.pengaturan', compact('pengaturan'));
    }

    public function savePengaturan(Request $request)
    {
        $validatedData = $request->validate([
            'buka_tidak' => 'required|numeric',
            'kuota' => 'required|numeric|max:300',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date',
        ]);

        $pengaturan = Pengaturan::first();

        if (!$pengaturan) {
            Pengaturan::create($validatedData);
        } else {
            Pengaturan::first()->update($validatedData);
        }

        return redirect('/admin/pengaturan')->with("success", "Pengaturan berhasil diubah");
    }
}

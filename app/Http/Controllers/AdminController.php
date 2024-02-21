<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pengaturan;
use App\Models\Pengumuman;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function viewCetakLaporan()
    {
        $bulanList = Pendaftaran::selectRaw('MONTH(created_at) as bulan')
            ->distinct()
            ->orderBy('bulan')
            ->pluck('bulan');

        $periodeList = Pendaftaran::select('periode')->distinct()->pluck('periode');

        $tahunList = Pendaftaran::selectRaw('YEAR(created_at) as tahun')
            ->distinct()
            ->orderBy('tahun')
            ->pluck('tahun');

        return view('admin.cetak_laporan', compact('bulanList', 'periodeList', 'tahunList'));
    }

    public function viewPDF()
    {
        $data = [
            'title' => 'Contoh PDF dengan DomPDF',
            'content' => 'Ini adalah konten PDF.'
        ];

        $pdf = Pdf::loadView('admin.pdf.test', ['data' => $data]);

        return $pdf->download();
    }

    public function viewPengaturan()
    {
        $pengaturan = Pengaturan::first();
        $pengumuman = Pengumuman::first();
        return view('admin.pengaturan', compact('pengaturan', 'pengumuman'));
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

    public function updatePengumuman(Request $request)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|string',
                'no_telp' => 'required|numeric',
                'nama_kontak' => 'required|string',
                'link' => 'required|string',
                'image' => 'required|mimes:jpg,jpeg,png|max:4096',
            ]
        );

        $imageExtension = $request->file('image')->extension();
        $imageName = 'image_pengumuman.' . $imageExtension;
        $validatedData['image'] = $request->file('image')->storeAs('image_pengumuman', $imageName, 'public');

        Pengumuman::first()->update($validatedData);

        return redirect('/admin/pengaturan')->with("success", "Pengumuman berhasil diubah");
    }
}

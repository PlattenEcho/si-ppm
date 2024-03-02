<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pengaturan;
use App\Models\Pengumuman;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class AdminController extends Controller
{

    public function viewDashboardAdmin()
    {
        $pengaturan = Pengaturan::first();
        $periode = $pengaturan->periode;

        $pendaftarans = Pendaftaran::where('periode', $periode)->get();

        $monthlyData = [];
        foreach ($pendaftarans as $pendaftaran) {
            $month = Carbon::parse($pendaftaran->created_at)->format('F'); // Get month name
            $monthlyData[$month][] = $pendaftaran;
        }
    
        $sortedMonths = array_keys($monthlyData);
        usort($sortedMonths, function ($a, $b) {
            return \DateTime::createFromFormat('F', $a) > \DateTime::createFromFormat('F', $b);
        });
    
        $sortedMonthlyData = [];
        foreach ($sortedMonths as $month) {
            $sortedMonthlyData[$month] = $monthlyData[$month];
        }
    
    
        $belumVerifikasi = Pendaftaran::where('status_pendaftaran', 1)->where('periode', $periode)->count();
        $sudahVerifikasi = Pendaftaran::where('status_pendaftaran', 2)->where('periode', $periode)->count();
        $seleksi = Pendaftaran::where('status_pendaftaran', 4)->where('periode', $periode)->count();
        $diterima = Pendaftaran::where('status_pendaftaran', 5)->where('periode', $periode)->count();
        $ditolak = Pendaftaran::where('status_pendaftaran', 6)->where('periode', $periode)->count();

        $seleksi = Pendaftaran::where('status_pendaftaran', 4)->count();

        $data = [
            'labels' => ['Diverifikasi', 'Belum Verifikasi', 'Seleksi', 'Diterima', 'Ditolak'],
            'data' => [$sudahVerifikasi, $belumVerifikasi, $seleksi, $diterima, $ditolak],
        ];

        return view('admin.dashboard', compact('data', 'periode', 'pengaturan', 'belumVerifikasi', 'sudahVerifikasi', 'seleksi', 'diterima', 'ditolak', 'sortedMonthlyData'));
    }

    public function viewDaftarPeserta()
    {
        return view('admin.daftar_peserta');
    }

    public function viewCetakLaporan(Request $request)
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

        $jangkaWaktu = $request->input('jangka_waktu', null);
        $bulan = $request->input('bulan', null);
        $periode = $request->input('periode', null);
        $tahun = $request->input('tahun', null);

        $queryDiterima = Pendaftaran::query();
        $queryDitolak = Pendaftaran::query();

        if ($request->input('jangka_waktu') === 'monthly') {
            $queryDiterima->whereMonth('created_at', $request->input('bulan'));
            $queryDitolak->whereMonth('created_at', $request->input('bulan'));
        } elseif ($request->input('jangka_waktu') === 'period') {
            $queryDiterima->where('periode', $request->input('period'));
            $queryDitolak->where('periode', $request->input('period'));
        } elseif ($request->input('jangka_waktu') === 'yearly') {
            $queryDiterima->whereYear('created_at', $request->input('tahun'));
            $queryDitolak->whereYear('created_at', $request->input('tahun'));
        }

        $pendaftarDiterima = $queryDiterima->where('status_pendaftaran', 5)->count();
        $pendaftarDitolak = $queryDitolak->where('status_pendaftaran', 6)->count();

        $totalPendaftar = $pendaftarDiterima + $pendaftarDitolak;

        // Kirim data ke view
        return view('admin.cetak_laporan', compact('bulanList', 'periodeList', 'tahunList', 'pendaftarDiterima', 'pendaftarDitolak', 'totalPendaftar'));
    }

    
    public function generate(Request $request)
    {
        $tipe = $request->input('tipe');

        switch ($tipe) {
            case 'bulanan':
                $bulan = $request->input('bulan');
                $data = $this->generateBulanan($bulan);
                break;

            case 'periode':
                $periode = $request->input('periode');
                $data = $this->generatePeriode($periode);
                break;

            case 'tahunan':
                $tahun = $request->input('tahun');
                $data = $this->generateTahunan($tahun);
                break;

            default:
                return redirect()->route('laporan.index')->with('error', 'Tipe laporan tidak valid.');
        }

        // Contoh penggunaan PDF dengan DOMPDF
        $pdf = PDF::loadView('laporan.pdf', $data);
        return $pdf->download('laporan.pdf');
    }

    private function generateBulanan($bulan)
    {
        // Logika untuk mengambil data bulanan dari database
        // Gantilah dengan logika sesuai dengan model dan database Anda
        $data = Pendaftaran::whereMonth('created_at', '=', $bulan)->get();

        return ['data' => $data];
    }

    private function generatePeriode($periode)
    {
        // Logika untuk mengambil data berdasarkan periode dari database
        $data = Pendaftaran::where('periode', $periode)->get();

        return ['data' => $data];
    }

    private function generateTahunan($tahun)
    {
        // Logika untuk mengambil data tahunan dari database
        $data = Pendaftaran::whereYear('created_at', '=', $tahun)->get();

        return ['data' => $data];
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
            'periode' => 'required|numeric'
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

<?php

namespace App\Http\Controllers;

use App\Mail\AdminPendaftaranMail;
use App\Mail\StatusPendaftaranMail;
use App\Models\Pendaftaran;
use App\Models\Pengaturan;
use App\Models\Pengumuman;
use App\Models\RiwayatPendaftaran;
use App\Models\SuratPenerimaan;
use App\Models\User;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Mail;

class PendaftaranController extends Controller
{
    public function viewPendaftaran()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $pengaturan = Pengaturan::first();
            $pendaftaranSatuPeriode =  Pendaftaran::where('id_user', $user->id)->where('periode', $pengaturan->periode);
            if ($pendaftaranSatuPeriode->exists()) {
                return redirect('/pendaftaran/cek-status');
            }
        }

        $pengaturan = DB::table('pengaturan')->first();

        $toDate = Carbon::parse($pengaturan->tanggal_tutup);
        $fromDate = Carbon::now();
        $days = $toDate->diffInDays($fromDate);

        if ($pengaturan->buka_tidak == 1) {
            $countPendaftaran = Pendaftaran::whereBetween('created_at', [$pengaturan->tanggal_buka, $pengaturan->tanggal_tutup])->where('periode', $pengaturan->periode)->count();
            if ($countPendaftaran >= $pengaturan->kuota) {
                $status = 2; //Kuota Habis
            } else if ($pengaturan->kuota - $countPendaftaran < 30) {
                $status = 0; //Kuota Hampir Habis
            } else if ($days < 10 && !$toDate->isPast()) {
                $status = 4; //Hampir tutup
            } else if ($toDate->isPast()) {
                $status = 2;//Ditutup
            } else {
                $status = 1; //Kuota Ada
            }
        } else {
            $status = 2; //Pendaftaran Ditutup
        }
        return view('pendaftaran', compact('status'));
    }

    public function viewPilihBidang()
    {
        return view('pendaftaran_pilih_bidang');
    }
    public function storeDataDiri(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'nim' => 'required|string|max:30',
            'email' => 'required|email:dns|max:50',
            'no_telp' => 'required|numeric',
            'jenjang' => 'required|numeric',
            'universitas' => 'required|string|max:50',
            'program_studi' => 'required|string|max:50',
            'alamat' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'motivasi' => 'required|string',
            'rencana_kegiatan' => 'required|string',
            'scan_ktm' => 'required|mimes:jpeg,png,pdf|max:4096',
            'surat_pengantar' => 'required|mimes:jpeg,png,pdf|max:4096',
        ]);

        $suratPengantarExtension = $request->file('surat_pengantar')->extension();
        $suratPengantarFileName = $validatedData['name'] . '_' . $validatedData['universitas'] . '_surat_pengantar.' . $suratPengantarExtension;
        $validatedData['surat_pengantar'] = $request->file('surat_pengantar')->storeAs('surat_pengantar', $suratPengantarFileName, 'public');

        $ktmExtension = $request->file('scan_ktm')->extension();
        $ktmFileName = $validatedData['name'] . '_' . $validatedData['universitas'] . '_ktm.' . $ktmExtension;
        $validatedData['scan_ktm'] = $request->file('scan_ktm')->storeAs('scan_ktm', $ktmFileName, 'public');


        session()->put('dataDiri', $validatedData);

        return redirect('/pendaftaran/pilih-bidang');
    }

    public function storePilihBidang(Request $request)
    {
        $validatedData = $request->validate([
            'bidang' => 'required|in:1,2,3,4,5',
        ]);
    
        $dataDiri = session()->get('dataDiri');
        $mergedData = array_merge($dataDiri, $validatedData);
        session()->put('dataComplete', $mergedData);
    
        return redirect('/pendaftaran/cek-ulang')->with('mergedData', $mergedData);
    }

    public function viewCekUlang()
    {
        $mergedData = session()->get('dataComplete');
        return view('pendaftaran_cek_ulang', ['mergedData' => $mergedData]);
    }

    public function storePendaftaran()
    {
        $mergedData = session()->get('dataComplete');
        $mergedData['id_user'] = auth()->user()->id;

        $timestamp = Carbon::now();
        $bidang = $mergedData['bidang'];
        $count = Pendaftaran::whereYear('created_at', $timestamp)
            ->whereMonth('created_at', $timestamp)
            ->where('bidang', $bidang)
            ->count();

        $count++;

        $idPendaftaran = sprintf('%s%02d%03d', $timestamp->format('Ym'), $bidang, $count);

        $mergedData['id_pendaftaran'] = $idPendaftaran;
        $mergedData['periode'] = Pengaturan::first()->periode;
        $pendaftaran = Pendaftaran::create($mergedData);
        session()->forget(['dataDiri', 'dataComplete']);

        RiwayatPendaftaran::create([
            'id_pendaftaran' => $mergedData['id_pendaftaran'],
            'status_pendaftaran' => 1,
            'catatan' => "Mohon tunggu untuk proses verifikasi.",
        ]);


        Mail::to($mergedData['email'])->send(new StatusPendaftaranMail($mergedData['name'], 'Menunggu Verifikasi'));

        $adminUsers = User::where('idrole', 2)->get();

        foreach ($adminUsers as $adminUser) {
            Mail::to($adminUser->email)->send(new AdminPendaftaranMail($pendaftaran));
        }

        return redirect('/pendaftaran/cek-status')->with("success", "Pendaftaran berhasil disubmit!");
    }

    public function viewCekStatus()
    {
        $user = Auth::user();
        $pengumuman = Pengumuman::first();

        if (!$user->pendaftaran()->where('periode', $pengumuman->periode)->exists()) {
            return redirect('/pendaftaran')->with("error", "Anda belum mendaftar!");
        }
        
        $pendaftaran = $user->pendaftaran->where('periode', $pengumuman->periode);
        $riwayatPendaftaran = $pendaftaran->riwayatPendaftaran;
        
        $diterima = $riwayatPendaftaran->where('status_pendaftaran', 'Diterima');
        $ditolak = $riwayatPendaftaran->where('status_pendaftaran', 'Ditolak');
        $lastRiwayatPendaftaran = $riwayatPendaftaran->sortByDesc('created_at')->first();

        $count = $riwayatPendaftaran->count();
        $riwayatPendaftaran = $riwayatPendaftaran->slice(0, $count - 1);

        $suratPenerimaan = SuratPenerimaan::where('id_pendaftaran', $pendaftaran->id_pendaftaran);

        return view('pendaftaran_cek_status', [
            'pengumuman' => $pengumuman,
            'riwayatPendaftaran' => $riwayatPendaftaran,
            'lastRiwayatPendaftaran' => $lastRiwayatPendaftaran,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'suratPenerimaan' => $suratPenerimaan
        ]);
    }

}

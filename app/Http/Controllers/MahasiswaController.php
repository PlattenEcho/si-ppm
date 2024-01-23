<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\RiwayatPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function viewPendaftaran()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->pendaftaran()->exists()) {
                return redirect('/pendaftaran/cek-status');
            }
        }

        return view('pendaftaran');
    }

    public function viewPilihDivisi()
    {
        return view('pendaftaran_pilih_divisi');
    }
    public function storeDataDiri(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|string|max:30',
            'email' => 'required|email:dns|max:255',
            'no_telp' => 'required|numeric',
            'jenjang' => 'required|numeric',
            'universitas' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'motivasi' => 'required|string',
            'rencana_kegiatan' => 'required|string',
            'scan_ktm' => 'required|required|mimes:jpeg,png,pdf|max:4096',
            'surat_pengantar' => 'required|mimes:jpeg,png,pdf|max:4096',
        ]);

        $suratPengantarExtension = $request->file('surat_pengantar')->extension();
        $suratPengantarFileName = $validatedData['name'] . '_' . $validatedData['universitas'] . '_surat_pengantar.' . $suratPengantarExtension;
        $validatedData['surat_pengantar'] = $request->file('surat_pengantar')->storeAs('surat_pengantar', $suratPengantarFileName, 'public');

        $ktmExtension = $request->file('scan_ktm')->extension();
        $ktmFileName = $validatedData['name'] . '_' . $validatedData['universitas'] . '_ktm.' . $ktmExtension;
        $validatedData['scan_ktm'] = $request->file('scan_ktm')->storeAs('scan_ktm', $ktmFileName, 'public');


        session()->put('dataDiri', $validatedData);

        return redirect('/pendaftaran/pilih-divisi');
    }

    public function storePilihDivisi(Request $request)
    {
        $validatedData = $request->validate([
            'divisi' => 'required|in:1,2',
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
        $division = $mergedData['divisi'];
        $count = Pendaftaran::whereYear('created_at', $timestamp)
            ->whereMonth('created_at', $timestamp)
            ->where('divisi', $division)
            ->count();

        $count++;

        $idPendaftaran = sprintf('%s%02d%03d', $timestamp->format('Ym'), $division, $count);

        $mergedData['id_pendaftaran'] = $idPendaftaran;
        Pendaftaran::create($mergedData);
        session()->forget(['dataDiri', 'dataComplete']);

        RiwayatPendaftaran::create([
            'id_pendaftaran' => $mergedData->id_pendaftaran,
            'status_pendaftaran' => 1,
            'catatan' => "Mohon tunggu untuk proses verifikasi",
        ]);

        return redirect('/pendaftaran/cek-status')->with("success", "Pendaftaran berhasil disubmit!");

    }

    public function viewCekStatus()
    {
        $user = Auth::user();

        if (!$user->pendaftaran()->exists()) {
            return redirect('/pendaftaran')->with("error", "Anda belum mendaftar!");
        }

        $pendaftaran = $user->pendaftaran;

        $riwayatPendaftaran = $pendaftaran->riwayatPendaftaran;

        return view('pendaftaran_cek_status', ['pendaftaran' => $pendaftaran, 'riwayatPendaftaran' => $riwayatPendaftaran]);
    }

}

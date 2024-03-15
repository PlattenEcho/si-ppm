<?php

namespace App\Livewire;

use App\Models\Pendaftaran;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class EditPendaftaran extends ModalComponent
{
    use WithFileUploads;

    public $pendaftaran;
    public $pendaftaranId;
    public $name;
    public $nim;
    public $email;
    public $no_telp;
    public $jenjang;
    public $universitas;
    public $program_studi;
    public $alamat;
    public $tanggal_mulai;
    public $tanggal_akhir;
    public $motivasi;
    public $rencana_kegiatan;
    public $scan_ktm;
    public $surat_pengantar;
    public bool $loadingState = false;
    public $inputSuratPengantar;
    public $inputScanKtm;
    public $selectedJenjang;
    public function mount($pendaftaranId)
    {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->firstOrFail();
        $this->name = $this->pendaftaran->name;
        $this->nim = $this->pendaftaran->nim;
        $this->email = $this->pendaftaran->email;
        $this->no_telp = $this->pendaftaran->no_telp;
        $this->jenjang = $this->pendaftaran->jenjang;
        $this->universitas = $this->pendaftaran->universitas;
        $this->program_studi = $this->pendaftaran->program_studi;
        $this->alamat = $this->pendaftaran->alamat;
        $this->tanggal_mulai = $this->pendaftaran->tanggal_mulai;
        $this->tanggal_akhir = $this->pendaftaran->tanggal_akhir;
        $this->motivasi = $this->pendaftaran->motivasi;
        $this->rencana_kegiatan = $this->pendaftaran->rencana_kegiatan;
        $this->scan_ktm = $this->pendaftaran->scan_ktm;
        $this->surat_pengantar = $this->pendaftaran->surat_pengantar;

        if ($this->jenjang == 'SMK') {
            $this->selectedJenjang = 1;
        } else if ($this->jenjang == 'S1') {
            $this->selectedJenjang = 2;
        } else {
            $this->selectedJenjang = 3;
        }
    }

    public function render()
    {
        $keys = [
            1 => 'SMK',
            2 => 'S1',
            3 => 'Lainnya',
        ];
        $jenjangUser = $this->jenjang;
        if ($jenjangUser == 'SMK') {
            $bidang = 1;
        } else if ($jenjangUser == 'S1') {
            $bidang = 2;
        } else {
            $bidang = 3;
        }
        return view('livewire.edit-pendaftaran', compact('keys', 'bidang', 'jenjangUser'));
    }

    public function editPendaftaran()
    {
        $this->loadingState = true;

        $validationRules = [
            'name' => 'required|string|max:50',
            'nim' => 'required|string|max:30',
            'email' => 'required|email:dns|max:50',
            'no_telp' => 'required|numeric',
            'selectedJenjang' => 'required|numeric',
            'universitas' => 'required|string|max:50',
            'program_studi' => 'nullable|string|max:50',
            'alamat' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'motivasi' => 'required|string',
            'rencana_kegiatan' => 'required|string',
            'inputScanKtm' => 'nullable|mimes:jpeg,png,pdf|max:4096',
            'inputSuratPengantar' => 'nullable|mimes:jpeg,png,pdf|max:4096',
        ];

        if (is_null($this->inputSuratPengantar)) {
            unset($validationRules['inputSuratPengantar']);
        }
        if (is_null($this->inputScanKtm)) {
            unset($validationRules['inputScanKtm']);
        }

        $newJenjang = $this->selectedJenjang;

        $this->validate($validationRules);

        $updateData = [
            'name' => $this->name,
            'nim' => $this->nim,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'universitas' => $this->universitas,
            'jenjang' => $newJenjang,
            'program_studi' => $this->program_studi,
            'alamat' => $this->alamat,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
            'motivasi' => $this->motivasi,
            'rencana_kegiatan' => $this->rencana_kegiatan,
        ];

        // if ($this->jenjang != $this->pendaftaran->jenjang) {
        //     $updateData['jenjang'] = $this->jenjang;
        // }

        if (!is_null($this->inputScanKtm)) {
            $ktmExtension = $this->inputScanKtm->extension();
            $ktmFileName = $this->name . '_' . $this->universitas . '_ktm.' . $ktmExtension;
            $updateData['scan_ktm'] = $this->inputScanKtm->storeAs('scan_ktm', $ktmFileName, 'public');
        } else {
            $updateData['scan_ktm'] = $this->pendaftaran->scan_ktm;
        }

        if (!is_null($this->inputSuratPengantar)) {
            $suratPengantarExtension = $this->inputSuratPengantar->extension();
            $suratPengantarFileName = $this->name . '_' . $this->universitas . '_surat_pengantar.' . $suratPengantarExtension;
            $updateData['surat_pengantar'] = $this->inputSuratPengantar->storeAs('surat_pengantar', $suratPengantarFileName, 'public');
        } else {
            $updateData['surat_pengantar'] = $this->pendaftaran->surat_pengantar;
        }

        $this->pendaftaran->update($updateData);

        return redirect()->to('/admin/daftar-peserta')->with('success', $this->pendaftaran->name . ' berhasil diedit!');
    }


}

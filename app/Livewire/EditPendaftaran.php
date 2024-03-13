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

    public function mount($pendaftaranId)
    {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->firstOrFail();
        $this->name = $this->pendaftaran->name;
        $this->nim = $this->pendaftaran->nim;
        $this->email = $this->pendaftaran->email ;
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
    }

    public function render()
    {   
        $keys = [
            1 => 'SMK',
            2 => 'S1',
            3 => 'Lainnya',
        ];
        $jenjangUser = $this->jenjang;
        if ($jenjangUser == 'SMK'){
            $bidang = 1;
        }else if($jenjangUser == 'S1'){
            $bidang = 2;
        }else{
            $bidang = 3;
        }
        return view('livewire.edit-pendaftaran', compact('keys', 'bidang', 'jenjangUser'));
    }

    public function editPendaftaran()
    {
        $this->validate([
            'name' => 'required|string|max:50',
            'nim' => 'required|string|max:30',
            'email' => 'required|email:dns|max:50',
            'no_telp' => 'required|numeric',
            'jenjang' => 'required|numeric',
            'universitas' => 'required|string|max:50',
            'program_studi' => 'nullable|string|max:50',
            'alamat' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'motivasi' => 'required|string',
            'rencana_kegiatan' => 'required|string',
            'scan_ktm' => 'nullable|mimes:jpeg,png,pdf|max:4096',
            'surat_pengantar' => 'nullable|mimes:jpeg,png,pdf|max:4096',
        ]);

        $updateData = [
            'name' => $this->name,
            'nim' => $this->nim,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'universitas' => $this->universitas,
            'program_studi' => $this->program_studi,
            'alamat' => $this->alamat,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
            'motivasi' => $this->motivasi,
            'rencana_kegiatan' => $this->rencana_kegiatan,
        ];
        
        if ($this->jenjang != $this->pendaftaran->jenjang) {
            $updateData['jenjang'] = $this->jenjang;
        }

        if ($this->scan_ktm != $this->pendaftaran->scan_ktm) {
            $updateData['scan_ktm'] = $this->scan_ktm;
        }
    
        if ($this->surat_pengantar != $this->pendaftaran->surat_pengantar) {
            $updateData['surat_pengantar'] = $this->surat_pengantar;
        }

        $this->pendaftaran->update($updateData);


        return redirect()->to('/admin/daftar-peserta')->with('success', $this->pendaftaran->name . ' berhasil diedit!');
    }
}

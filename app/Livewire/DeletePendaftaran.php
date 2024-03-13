<?php

namespace App\Livewire;

use App\Models\Pendaftaran;
use App\Models\RiwayatPendaftaran;
use App\Models\SuratPenerimaan;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeletePendaftaran extends ModalComponent
{
    public $pendaftaran;
    public $pendaftaranId;
    public function mount($pendaftaranId)
    {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.delete-pendaftaran');
    }

    public function delete()
    {
        RiwayatPendaftaran::where('id_pendaftaran', $this->pendaftaranId)->delete();
        SuratPenerimaan::where('id_pendaftaran', $this->pendaftaranId)->delete();
        Pendaftaran::where('id_pendaftaran', $this->pendaftaranId)->delete();

        return redirect()->to('/admin/daftar-peserta')->with('success', $this->pendaftaran->name . ' berhasil dihapus!');
    }

    public function cancel()
    {
        $this->dispatch('closeModal');
    }
}

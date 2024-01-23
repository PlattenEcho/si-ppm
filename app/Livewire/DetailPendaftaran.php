<?php

namespace App\Livewire;

use App\Jobs\SendEmailJob;
use App\Mail\StatusPendaftaranMail;
use App\Mail\WelcomeMail;
use App\Models\Pendaftaran;
use App\Models\RiwayatPendaftaran;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DetailPendaftaran extends ModalComponent
{
    public $pendaftaran;
    public $pendaftaranId;
    public $selectedStatus;
    public $catatan;

    protected $rules = [
        'selectedStatus' => 'required|in:1,2,3,4,5,6,7,8,9',
        'catatan' => 'required|string|max:255',
    ];

    public function mount($pendaftaranId)
    {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->firstOrFail();
        $this->selectedStatus = $this->pendaftaran->status_pendaftaran;
    }

    public function getStatusOptions()
    {
        return Pendaftaran::statusCodes()->toArray();
    }


    public function render()
    {
        return view('livewire.detail-pendaftaran', [
            'statusOptions' => $this->getStatusOptions(),
        ]);
    }

    public function updateStatus()
    {
        $this->validate();

        $pendaftaran = Pendaftaran::where('id_pendaftaran', $this->pendaftaranId)->firstOrFail();

        $pendaftaran->status_pendaftaran = $this->selectedStatus;
        $pendaftaran->save();

        Mail::to($pendaftaran->email)->send(new StatusPendaftaranMail($pendaftaran->name, $pendaftaran->status));
        // SendEmailJob::dispatch($pendaftaran)->onQueue('emails');

        RiwayatPendaftaran::create([
            'id_pendaftaran' => $pendaftaran->id_pendaftaran,
            'status_pendaftaran' => $this->selectedStatus,
            'catatan' => $this->catatan,
        ]);

        return redirect()->to('/admin/daftar-peserta')->with('success', 'Status berhasil diupdate!');


        // // Emit an event to close the modal
        // $this->dispatch('closeModal');
        // session()->flash('success', 'Update tersimpan');

    }
}

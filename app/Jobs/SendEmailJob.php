<?php

namespace App\Jobs;

use App\Mail\StatusPendaftaranMail;
use App\Models\Pendaftaran;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $pendaftaran;

    /**
     * Create a new job instance.
     */
    public function __construct(Pendaftaran $pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
    
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->pendaftaran->email)->send(new StatusPendaftaranMail($this->pendaftaran->name, $this->pendaftaran->status));
    }
}

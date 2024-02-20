<?php

namespace App\Mail;

use App\Models\Pendaftaran;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminPendaftaranMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admin Pendaftaran Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         markdown: 'mail.status-pendaftaran-mail',
    //         with: [
    //             'name' => $this->name,
    //             'status' => $this->status,
    //         ],

    //     );
    // }

    public function build()
    {
        $customSubject = $this->pendaftaran->idpendaftaran . ' - Pendaftaran Baru - Diskominfo Semarang';

        return $this->markdown('mail.admin-pendaftaran-mail')
            ->with([
                'pendaftaran' => $this->pendaftaran,
            ])
            ->subject($customSubject);
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

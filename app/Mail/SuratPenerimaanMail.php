<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuratPenerimaanMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private string $name, private string $file)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Surat Penerimaan Magang - Diskominfo Semarang',
        );
    }

    /**
     * Get the message content definition.
     */
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

        return $this->markdown('mail.surat-penerimaan-mail')
            ->with([
                'name' => $this->name,
            ])
            ->attach(public_path('storage/'.$this->file), [
                'as' => $this->name.' - Surat Penerimaan.pdf',
            ]);

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

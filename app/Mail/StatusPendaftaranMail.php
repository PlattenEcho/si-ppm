<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusPendaftaranMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public function __construct(private string $name, private string  $status)
    {
        $subject = $status . '- Diskominfo Semarang';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
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
        $customSubject = $this->status . ' - Diskominfo Semarang';

        return $this->markdown('mail.status-pendaftaran-mail')
            ->with([
                'name' => $this->name,
                'status' => $this->status,
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

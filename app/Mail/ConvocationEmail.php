<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConvocationEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $candidat;
    public $attachmentPath;

    /**
     * Create a new message instance.
     */
    public function __construct($candidat, $attachmentPath)
    {
        $this->candidat = $candidat;
        $this->attachmentPath = $attachmentPath;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'CONVOCATION CONCOURS',
        );
    }

    public function build()
    {
        return $this->subject($this->subject)
            ->view('mail.mail_convocation')
            ->attach($this->attachmentPath);
    }


    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

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

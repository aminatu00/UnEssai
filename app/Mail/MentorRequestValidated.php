<?php

namespace App\Mail;

use App\Models\DemandeMentorat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MentorRequestValidated extends Mailable
{
    use Queueable, SerializesModels;


    
    public $mentorRequest;

    public function __construct(DemandeMentorat $mentorRequest)
    {
        $this->mentorRequest = $mentorRequest;
    }

    public function build()
    {
        return $this->view('emails.messageValidation', ['mentorRequest' => $this->mentorRequest]);
    }

    /**
     * Create a new message instance.
     */
    

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Mentor Request Validated',
        );
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
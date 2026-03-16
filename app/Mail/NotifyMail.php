<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $heading;
    public string $body;
    public ?string $actionUrl;
    public ?string $actionLabel;
    public string  $color; // primary | success | warning | danger

    public function __construct(
        string  $heading,
        string  $body,
        ?string $actionUrl   = null,
        ?string $actionLabel = null,
        string  $color       = 'primary'
    ) {
        $this->heading     = $heading;
        $this->body        = $body;
        $this->actionUrl   = $actionUrl;
        $this->actionLabel = $actionLabel;
        $this->color       = $color;
    }

    public function envelope(): Envelope
    {
        return new Envelope(subject: $this->heading);
    }

    public function content(): Content
    {
        return new Content(view: 'emails.notify');
    }
}
<?php

namespace App\Mail;

use App\Models\InquiryMaster;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;

    /**
     * Create a new message instance.
     */
    public function __construct(InquiryMaster $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Inquiry Status Updated')
                    ->markdown('emails.inquiry-status');
    }
}

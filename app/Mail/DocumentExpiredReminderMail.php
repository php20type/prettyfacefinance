<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DocumentExpiredReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $clinicDetails;
    public $expiryDate;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clinicDetails, $expiryDate)
    {
        $this->clinicDetails = $clinicDetails;
        $this->expiryDate = $expiryDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Insurance expiry notification.')
            ->view('emails.document_expired_reminder_mail');
    }
}

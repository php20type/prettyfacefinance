<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationDisApproved extends Mailable
{
    use Queueable, SerializesModels;
    public $clinicModel;
    public $rejectionReason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clinicModel, $rejectionReason)
    {
        $this->clinicModel = $clinicModel;
        $this->rejectionReason = $rejectionReason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $rejectionReason = $this->rejectionReason;
        return $this->subject('Re: Application Disapproval')
            ->view('emails.application_disapproved', compact('rejectionReason'));
    }
}

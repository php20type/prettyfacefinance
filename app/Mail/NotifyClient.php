<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyClient extends Mailable
{
    use Queueable, SerializesModels;
    public $clinicModel;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($clinicModel)
    {
        $this->clinicModel = $clinicModel;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $clinics = $this->clinicModel;
        return $this->subject('Form has been filled by this clinic ' . $clinics->name)
            ->view('emails.notify_client');
    }
}

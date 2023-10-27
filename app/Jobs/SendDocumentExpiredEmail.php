<?php

namespace App\Jobs;

use App\Mail\DocumentExpiredReminderMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendDocumentExpiredEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $clinicDetails;
    protected $expiryDate;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
        $this->clinicDetails = $details['clinicDetails'];
        $this->expiryDate = $details['expiryDate'];
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $clinicDetails = $this->clinicDetails;
        $expiryDate = $this->expiryDate;
        Mail::to($this->details['email'])->send(new DocumentExpiredReminderMail($clinicDetails, $expiryDate));
    }
}

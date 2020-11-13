<?php

namespace App\Mail;

use App\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewLeadHasBeenAssigned extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Lead
     */
    public $lead;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lead $lead)
    {
        //
        $this->lead = $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.new-lead-assigned')
            ->subject('A new lead has been assligned: '.$this->lead->full_name)
            ->with('lead', $this->lead);
    }
}

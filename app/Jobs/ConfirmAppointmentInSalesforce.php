<?php

namespace App\Jobs;

use App\AuthToken;
use App\Lead;
use App\Actions\SalesforceService;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ConfirmAppointmentInSalesforce implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $data;
    /**
     * @var Lead
     */
    private $lead;

    /**
     * Create a new job instance.
     *
     * @param  Lead  $lead
     * @param $data
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $service = new SalesforceService($this->lead->user);
        $service->confirmAppointment($this->lead);
    }
}

<?php

namespace App\Jobs;

use App\Helpers\HelloSign;
use App\SalesDocument;
use App\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class SyncHelloSignTemplates
 * @package App\Jobs
 */
class SyncHelloSignTemplates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Toggle to attach templates to all services
     *
     * @var bool
     */
    public $withoutServiceAssignment;

    /**
     * Holds all created sales document IDs
     * @var array
     */
    public $salesDocIds = [];

    /**
     * SyncHelloSignTemplates constructor.
     * @param bool $withoutServiceAssignment
     */
    public function __construct(bool $withoutServiceAssignment = false)
    {
        $this->withoutServiceAssignment = $withoutServiceAssignment;
    }

    /**
     * Execute the job.
     *
     * @throws \HelloSign\BaseException
     */
    public function handle()
    {
        // Holder
        $salesDocIds = [];

        // Grab an instance of HelloSign
        $sign = app(HelloSign::class);

        // Verify we have auth
        if (!$sign->authenticated()) {
            return;
        }

        // Fetch our templates
        $templates = $sign->getTemplates();

        $templates->each(function (array $item) {
            $salesDoc = SalesDocument::whereTemplateId($item['template_id'])->first() ?? new SalesDocument();
            $salesDoc->template_id = $item['template_id'] ?? null;
            $salesDoc->title = $item['title'] ?? null;
            $salesDoc->message = $item['message'] ?? null;
            $salesDoc->type = SalesDocument::TYPE_AFTER_SEVEN_SEVEN;
            $salesDoc->save();

            $this->salesDocIds[] = $salesDoc->id;
        });

        if ($this->withoutServiceAssignment) {
            return;
        }

        // Attach these to all services
        Service::all()->each(function (Service $service) {
            // Attach
            $service->salesDocuments()
                ->sync($this->salesDocIds);
        });
    }
}

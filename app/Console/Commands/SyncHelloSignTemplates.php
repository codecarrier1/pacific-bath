<?php

namespace App\Console\Commands;

use App\Helpers\HelloSign;
use App\SalesDocument;
use Illuminate\Console\Command;

class SyncHelloSignTemplates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:hellosign:templates:fetch {--w|withoutServiceAssignment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch all templates from HelloSign.';

    /**
     * Execute the job
     *
     * @param HelloSign $helloSign
     * @return bool
     */
    public function handle(HelloSign $helloSign)
    {
        $withoutServiceAssignment = $this->option('withoutServiceAssignment') ?? false;

        $job = new \App\Jobs\SyncHelloSignTemplates($withoutServiceAssignment);

        dispatch_now($job);

        $this->info('Updated ' . SalesDocument::count() . ' HelloSign templates with the default type: ' . SalesDocument::TYPE_AFTER_SEVEN_SEVEN);

        if ($withoutServiceAssignment) {
            $this->info('Not attaching imported templates to all services, please do this manually.');
        }

        return true;
    }
}

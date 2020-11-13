<?php

namespace App\Observers;

use App\ProcessorStatus;
use Illuminate\Support\Facades\Cache;

class ProcessorStatusObserver
{
    public function saved(ProcessorStatus $status)
    {
        Cache::forget('processor_statuses');
        Cache::forget('all_statuses');
    }
}

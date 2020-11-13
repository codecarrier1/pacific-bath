<?php

namespace App\Observers;

use App\SalesDisposition;
use Illuminate\Support\Facades\Cache;

class SalesDispositionObserver
{
    public function saved(SalesDisposition $disposition)
    {
        Cache::forget('sales_dispositions');
        Cache::forget('all_statuses');
    }
}

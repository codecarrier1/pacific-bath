<?php

namespace App\Observers;

use App\InstallationStatus;
use Illuminate\Support\Facades\Cache;

class InstallationStatusObserver
{
    public function saved(InstallationStatus $status)
    {
        Cache::forget('installation_statuses');
        Cache::forget('all_statuses');
    }
}

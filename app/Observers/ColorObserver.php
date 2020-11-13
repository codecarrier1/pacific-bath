<?php

namespace App\Observers;

use App\Color;
use Illuminate\Support\Facades\Cache;

class ColorObserver
{
    public function saved(Color $color)
    {
        Cache::tags(['colors'])->flush();
        Cache::forget('swatch_url_' . $color->id);
    }
}

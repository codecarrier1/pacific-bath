<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Collection;

class SingleUserProjectsService
{
    public function get(User $user)
    {
        /** @var Collection $data */
        $data = $user->leadsWithData;

        $data->each(function (&$item) {
            $item->route = route('discovery.questions', [$item->id]);
        });

        $now = now('PST');

        return $data->partition(function ($lead) use ($now) {
            if ($now->hour < config('brightoak.lead_cutoff_hour')) {
                return $lead->appointment_time->toDateString() === $now->toDateString();
            }

            return $lead->appointment_time->addDay()->toDateString() === $now->addDay()->toDateString(); // times in the future are greater than now
        });
    }
}

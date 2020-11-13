<?php

namespace App\Services;

use App\User;
use App\Service;
use App\SalesDisposition;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class SalesTeamStatsService
{
    public function get()
    {
        $salesReps = User::Role('Sales Representative')->with('leads', 'location', 'media')->get();
        $stats = [];
        foreach ($salesReps as $salesRep) {
            /** @var Collection $leads */
            $leads = $salesRep->leads;
            $showerBt = $leads->whereIn('service_id', [Service::SHOWERS, Service::BATHTUBS]);
            $walkIn = $leads->where('service_id', Service::WALK_INS);
            $walkInSoldCount = $walkIn->where('sales_disposition_id', SalesDisposition::SALES)->count();
            $showerBtSold = $showerBt->where('sales_disposition_id', SalesDisposition::SALES);
            $totalSoldCount = $leads->where('sales_disposition_id', SalesDisposition::SALES)->count();
            $totalCount = $leads->count();
            $data = [
                'name' => $salesRep->fullName,
                'avatar' => $salesRep->getSmallAvatar(),
                'title' => 'Sales Agent',
                'office' => $salesRep->location->name,
                'showers_bt_count' => $showerBt->count(),
                'walk_ins_count' => $walkIn->count(),
                'revenue' => $leads->sum('amount'),
                'projects_count' => $totalCount,
                'projects_sold_count' => $totalSoldCount,
                'showers_bt_sold_count' => $showerBtSold->count(),
                'walk_in_sold_count' => $walkInSoldCount,
                'has_unacknowledged' => (bool) $leads->where('sales_disposition_id', SalesDisposition::NEW)->count(),
                'route' => route('dashboard.sales', [$salesRep]),
            ];
            $data['total_close_rate'] = ($totalCount) ? $totalSoldCount / $totalCount : 0;
            $data['showers_bt_close_rate'] = ($data['showers_bt_count']) ? $data['showers_bt_sold_count'] / $data['showers_bt_count'] : 0;
            $data['walk_ins_close_rate'] = ($data['walk_ins_count']) ? $data['walk_in_sold_count'] / $data['walk_ins_count'] : 0;
            $stats[] = $data;
        }

        return $stats;
    }
}

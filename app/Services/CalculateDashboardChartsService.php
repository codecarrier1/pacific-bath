<?php

namespace App\Services;

use App\Lead;
use App\Service;
use App\User;
use Carbon\Carbon;
use App\SalesDisposition;
use Illuminate\Contracts\Auth\Authenticatable;

class CalculateDashboardChartsService
{
    /**
     * @var User
     */
    protected $user;

    public function __construct(Authenticatable $user = null)
    {
        $this->user = $user;
    }

    public function getChartData()
    {
        $thisMonth = Carbon::now();
        $lastMonth = Carbon::now()->subMonth();
        [$thisMonthLeads, $lastMonthLeads] = $this->getLeads($thisMonth, $lastMonth);
        $services = Service::select('name')->get()->pluck('name');
        $data = [];
        foreach ($services as $service) {
            $data['project_breakdown'][] = ['name' => $service, 'count' => $thisMonthLeads->where('service.name', $service)->count()];
            $data['close_rate'][] = ['name' => $service, 'closed' => $thisMonthLeads->where('sales_disposition_id', SalesDisposition::SALES)->count(), 'count' => $thisMonthLeads->where('service.name', $service)->count()];
        }

        $data['revenue'] = [
            'this_month' => $thisMonthLeads->sum('amount'),
            'last_month' => $lastMonthLeads->sum('amount'),
        ];

        return $data;
    }

    protected function getLeads(Carbon $thisMonth, Carbon $lastMonth)
    {
        if ($this->user === null) {
            return [
                $thisMonthLeads = Lead::whereMonth('appointment_time', $thisMonth->month)->with('service')->get(),
                $lastMonthLeads = Lead::whereMonth('appointment_time', $lastMonth->month)->with('service')->get(),
            ];
        }

        return [
            $this->user->leads()->whereMonth('appointment_time', $thisMonth->month)->with('service')->get(),
            $this->user->leads()->whereMonth('appointment_time', $lastMonth->month)->with('service')->get(),
            ];
    }
}

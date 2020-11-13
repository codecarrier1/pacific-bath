<?php

namespace App\Http\Controllers;

use App\Lead;
use Carbon\Carbon;
use App\SalesDisposition;
use Illuminate\Http\Request;
use App\Services\SalesTeamStatsService;
use App\Services\CalculateDashboardChartsService;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view_admin_dashboard']);
    }

    /**
     * Returns an array of arrays. Each array contains the summary data for a sales rep.
     * Example is below.
     * array:14 [▼
        "name" => "Tressa Zboncak"
        "avatar" => "/relative/url/to/avatar.jpg"
        "title" => "Sales Agent"
        "office" => "Portland"
        "showers_bt_count" => 9
        "walk_ins_count" => 7
        "revenue" => 468872
        "projects_count" => 16
        "projects_sold_count" => 0
        "showers_bt_sold_count" => 0
        "walk_in_sold_count" => 0
        "total_close_rate" => 0
        "showers_bt_close_rate" => 0
        "walk_ins_close_rate" => 0
        "has_unacknowledged" => true,
    ]
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $salesReps = app(SalesTeamStatsService::class)->get();

        return view('admin.dashboard', compact('salesReps'));
    }

    public function charts()
    {
        return response()->json((new CalculateDashboardChartsService)->getChartData());
    }
}

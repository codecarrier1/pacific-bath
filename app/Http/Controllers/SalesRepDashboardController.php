<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\ProcessorStatus;
use App\SalesDisposition;
use App\InstallationStatus;
use Illuminate\Support\Facades\Cache;
use App\Services\SingleUserProjectsService;
use App\Services\CalculateDashboardChartsService;

class SalesRepDashboardController extends Controller
{
    public function index()
    {
        return $this->show(auth()->user());
    }

    /**
     * $installationStatuses, $processorStatuses, and $salesDispositions return an array of key => value pairs
     * the ID of the status is the array key, the name of the status is the value.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        $this->authorize('View', $user);
        // Reset this every time its shown
        session()->forget('salesRepId');
        // Then set to the currently displayed salesrep
        session()->put('salesRepId', $user->id);
        [$upcomingProjects, $pastProjects] =  app(SingleUserProjectsService::class)->get($user) ;

        $showProcessorDropdown = auth()->user()->can('update_processor_status');
        $showInstallationDropdown = auth()->user()->can('update_installation_status');
        $showDispositionDropdown = auth()->user()->can('update_disposition_status');
        $isAdmin = auth()->user()->hasRole('Administrator');
        $statuses = $this->getStatuses();
        $upcomingLabel = (now('PST')->hour < config('brightoak.lead_cutoff_hour')) ? "Today's Projects: " . Carbon::now()->format('F j, Y') : "Tomorrow's Projects: " . Carbon::now()->addDay()->format('F j, Y');
        $route = route('sales.dashboard.charts', ['user' => $user]);
        $breadcrumbs = collect([['name' => $user->full_name, 'route' => route('dashboard.sales', [$user])]]);
        return view('sales.dashboard')
            ->with('upcomingProjects', $upcomingProjects)
            ->with('pastProjects', $pastProjects)
            ->with('showInstallationDropdown', $showInstallationDropdown)
            ->with('showProcessorDropdown', $showProcessorDropdown)
            ->with('showDispositionDropdown', $showDispositionDropdown)
            ->with('route', $route)
            ->with('statuses', $statuses)
            ->with('upcomingLabel', $upcomingLabel)
            ->with('isAdmin', $isAdmin)
            ->with('salesRep', $user)
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function charts(?User $user)
    {
        if (! $user->id) {
            $user = auth()->user();
        }
        $service = new CalculateDashboardChartsService($user);

        return response()->json($service->getChartData());
    }

    private function getStatuses()
    {
        return Cache::rememberForever('all_statuses', function () {
            $collection = collect();
            $allDispositions = SalesDisposition::all(['id', 'name']);
            $acknowledged = SalesDisposition::all(['id', 'name'])->except([SalesDisposition::NEW]);
            $newDispositions = SalesDisposition::findMany([SalesDisposition::NEW, SalesDisposition::ACKNOWLEDGED]);
            $collection->put('installation', InstallationStatus::all(['id', 'name'])->toJson());
            $collection->put('all-dispositions', $allDispositions->toJson());
            $collection->put('acknowledged', $acknowledged->toJson());
            $collection->put('new-dispositions', $newDispositions->toJson());
            $collection->put('processor', ProcessorStatus::all(['id', 'name'])->toJson());
            return $collection->toArray();
        });
    }
}

<?php

namespace App\Http\View\Composers;

use App\Lead;
use App\Service;
use Illuminate\View\View;

class NeedsAnalysisSubNavViewComposer
{

    private $salesRepId;
    /**
     * @var string
     */
    private $routeName;

    /**
     * @var Lead|Lead[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    private $lead;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->routeName = request()->route()->getName();
        $this->lead = request()->route()->parameter('lead');

    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        if ($this->lead->service_id === Service::WALK_INS) {
            $secondText = 'Job Specifications';
            $secondRoute = route('job-specifications', [$this->lead]);
            $secondRouteName = 'job-specifications';
        } else {
            $secondText = 'Base Measurements';
            $secondRoute = route('measurements.calculate', [$this->lead]);
            $secondRouteName = 'measurements.calculate';
        }
        $discoveryRoute = route('discovery.questions', [$this->lead]);

        $scopeRoute = route('needs.analysis.scope.of.work', $this->lead);

        $view->with('secondText', $secondText)
            ->with('secondRoute', $secondRoute)
            ->with('discoveryRoute', $discoveryRoute)
            ->with('secondRouteName', $secondRouteName)
            ->with('scopeRoute', $scopeRoute);
    }

}

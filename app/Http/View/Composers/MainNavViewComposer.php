<?php

namespace App\Http\View\Composers;

use App\Lead;
use Illuminate\View\View;

class MainNavViewComposer
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
        $this->lead = request()
            ->route()
            ->parameter('lead');

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $needsAnalysisRoute = route('discovery.questions', [
            $this->lead,
        ]);

        $buildEstimateRoute = route('build-estimate', [
            'lead' => $this->lead,
            'step' => 1,
        ]);

        $rollSheetRoute = route('roll.sheet.summary', [
            'lead' => $this->lead,
        ]);

        $salesDocumentationRoute = route('sales.documents.summary', [
            'lead' => $this->lead,
        ]);

        $view->with('needsAnalysisRoute', $needsAnalysisRoute)
            ->with('buildEstimateRoute', $buildEstimateRoute)
            ->with('rollSheetRoute', $rollSheetRoute)
            ->with('salesDocumentationRoute', $salesDocumentationRoute);
    }
}

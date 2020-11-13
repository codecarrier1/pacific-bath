<?php

namespace App\Http\View\Composers;

use App\Lead;
use App\Service;
use Illuminate\View\View;

class BottomNavViewComposer
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
        $this->salesRepId = session()->get('salesRepId') ?? auth()->id();
        $this->routeName = request()->route()->getName();
        // Model route binding works here
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
        $data = $this->getData($view);
        $view->with('salesRepDashRoute', route('dashboard.sales', ['user' => $this->salesRepId]))
            ->with('nextText', $data['nextText'])
            ->with('prevText', $data['prevText'])
            ->with('nextLink', $data['nextLink'])
            ->with('prevLink', $data['prevLink']);
    }

    private function getData($view)
    {
        if ($this->routeName === 'discovery.questions') {
            $prevText = 'Sales Dashboard';
            $prevLink = route('dashboard.sales', ['user' => $this->salesRepId]);
            if ($this->lead->service_id === Service::WALK_INS) {
                $nextText = 'Job Specifications';
                $nextLink = route('job-specifications', $this->lead);
            } else {
                $nextText = 'Calculate Measurements';
                $nextLink = route('measurements.calculate', $this->lead);
            }
        } else if ($this->routeName === 'job-specifications' ||
            $this->routeName === 'measurements.calculate') {
            $prevText = 'Discovery Questions';
            $prevLink = route('discovery.questions', $this->lead);
            $nextText = 'Scope of Work';
            $nextLink = route('needs.analysis.scope.of.work', $this->lead);
        } else if ($this->routeName === 'needs.analysis.scope.of.work') {
            if ($this->lead->service_id === Service::WALK_INS) {
                $prevText = 'Job Specifications';
                $prevLink = route('job-specifications', $this->lead);
            } else {
                $prevText = 'Calculate Measurements';
                $prevLink = route('measurements.calculate', $this->lead);
            }
            $nextText = 'Build Estimate';
            $nextLink = route('build-estimate', ['lead' => $this->lead, 'step' => 1]);
        } else if ($this->routeName === 'sales.documents.summary') {
            $prevText = 'Payment Options';
            $prevLink = route('roll.sheet.product.info', $this->lead);
            $nextText = 'Deposit Information';
            $nextLink = route('sales.payment', $this->lead);
        } else if ($this->routeName === 'sales.payment') {
            $prevText = 'Document Summary';
            $prevLink = route('sales.documents.summary', $this->lead);

            $nextText = 'Complete and Exit';
            $nextLink = route('dashboard.sales', $this->lead->user);
        } else if($this->routeName === 'roll.sheet.summary'){
            $prevText = 'Construction & Additions';
            $prevLink = route('build-estimate', ['lead' => $this->lead, 'step' => 5]);
            $nextLink = route('roll.sheet.product.info', ['lead' => $this->lead]);
            $nextText = 'Product Information';
        } else if ($this->routeName === 'roll.sheet.product.info'){
            $prevText = 'Order Summary';
            $prevLink = route('roll.sheet.summary', [$this->lead]);
            $nextText = 'Payment Options';
            $nextLink = route('roll-sheet.payment-options', [$this->lead]);
        } else if ($this->routeName === 'roll-sheet.payment-options'){
            $prevText = 'Product Information';
            $prevLink = route('roll.sheet.product.info', [$this->lead]);
            $nextText = 'Sales Documentation';
            $nextLink = route('sales.documents.summary', [$this->lead]);
        }


        else {
            $prevText = null;
            $prevLink = null;
            $nextText = null;
            $nextLink = null;
        }

        return compact('prevLink', 'prevText', 'nextLink', 'nextText');
    }
}

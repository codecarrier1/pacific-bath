<?php

namespace App\Http\View\Composers;

use App\Lead;
use Illuminate\View\View;

class BreadcrumbViewComposer
{

    /**
     * @var Lead|Lead[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    private $lead;

    /**
     * @var \App\User|\App\User[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    private $salesRep;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lead = request()->route()->parameter('lead');
        $this->salesRep = request()->route()->parameter('user');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $lead = $this->lead;
        if($lead){
            $breadcrumbs = [
                ['name' => $lead->user->full_name, 'route' => route('dashboard.sales', [$lead->user])],
                ['name' => $lead->last_name . ': ' . $lead->service->name, 'route' => route('discovery.questions', [$lead])]
            ];
        } else if($this->salesRep){
            $breadcrumbs = [
                ['name' => $this->salesRep->full_name, 'route' => route('dashboard.sales', [$this->salesRep])],
            ];
        } else {
            $breadcrumbs = [
                ['name' => 'Pacific Bath Company', 'route' => route('home')],
            ];
        }
        $view->with('breadcrumbs', $breadcrumbs);
    }

}

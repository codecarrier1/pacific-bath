<?php

namespace App\Http\View\Composers;

use App\Lead;
use Illuminate\View\View;

class BuildEstimateSubNavViewComposer
{

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
        $this->lead = request()->route()->parameter('lead');
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
//        $showerPansRoute = route('product.select', [$this->lead]);
//        $wallsJointsTrimRoute = route('product.select.walls', [$this->lead]);
//        $fixturesAccessoriesRoute = route('product.select.fixtures', [$this->lead]);
//        $selectADoorRoute = route('product.select.door', [$this->lead]);
//        $constructionAdditionsRoute = route('product.select.construction', [$this->lead]);
//        $view->with('wallsJointsTrimRoute', $wallsJointsTrimRoute)
//            ->with('showerPansRoute', $showerPansRoute)
//            ->with('fixturesAccessoriesRoute', $fixturesAccessoriesRoute)
//            ->with('constructionAdditionsRoute', $constructionAdditionsRoute)
//            ->with('selectADoorRoute', $selectADoorRoute);

    }

}

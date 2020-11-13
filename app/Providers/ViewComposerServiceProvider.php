<?php

namespace App\Providers;

use App\Http\View\Composers\BottomNavViewComposer;
use App\Http\View\Composers\BreadcrumbViewComposer;
use App\Http\View\Composers\MainNavViewComposer;
use App\Http\View\Composers\NeedsAnalysisSubNavViewComposer;
use App\Http\View\Composers\BuildEstimateSubNavViewComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['partials.needs-analysis-sub-nav'], NeedsAnalysisSubNavViewComposer::class);
        View::composer(['partials.build-estimate-sub-nav'], BuildEstimateSubNavViewComposer::class);
        View::composer(['partials.btm-nav'], BottomNavViewComposer::class);
        View::composer(['partials.breadcrumbs'], BreadcrumbViewComposer::class);
        View::composer(['partials.main-nav'], MainNavViewComposer::class);
    }
}

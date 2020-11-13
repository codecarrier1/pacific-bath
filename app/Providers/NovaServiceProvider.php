<?php

namespace App\Providers;

use App\Lead;
use App\Product;
use App\User;
use Brightoak\SalesforceOauthAuthorization\SalesforceOauthAuthorization;
use IDF\HtmlCard\HtmlCard;
use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Techouse\TotalRecords\TotalRecords;
use Vyuldashev\NovaPermission\NovaPermissionTool;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->can('view_nova');
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            (new HtmlCard())->width('full')->html('<h1 class="text-center">Welcome!</h1>'),
            new TotalRecords(Lead::class, "Total Leads"),
            new TotalRecords(User::class, "Total Users"),
            new TotalRecords(Product::class, "Total Products"),
            (new HtmlCard())->width('1/3')->view('salesforce'),

        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            NovaPermissionTool::make(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

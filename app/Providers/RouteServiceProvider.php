<?php

namespace App\Providers;

use App\Lead;
use App\ProductCategory;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    public function register()
    {
        Route::bind('productCategory', function ($id) {
            return ProductCategory::with('subCategories')
                ->findOrFail($id);
        });

        Route::bind('lead', function ($id) {
            return Lead::with([
                'service',
                'service.salesDocuments',
                'service.salesDocuments.signers',
            ])
                ->findOrFail($id);
        });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapLoggedInRoutes();

        if (app()->environment() === 'local') {
            $this->mapDevRoutes();
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "dev" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc, but are only available when
     * app.env === 'local'
     *
     * @return void
     */
    protected function mapDevRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/devroutes.php'));
    }

    /**
     * Define the "loggedIn" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc, but also require the 'auth' middleware.
     *
     * @return void
     */
    protected function mapLoggedInRoutes()
    {
        Route::middleware([
            'web',
            'auth',
        ])
            ->namespace($this->namespace)
            ->group(base_path('routes/login-required.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}

<?php

namespace App\Providers;

use App\Color;
use App\Lead;
use App\Note;
use App\Observers\ColorObserver;
use App\Observers\ProductObserver;
use App\Observers\PromotionObserver;
use App\Observers\ShowerPanObserver;
use App\Observers\UserObserver;
use App\ProcessorStatus;
use App\Product;
use App\Promotion;
use App\SubModels\ShowerPan;
use App\User;
use Illuminate\Support\Facades\Blade;
use Mockery\Matcher\Not;
use App\SalesDisposition;
use App\InstallationStatus;
use App\Observers\LeadObserver;
use App\Observers\NoteObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Observers\ProcessorStatusObserver;
use App\Observers\SalesDispositionObserver;
use App\Observers\InstallationStatusObserver;
use NumberFormatter;
use Spatie\ArrayToXml\ArrayToXml;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('brightoak.ide_helper_enabled')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        // Putting the provider here so I don't have to modify config/app.php
        $this->app->register(ViewComposerServiceProvider::class);

        $this->app->registerDeferredProvider(HelloSignServiceProvider::class);

        // TODO refactor this to a class somewhere to make this cleaner
        \Illuminate\Routing\ResponseFactory::macro('xml', function ($xml, $status = 200, array $headers = [], $xmlRoot = 'response') {
            if (is_array($xml)) {
                $xml = ArrayToXml::convert($xml, $xmlRoot);
            } elseif (is_object($xml) && method_exists($xml, 'toArray')) {
                $xml = ArrayToXml::convert($xml->toArray(), $xmlRoot);
            } elseif (is_string($xml)) {
                $xml = $xml;
            } else {
                $xml = '';
            }
            if (!isset($headers['Content-Type'])) {
                $headers = array_merge($headers, ['Content-Type' => 'application/xml']);
            }
            return \Illuminate\Routing\ResponseFactory::make($xml, $status, $headers);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        InstallationStatus::observe(InstallationStatusObserver::class);
        Lead::observe(LeadObserver::class);
        Note::observe(NoteObserver::class);
        ProcessorStatus::observe(ProcessorStatusObserver::class);
        SalesDisposition::observe(SalesDispositionObserver::class);
        Product::observe(ProductObserver::class);
        Color::observe(ColorObserver::class);
        Promotion::observe(PromotionObserver::class);
        User::observe(UserObserver::class);
    }
}

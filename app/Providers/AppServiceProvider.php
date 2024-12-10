<?php

namespace App\Providers;

use App\Console\Services\WebhookService;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Bind for Webhook service

        $this->app->singleton(WebhookService::class, function () {
            return new WebhookService();
        });

        //Filament switch lang
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['uz','en','ru']); // also accepts a closure
        });
    }
}

<?php

namespace App\Providers;

use App\Console\Services\WebhookService;
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
    }
}

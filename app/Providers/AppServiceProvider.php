<?php

namespace App\Providers;

use App\Console\Services\WebhookService;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use SergiX44\Nutgram\Nutgram;

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
    public function boot(Nutgram $bot): void
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

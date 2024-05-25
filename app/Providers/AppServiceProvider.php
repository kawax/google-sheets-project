<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PulkitJalan\Google\Client as GoogleClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->alias(GoogleClient::class, 'google-client');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

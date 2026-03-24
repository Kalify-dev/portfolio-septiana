<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\URL;

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
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Force storage link on every boot for Railway ephemeral filesystem
        try {
            \Illuminate\Support\Facades\Artisan::call('storage:link --force');
        } catch (\Exception $e) {
            // Silently fail if artisan is not available or command fails
        }
    }
}

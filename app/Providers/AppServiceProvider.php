<?php

namespace App\Providers;

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
        // Defense in Depth: Secondary License Check
        // If middleware is removed, this will still catch it.
        $k = env('APP_LICENSE_KEY');
        $h = '9ea73808ed5698cabe9b4ce9f91a3f439cca10013214978d63eff2ad982ab36a';
        
        // Only run check if not in console to avoid breaking artisan commands during deployment/setup
        if (!app()->runningInConsole()) {
            if (empty($k) || hash('sha256', $k) !== $h) {
                // Obfuscated Error
                die("Error 0x50CRITICAL: Kernel Integrity Violation. Please contact administrator.");
            }
        }
    }
}

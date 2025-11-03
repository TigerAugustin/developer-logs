<?php

namespace VendorName\PackageName;

use Illuminate\Support\ServiceProvider;

/**
 * Service Provider for YourPackageName.
 *
 * This class handles the registration of services, configuration,
 * views, and other resources for the package.
 */
class YourPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * This method is called after all other service providers have been registered,
     * meaning you have access to all other services the application has to offer.
     *
     * @return void
     */
    public function boot()
    {
        // --- 1. CONFIGURATION ---
        // Publishes configuration file to be modified by the user.
        // To publish: php artisan vendor:publish --tag="yourpackage-config"
        $this->publishes([
            __DIR__.'/../config/yourpackage.php' => config_path('yourpackage.php'),
        ], 'yourpackage-config');


        // --- 2. ROUTES ---
        // Loads package routes (optional)
        // if (file_exists($file = __DIR__.'/../routes/web.php')) {
        //     $this->loadRoutesFrom($file);
        // }


        // --- 3. VIEWS ---
        // Loads package views and allows them to be overridden by the user.
        // Views can be accessed using 'yourpackage::view-name'.
        // To publish: php artisan vendor:publish --tag="yourpackage-views"
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'yourpackage');

        // $this->publishes([
        //     __DIR__.'/../resources/views' => resource_path('views/vendor/yourpackage'),
        // ], 'yourpackage-views');


        // --- 4. MIGRATIONS ---
        // Loads package migrations (optional)
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     *
     * This method runs very early in the application lifecycle.
     * Any configuration files or environment variables may not be available yet.
     *
     * @return void
     */
    public function register()
    {
        // --- 1. BINDINGS / SINGLETONS ---
        // Register a singleton for the main package class or API access
        // $this->app->singleton('yourpackage', function ($app) {
        //     return new YourPackageClass();
        // });


        // --- 2. MERGE CONFIGURATION ---
        // Merges package config with the application's config file (if it exists).
        $this->mergeConfigFrom(
            __DIR__.'/../config/yourpackage.php', 'yourpackage'
        );


        // --- 3. COMMANDS ---
        // Register your Artisan commands
        // $this->commands([
        //     YourPackageCommand::class,
        // ]);
    }
}

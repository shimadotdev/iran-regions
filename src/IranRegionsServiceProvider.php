<?php

namespace Shimadotdev\IranRegions;

use Illuminate\Support\ServiceProvider;
use Shimadotdev\IranRegions\Commands\InstallCommand;

class IranRegionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('iran', function($app){
            return new Iran();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'iranRegions');

        if ($this->app->runningInConsole()) {

            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            $this->publishes([
                __DIR__.'/../database/seeders' => database_path('seeders'),
            ],'iran-regions');

            $this->commands([
                InstallCommand::class,
            ]);

        }

    }
}

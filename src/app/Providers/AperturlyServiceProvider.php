<?php

namespace Egolive\Aperturly\App\Providers;

use Egolive\Aperturly\App\Console\Commands\AperturlyInstallCommand;
use Illuminate\Support\ServiceProvider;
use Laravel\Breeze\BreezeServiceProvider;

class AperturlyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      $this->app->register(BreezeServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Loading the migrations from the package
        $this->loadMigrationsFrom(__DIR__.'/../../Database/Migrations');

        if ($this->app->runningInConsole()) {
        $this->commands([
          AperturlyInstallCommand::class,
        ]);
      }
    }
}

<?php

namespace Egolive\Aperturly\Providers;

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
      if ($this->app->runningInConsole()) {
        $this->commands([
          BreezeInstallCommand::class,
        ]);
      }
    }
}

<?php

namespace Egolive\Aperturly;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

class AperturlyServiceProvider extends PackageServiceProvider {

  public function configurePackage(Package $package): void {
    $package
      ->name('aperturly')
      ->hasMigrations([
        'create_portfolios_table',
        'create_galleries_table',
        'create_series_table',
        'create_images_table',
      ])
      ->hasInstallCommand(function(InstallCommand $command) {
        // Start message
        $command->startWith(function(InstallCommand $command) {
          $command->info('Starting Aperturly installation...');
        });

        // Publish migrations and assets
        $command->publishMigrations()
          ->askToRunMigrations()
          ->publishAssets();

        // Setup routes
        $command->startWith(function(InstallCommand $command) {
          $routesPath = base_path('routes/web.php');
          $stubPath = __DIR__ . '/stubs/';

          if ($command->confirm('Would you like to install Spatie Laravel-Permission for role management?', true)) {
            file_put_contents($routesPath, file_get_contents($stubPath . 'web_with_permission.stub'), FILE_APPEND);
            $command->call('aperturly:install-permission');
          } else {
            file_put_contents($routesPath, file_get_contents($stubPath . 'web_without_permission.stub'), FILE_APPEND);
          }

          $command->info('Routes have been set up successfully.');
        });

        // Breeze installation and assets compilation
        $command->startWith(function(InstallCommand $command) {
          if ($command->confirm('Would you like to install Breeze and compile assets?', true)) {
            $command->info('Installing Breeze...');
            $command->call('breeze:install', ['stack' => 'blade']);

            $command->info('Installing npm dependencies...');
            exec('npm install');

            $command->info('Compiling assets...');
            exec('npm run build');
          }
        });

        // End message
        $command->endWith(function(InstallCommand $command) {
          $command->info('Aperturly installation complete.');
        });
      });
  }
}

<?php

namespace Egolive\Aperturly;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Console\Command;

class AperturlyServiceProvider extends PackageServiceProvider {

  public function configurePackage(Package $package): void {
    $package
      ->name('aperturly')
      ->hasConfigFile() // Falls es eine Config-Datei gibt
      ->hasMigrations([
        'create_portfolios_table',
        'create_galleries_table',
        'create_series_table',
        'create_images_table',
      ])
      ->hasInstallCommand(function (Command $command) {
        $command->info('Starting Aperturly installation...');

        if (!$command->confirm('Do you want to proceed with the installation?', true)) {
          $command->warn('Installation aborted.');
          return;
        }

        $command->publishMigrations()
          ->askToRunMigrations()
          ->publishAssets();

        // Routes einrichten
        $routesPath = base_path('routes/web.php');
        $stubPath = __DIR__ . '/stubs/';

        if ($command->confirm('Would you like to install Spatie Laravel-Permission for role management?', true)) {
          // Kopiere die Datei mit Spatie-Integration
          file_put_contents($routesPath, file_get_contents($stubPath . 'web_with_permission.stub'), FILE_APPEND);
          $command->call('aperturly:install-permission');
        } else {
          // Kopiere die Datei ohne Spatie-Integration
          file_put_contents($routesPath, file_get_contents($stubPath . 'web_without_permission.stub'), FILE_APPEND);
        }

        $command->info('Routes have been set up successfully.');

        // Breeze installieren und Assets kompilieren
        if ($command->confirm('Would you like to install Breeze and compile assets?', true)) {
          $command->info('Installing Breeze...');
          $command->call('breeze:install', ['stack' => 'blade']);

          $command->info('Installing npm dependencies...');
          exec('npm install');

          $command->info('Compiling assets...');
          exec('npm run build');
        }

        $command->info('Aperturly installation complete.');
      });
  }

}

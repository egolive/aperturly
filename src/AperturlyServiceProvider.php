<?php

namespace Egolive\Aperturly;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Illuminate\Console\Command;

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
        $command
          ->startWith(function(InstallCommand $command) {
            $command->info('Starting Aperturly installation...');
          })
          ->publishMigrations()
          ->askToRunMigrations()
          ->publishAssets()
          ->endWith(function(InstallCommand $command) {
            $command->info('Aperturly installation complete.');
          });
      });  }

}

<?php

namespace Egolive\Aperturly;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Console\Command;

class AperturlyServiceProvider extends PackageServiceProvider {

  public function configurePackage(Package $package): void {
    $package
      ->name('aperturly')
      ->hasInstallCommand(function(InstallCommand $command) {
        $command
          ->startWith(function(InstallCommand $command) {
            $command->info('Hello, and welcome to my great new package!');
          });
      });
  }

}

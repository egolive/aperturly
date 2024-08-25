<?php

namespace Egolive\Aperturly;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Egolive\Aperturly\Commands\AperturlyInstallCommand;

class AperturlyServiceProvider extends PackageServiceProvider
{
  public function configurePackage(Package $package): void
  {
    $package
      ->name('aperturly')
      ->hasCommands([
        AperturlyInstallCommand::class,
      ]);
  }

  public function packageBooted(): void
  {
    // Hier können Sie Ereignis-Listener und weitere Logiken registrieren
  }

  public function packageRegistered(): void
  {
    // Hier können Sie Dienste und andere Pakete binden oder registrieren
  }
}

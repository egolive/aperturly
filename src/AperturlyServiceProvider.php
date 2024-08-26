<?php

namespace Egolive\Aperturly;

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
            ->hasInstallCommand(function (InstallCommand $command) {

                $command->startWith(function (InstallCommand $command) {
                    $command->info('Starting Aperturly installation...');

                    $routesPath = base_path('routes/web.php');
                    $stubPath = __DIR__ . '/stubs/';

                    if ($command->confirm('Would you like to install Spatie Laravel-Permission for role management?', TRUE)) {
                        file_put_contents($routesPath, file_get_contents($stubPath . 'web_with_permission.stub'), FILE_APPEND);
                        $command->call('aperturly:install-permission');
                    }
                    else {
                        file_put_contents($routesPath, file_get_contents($stubPath . 'web_without_permission.stub'), FILE_APPEND);
                    }

                    $command->info('Routes have been set up successfully.');

                    if ($command->confirm('Would you like to install Breeze and compile assets?', TRUE)) {
                        $command->info('Installing Breeze...');
                        $command->call('breeze:install', ['stack' => 'blade']);

                        $command->info('Installing npm dependencies...');
                        exec('npm install');

                        $command->info('Compiling assets...');
                        exec('npm run build');
                    }
                });

                // Migrations und Assets veröffentlichen
                $command->publishMigrations()
                    ->askToRunMigrations()
                    ->publishAssets();
            });
    }

}

<?php

namespace Egolive\Aperturly\App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AperturlyInstallCommand extends Command
{
  protected $signature = 'aperturly:install';

  protected $description = 'Install Aperturly package';

  public function handle(): void {
    $this->call('breeze:install', ['stack' => 'blade']);

    Artisan::call('migrate');

    $this->info('Installing npm dependencies...');
    exec('npm install');

    $this->info('Compiling assets...');
    exec('npm run build');

    $this->info('Aperturly installed successfully.');
  }
}

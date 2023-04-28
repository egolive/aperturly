<?php

namespace Egolive\Aperturly\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AperturlyInstallCommand extends Command
{
  protected $signature = 'aperturly:install';

  protected $description = 'Install Aperturly package';

  public function handle()
  {
    $this->call('breeze:install', ['--stack' => 'blade']);
    $this->info('Aperturly installed successfully.');
  }
}
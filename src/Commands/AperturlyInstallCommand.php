<?php

namespace Egolive\Aperturly\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Laravel\Breeze\Console\InstallCommand as BreezeInstallCommand;

class AperturlyInstallCommand extends Command
{
  protected $signature = 'aperturly:install';

  protected $description = 'Install Aperturly package';

  public function handle()
  {
    $this->call(BreezeInstallCommand::class);
    $this->info('Aperturly installed successfully.');
  }
}
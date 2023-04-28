<?php

namespace Egolive\Aperturly\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class BreezeInstallCommand extends Command
{
  protected $signature = 'aperturly:breeze-install';

  protected $description = 'Install Laravel Breeze for Aperturly package';

  public function handle()
  {
    Artisan::call('breeze:install');
    $this->info('Laravel Breeze installed successfully.');
  }
}
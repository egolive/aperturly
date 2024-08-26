<?php

namespace Egolive\Aperturly\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;

class InstallPermissionCommand extends Command
{
  protected $signature = 'aperturly:install-permission';

  protected $description = 'Install Spatie Laravel-Permission and configure roles for Aperturly';

  public function handle()
  {
    $this->info('Installing spatie/laravel-permission...');

    Log::info('Before running composer require');
    exec('composer require spatie/laravel-permission', $output, $returnVar);
    Log::info('After running composer require');

    if ($returnVar !== 0) {
      Log::error('Composer require failed');
    }

    $this->call('vendor:publish', ['--provider' => "Spatie\Permission\PermissionServiceProvider"]);

    $this->call('migrate');

    $this->addTraitToUserModel();

    $this->call('db:seed', ['--class' => 'Egolive\Aperturly\Database\Seeders\PermissionSeeder']);

    $this->info('Spatie Laravel-Permission installed and configured successfully.');
  }

  protected function addTraitToUserModel()
  {
    $userModelPath = app_path('Models/User.php');
    $filesystem = new Filesystem();

    if ($filesystem->exists($userModelPath)) {
      $content = $filesystem->get($userModelPath);

      if (strpos($content, 'use Spatie\Permission\Traits\HasRoles;') === false) {
        // Add the HasRoles trait to the User model
        $content = preg_replace('/<\?php/', "<?php\n\nuse Spatie\Permission\Traits\HasRoles;", $content, 1);
        $content = preg_replace('/class User extends Authenticatable/', "class User extends Authenticatable\n{\n    use HasRoles;", $content, 1);

        $filesystem->put($userModelPath, $content);
        $this->info('HasRoles trait has been added to User model.');
      } else {
        $this->info('User model already uses HasRoles trait.');
      }
    } else {
      $this->error('User model not found. Please manually add the HasRoles trait.');
    }
  }
}


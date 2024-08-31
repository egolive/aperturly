<?php

namespace Egolive\Aperturly\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
  public function run()
  {
    // Create roles
    $admin = Role::create(['name' => 'admin']);
    $photographer = Role::create(['name' => 'photographer']);
    $viewer = Role::create(['name' => 'viewer']);

    // Create permissions
    $permissions = [
      'view portfolios',
      'edit portfolios',
      'delete portfolios',
      'view galleries',
      'edit galleries',
      'delete galleries',
      'view images',
      'edit images',
      'delete images',
    ];

    foreach ($permissions as $permission) {
      Permission::create(['name' => $permission]);
    }

    // Assign permissions to roles
    $admin->givePermissionTo(Permission::all());
    $photographer->givePermissionTo(['view portfolios', 'edit portfolios', 'view galleries', 'edit galleries', 'view images', 'edit images']);
    $viewer->givePermissionTo(['view portfolios', 'view galleries', 'view images']);
  }
}

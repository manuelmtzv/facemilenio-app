<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    RolePermission::create([
      'role_id' => 1,
      'permission_id' => 1
    ]);

    RolePermission::create([
      'role_id' => 2,
      'permission_id' => 2
    ]);
  }
}

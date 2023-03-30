<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FriendSeeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\ActivitySeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\NotificationSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\NotificationTypeSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      CitySeeder::class,
      CountrySeeder::class,
      LocationSeeder::class,
      NotificationTypeSeeder::class,
      GenderSeeder::class,
      RoleSeeder::class,
      PermissionSeeder::class,
      RolePermissionSeeder::class,
      UserSeeder::class,
      FriendSeeder::class,
      NotificationSeeder::class,
      ActivitySeeder::class,
      CommentSeeder::class
    ]);
  }
}

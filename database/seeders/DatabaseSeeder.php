<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\FriendSeeder;
use Database\Seeders\GenderSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\NotificationSeeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      GenderSeeder::class,
      CitySeeder::class,
      CountrySeeder::class,
      RoleSeeder::class,
      LocationSeeder::class,
      UserSeeder::class,
      FriendSeeder::class,
      NotificationSeeder::class,
      ActivitySeeder::class
    ]);
  }
}

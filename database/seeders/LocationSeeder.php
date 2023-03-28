<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Location::create([
      'country_id' => 1,
      'city_id' => 1,
    ]);

    Location::create([
      'country_id' => 1,
      'city_id' => 2,
    ]);
  }
}

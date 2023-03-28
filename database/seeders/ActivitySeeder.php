<?php

namespace Database\Seeders;

use App\Models\Activity;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Activity::create([
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro molestias error autem quidem repellendus ratione libero maxime sint hic ut? Saepe, rem harum dolores distinctio iure consequuntur fugiat consectetur eligendi.',
      'user_id' => 1
    ]);
  }
}

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
      'title' => 'Saepe',
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro molestias error autem quidem repellendus ratione libero maxime sint hic ut? Saepe, rem harum dolores distinctio iure consequuntur fugiat consectetur eligendi.',
      'user_id' => 1
    ]);

    Activity::create([
      'title' => 'Integer dapibus',
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro molestias error autem quidem repellendus ratDonec dignissim tortor ligula, ut placerat tortor gravida sit amet. Integer dapibus massa et erat porta condimentum. Mauris vel velit et orci ultricies porttitor sit amet vel lorem. Integer eget varius est, a tincidunt erat. Curabitur eu vehicula ipsum. Maecenas et tortor facilisis, ultrices lacus sed, egestas massa. ',
      'user_id' => 2
    ]);
  }
}

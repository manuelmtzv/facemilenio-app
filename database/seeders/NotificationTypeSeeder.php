<?php

namespace Database\Seeders;

use App\Models\NotificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationTypeSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    NotificationType::create([
      'name' => 'Activity posted',
    ]);

    NotificationType::create([
      'name' => 'Friend Request'
    ]);
  }
}

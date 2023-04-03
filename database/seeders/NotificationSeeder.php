<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Notification::create([
      'notification_type_id' => 2,
      'user_id' => 2,
      'content' => 'You received a friend request'
    ]);

    Notification::create([
      'notification_type_id' => 1,
      'user_id' => 2,
      'content' => 'A friend has posted an activity'
    ]);
  }
}

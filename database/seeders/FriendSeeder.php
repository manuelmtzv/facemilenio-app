<?php

namespace Database\Seeders;

use App\Models\Friend;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Friend::create([
      'user_id' => 1,
      'friend_id' => 2,
      'is_requested' => true,
      'is_accepted' => true
    ]);

    Friend::create([
      'user_id' => 2,
      'friend_id' => 3,
      'is_requested' => true,
      'is_accepted' => true
    ]);
  }
}

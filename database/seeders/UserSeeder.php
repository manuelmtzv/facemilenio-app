<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'username' => 'manu816',
      'name' => 'Manuel',
      'surname' => 'Martínez',
      'email' => 'manuel.mtzv816@gmail.com',
      'password' => Hash::make('nachHD816'),
      'location_id' => 1,
      'gender_id' => 2,
      'birthdate' => '2002-12-28',
      'biography' => 'Hola, soy Manuel',
      'role_id' => 2
    ]);

    User::create([
      'username' => 'emu2804',
      'name' => 'Emiliano',
      'surname' => 'Camacho',
      'email' => 'emu2804@gmail.com',
      'password' => Hash::make('emu2804$'),
      'location_id' => 1,
      'gender_id' => 2,
      'birthdate' => '2002-08-28',
      'biography' => 'Hola, soy Emiliano',
      'role_id' => 1
    ]);

    User::create([
      'username' => 'adri',
      'name' => 'Adriana',
      'surname' => 'Castillo',
      'email' => 'adri34@gmail.com',
      'password' => Hash::make('nachHD816'),
      'location_id' => 1,
      'gender_id' => 1,
      'birthdate' => '2001-03-05',
      'biography' => 'Hola, soy Adriana',
      'role_id' => 1
    ]);
  }
}

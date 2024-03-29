<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;

  protected $fillable = [
    'name'
  ];

  public static $columnTypes = [
    'name' => 'text',
  ];

  public function users()
  {
    $this->hasMany(User::class);
  }
}

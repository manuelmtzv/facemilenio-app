<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'friend_id',
    'is_requested',
    'is_accepted'
  ];

  public static $columnTypes = [
    'user_id' => 'number',
    'friend_id' => 'number',
    'is_requested' => 'number',
    'is_accepted' => 'number',
  ];
}

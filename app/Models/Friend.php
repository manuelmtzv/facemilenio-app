<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}

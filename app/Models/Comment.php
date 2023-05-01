<?php

namespace App\Models;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'activity_id',
    'content'
  ];

  public static $columnTypes = [
    'user_id' => 'number',
    'activity_id' => 'number',
    'content' => 'longText'
  ];

  public function activities()
  {
    return $this->belongsTo(Activity::class);
  }

  public function users()
  {
    return $this->belongsTo(User::class);
  }
}

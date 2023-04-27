<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'content' => 'longtext'
  ];
}

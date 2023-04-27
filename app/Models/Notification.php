<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  use HasFactory;

  protected $fillable = [
    'notification_type_id',
    'user_id',
    'content'
  ];

  public static $columnTypes = [
    'notification_type_id' => 'number',
    'user_id' => 'number',
    'content' => 'longText'
  ];
}

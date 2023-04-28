<?php

namespace App\Models;

use App\Models\NotificationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

  public function notificationType()
  {
    $this->hasOne(NotificationType::class);
  }
}

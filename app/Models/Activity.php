<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'content',
    'user_id'
  ];

  public static $columnTypes = [
    'title' => 'text',
    'content' => 'longText',
    'user_id' => 'number'
  ];

  protected $hidden = [
    'notes', 'is_active', 'created_at', 'updated_at'
  ];

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function users()
  {
    return $this->belongsTo(User::class);
  }
}

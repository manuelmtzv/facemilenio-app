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
    'description',
    'is_active'
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

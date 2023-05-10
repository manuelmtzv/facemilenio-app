<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
  use HasFactory;

  protected $fillable = [
    'name'
  ];

  public static $columnTypes = [
    'name' => 'text'
  ];

  public function users()
  {
    $this->belongsToMany(User::class);
  }
}

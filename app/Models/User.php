<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $fillable = [
    'username',
    'name',
    'surname',
    'email',
    'password',
    'location_id',
    'gender_id',
    'birthdate',
    'biography',
    'role_id'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
    'location_id',
    'gender_id',
    'is_active',
    'created_at',
    'updated_at',
    'notes'
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [];

  public function friends()
  {
    return $this->hasMany(Friend::class);
  }

  public function activities()
  {
    return $this->hasMany(Activity::class);
  }

  public function notifications()
  {
    return $this->hasMany(Notification::class);
  }
}

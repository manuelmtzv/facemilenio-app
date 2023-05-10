<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Location;
use App\Models\Notification;
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

  public static $columnTypes = [
    'username' => 'text',
    'name' => 'text',
    'surname' => 'text',
    'email' => 'text',
    'password' => 'text',
    'location_id' => 'number',
    'gender_id' => 'number',
    'birthdate' => 'date',
    'biography' => 'longText',
    'role_id' => 'number'
  ];

  public static $publicAccess = [
    'username',
    'name',
    'surname',
    'email',
    'location_id',
    'gender_id',
    'birthdate',
    'biography',
    'created_at'
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
    'is_active',
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

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function notifications()
  {
    return $this->hasMany(Notification::class);
  }

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function location()
  {
    return $this->belongsTo(Location::class);
  }

  public function gender()
  {
    return $this->belongsTo(Gender::class);
  }

  // Extra functions
  public function isAdmin()
  {
    return $this->role->name === "Admin";
  }
}

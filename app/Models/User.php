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

  public function friendRequests()
  {
    return $this->hasMany(Friend::class, 'friend_id')
      ->where('is_requested', true)
      ->where('is_accepted', false)
      ->with('user');
  }

  public function pendingFriends()
  {
    return $this->hasMany(Friend::class, 'friend_id')
      ->where('is_requested', true)
      ->where('is_accepted', false);
  }

  public function allFriends()
  {
    $friendIds = Friend::where('user_id', $this->id)
      ->orWhere('friend_id', $this->id)
      ->where('is_accepted', true)
      ->selectRaw('CASE WHEN user_id = ' . $this->id . ' THEN friend_id ELSE user_id END as friend_id')
      ->pluck('friend_id')
      ->toArray();

    $friendIds = array_diff(array_unique($friendIds), [$this->id]);

    return User::whereIn('id', $friendIds)->get();
  }

  // public function isFriendWith(User $user)
  // {
  //   dd($this->friends()
  //     ->where(function ($query) use ($user) {
  //       $query->where('user_id', $user->id)
  //         ->orWhere('friend_id', $user->id);
  //     })->count());

  //   return false;
  // }

  public function isFriendWith(User $user)
  {
    $friendship = Friend::where(function ($query) use ($user) {
      $query->where('user_id', $this->id)
        ->where('friend_id', $user->id);
    })
      ->orWhere(function ($query) use ($user) {
        $query->where('friend_id', $this->id)
          ->where('user_id', $user->id);
      })
      ->first();

    return !is_null($friendship);
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

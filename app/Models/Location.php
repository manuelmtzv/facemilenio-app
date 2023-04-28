<?php

namespace App\Models;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
  use HasFactory;

  protected $fillable = [
    'country_id',
    'city_id',
  ];

  public static $columnTypes = [
    'country_id' => 'number',
    'city_id' => 'number',
  ];

  public function cities()
  {
    $this->hasOne(City::class);
  }

  public function countries()
  {
    $this->hasOne(Country::class);
  }
}

<?php

namespace App\Models;

use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
  use HasFactory;

  protected $fillable = [
    'name'
  ];

  public static $columnTypes = [
    'name' => 'text',
  ];

  protected $table = 'cities';

  public function locations()
  {
    return $this->belongsTo(Location::class);
  }
}

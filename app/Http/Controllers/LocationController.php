<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Http\Requests\SaveLocationRequest;
use Illuminate\Http\Request;

// Models
use App\Models\Location;

class LocationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(SaveLocationRequest $request)
  {
    $values = $request->validated();

    $country = Country::where('name', $values['country'])->firstOrFail();
    $city = City::where('name', $values['city'])->firstOrFail();

    $location = Location::create([
      'country_id' => $country->id,
      'city_id' => $city->id
    ]);

    return $location;
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}

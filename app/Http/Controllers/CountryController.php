<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Country::get();

    $keys = array_keys($values->first()->toArray());

    return view('countries.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Country())->getFIllable();
    $columnTypes = Country::$columnTypes;

    return view('countries.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required'
    ]);

    $country = Country::where('name', $request->name)->first();

    if (!$country) {
      $country = Country::create(['name' => $request->name]);
      return response()->json($country);
    }

    return response()->json($country);
  }

  /**
   * Display the specified resource.
   */
  public function show(Country $country)
  {
    $keys = array_keys($country->toArray());

    return view('activities.show', ['entity' => $country, 'keys' => $keys]);
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

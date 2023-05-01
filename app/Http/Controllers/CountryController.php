<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

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
  public function store(StoreCountryRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      Country::create($values);

      return $redirect
        ->route('countries.index')->with('status', 'The country entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('countries.create')->with('status', 'An error has occurred. Try again later.');
    }
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
  public function destroy(Country $country, Redirector $redirect)
  {
    $country->delete();

    return $redirect
      ->route('countries.index')->with('status', 'The country entry has been deleted!');
  }
}

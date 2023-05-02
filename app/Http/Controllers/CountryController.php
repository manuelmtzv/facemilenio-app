<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreCountryRequest;
use App\Http\Requests\Update\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use PHPUnit\Event\Code\Throwable;

class CountryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Country::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

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

    return view('countries.show', ['entity' => $country, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Country $country)
  {
    $record = $country;
    $keys = (new Country)->getFIllable();
    $columnTypes = Country::$columnTypes;

    return view('countries.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCountryRequest $request, Redirector $redirect, $id)
  {
    try {
      $country = Country::find($id);
      $country->update($request->validated());

      return $redirect
        ->route('countries.index')->with('status', 'The country entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('countries.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Country $country, Redirector $redirect)
  {
    try {
      $country->locations()->delete();
      $country->delete();

      return $redirect
        ->route('countries.index')->with('status', 'The country entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('countries.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('countries.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

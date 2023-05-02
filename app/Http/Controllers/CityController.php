<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreCityRequest;
use App\Http\Requests\Update\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CityController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = City::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('cities.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new City)->getFIllable();
    $columnTypes = City::$columnTypes;

    return view('cities.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreCityRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      City::create($values);

      return $redirect
        ->route('cities.index')->with('status', 'The city entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('cities.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(City $city)
  {
    $keys = array_keys($city->toArray());

    return view('activities.show', ['entity' => $city, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(City $city)
  {
    $record = $city;
    $keys = (new City)->getFIllable();
    $columnTypes = City::$columnTypes;

    return view('cities.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCityRequest $request, Redirector $redirect, $id)
  {
    try {
      $city = City::find($id);
      $city->update($request->validated());

      return $redirect
        ->route('cities.index')->with('status', 'The city entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('cities.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(City $city, Redirector $redirect)
  {
    try {
      $city->delete();

      return $redirect
        ->route('cities.index')->with('status', 'The city entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('cities.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('cities.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

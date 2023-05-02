<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;

// Models
use Illuminate\Routing\Redirector;

class LocationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Location::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('locations.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Location)->getFIllable();
    $columnTypes = Location::$columnTypes;

    return view('locations.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreLocationRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      Location::create($values);

      return $redirect
        ->route('locations.index')->with('status', 'The location entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('locations.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Location $location)
  {
    $keys = array_keys($location->toArray());

    return view('activities.show', ['entity' => $location, 'keys' => $keys]);
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
  public function destroy(Location $location, Redirector $redirect)
  {

    try {
      $location->delete();

      return $redirect
        ->route('locations.index')->with('status', 'The location entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('locations.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('locations.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

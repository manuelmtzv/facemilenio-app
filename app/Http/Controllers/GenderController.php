<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreGenderRequest;
use App\Http\Requests\Update\UpdateGenderRequest;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class GenderController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Gender::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('genders.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new gender)->getFIllable();
    $columnTypes = Gender::$columnTypes;

    return view('genders.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreGenderRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      Gender::create($values);

      return $redirect
        ->route('genders.index')->with('status', 'The gender entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('genders.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Gender $gender)
  {
    $keys = array_keys($gender->toArray());

    return view('genders.show', ['entity' => $gender, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Gender $gender)
  {
    $record = $gender;
    $keys = (new Gender)->getFIllable();
    $columnTypes = Gender::$columnTypes;

    return view('genders.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateGenderRequest $request, Redirector $redirect, $id)
  {
    try {
      $gender = Gender::find($id);
      $gender->update($request->validated());

      return $redirect
        ->route('genders.index')->with('status', 'The gender entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('genders.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Gender $gender, Redirector $redirect)
  {

    try {
      $gender->delete();

      return $redirect
        ->route('genders.index')->with('status', 'The gender entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('genders.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('genders.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

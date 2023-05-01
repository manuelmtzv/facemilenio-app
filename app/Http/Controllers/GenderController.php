<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreGenderRequest;
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

    $keys = array_keys($values->first()->toArray());

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

    return view('activities.show', ['entity' => $gender, 'keys' => $keys]);
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

<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class CountryController extends Controller
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
  public function store(Request $req)
  {
    $this->validate($req, [
      'name' => 'required'
    ]);

    $name = $req->name;

    $country = Country::where('name', $name)->first();

    if (!$country) {
      $country = Country::create(['name' => $name]);
      return response()->json($country);
    }

    return response()->json($country);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $country = Country::findOrFail($id);

    return response()->json($country);
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

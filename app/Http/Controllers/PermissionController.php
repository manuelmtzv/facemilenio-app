<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StorePermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class PermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Permission::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('permissions.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Permission)->getFIllable();
    $columnTypes = Permission::$columnTypes;

    return view('permissions.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StorePermissionRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      Permission::create($values);

      return $redirect
        ->route('permissions.index')->with('status', 'The permission entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('permissions.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Permission $permission)
  {
    $keys = array_keys($permission->toArray());

    return view('activities.show', ['entity' => $permission, 'keys' => $keys]);
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
  public function destroy(Permission $permission, Redirector $redirect)
  {
    $permission->delete();

    return $redirect
      ->route('permissions.index')->with('status', 'The permission entry has been deleted!');
  }
}

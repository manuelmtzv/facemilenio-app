<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StorePermissionRequest;
use App\Http\Requests\Update\UpdatePermissionRequest;
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

    return view('permissions.show', ['entity' => $permission, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Permission $permission)
  {
    $record = $permission;
    $keys = (new Permission)->getFIllable();
    $columnTypes = Permission::$columnTypes;

    return view('permissions.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdatePermissionRequest $request, Redirector $redirect, $id)
  {
    try {
      $permission = Permission::find($id);
      $permission->update($request->validated());

      return $redirect
        ->route('permissions.index')->with('status', 'The permission entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('permissions.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Permission $permission, Redirector $redirect)
  {

    try {
      $permission->delete();

      return $redirect
        ->route('permissions.index')->with('status', 'The permission entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('permissions.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('permissions.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

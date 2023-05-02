<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreRoleRequest;
use App\Http\Requests\Update\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RoleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Role::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('roles.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Role)->getFIllable();
    $columnTypes = Role::$columnTypes;

    return view('roles.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreRoleRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      Role::create($values);

      return $redirect
        ->route('roles.index')->with('status', 'The role entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('roles.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Role $role)
  {
    $keys = array_keys($role->toArray());

    return view('roles.show', ['entity' => $role, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Role $role)
  {
    $record = $role;
    $keys = (new Role)->getFIllable();
    $columnTypes = Role::$columnTypes;

    return view('roles.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateRoleRequest $request, Redirector $redirect, $id)
  {
    try {
      $role = Role::find($id);
      $role->update($request->validated());

      return $redirect
        ->route('roles.index')->with('status', 'The role entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('roles.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Role $role, Redirector $redirect)
  {

    try {
      $role->delete();

      return $redirect
        ->route('roles.index')->with('status', 'The role entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('roles.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('roles.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

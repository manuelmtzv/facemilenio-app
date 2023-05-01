<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreRoleRequest;
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

    $keys = array_keys($values->first()->toArray());

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

    return view('activities.show', ['entity' => $role, 'keys' => $keys]);
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

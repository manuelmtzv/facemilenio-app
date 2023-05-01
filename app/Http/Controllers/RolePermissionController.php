<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreRolePermissionsRequest;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RolePermissionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = RolePermission::get();

    $keys = array_keys($values->first()->toArray());

    return view('role-permissions.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new RolePermission)->getFIllable();
    $columnTypes = RolePermission::$columnTypes;

    return view('role-permissions.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreRolePermissionsRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      RolePermission::create($values);

      return $redirect
        ->route('role-permissions.index')->with('status', 'The role permission entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('roles-permissions.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(RolePermission $rolePermission)
  {
    $keys = array_keys($rolePermission->toArray());

    return view('activities.show', ['entity' => $rolePermission, 'keys' => $keys]);
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
  public function destroy(RolePermission $rolePermission, Redirector $redirect)
  {
    $rolePermission->delete();

    return $redirect
      ->route('role-permissions.index')->with('status', 'The role permission entry has been deleted!');
  }
}

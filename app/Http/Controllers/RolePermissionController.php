<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use Illuminate\Http\Request;

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
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
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
  public function destroy(string $id)
  {
    //
  }
}

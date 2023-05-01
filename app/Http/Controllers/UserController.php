<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests\Store\StoreUserRequest;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = User::get();

    $keys = array_keys($values->first()->toArray());

    return view('users.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new User)->getFIllable();
    $columnTypes = User::$columnTypes;

    return view('users.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreUserRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      User::create($values);

      return $redirect
        ->route('users.index')->with('status', 'The users entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('users.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    $keys = array_keys($user->toArray());

    return view('activities.show', ['entity' => $user, 'keys' => $keys]);
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

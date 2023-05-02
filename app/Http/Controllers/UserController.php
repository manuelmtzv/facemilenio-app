<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests\Store\StoreUserRequest;
use App\Http\Requests\Update\UpdateUserRequest;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = User::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

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

    return view('users.show', ['entity' => $user, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    $record = $user;
    $keys = array_filter((new User)->getFIllable(), function ($k) {
      return $k !== 'password';
    });
    $columnTypes = User::$columnTypes;

    return view('users.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Redirector $redirect, $id)
  {
    try {
      $user = User::find($id);
      $user->update($request->validate([
        'username' => ['required', 'string', 'unique:users,username,' . $id],
        'name' => ['required', 'string'],
        'surname' => ['required', 'string'],
        'email' => ['required', 'email', 'unique:users,email,' . $id],
        'gender_id' => ['required', 'string'],
        'birthdate' => ['required', 'date'],
        'url_profile' => ['nullable', 'url'],
        'location_id' => ['nullable', 'numeric', 'exists:locations,id'],
        'biography' => ['nullable', 'string'],
        'role_id' => ['required', 'numeric', 'exists:roles,id']
      ]));

      return $redirect
        ->route('users.index')->with('status', 'The user entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('users.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user, Redirector $redirect)
  {

    try {
      $user->delete();

      return $redirect
        ->route('users.index')->with('status', 'The user entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('users.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('users.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

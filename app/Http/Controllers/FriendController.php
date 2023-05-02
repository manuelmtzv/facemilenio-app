<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreFriendRequest;
use App\Http\Requests\Update\UpdateFriendRequest;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class FriendController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Friend::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('friends.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Friend())->getFIllable();
    $columnTypes = Friend::$columnTypes;

    return view('friends.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreFriendRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      Friend::create($values);

      return $redirect
        ->route('friends.index')->with('status', 'The friend entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('friends.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Friend $friend)
  {
    $keys = array_keys($friend->toArray());

    return view('activities.show', ['entity' => $friend, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Friend $friend)
  {
    $record = $friend;
    $keys = (new Friend)->getFIllable();
    $columnTypes = Friend::$columnTypes;

    return view('friends.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateFriendRequest $request, Redirector $redirect, $id)
  {
    try {
      $friend = Friend::find($id);
      $friend->update($request->validated());

      return $redirect
        ->route('friends.index')->with('status', 'The friend entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('friends.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Friend $friend, Redirector $redirect)
  {

    try {
      $friend->delete();

      return $redirect
        ->route('friends.index')->with('status', 'The friend entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('friends.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('friends.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

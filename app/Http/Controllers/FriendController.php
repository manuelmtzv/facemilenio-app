<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreFriendRequest;
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

    $keys = array_keys($values->first()->toArray());

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
  public function destroy(Friend $friend, Redirector $redirect)
  {
    $friend->delete();

    return $redirect
      ->route('friends.index')->with('status', 'The friend entry has been deleted!');
  }
}

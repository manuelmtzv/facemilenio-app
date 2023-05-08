<?php

namespace App\Http\Controllers\user;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreActivityRequest;

class UserActivityController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
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
  public function store(StoreActivityRequest $request, Redirector $redirect)
  {
    try {
      $values = $request->validated();
      Activity::create($values);

      // Redirección al feed del usuario
      return $redirect->route('feed')->with('status', 'The activity entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('feed')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Activity $activity)
  {
    $activity->load(['user:id,username', 'comments' => function ($query) {
      $query->orderBy('created_at', 'desc');
    }]);
    $keys = array_keys($activity->toArray());

    return view('activities.show', ['entity' => $activity, 'keys' => $keys]);
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

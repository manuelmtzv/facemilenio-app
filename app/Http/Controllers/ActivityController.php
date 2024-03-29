<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreActivityRequest;
use App\Http\Requests\Update\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;

class ActivityController extends Controller
{

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Activity::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }


    return view('activities.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Activity)->getFIllable();
    $columnTypes = Activity::$columnTypes;

    return view('activities.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreActivityRequest $request, Redirector $redirect)
  {
    try {
      $values = $request->validated();
      Activity::create($values);

      if (auth()->user()->role->name === 'Admin') {
        return $redirect
          ->route('activities.index')->with('status', 'The activity entry has been created!');
      }

      // Redirección al feed del usuario
      return $redirect->route('feed')->with('status', 'The activity entry has been created!');
    } catch (Throwable $th) {
      if (auth()->user()->role->name === 'Admin') {

        return $redirect->route('activities.create')->with('status', 'An error has occurred. Try again later.');
      }

      // Redirección al feed del usuario (con errores)
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
  public function edit(Activity $activity)
  {
    $record = $activity;
    $keys = (new Activity)->getFIllable();
    $columnTypes = Activity::$columnTypes;

    return view('activities.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateActivityRequest $request, Redirector $redirect, $id)
  {
    try {
      $activity = Activity::find($id);
      $activity->update($request->validated());

      return $redirect
        ->route('activities.index')->with('status', 'The activity entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('activities.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Activity $activity, Redirector $redirect)
  {
    try {
      $activity->delete();

      return $redirect
        ->route('activities.index')->with('status', 'The activity entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('activities.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('activities.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }

  public function getAll()
  {
    $activities = (Gate::allows('viewIsAdmin', Auth::user(), new Activity()))
      ? Activity::all()
      : Activity::where('user_id', Auth::user()->id)->get();

    return $activities;
  }
}

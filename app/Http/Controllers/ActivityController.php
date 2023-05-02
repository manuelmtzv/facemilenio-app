<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ActivityController extends Controller
{
  // public function __construct()
  // {
  //   $this->middleware('auth');
  // }

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
    $values = $request->validated();

    try {
      Activity::create($values);

      return $redirect
        ->route('activities.index')->with('status', 'The activity entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('activities.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Activity $activity)
  {
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

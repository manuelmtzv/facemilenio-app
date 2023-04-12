<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Activity::get();

    $keys = array_keys($values->first()->toArray());

    return view('activities.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $model = new Activity();

    $keys = array_keys($model->getFillable());

    return view('activities.create', compact('keys'));
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
  public function destroy(string $id)
  {
    //
  }

  public function getAll()
  {
    $activities = (Gate::allows('viewIsAdmin', Auth::user(), new Activity()))
      ? Activity::all()
      : Activity::where('user_id', Auth::user()->id)->get();

    return $activities;
  }
}

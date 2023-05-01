<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreNotificationRequest;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NotificationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Notification::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('notifications.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Notification())->getFIllable();
    $columnTypes = Notification::$columnTypes;

    return view('notifications.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreNotificationRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      Notification::create($values);

      return $redirect
        ->route('notifications.index')->with('status', 'The notification entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('notifications.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Notification $notification)
  {
    $keys = array_keys($notification->toArray());

    return view('activities.show', ['entity' => $notification, 'keys' => $keys]);
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
  public function destroy(Notification $notification, Redirector $redirect)
  {
    $notification->delete();

    return $redirect
      ->route('notifications.index')->with('status', 'The notification entry has been deleted!');
  }
}

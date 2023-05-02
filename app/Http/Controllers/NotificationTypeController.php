<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\StoreNotificationTypeRequest;
use App\Http\Requests\Update\UpdateNotificationTypeRequest;
use App\Models\NotificationType;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class NotificationTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = NotificationType::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('notification-types.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new NotificationType)->getFIllable();
    $columnTypes = NotificationType::$columnTypes;

    return view('notification-types.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreNotificationTypeRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      NotificationType::create($values);

      return $redirect
        ->route('notification-types.index')->with('status', 'The notification type entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('notification-types.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(NotificationType $notificationType)
  {
    $keys = array_keys($notificationType->toArray());

    return view('notification-types.show', ['entity' => $notificationType, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(NotificationType $notificationType)
  {
    $record = $notificationType;
    $keys = (new NotificationType)->getFIllable();
    $columnTypes = NotificationType::$columnTypes;

    return view('notification-types.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateNotificationTypeRequest $request, Redirector $redirect, $id)
  {
    try {
      $notificationType = NotificationType::find($id);
      $notificationType->update($request->validated());

      return $redirect
        ->route('notification-types.index')->with('status', 'The notification type entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('notification-types.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(NotificationType $notificationType, Redirector $redirect)
  {

    try {
      $notificationType->delete();

      return $redirect
        ->route('notification-types.index')->with('status', 'The notification type entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('notification-types.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('notification-types.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\NotificationType;
use Illuminate\Http\Request;

class NotificationTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = NotificationType::get();

    $keys = array_keys($values->first()->toArray());

    return view('notification-types.index', compact('values', 'keys'));
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
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(NotificationType $notificationType)
  {
    $keys = array_keys($notificationType->toArray());

    return view('activities.show', ['entity' => $notificationType, 'keys' => $keys]);
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

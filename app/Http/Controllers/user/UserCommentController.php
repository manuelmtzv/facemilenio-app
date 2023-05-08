<?php

namespace App\Http\Controllers\user;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\StoreCommentRequest;

class UserCommentController extends Controller
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
  public function store(StoreCommentRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      $comment = Comment::create($values);

      return redirect()->route('user.activities.show', $comment->activity_id);
    } catch (Throwable $th) {

      return redirect()->route('user.activities.show', $comment->activity_id);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
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

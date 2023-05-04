<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests\Store\StoreCommentRequest;
use App\Http\Requests\Update\UpdateCommentRequest;

class CommentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Comment::get();
    $keys = [];

    if (count($values) > 0) {
      $keys = array_keys($values->first()->toArray());
    }

    return view('comments.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Comment)->getFIllable();
    $columnTypes = Comment::$columnTypes;

    if (auth()->user()->role->name === "Admin") {
      return view('comments.create', compact('keys', 'columnTypes'));
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreCommentRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      $comment = Comment::create($values);

      if (auth()->user()->role->name === 'Admin') {
        return $redirect
          ->route('comments.index')->with('status', 'The comment entry has been created!');
      }

      return redirect()->route('activities.show', $comment->activity_id);
    } catch (Throwable $th) {
      if (auth()->user()->role->name === 'Admin') {
        return $redirect->route('comments.create')->with('status', 'An error has occurred. Try again later.');
      }

      return redirect()->route('activities.show', $comment->activity_id);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Comment $comment)
  {
    $keys = array_keys($comment->toArray());

    return view('comments.show', ['entity' => $comment, 'keys' => $keys]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Comment $comment)
  {
    $record = $comment;
    $keys = (new Comment)->getFIllable();
    $columnTypes = Comment::$columnTypes;

    return view('comments.edit', compact('keys', 'columnTypes', 'record'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCommentRequest $request, Redirector $redirect, $id)
  {
    try {
      $comment = Comment::find($id);
      $comment->update($request->validated());

      return $redirect
        ->route('comments.index')->with('status', 'The comment entry has been updated!');
    } catch (Throwable $th) {
      return $redirect->route('comments.edit')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Comment $comment, Redirector $redirect)
  {

    try {
      $comment->delete();

      return $redirect
        ->route('comments.index')->with('status', 'The comment entry has been deleted!');
    } catch (Throwable | QueryException $e) {
      switch (get_class($e)) {
        case QueryException::class:
          return $redirect->route('comments.index')->with(['error' => 'There is a conflict of constraints with this action.', 'information' => $e->getMessage()]);
          break;
        default:
          return $redirect->route('comments.index')->with('error', 'An error has occurred. Try again later.');
          break;
      }
    }
  }
}

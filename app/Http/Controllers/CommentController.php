<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests\Store\StoreCommentRequest;

class CommentController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $values = Comment::get();

    $keys = array_keys($values->first()->toArray());

    return view('comments.index', compact('values', 'keys'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $keys = (new Comment)->getFIllable();
    $columnTypes = Comment::$columnTypes;

    return view('comments.create', compact('keys', 'columnTypes'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreCommentRequest $request, Redirector $redirect)
  {
    $values = $request->validated();

    try {
      Comment::create($values);

      return $redirect
        ->route('comments.index')->with('status', 'The comment entry has been created!');
    } catch (Throwable $th) {
      return $redirect->route('comments.create')->with('status', 'An error has occurred. Try again later.');
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(Comment $comment)
  {
    $keys = array_keys($comment->toArray());

    return view('activities.show', ['entity' => $comment, 'keys' => $keys]);
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

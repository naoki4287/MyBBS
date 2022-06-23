<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\reply;
use Illuminate\Http\Request;

class BoardController extends Controller
{
  public function home(Request $request)
  {
    if (!$request->sort) {
      $sort = 'id';
    } else {
      $sort = $request->sort;
    }

    $comments = comment::select('comments.id', 'comments.name', 'comments.comment', 'comments.created_at')
      ->orderBy($sort, 'desc')
      ->paginate(3);

    $replies = comment::select('replies.name', 'replies.reply', 'replies.comment_id')
      ->join('replies', 'comments.id', '=', 'replies.comment_id')
      ->get();

    return view('home', compact('comments', 'replies', 'sort'));
  }

  public function post(Request $request)
  {
    $comment = $request->only(['name', 'comment']);
    comment::create(['name' =>  $comment['name'], 'comment' => $comment['comment']]);

    return redirect()->route('home');
  }

  public function edit($id)
  {
    $comment = comment::find($id);
    $reply = reply::find($id);
    return view('edit', compact('comment', 'reply'));
  }

  public function update(Request $request)
  {
    $comment = comment::find($request->commentID);
    $reply = reply::find($request->replyID);
    if ($comment) {
      $comment->fill($request->all())->save();
    } else {
      $reply->fill($request->all())->save();
    }
    return redirect()->route('home');
  }

  public function delete(Request $request)
  {
    if ($request->confirmResult === "true" && $request->commentID !== null) {
      comment::find($request->commentID)->delete();
    } elseif ($request->confirmResult === "true" && $request->replyID !== null) {
      reply::find($request->replyID)->delete();
    }
    return redirect()->route('home');
  }

  public function reply($id)
  {
    $comment = comment::find($id);
    return view('reply', compact('comment'));
  }

  public function response(Request $request)
  {
    $reply = $request->only(['name', 'reply', 'comment_id']);
    $comment = comment::find($request->commentID);
    reply::create(['name' =>  $reply['name'], 'reply' => $reply['reply'], 'comment_id' => $comment['id']]);

    return redirect()->route('home');
  }

  public function replied($id)
  {
    $comment = comment::find($id);
    $replies = reply::select('replies.*')
      ->where('comment_id', '=', $comment['id'])
      ->orderBy('created_at', 'ASC')
      ->get();

    return view('replied', compact('comment', 'replies'));
  }
}

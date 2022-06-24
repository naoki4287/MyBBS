<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\ReplyUpdateRequest;
use App\Http\Requests\ResponseRequest;
use App\Http\Requests\UpdateRequest;
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

    return view('home', compact('comments', 'sort'));
  }

  public function comment()
  {
    return view('comment');
  }

  public function post(PostRequest $request)
  {
    $comment = $request->only(['name', 'comment']);
    comment::create(['name' =>  $comment['name'], 'comment' => $comment['comment']]);

    return redirect()->route('home');
  }

  public function edit($id)
  {
    $comment = comment::find($id);
    return view('edit', compact('comment'));
  }

  public function replyedit($id)
  {
    $reply = reply::find($id);
    return view('replyedit', compact('reply'));
  }

  public function update(UpdateRequest $request)
  {
    $comment = comment::find($request->commentID);
    $comment->fill($request->all())->save();
    return redirect()->route('home');
  }

  public function replyupdate(ReplyUpdateRequest $request)
  {
    $reply = reply::find($request->replyID);
    $reply->fill($request->all())->save();
    return redirect()->route('home');
  }

  public function delete(Request $request)
  {
    if ($request->confirmResult === "true" && $request->commentID !== null) {
      comment::find($request->commentID)->delete();
      return redirect()->route('home');
    } elseif ($request->confirmResult === "true" && $request->replyID !== null) {
      reply::find($request->replyID)->delete();
      return redirect()->route('home');
    } else {
      return back();
    }
  }

  public function reply($id)
  {
    $comment = comment::find($id);
    return view('reply', compact('comment'));
  }

  public function response(ResponseRequest $request)
  {
    $reply = $request->only(['name', 'reply', 'comment_id']);
    // dd($reply);
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

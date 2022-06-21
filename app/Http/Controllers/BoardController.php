<?php

namespace App\Http\Controllers;

use App\Models\comment;
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

    $comments = comment::select('comments.*')
      ->orderBy($sort, 'desc')
      ->paginate(10);

    return view('home', compact('comments', 'sort'));
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
    return view('edit', compact('comment'));
  }

  public function update(Request $request)
  {
    $comment = comment::find($request->commentID);
    $comment->fill($request->all())->save();
    return redirect()->route('home');
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    // dd($comments);

    return view('home', compact('comments', 'sort'));
  }

  public function post(Request $request)
  {
    $comment = $request->only(['name', 'comment']);
    comment::create(['name' =>  $comment['name'], 'comment' => $comment['comment']]);

    return redirect()->route('home');
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class BoardController extends Controller
{
  public function home()
  {
    
    $comments = comment::select('comments.*')
      ->orderBy('created_at', 'DESC')
      ->get();

    return view('home', compact('comments'));
  }

  public function post(Request $request)
  {
    $comment = $request->only(['name', 'comment']);
    comment::create(['name' =>  $comment['name'], 'comment' => $comment['comment']]);

    return redirect()->route('home');
  }
}

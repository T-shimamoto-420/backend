<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class CommentController extends Controller
{
    public function store(Thread $thread,Request $request)
    {
      $thread->comments()->create([
        'body' => $request->body,
        'user_id' => $request->user()->id
      ]);
      return back();
    }
}

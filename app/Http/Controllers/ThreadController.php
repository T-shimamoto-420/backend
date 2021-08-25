<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Thread;

class ThreadController extends Controller
{
    public function index()
    {
      $threads = Thread::all();
    return response()->json([
      'data'=>$threads,
    ],200);
    }
    public function create()
    {
      return view('threads.create');
    }
    public function store(Request $request)
    {
      $thread = DB::transaction(function() use ($request){
        $thread = $request->user()->threads()->create([
          'title'=>$request->title,
        ]);
        return $thread;
      });
      return response()->json([
        'data'=>$thread,
      ],201);
    }
    public function show(Thread $thread)
    {
        $comments = $thread->comments()->with(['user'])->paginate(20);

        return view('threads.show', [
            'thread' => $thread,
            'comments' => $comments
        ]);
    }
    public function destroy(Thread $thread)
    {
      $thread->delete();
      return back();
    }
}

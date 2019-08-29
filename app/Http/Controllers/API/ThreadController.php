<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thread as Thread;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThreadController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth:api');
  }

  public function index()
  {
    return Thread::All();
  }

  public function findThreadsByForumId(Request $request)
  {
    $threads = Thread::where('forum_id', $request['forum_id'])->with('user', 'forum', 'forum.category')->orderBy('pinned', 'desc')->orderBy('updated_at', 'desc');
    return $threads->paginate(10);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->validate($request,[
          'thread_title' => 'required|string|max:35',
          'thread_body' => 'required|string'
      ]);

      $createThread = Thread::create([
          'title' => $request['thread_title'],
          'user_id' => Auth::user()->id,
          'forum_id' => $request['forum_id'],
      ]);

      $createThread->threads()->create([
          'user_id' => Auth::user()->id,
          'thread_id' => $createThread->id,
          'body' => $request['thread_body']
      ]);

      DB::table('forums')->where('id', $request['forum_id'])->increment('thread_count');
      DB::table('forums')->where('id', $request['forum_id'])->increment('post_count');
      return ['message' => "Success"];
  }

}

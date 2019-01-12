<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thread as Thread;

class ThreadController extends Controller
{

  public function __construct()
  {
    //$this->middleware('auth:api');
  }

  public function index()
  {
    return Thread::All();
  }

  public function findThreadsByForumId(Request $request)
  {
    $threads = Thread::where('forum_id', $request['forum_id'])->with('user', 'forum', 'forum.category');
    return $threads->paginate(10);
  }
}

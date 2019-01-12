<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post as Post;

class PostController extends Controller
{

  public function findPostsByThreadId(Request $request)
  {
    $posts = Post::where('thread_id', $request['thread_id'])->with('user', 'thread');
    return $posts->paginate(18);
  }

}

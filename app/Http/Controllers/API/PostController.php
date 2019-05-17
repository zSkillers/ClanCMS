<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post as Post;
use App\Thread as Thread;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function findPostsByThreadId(Request $request)
    {
    $posts = Post::where('thread_id', $request['thread_id'])->with('user', 'thread');
    return $posts->paginate(18);
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
            'post' => 'required|string|max:191'
        ]);

        $createPost = Post::create([
            'user_id' => Auth::user()->id,
            'thread_id' => $request['thread_id'],
            'body' => $request['post']
        ]);

        $thread = Thread::find($request['thread_id']);
        $thread->touch();

        return ['message' => "Success"];
    }
}

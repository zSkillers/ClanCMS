<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Thread as Thread;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
        $threads = Thread::where('forum_id', $request['forum_id'])
            ->with('user', 'forum', 'forum.category', 'last_user_reply')
            ->orderBy('pinned', 'desc')
            ->orderBy('updated_at', 'desc');

        return $threads->paginate(10);
    }

    public function pinnedOrUnpinnedThread(Request $request)
    {
        $thread = Thread::findOrFail($request['id']);

        if ($thread->pinned == 0) {
            $thread->pinned = 1;
        } else {
            $thread->pinned = 0;
        }
        $thread->save();
        return ['message' => "Success"];
    }

    public function lockOrUnpockThread(Request $request)
    {
        $thread = Thread::findOrFail($request['id']);

        if ($thread->locked == 0) {
            $thread->locked = 1;
        } else {
            $thread->locked = 0;
        }
        $thread->save();
        return ['message' => "Success"];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'thread_title' => 'required|string|max:35',
            'thread_body' => 'required|string'
        ]);

        $createThread = Thread::create([
            'title' => $request['thread_title'],
            'user_id' => Auth::id(),
            'forum_id' => $request['forum_id'],
            'last_user_reply_id' => Auth::id(),
            'post_count' => '1'
        ]);

        $createThread->posts()->create([
            'user_id' => Auth::id(),
            'thread_id' => $createThread->id,
            'body' => $request['thread_body']
        ]);

        DB::table('forums')
            ->where('id', $request['forum_id'])
            ->increment('thread_count');
        DB::table('forums')
            ->where('id', $request['forum_id'])
            ->increment('post_count');
        DB::table('users')
            ->where('id', Auth::id())
            ->increment('post_count');
        DB::table('users')
            ->where('id', Auth::id())
            ->increment('thread_count');
        return ['message' => "Success"];
    }

    public function destroy($id)
    {
        $this->authorize('isAdmin');

        $thread = Thread::findOrFail($id);
        $thread->delete();

        return ['message' => 'Thread Deleted'];
    }
}

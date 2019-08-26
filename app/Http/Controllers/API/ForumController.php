<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forum as Forum;
use App\Thread as Thread;

class ForumController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api');
  }

  public function index()
  {
    return Forum::All();
  }

  public function findByCategoryId(Request $request) {
    return Forum::where('category_id', $request['category_id'])->paginate(5);
  }

  public function findByForumID(Request $request)
  {
    $threads = Forum::where('id', $request['forum_id'])->with('threads', 'threads.user')->get();
    return $threads;
  }

  public function findByCategoryIdFunc($id) {
    return Forum::where('category_id', $id)->paginate(2);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      Forum::create([
          'title' => $request['title'],
          'category_id' => $request['category_id'],
          'description' => $request['description'],
          'sort' => $request['sort']
      ]);

      return ['message' => "Success"];
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $forum = Forum::findOrFail($id);

      $forum->update($request->all());
      return ['message' => 'Updated the forum info'];
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $this->authorize('isAdmin');

    $forum = Forum::findOrFail($id);

    $forum->delete();

    return ['message' => 'Forum Deleted'];
  }

  public function countTotal() {
    return ['count' => Category::count()];
  }
}

<?php

use Illuminate\Http\Request;

/*php
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/shoutbox', function (Request $request) {
    return $request->shoutbox();
});

Route::middleware('auth:api')->get('/stat', function (Request $request) {
    return $request->stat();
});

Route::middleware('auth:api')->get('/stathistory', function (Request $request) {
    return $request->stathistory();
});

Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->category();
});

Route::middleware('auth:api')->get('/forum', function (Request $request) {
    return $request->forum();
});

Route::middleware('auth:api')->get('/thread', function (Request $request) {
    return $request->thread();
});

Route::middleware('auth:api')->get('/post', function (Request $request) {
    return $request->post();
});

Route::get('forum/category/{category_id}', 'API\ForumController@findByCategoryId');
Route::get('threads/{forum_id}', 'API\ThreadController@findThreadsByForumId');
Route::get('posts/{thread_id}', 'API\PostController@findPostsByThreadId');
Route::post('thread/pinned', 'API\ThreadController@pinnedOrUnpinnedThread');
Route::post('thread/locked', 'API\ThreadController@lockOrUnpockThread');

Route::get('user/count', 'API\UserController@countTotal');
Route::get('user/{userid}', 'API\UserController@getUserById');
Route::get('profile', 'API\UserController@profile');
Route::get('findUser', 'API\UserController@search');
Route::put('profile', 'API\UserController@updateProfile');
Route::get('stat', 'API\StatController@index');

Route::get('category/count', 'API\CategoryController@countTotal');
Route::get('findCategory', 'API\CategoryController@search');

Route::apiResources(['user' => 'API\UserController']);
Route::apiResources(['category' => 'API\CategoryController']);
Route::apiResources(['forum' => 'API\ForumController']);
Route::apiResources(['thread' => 'API\ThreadController']);
Route::apiResources(['post' => 'API\PostController']);
Route::apiResources(['stat' => 'API\StatController']);
Route::apiResources(['stathistory' => 'API\StathistoryController']);
Route::apiResources(['shoutbox' => 'API\ShoutboxController']);

Route::get('dashboard', 'API\DashboardController@index');

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

Route::middleware('auth:api')->get('/category', function (Request $request) {
    return $request->category();
});

Route::middleware('auth:api')->get('/forum', function (Request $request) {
    return $request->forum();
});

Route::get('forum/{forum_name}/{forum_id}', 'API\ForumController@findByForumID');

Route::get('forum/category/{category_id}', 'API\ForumController@findByCategoryId');

Route::get('user/count', 'API\UserController@countTotal');
Route::get('profile', 'API\UserController@profile');
Route::get('findUser', 'API\UserController@search');
Route::put('profile', 'API\UserController@updateProfile');

Route::get('category/count', 'API\CategoryController@countTotal');
Route::get('findCategory', 'API\CategoryController@search');

Route::apiResources(['user' => 'API\UserController']);
Route::apiResources(['category' => 'API\CategoryController']);
Route::apiResources(['forum' => 'API\ForumController']);

Route::get('dashboard', 'API\DashboardController@index');

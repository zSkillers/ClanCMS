<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forum as Forum;

class ForumController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth:api');
  }

  public function index()
  {
    return Forum::All();
  }

  public function findByCategoryId(Request $request) {
    return Forum::where('category_id', $request['category_id'])->paginate(5);
  }

  public function findByCategoryIdFunc($id) {
    return Forum::where('category_id', $id)->paginate(2);
  }
}

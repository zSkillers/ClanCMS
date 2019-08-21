<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stat as Stat;
use App\User as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatController extends Controller
{

  public function __construct()
  {
    //$this->middleware('auth:api');
  }

  public function index()
  {
      return DB::table('stats')
          ->join('users', 'stats.user_id', '=', 'users.id')
          ->select('stats.*', 'users.rsname')
          ->get();
  }

}

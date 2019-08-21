<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stat as Stat;
use App\User as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StathistoryController extends Controller
{

  public function __construct()
  {
    //$this->middleware('auth:api');
  }

  public function index()
  {
    return DB::table('users')
        ->join('stats', 'users.id', '=', 'stats.user_id')
        ->select('stats.user_id')
        ->distinct()
        ->select('stats.*')
        ->get();
  }

}

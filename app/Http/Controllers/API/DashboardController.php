<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as User;
use App\Category as Category;
use App\Forum as Forum;
use App\Dashboard as Dashboard;

class DashboardController extends Controller
{
    public function index() {
      $dashboardData = array(
        'userCount' => User::count(),
        'categoryCount' => Category::count(),
        'forumCount' => Forum::count()
      );
      return json_encode($dashboardData);
    }
}

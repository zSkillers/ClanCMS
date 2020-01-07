<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as User;
use App\Category as Category;
use App\Forum as Forum;
use App\Dashboard as Dashboard;
use App\Post as Post;
use App\Thread as Thread;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboardData = array(
            'user_count' => User::count(),
            'category_count' => Category::count(),
            'forum_count' => Forum::count(),
            'thread_count' => Thread::count(),
            'post_count' => Post::count()
        );
        return json_encode($dashboardData);
    }
}

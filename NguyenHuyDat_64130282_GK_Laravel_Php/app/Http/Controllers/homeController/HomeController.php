<?php

namespace App\Http\Controllers\homeController;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalPage = Page::count();
        $totalPost = Post::count();

        return view('homeController.dashboard', [
            'totalPage' => $totalPage,
            'totalPost' => $totalPost,
        ]);
    }
}

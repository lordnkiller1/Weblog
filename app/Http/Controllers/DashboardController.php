<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),

            'categories' => Category::count(),

            'posts' => Post::count(),

            'comments' => Comment::count(),
        ];


        $latestPosts = Post::query()
            ->latest()
            ->take(5)
            ->get();


        return view('admin.dashboard', compact(
            'stats',
            'latestPosts'
        ));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'posts' => Post::count(),
            'categories' => Category::count(),
            'tags' => Tag::count(),
        ];

        $postStats = [
            'published' => Post::where('status', 'published')->count(),
            'draft' => Post::where('status', 'draft')->count(),
            'featured' => Post::where('is_featured', true)->count(),
        ];

        $latestPosts = Post::with(['category', 'user'])
            ->latest()
            ->take(5)
            ->get();

        $latestUsers = User::latest()
            ->take(5)
            ->get();

        $topCategories = Category::withCount('posts')
            ->orderByDesc('posts_count')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'postStats',
            'latestPosts',
            'latestUsers',
            'topCategories'
        ));
    }
}

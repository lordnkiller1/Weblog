<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(
                'permission:posts.view',
                only: ['index', 'show']
            ),

            new Middleware(
                'permission:posts.create',
                only: ['create', 'store']
            ),

            new Middleware(
                'permission:posts.edit',
                only: ['edit', 'update']
            ),

            new Middleware(
                'permission:posts.delete',
                only: ['destroy']
            ),
        ];
    }


    public function index()
    {
        $posts = Post::query()
            ->with(['user', 'category', 'tags'])
            ->latest()
            ->paginate(10);


        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::query()
            ->where('status', true)
            ->orderBy('name')
            ->get();


        $tags = Tag::query()
            ->orderBy('name')
            ->get();


        return view(
            'admin.posts.create',
            compact('categories', 'tags')
        );
    }


    public function store(StorePostRequest $request)
    {
        $data = $request->validated();


        $data['user_id'] = auth()->id();

        $data['slug'] = Str::slug($data['title']);


        if ($request->hasFile('image')) {

            $data['image'] = $request->file('image')
                ->store('posts', 'public');
        }


        $tags = $data['tags'] ?? [];

        unset($data['tags']);


        $post = Post::create($data);


        $post->tags()->sync($tags);


        return to_route('admin.posts.index')
            ->with('success', 'پست با موفقیت ایجاد شد');
    }


    public function show(Post $post)
    {
        $post->load([
            'user',
            'category',
            'tags',
        ]);


        return view('admin.posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Category::query()
            ->where('status', true)
            ->orderBy('name')
            ->get();


        $tags = Tag::query()
            ->orderBy('name')
            ->get();


        $selectedTags = $post->tags()
            ->pluck('tags.id')
            ->toArray();


        return view(
            'admin.posts.edit',
            compact(
                'post',
                'categories',
                'tags',
                'selectedTags'
            )
        );
    }


    public function update(
        UpdatePostRequest $request,
        Post $post
    ) {
        $data = $request->validated();


        $data['slug'] = Str::slug($data['title']);


        if ($request->hasFile('image')) {

            if ($post->image) {

                Storage::disk('public')
                    ->delete($post->image);
            }


            $data['image'] = $request->file('image')
                ->store('posts', 'public');
        }


        $tags = $data['tags'] ?? [];

        unset($data['tags']);


        $post->update($data);


        $post->tags()->sync($tags);


        return to_route('admin.posts.index')
            ->with('success', 'پست با موفقیت بروزرسانی شد');
    }


    public function destroy(Post $post)
    {
        if ($post->image) {

            Storage::disk('public')
                ->delete($post->image);
        }


        $post->delete();


        return to_route('admin.posts.index')
            ->with('success', 'پست با موفقیت حذف شد');
    }
}

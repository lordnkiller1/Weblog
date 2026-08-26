<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreTagRequest;
use App\Http\Requests\Admin\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Str;

class TagController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(
                'permission:tags.view',
                only: ['index']
            ),

            new Middleware(
                'permission:tags.create',
                only: ['create', 'store']
            ),

            new Middleware(
                'permission:tags.edit',
                only: ['edit', 'update']
            ),

            new Middleware(
                'permission:tags.delete',
                only: ['destroy']
            ),
        ];
    }


    public function index()
    {
        $tags = Tag::withCount('posts')
        ->latest()
            ->paginate(10);

        return view('admin.tags.index', compact('tags'));
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        Tag::create($data);

        return to_route('admin.tags.index')
            ->with('success', 'برچسب با موفقیت ایجاد شد');
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }


    public function update(
        UpdateTagRequest $request,
        Tag $tag
    ) {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);

        $tag->update($data);

        return to_route('admin.tags.index')
            ->with('success', 'برچسب با موفقیت بروزرسانی شد');
    }


    public function destroy(Tag $tag)
    {
        if ($tag->posts()->exists()) {
            return back()
                ->with(
                    'error',
                    'این برچسب دارای پست است و قابل حذف نیست'
                );
        }

        $tag->delete();

        return to_route('admin.tags.index')
            ->with('success', 'برچسب با موفقیت حذف شد');
    }
}

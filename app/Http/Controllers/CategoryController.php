<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()
            ->latest()
            ->paginate(10);


        return view('admin.categories.index', compact('categories'));
    }



    public function create()
    {
        return view('admin.categories.create');
    }



    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();


        $data['slug'] = Str::slug($data['name']);



        if ($request->hasFile('image')) {

            $data['image'] = $request->file('image')
                ->store('categories', 'public');

        }



        Category::create($data);



        return to_route('admin.categories.index')
            ->with('success', 'دسته‌بندی با موفقیت ثبت شد');
    }




    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }





    public function update(
        UpdateCategoryRequest $request,
        Category $category
    ) {

        $data = $request->validated();



        $data['slug'] = Str::slug($data['name']);



        if ($request->hasFile('image')) {


            if ($category->image) {

                Storage::disk('public')
                    ->delete($category->image);

            }



            $data['image'] = $request->file('image')
                ->store('categories', 'public');

        }




        $category->update($data);



        return to_route('admin.categories.index')
            ->with('success', 'دسته‌بندی با موفقیت بروزرسانی شد');
    }





    public function destroy(Category $category)
    {

        if ($category->posts()->exists()) {

            return back()
                ->with(
                    'error',
                    'این دسته‌بندی دارای پست است و قابل حذف نیست'
                );

        }



        if ($category->image) {

            Storage::disk('public')
                ->delete($category->image);

        }



        $category->delete();



        return to_route('admin.categories.index')
            ->with('success', 'دسته‌بندی حذف شد');
    }

}
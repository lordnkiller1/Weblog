@extends('admin.layouts.app')


@section('title', 'پست‌ها')


@section('content')


<x-admin.page-header
    title="پست‌ها"
    description="مدیریت مطالب وبلاگ">

    <x-slot:action>

        @can('posts.create')

        <a
            href="{{ route('admin.posts.create') }}"
            class="
                    px-5 py-3
                    rounded-xl
                    bg-violet-600
                    text-white
                    hover:bg-violet-500
                    transition-all duration-300
                ">
            افزودن پست
        </a>

        @endcan

    </x-slot:action>

</x-admin.page-header>



<div
    class="
        bg-[#0f172a]
        border border-slate-800
        rounded-3xl
        overflow-hidden
        shadow-xl
    ">

    <table class="w-full text-right text-slate-300">

        <thead class="bg-slate-900 text-slate-400">

            <tr>

                <th class="p-5">
                    تصویر
                </th>

                <th class="p-5">
                    عنوان
                </th>

                <th class="p-5">
                    دسته‌بندی
                </th>

                <th class="p-5">
                    نویسنده
                </th>

                <th class="p-5">
                    وضعیت
                </th>

                <th class="p-5">
                    برچسب‌ها
                </th>

                <th class="p-5">
                    عملیات
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($posts as $post)

            <tr
                class="
                        border-b border-slate-800
                        hover:bg-slate-800/50
                        transition
                    ">

                <td class="p-5">

                    @if($post->image)

                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        alt="{{ $post->title }}"
                        class="
                                    w-14
                                    h-14
                                    rounded-xl
                                    object-cover
                                    border border-slate-700
                                ">

                    @else

                    <div
                        class="
                                    w-14
                                    h-14
                                    rounded-xl
                                    bg-slate-800
                                    flex
                                    items-center
                                    justify-center
                                    text-slate-500
                                ">
                        بدون تصویر
                    </div>

                    @endif

                </td>


                <td class="p-5">

                    <div class="font-medium text-white">
                        {{ $post->title }}
                    </div>

                    @if($post->is_featured)

                    <span
                        class="
                                    inline-block
                                    mt-1
                                    text-xs
                                    text-amber-400
                                ">
                        ویژه
                    </span>

                    @endif

                </td>


                <td class="p-5">

                    {{ $post->category->name }}

                </td>


                <td class="p-5">

                    {{ $post->user->name }}

                </td>


                <td class="p-5">

                    @if($post->status === 'published')

                    <span
                        class="
                                    px-3
                                    py-1
                                    rounded-full
                                    text-sm
                                    bg-emerald-500/10
                                    text-emerald-400
                                ">
                        منتشر شده
                    </span>

                    @else

                    <span
                        class="
                                    px-3
                                    py-1
                                    rounded-full
                                    text-sm
                                    bg-amber-500/10
                                    text-amber-400
                                ">
                        پیش‌نویس
                    </span>

                    @endif

                </td>


                <td class="p-5">

                    <div class="flex flex-wrap gap-2">

                        @forelse($post->tags as $tag)

                        <span
                            class="
                    px-2.5
                    py-1
                    rounded-lg
                    bg-violet-500/10
                    text-violet-400
                    text-xs
                ">
                            {{ $tag->name }}
                        </span>

                        @empty

                        <span class="text-slate-500 text-sm">
                            بدون برچسب
                        </span>

                        @endforelse

                    </div>

                </td>


                <td class="p-5">

                    <div class="flex gap-3">

                        @can('posts.edit')

                        <a
                            href="{{ route('admin.posts.edit', $post) }}"
                            class="
                                        px-4
                                        py-2
                                        rounded-lg
                                        bg-amber-500/10
                                        text-amber-400
                                        hover:bg-amber-500
                                        hover:text-white
                                        transition
                                    ">
                            ویرایش
                        </a>

                        @endcan


                        @can('posts.delete')

                        <x-admin.delete-button
                            :action="route('admin.posts.destroy', $post)" />

                        @endcan

                    </div>

                </td>

            </tr>

            @empty

            <tr>

                <td
                    colspan="7"
                    class="
                            p-10
                            text-center
                            text-slate-500
                        ">
                    پستی وجود ندارد
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>



<div class="mt-8">

    {{ $posts->links() }}

</div>


@endsection
@extends('admin.layouts.app')


@section('title', 'داشبورد')


@section('content')


    <x-admin.page-header title="داشبورد" description="نمای کلی از وضعیت وبلاگ" />



    <div class="space-y-8">


        {{-- Stats --}}

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">


            <div
                class="
                group
                bg-[#0f172a]
                border border-slate-800
                rounded-3xl
                p-6
                transition-all duration-300
                hover:-translate-y-1
                hover:border-violet-500/30
                hover:shadow-xl
                hover:shadow-violet-500/5
            ">

                <div class="flex items-center justify-between">


                    <div>

                        <p class="text-sm text-slate-500">
                            کاربران
                        </p>

                        <p class="mt-3 text-3xl font-black text-white">
                            {{ $stats['users'] }}
                        </p>

                    </div>


                    <div
                        class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-violet-500/10
                        text-violet-400
                        flex
                        items-center
                        justify-center
                        transition
                        group-hover:scale-110
                    ">
                        👤
                    </div>


                </div>

            </div>



            <div
                class="
                group
                bg-[#0f172a]
                border border-slate-800
                rounded-3xl
                p-6
                transition-all duration-300
                hover:-translate-y-1
                hover:border-blue-500/30
                hover:shadow-xl
                hover:shadow-blue-500/5
            ">

                <div class="flex items-center justify-between">


                    <div>

                        <p class="text-sm text-slate-500">
                            پست‌ها
                        </p>

                        <p class="mt-3 text-3xl font-black text-white">
                            {{ $stats['posts'] }}
                        </p>

                    </div>


                    <div
                        class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-blue-500/10
                        text-blue-400
                        flex
                        items-center
                        justify-center
                        transition
                        group-hover:scale-110
                    ">
                        📝
                    </div>


                </div>

            </div>



            <div
                class="
                group
                bg-[#0f172a]
                border border-slate-800
                rounded-3xl
                p-6
                transition-all duration-300
                hover:-translate-y-1
                hover:border-emerald-500/30
                hover:shadow-xl
                hover:shadow-emerald-500/5
            ">

                <div class="flex items-center justify-between">


                    <div>

                        <p class="text-sm text-slate-500">
                            دسته‌بندی‌ها
                        </p>

                        <p class="mt-3 text-3xl font-black text-white">
                            {{ $stats['categories'] }}
                        </p>

                    </div>


                    <div
                        class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-emerald-500/10
                        text-emerald-400
                        flex
                        items-center
                        justify-center
                        transition
                        group-hover:scale-110
                    ">
                        📂
                    </div>


                </div>

            </div>



            <div
                class="
                group
                bg-[#0f172a]
                border border-slate-800
                rounded-3xl
                p-6
                transition-all duration-300
                hover:-translate-y-1
                hover:border-amber-500/30
                hover:shadow-xl
                hover:shadow-amber-500/5
            ">

                <div class="flex items-center justify-between">


                    <div>

                        <p class="text-sm text-slate-500">
                            تگ ها
                        </p>

                        <p class="mt-3 text-3xl font-black text-white">
                            {{ $stats['tags'] }}
                        </p>

                    </div>


                    <div
                        class="
                        w-12
                        h-12
                        rounded-2xl
                        bg-amber-500/10
                        text-amber-400
                        flex
                        items-center
                        justify-center
                        transition
                        group-hover:scale-110
                    ">
                        🏷
                    </div>


                </div>

            </div>


        </div>



        {{-- Post Overview --}}

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">


            <div
                class="
                xl:col-span-2
                bg-[#0f172a]
                border border-slate-800
                rounded-3xl
                p-6
            ">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h2 class="text-lg font-bold text-white">
                            وضعیت پست‌ها
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            وضعیت فعلی مطالب وبلاگ
                        </p>

                    </div>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                    <div
                        class="
                        rounded-2xl
                        bg-slate-900
                        border border-slate-800
                        p-5
                    ">

                        <p class="text-sm text-slate-500">
                            منتشر شده
                        </p>

                        <p class="mt-3 text-2xl font-bold text-emerald-400">
                            {{ $postStats['published'] }}
                        </p>

                    </div>



                    <div
                        class="
                        rounded-2xl
                        bg-slate-900
                        border border-slate-800
                        p-5
                    ">

                        <p class="text-sm text-slate-500">
                            پیش‌نویس
                        </p>

                        <p class="mt-3 text-2xl font-bold text-amber-400">
                            {{ $postStats['draft'] }}
                        </p>

                    </div>



                    <div
                        class="
                        rounded-2xl
                        bg-slate-900
                        border border-slate-800
                        p-5
                    ">

                        <p class="text-sm text-slate-500">
                            پست ویژه
                        </p>

                        <p class="mt-3 text-2xl font-bold text-violet-400">
                            {{ $postStats['featured'] }}
                        </p>

                    </div>


                </div>

            </div>



            <div
                class="
                bg-[#0f172a]
                border border-slate-800
                rounded-3xl
                p-6
            ">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h2 class="text-lg font-bold text-white">
                            دسته‌بندی‌های فعال
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            بیشترین پست
                        </p>

                    </div>

                </div>


                <div class="space-y-4">


                    @forelse($topCategories as $category)
                        <div
                            class="
                            flex
                            items-center
                            justify-between
                            gap-4
                        ">

                            <span class="text-sm text-slate-300">
                                {{ $category->name }}
                            </span>


                            <span
                                class="
                                min-w-8
                                h-8
                                px-2
                                rounded-xl
                                bg-violet-500/10
                                text-violet-400
                                text-sm
                                flex
                                items-center
                                justify-center
                            ">
                                {{ $category->posts_count }}
                            </span>

                        </div>

                    @empty

                        <p class="text-sm text-slate-500">
                            داده‌ای وجود ندارد
                        </p>
                    @endforelse


                </div>

            </div>


        </div>



        {{-- Latest Posts / Users --}}

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">


            <div
                class="
                bg-[#0f172a]
                border border-slate-800
                rounded-3xl
                overflow-hidden
            ">

                <div class="p-6 border-b border-slate-800">

                    <h2 class="text-lg font-bold text-white">
                        آخرین پست‌ها
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        جدیدترین مطالب ثبت شده
                    </p>

                </div>


                <div>

                    @forelse($latestPosts as $post)
                        <div
                            class="
                            flex
                            items-center
                            justify-between
                            gap-4
                            p-5
                            border-b
                            border-slate-800
                            last:border-b-0
                            hover:bg-slate-800/40
                            transition
                        ">

                            <div class="min-w-0">

                                <p class="truncate text-white font-medium">
                                    {{ $post->title }}
                                </p>

                                <p class="mt-1 text-xs text-slate-500">
                                    {{ $post->category->name }}
                                    •
                                    {{ $post->user->name }}
                                </p>

                            </div>


                            @if ($post->status === 'published')
                                <span
                                    class="
                                    shrink-0
                                    px-3
                                    py-1
                                    rounded-full
                                    text-xs
                                    bg-emerald-500/10
                                    text-emerald-400
                                ">
                                    منتشر شده
                                </span>
                            @else
                                <span
                                    class="
                                    shrink-0
                                    px-3
                                    py-1
                                    rounded-full
                                    text-xs
                                    bg-amber-500/10
                                    text-amber-400
                                ">
                                    پیش‌نویس
                                </span>
                            @endif


                        </div>

                    @empty

                        <div class="p-8 text-center text-slate-500">
                            پستی وجود ندارد
                        </div>
                    @endforelse

                </div>

            </div>



            <div
                class="
                bg-[#0f172a]
                border border-slate-800
                rounded-3xl
                overflow-hidden
            ">

                <div class="p-6 border-b border-slate-800">

                    <h2 class="text-lg font-bold text-white">
                        آخرین کاربران
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        کاربران تازه ثبت شده
                    </p>

                </div>


                <div>

                    @forelse($latestUsers as $user)
                        <div
                            class="
                            flex
                            items-center
                            gap-4
                            p-5
                            border-b
                            border-slate-800
                            last:border-b-0
                            hover:bg-slate-800/40
                            transition
                        ">

                            <div
                                class="
                                w-11
                                h-11
                                shrink-0
                                rounded-2xl
                                bg-gradient-to-br
                                from-violet-600
                                to-blue-600
                                flex
                                items-center
                                justify-center
                                text-white
                                font-bold
                            ">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>


                            <div class="min-w-0">

                                <p class="text-white font-medium truncate">
                                    {{ $user->name }}
                                </p>

                                <p class="mt-1 text-xs text-slate-500 truncate">
                                    {{ $user->email }}
                                </p>

                            </div>

                        </div>

                    @empty

                        <div class="p-8 text-center text-slate-500">
                            کاربری وجود ندارد
                        </div>
                    @endforelse

                </div>

            </div>


        </div>


    </div>


@endsection

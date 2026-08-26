<aside
    class="
        w-72
        min-h-screen
        bg-[#0f172a]
        border-l border-slate-800
        p-6
        flex flex-col
    ">


    {{-- Logo --}}
    <div class="mb-10">

        <div class="flex items-center gap-3">

            <div
                class="
                    w-12 h-12
                    rounded-2xl
                    bg-gradient-to-br from-violet-600 to-blue-600
                    flex items-center justify-center
                    text-white
                    font-black
                    text-xl
                ">
                W
            </div>


            <div>

                <h1 class="text-2xl font-black text-white">
                    وبلاگ
                </h1>

                <p class="text-xs text-slate-500">
                    پنل مدیریت
                </p>

            </div>

        </div>

    </div>



    {{-- Menu --}}
    <nav class="flex-1 space-y-2">


        <p class="text-xs text-slate-600 px-4 mb-3">
            اصلی
        </p>



        <a
            href="#"
            class="
                flex items-center gap-3
                px-4 py-3
                rounded-2xl
                transition-all duration-300

                {{ request()->routeIs('admin.dashboard')
                    ? 'bg-violet-500/20 text-violet-400'
                    : 'text-slate-300 hover:bg-white/5 hover:text-white'
                }}
            ">

            <span>
                🏠
            </span>

            داشبورد

        </a>



        <p class="text-xs text-slate-600 px-4 mt-8 mb-3">
            مدیریت محتوا
        </p>


        <a
            href="{{ route('admin.users.index') }}"
            class="
                flex items-center gap-3
                px-4 py-3
                rounded-2xl
                transition-all duration-300

                {{ request()->routeIs('admin.users.*')
                    ? 'bg-violet-500/20 text-violet-400 shadow-lg shadow-violet-500/10'
                    : 'text-slate-300 hover:bg-violet-500/10 hover:text-violet-400'
                }}
            ">

            <span>
                📂
            </span>

            کاربران

        </a>

        <a
            href="{{ route('admin.categories.index') }}"
            class="
                flex items-center gap-3
                px-4 py-3
                rounded-2xl
                transition-all duration-300

                {{ request()->routeIs('admin.categories.*')
                    ? 'bg-violet-500/20 text-violet-400 shadow-lg shadow-violet-500/10'
                    : 'text-slate-300 hover:bg-violet-500/10 hover:text-violet-400'
                }}
            ">

            <span>
                📂
            </span>

            دسته‌بندی‌ها

        </a>



        <a
            href="{{route('admin.posts.index')}}"
            class="
                flex items-center gap-3
                px-4 py-3
                rounded-2xl
                transition-all duration-300

                {{ request()->routeIs('admin.posts.*')
                    ? 'bg-violet-500/20 text-violet-400 shadow-lg shadow-violet-500/10'
                    : 'text-slate-300 hover:bg-violet-500/10 hover:text-violet-400'
                }}
            ">

            <span>
                📝
            </span>

            پست ها

        </a>



        <a
            href="{{ route('admin.tags.index') }}"
            class="
                flex items-center gap-3
                px-4 py-3
                rounded-2xl
                transition-all duration-300

                {{ request()->routeIs('admin.tags.*')
                    ? 'bg-violet-500/20 text-violet-400 shadow-lg shadow-violet-500/10'
                    : 'text-slate-300 hover:bg-violet-500/10 hover:text-violet-400'
                }}
            ">

            <span>
                🏷
            </span>

            تگ ها

        </a>


    </nav>



    {{-- User Box --}}
    <div
        class="
            mt-8
            p-4
            rounded-3xl
            bg-white/5
            border border-white/10
        ">

        <div class="flex items-center gap-3">


            <div
                class="
                    w-11 h-11
                    rounded-2xl
                    bg-gradient-to-br from-violet-600 to-blue-600
                    flex items-center justify-center
                    text-white
                    font-bold
                ">

                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

            </div>



            <div>

                <p class="text-white font-medium">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-xs text-slate-500">
                    مدیر سیستم
                </p>

            </div>


        </div>


    </div>


</aside>
<header
    class="
        h-24
        bg-[#0f172a]
        border-b border-slate-800
        flex items-center justify-between
        px-8
    ">


    {{-- Page Info --}}
    <div>

        <h2 class="text-2xl font-bold text-white">

            @yield('page-title', 'داشبورد')

        </h2>


        <p class="text-sm text-slate-400 mt-1">

            مدیریت آسان وبلاگ شما

        </p>

    </div>



    {{-- User --}}
    <div class="flex items-center gap-5">


        <div class="text-right">

            <p class="font-semibold text-white">

                {{ auth()->user()->name }}

            </p>


            <p class="text-sm text-slate-400">

                مدیر سیستم

            </p>

        </div>



        <div
            class="
                w-12 h-12
                rounded-2xl
                bg-gradient-to-br
                from-violet-600
                to-blue-600
                flex items-center justify-center
                text-white
                font-bold
                text-lg
            ">

            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

        </div>



        <form
            method="POST"
            action="{{ route('logout') }}">

            @csrf


            <button
                class="
                    px-5 py-2.5
                    rounded-xl
                    bg-red-500/10
                    text-red-400
                    hover:bg-red-500
                    hover:text-white
                    transition-all duration-300
                ">

                خروج

            </button>


        </form>


    </div>


</header>
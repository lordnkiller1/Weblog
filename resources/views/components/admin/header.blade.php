<header class="h-20 bg-white border-b flex items-center justify-between px-6">


    <div>

        <h2 class="font-bold text-lg">
            @yield('page-title')
        </h2>

    </div>


    <div class="flex items-center gap-4">

        <div class="text-right">

            <p class="font-medium">
                {{ auth()->user()->name }}
            </p>

            <p class="text-sm text-slate-500">
                Admin
            </p>

        </div>


        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                class="text-sm text-red-600 hover:text-red-800">

                Logout

            </button>

        </form>

    </div>


</header>
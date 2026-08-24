<aside class="w-72 bg-slate-950 text-white min-h-screen p-6">

    <div class="mb-10">

        <h1 class="text-2xl font-bold">
            Weblog
        </h1>

        <p class="text-sm text-slate-400 mt-1">
            Admin Dashboard
        </p>

    </div>


    <nav class="space-y-2">

        <a href="#"
           class="flex items-center gap-3 px-4 py-3 rounded-xl bg-slate-800 text-white">

            Dashboard

        </a>


        <p class="text-xs text-slate-500 mt-6 mb-2">
            Content
        </p>


        <a href="{{ route('admin.categories.index') }}"
           class="block px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            Categories

        </a>


        <a href="#"
           class="block px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            Posts

        </a>


        <a href="#"
           class="block px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            Tags

        </a>


    </nav>


</aside>
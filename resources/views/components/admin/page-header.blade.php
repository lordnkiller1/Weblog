<div class="flex items-center justify-between mb-8">


    <div>

        <h1 class="text-3xl font-bold text-white">
            {{ $title }}
        </h1>


        @isset($description)

        <p class="text-slate-400 mt-2">
            {{ $description }}
        </p>

        @endisset


    </div>



    @isset($action)

    <div>

        {{ $action }}

    </div>

    @endisset


</div>
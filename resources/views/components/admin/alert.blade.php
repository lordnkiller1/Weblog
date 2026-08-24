@if(session('success'))

<div
    class="
            mb-6
            rounded-2xl
            bg-emerald-500/10
            border border-emerald-500/20
            p-4
            text-emerald-400
        ">
    {{ session('success') }}
</div>

@endif



@if(session('error'))

<div
    class="
            mb-6
            rounded-2xl
            bg-red-500/10
            border border-red-500/20
            p-4
            text-red-400
        ">
    {{ session('error') }}
</div>

@endif
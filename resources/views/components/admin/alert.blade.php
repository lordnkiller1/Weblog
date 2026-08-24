@if(session('success'))

<div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4 text-green-700">

    {{ session('success') }}

</div>

@endif


@if(session('error'))

<div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4 text-red-700">

    {{ session('error') }}

</div>

@endif
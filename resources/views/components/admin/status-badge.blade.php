@if($status)

<span
    class="
            inline-flex items-center
            px-3 py-1
            rounded-full
            text-sm
            bg-emerald-500/10
            text-emerald-400
            border border-emerald-500/20
        ">
    فعال
</span>

@else

<span
    class="
            inline-flex items-center
            px-3 py-1
            rounded-full
            text-sm
            bg-red-500/10
            text-red-400
            border border-red-500/20
        ">
    غیرفعال
</span>

@endif
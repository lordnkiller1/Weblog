<span
    class="
        px-3 py-1
        rounded-full
        text-sm

        @if($role === 'admin')
            bg-violet-500/10
            text-violet-400

        @elseif($role === 'author')
            bg-blue-500/10
            text-blue-400

        @else
            bg-slate-500/10
            text-slate-400

        @endif
    "
>


    @switch($role)

        @case('admin')
            مدیر
            @break


        @case('author')
            نویسنده
            @break


        @default
            کاربر

    @endswitch


</span>
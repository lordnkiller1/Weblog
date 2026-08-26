@extends('admin.layouts.app')


@section('title', 'برچسب‌ها')


@section('content')


<x-admin.page-header
    title="برچسب‌ها"
    description="مدیریت برچسب‌های وبلاگ">

    <x-slot:action>

        @can('tags.create')

        <a
            href="{{ route('admin.tags.create') }}"
            class="
                    px-5 py-3
                    rounded-xl
                    bg-violet-600
                    text-white
                    hover:bg-violet-500
                    transition-all duration-300
                ">
            افزودن برچسب
        </a>

        @endcan

    </x-slot:action>

</x-admin.page-header>



<div
    class="
        bg-[#0f172a]
        border border-slate-800
        rounded-3xl
        overflow-hidden
        shadow-xl
    ">

    <table class="w-full text-right text-slate-300">

        <thead class="bg-slate-900 text-slate-400">

            <tr>

                <th class="p-5">
                    نام
                </th>

                <th class="p-5">
                    تعداد پست‌ها
                </th>

                <th class="p-5">
                    تاریخ ایجاد
                </th>

                <th class="p-5">
                    عملیات
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($tags as $tag)

            <tr
                class="
                        border-b border-slate-800
                        hover:bg-slate-800/50
                        transition
                    ">

                <td class="p-5 text-white font-medium">
                    {{ $tag->name }}
                </td>


                <td class="p-5 text-slate-400">
                    {{ $tag->posts_count }}
                </td>
                
                
                <td class="p-5 text-slate-400">
                    <x-jalali-date :date="$tag->created_at"/>
                </td>


                <td class="p-5 flex gap-3">

                    @can('tags.edit')

                    <a
                        href="{{ route('admin.tags.edit', $tag) }}"
                        class="
                                    px-4 py-2
                                    rounded-lg
                                    bg-amber-500/10
                                    text-amber-400
                                    hover:bg-amber-500
                                    hover:text-white
                                    transition
                                ">
                        ویرایش
                    </a>

                    @endcan


                    @can('tags.delete')

                    <x-admin.delete-button
                        :action="route('admin.tags.destroy', $tag)" />

                    @endcan

                </td>

            </tr>

            @empty

            <tr>

                <td
                    colspan="3"
                    class="
                            p-10
                            text-center
                            text-slate-500
                        ">
                    برچسبی وجود ندارد
                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>



<div class="mt-8">

    {{ $tags->links() }}

</div>


@endsection
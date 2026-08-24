@extends('admin.layouts.app')

@section('title', 'دسته‌بندی‌ها')

@section('content')


<x-admin.page-header
    title="دسته‌بندی‌ها"
    description="مدیریت دسته‌بندی‌های وبلاگ">

    <x-slot:action>

        <a
            href="{{ route('admin.categories.create') }}"
            class="
                px-5 py-3
                rounded-2xl
                bg-gradient-to-r from-violet-600 to-blue-600
                text-white
                font-medium
                shadow-lg shadow-violet-500/20
                hover:scale-105
                transition-all duration-300
            ">
            افزودن دسته‌بندی
        </a>

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
                    تصویر
                </th>

                <th class="p-5">
                    نام
                </th>

                <th class="p-5">
                    وضعیت
                </th>

                <th class="p-5">
                    عملیات
                </th>

            </tr>

        </thead>



        <tbody>


            @forelse($categories as $category)


            <tr
                class="
                    border-b border-slate-800
                    hover:bg-slate-800/50
                    transition-all duration-300
                ">


                <td class="p-5">


                    @if($category->image)

                    <img
                        src="{{ asset('storage/'.$category->image) }}"
                        class="
                                w-14 h-14
                                rounded-2xl
                                object-cover
                                border border-slate-700
                            ">

                    @else

                    <div
                        class="
                                w-14 h-14
                                rounded-2xl
                                bg-slate-800
                                flex items-center justify-center
                                text-slate-500
                            ">
                        بدون تصویر
                    </div>

                    @endif


                </td>



                <td class="p-5 font-medium text-white">

                    {{ $category->name }}

                </td>



                <td class="p-5">

                    <x-admin.status-badge
                        :status="$category->status" />

                </td>



                <td class="p-5 flex gap-3">


                    <a
                        href="{{ route('admin.categories.edit', $category) }}"
                        class="
                            px-4 py-2
                            rounded-xl
                            bg-amber-500/10
                            text-amber-400
                            hover:bg-amber-500
                            hover:text-white
                            transition-all duration-300
                        ">
                        ویرایش
                    </a>



                    <x-admin.delete-button
                        :action="route('admin.categories.destroy', $category)" />


                </td>


            </tr>


            @empty


            <tr>

                <td
                    colspan="4"
                    class="
                        p-10
                        text-center
                        text-slate-500
                    ">
                    دسته‌بندی‌ای وجود ندارد

                </td>

            </tr>


            @endforelse


        </tbody>


    </table>


</div>



<div class="mt-8">

    {{ $categories->links() }}

</div>


@endsection
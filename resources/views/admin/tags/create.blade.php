@extends('admin.layouts.app')


@section('title', 'افزودن برچسب')


@section('content')


<x-admin.page-header
    title="افزودن برچسب"
    description="ایجاد یک برچسب جدید برای مطالب وبلاگ" />



<div
    class="
        max-w-4xl
        bg-[#0f172a]
        border border-slate-800
        rounded-3xl
        p-10
        shadow-xl
    ">

    <form
        action="{{ route('admin.tags.store') }}"
        method="POST">

        @csrf


        <div class="space-y-6">


            <div>

                <label class="block mb-2 text-sm text-slate-300">
                    نام برچسب
                </label>


                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="مثلاً Laravel"
                    class="
                        w-full
                        px-5 py-3
                        rounded-xl
                        bg-slate-900
                        border border-slate-700
                        text-white
                        placeholder:text-slate-600
                        focus:border-violet-500
                        outline-none
                        transition
                    ">


                @error('name')

                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>

                @enderror

            </div>



            <div
                class="
                    flex
                    justify-end
                    gap-4
                    pt-6
                ">

                <a
                    href="{{ route('admin.tags.index') }}"
                    class="
                        px-6 py-3
                        rounded-xl
                        border border-slate-700
                        text-slate-300
                        hover:bg-slate-800
                        hover:text-white
                        transition
                    ">
                    لغو
                </a>


                <button
                    type="submit"
                    class="
                        px-8 py-3
                        rounded-xl
                        bg-violet-600
                        text-white
                        hover:bg-violet-500
                        transition
                    ">
                    ذخیره برچسب
                </button>

            </div>

        </div>

    </form>

</div>


@endsection
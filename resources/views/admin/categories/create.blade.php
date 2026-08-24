@extends('admin.layouts.app')


@section('title', 'افزودن دسته‌بندی')


@section('content')


<x-admin.page-header
    title="افزودن دسته‌بندی"
    description="ایجاد یک دسته‌بندی جدید برای مطالب وبلاگ"
/>



<div
    class="
        max-w-6xl
        bg-[#0f172a]
        border border-slate-800
        rounded-3xl
        p-10
        shadow-xl
    "
>


    <form
        action="{{ route('admin.categories.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf


        <div
            class="
                grid
                grid-cols-1
                lg:grid-cols-3
                gap-8
            "
        >



            {{-- Image --}}

            <div
                x-data="{ imageUrl: null }"
                class="
                    lg:col-span-1
                    bg-slate-900
                    border border-slate-800
                    rounded-3xl
                    p-6
                "
            >


                <h3 class="text-white font-semibold mb-5">
                    تصویر دسته‌بندی
                </h3>



                <div
                    class="
                        h-64
                        rounded-2xl
                        bg-slate-800
                        overflow-hidden
                        flex
                        items-center
                        justify-center
                        mb-5
                    "
                >


                    <img
                        x-show="imageUrl"
                        :src="imageUrl"
                        class="
                            w-full
                            h-full
                            object-cover
                        "
                    >


                    <span
                        x-show="!imageUrl"
                        class="text-slate-500"
                    >
                        پیش‌نمایش تصویر
                    </span>


                </div>



                <input
                    type="file"
                    name="image"
                    accept="image/*"
                    @change="
                        imageUrl = URL.createObjectURL($event.target.files[0])
                    "
                    class="
                        w-full
                        text-sm
                        text-slate-400

                        file:bg-violet-600
                        file:text-white
                        file:border-0
                        file:rounded-xl
                        file:px-4
                        file:py-2

                        hover:file:bg-violet-500
                    "
                >


                @error('image')

                    <p class="mt-3 text-sm text-red-400">
                        {{ $message }}
                    </p>

                @enderror


            </div>





            {{-- Information --}}

            <div
                class="
                    lg:col-span-2
                    space-y-6
                "
            >



                <div>


                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            text-slate-300
                        "
                    >
                        نام دسته‌بندی
                    </label>



                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="مثلا Laravel"
                        class="
                            w-full
                            px-5
                            py-3
                            rounded-2xl
                            bg-slate-900
                            border border-slate-700
                            text-white
                            placeholder:text-slate-600
                            focus:border-violet-500
                            outline-none
                            transition
                        "
                    >


                    @error('name')

                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>

                    @enderror


                </div>





                <div>


                    <label
                        class="
                            block
                            mb-2
                            text-sm
                            text-slate-300
                        "
                    >
                        وضعیت
                    </label>



                    <select
                        name="status"
                        class="
                            w-full
                            px-5
                            py-3
                            rounded-2xl
                            bg-slate-900
                            border border-slate-700
                            text-white
                            focus:border-violet-500
                            outline-none
                        "
                    >

                        <option value="1">
                            فعال
                        </option>


                        <option value="0">
                            غیرفعال
                        </option>


                    </select>


                    @error('status')

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
                        pt-8
                    "
                >


                    <a
                        href="{{ route('admin.categories.index') }}"
                        class="
                            px-6
                            py-3
                            rounded-xl
                            border
                            border-slate-700
                            text-slate-300
                            hover:bg-slate-800
                            hover:text-white
                            transition-all duration-300
                        "
                    >
                        لغو
                    </a>



                    <button
                        type="submit"
                        class="
                            px-8
                            py-3
                            rounded-xl
                            bg-violet-600
                            text-white
                            font-medium
                            hover:bg-violet-500
                            hover:-translate-y-0.5
                            transition-all duration-300
                        "
                    >
                        ذخیره دسته‌بندی
                    </button>


                </div>


            </div>


        </div>


    </form>


</div>


@endsection
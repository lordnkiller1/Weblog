@extends('admin.layouts.app')


@section('title', 'ویرایش پست')


@section('content')


<x-admin.page-header
    title="ویرایش پست"
    description="ویرایش اطلاعات مطلب" />



<div
    class="
        max-w-6xl
        bg-[#0f172a]
        border border-slate-800
        rounded-3xl
        p-10
        shadow-xl
    ">

    <form
        action="{{ route('admin.posts.update', $post) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">


            <div
                x-data="{
                    imageUrl: '{{ $post->image ? asset('storage/' . $post->image) : '' }}'
                }"
                class="
                    lg:col-span-1
                    bg-slate-900
                    border border-slate-800
                    rounded-3xl
                    p-6
                ">

                <h3 class="text-white font-semibold mb-5">
                    تصویر پست
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
                    ">

                    <img
                        x-show="imageUrl"
                        :src="imageUrl"
                        class="w-full h-full object-cover">


                    <span
                        x-show="!imageUrl"
                        class="text-slate-500">
                        بدون تصویر
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
                    ">


                @error('image')

                <p class="mt-3 text-sm text-red-400">
                    {{ $message }}
                </p>

                @enderror

            </div>



            <div
                class="
                    lg:col-span-2
                    space-y-6
                ">

                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        عنوان
                    </label>


                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $post->title) }}"
                        class="
                            w-full
                            px-5 py-3
                            rounded-2xl
                            bg-slate-900
                            border border-slate-700
                            text-white
                            focus:border-violet-500
                            outline-none
                        ">


                    @error('title')

                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>

                    @enderror

                </div>



                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        دسته‌بندی
                    </label>


                    <select
                        name="category_id"
                        class="
                            w-full
                            px-5 py-3
                            rounded-2xl
                            bg-slate-900
                            border border-slate-700
                            text-white
                            outline-none
                        ">

                        @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(
                            old( 'category_id' ,
                            $post->category_id
                            ) == $category->id
                            )
                            >
                            {{ $category->name }}
                        </option>

                        @endforeach

                    </select>


                    @error('category_id')

                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>

                    @enderror

                </div>



                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        برچسب‌ها
                    </label>


                    <select
                        name="tags[]"
                        multiple
                        class="
                            w-full
                            min-h-40
                            px-5 py-3
                            rounded-2xl
                            bg-slate-900
                            border border-slate-700
                            text-white
                            outline-none
                        ">

                        @foreach($tags as $tag)

                        <option
                            value="{{ $tag->id }}"
                            @selected(
                            in_array(
                            $tag->id,
                            old('tags', $selectedTags)
                            )
                            )
                            >
                            {{ $tag->name }}
                        </option>

                        @endforeach

                    </select>


                    @error('tags')

                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>

                    @enderror


                    @error('tags.*')

                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>

                    @enderror

                </div>



                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        محتوا
                    </label>


                    <textarea
                        name="content"
                        rows="12"
                        class="
                            w-full
                            px-5 py-3
                            rounded-2xl
                            bg-slate-900
                            border border-slate-700
                            text-white
                            focus:border-violet-500
                            outline-none
                            resize-y
                        ">{{ old('content', $post->content) }}</textarea>


                    @error('content')

                    <p class="mt-2 text-sm text-red-400">
                        {{ $message }}
                    </p>

                    @enderror

                </div>



                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label class="block mb-2 text-sm text-slate-300">
                            وضعیت
                        </label>


                        <select
                            name="status"
                            class="
                                w-full
                                px-5 py-3
                                rounded-2xl
                                bg-slate-900
                                border border-slate-700
                                text-white
                                outline-none
                            ">

                            <option
                                value="draft"
                                @selected(
                                old('status', $post->status) === 'draft'
                                )
                                >
                                پیش‌نویس
                            </option>


                            <option
                                value="published"
                                @selected(
                                old( 'status' ,
                                $post->status
                                ) === 'published'
                                )
                                >
                                منتشر شده
                            </option>

                        </select>


                        @error('status')

                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>

                        @enderror

                    </div>



                    <div>

                        <label class="block mb-2 text-sm text-slate-300">
                            تاریخ انتشار
                        </label>


                        <jalali-date-picker
                            id="published_at_picker"
                            system="jalali"
                            locale="fa"
                            value-format="gregorian-iso"
                            precision="date"></jalali-date-picker>


                        <input
                            type="hidden"
                            name="published_at"
                            id="published_at">


                        @error('published_at')

                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>

                        @enderror

                    </div>

                </div>



                <label
                    class="
                        flex
                        items-center
                        gap-3
                        text-slate-300
                        cursor-pointer
                    ">

                    <input
                        type="checkbox"
                        name="is_featured"
                        value="1"
                        @checked(
                        old( 'is_featured' ,
                        $post->is_featured
                    )
                    )
                    class="
                    w-5
                    h-5
                    rounded
                    bg-slate-900
                    border-slate-700
                    text-violet-600
                    focus:ring-violet-500
                    "
                    >

                    <span>
                        پست ویژه
                    </span>

                </label>


                @error('is_featured')

                <p class="mt-2 text-sm text-red-400">
                    {{ $message }}
                </p>

                @enderror



                <div
                    class="
                        flex
                        justify-end
                        gap-4
                        pt-6
                    ">

                    <a
                        href="{{ route('admin.posts.index') }}"
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
                        بروزرسانی پست
                    </button>

                </div>

            </div>

        </div>

    </form>

</div>


@endsection
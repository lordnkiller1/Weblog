@extends('admin.layouts.app')


@section('title', 'افزودن کاربر')


@section('content')


    <x-admin.page-header title="افزودن کاربر" description="ایجاد کاربر جدید در سیستم" />



    <div
        class="
        max-w-4xl
        bg-[#0f172a]
        border border-slate-800
        rounded-3xl
        p-10
        shadow-xl
    ">


        <form action="{{ route('admin.users.store') }}" method="POST">

            @csrf


            <div class="space-y-6">


                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        نام کاربر
                    </label>


                    <input type="text" name="name" value="{{ old('name') }}" placeholder="نام کاربر"
                        class="
                        w-full
                        px-5 py-3
                        rounded-xl
                        bg-slate-900
                        border border-slate-700
                        text-white
                        placeholder:text-slate-600
                        outline-none
                    ">


                    @error('name')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror


                </div>




                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        ایمیل
                    </label>


                    <input type="email" name="email" value="{{ old('email') }}" placeholder="example@gmail.com"
                        class="
                        w-full
                        px-5 py-3
                        rounded-xl
                        bg-slate-900
                        border border-slate-700
                        text-white
                        placeholder:text-slate-600
                        outline-none
                    ">


                    @error('email')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror


                </div>




                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        رمز عبور
                    </label>


                    <input type="password" name="password" placeholder="حداقل ۸ کاراکتر"
                        class="
                        w-full
                        px-5 py-3
                        rounded-xl
                        bg-slate-900
                        border border-slate-700
                        text-white
                        placeholder:text-slate-600
                        outline-none
                    ">


                    @error('password')
                        <p class="mt-2 text-sm text-red-400">
                            {{ $message }}
                        </p>
                    @enderror


                </div>




                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        نقش کاربر
                    </label>


                    <select name="role"
                        class="
                        w-full
                        px-5 py-3
                        rounded-xl
                        bg-slate-900
                        border border-slate-700
                        text-white
                        outline-none
                    ">


                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" @selected(old('role') === $role->name)>

                                @switch($role->name)
                                    @case('admin')
                                        مدیر
                                    @break

                                    @case('author')
                                        نویسنده
                                    @break

                                    @default
                                        کاربر
                                @endswitch


                            </option>
                        @endforeach


                    </select>


                    @error('role')
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


                    <a href="{{ route('admin.users.index') }}"
                        class="
                        px-6 py-3
                        rounded-xl
                        border border-slate-700
                        text-slate-300
                        hover:bg-slate-800
                        transition
                    ">

                        لغو

                    </a>



                    <button type="submit"
                        class="
                        px-8 py-3
                        rounded-xl
                        bg-violet-600
                        text-white
                        hover:bg-violet-500
                        transition
                    ">

                        ذخیره کاربر

                    </button>


                </div>


            </div>


        </form>


    </div>


@endsection

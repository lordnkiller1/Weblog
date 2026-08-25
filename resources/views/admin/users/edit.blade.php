@extends('admin.layouts.app')


@section('title', 'ویرایش کاربر')


@section('content')


    <x-admin.page-header title="ویرایش کاربر" description="ویرایش اطلاعات کاربر سیستم" />



    <div
        class="
        max-w-4xl
        bg-[#0f172a]
        border border-slate-800
        rounded-3xl
        p-10
        shadow-xl
    ">


        <form action="{{ route('admin.users.update', $user) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="space-y-6">


                <div>

                    <label class="block mb-2 text-sm text-slate-300">
                        نام کاربر
                    </label>


                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="
                        w-full
                        px-5 py-3
                        rounded-xl
                        bg-slate-900
                        border border-slate-700
                        text-white
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


                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="
                        w-full
                        px-5 py-3
                        rounded-xl
                        bg-slate-900
                        border border-slate-700
                        text-white
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
                        رمز عبور جدید
                    </label>


                    <input type="password" name="password" placeholder="در صورت تغییر وارد کنید"
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




                @can('users.edit')

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
                                <option value="{{ $role->name }}" @selected($user->hasRole($role->name))>

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

                @endcan




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

                        بروزرسانی

                    </button>


                </div>


            </div>


        </form>


    </div>


@endsection

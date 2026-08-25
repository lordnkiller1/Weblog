@extends('admin.layouts.app')


@section('title', 'کاربران')


@section('content')


    <x-admin.page-header title="کاربران" description="مدیریت کاربران سیستم">

        <x-slot:action>

            @can('users.create')
                <a href="{{ route('admin.users.create') }}"
                    class="
                    px-5 py-3
                    rounded-xl
                    bg-violet-600
                    text-white
                    hover:bg-violet-500
                    transition-all duration-300
               ">

                    افزودن کاربر

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
                        ایمیل
                    </th>


                    <th class="p-5">
                        نقش
                    </th>


                    <th class="p-5">
                        تاریخ ثبت
                    </th>


                    <th class="p-5">
                        عملیات
                    </th>


                </tr>

            </thead>



            <tbody>


                @forelse($users as $user)
                    <tr
                        class="
                    border-b border-slate-800
                    hover:bg-slate-800/50
                    transition
                ">


                        <td class="p-5 text-white font-medium">

                            {{ $user->name }}

                        </td>



                        <td class="p-5">

                            {{ $user->email }}

                        </td>



                        <td class="p-5">

                            <x-admin.role-badge :role="$user->getRoleNames()->first()" />

                        </td>



                        <td class="p-5">

                            {{ $user->created_at->format('Y/m/d') }}

                        </td>



                        <td class="p-5 flex gap-3">


                            @can('users.edit')
                                <a href="{{ route('admin.users.edit', $user) }}"
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




                            @can('users.delete')
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">

                                    @csrf
                                    @method('DELETE')


                                    <button
                                        class="
                                    px-4 py-2
                                    rounded-lg
                                    bg-red-500/10
                                    text-red-400
                                    hover:bg-red-500
                                    hover:text-white
                                    transition
                                ">

                                        حذف

                                    </button>


                                </form>
                            @endcan


                        </td>


                    </tr>



                @empty


                    <tr>

                        <td colspan="5"
                            class="
                        p-10
                        text-center
                        text-slate-500
                    ">

                            کاربری وجود ندارد

                        </td>

                    </tr>
                @endforelse



            </tbody>


        </table>


    </div>



    <div class="mt-8">

        {{ $users->links() }}

    </div>


@endsection

<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::query()
            ->latest()
            ->paginate(10);


        return view('admin.users.index', compact('users'));
    }



    public function create()
    {
        return view('admin.users.create');
    }



    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();


        $data['password'] = Hash::make($data['password']);


        User::create($data);


        return to_route('admin.users.index')
            ->with('success', 'کاربر با موفقیت ایجاد شد');
    }




    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }





    public function update(
        UpdateUserRequest $request,
        User $user
    ) {

        $data = $request->validated();



        if (!empty($data['password'])) {

            $data['password'] = Hash::make(
                $data['password']
            );
        } else {

            unset($data['password']);
        }



        $user->update($data);



        return to_route('admin.users.index')
            ->with('success', 'کاربر با موفقیت بروزرسانی شد');
    }






    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {

            return back()
                ->with(
                    'error',
                    'نمی‌توانید حساب خودتان را حذف کنید'
                );
        }



        if (
            $user->role === 'admin'
            &&
            User::where('role', 'admin')->count() <= 1
        ) {

            return back()
                ->with(
                    'error',
                    'آخرین مدیر سیستم قابل حذف نیست'
                );
        }



        $user->delete();


        return to_route('admin.users.index')
            ->with('success', 'کاربر حذف شد');
    }
}

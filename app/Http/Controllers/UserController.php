<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [

            new Middleware(
                'permission:users.view',
                only: ['index', 'show']
            ),

            new Middleware(
                'permission:users.create',
                only: ['create', 'store']
            ),

            new Middleware(
                'permission:users.edit',
                only: ['edit', 'update']
            ),

            new Middleware(
                'permission:users.delete',
                only: ['destroy']
            ),

        ];
    }


    public function index()
    {
        $users = User::with('roles')
        ->latest()
            ->paginate(10);


        return view('admin.users.index', compact('users'));
    }



    public function create()
    {
        $roles = Role::all();


        return view('admin.users.create', compact('roles'));
    }



    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();


        if (
            $data['role'] === 'admin'
            &&
            ! auth()->user()->hasRole('admin')
        ) {
            abort(403);
        }


        $user = User::create([
            'name' => $data['name'],

            'email' => $data['email'],

            'password' => Hash::make(
                $data['password']
            ),
        ]);


        $user->assignRole($data['role']);


        return to_route('admin.users.index')
            ->with('success', 'کاربر با موفقیت ایجاد شد');
    }



    public function edit(User $user)
    {
        $roles = Role::all();


        return view(
            'admin.users.edit',
            compact('user', 'roles')
        );
    }



    public function update(
        UpdateUserRequest $request,
        User $user
    ) {

        $data = $request->validated();


        if (
            isset($data['role'])
            &&
            $data['role'] !== $user->getRoleNames()->first()
            &&
            ! auth()->user()->hasRole('admin')
        ) {
            abort(403);
        }



        $updateData = [
            'name' => $data['name'],
            'email' => $data['email'],
        ];



        if (! empty($data['password'])) {

            $updateData['password'] = Hash::make(
                $data['password']
            );

        }



        $user->update($updateData);



        if (isset($data['role'])) {

            if (
                $user->hasRole('admin')
                &&
                $data['role'] !== 'admin'
                &&
                User::role('admin')->count() <= 1
            ) {

                return back()
                    ->with(
                        'error',
                        'آخرین مدیر سیستم قابل تغییر نیست'
                    );
            }


            $user->syncRoles([
                $data['role']
            ]);
        }



        return to_route('admin.users.index')
            ->with(
                'success',
                'کاربر با موفقیت بروزرسانی شد'
            );
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
            $user->hasRole('admin')
            &&
            User::role('admin')->count() <= 1
        ) {

            return back()
                ->with(
                    'error',
                    'آخرین مدیر سیستم قابل حذف نیست'
                );
        }



        $user->delete();


        return to_route('admin.users.index')
            ->with(
                'success',
                'کاربر حذف شد'
            );
    }
}
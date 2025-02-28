<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('dashboard.admin.users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.users.create');
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admin.users.edit', ['user' => $user]);
    }

    public function permission(int $id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admin.users.permission', ['user' => $user]);
    }
}

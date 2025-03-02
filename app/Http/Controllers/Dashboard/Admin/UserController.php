<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();

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
        // User cannot edit himself
        if(Auth::user()->id === $id){
            return redirect(route('admin.dashboard.users'));
        }

        $user = User::findOrFail($id);
        return view('dashboard.admin.users.edit', ['user' => $user]);
    }

    public function role(int $id)
    {
        // User cannot edit himself
        if(Auth::user()->id === $id){
            return redirect(route('admin.dashboard.users'));
        }

        $user = User::findOrFail($id);
        return view('dashboard.admin.users.role', ['user' => $user]);
    }
}

<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNot('name', 'client')->get();

        return view('dashboard.admin.roles.index', [
            'roles' => $roles
        ]);
    }

    public function permission(int $id)
    {
        $role = Role::where(['id' => $id])->first();
        $permissions = Permission::all();
        $rolePermissions = $role->permissions;

        $userPermissions = $permissions->filter(function($permission) {
            return stripos($permission->name, 'users') !== false;
        });

        return view('dashboard.admin.roles.permission', [
            'rolePermissions' => $rolePermissions,
            'permissions' => $permissions,
            'userPermissions' => $userPermissions,
            'role' => $role
        ]);
    }
}

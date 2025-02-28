<?php

namespace App\Livewire\Dashboard\Admin\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class Permission extends Component
{
    public int $id;
    public $dynamicData = [];

    public function mount()
    {
        $role = Role::where(['id' => $this->id])->first();

        $permissions = SpatiePermissionModel::all();

        // Get current roles permissions and set default state
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        foreach($permissions as $permission) {
            $name = str_replace(' ', '_', $permission->name);

            if(in_array($permission->name, $rolePermissions)) {
                $this->set($name, true);
            }
            else {
                $this->set($name, false);
            }

        }
        
    }

    public function set($key, $value) {
        $this->dynamicData[$key] = $value;
    }

    public function get($name)
    {
        return $this->dynamicData[$name] ?? null;
    }

    public function setPermission()
    {
        //dd($this->dynamicData);
        //dd( $this->get('manage_users'));

        $role = Role::where(['id' => $this->id])->first();
        $permissions = SpatiePermissionModel::all();

        foreach($permissions as $permission) {

            $name = str_replace(' ', '_', $permission->name);
           
            if($this->dynamicData[$name] == true) {
                $role->givePermissionTo($permission->name);
            }

            if($this->dynamicData[$name] == false) {
                $role->revokePermissionTo($permission->name);
            }
        }

    }

    public function render()
    {

        $role = Role::where(['id' => $this->id])->first();
        $permissions = SpatiePermissionModel::all();
        $rolePermissions = $role->permissions;

        $userPermissions = $permissions->filter(function($permission) {
            return stripos($permission->name, 'users') !== false;
        });


        return view('livewire.dashboard.admin.roles.permission', [
            'rolePermissions' => $rolePermissions,
            'permissions' => $permissions,
            'userPermissions' => $userPermissions,
            'role' => $role
        ]);
    }
}

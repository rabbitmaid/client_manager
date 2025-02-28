<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Log;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'administrator'],
            ['name' => 'staff'],
            ['name' => 'client']
        ];

        $permissions = [
            ['name' => 'manage users'],
            ['name' => 'create users'],
            ['name' => 'update users'],
            ['name' => 'delete users'],
            ['name' => 'manage users roles']
        ];

        foreach($roles as $role){
            $create = Role::firstOrCreate(['name' => $role['name']]);
        }

        // Create permissions and assign to administrator
        foreach($permissions as $permission) {
            $create = Permission::firstOrCreate(['name' => $permission['name']]);
            $create->assignRole('administrator');
        }
    }
}

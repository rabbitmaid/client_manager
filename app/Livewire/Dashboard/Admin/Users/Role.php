<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Collection;

class Role extends Component
{
    public $id;
    public array $roles;
    public Collection $savedRoles;
    
    public string $administrator;
    public string $client;
    public string $staff;

    public function mount()
    {
        $this->administrator = \App\Helpers\Roles::ADMINISTRATOR;
        $this->client = \App\Helpers\Roles::CLIENT;
        $this->staff = \App\Helpers\Roles::STAFF;

        $user = User::find($this->id);
   
        // Existing user roles
        $this->roles = $user->getRoleNames()->toArray();
        
        // All system roles
        $this->savedRoles = \Spatie\Permission\Models\Role::all();
     
    }

    public function setAdministrator()
    {
        $user = User::find($this->id);

        if($this->administrator == "") {
            $user->removeRole(\App\Helpers\Roles::ADMINISTRATOR);
        }else{
            $user->assignRole(\App\Helpers\Roles::ADMINISTRATOR);
        }
    }

    public function setStaff()
    {
        $user = User::find($this->id);

        if($this->staff == "") {
            $user->removeRole(\App\Helpers\Roles::STAFF);
        }else{
            $user->assignRole(\App\Helpers\Roles::STAFF);
        }
    }

    public function setClient()
    {
        $user = User::find($this->id);

        if($this->client == "") {
            $user->removeRole(\App\Helpers\Roles::CLIENT);
        }else{
            $user->assignRole(\App\Helpers\Roles::CLIENT);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.admin.users.role');
    }
}

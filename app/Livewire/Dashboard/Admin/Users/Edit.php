<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{   
    public int $id;
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public array $existingRoles;
    public array $roles;
    public Collection $savedRoles;

    public function mount()
    {
        $user = User::find($this->id);
        $this->name = $user->name;
        $this->email = $user->email;

        // keep track of user existing roles
        $this->existingRoles = $user->getRoleNames()->toArray();

        // Roles to update
        $this->roles = $user->getRoleNames()->toArray();

        // All roles
        $this->savedRoles = \Spatie\Permission\Models\Role::all();
    
    }

    public function update(int $id)
    {

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'roles' => ['required'],
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email']
        ]);

        // If there is a role that is not selected now, remove it
        foreach($this->existingRoles as $role) {
            if(!in_array($role, $this->roles)) {
                $user->removeRole($role);
            }
        }
        
        // Assign new roles to user
        foreach($validated['roles'] as $role){
            $user->assignRole($role);
        }

        $this->redirect(route('admin.dashboard.users', absolute: false), navigate: true);
    }

    public function changePassword()
    {

    }

    public function render()
    {
        return view('livewire.dashboard.admin.users.edit');
    }
}

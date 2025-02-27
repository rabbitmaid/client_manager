<?php

namespace App\Livewire\Dashboard\Admin\Users;
use App\Models\User;

use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = '';

    public function create()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']
        ]);

        // event(new Registered(($user = User::create($validated))));

        $user->assignRole($validated['role']);

        $this->redirect(route('admin.dashboard.users', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.users.create');
    }
}

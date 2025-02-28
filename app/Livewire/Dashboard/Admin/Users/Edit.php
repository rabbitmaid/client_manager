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
    public string $is_active;

    public function mount()
    {
        $user = User::find($this->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_active = $user->is_active == true ? 'active' : 'not_active';
    }

    public function update(int $id)
    {

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'is_active' => ['required'],
        ]);

        $user = User::find($id);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'is_active' => $validated['is_active'] === 'active' ? true : false
        ]);

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

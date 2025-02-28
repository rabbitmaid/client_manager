<?php

namespace App\Livewire\Dashboard\Admin\Users;

use App\Models\User;
use Livewire\Component;

class Delete extends Component
{
    public int $id;

    public function delete()
    {
        $user = User::find($this->id);
        $roles = $user->getRoleNames();

        foreach($roles as $role) {
            $user->removeRole($role);
        }

        $user->delete();

        return $this->redirect(route('admin.dashboard.users'), true);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.users.delete');
    }
}

<?php

namespace App\Http\Livewire\Managament;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermission extends Component
{
    public $role, $permission;

    protected $rules = [
        'role' => 'required',
        'permission' => 'required',
    ];

    public function render()
    {
        return view('livewire.managament.create-permission', [
            'access' => Permission::all(),
            'roles' => Role::doesntHave('permissions')->where('name', '!=', 'SuperAdmin')->get(),
        ]);
    }

    public function create()
    {
        $this->validate();
        $role = Role::find($this->role);
        $role->givePermissionTo($this->permission);
        $this->emit('post');
        $this->reset();
        session()->flash('success', 'create new related permission & role is success');
    }
}

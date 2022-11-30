<?php

namespace App\Http\Livewire\Managament;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EditPermission extends Component
{
    public $role, $post;

    public $access_no_active, $access_active, $permission;

    protected $rules = [
        'access_no_active.*' => 'nullable'
    ];

    public function mount($posting)
    {
        $id = $posting->id;
        $data = Role::find($id);
        $this->post = $data;

        // with access
        $this->access_active = $data->permissions->pluck('name');

        // no access
        $temp = Permission::query()->whereDoesntHave('roles', function ($q) use ($id) {
            return $q->where('id', $id);
        })->get();
        $this->validate();
        $this->access_no_active = $temp;
    }

    public function update($id)
    {
        $role = Role::find($id);
        $role->syncPermissions($this->access_active, $this->permission);
        $this->emit('edit');
        session()->flash('success', 'update permissions of role is success');
    }

    public function delete($id)
    {
        $data = Role::find($id);
        $data->syncPermissions([]);
        $this->emit('edit');
        session()->flash('delete', 'delete all permissions is success');
    }
}

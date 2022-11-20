<?php

namespace App\Http\Livewire\Managament;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditRole extends Component
{
    public $post, $role;

    protected $rules = [
        'role' => 'required'
    ];

    public function mount($posting)
    {
        $id = $posting->id;
        $data = Role::find($id);
        $this->post = $data;
        $this->role = $data->name;
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        session()->flash('delete', 'delete role is success');
        $this->emit('edit');
    }

    public function update($id)
    {
        Role::find($id)->update([
            'name' => $this->role
        ]);
        session()->flash('success', 'update role is success');
        $this->emit('edit');
    }
}

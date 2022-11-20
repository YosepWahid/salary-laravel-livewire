<?php

namespace App\Http\Livewire\Managament;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $role;

    protected $rules = [
        'role' => 'required'
    ];

    public function render()
    {
        return view('livewire.managament.create-role');
    }

    public function create()
    {
        $this->validate();
        Role::create([
            'name' => $this->role
        ]);
        $this->emit('post');
        $this->reset();
        session()->flash('success', 'create new role success');
    }
}

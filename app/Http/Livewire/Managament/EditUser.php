<?php

namespace App\Http\Livewire\Managament;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    // update and detail
    public $name, $email, $active, $address, $work_unit, $password, $password_verify, $role, $post;

    public $superRole, $roles;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password_verify' => 'same:password',
    ];

    public function mount($posting)
    {
        $id = $posting->id;
        $data = User::find($id);
        $this->name = $data->name;
        $this->email = $data->email;
        $this->address = $data->address;
        $this->work_unit = $data->work_unit;
        $this->role = $data->roles->pluck('name');
        $this->active = $data->active;
        $this->post = $data;
        $this->superRole = Role::all();
        $this->roles = Role::where('name', '!=', 'SuperAdmin')->get();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('delete', 'delete user is success');
        $this->emit('edit');
    }

    public function update($id)
    {
        $this->validate();
        $user = User::find($id);
        if ($this->password == '') {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'address' => $this->address,
                'active' => $this->active,
                'work_unit' => $this->work_unit,
            ]);
        } else {
            $user->update([
                'password' => Hash::make($this->password),
            ]);
        }
        $user->syncRoles([$this->role]);
        session()->flash('success', 'update user is success');
        $this->emit('edit');
    }
}

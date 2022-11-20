<?php

namespace App\Http\Livewire\Managament;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{

    public $name, $email, $active = false, $address, $work_unit, $password, $role, $password_verify;

    // blom
    protected $rules = [
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:6',
        'password_verify' => 'required|same:password',
    ];

    public function render()
    {
        return view('livewire.managament.create-user', [
            'roles' => Role::where('name', '!=', 'SuperAdmin'),
            'superRole' => Role::all(),
        ]);
    }

    public function create()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'active' => $this->active,
            'address' => $this->address,
            'work_unit' => $this->work_unit,
            'email_verified_at' => now(),
            'remember_token' =>  Str::random(10),
            'password'  => Hash::make($this->password),
            'active' => $this->active,
            'create_at' => Carbon::now(),
        ]);

        $user->syncRoles([$this->role]);
        $this->emit('post');
        $this->reset();
        session()->flash('success', 'create new user success');
    }
}

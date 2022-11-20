<?php

namespace App\Http\Livewire\Managament;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class PostPermission extends Component
{
    use WithPagination;

    public $show = 5, $search;

    protected $listeners = [
        'post' => '$refresh',
        'edit' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public function getQueryString()
    {
        return [];
    }

    public function render()
    {
        $searching = '%' . $this->search . '%';
        if (!$this->search) {
            return view('livewire.managament.post-permission', [
                'roles' => Role::where('name', '!=', 'SuperAdmin')->paginate($this->show),
                'superRoles' => Role::paginate($this->show),
            ]);
        } else {
            return view('livewire.managament.post-permission', [
                'roles' => Role::where('name', '!=', 'SuperAdmin')->where('name', 'like', $searching)->paginate($this->show),
                'superRoles' => Role::where('name', 'like', $searching)->paginate($this->show),
            ]);
        }
    }
}

<?php

namespace App\Http\Livewire\Managament;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class PostRole extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $show = 5, $search;

    public function getQueryString()
    {
        return [];
    }

    protected $listeners = [
        'post' => '$refresh',
        'edit' => '$refresh',
    ];

    public function render()
    {
        $searching = '%' . $this->search . '%';
        if (!$this->search) {
            return view('livewire.managament.post-role', [
                'roles' => Role::where('name', '!=', 'SuperAdmin')->paginate($this->show),
                'superRoles' => Role::paginate($this->show),
            ]);
        } else {
            return view('livewire.managament.post-role', [
                'roles' => Role::where('name', '!=', 'SuperAdmin')->where('name', 'like', $searching)->paginate($this->show),
                'superRoles' => Role::where('name', 'like', $searching)->paginate($this->show),
            ]);
        }
    }
}

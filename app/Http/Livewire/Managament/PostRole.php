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
                'roles' => Role::orderBy('created_at', 'DESC')->where('name', '!=', 'SuperAdmin')->paginate($this->show),
                'superRoles' => Role::orderBy('created_at', 'DESC')->paginate($this->show),
            ]);
        } else {
            return view('livewire.managament.post-role', [
                'roles' => Role::orderBy('created_at', 'DESC')->where('name', '!=', 'SuperAdmin')->where('name', 'like', $searching)->paginate($this->show),
                'superRoles' => Role::orderBy('created_at', 'DESC')->where('name', 'like', $searching)->paginate($this->show),
            ]);
        }
    }
}

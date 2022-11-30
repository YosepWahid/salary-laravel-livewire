<?php

namespace App\Http\Livewire\Managament;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PostUser extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    // post property
    public $show = 5, $search;

    protected $listeners = [
        'post' => '$refresh',
        'edit' => '$refresh'
    ];

    public function getQueryString()
    {
        return [];
    }

    public function render()
    {
        if (!$this->search) {
            return view('livewire.managament.post-user', [
                'user' => User::orderBy('created_at', 'DESC')->whereHas('roles', function ($q) {
                    return $q->where('name', '!=', 'SuperAdmin');
                })->ordoesntHave('roles')->paginate($this->show),
                'superUser' => User::orderBy('created_at', 'DESC')->paginate($this->show),
            ]);
        } else {
            $searching = '%' . $this->search . '%';
            return view('livewire.managament.post-user', [
                'user' => User::orderBy('created_at', 'DESC')->whereHas('roles', function ($q) {
                    return $q->where('name', '!=', 'SuperAdmin');
                })->ordoesntHave('roles')->orwhere('name', 'LIKE', $searching)->paginate($this->show),
                'superUser' => User::orderBy('created_at', 'DESC')->where('name', 'like', $searching)->paginate($this->show),
            ]);
        }
    }
}

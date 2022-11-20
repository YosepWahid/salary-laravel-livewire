<?php

namespace App\Http\Livewire\Managament;

use App\Models\User;
use Livewire\Component;

class ActiveUser extends Component
{
    public $active, $post;

    public function mount($switch)
    {
        $id = $switch->id;
        $data = User::find($id);
        $this->post = $data;
        $this->active = $data->active;
    }

    public function change($id)
    {
        User::find($id)->update([
            'active' => $this->active
        ]);
    }
}

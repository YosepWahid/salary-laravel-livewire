<?php

namespace App\Http\Livewire\Salary;

use App\Models\Salary;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PostUserSalary extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $show = 5, $search;

    public function render()
    {
        $user_id = Auth::user()->id;
        return view('livewire.salary.post-user-salary', [
            'salaries' => Salary::where('user_id', $user_id)->paginate($this->show),
        ]);
    }
}

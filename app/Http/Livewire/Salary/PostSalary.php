<?php

namespace App\Http\Livewire\Salary;

use App\Models\Salary;
use Livewire\Component;
use Livewire\WithPagination;

class PostSalary extends Component
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
            return view('livewire.salary.post-salary', [
                'salaries' => Salary::orderBy('year', 'DESC')->paginate($this->show),
            ]);
        } else {
            return view('livewire.salary.post-salary', [
                'salaries' => Salary::whereHas('user', function ($q) use ($searching) {
                    return $q->orderBy('year', 'DESC')->where('name', 'like', $searching);
                })->paginate($this->show),
            ]);
        }
    }
}

<?php

namespace App\Http\Livewire\Salary;

use App\Models\Salary;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class CreateManualSalary extends Component
{
    public $user_id, $basic_salary, $position_salary, $overtime_salary, $piece, $total_salary = 0, $monthYear;

    // must number salary check
    protected $rules = [
        'user_id' => 'required',
        'basic_salary' => 'required',
        'position_salary' => 'required',
        'overtime_salary' => 'required',
        'piece' => 'required',
        'monthYear' => 'required',
    ];

    public function render()
    {
        if (is_numeric($this->basic_salary) || is_numeric($this->position_salary) || is_numeric($this->overtime_salary) || is_numeric($this->piece)) {
            $temp = (int)$this->basic_salary + (int)$this->position_salary + (int)$this->overtime_salary - (int)$this->piece;
            $this->total_salary = $temp;
        }
        return view('livewire.salary.create-manual-salary', [
            'users' => User::whereHas('roles', function ($q) {
                return $q->where('name', '!=', 'SuperAdmin');
            })->ordoesntHave('roles')->get(),
        ]);
    }

    public function create()
    {
        $this->validate();
        $temp = new Carbon($this->monthYear);
        $month = $temp->format('F');
        $year = $temp->format('Y');
        Salary::create([
            'user_id' => $this->user_id,
            'basic_salary' => $this->basic_salary,
            'position_salary' => $this->position_salary,
            'overtime_salary' => $this->overtime_salary,
            'piece' => $this->piece,
            'total_salary' => $this->total_salary,
            'month' => $month,
            'year' => $year,
            'created_at' => Carbon::now()
        ]);
        $this->emit('post');
        session()->flash('success', 'Create Salary Is Success');
        $this->reset();
    }
}

<?php

namespace App\Http\Livewire\Salary;

use App\Models\Salary;
use App\Models\User;
use Livewire\Component;

class EditUserSalary extends Component
{
    // salary
    public $user_id, $basic_salary, $position_salary, $overtime_salary, $piece, $total_salary = 0, $monthYear, $month, $year;

    // variable else
    public $post, $detail, $created_at, $relation;

    public function mount($id)
    {
        // object
        $data = Salary::find($id);

        $this->detail = $data->user->name . ', ' . $this->month . ' ' . $this->year;
        $this->post = $data;
        $this->created_at = $data->created_at->format('d-M-Y');
        $this->basic_salary = $data->basic_salary;
        $this->position_salary = $data->position_salary;
        $this->overtime_salary = $data->overtime_salary;
        $this->piece = $data->piece;
        $this->month = $data->month;
        $this->year = $data->year;
        $this->total_salary = $data->total_salary;
    }
}

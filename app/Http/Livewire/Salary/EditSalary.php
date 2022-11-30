<?php

namespace App\Http\Livewire\Salary;

use App\Models\Salary;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Component;


class EditSalary extends Component
{
    // salary
    public $user_id, $basic_salary, $position_salary, $overtime_salary, $piece, $total_salary = 0, $monthYear, $month, $year;

    // variable else
    public $post, $users, $detail, $created_at, $relation;

    // must number salary check
    protected $rules = [
        'user_id' => 'required',
        'basic_salary' => 'required',
        'position_salary' => 'required',
        'overtime_salary' => 'required',
        'piece' => 'required',
    ];

    public function mount($id)
    {
        // object
        $data = Salary::find($id);

        if ($data->user) {
            $this->detail = $data->user->name . ', ' . $this->month . ' ' . $this->year;
            $this->user_id = $data->user->id;
        } else {
            $this->detail = "<span class='text-danger'>User Delete</span>";
        }
        // variable
        $this->relation = $data->user;
        $this->post = $data;
        $this->created_at = $data->created_at->format('d-M-Y');
        $this->basic_salary = $data->basic_salary;
        $this->position_salary = $data->position_salary;
        $this->overtime_salary = $data->overtime_salary;
        $this->piece = $data->piece;
        $this->month = $data->month;
        $this->year = $data->year;
        $this->total_salary = $data->total_salary;

        // data users
        $this->users = User::whereHas('roles', function ($q) {
            return $q->where('name', '!=', 'SuperAdmin');
        })->ordoesntHave('roles')->get();
    }

    public function update($id)
    {
        $this->validate();
        $temp = new Carbon($this->monthYear);
        if ($temp != '') {
            $month = $temp->format('F');
            $year = $temp->format('Y');
            Salary::find($id)->update([
                'month' => $month,
                'year' => $year,
            ]);
        }

        $temp = (int)$this->basic_salary + (int)$this->position_salary + (int)$this->overtime_salary - (int)$this->piece;
        $this->total_salary = $temp;
        Salary::find($id)->update([
            'user_id' => (int)$this->user_id,
            'basic_salary' => (int)$this->basic_salary,
            'position_salary' => (int)$this->position_salary,
            'overtime_salary' => (int)$this->overtime_salary,
            'piece' => (int)$this->piece,
            'total_salary' => (int)$this->total_salary,
            'month' => $this->month,
            'year' => $this->year,
            'updated_at' => Carbon::now()
        ]);

        $this->emit('edit');
        session()->flash('success', 'Update Salary Is Success');
    }

    public function delete($id)
    {
        Salary::find($id)->delete();
        $this->emit('edit');
        session()->flash('delete', 'Delete Salary Is Success');
    }
}

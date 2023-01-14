<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Salary;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class MountModal extends Component
{

    public $count_user, $user_with_roles, $user_without_roles, $total_salary, $year;

    public function mount()
    {
        $year_now = Carbon::now()->format('Y');
        $this->year = $year_now;
        $this->count_user = User::all()->count();
        $this->user_with_roles = User::whereHas('roles')->count();
        $this->user_without_roles = User::doesntHave('roles')->count();
        $this->total_salary = Salary::where('year', 'like', '%' . $year_now . '%')->sum('total_salary');
    }
}

<?php

namespace App\Http\Livewire\Salary;

use App\Exports\ExportSalary;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class DownloadtemplateSalary extends Component
{

    public $user_id;

    protected $listeners = [
        'user_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.salary.downloadtemplate-salary', [
            'users' => User::whereHas('roles', function ($q) {
                return $q->where('name', '!=', 'SuperAdmin');
            })->ordoesntHave('roles')->get(),
        ]);
    }


    public function create()
    {
        return response()->download('template.rar');
        session()->flash('success', 'Download Template Is Success');
    }
}

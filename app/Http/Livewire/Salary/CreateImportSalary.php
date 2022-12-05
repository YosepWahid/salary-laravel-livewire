<?php

namespace App\Http\Livewire\Salary;

use App\Imports\ImportSalary;
use App\Models\Salary;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreateImportSalary extends Component
{
    use WithFileUploads;

    public $user_id, $file, $monthYear, $iteration;

    protected $rules = [
        'user_id' => 'required',
        'file' => 'required|mimes:csv,xlsx',
    ];

    public function render()
    {
        return view('livewire.salary.create-import-salary', [
            'users' => User::whereHas('roles', function ($q) {
                return $q->where('name', '!=', 'SuperAdmin');
            })->ordoesntHave('roles')->get(),
        ]);
    }

    public function create()
    {
        $this->validate();
        Excel::import(new ImportSalary($this->user_id), $this->file);
        $this->emit('post');
        session()->flash('success', 'Import Success');
    }
}

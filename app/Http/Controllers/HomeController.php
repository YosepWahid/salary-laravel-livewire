<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }

    public function user()
    {
        $this->authorize('View User');
        return view('management.user');
    }

    public function role()
    {
        $this->authorize('View Role');
        return view('management.role');
    }

    public function permission()
    {
        $this->authorize('View Permission');
        return view('management.permission');
    }

    public function allSalary()
    {
        $this->authorize('View All Salary');
        return view('salary.index');
    }

    public function userSalary()
    {
        $this->authorize('View User Salary');
        return view('salary.salary-user');
    }

    public function export($id)
    {
        $this->authorize('PDF All Salary');
        $data = Salary::find($id);
        $pdf = Pdf::loadView('salary.salary-pdf', ['data' => $data]);
        return $pdf->setpaper('A4', 'potrait')->stream('invoice.pdf');
    }

    public function exportUser($id)
    {
        $this->authorize('PDF User Salary');
        $data = Salary::find($id);
        $pdf = Pdf::loadView('salary.salary-pdf', ['data' => $data]);
        return $pdf->setpaper('A4', 'potrait')->stream('invoice.pdf');
    }
}

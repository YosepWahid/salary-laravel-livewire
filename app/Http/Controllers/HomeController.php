<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function salary()
    {
        return view('salary.index');
    }
}

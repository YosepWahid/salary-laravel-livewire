<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MountChartpieUser extends Component
{
    public  $userid, $data, $years, $year, $status = 0;

    public function __construct()
    {
        $this->year = Carbon::now()->format('Y');;
        $this->userid = Auth::user()->id;
    }

    // life cycle
    public function mount()
    {
        // data
        $this->data = $this->dataSalary($this->userid, $this->year);
        $this->emit('changeSalaries', $this->data);
    }

    // change data view
    public function changeData()
    {
        // function change status
        $this->status == 0 ? $this->status = 1 : $this->status = 0;
        // data change
        $data = $this->dataSalary($this->userid, $this->year, $this->status);
        $this->emit('changeSalaries', $data);
    }

    // change data to hight view
    public function changeDataToHight()
    {
        $this->status == 0 ? $this->status = 2 : $this->status = 0;
        $data = $this->dataSalary($this->userid, $this->year, $this->status);
        $this->emit('changeSalaries', $data);
    }

    // change data to low view
    public function changeDataToLow()
    {
        $this->status == 0 ? $this->status = 3 : $this->status = 0;
        $data = $this->dataSalary($this->userid, $this->year, $this->status);
        $this->emit('changeSalaries', $data);
    }

    // change data salary on year
    public function changeYearDataSalary()
    {
        // data change
        $data = $this->dataSalary($this->userid, $this->year, $this->status);
        $this->emit('changeSalaries', $data);
    }

    // data salary function
    private function dataSalary($userid, $year, $status = false)
    {
        // eloquent
        switch ($status) {
            case 1:
                $temp = Salary::groupBy('month', 'total_salary')->where(function ($q) use ($userid, $year) {
                    return $q->where('user_id', $userid)->where('year', 'like', $year);
                })->get(['month', 'total_salary']);
                break;
            case 2:
                $temp = Salary::orderby('total_salary', 'DESC')->groupBy('month', 'total_salary')->where(function ($q) use ($userid, $year) {
                    return $q->where('user_id', $userid)->where('year', 'like', $year);
                })->limit(6)->get(['month', 'total_salary']);
                break;
            case 3:
                $temp = Salary::orderby('total_salary', 'ASC')->groupBy('month', 'total_salary')->where(function ($q) use ($userid, $year) {
                    return $q->where('user_id', $userid)->where('year', 'like', $year);
                })->limit(6)->get(['month', 'total_salary']);
                break;
            default:
                $temp = Salary::groupBy('month', 'total_salary')->where(function ($q) use ($userid, $year) {
                    return $q->where('user_id', $userid)->where('year', 'like', $year);
                })->limit(6)->get(['month', 'total_salary']);
                break;
        }

        // cheking if data is not null or null
        if (count($temp) != 0) {
            // data
            foreach ($temp as $tp) {
                $data['month'][] = $tp->month;
                $data['total'][] = $tp->total_salary;
            }
            // years
            $this->years = Salary::distinct()->where('user_id', $userid)->get('year');
            // json
            $data = json_encode($data);

            // return
            return $data;
        } else {
            // fake data
            $data = [
                'month' => ['fake month', 'fake month', 'fake month', 'fake month', 'fake month', 'fake month'],
                'total' => [1, 1, 1, 1, 1, 1],
            ];
            // fake year
            $year = [
                (object)['year' => 0],
            ];

            // data
            $this->years = $year;

            // json
            $data = json_encode($data);

            // return
            return $data;
        }
    }
}

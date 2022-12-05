<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MountChartpieSuper extends Component
{
    public $data, $years, $year, $status = 0;

    public function __construct()
    {
        $this->year = Carbon::now()->format('Y');;
    }
    // life cycle
    public function mount()
    {
        // data
        $this->data = $this->dataSalary($this->year);
        $this->emit('changeSalariesSuper', $this->data);
    }

    // change data view
    public function changeData()
    {
        // function change status
        $this->status == 0 ? $this->status = 1 : $this->status = 0;
        // data change
        $data = $this->dataSalary($this->year, $this->status);
        $this->emit('changeSalariesSuper', $data);
    }

    // change data to hight view
    public function changeDataToHight()
    {
        $this->status == 0 ? $this->status = 2 : $this->status = 0;
        $data = $this->dataSalary($this->year, $this->status);
        $this->emit('changeSalariesSuper', $data);
    }

    // change data to low view
    public function changeDataToLow()
    {
        $this->status == 0 ? $this->status = 3 : $this->status = 0;
        $data = $this->dataSalary($this->year, $this->status);
        $this->emit('changeSalariesSuper', $data);
    }

    // change data salary on year
    public function changeYearDataSalary()
    {
        // data change
        $data = $this->dataSalary($this->year, $this->status);
        $this->emit('changeSalariesSuper', $data);
    }

    // data salary function
    private function dataSalary($year, $status = false)
    {
        // eloquent
        switch ($status) {
            case 1:
                $temp = DB::select("SELECT distinct month, SUM(total_salary) as total_salary from salaries WHERE year LIKE '%$year%' GROUP BY month");
                break;
            case 2:
                $temp = DB::select("SELECT distinct month, SUM(total_salary) as total_salary from salaries WHERE year LIKE '%$year%' group by month order by sum(total_salary) DESC limit 6");
                break;
            case 3:
                $temp = DB::select("SELECT distinct month, SUM(total_salary) as total_salary from salaries WHERE year LIKE '%$year%' group by month order by sum(total_salary) ASC limit 6");
                break;
            default:
                $temp = DB::select("SELECT distinct month, SUM(total_salary) as total_salary from salaries WHERE year LIKE '%$year%' GROUP BY month limit 6");
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
            $this->years = Salary::distinct()->get('year');
            // json
            $data = json_encode($data);

            // return
            return $data;
        } else {
            // fake data
            $data = [
                'month' => ['fake month', 'fake month', 'fake month', 'fake month', 'fake month', 'fake month'],
                'year' => [0000],
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

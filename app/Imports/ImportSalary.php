<?php

namespace App\Imports;

use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ImportSalary implements ToCollection, WithStartRow
{
    /**
     * @param Collection $collection
     */

    protected $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $basic = $row[1];
            $position = $row[2];
            $overtime = $row[3];
            $piece = $row[4];
            $total = $row[1] + $row[2] + $row[3] - $row[4];
            $monthYear = Date::excelToDateTimeObject($row[5]);
            $month = $monthYear->format('F');
            $year = $monthYear->format('Y');

            Salary::create([
                'user_id' => $this->user_id,
                'basic_salary' => $basic,
                'position_salary' => $position,
                'overtime_salary' => $overtime,
                'piece' => $piece,
                'total_salary' => $total,
                'month' => $month,
                'year' => $year,
                'created_at' => Carbon::now(),
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}

<?php

namespace App\Imports;

use App\OverTime;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\EmployeeGeneralData;

class OverTimesImport implements ToCollection
{
    public $month;

    public function __construct($month)
    {
        $this->month = $month;
    }
    // public function model(array $row)
    // {
    //     return new OverTime([
    //         //
    //     ]);
    // }

    public function collection(Collection $rows)
    {

        foreach ($rows as $index => $row) {

            if ($index > 0 && $row[0] !== '') {

                $employee = EmployeeGeneralData::where('code', $row[0])->first();

                OverTime::create([
                    'employee_id' => $employee->id,
                    'code' => $row[0],
                    'month' => $this->month,
                    'over_time_amount' => $row[6]
                ]);
            }
        }
    }
}

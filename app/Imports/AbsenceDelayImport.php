<?php

namespace App\Imports;

use App\AbsenceDelayPenalty;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\EmployeeGeneralData;

class AbsenceDelayImport implements ToCollection
{
    public $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function collection(Collection $rows)
    {

        foreach ($rows as $index => $row) {

            if ($index > 0 && $row[0] !== '') {

                $employee = EmployeeGeneralData::where('code', $row[0])->first();

                AbsenceDelayPenalty::create([
                    'employee_id' => $employee->id,
                    'code' => $row[0],
                    'month' => $this->month,
                    'delay_subtract' => $row[6],
                    'absence_subtract' => $row[7],
                ]);
            }
        }
    }
}

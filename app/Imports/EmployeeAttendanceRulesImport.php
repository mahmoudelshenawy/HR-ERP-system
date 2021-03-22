<?php

namespace App\Imports;

use App\EmployeeAttendanceRule;
use Illuminate\Console\OutputStyle;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Validators\Failure;

class EmployeeAttendanceRulesImport implements OnEachRow,WithStartRow

{


    public function startRow(): int
    {
        return 2;
    }

    public function onRow(Row $row)
    {
        ini_set('max_execution_time', 300);
        $row = $row->toArray();

            if (!isset($row[0])){
                return null;
            }

        foreach (DB::table('employee_attendance_rules')->get() as $rule){
            if ( $rule->day ==  date('d/m/Y',mktime(0,0,0,date('m'),1,date('y'))) && $rule->employee_id == $row[0])
            {
                return  false;
            }
        }

        if (isset($row[0])) {

            if (is_array($row) ){
                $num = intval(date('t'));
                for ($i = 1 ; $i <= $num ;$i++){
                    if ($row[$i] != null){
                        $check_in = date('H:i',mktime(intval($row[$i]),0,0,date('m'),$i,date('y')));
                        $check_out = date('H:i',mktime(intval($row[32]),0,0,date('m'),$i,date('y')));
                        $day_statue= 'in_work';
                    }
                    else{
                        $check_in = null;
                        $check_out = null;
                        $day_statue= 'holiday';
                    }
                    if (isset($row[0]) && !empty($row[0]) && is_numeric($row[0]) && $row[0] !=''){
                        $data = [
                            'employee_id' => DB::table('employee_general_data')->where('code',(int)$row[0])->value('id'),
                            'day' => date('d/m/Y',mktime(0,0,0,date('m'),intval($i),date('y'))),
                            'check_in'  => $check_in,
                            'check_out' => $check_out,
                            'day_statue'=> $day_statue,
                            'created_at'=>now()
                        ];
                        DB::table('employee_attendance_rules')->insert($data);
                    }
                }

            }
        }

    }




}

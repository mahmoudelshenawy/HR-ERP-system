<?php

namespace App\Http\Controllers\Report;

use App\DataTables\ReportEmployeeFinanacialDataDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeReport extends Controller
{
    //
    public function employee_financial(ReportEmployeeFinanacialDataDataTable $dataTable){

        return $dataTable->render('reports.employee_reports.employee_financial_data');

    }
}

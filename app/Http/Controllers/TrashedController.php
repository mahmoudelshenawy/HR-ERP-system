<?php

namespace App\Http\Controllers;

use App\DataTables\CanceledResignationsDataTable;
use App\Resignation;
use Illuminate\Http\Request;

class TrashedController extends Controller
{
    public function canceled_resignations(CanceledResignationsDataTable $dataTable){
        $canceled_resignations = Resignation::onlyTrashed()->get();
        return $dataTable->render('employees.resignations.canceled_resignations');

    }
}

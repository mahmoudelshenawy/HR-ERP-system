<?php

namespace App\DataTables;

use App\EmployeeAllowance;
use App\EmployeeDeduction;
use App\EmployeeGeneralData;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TestDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            // ->addColumn('branch', function ($query) {
            //     // return value(DB::table('business_branches')->where('id', $query->branch_id)->value('name'));
            //     // return $query->branch->name;
            // })
            // ->editColumn('job_id', function ($query) {
            //     return value(DB::table('business_jobs')->where('id', $query->job_id)->value('name'));
            // })
            ->editColumn('administration', function ($query) {
                $department = DB::table('business_jobs')->where('id', $query->job_id)->value('business_department_id');
                $administration = DB::table('business_departments')->where('id', $department)->value('business_administration_id');
                return value(DB::table('business_administrations')->where('id', $administration)->value('name'));
            })
            ->editColumn('department', function ($query) {
                $department = DB::table('business_jobs')->where('id', $query->job_id)->value('business_department_id');
                return value(DB::table('business_departments')->where('id', $department)->value('name'));
            })
            ->editColumn('country_id', function ($query) {
                return value(DB::table('countries')->where('id', $query->country_id)->value('name'));
            })
            ->editColumn('guarantor_id', function ($query) {
                return value(DB::table('guarantors')->where('id', $query->guarantor_id)->value('name'));
            })
            ->addColumn('other_allowance', function ($query) {
                $employee_allowance = EmployeeAllowance::where('employee_id', '=', $query->id)->get();
                $employee_allowance_count = 0;
                if (count($employee_allowance) > 0) {
                    foreach ($employee_allowance as $allowance) {
                        $employee_allowance_count += $allowance->allowance_amount;
                    }
                }
                return value($employee_allowance_count);
            })->addColumn('other_deduct', function ($query) {
                $employee_deduction = EmployeeDeduction::where('employee_id', '=', $query->id)->get();
                $employee_deduction_count = 0;
                if (count($employee_deduction) > 0) {
                    foreach ($employee_deduction as $deduct) {
                        $employee_deduction_count += $deduct->deduction_amount;
                    }
                }
                return value($employee_deduction_count);
            })
            ->editColumn('bank_id', function ($query) {
                return value(DB::table('bank_data')->where('id', $query->bank_id)->value('name'));
            })
            ->editColumn('employee_account_number', 'reports.employee_reports.employee_financial_data_bank_number_column');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ReportEmployeeFinanacialDatum $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmployeeGeneralData $model)
    {
        // $branch = $this->request()->get('branch');
        // $job = $this->request()->get('job');
        // $code = $this->request()->get('code');
        // $name = $this->request()->get('name');
        // $query =  $model->where('statue', 'active');
        $query = EmployeeGeneralData::with(['branch', 'job']);
        $query = $query->where('statue', 'active');
        // if (!empty($branch)) {
        //     $query = $query->where('branch_id', $branch);
        // }
        // if (!empty($job)) {
        //     $query = $query->where('job_id', $job);
        // }
        // if (!empty($code)) {
        //     $query = $query->where('code', 'like', '%' . $code . '%');
        // }
        // if (!empty($name)) {
        //     $query = $query->where('employee_name', 'like', '%' . $name . '%');
        // }
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('reportemployeefinanacialdata-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->parameters(
                [
                    'dom ' => '<"row"<"float-left"B><"float-right"f>><"row"<"float-left"i><"float-right"p>>rtlp',
                    'lengthMenu' => [
                        [10, 25, 50, 100, -1],
                        [
                            trans('datatable.10rows'), trans('datatable.25rows'),
                            trans('datatable.50rows'), trans('datatable.100rows'),
                            trans('datatable.show_all'),
                        ]
                    ],
                    "bPaginate" => true,
                    "lengthChange" => true,
                    "iDisplayLength" => 25,
                    'responsive' => true,
                    'order'   => [[0, 'asc']],
                    'buttons' => [
                        ['extend' => 'reload', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-refresh"> ' . trans('datatable.reload') . '</i>'],
                        ['extend' => 'excelHtml5', 'autoFilter' => true, 'className' => 'btn  btn-success', 'text' => '<i class="fa fa-file-pdf-o"> ' . trans('datatable.export') . '</i>'],
                    ],
                    "autoWidth" => false,
                    'language' => [
                        "sProcessing" => trans('datatable.sProcessing'),
                        "sLengthMenu" => "_MENU_",
                        "sZeroRecords" => trans('datatable.sZeroRecords'),
                        "sEmptyTable" => trans('datatable.sEmptyTable'),
                        "sInfo" => trans('datatable.sInfo'),
                        "sInfoEmpty" => trans('datatable.sInfoEmpty'),
                        "sInfoFiltered" => trans('datatable.sInfoFiltered'),
                        "sInfoPostFix" => "",
                        "sSearch" => '',
                        "sUrl" => "",
                        "sInfoThousands" => ",",
                        "sLoadingRecords" => trans('datatable.sLoadingRecords'),
                        "paginate" => [
                            "first" => trans('datatable.first'),
                            "last"  => trans('datatable.last'),
                            "next"  => trans('datatable.next'),
                            "previous"  => trans('datatable.previous'),
                        ]
                    ]
                ]
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'code',
                'data' => "code",
                'title' => trans('employee.code'),
                'width' => '10px'
            ],
            // [
            //     'name' => 'national_id_number',
            //     'data' => "national_id_number",
            //     'title' => trans('employee.national_id'),
            // ],
            [
                'name' => 'employee_name',
                'data' => "employee_name",
                'title' => trans('employee.name'),
            ],
            // [
            //     'name' => 'employee_name_en',
            //     'data' => "employee_name_en",
            //     'title' => trans('employee.name_en'),
            // ],
            // [
            //     'name' => 'employee_short_name',
            //     'data' => "employee_short_name",
            //     'title' => trans('employee.short_name'),
            // ],
            [
                'name' => 'branch',
                'data' => 'branch.name',
                'title' => trans('employee.branch'),
                // 'visible' => false
            ],
            [
                'name' => 'administration',
                'data' => 'administration',
                'title' => trans('business-setup.administration'),
                'sortable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'department',
                'data' => 'department',
                'title' => trans('business-setup.Department'),
                'sortable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'job',
                'data' => "job.name",
                'title' => trans('employee.job'),

            ],
            [
                'name' => 'country_id',
                'data' => "country_id",
                'title' => trans('employee.country'),
            ],
            [
                'name' => 'guarantor_id',
                'data' => "guarantor_id",
                'title' => trans('employee.guarantor'),
            ],
            // [
            //     'name' => 'basic_salary',
            //     'data' => "basic_salary",
            //     'title' => trans('employee.basic_salary'),

            // ],
            // [
            //     'name' => 'variable_pay',
            //     'data' => "variable_pay",
            //     'title' => trans('employee.variable_pay'),
            // ],
            // [
            //     'name' => 'housing_allowance',
            //     'data' => "housing_allowance",
            //     'title' => trans('employee.housing_allowance'),
            // ],
            // [
            //     'name' => 'clothing_allowance',
            //     'data' => "clothing_allowance",
            //     'title' => trans('employee.clothing_allowance'),
            // ],
            // [
            //     'name' => 'food_allowance',
            //     'data' => "food_allowance",
            //     'title' => trans('employee.food_allowance'),
            // ],
            // [
            //     'name' => 'mobile_allowance',
            //     'data' => "mobile_allowance",
            //     'title' => trans('employee.mobile_allowance'),
            // ],
            // [
            //     'name' => 'gas_allowance',
            //     'data' => "gas_allowance",
            //     'title' => trans('employee.gas_allowance'),
            // ],
            // [
            //     'name' => 'car_allowance',
            //     'data' => "car_allowance",
            //     'title' => trans('employee.car_allowance'),
            // ],
            // [
            //     'name' => 'other_allowance',
            //     'data' => "other_allowance",
            //     'title' => trans('employee.other_allowance'),
            // ],
            // [
            //     'name' => 'insurance_deduct',
            //     'data' => "insurance_deduct",
            //     'title' => trans('employee.insurance_deduct'),
            // ],
            // [
            //     'name' => 'other_deduct',
            //     'data' => "other_deduct",
            //     'title' => trans('employee.other_deduct'),
            // ],
            // [
            //     'name' => 'bank_id',
            //     'data' => "bank_id",
            //     'title' => trans('employee.bank_name'),

            // ],
            // [
            //     'name' => 'employee_account_number',
            //     'data' => "employee_account_number",
            //     'title' => trans('employee.bank_account_number'),
            // ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ReportEmployeeFinanacialData_' . date('YmdHis');
    }
}

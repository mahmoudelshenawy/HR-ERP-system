<?php

namespace App\DataTables;

use App\EmployeeGeneralData;
use App\NetSalary;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NetSalaryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('employee', 'salary.net_salary.datatable-columns.employee')
            ->addColumn('housing_allowance',function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('housing_allowance');
            })->addColumn('clothing_allowance',function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('clothing_allowance');
            })->addColumn('food_allowance',function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('food_allowance');
            })->addColumn('mobile_allowance',function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('mobile_allowance');
            })->addColumn('gas_allowance',function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('gas_allowance');
            })
            ->addColumn('car_allowance',function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('car_allowance');
            }) ->addColumn('insurance_deduct',function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('insurance_deduct');
            })
            ->editColumn('month', function ($query) {
                $dateObj   = \DateTime::createFromFormat('!m', $query->month);
                $monthName = $dateObj->format('F');
                return  trans('general.' . $monthName);
            })
            ->rawColumns([
                'employee'
            ]);
    }


    public function query(NetSalary $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('net-salarydatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->parameters([
                'dom ' => '<"row"<"float-left"B><"float-right"f>><"row"<"float-left"i><"float-right"p>>rtlp',
                'lengthMenu' => [
                    [10, 25, 50, 100, -1],
                    [
                        trans('datatable.10rows'), trans('datatable.25rows'),
                        trans('datatable.50rows'), trans('datatable.100rows'), trans('datatable.show_all'),
                    ]
                ],
                "bPaginate" => true,
                "lengthChange" => true,
                "iDisplayLength" => 25,
                'responsive'=> true,
        'columnDefs'=> [
            [ 'responsivePriority'=> 1, 'targets'=> 0 ],
            [ 'responsivePriority' => 2, 'targets' => -1 ]
        ],
                'order'   => [[0, 'asc']],
                'buttons' => [
                    ['extend' => 'reload', 'className' => 'btn btn-secondary', 'text' => '<i class="fa fa-refresh"> ' . trans('datatable.reload') . '</i>'],
                    ['extend' => 'export', 'className' => 'btn btn-secondary', 'text' => '<i class="fa fa-file-pdf-o"> ' . trans('datatable.export') . '</i>'], ['extend' => 'colvis', 'className' => 'btn btn-secondary', 'text' => trans('datatable.colvis')],
                ],
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
            ]);
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
                'name' => 'id',
                'data' => 'id',
                'title' => trans('employee.code'),

            ],
            [
                'name' => 'employee',
                'data' => 'employee',
                'title' => trans('employee.employee'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                'sortable' => false,

            ],
            [
                'name' => 'month',
                'data' => 'month',
                'title' => trans('salary.month'),

            ],
            [
                'name' => 'basic_salary',
                'data' => 'basic_salary',
                'title' => trans('salary.basic_salary'),
            ],
            [
                'name' => 'variable_salary',
                'data' => 'variable_salary',
                'title' => trans('salary.variable_salary'),
            ],
            [ 'name'=>'housing_allowance',
                'data'=>"housing_allowance",
                'title'=>trans('employee.housing_allowance'),
            ],
            [ 'name'=>'clothing_allowance',
                'data'=>"clothing_allowance",
                'title'=>trans('employee.clothing_allowance'),
            ],
            [ 'name'=>'food_allowance',
                'data'=>"food_allowance",
                'title'=>trans('employee.food_allowance'),
            ],
            [ 'name'=>'mobile_allowance',
                'data'=>"mobile_allowance",
                'title'=>trans('employee.mobile_allowance'),
            ],
            [ 'name'=>'gas_allowance',
                'data'=>"gas_allowance",
                'title'=>trans('employee.gas_allowance'),
            ],
            [ 'name'=>'car_allowance',
                'data'=>"car_allowance",
                'title'=>trans('employee.car_allowance'),
            ],

            [
                'name' => 'employee_allowance',
                'data' => 'employee_allowance',
                'title' => trans('salary.employee_allowance'),
            ],
            [ 'name'=>'insurance_deduct',
                'data'=>"insurance_deduct",
                'title'=>trans('employee.insurance_deduct'),
            ],
            [
                'name' => 'employee_deduction',
                'data' => 'employee_deduction',
                'title' => trans('salary.employee_deduction'),
            ],
            [
                'name' => 'overtime',
                'data' => 'overtime',
                'title' => trans('salary.overtime'),
            ],
            [
                'name' => 'allowance',
                'data' => 'allowance',
                'title' => trans('salary.allowance'),
            ],
            [
                'name' => 'advance',
                'data' => 'advance',
                'title' => trans('salary.advance'),
            ],
            [
                'name' => 'commission',
                'data' => 'commission',
                'title' => trans('salary.commission'),
            ],
            [
                'name' => 'delay_penalty',
                'data' => 'delay_penalty',
                'title' => trans('salary.delay_penalty'),
            ],
            [
                'name' => 'absence_penalty',
                'data' => 'absence_penalty',
                'title' => trans('salary.absence_penalty'),
            ],
            [
                'name' => 'net_salary',
                'data' => 'net_salary',
                'title' => trans('salary.net_salary'),
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'OverTimes_' . date('YmdHis');
    }
}

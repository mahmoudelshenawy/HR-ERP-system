<?php

namespace App\DataTables;

use App\EmployeeShift;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeShiftsDataTable extends DataTable
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
            ->addColumn('action','time_management.employees_shifts.datatable_columns.action')
            ->addColumn('employee','time_management.employees_shifts.datatable_columns.employee')
            ->addColumn('shift',function ($query){
                return value(DB::table('shifts')->where('id',$query->shift_id)->value('name'));
            })
            ->rawColumns([
                'employee',
                'action',
                'shift'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\EmployeeShift $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmployeeShift $model)
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
                    ->setTableId('employeeshifts-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->parameters([
                'dom '=> '<"row"<"float-left"B><"float-right"f>><"row"<"float-left"i><"float-right"p>>rtlp',
                'lengthMenu' => [
                    [ 10, 25, 50,100, -1 ],
                    [ trans('datatable.10rows'), trans('datatable.25rows'),
                        trans('datatable.50rows'),trans('datatable.100rows'), trans('datatable.show_all'), ]
                ],
                "bPaginate" => true,
                "lengthChange" => true,
                "iDisplayLength" => 25,

                'order'   => [[0, 'asc']],
                'buttons' => [
                    ['extend'=>'reload','className'=>'btn  btn-secondary' ,'text'=>trans('datatable.reload')],
                    ['extend'=>'export','className'=>'btn  btn-secondary' ,'text'=>trans('datatable.export')],
                    ['extend'=>'colvis','className'=>'btn  btn-secondary' ,'text'=>trans('datatable.colvis')],
                ],
                'language'=>[
                    "sProcessing"=> trans('datatable.sProcessing'),
                    "sLengthMenu"=> "_MENU_",
                    "sZeroRecords"=> trans('datatable.sZeroRecords'),
                    "sEmptyTable"=> trans('datatable.sEmptyTable'),
                    "sInfo"=> trans('datatable.sInfo'),
                    "sInfoEmpty"=> trans('datatable.sInfoEmpty'),
                    "sInfoFiltered"=>trans('datatable.sInfoFiltered'),
                    "sInfoPostFix"=> "",
                    "sSearch"=>'',
                    "sUrl"=> "",
                    "sInfoThousands"=> ",",
                    "sLoadingRecords"=> trans('datatable.sLoadingRecords'),
                    "paginate"=>[
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
            [ 'name'=>'id',
                'data'=>'id',
                'title'=>trans('employee.code'),
                'width'=>'5px',
            ],
            [ 'name'=>'employee',
                'data'=>'employee',
                'title'=>trans('employee.name'),
            ],
            [ 'name'=>'shift',
                'data'=>'shift',
                'title'=>trans('time_management.shift_name'),
            ],
            [ 'name'=>'action',
                'data'=>'action',
                'title'=>trans('general.action'),
                'exportable'=>false
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
        return 'EmployeeShifts_' . date('YmdHis');
    }
}

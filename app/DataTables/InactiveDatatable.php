<?php

namespace App\DataTables;

use App\InactiveEmployee;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InactiveDatatable extends DataTable
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
            ->addColumn('action', 'employees.inactive_employee.datatable_columns.action')
            ->addColumn('employee', 'employees.inactive_employee.datatable_columns.employee')
            ->editColumn('employee_id', function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('employee_name');
            })
            ->editColumn('created_by', function ($query){
                return  DB::table('users')->where('id',$query->created_by)->value('name');
            })
            ->rawColumns([
                'action',
                'employee',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\InactiveDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(InactiveEmployee $model)
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
                    ->setTableId('inactivedatatable-table')
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
                    ['extend'=>'reload','className'=>'btn btn-lg btn-success' ,'text'=>'<i class="fa fa-refresh"> '.trans('datatable.reload').'</i>'],
                    ['extend'=>'export','className'=>'btn btn-lg btn-success' ,'text'=> '<i class="fa fa-file-pdf-o"> '.trans('datatable.export').'</i>'],['extend'=>'colvis','className'=>'btn btn-success' ,'text'=>trans('datatable.colvis')],
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
                'title'=>'',
            ],
            [ 'name'=>'employee',
                'data'=>'employee',
                'title'=>trans('employee.employee'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
            ],
            [ 'name'=>'employee_id',
                'data'=>'employee_id',
                'title'=>trans('employee.employee'),
                'visible'=>false
            ],
            [ 'name'=>'date',
                'data'=>'date',
                'title'=>trans('employee.inactive_date'),
            ],
            [ 'name'=>'reason',
                'data'=>'reason',
                'title'=>trans('employee.inactive_reason'),
            ],
            [ 'name'=>'created_by',
                'data'=>'created_by',
                'title'=>trans('employee.inactive_approved_by'),
            ],
            [ 'name'=>'action',
                'data'=>'action',
                'title'=>trans('employee.cancel_inactive'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
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
        return 'Inactive_' . date('YmdHis');
    }
}

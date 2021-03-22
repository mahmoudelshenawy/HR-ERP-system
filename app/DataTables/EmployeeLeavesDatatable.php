<?php

namespace App\DataTables;

use App\EmployeeLeaves;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeLeavesDatatable extends DataTable
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
            ->addColumn('action', 'time_management.leaves.datatable_columns.action')
            ->editColumn('employee_id', function ($query) {
                return DB::table('employee_general_data')->where('id', $query->employee_id)->value('employee_name');
            })
            ->addColumn('leave_type_id', function ($query) {
                return DB::table('leave_types')->where('id', $query->leave_type_id)->value('name');
            })->rawColumns([
                'action',
                'leave_type_id'
            ]);
    }



    public function query(EmployeeLeaves $model)
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
            ->setTableId('employeeleavesdatatable-table')
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

                'order'   => [[0, 'asc']],
                'buttons' => [
                    ['extend' => 'reload', 'className' => 'btn btn-secondary', 'text' => '<i class="fa fa-refresh"> ' . trans('datatable.reload') . '</i>'],
                    ['extend' => 'export', 'className' => 'btn btn-secondary', 'text' => '<i class="fa fa-file-pdf-o"> ' . trans('datatable.export') . '</i>'], ['extend' => 'colvis', 'className' => 'btn btn-secondary', 'text' => trans('datatable.colvis')],
                ],
                'initComplete' => ' function () {
                            this.api().columns([0,1,2,3]).every(function () {
                                var column = this;
                                var input = document.createElement("input");
                                $(input).appendTo($(column.footer()).empty())
                                .on(\'keyup\', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }',
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
                'name' => 'employee_id',
                'data' => 'employee_id',
                'title' => trans('employee.employee_name'),

            ],
            [
                'name' => 'leave_type_id',
                'data' => 'leave_type_id',
                'title' => trans('time_management.leave_type'),

            ],
            [
                'name' => 'start_day',
                'data' => 'start_day',
                'title' => trans('time_management.start_day'),
            ],
            [
                'name' => 'end_day',
                'data' => 'end_day',
                'title' => trans('time_management.end_day'),
            ],
            // [
            //     'name' => 'cause',
            //     'data' => 'cause',
            //     'title' => trans('time_management.cause'),
            // ],
            [
                'name' => 'status',
                'data' => 'status',
                'title' => trans('employee.statue'),
            ],
            [
                'name' => 'action ',
                'data' => 'action',
                'title' => trans('general.action'),
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
        return 'EmployeeLeaves_' . date('YmdHis');
    }
}

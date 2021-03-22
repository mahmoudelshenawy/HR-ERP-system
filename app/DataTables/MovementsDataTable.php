<?php

namespace App\DataTables;

use App\EmployeeMovement;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MovementsDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('employee', 'employees.movement.datatable_columns.employee')
            ->addColumn('action', 'employees.movement.datatable_columns.action')
            ->addColumn('new_branch', 'employees.movement.datatable_columns.new_branch')
            ->addColumn('new_job', 'employees.movement.datatable_columns.new_job')

            ->rawColumns([
                'action',
                'employee',
                'new_branch',
                'new_job'
            ]);
    }


    public function query(EmployeeMovement $model)
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
            ->setTableId('EmployeeMovementdatatable-table')
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
                            this.api().columns([1,2,3]).every(function () {
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
                'name' => 'employee',
                'data' => 'employee',
                'title' => trans('employee.employee'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                'sortable' => false,

            ],
            [
                'name' => 'new_branch',
                'data' => 'new_branch',
                'title' => trans('employee.new_branch'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                'sortable' => false,

            ],
            [
                'name' => 'new_job',
                'data' => 'new_job',
                'title' => trans('employee.new_job'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                'sortable' => false,

            ],
            [
                'name' => 'movement_date',
                'data' => 'movement_date',
                'title' => trans('employee.movement_date'),

            ],
            [
                'name' => 'action',
                'data' => 'action',
                'title' => trans('general.action'),
                'orderable' => false,
                'sortable' => false,
                'printable' => false,
                'exportable' => false
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
        return 'Movements_' . date('YmdHis');
    }
}

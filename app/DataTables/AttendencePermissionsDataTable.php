<?php

namespace App\DataTables;

use App\AttendencePermission;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AttendencePermissionsDataTable extends DataTable
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
            ->addColumn('action', 'time_management.attendence_permissions.datatable_columns.action')
            ->addColumn('employee_name', 'time_management.attendence_permissions.datatable_columns.employee_name')
            ->rawColumns([
                'action',
                'employee_name'
            ]);
    }


    public function query(AttendencePermission $model)
    {
        // return $model->newQuery();
        return $model->with('employee');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('attendencePermissions-table')
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
                'title' => 'ID',
                'visible' => false
            ],
            [
                'name' => 'employee_name',
                'data' => 'employee_name',
                'title' => trans('business-setup.employee_name'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
            ],
            [
                'name' => 'type',
                'data' => 'type',
                'title' => trans('time_management.type'),
            ],
            [
                'name' => 'day',
                'data' => 'day',
                'title' => trans('time_management.day'),
            ],
            [
                'name' => 'from',
                'data' => 'from',
                'title' => trans('time_management.from'),
            ],
            [
                'name' => 'to',
                'data' => 'to',
                'title' => trans('time_management.to'),
            ],
            [
                'name' => 'action',
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
        return 'AttendencePermissions_' . date('YmdHis');
    }
}

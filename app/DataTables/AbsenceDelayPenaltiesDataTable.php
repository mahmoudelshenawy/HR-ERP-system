<?php

namespace App\DataTables;

use App\AbsenceDelayPenalty;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AbsenceDelayPenaltiesDataTable extends DataTable
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
            ->addColumn('employee', 'salary.absence_delay.datatable-columns.employee')
            ->addColumn('action', 'salary.absence_delay.datatable-columns.action')
            ->editColumn('month', function ($query) {
                $dateObj   = \DateTime::createFromFormat('!m', $query->month);
                $monthName = $dateObj->format('F');
                return  trans('general.' . $monthName);
            })
            ->rawColumns([
                'branch',
                'action',
                'administration',
                'employee'
            ]);
    }


    public function query(AbsenceDelayPenalty $model)
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
            ->setTableId('absence_delay-table')
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
                'name' => 'absence_subtract',
                'data' => 'absence_subtract',
                'title' => trans('salary.absence_subtract'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                'sortable' => false,

            ],
            [
                'name' => 'delay_subtract',
                'data' => 'delay_subtract',
                'title' => trans('salary.delay_subtract'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                'sortable' => false,

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
        return 'absenceDelay_' . date('YmdHis');
    }
}

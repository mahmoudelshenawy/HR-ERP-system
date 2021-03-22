<?php

namespace App\DataTables;

use App\Shift;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShiftsDatatable extends DataTable
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
            ->addColumn('action','time_management.shifts.datatable_columns.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ShiftsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Shift $model)
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
                    ->setTableId('shiftsdatatable-table')
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
            [ 'name'=>'name',
                'data'=>'name',
                'title'=>trans('employee.name'),
            ],
            [ 'name'=>'check_in',
                'data'=>'check_in',
                'title'=>trans('employee.check_in'),
            ],
            [ 'name'=>'check_out',
                'data'=>'check_out',
                'title'=>trans('employee.check_out'),
            ],
            [ 'name'=>'holiday',
                'data'=>'holiday',
                'title'=>trans('time_management.week_holiday'),
            ],
            [ 'name'=>'action',
                'data'=>'action',
                'title'=>trans('general.action'),
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
        return 'Shifts_' . date('YmdHis');
    }
}

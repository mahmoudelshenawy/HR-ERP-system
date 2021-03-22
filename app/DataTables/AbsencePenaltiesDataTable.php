<?php

namespace App\DataTables;

use App\AbsencePenalty;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AbsencePenaltiesDataTable extends DataTable
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
            ->addColumn('action', 'time_management.absence_penalties.datatable_columns.action')
            ->addColumn('branch', 'time_management.absence_penalties.datatable_columns.branch')
            ->editColumn('branch_id',function ($query){
                return DB::table('business_branches')->where('id',$query->branch_id)->value('name');
            })
            ->editColumn('max_penalty',function ($query){
                if ($query->max_penalty == 0){
                    return trans('time_management.inactive_employee');
                }elseif ($query->max_penalty != 0){
                    return trans('time_management.value_max_delay_penalty') .' : '. $query->max_penalty;
                }
            })
            ->rawColumns([
                'action',
                'branch',
            ]);    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AbsencePenalty $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AbsencePenalty $model)
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
            ->setTableId('absencepenalties-table')
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
                'title'=>trans('employee.code'),
                'visible'=>false
            ],
            [   'name'=>'branch',
                'data'=>'branch',
                'title'=>trans('employee.branch'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
            ],
            [ 'name'=>'branch_id',
                'data'=>'branch_id',
                'title'=>trans('employee.branch'),
                'visible'=>false
            ],
            [ 'name'=>'count',
                'data'=>'count',
                'title'=>trans('time_management.delay_count'),
            ],
            [ 'name'=>'penalty',
                'data'=>'penalty',
                'title'=>trans('time_management.delay_deduct'),
            ],
            [ 'name'=>'max_penalty',
                'data'=>'max_penalty',
                'title'=>trans('time_management.max_penalty_option'),
                'visible'=>false
            ],
            [ 'name'=>'action',
                'data'=>'action',
                'title'=>trans('general.action'),
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
        return 'AbsencePenalties_' . date('YmdHis');
    }
}

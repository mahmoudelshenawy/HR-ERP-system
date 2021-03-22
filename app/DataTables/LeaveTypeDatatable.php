<?php

namespace App\DataTables;

use App\LeaveTypes;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LeaveTypeDatatable extends DataTable
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
            ->editColumn('type_cat', function ($query){
                return  trans('time_management.'.$query->type_cat);
            })
            ->editColumn('deduct_type', function ($query){
                return  trans('time_management.'.$query->deduct_type);
            })
            ->editColumn('amount', function ($query){
               if ($query->deduct_type == 'daily'){
                   $amount = $query->amount .' '. trans('time_management.days');
               }else{
                   $amount = $query->amount ;
               }
               return $amount;
            })
            ->addColumn('action','time_management.leave_types.datatable_columns.action')
            ->rawColumns([
                'action',
            ]);

    }




    public function query(LeaveTypes $model)
    {
        return $model->newQuery();
    }




    public function html()
    {
        return $this->builder()
             ->setTableId('leavetypedatatable-table')
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
                'initComplete'=>' function () {
                            this.api().columns([0,1]).every(function () {
                                var column = this;
                                var input = document.createElement("input");
                                $(input).appendTo($(column.footer()).empty())
                                .on(\'keyup\', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }',
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
            [ 'name'=>'type_cat',
               'data'=>'type_cat',
              'title'=>trans('time_management.type_cat'),
            ],
            [ 'name'=>'deduct_type',
               'data'=>'deduct_type',
              'title'=>trans('time_management.deduct_type'),
            ],
            [ 'name'=>'amount',
               'data'=>'amount',
              'title'=>trans('time_management.amount'),
            ],
            [ 'name'=>'action',
               'data'=>'action',
              'title'=>trans('general.action'),
                'searchable'=>false,
                'orderable'=>false,
                'sortable'=>false,
                'printable'=>false,
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
        return 'LeaveType_' . date('YmdHis');
    }
}

<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTables extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('employee', 'users.columns.employee')
            ->addColumn('action', 'users.buttons.action')
            ->rawColumns([
                'action',
                'employee',
            ]);
    }


    public function query(User $model)
    {
        return $model->query();
    }



    public function html()
    {
        return $this->builder()
                    ->setTableId('usersdatatables-table')
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
                            this.api().columns([0,1,2]).every(function () {
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
            ],
            [ 'name'=>'name',
              'data'=>'name',
              'title'=>trans('employee.name'),
            ],
            [ 'name'=>'email',
              'data'=>'email',
              'title'=>trans('employee.email'),
            ],
            [ 'name'=>'employee',
                'data'=>'employee',
                'title'=>trans('employee.employee'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
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

    protected function filename()
    {
        return 'UsersDataTables_' . date('YmdHis');
    }
}

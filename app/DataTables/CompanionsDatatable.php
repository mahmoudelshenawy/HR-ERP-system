<?php

namespace App\DataTables;

use App\Companion;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompanionsDatatable extends DataTable
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
            ->addColumn('action', 'employees.companions.datatable-columns.action')
            ->addColumn('employee_id', function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('employee_name');
            })
            ->rawColumns([
                'action',
                'employee_id',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\CompanionsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Companion $model)
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
                    ->setTableId('companionsdatatable-table')
                     ->columns($this->getColumns())
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
                                    this.api().columns([1,2,3]).every(function () {
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
                'data'=>"name",
                'title'=>trans('employee.name'),
            ],
            [ 'name'=>'employee_id',
                'data'=>"employee_id",
                'title'=>trans('employee.employee_name'),
            ],
            [ 'name'=>'relative_relation',
                'data'=>"relative_relation",
                'title'=>trans('employee.relative_relation'),
            ], [ 'name'=>'residence_number',
                'data'=>"residence_number",
                'title'=>trans('employee.residence_number'),
            ], [ 'name'=>'birth_date',
                'data'=>"birth_date",
                'title'=>trans('employee.birth_date'),
            ], [ 'name'=>'medical_insurance_number',
                'data'=>"medical_insurance_number",
                'title'=>trans('employee.medical_insurance_number'),
            ],
            [ 'name'=>'medical_insurance_start_data',
                'data'=>"medical_insurance_start_data",
                'title'=>trans('employee.medical_insurance_start_data'),
            ],
            [ 'name'=>'medical_insurance_end_data',
                'data'=>"medical_insurance_end_data",
                'title'=>trans('employee.medical_insurance_end_data'),
            ],
            [ 'name'=>'action',
                'data'=>"action",
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
        return 'Companions_' . date('YmdHis');
    }
}

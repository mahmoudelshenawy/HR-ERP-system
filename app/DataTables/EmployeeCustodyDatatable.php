<?php

namespace App\DataTables;

use App\EmployeeCustody;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeCustodyDatatable extends DataTable
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
            ->editColumn('employee_id',function ($query){
                return DB::table('employee_general_data')->where('id',$query->employee_id)->value('employee_name');

            }) ->editColumn('custody_type_id',function ($query){
                return DB::table('custody_types')->where('id',$query->custody_type_id)->value('name');

            })
            ->addColumn('action', 'employees.custodys.datatable_columns.action')
            ->addColumn('employee_img', 'employees.custodys.datatable_columns.employee_img')
            ->rawColumns([
                'action',
                'employee_img',

            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\EmployeeCustodyDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmployeeCustody $model)
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
                    ->setTableId('employeecustodydatatable-table')
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
                'select' => true,
                'fixedHeader'=> true,
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
            [ 'name'=>'employee_id',
                'data'=>'employee_id',
                'title'=>trans('employee.employee_name'),
                'visible'=>false
            ],
            [ 'name'=>'employee_img',
                'data'=>'employee_img',
                'title'=>trans('employee.employee_name'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                'exportable'=>false
            ],

            [ 'name'=>'custody_type_id ',
                'data'=>'custody_type_id',
                'title'=>trans('employee.custady_type'),
            ],
            [ 'name'=>'custody_number',
                'data'=>'custody_number',
                'title'=>trans('employee.custady_number'),
                'width'=>'5px',
            ],
            [ 'name'=>'name',
                'data'=>'name',
                'title'=>trans('employee.custady_name'),
            ],

            [ 'name'=>'custody_received_date ',
                'data'=>'custody_received_date',
                'title'=>trans('employee.custady_received_date'),
            ],
            [ 'name'=>'custody_expiry_form_date',
                'data'=>'custody_expiry_form_date',
                'title'=>trans('employee.custody_expiry_form_date'),
                'visible'=>false
            ],
            [ 'name'=>'custody_insurance_expiry_date ',
                'data'=>'custody_insurance_expiry_date',
                'title'=>trans('employee.custody_insurance_expiry_date'),
                'visible'=>false
            ],
            [ 'name'=>'custody_checking_date ',
                'data'=>'custody_checking_date',
                'title'=>trans('employee.custody_checking_date'),
                'visible'=>false
            ],

            [ 'name'=>'custody_return_date',
                'data'=>'custody_return_date',
                'title'=>trans('employee.custody_return_date'),
                'visible'=>false
            ],


            [ 'name'=>'action ',
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
        return 'EmployeeCustody_' . date('YmdHis');
    }
}

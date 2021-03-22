<?php

namespace App\DataTables;

use App\Loans;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LoansDatatable extends DataTable
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

            })
            ->addColumn('action','employees.loans.datatable_columns.action');

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\LoansDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Loans $model)
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
            ->setTableId('loansdatatable-table')
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
            [ 'name'=>'employee_id',
                'data'=>'employee_id',
                'title'=>trans('employee.employee_name'),
            ],
            [ 'name'=>'loan_date',
                'data'=>'loan_date',
                'title'=>trans('employee.loan_date'),
            ],
            [ 'name'=>'loan_amount',
                'data'=>'loan_amount',
                'title'=>trans('employee.loan_amount'),
            ],
            [ 'name'=>'installment_amount',
                'data'=>'installment_amount',
                'title'=>trans('employee.installment_amount'),
            ],
            [ 'name'=>'installment_month',
                'data'=>'installment_month',
                'title'=>trans('employee.installment_month'),
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
        return 'Loans_' . date('YmdHis');
    }
}

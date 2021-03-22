<?php

namespace App\DataTables;


use App\BusinessBranch;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BranchesDatatable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('branch_manager', 'business-setup.business-branch.datatable-columns.manager')
            ->addColumn('action', 'business-setup.business-branch.datatable-buttons.action')
            ->addColumn('logo', 'business-setup.business-branch.datatable-columns.branch_logo')
            ->addColumn('employees', 'business-setup.business-branch.datatable-columns.employees')
            ->rawColumns([
                'action',
                'branch_manager',
                'logo',
                'employees'
            ]);
    }


    public function query(BusinessBranch $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('branchesdatatable-table')
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
                    ['extend'=>'export','className'=>'btn btn-lg  btn-success' ,'text'=>'<i class="fa fa-print"> '.trans('datatable.export').'</i>'],
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
                'title'=>'',

            ],
            [ 'name'=>'logo',
                'data'=>'logo',
                'title'=>'',
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                "searchable" => true,
            ],
            [ 'name'=>'name',
             'data'=>"name",
             'title'=>trans('employee.name'),
                'visible'=>false
            ],
            [ 'name'=>'phone',
                'data'=>'phone',
                'title'=>trans('employee.phone'),
                'visible'=>false
            ],
            [ 'name'=>'email',
                'data'=>'email',
                'title'=>trans('employee.email'),
                'visible'=>false
            ],
            [ 'name'=>'branch_manager',
                'data'=>'branch_manager',
                'title'=>trans('business-setup.branch_manager'),
                "orderable" => false,
                "searchable" => true,
            ],
            [ 'name'=>'employees',
                'data'=>'employees',
                'title'=>trans('nav.employees'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                "searchable" => true,
            ],
            [ 'name'=>'address',
                'data'=>'address',
                'title'=>trans('employee.address'),
                "orderable" => false,
            ],
            [ 'name'=>'action',
                'data'=>'action',
                'title'=>trans('general.action'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
                "searchable" => true,
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
        return 'Branches_' . date('YmdHis');
    }
}

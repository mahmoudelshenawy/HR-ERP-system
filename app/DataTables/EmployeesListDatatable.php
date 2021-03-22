<?php

namespace App\DataTables;

use App\EmployeeGeneralData;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeesListDatatable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('img','employees.employees_list.datatable_columns.img')
            ->addColumn('manager',function ($query){
                     return value(DB::table('employee_general_data')->where('id',$query->manager_id)->value('employee_name'));

                  })
            ->addColumn('national_id_number_2',function ($query){
                     return value(DB::table('employee_general_data')->where('id',$query->manager_id)->value('national_id_number'));
                  })
            ->addColumn('manager_code',function ($query){
                     return value(DB::table('employee_general_data')->where('id',$query->manager_id)->value('code'));
                  })
            ->addColumn('branch',function ($query){
                     return value(DB::table('business_branches')->where('id',$query->branch_id)->value('name'));
                  })
            ->editColumn('country_id',function ($query){
                     return value(DB::table('countries')->where('id',$query->country_id)->value('name'));
                  })
            ->editColumn('attendable',function ($query){
                        $statue =  trans('general.no');
                        if ($query->attendable == 1){
                            $statue = trans('general.yes');
                        }
                        return $statue;
                  })
            ->editColumn('annual_vacation',function ($query){
                        $statue =  trans('general.no');
                        if ($query->annual_vacation == 1){
                            $statue = trans('general.yes');
                        }
                        return $statue;
                  })
            ->editColumn('end_service_reward',function ($query){
                        $statue =  trans('general.no');
                        if ($query->annual_vacation == 1){
                            $statue = trans('general.yes');
                        }
                        return $statue;
                  })
            ->editColumn('employee_medical_insurance_statue',function ($query){
                        $statue =  trans('general.no');
                        if ($query->annual_vacation == 1){
                            $statue = trans('general.yes');
                        }
                        return $statue;
                  })
            ->editColumn('guarantor_id',function ($query){
                     return value(DB::table('guarantors')->where('id',$query->guarantor_id)->value('name'));
                  })
            ->addColumn('guarantor_code',function ($query){
                     return value(DB::table('guarantors')->where('id',$query->guarantor_id)->value('code'));
                  })
            ->editColumn('job_id',function ($query){
                     return value(DB::table('business_jobs')->where('id',$query->job_id)->value('name'));
                  })
            ->editColumn('birth_date',function ($query){
                $value = '';
                if ($query->birth_date != null || $query->birth_date != ''){
                    $data = explode('/',$query->birth_date);
                        $time  = mktime(0,0,0,$data[1],$data[0],$data[2]);
                        $value = date('d/m/Y',$time);
                }
                return $value;
               })
            ->editColumn('contract_types_id',function ($query){
                     return value(DB::table('contract_types')->where('id',$query->contract_types_id)->value('name'));
                  })
            ->editColumn('medical_insurance_id',function ($query){
                     return value(DB::table('medical_insurances')->where('id',$query->medical_insurance_id)->value('name'));
                  })
            ->editColumn('bank_id',function ($query){
                     return value(DB::table('bank_data')->where('id',$query->bank_id)->value('name'));
                  })
            ->editColumn('employee_account_number',function ($query){
                     return value($query->employee_account_number);
                  })
            ->editColumn('administration',function ($query){
                $department = DB::table('business_jobs')->where('id',$query->job_id)->value('business_department_id');
                $administration = DB::table('business_departments')->where('id',$department)->value('business_administration_id');
                return value(DB::table('business_administrations')->where('id',$administration)->value('name'));                  })
            ->editColumn('department',function ($query){
                $department = DB::table('business_jobs')->where('id',$query->job_id)->value('business_department_id');
                     return value(DB::table('business_departments')->where('id',$department)->value('name'));
                  })
            ->addColumn('hiring_date_2','employees.employees_list.datatable_columns.hiring_date')
            ->addColumn('country','employees.employees_list.datatable_columns.country')
            ->rawColumns([
                'img',
                'manager',
                'branch',
                'country_id',
                'guarantor_id',
                'national_id_number_2',
                'job_id',
                'contract_types_id',
                'medical_insurance_id',
                'hiring_date_2',
                'country'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\EmployeesListDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmployeeGeneralData $model)
    {

        $model =  $model->newQuery();
        return  $model->where('statue','active');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        return $this->builder()
            ->setTableId('employees_list_datatable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->parameters(
                [
                'dom '=> '<"row"<"float-left"B><"float-right"f>><"row"<"float-left"i><"float-right"p>>rtlp',
                'lengthMenu' => [
                    [ 10, 25, 50,100, -1 ],
                    [trans('datatable.10rows'), trans('datatable.25rows'),
                     trans('datatable.50rows'),trans('datatable.100rows'),
                     trans('datatable.show_all'), ]
                    ],

                'order'   => [[0, 'asc']],
                'buttons' => [
                    ['extend'=>'reload','className'=>'btn btn-lg btn-success' ,'text'=>'<i class="fa fa-refresh"> '.trans('datatable.reload').'</i>'],
                    ['extend'=>'export','className'=>'btn btn-lg btn-success' ,'text'=> '<i class="fa fa-file-pdf-o"> '.trans('datatable.export').'</i>'],
                ],
                "autoWidth"=> false,
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
            ])  ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [ 'name'=>'code',
                'data'=>"code",
                'title'=>trans('employee.code'),
                'width'=>'10px'
            ],
            [ 'name'=>'national_id_number',
                'data'=>"national_id_number",
                'title'=>trans('employee.national_id'),
                'visible'=>false
            ],
            [ 'name'=>'img',
                'data'=>"img",
                'title'=>trans('employee.employee'),
                'width'=>'10px',
                'sortable'=>false,
                'searchable'=>false,
                'orderable'=>false,
                'printable'=>false,
                'exportable'=>false
            ],
            [ 'name'=>'branch',
                'data'=>'branch',
                'title'=>trans('employee.branch'),
                'sortable'=>false,
                'searchable'=>false,
                'orderable'=>false,
                'printable'=>false,
                'exportable'=>false
            ] ,
            [ 'name'=>'guarantor_id',
                'data'=>"guarantor_id",
                'title'=>trans('employee.guarantor'),
                'sortable'=>false,
                'searchable'=>false,
                'orderable'=>false,
                'printable'=>false,
                'exportable'=>false
            ],
            [ 'name'=>'hiring_date_2',
                'data'=>"hiring_date_2",
                'title'=>trans('employee.hiring_date'),
                'sortable'=>false,
                'searchable'=>false,
                'orderable'=>false,
                'printable'=>false,
                'exportable'=>false,
            ],
            [ 'name'=>'country',
                'data'=>"country",
                'title'=>trans('employee.country'),
                'sortable'=>false,
                'searchable'=>false,
                'orderable'=>false,
                'printable'=>false,
                'exportable'=>false
            ],

            [ 'name'=>'employee_name',
                'data'=>"employee_name",
                'title'=>trans('employee.name'),
                'visible'=>false
            ],
            [ 'name'=>'employee_name_en',
                'data'=>"employee_name_en",
                'title'=>trans('employee.name_en'),
                'visible'=>false
            ],
            [ 'name'=>'employee_short_name',
                'data'=>"employee_short_name",
                'title'=>trans('employee.short_name'),
                'visible'=>false
            ],
            [ 'name'=>'gender',
                'data'=>"gender",
                'title'=>trans('employee.gender'),
                'visible'=>false
            ],
            [ 'name'=>'branch',
                'data'=>'branch',
                'title'=>trans('employee.branch'),
                'visible'=>false
            ] ,
            [ 'name'=>'administration',
                'data'=>'administration',
                'title'=>trans('business-setup.administration'),
                'visible'=>false,
                'sortable'=>false,
                'searchable'=>false,
                'orderable'=>false,
            ] ,
            [ 'name'=>'department',
                'data'=>'department',
                'title'=>trans('business-setup.Department'),
                'sortable'=>false,
                'searchable'=>false,
                'orderable'=>false,
                'visible'=>false
            ] ,
            [ 'name'=>'job_id',
                'data'=>"job_id",
                'title'=>trans('employee.job'),
                'visible'=>false

            ],
            [ 'name'=>'country_id',
                'data'=>"country_id",
                'title'=>trans('employee.country'),
                'visible'=>false

            ],
            [ 'name'=>'birth_date',
                'data'=>"birth_date",
                'title'=>trans('employee.birth_date'),
                'visible'=>false

            ],
            [ 'name'=>'national_id_number_2',
                'data'=>"national_id_number_2",
                'title'=>trans('employee.national_id_2'),
                'visible'=>false,
            ],
            [ 'name'=>'national_id_expiry_date',
                'data'=>"national_id_expiry_date",
                'title'=>trans('employee.national_id_expiry_date'),
                'visible'=>false
            ],
            [ 'name'=>'residency_number',
                'data'=>"residency_number",
                'title'=>trans('employee.residence_number'),
                'visible'=>false

            ],
            [ 'name'=>'residency_start_date',
                'data'=>"residency_start_date",
                'title'=>trans('employee.residence_start_date'),
                'visible'=>false

            ],
            [ 'name'=>'residency_expiry_date',
                'data'=>"residency_expiry_date",
                'title'=>trans('employee.residence_expiry_date'),
                'visible'=>false

            ],
            [ 'name'=>'residency_job',
                'data'=>"residency_job",
                'title'=>trans('employee.residency_job'),
                'visible'=>false

            ],
            [ 'name'=>'passport_number',
                'data'=>"passport_number",
                'title'=>trans('employee.passport_number'),
                'visible'=>false

            ],
            [ 'name'=>'passport_start_date',
                'data'=>"passport_start_date",
                'title'=>trans('employee.passport_start_date'),
                'visible'=>false

            ],
            [ 'name'=>'passport_expiry_date',
                'data'=>"passport_expiry_date",
                'title'=>trans('employee.passport_expiry_date'),
                'visible'=>false

            ],
            [ 'name'=>'religion',
                'data'=>"religion",
                'title'=>trans('employee.religion'),
                'visible'=>false
            ],
            [ 'name'=>'driving_licence_number',
                'data'=>"driving_licence_number",
                'title'=>trans('employee.driving_licence_number'),
                'visible'=>false

            ],
            [ 'name'=>'driving_licence_expiry_date',
                'data'=>"driving_licence_expiry_date",
                'title'=>trans('employee.driving_licence_expiry_date'),
                'visible'=>false
            ],
            [ 'name'=>'healthy_certificate',
                'data'=>"healthy_certificate",
                'title'=>trans('employee.healthy_certificate_number'),
                'visible'=>false
            ],
            [ 'name'=>'healthy_certificate_cancel_date',
                'data'=>"healthy_certificate_cancel_date",
                'title'=>trans('employee.healthy_certificate_cancel_date'),
                'visible'=>false
            ],
            [ 'name'=>'healthy_certificate_expiry_date',
                'data'=>"healthy_certificate_expiry_date",
                'title'=>trans('employee.healthy_certificate_expiry_date'),
                'visible'=>false
            ],
            [ 'name'=>'healthy_certificate_notice',
                'data'=>"healthy_certificate_notice",
                'title'=>trans('employee.healthy_certificate_notice'),
                'visible'=>false
            ],

            [ 'name'=>'guarantor_code',
                'data'=>"guarantor_code",
                'title'=>trans('employee.guarantor_code'),
                'visible'=>false
            ],

            [ 'name'=>'guarantor_id',
                'data'=>"guarantor_id",
                'title'=>trans('employee.guarantor'),
                'visible'=>false

            ],
            [ 'name'=>'contract_types_id',
                'data'=>"contract_types_id",
                'title'=>trans('employee.contract_type'),
                'visible'=>false

            ],
            [ 'name'=>'hiring_date',
                'data'=>"hiring_date",
                'title'=>trans('employee.hiring_date'),
                'visible'=>false

            ],
            [ 'name'=>'contract_starting_date',
                'data'=>"contract_starting_date",
                'title'=>trans('employee.contract_starting_date'),
                'visible'=>false

            ],
            [ 'name'=>'contract_ending_date',
                'data'=>"contract_ending_date",
                'title'=>trans('employee.contract_ending_date'),
                'visible'=>false

            ],
            [ 'name'=>'socialinsurance_join_date',
                'data'=>"socialinsurance_join_date",
                'title'=>trans('employee.socialinsurance_join_date'),
                'visible'=>false
            ],
            [ 'name'=>'employee_social_insurance_number',
                'data'=>"employee_social_insurance_number",
                'title'=>trans('employee.employee_social_insurance_number'),
                'visible'=>false

            ],
            [ 'name'=>'manager_code',
                'data'=>"manager_code",
                'title'=>trans('employee.manager_code'),
                'visible'=>false

            ],
            [ 'name'=>'manager',
                'data'=>"manager",
                'title'=>trans('employee.manager_name'),
                'visible'=>false

            ],
            [ 'name'=>'attendable',
                'data'=>"attendable",
                'title'=>trans('employee.attendable'),
                'visible'=>false
            ],
            [ 'name'=>'annual_vacation',
                'data'=>"annual_vacation",
                'title'=>trans('employee.annual_vacation'),
                'visible'=>false
            ],
            [ 'name'=>'annual_vacation_days_per_year',
                'data'=>"annual_vacation_days_per_year",
                'title'=>trans('employee.annual_vacation_days_per_year'),
                'visible'=>false

            ],
            [ 'name'=>'end_service_reward',
                'data'=>"end_service_reward",
                'title'=>trans('employee.end_service_reward'),
                'visible'=>false
            ],
            [ 'name'=>'end_service_reward_days_per_year',
                'data'=>"end_service_reward_days_per_year",
                'title'=>trans('employee.end_service_reward_days_per_year'),
                'visible'=>false
            ],
            [ 'name'=>'employee_medical_insurance_statue',
                'data'=>"employee_medical_insurance_statue",
                'title'=>trans('employee.insurance_statue'),
                'visible'=>false

            ],
            [ 'name'=>'medical_insurance_type',
                'data'=>"medical_insurance_type",
                'title'=>trans('employee.medical_insurance_type'),
                'visible'=>false

            ],
            [ 'name'=>'medical_insurance_id',
                'data'=>"medical_insurance_id",
                'title'=>trans('employee.medical_insurance_provider'),
                'visible'=>false

            ],
            [ 'name'=>'medical_insurance_number',
                'data'=>"medical_insurance_number",
                'title'=>trans('employee.medical_insurance_number'),
                'visible'=>false

            ],

            [ 'name'=>'medical_insurance_start_data',
                'data'=>"medical_insurance_start_data",
                'title'=>trans('employee.medical_insurance_start_data'),
                'visible'=>false

            ],
            [ 'name'=>'medical_insurance_end_data',
                'data'=>"medical_insurance_end_data",
                'title'=>trans('employee.medical_insurance_end_data'),
                'visible'=>false

            ],
            [ 'name'=>'basic_salary',
                'data'=>"basic_salary",
                'title'=>trans('employee.basic_salary'),
                'visible'=>false

            ],
            [ 'name'=>'variable_pay',
                'data'=>"variable_pay",
                'title'=>trans('employee.variable_pay'),
                'visible'=>false

            ],
            [ 'name'=>'bank_id',
                'data'=>"bank_id",
                'title'=>trans('employee.bank_name'),
                'visible'=>false

            ],
            [ 'name'=>'employee_account_number',
                'data'=>"employee_account_number",
                'title'=>trans('employee.bank_account_number'),
                'visible'=>false
            ],

            [ 'name'=>'phone_1',
                'data'=>"phone_1",
                'title'=>trans('employee.phone'),
                'visible'=>false
            ],
            [ 'name'=>'phone_2',
                'data'=>"phone_2",
                'title'=>trans('employee.phone2'),
                'visible'=>false
            ],
            [ 'name'=>'birth_place',
                'data'=>"birth_place",
                'title'=>trans('employee.birth_place'),
                'visible'=>false
            ],
            [ 'name'=>'address',
                'data'=>"address",
                'title'=>trans('employee.address'),
                'visible'=>false
            ],
            [ 'name'=>'educational_qualification',
                'data'=>"educational_qualification",
                'title'=>trans('employee.educational_qualification'),
                'visible'=>false

            ],
            [ 'name'=>'educational_university',
                'data'=>"educational_university",
                'title'=>trans('employee.university'),
                'visible'=>false

            ],
            [ 'name'=>'educational_qualification_year',
                'data'=>"educational_qualification_year",
                'title'=>trans('employee.educational_qualification_year'),
                'visible'=>false

            ],
            [ 'name'=>'experience',
                'data'=>"experience",
                'title'=>trans('employee.experience'),
                'visible'=>false

            ],
            [ 'name'=>'email',
                'data'=>"email",
                'title'=>trans('employee.email'),
                'visible'=>false
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
        return 'Employees_' . date('YmdHis');
    }
}

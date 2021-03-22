<div class="main-wrapper">
<div class="sidebar" id="sidebar" >
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu" >
						<ul >

                            <li class="{{ Request::is('/home') ? 'active' : '' }}">
                                <a href="{{url('/home')}}"><i class="la la-dashboard"></i> <span> {{__('nav.Dashboard')}}</span> <span class="menu-title"></span></a>
                            </li>

                            <li class="menu-title">
                                <span>{{__('nav.business_setup')}}</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-cogs"></i> <span> {{__('nav.business_setup')}}</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li >
                                        <a class="{{ Request::is('users') ? 'active' : '' }}" href="{{ url('users') }}">{{__('nav.users')}}</a>
                                    </li>
                                    <li class="{{ Request::is('business-setup/business-type') ? 'active' : '' }}">
                                        <a  href="{{ url('/business-setup/business-type') }}">{{__('nav.business_type')}}</a>
                                    </li>
                                    <li >
                                        <a href="#"><span> {{__('nav.business_branch_menu')}}</span> <span class="menu-arrow"></span></a>
                                        <ul style="display: none;">
                                            <li>
                                                <a  class="{{ Request::is('business-setup/business-branch') ? 'active' : '' }}" href="{{ url('/business-setup/business-branch') }}">{{__('nav.branch')}}</a>
                                            </li>
                                            <li >
                                                <a class="{{ Request::is('business-setup/business-administration') ? 'active' : '' }}" href="{{url('/business-setup/business-administration')}}">{{__('nav.administrations')}}</a>
                                            </li>
                                            <li >
                                                <a class="{{ Request::is('business-setup/business-department') ? 'active' : '' }}" href="{{url('/business-setup/business-department')}}">{{__('nav.departments')}}</a>
                                            </li>
                                            <li>
                                                <a   class="{{ Request::is('business-setup/business-job') ? 'active' : '' }}"href="{{url('/business-setup/business-job')}}">{{__('nav.jobs')}}</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/guarantor') ? 'active' : '' }}" href="{{ url('/business-setup/guarantor') }}">{{__('nav.guarantors')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/contract-type') ? 'active' : '' }}" href="{{ url('/business-setup/contract-type') }}">{{__('nav.contract_type')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/bank-data') ? 'active' : '' }}" href="{{ url('/business-setup/bank-data') }}">{{__('nav.banks')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/medical-insurance-data') ? 'active' : '' }}" href="{{ url('/business-setup/medical-insurance-data') }}">{{__('nav.medical_insurance')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/fixed_allowance') ? 'active' : '' }}" href="{{ url('/business-setup/fixed_allowance') }}">{{__('nav.fixed_allowance')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('/business-setup/fixed_deduction') ? 'active' : '' }}" href="{{ url('/business-setup/fixed_deduction') }}">{{__('nav.fixed_deduction')}}</a>
                                    </li>

                                </ul>
                            </li>
                            <!-----------------   business set up  menue   ------------>
                            <li class="menu-title">
                                <span>{{__('employee.employees')}}</span>
                            </li>
                            <li class="submenu">
                                <a href="#" class="noti-dot"><i class="la la-user"></i> <span> {{__('employee.employees')}}</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('employees/list') ? 'active' : '' }}" href="{{ url('employees/list') }}">{{__('nav.all_employees')}} <span class="badge badge-pill bg-primary float-right ">{{App\EmployeeGeneralData::where('statue' , 'active')->count()}}</span> </a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/companions') ? 'active' : '' }}" href="{{ url('employees/companions') }}">{{__('nav.companions')}}</a>
                                    </li>


                                </ul>
                            </li>

                            <li class="submenu">
                                <a href="#" class="noti-details"><i class="la la-car"></i> <span> {{__('nav.custodys')}}</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('business-setup/custodys-type') ? 'active' : '' }}" href="{{ url('/business-setup/custodys-type') }}">{{__('nav.custady_type')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/custodys') ? 'active' : '' }}" href="{{ url('employees/custodys') }}">{{__('nav.custodys')}}</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#" class="noti-details"><i class="la la-exchange"></i> <span> {{__('nav.statue_change')}}</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('employees/movement') ? 'active' : '' }}" href="{{ url('employees/movement') }}">{{__('nav.movement')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/resignations') ? 'active' : '' }}" href="{{url('employees/resignations')}}">{{__('employee.resignations')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('employees/inactive') ? 'active' : '' }}" href="{{url('employees/inactive')}}">{{__('employee.inactive_employee')}}</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#" class="noti-details"><i class="la la-money"></i> <span> {{__('employee.loans')}}</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('employees/loans') ? 'active' : '' }}" href="{{ url('employees/loans') }}">{{__('employee.loans')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <!---------------------------------------------------->
                            <li class="menu-title">
                                <span>{{__('nav.time_management')}}</span>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-calculator"></i> <span>{{__('nav.penalties')}} </span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('time-management/delay-penalties') ? 'active' : '' }}" href="{{ url('time-management/delay-penalties') }}">{{__('nav.delay_penalties')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('time-management/absence-penalties') ? 'active' : '' }}" href="{{ url('time-management/absence-penalties') }}">{{__('nav.absence_penalties')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('time-management/custom-delay-penalties') ? 'active' : '' }}" href="{{ url('time-management/custom-delay-penalties') }}">{{__('nav.custom_delay_penalties')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('time-management/grace_period') ? 'active' : '' }}" href="{{ url('time-management/grace_period') }}">{{__('nav.grace_period')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-calendar"></i> <span>{{__('nav.holidays_title')}} </span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('time-management/leave-types') ? 'active' : '' }}" href="{{ url('time-management/leave-types') }}">{{__('nav.employee_leaves_types')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('time-management/employee-leaves') ? 'active' : '' }}" href="{{ url('time-management/employee-leaves') }}">{{__('nav.employee_leaves')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('time-management/holidays') ? 'active' : '' }}" href="{{ url('time-management/holidays') }}">{{__('nav.holidays')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-money"></i> <span>الحضور</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('time-management/attendance-rules') ? 'active' : '' }}" href="{{url('time-management/attendance-rules')}}">{{__('time_management.attendance_rules')}}</a>
                                    </li>

                                    <li>
                                        <a class="{{ Request::is('time-management/shifts') ? 'active' : '' }}" href="{{url('time-management/shifts')}}">{{__('time_management.shifts')}}</a>
                                    </li>

                                     <li>
                                        <a class="{{ Request::is('time-management/employees_shifts') ? 'active' : '' }}" href="{{url('time-management/employees_shifts')}}">{{__('time_management.employees_shifts')}}</a>
                                    </li>

                                    <li>
                                        <a class="{{ Request::is('time-management/attendance') ? 'active' : '' }}" href="#">{{__('nav.attendance_employees')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-money"></i> <span>حركات الحضور والأنصراف</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('time-management/attendence_permissions') ? 'active' : '' }}" href="{{url('time-management/attendence_permissions')}}">{{__('time_management.attendence_permissions')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('time-management/commission_permissions') ? 'active' : '' }}" href="{{url('time-management/commission_permissions')}}">{{__('time_management.commission_permissions')}}</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title">المرتبات</li>
                            <li class="submenu">
                                <a href="#"><i class="la la-calendar-check-o"></i> <span> المرتبات </span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('salary/over_time') ? 'active' : '' }}" href="{{url('salary/over_time')}}">{{__('salary.over_time')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('salary/commissions') ? 'active' : '' }}" href="{{url('salary/commissions')}}">{{__('salary.commission')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('salary/allowance') ? 'active' : '' }}" href="{{url('salary/allowance')}}">{{__('salary.allowance')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('salary/advance') ? 'active' : '' }}" href="{{url('salary/advance')}}">{{__('salary.advance')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('salary/absence_delay_penalty') ? 'active' : '' }}" href="{{url('salary/absence_delay_penalty')}}">{{__('salary.absence_delay_penalties')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('salary/net_salary') ? 'active' : '' }}" href="{{url('salary/net_salary')}}">{{__('salary.calculate_salarries')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="#"><i class="la la-book"></i> <span>{{__('nav.reports')}} </span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li>
                                        <a class="{{ Request::is('reports/employee-financial') ? 'active' : '' }}" href="{{ url('reports/employee-financial') }}">{{__('report.employee_financial_data')}}</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('reports/employee-financial') ? 'active' : '' }}" href="#">كل بيانات الموظفين</a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('reports/employee-financial') ? 'active' : '' }}" href="#">المرتبات</a>
                                    </li>

                                </ul>
                            </li>
	                	</ul>
	            	</div>
                </div>
</div>
</div>




<?php $cont = $this->uri->segment(1); ?>
<?php $func = $this->uri->segment(2);


$general = array(
'emp_department_report_form',
'company_overall_report_form',
'grade_company_form',
'level_company_form',
'add_leavetype_form',
'view_leavetype',
'benefit_form',
'all_benefits',
'level_form',
'all_levels',
'grade_form',
'all_grades',
'salary_form',
'view_salary_info',
'add_department_form',
'view_departments',
'add_designation_form',
'view_designations',
'add_company_form',
'view_company',
'add_city_form',
'view_cities',
'add_campus',
'view_campuses',
'add_grade',
'view_grades',
'add_bank',
'view_banks',
'add_facility',
'view_facilities',
'add_religion',
'view_religions',
'add_relation',
'view_relations',
'add_document',
'view_documents',
'add_country',
'view_countries',
'add_salary_type',
'view_salary_types',
    'edit_benefit_form',
    'edit_level_form',
    'edit_grade_form',
    'edit_department',
    'edit_designation',
    'edit_company',
    'edit_city',
    'edit_campus',
    'edit_bank',
    'get_bank_details',
    'get_facility',
    'get_religion',
    'get_relation',
    'get_document',
    'get_country'
);

?>

<div class="sidebar" id="sidebar">


    <ul class="nav nav-list">
        <li  <?php
        if ($func == 'dashboard') {
            echo 'class="active"';
        }
        ?> id="li_dashboard">
            <a href="<?php echo base_url(); ?>hris/dashboard">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>





        <li  <?php
        if ($func == 'generate_logins' ||
                $func == 'add_employee_form' ||
                $func == 'view_employees' ||
                $func == 'add_visitor_form' ||
                $func == 'report_employee' ||
                $func == 'search_salary' ||
                $func == 'payroll_employee' ||
                $func == 'faculty_members') {
            echo 'class="active open"';
        }
        ?>>
            <a href="#" class="dropdown-toggle">
                <i class="icon-group"></i>
                <span class="menu-text"> Employee Management </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li  <?php
                if ($func == 'generate_logins') {
                    echo 'class="active open"';
                }
                ?>>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-signin"></i>
                        <span class="menu-text"> Employee Logins </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li <?php
                        if ($func == 'generate_logins') {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url(); ?>hris/generate_logins">
                                <i class="icon-double-angle-right"></i>
                                Generate Logins
                            </a>
                        </li>  

                    </ul>

                </li>
                <li <?php
                if ($func == 'add_employee_form') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>hris/add_employee_form">
                        <i class="icon-double-angle-right"></i>
                        Add Employee
                    </a>
                </li>  
                <li <?php
                if ($func == 'view_employees') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>hris/view_employees">
                        <i class="icon-double-angle-right"></i>
                        View Employees
                    </a>
                </li> 
                <li <?php
                if ($func == 'add_visitor_form') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>hris/add_visitor_form">
                        <i class="icon-double-angle-right"></i>
                        Add Visitor
                    </a>
                </li>         
                <li <?php
                if ($func == 'report_employee') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>hris/report_employee">
                        <i class="icon-double-angle-right"></i>
                        Report
                    </a>
                </li> 

                <li <?php
                if ($func == 'search_salary') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>hris/search_salary">
                        <i class="icon-double-angle-right"></i>
                        E Slips
                    </a>
                </li> 

                <li <?php
                if ($func == 'payroll_employee') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>hris/payroll_employee">
                        <i class="icon-double-angle-right"></i>
                        Payroll
                    </a>
                </li> 

                <li <?php
                if ($func == 'faculty_members') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>hris/faculty_members">
                        <i class="icon-double-angle-right"></i>
                        Faculty Members
                    </a>
                </li> 

            </ul>    

        </li>

        <li  <?php
        if ($func == 'department_date_wise_report' ||
                $func == 'addleavepolicyform' ||
                $func == 'view_leavepolicy' ||
                $func == 'emp_absent_mark' ||
                $func == 'emp_attendance_mark' ||
                $func == 'add_shift' ||
                $func == 'view_shift' ||
                $func == 'emp_shift' ||
                $func == 'leave_emp_form' ||
                $func == 'employee_form' ||
                $func == 'emp_detail_form' ||
                $func == 'department_form' ||
                $func == 'dep_detail_form' ||
                $func == 'company_summery_form') {
            echo 'class="active open"';
        }
        ?>>
            <a href="#" class="dropdown-toggle">
                <i class="icon-check"></i>
                <span class="menu-text"> Attendance/Leave  </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">

                <li <?php
                if ($func == 'department_date_wise_report') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>attendance/department_date_wise_report">
                        <i class="icon-double-angle-right"></i>
                        View Attendance
                    </a>
                </li> 



                <li  <?php
                if ($func == 'addleavepolicyform' || $func == 'view_leavepolicy') {
                    echo 'class="active open"';
                }
                ?>>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-calendar"></i>
                        <span class="menu-text"> Leave Police Company Wise </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">

                        <li <?php
                        if ($func == 'addleavepolicyform') {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url(); ?>hris/addleavepolicyform">
                                <i class="icon-double-angle-right"></i>
                                Leave Police Company Wise
                            </a>
                        </li> 
                        <li <?php
                        if ($func == 'view_leavepolicy') {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url(); ?>hris/view_leavepolicy">
                                <i class="icon-double-angle-right"></i>
                                View Leave Policy
                            </a>
                        </li> 



                    </ul>    

                </li>





                <li <?php
                if ($func == 'emp_absent_mark') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>attendance/emp_absent_mark">
                        <i class="icon-double-angle-right"></i>
                        Absent Mark
                    </a>
                </li> 
                <li <?php
                if ($func == 'emp_attendance_mark') {
                    echo 'class="active"';
                }
                ?>>
                    <a href="<?php echo base_url(); ?>attendance/emp_attendance_mark">
                        <i class="icon-double-angle-right"></i>
                        Manual Attendance
                    </a>
                </li> 

                <li  <?php
                if ($func == 'add_shift' || $func == 'view_shift' || $func == 'emp_shift') {
                    echo 'class="active open"';
                }
                ?>>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-calendar"></i>
                        <span class="menu-text"> Shift Management </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">

                        <li <?php
                        if ($func == 'add_shift') {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url(); ?>attendance/add_shift">
                                <i class="icon-double-angle-right"></i>
                                Add Shift
                            </a>
                        </li> 
                        <li <?php
                        if ($func == 'view_shift') {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url(); ?>attendance/view_shift">
                                <i class="icon-double-angle-right"></i>
                                View Shift
                            </a>
                        </li> 

                        <li <?php
                        if ($func == 'emp_shift') {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url(); ?>attendance/emp_shift">
                                <i class="icon-double-angle-right"></i>
                                Employee-Shift
                            </a>
                        </li> 



                    </ul>    

                </li>
                <li  <?php
                if ($func == 'leave_balance_form' || $func == 'leave_dep_form' || $func == 'leave_emp_form' || $func == 'company_summery_form' || $func == 'department_form' || $func == 'employee_form' || $func == 'emp_detail_form' || $func == 'dep_detail_form') {
                    echo 'class="active open"';
                }
                ?>>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-calendar"></i>
                        <span class="menu-text"> Reports </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">




                        <li  <?php
                        if ($func == 'leave_emp_form' || $func == 'leave_balance_form') {
                            echo 'class="active open"';
                        }
                        ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-signin"></i>
                                <span class="menu-text">  Leave Detail  </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li <?php
                                if ($func == 'leave_emp_form') {
                                    echo 'class="active"';
                                }
                                ?>>
                                    <a href="<?php echo base_url(); ?>attendance/leave_emp_form">
                                        <i class="icon-double-angle-right"></i>
                                        Date wise
                                    </a>
                                </li>  
                                <li <?php
                                if ($func == 'leave_balance_form') {
                                    echo 'class="active"';
                                }
                                ?>>
                                    <a href="<?php echo base_url(); ?>attendance/leave_balance_form">
                                        <i class="icon-double-angle-right"></i>
                                        Yearly Leave Balance 
                                    </a>
                                </li>  

                            </ul>

                        </li>












                        <li  <?php
                        if ($func == 'employee_form' || $func == 'emp_detail_form') {
                            echo 'class="active open"';
                        }
                        ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-signin"></i>
                                <span class="menu-text">  Employee Wise </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li <?php
                                if ($func == 'employee_form') {
                                    echo 'class="active"';
                                }
                                ?>>
                                    <a href="<?php echo base_url(); ?>attendance/employee_form">
                                        <i class="icon-double-angle-right"></i>
                                        Summery
                                    </a>
                                </li>  
                                <li <?php
                                if ($func == 'emp_detail_form') {
                                    echo 'class="active"';
                                }
                                ?>>
                                    <a href="<?php echo base_url(); ?>attendance/emp_detail_form">
                                        <i class="icon-double-angle-right"></i>
                                        Detail
                                    </a>
                                </li>  

                            </ul>

                        </li>



                        <li  <?php
                        if ($func == 'department_form' || $func == 'dep_detail_form') {
                            echo 'class="active open"';
                        }
                        ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-signin"></i>
                                <span class="menu-text">  Department Wise </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li <?php
                                if ($func == 'department_form') {
                                    echo 'class="active"';
                                }
                                ?>>
                                    <a href="<?php echo base_url(); ?>attendance/department_form">
                                        <i class="icon-double-angle-right"></i>
                                        Summery
                                    </a>
                                </li>  
                                <li <?php
                                if ($func == 'dep_detail_form') {
                                    echo 'class="active"';
                                }
                                ?>>
                                    <a href="<?php echo base_url(); ?>attendance/dep_detail_form">
                                        <i class="icon-double-angle-right"></i>
                                        Detail
                                    </a>
                                </li>  

                            </ul>

                        </li>





                        <li  <?php
                        if ($func == 'company_summery_form') {
                            echo 'class="active open"';
                        }
                        ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-signin"></i>
                                <span class="menu-text">  Company Wise </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li <?php
                                if ($func == 'company_summery_form') {
                                    echo 'class="active"';
                                }
                                ?>>
                                    <a href="<?php echo base_url(); ?>attendance/company_summery_form">
                                        <i class="icon-double-angle-right"></i>
                                        Summery
                                    </a>
                                </li>  


                            </ul>

                        </li>











                    </ul>    

                </li>






            </ul>    

        </li>
        <li <?php
        if ($func == 'create_vacancy' || $func == 'view_vacancy') {
            echo 'class="active open"';
        }
        ?>>
            <a href="#" class="dropdown-toggle">
                <i class="icon-check"></i>
                <span class="menu-text"> Recruitment Module    </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">

                <li  <?php
                if ($func == 'create_vacancy' || $func == 'view_vacancy') {
                    echo 'class="active open"';
                }
                ?>>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-reorder"></i>
                        <span class="menu-text"> Vacancy </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li <?php
                        if ($func == 'create_vacancy') {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url(); ?>vacancy/create_vacancy">
                                <i class="icon-double-angle-right"></i>
                                Add Vacancy
                            </a>
                        </li>  
                        <li <?php
                        if ($func == 'view_vacancy') {
                            echo 'class="active"';
                        }
                        ?>>
                            <a href="<?php echo base_url(); ?>vacancy/view_vacancy">
                                <i class="icon-double-angle-right"></i>
                                View Vacancy
                            </a>
                        </li>  
                    </ul>

                </li>




            </ul>    
        </li>
        <li  <?php
        if (in_array($func, $general)) {
            echo 'class="active open"';
        }
        ?>>
            <a href="#" class="dropdown-toggle">
                <i class="icon-group"></i>
                <span class="menu-text"> General Management </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">

                <?php if ($this->session->userdata('account_role_id') == 2) { ?>



                    <!--                              Reports Start
                                    *************        ****************-->






                    <li  <?php
                    if ($func == 'emp_department_report_form' || $func == 'company_overall_report_form' || $func == 'grade_company_form' || $func == 'level_company_form') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="fa icon-cog"></i>
                            <span class="menu-text"> Report </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'emp_department_report_form') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/emp_department_report_form">
                                    <i class="icon-double-angle-right"></i>
                                    Department Wise Employee
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'company_overall_report_form') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/company_overall_report_form">
                                    <i class="icon-double-angle-right"></i>
                                    Company Wise Employee Summery
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'grade_company_form') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/grade_company_form">
                                    <i class="icon-double-angle-right"></i>
                                    Grades Report
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'level_company_form') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/level_company_form">
                                    <i class="icon-double-angle-right"></i>
                                    Level Report
                                </a>
                            </li> 
                        </ul>

                    </li>









                    <!--                          Reports END
                                    *************        ****************-->









                    <li  <?php
                    if ($func == 'add_leavetype_form' || $func == 'view_leavetype') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="fa icon-cog"></i>
                            <span class="menu-text"> Leave Type </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_leavetype_form') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_leavetype_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add Leave Type
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_leavetype') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_leavetype">
                                    <i class="icon-double-angle-right"></i>
                                    View Leave Type
                                </a>
                            </li>  
                        </ul>

                    </li>
















                    <li  <?php
                    if ($func=='edit_benefit_form'||$func == 'all_benefits' || $func == 'benefit_form') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="fa icon-cog"></i>
                            <span class="menu-text"> Benefit </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'benefit_form') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/benefit_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add Benefit
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'all_benefits') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/all_benefits">
                                    <i class="icon-double-angle-right"></i>
                                    View Benefit
                                </a>
                            </li>  
                        </ul>

                    </li>















                    <li  <?php
                    if ($func == 'edit_level_form' || $func == 'all_levels' || $func == 'level_form') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="fa icon-cog"></i>
                            <span class="menu-text"> Level </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'level_form') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/level_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add Level
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'all_levels') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/all_levels">
                                    <i class="icon-double-angle-right"></i>
                                    View Level
                                </a>
                            </li>  
                        </ul>

                    </li>



                    <li  <?php
                    if ($func == 'edit_grade_form' || $func == 'all_grades' || $func == 'grade_form') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="fa icon-cog"></i>
                            <span class="menu-text"> Grade </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'grade_form') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/grade_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add Grade
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'all_grades') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/all_grades">
                                    <i class="icon-double-angle-right"></i>
                                    View Grades
                                </a>
                            </li>  
                        </ul>

                    </li>




                    <li  <?php
                    if ($func == 'salary_form' || $func == 'add_grade_benefit_form' || $func=='view_salary_info') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="fa icon-cog"></i>
                            <span class="menu-text"> Grade/Class </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'salary_form' ) {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/salary_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add Grade/Class
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'salary_form'|| $func == 'view_salary_info') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_salary_info">
                                    <i class="icon-double-angle-right"></i>
                                    View Grade/Class
                                </a>
                            </li> 
                        </ul>

                    </li>





                    <li  <?php
                    if ($func == 'add_department_form' || $func == 'add_department' || $func == 'view_departments' || $func == 'edit_department') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="fa icon-cog"></i>
                            <span class="menu-text"> Department </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_department_form' || $func == 'add_department') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_department_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add Department
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_departments' || $func=='edit_department') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_departments">
                                    <i class="icon-double-angle-right"></i>
                                    View Departments
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <li  <?php
                    if ($func == 'add_designation_form' || $func == 'add_designation' || $func == 'view_designations' || $func == 'edit_designation') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-pencil"></i>
                            <span class="menu-text"> Designation </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_designation_form' || $func == 'add_designation') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_designation_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add Designation
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_designations' || $func=='edit_designation') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_designations">
                                    <i class="icon-double-angle-right"></i>
                                    View Designations
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <li  <?php
                    if ($func == 'add_company_form' || $func == 'add_company' || $func == 'view_company' || $func == 'edit_company') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-comment"></i>
                            <span class="menu-text"> Company </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_company_form' || $func == 'add_company') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_company_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add Company
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_company' || $func=='edit_company') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_company">
                                    <i class="icon-double-angle-right"></i>
                                    View Company
                                </a>
                            </li>  
                        </ul>

                    </li>


                    <li  <?php
                    if ($func == 'add_city_form' || $func == 'add_city' || $func == 'view_city' || $func == 'edit_city') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-check-minus"></i>
                            <span class="menu-text"> City </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_city_form' || $func == 'add_city') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_city_form">
                                    <i class="icon-double-angle-right"></i>
                                    Add City
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_city' || $func=='edit_city') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_cities">
                                    <i class="icon-double-angle-right"></i>
                                    View City
                                </a>
                            </li>  
                        </ul>

                    </li>


                    <!-------Campus------->

                    <li  <?php
                    if ($func == 'add_campus' || $func == 'view_campus' || $func == 'edit_campus') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-hospital"></i>
                            <span class="menu-text"> Campus </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_campus' || $func == 'save_campus' || $func == 'save_campus') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_campus">
                                    <i class="icon-double-angle-right"></i>
                                    Add Campus
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_campus' || $func=='edit_campus') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_campuses">
                                    <i class="icon-double-angle-right"></i>
                                    View Campus
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <!-------End Campus--------->

                    <!------Grades------->
<!--
                    <li  <?php
                    if ($func == 'add_grade' || $func == 'save_grades' || $func == 'edit_grades') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-user"></i>
                            <span class="menu-text"> Grade </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_grade' || $func == 'save_grades' || $func == 'edit_grades') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_grade">
                                    <i class="icon-double-angle-right"></i>
                                    Add Grade
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_grades') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_grades">
                                    <i class="icon-double-angle-right"></i>
                                    View Grades
                                </a>
                            </li>  
                        </ul>

                    </li>-->

                    <!-------End Grades---------->

                    <!----Bank Details---->

                    <li  <?php
                    if ($func == 'add_bank' || $func == 'save_bank_details' || $func == 'edit_bank' || $func=='get_bank_details') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-home"></i>
                            <span class="menu-text"> Bank Details </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_bank' || $func == 'save_bank_details' ) {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_bank">
                                    <i class="icon-double-angle-right"></i>
                                    Add Bank
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_banks'|| $func == 'edit_bank' || $func=='get_bank_details') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_banks">
                                    <i class="icon-double-angle-right"></i>
                                    View Bank
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <!------End Bank Details------->

                    <!-----Facilities----->
                    <li  <?php
                    if ($func == 'add_facility' || $func == 'save_facility' || $func == 'edit_facility' || $func=='view_facilities' || $func=='get_facility') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-fast-forward"></i>
                            <span class="menu-text"> Facilities </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_facility' || $func == 'save_facility' || $func == 'edit_facility') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_facility">
                                    <i class="icon-double-angle-right"></i>
                                    Add Facility
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_facilities' || $func=='get_facility') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_facilities">
                                    <i class="icon-double-angle-right"></i>
                                    View Facilities
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <!-----End Faciltiy------>

                    <!----Religion----->

                    <li  <?php
                    if ($func == 'add_religion' || $func == 'save_religion' || $func == 'view_religions' || $func == 'edit_religion' || $func=='get_religion') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-retweet"></i>
                            <span class="menu-text"> Religion </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_religion' || $func == 'save_religion' || $func == 'edit_religion') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_religion">
                                    <i class="icon-double-angle-right"></i>
                                    Add Religion
                                </a>
                            </li>  
                            <li <?php
                if ($func == 'view_religions' || $func=='get_religion') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_religions">
                                    <i class="icon-double-angle-right"></i>
                                    View Religions
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <!----End Religion----->


                    <!-----Relationship------>

                    <li  <?php
                    if ($func == 'add_relation' || $func == 'save_relation' || $func == 'view_relations' || $func == 'edit_relations'|| $func=='get_relation') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-group"></i>
                            <span class="menu-text"> Relationship </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_relation' || $func == 'save_relation' || $func == 'edit_relation') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_relation">
                                    <i class="icon-double-angle-right"></i>
                                    Add Relation
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_relations'||$func=='get_relation') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_relations">
                                    <i class="icon-double-angle-right"></i>
                                    View Relations
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <!-----End Relationship------>


                    <!-----Documents---->
                    <li  <?php
                    if ($func == 'add_document' || $func == 'save_document' || $func == 'view_documents' || $func == 'edit_documents'|| $func=='get_document') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-file-text"></i>
                            <span class="menu-text"> Documents </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_document' || $func == 'save_document' || $func == 'edit_document') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_document">
                                    <i class="icon-double-angle-right"></i>
                                    Add Document
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_documents' || $func=='get_document') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_documents">
                                    <i class="icon-double-angle-right"></i>
                                    View Documents
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <!-----End Documents---->


                    <!-----Countries------->

                    <li  <?php
                    if ($func == 'add_country' || $func == 'save_country' || $func == 'view_countries' || $func == 'edit_country'|| $func=='get_country') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-sitemap"></i>
                            <span class="menu-text"> Country </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_country' || $func == 'save_country' || $func == 'edit_country') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_country">
                                    <i class="icon-double-angle-right"></i>
                                    Add Country
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_countries' || $func=='get_country') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_countries">
                                    <i class="icon-double-angle-right"></i>
                                    View Countries
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <!-----End Countries------->


                    <!---------Salary Type---------->

                    <li  <?php
                    if ($func == 'add_salary_type' || $func == 'save_salary_type' || $func == 'view_salary_types' || $func == 'edit_salary_type') {
                        echo 'class="active open"';
                    }
                    ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-money"></i>
                            <span class="menu-text"> Salary Type </span>

                            <b class="arrow icon-angle-down"></b>
                        </a>

                        <ul class="submenu">
                            <li <?php
                            if ($func == 'add_salary_type' || $func == 'save_salary_type' || $func == 'edit_salary_type') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/add_salary_type">
                                    <i class="icon-double-angle-right"></i>
                                    Add Salary Type
                                </a>
                            </li>  
                            <li <?php
                            if ($func == 'view_salary_types') {
                                echo 'class="active"';
                            }
                            ?>>
                                <a href="<?php echo base_url(); ?>hris/view_salary_types">
                                    <i class="icon-double-angle-right"></i>
                                    View Salary Types
                                </a>
                            </li>  
                        </ul>

                    </li>

                    <!---------End Salary Type---------->

                    <!--------------Employee Login---------------------------->


                    <!--------------End Employee Login---------------------------->
                    <!--------------Employee Login---------------------------->


                    <!--------------End Employee Login---------------------------->
                <?php } ?>






            </ul>    

        </li>


    </ul><!--/.nav-list-->


    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left"></i>
    </div>
</div>
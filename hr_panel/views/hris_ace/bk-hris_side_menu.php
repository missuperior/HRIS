
 <?php $cont  =  $this->uri->segment(1); ?>
 <?php $func  =  $this->uri->segment(2); ?>

<div class="sidebar" id="sidebar">


  <ul class="nav nav-list">
    <li  <?php  if($func == 'dashboard'){echo 'class="active"';} ?> id="li_dashboard">
      <a href="<?php echo base_url(); ?>hris/dashboard">
        <i class="icon-dashboard"></i>
        <span class="menu-text"> Dashboard </span>
      </a>
    </li>

    
    
    
    
    <li  <?php  if($func == 'add_employee_form' || $func == 'view_employees' || $func == 'report_employee' || $func == 'edit_employee' || $func == 'add_employee_record' || $func == 'update_employee' || $func == 'increment_employee' || $func == 'deduction_employee' || $func == 'payroll_employee' || $func == 'employee_by_department' || $func=='add_visitor_form' || $func=='view_visitors'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-group"></i>
        <span class="menu-text"> Employee Management </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_employee_form'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_employee_form">
            <i class="icon-double-angle-right"></i>
            Add Employee
          </a>
        </li>  
        <li <?php  if($func == 'view_employees'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_employees">
            <i class="icon-double-angle-right"></i>
            View Employees
          </a>
        </li> 
        <li <?php  if($func == 'add_visitor_form'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_visitor_form">
            <i class="icon-double-angle-right"></i>
            Add Visitor
          </a>
        </li>         
        <li <?php  if($func == 'report_employee'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/report_employee">
            <i class="icon-double-angle-right"></i>
            Report
          </a>
        </li> 
        
        <li <?php  if($func == 'search_salary'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/search_salary">
            <i class="icon-double-angle-right"></i>
            E Slips
          </a>
        </li> 
        
        <li <?php  if($func == 'payroll_employee'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/payroll_employee">
            <i class="icon-double-angle-right"></i>
            Payroll
          </a>
        </li> 
        
        <li <?php  if($func == 'faculty_members'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/faculty_members">
            <i class="icon-double-angle-right"></i>
            Faculty Members
          </a>
        </li> 
        
      </ul>    
      
    </li>
    
    <li  <?php  if($func == 'department_date_wise_report'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-check"></i>
        <span class="menu-text"> Attendance </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        
        <li <?php  if($func == 'department_date_wise_report'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>attendance/department_date_wise_report">
            <i class="icon-double-angle-right"></i>
            View Attendance
          </a>
        </li> 
             
<!--        <li <?php  if($func == 'report_employee'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/report_employee">
            <i class="icon-double-angle-right"></i>
            
          </a>
        </li> -->
        
   
        
      </ul>    
      
    </li>
    
        <li  <?php  if($func == 'add_shift' || $func=='view_shift' || $func=='emp_shift'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-calendar"></i>
        <span class="menu-text"> Shift Management </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        
        <li <?php  if($func == 'add_shift'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>attendance/add_shift">
            <i class="icon-double-angle-right"></i>
            Add Shift
          </a>
        </li> 
          <li <?php  if($func == 'view_shift'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>attendance/view_shift">
            <i class="icon-double-angle-right"></i>
            View Shift
          </a>
        </li> 
             
        <li <?php  if($func == 'emp_shift'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>attendance/emp_shift">
            <i class="icon-double-angle-right"></i>
           Employee-Shift
          </a>
        </li> 
        
   
        
      </ul>    
      
    </li>
    
    
    
    
    
    <?php if($this->session->userdata('account_role_id') == 2){ ?>
    
    <li  <?php  if($func == 'add_department_form' || $func == 'add_department'|| $func == 'view_departments'|| $func == 'edit_department'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="fa icon-cog"></i>
        <span class="menu-text"> Department </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_department_form' || $func == 'add_department'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_department_form">
            <i class="icon-double-angle-right"></i>
            Add Department
          </a>
        </li>  
        <li <?php  if($func == 'view_departments'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_departments">
            <i class="icon-double-angle-right"></i>
            View Departments
          </a>
        </li>  
      </ul>
      
    </li>
        
    <li  <?php  if($func == 'add_designation_form' || $func == 'add_designation'|| $func == 'view_designations'|| $func == 'edit_designation'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-pencil"></i>
        <span class="menu-text"> Designation </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_designation_form' || $func == 'add_designation'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_designation_form">
            <i class="icon-double-angle-right"></i>
            Add Designation
          </a>
        </li>  
        <li <?php  if($func == 'view_designations'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_designations">
            <i class="icon-double-angle-right"></i>
            View Designations
          </a>
        </li>  
      </ul>
      
    </li>
    
    <li  <?php  if($func == 'add_company_form' || $func == 'add_company'|| $func == 'view_company'|| $func == 'edit_company'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-comment"></i>
        <span class="menu-text"> Company </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_company_form' || $func == 'add_company'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_company_form">
            <i class="icon-double-angle-right"></i>
            Add Company
          </a>
        </li>  
        <li <?php  if($func == 'view_company'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_company">
            <i class="icon-double-angle-right"></i>
            View Company
          </a>
        </li>  
      </ul>
      
    </li>
    
    
    <li  <?php  if($func == 'add_city_form' || $func == 'add_city'|| $func == 'view_city'|| $func == 'edit_city'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-check-minus"></i>
        <span class="menu-text"> City </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_city_form' || $func == 'add_city'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_city_form">
            <i class="icon-double-angle-right"></i>
            Add City
          </a>
        </li>  
        <li <?php  if($func == 'view_city'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_cities">
            <i class="icon-double-angle-right"></i>
            View City
          </a>
        </li>  
      </ul>
      
    </li>
    
    
    <!-------Campus------->
    
    <li  <?php  if($func == 'add_campus' || $func == 'view_campus'|| $func == 'edit_campus'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-hospital"></i>
        <span class="menu-text"> Campus </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_campus' || $func == 'save_campus' || $func == 'save_campus'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_campus">
            <i class="icon-double-angle-right"></i>
            Add Campus
          </a>
        </li>  
        <li <?php  if($func == 'view_campus'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_campuses">
            <i class="icon-double-angle-right"></i>
            View Campus
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!-------End Campus--------->
    
    <!------Grades------->
    
    <li  <?php  if($func == 'add_grade' || $func == 'save_grades'|| $func == 'edit_grades'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-user"></i>
        <span class="menu-text"> Grade </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_grade' || $func == 'save_grades' || $func == 'edit_grades'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_grade">
            <i class="icon-double-angle-right"></i>
            Add Grade
          </a>
        </li>  
        <li <?php  if($func == 'view_grades'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_grades">
            <i class="icon-double-angle-right"></i>
            View Grades
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!-------End Grades---------->
    
    <!----Bank Details---->
    
    <li  <?php  if($func == 'add_bank' || $func == 'save_bank_details'|| $func == 'edit_bank'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-home"></i>
        <span class="menu-text"> Bank Details </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_bank' || $func == 'save_bank_details' || $func == 'edit_bank'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_bank">
            <i class="icon-double-angle-right"></i>
            Add Bank
          </a>
        </li>  
        <li <?php  if($func == 'view_banks'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_banks">
            <i class="icon-double-angle-right"></i>
            View Bank
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!------End Bank Details------->
    
    <!-----Facilities----->
    <li  <?php  if($func == 'add_facility' || $func == 'save_facility'|| $func == 'edit_facility'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-fast-forward"></i>
        <span class="menu-text"> Facilities </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_facility' || $func == 'save_facility' || $func == 'edit_facility'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_facility">
            <i class="icon-double-angle-right"></i>
            Add Facility
          </a>
        </li>  
        <li <?php  if($func == 'view_facilities'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_facilities">
            <i class="icon-double-angle-right"></i>
            View Facilities
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!-----End Faciltiy------>
    
    <!----Religion----->
    
    <li  <?php  if($func == 'add_religion' || $func == 'save_religion'|| $func == 'view_religions' || $func == 'edit_religion'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-retweet"></i>
        <span class="menu-text"> Religion </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_religion' || $func == 'save_religion' ||  $func == 'edit_religion'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_religion">
            <i class="icon-double-angle-right"></i>
            Add Religion
          </a>
        </li>  
        <li <?php  if($func == 'view_religions'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_religions">
            <i class="icon-double-angle-right"></i>
            View Religions
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!----End Religion----->
    
    
    <!-----Relationship------>
    
    <li  <?php  if($func == 'add_relation' || $func == 'save_relation'|| $func == 'view_relations' || $func == 'edit_relations'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-group"></i>
        <span class="menu-text"> Relationship </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_relation' || $func == 'save_relation' ||  $func == 'edit_relation'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_relation">
            <i class="icon-double-angle-right"></i>
            Add Relation
          </a>
        </li>  
        <li <?php  if($func == 'view_relations'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_relations">
            <i class="icon-double-angle-right"></i>
            View Relations
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!-----End Relationship------>
    
    
    <!-----Documents---->
        <li  <?php  if($func == 'add_document' || $func == 'save_document'|| $func == 'view_documents' || $func == 'edit_documents'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-file-text"></i>
        <span class="menu-text"> Documents </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_document' || $func == 'save_document' ||  $func == 'edit_document'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_document">
            <i class="icon-double-angle-right"></i>
            Add Document
          </a>
        </li>  
        <li <?php  if($func == 'view_documents'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_documents">
            <i class="icon-double-angle-right"></i>
            View Documents
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!-----End Documents---->
    
    
    <!-----Countries------->
    
    <li  <?php  if($func == 'add_country' || $func == 'save_country'|| $func == 'view_countries' || $func == 'edit_country'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-sitemap"></i>
        <span class="menu-text"> Country </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_country' || $func == 'save_country' ||  $func == 'edit_country'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_country">
            <i class="icon-double-angle-right"></i>
            Add Country
          </a>
        </li>  
        <li <?php  if($func == 'view_countries'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_countries">
            <i class="icon-double-angle-right"></i>
            View Countries
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!-----End Countries------->
    
    
    <!---------Salary Type---------->
    
    <li  <?php  if($func == 'add_salary_type' || $func == 'save_salary_type'|| $func == 'view_salary_types' || $func == 'edit_salary_type'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-money"></i>
        <span class="menu-text"> Salary Type </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'add_salary_type' || $func == 'save_salary_type' ||  $func == 'edit_salary_type'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/add_salary_type">
            <i class="icon-double-angle-right"></i>
            Add Salary Type
          </a>
        </li>  
        <li <?php  if($func == 'view_salary_types'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_salary_types">
            <i class="icon-double-angle-right"></i>
            View Salary Types
          </a>
        </li>  
      </ul>
      
    </li>
    
    <!---------End Salary Type---------->
    
    <!--------------Employee Login---------------------------->
    
        <li  <?php  if($func == 'generate_logins' || $func == 'save_logins'|| $func == 'view_employee_logins' || $func == 'edit_employee_logins'){echo 'class="active open"';} ?>>
      <a href="#" class="dropdown-toggle">
        <i class="icon-signin"></i>
        <span class="menu-text"> Employee Logins </span>

        <b class="arrow icon-angle-down"></b>
      </a>
      
      <ul class="submenu">
        <li <?php  if($func == 'generate_logins' || $func == 'save_logins' ||  $func == 'edit_employee_logins'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/generate_logins">
            <i class="icon-double-angle-right"></i>
            Generate Logins
          </a>
        </li>  
<!--        <li <?php  if($func == 'view_employee_logins'){echo 'class="active"';} ?>>
          <a href="<?php echo base_url(); ?>hris/view_employee_logins">
            <i class="icon-double-angle-right"></i>
            View Employee Logins
          </a>
        </li>  -->
      </ul>
      
    </li>
    <!--------------End Employee Login---------------------------->
    
    <?php } ?>


  </ul>
</li>
</ul><!--/.nav-list-->


<div class="sidebar-collapse" id="sidebar-collapse">
  <i class="icon-double-angle-left"></i>
</div>
</div>
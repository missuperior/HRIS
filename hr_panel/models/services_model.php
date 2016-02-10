<?php

class Services_model extends CI_Model {

    function get_employee($employee_id)
    {
        $query = $this->db->query("select emp_code as employeecode , employee_name as employeename ,date_of_birth as employeedob,company_name as employeecompany,
department_name as employeedepartment from 
hr_employee_record 
INNER JOIN hr_employee_contact on hr_employee_contact.emp_id = hr_employee_record.emp_id
INNER JOIN hr_company on  hr_company.company_id =  hr_employee_record.record_company_name
INNER JOIN hr_departments on hr_departments.department_id = hr_employee_record.department_id
INNER JOIN emp_gen_details on emp_gen_details.emp_id = hr_employee_record.emp_id
where hr_employee_record.emp_id =$employee_id");
       
        return $query->result_array();
    }
    
    
    function employee_info_maker()
    {
         $query = $this->db->query("select hr_employee_record.emp_id as id ,hr_employee_record.campus_id as campusid, hr_employee_record.department_id as departmentid, hr_employee_record.record_company_name as companyid ,hr_designations.designation_title as designation ,emp_code as employeecode , employee_name as employeename ,date_of_birth as employeedob,company_name as employeecompany,
department_name as employeedepartment ,emp_picture as picture from 
hr_employee_record 
INNER JOIN hr_employee_contact on hr_employee_contact.emp_id = hr_employee_record.emp_id
INNER JOIN hr_company on  hr_company.company_id =  hr_employee_record.record_company_name
INNER JOIN hr_departments on hr_departments.department_id = hr_employee_record.department_id
INNER JOIN emp_gen_details on emp_gen_details.emp_id = hr_employee_record.emp_id
INNER JOIN hr_designations on hr_designations.designation_id = hr_employee_record.designation_id
");
       
        return $query->result_array();
    }
    function add_employee_detail($emp_data)
    {
         $query = $this->db->insert('employee_info', $emp_data); 
		
        return $this->db->insert_id();
    }
    function get_emp($id)
    {
         $query = $this->db->get_where('employee_info', $id);
		
        return $query->result_array();
    }
}
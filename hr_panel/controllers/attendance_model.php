<?php

class Attendance_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
 function getRawAttendance($date,$emp){
     $query = $this->db->query("select distinct emp_gen_details.emp_id,emp_gen_details.emp_code,emp_gen_details.employee_name ,emp_shift,shift.*,attendance.CheckTime,hr_employee_record.campus_id,hr_employee_record.department_id"
             . " from emp_gen_details"
             . " Inner join attendance on emp_gen_details.emp_code = attendance.Userid  "
             . " Inner join hr_employee_record on emp_gen_details.emp_id = hr_employee_record.emp_id"
             . " Inner join shift on emp_gen_details.emp_shift = shift.shiftId"
             . " where attendance.CheckTime like '$date%'"
             . " and emp_gen_details.emp_id ='$emp' "
             . " order by hr_employee_record.campus_id,hr_employee_record.department_id"
             
             );
    
  return $query->result_array();
   
 }
 
 function getEmployeeCheckTime($emp_id,$Checktype,$date){
   
  
    $query = $this->db->query(" select CheckTime from attendance "
            . " Inner join emp_gen_details on emp_gen_details.emp_code = attendance.Userid"
            . " where checkType = '$Checktype' and emp_gen_details.emp_id = '$emp_id' and CheckTime like '$date%'"
             
             );
    
  return $query->result_array();
   
 }
 
 function getEmployeeShift($emp_id){
    $query = $this->db->query(" select shift.* from emp_gen_details"
            . " Inner join shift on emp_gen_details.emp_shift = shift.shiftId"
            . " where emp_gen_details.emp_id = $emp_id "
            
             
             );
    
  return $query->result_array();
   
 }
 
 function setEmployeeAttendanseStatus($ins_data){
   return  $this->db->insert_batch('hr_attendance', $ins_data);
    //return $this->db->insert_id();
 }
    
 function updateAbsentEmployee($campus,$date){
 

   
    $query = $this->db->query("select distinct emp_gen_details.emp_id,emp_gen_details.emp_code,emp_gen_details.employee_name ,emp_shift,shift.*,attendance.CheckTime,hr_employee_record.campus_id,hr_employee_record.department_id"
             . " from emp_gen_details"
             . " Inner join attendance on emp_gen_details.emp_code <> attendance.Userid  "
             . " Inner join hr_employee_record on emp_gen_details.emp_id = hr_employee_record.emp_id"
             . " Inner join shift on emp_gen_details.emp_shift = shift.shiftId"
             . " where attendance.CheckTime = '$date' "
            . " and hr_employee_record.campus_id = $campus"
             . " order by hr_employee_record.campus_id,hr_employee_record.department_id"
             
             );
    return $query->result_array();
 }
 
 function getAllemployees(){
    $query = $this->db->query(" select distinct emp_gen_details.emp_id,emp_gen_details.emp_code,emp_gen_details.employee_name,hr_employee_record.record_company_name,hr_employee_record.department_id  from emp_gen_details
 Inner join hr_employee_record on emp_gen_details.emp_id = hr_employee_record.emp_id 
order by hr_employee_record.campus_id,hr_employee_record.department_id"
             
             );
    return $query->result_array();
  
 }
 
 
 function getEmployeeAttendanse($dept_id,$comp_id){
     $query = $this->db->query(" select hr_attendance.remarks,hr_attendance.checkIn,hr_attendance.checkOut,emp_gen_details.emp_id,emp_gen_details.emp_code,emp_gen_details.employee_name ,hr_attendance.datetime"
             . " from hr_attendance"
             . " Inner join emp_gen_details on emp_gen_details.emp_id = hr_attendance.emp_id "
             . " where hr_attendance.campus_id = $comp_id and hr_attendance.department_id = $dept_id "
             . " order by hr_attendance.datetime"
             
             );
    return $query->result_array();
 }
 
 
}
<?php

class Attendance_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getRawAttendance($date, $emp) {
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

    function getRawAttendanceMarking($date, $emp) {

        
        $query = $this->db->query("select distinct emp_gen_details.emp_id "
                . " from emp_gen_details"
                . " Inner join AttenMarkingNeo on emp_gen_details.emp_code = AttenMarkingNeo.EmpCode  "
                . " where AttenMarkingNeo.AttenTime like '$date%'"
                . " and emp_gen_details.emp_id ='$emp' "
        );

        return $query->result_array();
    }

    function getEmployeeCheckTime($emp_id, $Checktype, $date) {


        $date_check = '';


        if ($Checktype == "IN") {
            $date_check = ' order by AttenTime ASC';
            $Checktype = ' AttenType = "' . $Checktype . '"';
        }
        if ($Checktype == "OUT") {
            $date_check = ' order by AttenTime DESC';
            $Checktype = ' AttenType IN("OUT","2")';
        }


        $query = $this->db->query(" select AttenTime ,shift_id from attenmarkingneo"
                . " Inner join emp_gen_details on emp_gen_details.emp_code = attenmarkingneo.EmpCode"
                . " Inner join hr_employee_record on hr_employee_record.emp_id = emp_gen_details.emp_id"
                . " where $Checktype and hr_employee_record.emp_id = '$emp_id' and AttenTime like '$date%'"
                . "  $date_check limit 1"
        );



//         $query = $this->db->query(" select AttenTime ,shift_id from attenmarkingneo"
//            . " Inner join emp_gen_details on emp_gen_details.emp_code = attenmarkingneo.EmpCode"
//            . " Inner join hr_employee_record on hr_employee_record.emp_id = emp_gen_details.emp_id"
//            . " where hr_employee_record.emp_id = '$emp_id' and AttenTime like '$date%'"
//            . "  $date_check limit 1"
//    );

        return $query->result_array();
    }

//    function getEmployeeShift($emp_id) {
//        $query = $this->db->query(" select shift.* from emp_gen_details"
//                . " Inner join shift on emp_gen_details.emp_shift = shift.shiftId"
//                . " where emp_gen_details.emp_id = $emp_id "
//        );
//
//        return $query->result_array();
//    }

    function setEmployeeAttendanseStatus($ins_data) {

        return $this->db->insert_batch('hr_attendance', $ins_data);
        //echo $this->db->last_query(); die;
        //return $this->db->insert_id();
    }

    function setEmployeeAbsent($ins_data) {

        return $this->db->insert_batch('emp_leaves', $ins_data);
        //echo $this->db->last_query(); die;
        //return $this->db->insert_id();
    }

    function updateAbsentEmployee($campus, $date) {



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

    function getAllemployees($emp_id = '') {
        if ($emp_id) {
            $query = $this->db->query(" select distinct emp_gen_details.emp_id,emp_gen_details.emp_code,emp_gen_details.employee_name,hr_employee_record.record_company_name,hr_employee_record.department_id,hr_employee_record.shift_id  
        ,shift.off_days

from emp_gen_details
 Inner join hr_employee_record on emp_gen_details.emp_id = hr_employee_record.emp_id 
 Inner join attenmarkingneo on attenmarkingneo.EmpCode = emp_gen_details.emp_code
 Inner join shift on shift.shiftId = hr_employee_record.shift_id
 where hr_employee_record.record_company_name = 35 AND hr_employee_record.shift_id >0 and emp_gen_details.emp_id = $emp_id
order by hr_employee_record.record_company_name,hr_employee_record.department_id

"
            );
        } else {
            $query = $this->db->query(" select distinct emp_gen_details.emp_id,emp_gen_details.emp_code,emp_gen_details.employee_name,hr_employee_record.record_company_name,hr_employee_record.department_id,hr_employee_record.shift_id  
        ,shift.off_days

from emp_gen_details
 Inner join hr_employee_record on emp_gen_details.emp_id = hr_employee_record.emp_id 
 Inner join attenmarkingneo on attenmarkingneo.EmpCode = emp_gen_details.emp_code
 Inner join shift on shift.shiftId = hr_employee_record.shift_id
 where hr_employee_record.record_company_name = 35 AND hr_employee_record.shift_id >0
order by hr_employee_record.record_company_name,hr_employee_record.department_id

"
            );
        }


        return $query->result_array();
    }

    function getEmployeeAttendanse($dept_id, $comp_id, $date, $date2) {
        $query = $this->db->query(" select hr_attendance.remarks,hr_attendance.checkIn,hr_attendance.checkOut,emp_gen_details.emp_id,emp_gen_details.emp_code,emp_gen_details.employee_name ,hr_attendance.datetime"
                . " from hr_attendance"
                . " Inner join emp_gen_details on emp_gen_details.emp_id = hr_attendance.emp_id "
                . " where hr_attendance.campus_id = $comp_id and hr_attendance.department_id = $dept_id "
                . " and DATE_FORMAT(hr_attendance.datetime, '%Y-%m-%d') BETWEEN '$date' AND '$date2'  "
                . " order by hr_attendance.datetime"
        );
        return $query->result_array();
        //echo $this->db->last_query(); die;
    }

    function saveShift($data) {
        $query = $this->db->insert('shift', $data);

        return $this->db->insert_id();
    }

    function getShift() {
        $this->db->order_by('shiftId', 'ASC');
        $query = $this->db->get('shift');

        return $query->result_array();
    }

    function getShiftById($id) {
        $this->db->where('shiftId', $id);
        $query = $this->db->get('shift');
        return $query->result_array();
    }

    function saveShiftById($id, $data) {
        $this->db->where('shiftId', $id);
        $query = $this->db->update('shift', $data);
        return $query;
    }

    function deleteShiftById($id) {
        return $this->db->delete('shift', array('shiftId' => $id));
    }

    function deleteBenefitById($id) {
        return $this->db->delete('shift', array('shiftId' => $id));
    }

    function EmployeeShift($emp_ids, $shift_id) {
        $this->db->where('emp_id', $emp_ids);
        return $this->db->update('hr_employee_record', $shift_id);
    }

    function searchEmpsal($dept_id, $comp_id) {
       
       $sql =  "SELECT `hr_employee_record`.*, `hr_departments`.*, `hr_designations`.*, `campus`.*,shift.title as shift, 
`emp_gen_details`.*, `hr_employee_contact`.* FROM (`hr_employee_record`) 
LEFT JOIN `hr_departments` ON `hr_employee_record`.`department_id` = `hr_departments`.`department_id` 
LEFT JOIN `hr_designations` ON `hr_employee_record`.`designation_id` = `hr_designations`.`designation_id` 
LEFT JOIN `hr_employee_contact` ON `hr_employee_record`.`emp_id` = `hr_employee_contact`.`emp_id` 
LEFT JOIN `campus` ON `hr_employee_record`.`campus_id` = `campus`.`campus_id` 
LEFT JOIN `emp_gen_details` ON `hr_employee_record`.`emp_id` = `emp_gen_details`.`emp_id` 
LEFT JOIN shift ON hr_employee_record.shift_id = shift.shiftId
WHERE hr_employee_record.department_id = '$dept_id' AND hr_employee_record.record_company_name = '$comp_id'";
        $query = $this->db->query($sql);
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function searchEmpAttendance($dept_id, $comp_id) {
        $sql = "SELECT `hr_employee_record`.*, `hr_departments`.*, `hr_designations`.*, `campus`.*, 
`emp_gen_details`.*, `hr_employee_contact`.* FROM (`hr_employee_record`) 
LEFT JOIN `hr_departments` ON `hr_employee_record`.`department_id` = `hr_departments`.`department_id` 
LEFT JOIN `hr_designations` ON `hr_employee_record`.`designation_id` = `hr_designations`.`designation_id` 
LEFT JOIN `hr_employee_contact` ON `hr_employee_record`.`emp_id` = `hr_employee_contact`.`emp_id` 
LEFT JOIN `campus` ON `hr_employee_record`.`campus_id` = `campus`.`campus_id` 
LEFT JOIN `emp_gen_details` ON `hr_employee_record`.`emp_id` = `emp_gen_details`.`emp_id` 
WHERE hr_employee_record.department_id = '$dept_id' AND hr_employee_record.record_company_name = '$comp_id' AND  hr_employee_record.shift_id IS NOT NULL";
        $query = $this->db->query($sql);
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }

    function add_absent($data) {
        return $this->db->insert_batch('emp_leaves', $data);

//         $query = $this->db->insert_batch('emp_leaves', $data);
//
//        return $this->db->insert_id();
    }

    function getEmployeeAbsentRecord($emp_id, $date) {

 
        $sql = "select * from emp_leaves "
                . ""
                . "where emp_id = $emp_id and DATE_FORMAT(date, '%m/%d/%Y') = '$date'";
        $query = $this->db->query($sql);
//        $this->db->where(array('emp_id' => $emp_id, 'date' => $date));
//        
//        $query = $this->db->get('emp_leaves');
        return $query->result_array();
    }

    function deleteAbsent($emp_id, $date) {

        return $this->db->delete('emp_leaves', array('emp_id' => $emp_id, 'date' => $date));
    }

    function getEmployeeAttendanceRecord($emp_id, $date) {


        $sql = "select * from hr_attendance "
                . ""
                . "where emp_id = $emp_id and DATE_FORMAT(datetime, '%Y-%m-%d') = '$date'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
  function getEmployeeShift($emp_id) {
   
      
        $query = $this->db->query("SELECT shift.*  from shift
            Inner join hr_employee_record on  hr_employee_record.shift_id = shift.shiftId
                                    where emp_id = $emp_id");

        return $query->result_array();
    }
    
    
       function updateAttendance($id, $data) {
        $this->db->where('id', $id);
        $query = $this->db->update('hr_attendance', $data);
        
      //  echo $this->db->last_query(); die;
        return $query;
    }
    function Employeebycode($code, $company)
  {
     $sql = "SELECT emp_gen_details.emp_id,emp_gen_details.employee_name, emp_gen_details.emp_code, hr_departments.department_name, hr_designations.designation_title
FROM hr_employee_record
INNER JOIN emp_gen_details ON emp_gen_details.emp_id = hr_employee_record.emp_id
INNER JOIN hr_departments ON hr_departments.department_id = hr_employee_record.department_id
INNER JOIN hr_designations ON hr_designations.designation_id = hr_employee_record.designation_id
WHERE emp_gen_details.emp_code = '$code' AND hr_employee_record.record_company_name = $company";
        $query = $this->db->query($sql);
        //echo $this->db->last_query(); die;
        return $query->result_array();  
  }
    
   function EmployeeYearlyReport($department, $emp_code, $year, $company) {
        
        $dep_sql = '';
        if($department){
            $dep_sql = ' and hr_employee_record.department_id = '.$department;
        }
        $emp_sql = '';
        if($emp_code){
            $emp_sql = ' and emp_gen_details.emp_code = '.$emp_code;
        }
    
     
        $sql = "SELECT emp_gen_details.employee_name, emp_gen_details.emp_code,emp_leaves.emp_id,leavetype,count(emp_leaves.emp_id)as totalLeaves FROM emp_leaves
inner join  leave_type on leave_type.leaveid = emp_leaves.leave_type
INNER JOIN hr_employee_record ON hr_employee_record.emp_id = emp_leaves.emp_id
INNER JOIN emp_gen_details ON emp_gen_details.emp_id = emp_leaves.emp_id
 WHERE hr_employee_record.record_company_name = 35 and emp_leaves.date like '$year%' $dep_sql $emp_sql
group by emp_leaves.emp_id,`leave_type`
order by hr_employee_record.department_id,emp_leaves.emp_id
";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
     function getEmployeeLeaves($s_date, $e_date,$company_id){
         $query = $this->db->query("SELECT hris_logins.hris_username,department_name,emp_leaves.date,leave_type.leavetype,emp_gen_details.employee_name,emp_gen_details.emp_code  from emp_leaves
            Inner join hr_employee_record on hr_employee_record.emp_id = emp_leaves.emp_id
            Inner join emp_gen_details on emp_gen_details.emp_id = hr_employee_record.emp_id
            Inner join leave_type on leave_type.leaveid = emp_leaves.leave_type
            Inner join hris_logins on hris_logins.hris_login_id = emp_leaves.leave_by
            Inner join hr_departments on hr_departments.department_id = hr_employee_record.department_id
            where hr_employee_record.record_company_name = $company_id"
           . " and DATE_FORMAT(emp_leaves.date, '%Y-%m-%d') BETWEEN '$s_date' AND '$e_date'");
            

        return $query->result_array();
  }
    
}

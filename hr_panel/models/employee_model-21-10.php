<?php

class Employee_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    // HRIS Login     
    function get_logins_check($email, $password)
    {
        $query = $this->db->query("select * from employee_logins where email = '$email' and password = '$password'");
        $this->db->last_query();
        return $query->row();
    }
    
    
    public function insert_emp_pic($emp_id, $imagePath){
           $data = array(
               'emp_id' => $emp_id,
               'emp_temp_pic' => $imagePath,
               'status' => '0'
           );
           
           $query = $this->db->insert_string("emp_temp_pics", $data);
           //echo $query;
           $this->db->query($query);
       }
       
       
  
   
   public function get_temp_pic($emp_id){
       $query = $this->db->query("select emp_picture from hr_employee_contact where emp_id = '$emp_id'");
       
       return $query->result_array();
   }
    
    
}

?>
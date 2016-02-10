<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Services extends CI_Controller {

  public function __construct() {

    parent::__construct();
$this->load->model('Services_model');
   $this->load->model('Hris_model');
  }
   public function login_check() {

    if ($this->session->userdata('hris_id') == '' && $this->session->userdata('hris_username') == '') {
      redirect('hris/index');
    }
  }
  function employee_ger_info()
  {
     $employee_id = $this->input->get_post('emp_id');
     $employee_record = $this->Services_model->get_employee($employee_id);
      echo json_encode($employee_record);     
  }
  function employee_info()
  {
       $employee_record = $this->Services_model->employee_info_maker();
    
   foreach($employee_record as $row)
            {
            
             $path = base_url(). $row[picture];
             $str = file_get_contents($path);
             
             $emp_data = array(
                 
                 'emp_id' => $row[id] ,
                 'emp_name' => $row[employeename] ,
                 'emp_designation'=> $row[designation] ,
                 'emp_department'=> $row[employeedepartment] ,
                 'emp_picture'=> $str ,
                 'emp_campusid'=> $row[campusid] ,
                 'emp_companyid'=> $row[companyid] ,
                 'emp_code'=>  $row[employeecode] ,
                 );
             
             
         echo $id =  $this->Services_model->add_employee_detail($emp_data);
            }   
   }
   function get_employee_info()
   {
       $id =array(
           'emp_p_id'=> 1
       );
     $emp =$this->Services_model->get_emp($id);
    // print_r($emp);
     echo $emp[0][emp_p_id];
     echo $emp[0][emp_name];
     $str= $emp[0][emp_picture];

     
     if (!$str) {echo 'Could not read file.';}
$im = imagecreatefromstring($str);
if ($im) {
    header('Content-Type: image/jpeg');
    imagejpeg($im);
    imagedestroy($im);
}
else {echo 'An error occurred.';}
   }
   
    function cvsimport()
    {
          $this->login_check();
        $this->load->view('hris/cvsview');
    }
}
<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Vacancy extends CI_Controller {

  public function __construct() {

    parent::__construct();
    $this->load->model('Hris_vacancy');
     $this->load->model('Hris_model');
    $this->load->library('session');
     // for form validation
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
  }
  
   // for verification of hris login

  public function login_check() {

    if ($this->session->userdata('hris_id') == '' && $this->session->userdata('hris_username') == '') {
      redirect('hris/index');
    }
  }

  // hris login 

  // create vecancy 
  function create_vacancy()
  {
     $this->login_check();
        $result['cities']     = $this->Hris_model->getAllcities();
        $result['department'] = $this->Hris_model->getAllDepartments();
        $result['campus']     = $this->Hris_model->getAllCampuses();
        $result['company']    = $this->Hris_model->getAllCompany();
        $result['designation'] = $this->Hris_model->getAllDesignations();
        $result['degree'] = $this->Hris_vacancy->getAllDegree();
        
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/vacancy/new_vacancy',$result);
        $this->load->view('hris_ace/hris_footer');
  }
   
  // get Designations by Department
  public function desigantion_by_department_id() {
    
   $this->login_check();    
    $department_id = $this->input->get('dept_id');
    $result['designations'] = $this->Hris_vacancy->DepartmentDesignations($department_id);  
    $res = $result['designations']; 
        
    if(!empty($res))
    {
      $this->load->view('hris/vacancy/department_designations', $result);
    }
    else
    {
      echo "No Designation";
    }
  }
  // get  Department by company
  function department_by_company_id()
  {
      $this->login_check();
    $company_id = $this->input->get('com_id');
    $result['department'] = $this->Hris_vacancy->CompanyDepartment($company_id);  
    $res = $result['department']; 
   if(!empty($res))
    {
      $this->load->view('hris/vacancy/company_department', $result);
    }
    else
    {
      echo "No Designation";
    }
  }
  //add vacancy data
  function add_vacancy_record()
  {
      $this->login_check();
      $vacancy = array(
          'company_id' => $this->input->post('record_company') ,
          'department_id' => $this->input->post('record_department') ,
          'designation_id' => $this->input->post('record_designation') ,
          'job_shift' => $this->input->post('shift') ,
           'job_type_time' => $this->input->post('ad_job_type'),
          'min_age' => $this->input->post('record_min_age') ,
          'max_age' => $this->input->post('record_max_age') ,
          'gender' => $this->input->post('gender') ,
          'min_experience' => $this->input->post('record_min_experience') ,
          'max_experience' => $this->input->post('record_max_experience') ,
          'min_dgree' => $this->input->post('min_degree') ,
          'count_vacancy' => $this->input->post('no_vacancy') ,
          'traveling' => $this->input->post('traveling-Required') ,
          'min_salery' => $this->input->post('min_salary') ,
          'max_salery' => $this->input->post('max_salary') ,
          'salery_visible' => $this->input->post('visible') ,
          'city_id' => $this->input->post('vc_city') ,
          's_date' => $this->input->post('start_date') ,
           'e_date' => $this->input->post('end_date') ,
           'vecancy_detail' => $this->input->post('job_description') ,
           'vecancy_status' => '1' ,
          
         );
      $vacancy = $this->Hris_vacancy->add_vacancy($vacancy);
      if($vacancy >0){
          $this->session->set_userdata( array(
                'error_msg'    => '<h4>Success!</h4>Your vacancy has been added'
                    ));
          redirect('vacancy/create_vacancy');
      }
  }
  //View All vacancy data 
  function view_vacancy()
  {
      $this->login_check();
    $result['vacancy'] = $this->Hris_vacancy->get_vacancy();
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/vacancy/view_vacancy', $result);
    $this->load->view('hris_ace/hris_footer');      
   }
   //View vacancy data by vacancy id 
   function full_vacancy_view()
   {
    $this->login_check();
    $vacancy_id = $this->uri->segment(3);
    $result['vacancybyid'] = $this->Hris_vacancy->get_vacancy_by_id($vacancy_id);
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/vacancy/vacancy_detailview', $result);
    $this->load->view('hris_ace/hris_footer'); 
   }
   function update_vacancy_form()
   {
    $this->login_check();
    $vacancy_id = $this->uri->segment(3);
            $result['cities']     = $this->Hris_model->getAllcities();
            $result['department'] = $this->Hris_model->getAllDepartments();
            $result['campus']     = $this->Hris_model->getAllCampuses();
            $result['company']    = $this->Hris_model->getAllCompany();
            $result['designation'] = $this->Hris_model->getAllDesignations();
            $result['degree'] = $this->Hris_vacancy->getAllDegree();
            $result['vacancybyid'] = $this->Hris_vacancy->get_vacancy_by_id($vacancy_id);
          
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/vacancy/vacancy_update', $result);
    $this->load->view('hris_ace/hris_footer'); 
   }
   function update_vacancy_record()
   {
      $vid = $this->input->post('vacancyid');
        $vacancy = array(
          'company_id' => $this->input->post('record_company') ,
          'department_id' => $this->input->post('record_department') ,
          'designation_id' => $this->input->post('record_designation') ,
          'job_shift' => $this->input->post('shift') ,
           'job_type_time' => $this->input->post('ad_job_type'),
          'min_age' => $this->input->post('record_min_age') ,
          'max_age' => $this->input->post('record_max_age') ,
          'gender' => $this->input->post('gender') ,
          'min_experience' => $this->input->post('record_min_experience') ,
          'max_experience' => $this->input->post('record_max_experience') ,
          'min_dgree' => $this->input->post('min_degree') ,
          'count_vacancy' => $this->input->post('no_vacancy') ,
          'traveling' => $this->input->post('traveling-Required') ,
          'min_salery' => $this->input->post('min_salary') ,
          'max_salery' => $this->input->post('max_salary') ,
          'salery_visible' => $this->input->post('visible') ,
          'city_id' => $this->input->post('vc_city') ,
          's_date' => $this->input->post('start_date') ,
           'e_date' => $this->input->post('end_date') ,
           'vecancy_detail' => $this->input->post('job_description') ,
           'vecancy_status' => $this->input->post('status') ,
          
         );
      
      $vacancy = $this->Hris_vacancy->update_vacancy($vacancy,$vid);
      if($vacancy > 0)
          redirect('vacancy/view_vacancy');
   }
  
}
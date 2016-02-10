<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Employees extends CI_Controller {

  public function __construct() {

    parent::__construct();

    $this->load->model('Employee_model');
    $this->load->model('Hris_model');
    $this->load->library('session');

    // for form validation
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
  }
  
  public function index()
  {
      
      $this->load->view("hris/frontend/login");
      //$this->load->view("hris/frontend/footer");
  }
   function login_confirm(){
      
     
        echo  $email = $this->input->post('email');
         $password = md5($this->input->post('password'));
      
          $data = $this->Employee_model->get_logins_check($email,$password);
    
          $this->session->set_userdata( array(
                'emp_id'    => $data->emp_id,
                'emp_name'  => $data->email,
                'l_status'  => $data->status,
                'pstatus'   =>  $data->pstatus,
                'cor_status' => $data->emp_cor_status,
                'isLoggedIn'=>true
            )
        );

          if($this->session->userdata('l_status') == "1"){
              redirect("employees/view_profile");
          }
          if(empty($username)){
              $this->session->set_userdata('error', 'Invalid Username OR Password');
              redirect('employees/index');
          }
   }
   
  public function logout() {

    $this->session->unset_userdata('emp_id');
    $this->session->unset_userdata('username');
    $this->session->sess_destroy();
    redirect('employees/index');
  }
  
  function get_age($birth_date){
        return floor((time() - strtotime($birth_date))/31556926);
 }
  
  public function view_profile()
          {
    $emp_id = $this->session->userdata("emp_id");
    if(!empty($emp_id)){
    $result['netSalary']   = $this->Hris_model->maxSalaryStatus($emp_id);    
    $result['banks']       = $this->Hris_model->get_emp_bankDetails($emp_id);    
    $result['socials']     = $this->Hris_model->get_emp_socialDetails($emp_id);  
    $result['facilities']  = $this->Hris_model->get_emp_facilities($emp_id);
    $result['contacts']     = $this->Hris_model->get_emp_contactDetails($emp_id);    
    $result['employee']    = $this->Hris_model->getEmployee($emp_id);
    $result['education']   = $this->Hris_model->getEducation($emp_id);
    $result['certification']   = $this->Hris_model->getCertification($emp_id);
    $result['skills']      = $this->Hris_model->getSkillsdetails($emp_id);
    $result['lang']        = $this->Hris_model->getlangdetails($emp_id);
    $result['member']      = $this->Hris_model->getmembership($emp_id);
    $result['license']     = $this->Hris_model->getlicenseDetails($emp_id);
    $result['exp']         = $this->Hris_model->getexpDetails($emp_id);
    $result['dependent']   = $this->Hris_model->get_dep_nominee($emp_id);
    //$result['dependent']   = $this->Hris_model->getDependent($emp_id);
    $result['nominee']     = $this->Hris_model->getNominee($emp_id);
    $result['medical']     = $this->Hris_model->getmedicalDetails($emp_id);
    $result['reference']   = $this->Hris_model->getReference($emp_id);
    $result['document']    = $this->Hris_model->getDocument($emp_id);
    $result['emp_pic']    =  $this->Employee_model->get_temp_pic($emp_id);
    
    $dob                   =    $result['employee'][0]['date_of_birth'];
    
    $result['age']         =    $this->get_age($dob);
    
    $this->load->view('users/userpanel/header');
    $this->load->view('users/userpanel/sidebar');      
    $this->load->view('users/userpanel/profile', $result);      
    $this->load->view('users/userpanel/footer'); 
    
    }
    else
        {
        redirect('employees/index');
        }
    
  }
  
  
  
  public function update_picture(){
      $emp_id = $_POST['emp_id'];
     
      $empImageName = $_FILES['image']['name'];
                $config['upload_path'] = 'assets/emptempimages';
                $config['file_name'] = $empImageName;
                $config['overwrite'] = true;
                $config["allowed_types"] = 'jpg|jpeg|png|gif';
                $config["max_size"] = 5024;
                $config["max_width"] = 1024;
                $config["max_height"] = 1000;
                $this->load->library('upload', $config);

                $imagePath = "assets/emptempimages/".$_FILES['image']['name'];

                $this->upload->do_upload('image');
                
               $upload = $this->Employee_model->insert_emp_pic($emp_id, $imagePath);
               
               $this->session->set_userdata( array(
                'success_msg'    => 'Success ! Image Uploaded'
                   ));
               redirect("employees/view_profile");
               
              
  }
  
  
  public function correct_info(){
      $emp_id = $this->input->post('emp_id');

            $empcv = $_FILES['cv']['name'];
            $config['upload_path'] = 'assets/employeecvs';
             $config['file_name'] = $empcv;
            $config['overwrite'] = true;
            $config["allowed_types"] = 'pdf|doc|xml|pdf';
            $config['max_size'] = '0';
            $config['max_width']  = '0';
            $config['max_height']  = '0';
                            $this->load->library('upload', $config);
                            $this->upload->do_upload('cv');
                            $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                            $file_name = $upload_data['file_name'];
                            $cvPath = "assets/employeecvs/".$file_name;
   
                            
       $data = array(
         'emp_cor' => $this->input->post('emp_correction'),
         'cv_path' => $cvPath,
         'emp_cor_status' => '1'
             );
    $update = $this->Employee_model->emp_correction($data,$emp_id);
    print_r($update);
    if($update > 0)
        {
        
         $this->session->set_userdata( array(
                    'cor_status' => '1',
                'success_msg'    => 'Success ! Your corrections has been Created'
                   ));
        redirect("employees/view_profile");
        }
        else
            {
             $this->session->set_userdata( array(
                'success_msg'    => 'failed ! to update'
                   ));
        redirect("employees/view_profile");
            }
        
  }
  
}
?>
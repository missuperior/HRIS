<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Hris extends CI_Controller {

  public function __construct() {

    parent::__construct();

    $this->load->model('Hris_model');
    $this->load->library('session');

    // for form validation
    $this->load->helper(array('form', 'url','html'));
    $this->load->library('form_validation');
  }

  // For Index Page hris
  public function index() {

    $this->load->view('hris/login');
  }

  // for verification of hris login

  public function login_check() {

    if ($this->session->userdata('hris_id') == '' && $this->session->userdata('hris_username') == '') {
      redirect('hris/index');
    }
  }

  // hris login 

  public function hris_login() {

    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {

      $this->load->view('hris/login');
    } 
    else {
      $this->load->library('encrypt');

      $encrypted_password = $this->encrypt->sha1($this->input->post('password'));

      $login_data = array(
          'hris_username' => $_POST['username'],
          'hris_password' => $encrypted_password,
      );

      $result = $this->Hris_model->hrisLogin($login_data);

      if ($result) {
        
        $loginData = array(
            'hris_username'   => $result->hris_username,
            'hris_id'         => $result->hris_login_id,
            'account_role_id' => $result->account_role_id,
            'company_name'    => $result->company_name
        );
        
        $this->session->set_userdata($loginData);
        redirect('hris/dashboard');
      } else {

        $this->session->set_userdata('error', 'Invalid Username OR Password');
        redirect('hris/index');
      }
    }
  }

  // for hris logout 
  public function logout() {

    $this->session->unset_userdata('hris_id');
    $this->session->unset_userdata('hris_username');
    $this->session->sess_destroy();
    redirect('hris/index');
  }

  // hris dashboard
  public function dashboard() {
 
    $this->login_check();
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris_ace/dashboard');
    $this->load->view('hris_ace/hris_footer');
  }
  
  public function add_employee_form() {
    
    $this->login_check();
    
    $result['cities']     = $this->Hris_model->getAllcities();
    $result['department'] = $this->Hris_model->getAllDepartments();
    $result['campus']     = $this->Hris_model->getAllCampuses();
    $result['company']    = $this->Hris_model->getAllCompany();
    $result['designation'] = $this->Hris_model->getAllDesignations();
    $result['facilities'] = $this->Hris_model->get_all_facilities();
    $result['banks'] = $this->Hris_model->get_all_bank_details();
    $result['religions'] = $this->Hris_model->get_all_religions();
    $result['relations'] = $this->Hris_model->get_all_relations();
    $result['docs'] = $this->Hris_model->get_all_documents();
    $result['countries'] = $this->Hris_model->get_all_countries();
    $result['employee'] = $this->Hris_model->getAllEmployees();
    $result['sal_types'] = $this->Hris_model->get_sal_details();
    //print_r($result['designation']);die;
    
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/employee_form', $result);
    $this->load->view('hris_ace/hris_footer');
  }
  
  
  /////////update employee new
  
  
  
  public function update_employee_record()
  {       
      
     $emp_id = $this->input->post('emp_id');
     //$result['employee']    = $this->Hris_model->getEmployee($emp_id);
      //$result['dependent']   = $this->Hris_model->getDependent($emp_id);
      //$result['nominee']     = $this->Hris_model->getNominee($emp_id);
      //$result['reference']   = $this->Hris_model->getReference($emp_id);
      //$result['document']    = $this->Hris_model->getDocument($emp_id);
      //$result['education']   = $this->Hris_model->getEducation($emp_id);
      //$result['department']  = $this->Hris_model->getAllDepartments();
      //$result['designation'] = $this->Hris_model->DepartmentDesignations($dept_id);
     // $result['cities']      = $this->Hris_model->getAllCities();
      //$result['campus']      = $this->Hris_model->getAllCampuses();

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/edit_employee', $result);
      $this->load->view('hris_ace/hris_footer');
   
      
        
        $document_id = $_POST['document_id'];
        $emp_record_id = $_POST['emp_record_id'];
        $bank_id = $_POST['bank_id'];
        $facility_id = $_POST['facility_id'];
        $emp_contact_id = $_POST['emp_contact_id'];
        $dependent_id = $_POST['dependent_id'];
        $social_media_id = $_POST['social_media_id'];
        $nominee_id = $_POST['nominee_id'];
        $medical_id = $_POST['medical_id'];
        $emp_education_id = $_POST['emp_education_id'];
        $training_id = $_POST['training_id'];
        $skills_id = $_POST['skills_id'];
        $language_id = $_POST['language_id'];
        $membership_id = $_POST['membership_id'];
        $emp_experience_id = $_POST['emp_experience_id'];
        $reference_id = $_POST['reference_id'];
       
        $emp_code                   = $_POST['employee_code'];
          $employee_name               = $_POST['emp_record_name'];
          $grade                       = $_POST['record_grade'];
          $employee_status             = $_POST['employee_status'];
          $soc_sec_num                 = $_POST['social_security'];
          $eobi_num                    = $_POST['eobi'];
          $health_ins_num              = $_POST['h_ins_no'];
      //----- Employee Record Data Array -----\\
      $record_data = array(
          $emp_code,
          $employee_name,
          $grade,
          $employee_status,
          $soc_sec_num,
          $eobi_num,
          $health_ins_num            
      );
      
//        echo 'Employee Record Data <br><pre>';
//                print_r($record_data);
//      
//      
//     
      
      $record_designation = $_POST['record_designation'];
      $record_company     = $_POST['record_company'];
      $record_department  = $_POST['record_department'];
      $campus             = $_POST ['campus'];
      $employee_type      = $_POST['employee_type'];
      $ad_employee_type   = $_POST['ad_employee_type'];
      $shift              = $_POST['shift'];
      $joining_date       = $_POST['joining_date'];
      $confirmation_date  = $_POST['confirmation_date'];
      $starting_salary    = $_POST['record_starting_salary'];
      $current_salary     = $_POST['current_salary'];
      $probation_period   = $_POST['probation_period'];
      $probation_from     = $_POST['probation_from'];
      $probation_to       = $_POST['probation_to'];
      
      for($i=0; $i<count($record_department); $i++){
          $add_data = array(
          $emp_id,
          $record_designation[$i],
         $record_company[$i],
         $record_department[$i],
         $campus[$i],
         $employee_type[$i],
         $ad_employee_type[$i],
         $shift[$i],
         $joining_date[$i],
         $confirmation_date[$i],
         $starting_salary[$i],
         $current_salary[$i],
         $probation_period[$i],
         $probation_from[$i],
         $probation_to[$i]
            
              
          );
          
         $ad_data[] = $add_data;
         
      }
      
     
      
       //----- Employee Salary Details data Array -----\\
            $salary_type      =   $_POST['salary_detail_type'];
            $salary_amount    =   $_POST['salary_detail_amount'];
            $salary_date      =   $_POST['salary_detail_date'];
            
            for($i=0; $i<count($salary_type); $i++)
            {
                $salary_data = array(
                                    $salary_type[$i],
                                    $salary_amount[$i],
                                    $salary_date[$i],          
                                    $emp_id
                                );
                
//                 echo 'Salary Data <br><pre>';
//                print_r($salary_data);
                $sal_array[] = $salary_data;
                
            }
      
     
      
       //----- Employee Bank Details data Array -----\\
            
                                    $bank_name                         = $_POST['bank_name'];
                                    $account_title                     = $_POST['account_title'];
                                    $account_no                        = $_POST['account_no'];          
                                    $bank_address                      = $_POST['bank_address'];          
                                    $emp_id                            = $emp_id;
                        
                $bank_data = array(
                                    $bank_name,
                                    $account_title,
                                    $account_no,          
                                    $bank_address,       
                                    $emp_id 
                                );
                
//                  echo 'Bank Data <br><pre>';
                //print_r($bank_data);

                
            
    
    //----- Employee Facility Details data Array -----\\
                
            $facility                   =   $_POST['facility'];
            $facility_date              =   $_POST['facility_date'];
            $facility_description       =   $_POST['facility_description'];
            
            for($i=0; $i<count($facility); $i++)
            {
                $facility_data = array(
                                    $facility[$i],
                                    $facility_date[$i],
                                    $facility_description[$i],          
                                    $emp_id
                                );
                
//               echo 'Facility Data <br><pre>';
//                print_r($facility_data);
                
              $fac_array[] = $facility_data; 
            }
      
                      
                
                

      //----- Employee Image Upload -----\\
           // echo $_FILES['emp_pic']['name'];
      if ($_FILES['emp_pic']['name']) 
      {
                $empImageName = $_FILES['emp_pic']['name'];
                $config['upload_path'] = 'assets/EmployeeImages';
                $config['file_name'] = $empImageName;
                $config['overwrite'] = true;
                $config["allowed_types"] = 'jpg|jpeg|png|gif';
                $config["max_size"] = 5024;
                $config["max_width"] = 1024;
                $config["max_height"] = 1000;
                $this->load->library('upload', $config);

                $imagePath = "assets/EmployeeImages/".$_FILES['emp_pic']['name'];

                $this->upload->do_upload('emp_pic');
               // echo $imagePath;
//         echo $this->upload->display_errors();          
      }
      else
      {
        $imagePath = $_POST['hidfile'];
      }        

      //----- Employee Contact Data Array -----\\
      
      
                            $emp_name                      = $_POST['emp_record_name'];
                            $father_name                   = $_POST['f_name'];
                            $mother_name                   = $_POST['m_name'];
                            $spouse_name                   = $_POST['s_name'];
                            $date_of_birth                 = $_POST['dob'];
                            $cnic_no                       = $_POST['cnic'];
                            $gender                       = $_POST['gender'];
                            $blood_group                   = $_POST['blood_group'];
                            $marital_status               = $_POST['marital_status'];
                            $religion                      = $_POST['religion'];
                            $nationality                   = $_POST['nationality'];                            
                            $emp_picture                   = $imagePath;
          
                            $mailing_address               = $_POST['temporary_address'];                           
                            $mailing_contact_no            = $_POST['work_phone'];
          
                            $permanent_address             = $_POST['permanent_address'];                            
                            $permanent_contact_no          = $_POST['home_phone'];
          
                            $correspondence_address        = $_POST['correspondence_address'];
          
                            $mobile_1                      = $_POST['mobile_1'];
                            $mobile_2                      = $_POST['mobile_2'];
                            $email_1                       = $_POST['personal_email'];
                            $email_2                       = $_POST['work_email'];
                            $emp_id                        = $emp_id;
      
      
      $contact_data = array(
                            $emp_name,
                            $father_name,
                            $mother_name,
                            $spouse_name,
                            $date_of_birth,
                            $cnic_no,
                            $gender,
                            $blood_group,
                            $marital_status,
                            $religion,
                            $nationality,                            
                            $emp_picture,
                            $mailing_address,                            
                            $mailing_contact_no,
                            $permanent_address,                            
                            $permanent_contact_no,
                            $correspondence_address,
                            $mobile_1,
                            $mobile_2,
                            $email_1,
                            $email_2,
                            $emp_id
                          );
      
//        echo 'Contact Data <br><pre>';
//                print_r($contact_data);
      
     
      
      
      //----- Employee Dependent Details data Array -----\\
                
            $dependent_name                     =   $_POST['d_name'];
            $dependent_relationship             =   $_POST['d_relationship'];
            $dependent_age                      =   $_POST['d_age'];
            $dependent_cnic                     =   $_POST['d_cnic'];
            $dependent_address                  =   $_POST['d_address'];
            
            for($i=0; $i<count($dependent_name); $i++)
            {
                $dependent_data = array(
                                    $dependent_name[$i],
                                    $dependent_relationship[$i],
                                    $dependent_cnic[$i],          
                                    $dependent_age[$i],
                                    $dependent_address[$i],
                                    $emp_id
                                );
                
//                echo 'Dependent Data <br><pre>';
//                print_r($dependent_data);
                $dependent_array[] = $dependent_data;
                
            }
            
            
       //----- Employee Social Media Details data Array -----\\
                                    $linked_in                 = $_POST['linkedin'];
                                    $skype                     = $_POST['skype'];
                                    $facebook                  = $_POST['facebook'];          
                                    $twitter                   = $_POST['twitter'];         
                                    $emp_id                    = $emp_id;
                        
                $social_media_data = array(
                                    $linked_in,
                                    $skype,
                                    $facebook,          
                                    $twitter,          
                                    $emp_id
                                );
                
//                echo 'Social Media Data <br><pre>';
//                print_r($social_media_data);

               
                
      
      //----- Employee Emergency Contact Details data Array -----\\
                
            $em_name                     =   $_POST['e_name'];
            $em_relationship             =   $_POST['e_relationship'];
            $em_phone                    =   $_POST['e_phone'];
            $em_email                    =   $_POST['e_email'];
            $em_address                  =   $_POST['e_address'];
            
            for($i=0; $i<count($em_name); $i++)
            {
                $emergency_data = array(
                                    $em_name[$i],
                                    $em_relationship[$i],
                                    $em_email[$i],          
                                    $em_phone[$i],
                                    $em_address[$i],
                                    $emp_id
                                );
                
//                 echo 'emergency Data <br><pre>';
//                print_r($emergency_data);
                
                $emer_array[] = $emergency_data;
            }
            
            
//----- Employee Medical Details data Array -----\\
                $name_of_disease        = $_POST['disease_name'];
                $physical_limitation    = $_POST['physical_limitation'];
                $doctor_name            = $_POST['doctor_name'];
                $doctor_contact_no      = $_POST['doctor_contact_no'];
                $doctor_contact_address = $_POST['doctor_address'];
                $medical_detail         = $_POST['medical_details'];          
               
            for($i=0; $i<count($name_of_disease); $i++){
                $medical_data = array(
                                    $name_of_disease[$i],
                                    $physical_limitation[$i],
                                    $doctor_name[$i],          
                                    $doctor_contact_no[$i],          
                                    $doctor_contact_address[$i],          
                                    $medical_detail[$i],          
                                    $emp_id
                                );
                
//                 echo '$medical Data <br><pre>';
//                print_r($medical_data);

                $med_array[] = $medical_data;  
            } 
 
                
//----- Employee Work Experience Details data Array -----\\
                
            $business_name                      =   $_POST['business_name'];
            $business_nature                    =   $_POST['business_nature'];
            $company_location                   =   $_POST['company_location'];
            $company_contact_no                 =   $_POST['company_contact_no'];
            $designation                        =   $_POST['designation'];
            $drawn_salary                       =   $_POST['drawn_salary'];
            $date_from                          =   $_POST['date_from'];
            $date_to                            =   $_POST['date_to'];
            $company_contact_address            =   $_POST['company_contact_address'];
            $reason_of_leaving                  =   $_POST['reason_of_leaving'];
            
            
            for($i=0; $i<count($business_name); $i++)
            {
                $experience_data = array(
                                    $business_name[$i],
                                    $company_location[$i],
                                    $business_nature[$i],          
                                    $designation[$i],
                                    $date_from[$i],
                                    $date_to[$i],
                                    $reason_of_leaving[$i],                                    
                                    $drawn_salary[$i],
                                    $company_contact_address[$i],
                                    $company_contact_no[$i],
                                    $emp_id
                                );
                
//                echo 'Experience Data <br><pre>';
//                print_r($experience_data);
                
                $exp_array[] = $experience_data;
            }
            
            
                        
//----- Employee Reference Details data Array -----\\
                
            $reference_name                      =   $_POST['reference_name'];
            $reference_company                    =   $_POST['reference_company'];
            $reference_job_title                   =   $_POST['reference_job_title'];
            $reference_contact_no                 =   $_POST['reference_contact_no'];
            $reference_type                        =   $_POST['reference_type'];
            $reference_contact_address                       =   $_POST['reference_contact_address'];
            
            
            for($i=0; $i<count($reference_name); $i++)
            {
                $ref_data = array(
                                    $reference_name[$i],
                                    $reference_company[$i],
                                    $reference_job_title[$i],          
                                    $reference_type[$i],
                                    $reference_contact_address[$i],
                                    $reference_contact_no[$i],
                                    $emp_id
                                );
                
//                echo 'Reference Data <br><pre>';
//                print_r($ref_data);
                
                $ref_array[] = $ref_data;
            }
            
            
//----- Employee Document Details data Array -----\\
                
            $document_type                      =   $_POST['document_type'];
            $document_category                  =   $_POST['document_category'];
            $document                           =   $_POST['document'];
            $document_date                      =   $_POST['document_date'];
            
                       
            for($i=0; $i<count($document_type); $i++)
            {
                
                $images_path    = BASEPATH.'../'.'assets/EmployeeDocuments';
                $path1           = $_FILES['document_attach']['name'][$i];
                $ext1            = pathinfo($path1, PATHINFO_EXTENSION);
                $allowedExts1    = array("doc", "docx", "pdf","txt");
                
                if (in_array($ext1, $allowedExts1)) {
                    if ($_FILES["resume"]["error"] > 0) {                       
                        echo 'Error 1<br>'.$error3 = $_FILES["document_attach"]["error"];                        
                    } else {                        
                        $document_name = $employee_id.$_FILES['document_attach']['name'][$i];
                        @move_uploaded_file($_FILES["document_attach"]["tmp_name"][$i] , $images_path.'/'.$document_name );                        
                    }
                } else {
                           $document_path = $this->input->post('hidden_doc');                           
                }
                
                $document_path      =   'assets/EmployeeDocuments/'.$document_name;
                
                $doc_data = array(
                                    $document_type[$i],
                                    $document_category[$i],
                                    $document[$i],          
                                    $document_date[$i],
                                    $document_path,
                                    $emp_id
                                );
                
//                echo 'Documents Data <br><pre>';
//                print_r($doc_data);
                
                $doc_array[] = $doc_data;
              
            }
                        
            
    //----- Employee Education Details data Array -----\\
                
            $education_title                      =   $_POST['education_title'];
            $education_specialization             =   $_POST['education_specialization'];
            $education_grade                      =   $_POST['education_grade'];
            $education_institute                  =   $_POST['education_institute'];
            $education_country                    =   $_POST['education_country'];
            $education_year                       =   $_POST['education_year'];
            $duration                             =   $_POST['duration'];
            
            
            for($i=0; $i<count($education_title); $i++)
            {
                $education_data = array(
                                    $education_title[$i],
                                    $education_specialization[$i],
                                    $education_grade[$i],          
                                    $education_institute[$i],
                                    $education_country[$i],
                                    $education_year[$i],
                                    $duration[$i],
                                    $emp_id
                                );
                
//                echo 'Education Data <br><pre>';
//                print_r($education_data);
                
                $edu_array[] = $education_data;
            }
            
                    
    //----- Employee Trainings/Certification Details data Array -----\\
                
            $training_title                     =   $_POST['training_title'];
            $training_institute                 =   $_POST['training_institute'];
            $training_year                      =   $_POST['training_year'];
            $training_duration                  =   $_POST['training_duration'];
            $training_address                   =   $_POST['training_address'];
            
            
            for($i=0; $i<count($training_title); $i++)
            {
                $training_data = array(
                                    $training_title[$i],
                                    $training_institute[$i],
                                    $training_year[$i],          
                                    $training_duration[$i],
                                    $training_address[$i],
                                    $emp_id
                                );
//                echo 'Training Data <br><pre>';
//                print_r($training_data);
                
                $training_array[] = $training_data;
            }
            
                    
            
    //----- Employee Skills Details data Array -----\\
                
            $skill_name                         =   $_POST['skill_name'];
            $skill_experience                   =   $_POST['skill_experience'];
            $skill_level                        =   $_POST['skill_level'];
            
            
            for($i=0; $i<count($skill_name); $i++)
            {
                $skill_data = array(
                                    $skill_name[$i],
                                    $skill_experience[$i],
                                    $skill_level[$i],    
                                    $emp_id
                                );
                
//                echo 'skill Data <br><pre>';
//                print_r($skill_data);
                
                $skill_array[] = $skill_data;
                
            }
            
                    
    //----- Employee  Language Details data Array -----\\
                
            $language                         =   $_POST['language'];
            $language_category                =   $_POST['language_category'];
            $language_level                   =   $_POST['language_level'];
            
            
            for($i=0; $i<count($language); $i++)
            {
                $language_data = array(
                                    $language[$i],                                    
                                    $language_category[$i],    
                                    $language_level[$i],    
                                    $emp_id
                                );
                
//                echo 'spoken Data <br><pre>';
//                print_r($language_data);
                $lang_array[] = $language_data;
              
            }
            
            
//----- Employee Membership Details data Array -----\\
                
            $membership_title                       =   $_POST['membership_title'];
            $membership_duration                    =   $_POST['membership_duration'];
            $membership_organization_name           =   $_POST['membership_organization_name'];
            $membership_country                     =   $_POST['membership_country'];
            $membership_since                       =   $_POST['membership_since'];
            $membership_renewed                     =   $_POST['membership_renewed'];
            $membership_reg_no                      =   $_POST['membership_reg_no'];
            $membership_subs_amount                 =   $_POST['membership_subs_amount'];
            $membership_paid_by                     =   $_POST['membership_paid_by'];
            
            
            for($i=0; $i<count($membership_title); $i++)
            {
                $membership_data = array(
                                    $membership_title[$i],
                                    $membership_duration[$i],
                                    $membership_organization_name[$i],          
                                    $membership_country[$i],
                                    $membership_since[$i],
                                    $membership_renewed[$i],
                                    $membership_reg_no[$i],
                                    $membership_subs_amount[$i],
                                    $membership_paid_by[$i],
                                    $emp_id
                                );
                
//                echo 'Membership Data <br><pre>';
//                print_r($membership_data);
                
               $mem_array[] = $membership_data;
            }
            
         
    //----- Employee  license Details data Array -----\\
                
            $license_title                          =   $_POST['license_title'];
            $license_institution                    =   $_POST['license_institute'];
            $license_no                             =   $_POST['license_no'];
            $issue_date                             =   $_POST['issue_date'];
            $expiry_date                            =   $_POST['expiry_date'];
            
           // print_r($license_title);
            for($i=0; $i<count($license_title); $i++)
            {
                $license_data = array(
                                    $license_title[$i],                                    
                                    $license_institution[$i],    
                                    $license_no[$i],    
                                    $issue_date[$i],    
                                    $expiry_date[$i],    
                                    $emp_id
                                );
                
//                echo 'spoken Data <br><pre>';
//                print_r($license_data);
                
               $license_array[] = $license_data;
               
            }
            
         
                    
            $res = $this->Hris_model->updateEmployee($emp_id, $record_data, $ad_data, $sal_array, $bank_data, $fac_array, $contact_data, $dependent_array, $social_media_data, $emer_array, $med_array, $exp_array, $ref_array, $doc_array, $edu_array, $training_array, $skill_array, $lang_array, $mem_array, $license_array,$document_id,$emp_record_id,$emp_salary_id,$bank_id,$facility_id,$emp_contact_id,$dependent_id,$social_media_id,$nominee_id,$medical_id,$emp_education_id,$training_id,$skills_id,$language_id,$membership_id,$reference_id,$emp_experience_id);
      if($res)
      {
        $this->session->set_userdata('success', "Employee Successfully Updated");
        redirect('hris/view_employees');
      }
      
           
  }
  
  /////update employee end
  
  
  
  
  
  
  public function add_employee_record()
  {       
    //   ****************** for Employement Tab validation 
      
    $this->form_validation->set_rules('emp_record_name', 'Employee Name', 'required');
    $this->form_validation->set_rules('employee_code', 'Employee Code', 'required');  
    $this->form_validation->set_rules('record_department', 'Department', 'required');
    $this->form_validation->set_rules('record_company', 'Company Name', 'required');
    $this->form_validation->set_rules('record_designation', 'Designation', 'required');
    $this->form_validation->set_rules('campus', 'Campus', 'required');
    $this->form_validation->set_rules('employee_type', 'Employee Type', 'required');
    $this->form_validation->set_rules('employee_status', 'Employee Status', 'required');
    $this->form_validation->set_rules('shift', 'Shift', 'required');
    $this->form_validation->set_rules('joining_date', 'Joining Date', 'required');
    $this->form_validation->set_rules('record_starting_salary', 'Starting Salary', 'required');
    $this->form_validation->set_rules('current_salary', 'Current Salary', 'required');
    $this->form_validation->set_rules('probation_period', 'Probation Period', 'required');
    $this->form_validation->set_rules('probation_from', 'Probation From', 'required');
    $this->form_validation->set_rules('probation_to', 'Probation To', 'required');
    
    //   ****************** For Personal Tab Validation 
    
    $this->form_validation->set_rules('f_name', 'Father Name', 'required');
    $this->form_validation->set_rules('m_name', 'Mother Name', 'required');
    //$this->form_validation->set_rules('s_name', 'Spouse Name', 'required');
    $this->form_validation->set_rules('cnic', 'CNIC', 'required');
    $this->form_validation->set_rules('gender', 'Gender', 'required');
    $this->form_validation->set_rules('blood_group', 'Blood Group', 'required');
    $this->form_validation->set_rules('marital_status', 'Marital Status', 'required');
    $this->form_validation->set_rules('religion', 'Religion', 'required');
    $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
    $this->form_validation->set_rules('nationality', 'Nationality', 'required');
   // $this->form_validation->set_rules('emp_pic', 'Employee Image', 'required');
    
    // for personal Tab (dependent) Validation
    
//    $this->form_validation->set_rules('d_name','Dependent Name', 'required');
//    $this->form_validation->set_rules('d_relationship','Dependent Relationship', 'required');
//    $this->form_validation->set_rules('d_age','Dependent Age', 'required');
//    $this->form_validation->set_rules('d_cnic','Dependent CNIC', 'required');
    
    
    //   ******************  For Contact Tab Validation 
    
    $this->form_validation->set_rules('mobile_1', 'Mobile 1', '');
    $this->form_validation->set_rules('work_phone', 'Work Phone', '');
    //$this->form_validation->set_rules('home_phone', 'Home Residence Phone', 'required');
    //$this->form_validation->set_rules('personal_email', 'Personal Email', 'required');
    $this->form_validation->set_rules('work_email', 'work_email', '');
    $this->form_validation->set_rules('permanent_address', 'Permanant Address', '');
    $this->form_validation->set_rules('temporary_address', 'Temporary Address', '');
    $this->form_validation->set_rules('correspondence_address', 'Correspondence Address', '');
    
    // for Contact Tab (Personal Contact Details) Validation
    
    $this->form_validation->set_rules('e_name','Emergency Contact Person', '');
    $this->form_validation->set_rules('e_relationship','Emergency Relationship', '');
    $this->form_validation->set_rules('e_phone','Emergency  Phone', '');
    //$this->form_validation->set_rules('e_email','Emergency Email', 'required');
    $this->form_validation->set_rules('e_address','Emergency Address', '');  
    
    
    //   ******************  For Qualification Tab Validation 
    
    $this->form_validation->set_rules('education_title', 'Degree Title', '');     
    $this->form_validation->set_rules('education_grade', 'Grade/CGPA', ''); 
    $this->form_validation->set_rules('education_institute', 'Institute', ''); 
    $this->form_validation->set_rules('education_country', 'Country', ''); 
    $this->form_validation->set_rules('education_year', 'Completion Year', ''); 
    
    
    
    
    
    
        $result['cities']     = $this->Hris_model->getAllcities();
        $result['department'] = $this->Hris_model->getAllDepartments();
        $result['campus']     = $this->Hris_model->getAllCampuses();
        $result['company']    = $this->Hris_model->getAllCompany();

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/employee/employee_form', $result);
        $this->load->view('hris_ace/hris_footer');
    
    
      
      //----- Employee Record Data Array -----\\
      $record_data = array(
          'emp_code'                    => $_POST['employee_code'],
          'employee_name'               => $_POST['emp_record_name'],
          'grade'                       => $_POST['record_grade'],
          'employee_status'             => $_POST['employee_status'],
          'soc_sec_num'                 => $_POST['social_security'],
          'eobi_num'                    => $_POST['eobi'],
          'health_ins_num'              => $_POST['h_ins_no']
      );
      
//        echo 'Employee Record Data <br><pre>';
//                print_r($record_data);
      
      $employee_id = $this->Hris_model->addEmployeeRecord($record_data);
     
      
      
      
      $record_designation = $_POST['record_designation'];
      $record_company     = $_POST['record_company'];
      $record_department  = $_POST['record_department'];
      $campus             = $_POST['campus'];
      $employee_type      = $_POST['employee_type'];
      $ad_employee_type   = $_POST['ad_employee_type'];
      $shift              = $_POST['shift'];
      $joining_date       = $_POST['joining_date'];
      $confirmation_date  = $_POST['confirmation_date'];
      $starting_salary    = $_POST['record_starting_salary'];
      $current_salary     = $_POST['current_salary'];
      $probation_period   = $_POST['probation_period'];
      $probation_from     = $_POST['probation_from'];
      $probation_to       = $_POST['probation_to'];
      
      for($i=0; $i<count($record_department); $i++){
          $add_data = array(
          'emp_id'                      => $employee_id,
          'designation_id'              => $record_designation[$i],
          'record_company_name'         => $record_company[$i],
          'department_id'               => $record_department[$i],
          'campus_id'                   => $campus[$i],
          'employee_type'               => $employee_type[$i],
          'employee_addition_type'      => $ad_employee_type[$i],
          'shift'                       => $shift[$i],
          'joining_date'                => $joining_date[$i],
          'confirmation_date'           => $confirmation_date[$i],
          'record_starting_salary'      => $starting_salary[$i],
          'current_salary'              => $current_salary[$i],
          'probation_period'            => $probation_period[$i],
          'probation_from'              => $probation_from[$i],
          'probation_to'                => $probation_to[$i]
            
              
          );
          
         
          $add_type = $this->Hris_model->addAdditionalRecord($add_data);
      }
      
       //----- Employee Salary Details data Array -----\\
            $salary_type      =   $_POST['salary_detail_type'];
            $salary_amount    =   $_POST['salary_detail_amount'];
            $salary_date      =   $_POST['salary_detail_date'];
            
            for($i=0; $i<count($salary_type); $i++)
            {
                $salary_data = array(
                                    'salary_type'                     => $salary_type[$i],
                                    'salary_amount'                   => $salary_amount[$i],
                                    'salary_date'                     => $salary_date[$i],          
                                    'emp_id'                          => $employee_id
                                );
                
//                 echo 'Salary Data <br><pre>';
//                print_r($salary_data);

                $salary_id = $this->Hris_model->addSalaryDetails($salary_data);
            }
      
      
      
       //----- Employee Bank Details data Array -----\\
                        
                $bank_data = array(
                                    'bank_name'                         => $_POST['bank_name'],
                                    'account_title'                     => $_POST['account_title'],
                                    'account_no'                        => $_POST['account_no'],          
                                    'bank_address'                      => $_POST['bank_address'],          
                                    'emp_id'                            => $employee_id
                                );
                
//                  echo 'Bank Data <br><pre>';
//                print_r($bank_data);

                $bank_detail_id = $this->Hris_model->addBankDetails($bank_data);
            
    
    //----- Employee Facility Details data Array -----\\
                
            $facility                   =   $_POST['facility'];
            $facility_date              =   $_POST['facility_date'];
            $facility_description       =   $_POST['facility_description'];
            
            for($i=0; $i<count($facility); $i++)
            {
                $facility_data = array(
                                    'fac_id'                     => $facility[$i],
                                    'facility_date_from'                => $facility_date[$i],
                                    'facility_description'              => $facility_description[$i],          
                                    'emp_id'                            => $employee_id
                                );
                
//               echo 'Facility Data <br><pre>';
//                print_r($facility_data);
                
                $facility_id = $this->Hris_model->addFacilityDetails($facility_data);
            }
      
                      
                
                

      //----- Employee Image Upload -----\\
      if ($_FILES['emp_pic']['name']) 
      {
                $empImageName = $_FILES['emp_pic']['name'];
                $config['upload_path'] = 'assets/EmployeeImages';
                $config['file_name'] = $empImageName;
                $config['overwrite'] = true;
                $config["allowed_types"] = 'jpg|jpeg|png|gif';
                $config["max_size"] = 5024;
                $config["max_width"] = 1024;
                $config["max_height"] = 1000;
                $this->load->library('upload', $config);

                $imagePath = "assets/EmployeeImages/".$empImageName;

                $this->upload->do_upload('emp_pic');
//          echo $this->upload->display_errors();          
      }
      else
      {
        $imagePath = "NULL";
      }        

      //----- Employee Contact Data Array -----\\
      $contact_data = array(
                            'emp_name'                      => $_POST['emp_record_name'],
                            'father_name'                   => $_POST['f_name'],
                            'mother_name'                   => $_POST['m_name'],
                            'spouse_name'                   => $_POST['s_name'],
                            'date_of_birth'                 => $_POST['dob'],
                            'cnic_no'                       => $_POST['cnic'],
                            'gender'                        => $_POST['gender'],
                            'blood_group'                   => $_POST['blood_group'],
                            'marital_status'                => $_POST['marital_status'],
                            'religion'                      => $_POST['religion'],
                            'nationality'                   => $_POST['nationality'],                            
                            'emp_picture'                   => $imagePath,
          
                            'mailing_address'               => $_POST['temporary_address'],                            
                            'mailing_contact_no'            => $_POST['work_phone'],
          
                            'permanent_address'             => $_POST['permanent_address'],                            
                            'permanent_contact_no'          => $_POST['home_phone'],
          
                            'correspondence_address'        => $_POST['correspondence_address'],
          
                            'mobile_1'                      => $_POST['mobile_1'],
                            'mobile_2'                      => $_POST['mobile_2'],
                            'email_1'                       => $_POST['personal_email'],
                            'email_2'                       => $_POST['work_email'],
                            'emp_id'                        => $employee_id
                        );
      
//        echo 'Contact Data <br><pre>';
//                print_r($contact_data);
      
      $contact_id = $this->Hris_model->addContactRecord($contact_data);
      
      
      //----- Employee Dependent Details data Array -----\\
                
            $dependent_name                     =   $_POST['d_name'];
            $dependent_relationship             =   $_POST['d_relationship'];
            $dependent_age                      =   $_POST['d_age'];
            $dependent_cnic                     =   $_POST['d_cnic'];
            $dependent_address                  =   $_POST['d_address'];
            
            for($i=0; $i<count($dependent_name); $i++)
            {
                $dependent_data = array(
                                    'dependent_name'             => $dependent_name[$i],
                                    'dependent_relation'         => $dependent_relationship[$i],
                                    'dependent_cnic'             => $dependent_cnic[$i],          
                                    'age'                        => $dependent_age[$i],
                                    'dependent_address'          => $dependent_address[$i],
                                    'emp_id'                     => $employee_id
                                );
                
//                echo 'Dependent Data <br><pre>';
//                print_r($dependent_data);
                
                $dependent_id = $this->Hris_model->addDependentDetails($dependent_data);
            }
            
            
       //----- Employee Social Media Details data Array -----\\
                        
                $social_media_data = array(
                                    'linked_in'                 => $_POST['linkedin'],
                                    'skype'                     => $_POST['skype'],
                                    'facebook'                  => $_POST['facebook'],          
                                    'twitter'                   => $_POST['twitter'],          
                                    'emp_id'                    => $employee_id
                                );
                
//                echo 'Social Media Data <br><pre>';
//                print_r($social_media_data);

                $social_media_id = $this->Hris_model->addSocialMediaDetails($social_media_data);   
                
      
      //----- Employee Emergency Contact Details data Array -----\\
                
            $em_name                     =   $_POST['e_name'];
            $em_relationship             =   $_POST['e_relationship'];
            $em_phone                    =   $_POST['e_phone'];
            $em_email                    =   $_POST['e_email'];
            $em_address                  =   $_POST['e_address'];
            
            for($i=0; $i<count($em_name); $i++)
            {
                $emergency_data = array(
                                    'nominee_name'             => $em_name[$i],
                                    'nominee_relation'         => $em_relationship[$i],
                                    'nominee_email'            => $em_email[$i],          
                                    'nominee_phone'            => $em_phone[$i],
                                    'nominee_address'          => $em_address[$i],
                                    'emp_id'                   => $employee_id
                                );
                
//                 echo 'emergency Data <br><pre>';
//                print_r($emergency_data);
                
                $emergency_id = $this->Hris_model->addEmergencyDetails($emergency_data);
            }
            
            
//----- Employee Medical Details data Array -----\\
                $name_of_disease        = $_POST['disease_name'];
                $physical_limitation    = $_POST['physical_limitation'];
                $doctor_name            = $_POST['doctor_name'];
                $doctor_contact_no      = $_POST['doctor_contact_no'];
                $doctor_contact_address = $_POST['doctor_address'];
                $medical_detail         = $_POST['medical_details'];          
               
            for($i=0; $i<count($name_of_disease); $i++){
                $medical_data = array(
                                    'name_of_disease'               => $name_of_disease[$i],
                                    'physical_limitation'           => $physical_limitation[$i],
                                    'doctor_name'                   => $doctor_name[$i],          
                                    'doctor_contact_no'             => $doctor_contact_no[$i],          
                                    'doctor_contact_address'        => $doctor_contact_address[$i],          
                                    'medical_detail'                => $medical_detail[$i],          
                                    'emp_id'                        => $employee_id
                                );
                
//                 echo '$medical Data <br><pre>';
//                print_r($medical_data);

                $medical_id = $this->Hris_model->addMedicalDetails($medical_data);   
            } 
 
                
//----- Employee Work Experience Details data Array -----\\
                
            $business_name                      =   $_POST['business_name'];
            $business_nature                    =   $_POST['business_nature'];
            $company_location                   =   $_POST['company_location'];
            $company_contact_no                 =   $_POST['company_contact_no'];
            $designation                        =   $_POST['designation'];
            $drawn_salary                       =   $_POST['drawn_salary'];
            $date_from                          =   $_POST['date_from'];
            $date_to                            =   $_POST['date_to'];
            $company_contact_address            =   $_POST['company_contact_address'];
            $reason_of_leaving                  =   $_POST['reason_of_leaving'];
            
            
            for($i=0; $i<count($business_name); $i++)
            {
                $experience_data = array(
                                    'company_name'              => $business_name[$i],
                                    'company_location'          => $company_location[$i],
                                    'nature_of_business'        => $business_nature[$i],          
                                    'job_title'                 => $designation[$i],
                                    'expereince_from_date'      => $date_from[$i],
                                    'experience_to_date'        => $date_to[$i],
                                    'reason_of_leaving'         => $reason_of_leaving[$i],                                    
                                    'last_drawn_salary'         => $drawn_salary[$i],
                                    'company_address'           => $company_contact_address[$i],
                                    'company_contact_no'        => $company_contact_no[$i],
                                    'emp_id'                    => $employee_id
                                );
                
//                echo 'Experience Data <br><pre>';
//                print_r($experience_data);
                
                $experienc_id = $this->Hris_model->addExperienceDetails($experience_data);
            }
            
            
                        
//----- Employee Reference Details data Array -----\\
                
            $reference_name                      =   $_POST['reference_name'];
            $reference_company                    =   $_POST['reference_company'];
            $reference_job_title                   =   $_POST['reference_job_title'];
            $reference_contact_no                 =   $_POST['reference_contact_no'];
            $reference_type                        =   $_POST['reference_type'];
            $reference_contact_address                       =   $_POST['reference_contact_address'];
            
            
            for($i=0; $i<count($reference_name); $i++)
            {
                $ref_data = array(
                                    'reference_name'                    => $reference_name[$i],
                                    'reference_company_business_name'   => $reference_company[$i],
                                    'reference_job_title'               => $reference_job_title[$i],          
                                    'reference_type'                    => $reference_type[$i],
                                    'reference_address'                 => $reference_contact_address[$i],
                                    'reference_contact_no'              => $reference_contact_no[$i],
                                    'emp_id'                    => $employee_id
                                );
                
//                echo 'Reference Data <br><pre>';
//                print_r($ref_data);
                
                $ref_id = $this->Hris_model->addReferenceDetails($ref_data);
            }
            
            
//----- Employee Document Details data Array -----\\
                
            $document_type                      =   $_POST['document_type'];
            $document_category                  =   $_POST['document_category'];
            $document                           =   $_POST['document'];
            $document_date                      =   $_POST['document_date'];
            
                       
            for($i=0; $i<count($document_type); $i++)
            {
                
                $images_path    = BASEPATH.'../'.'assets/EmployeeDocuments';
                $path1           = $_FILES['document_attach']['name'][$i];
                $ext1            = pathinfo($path1, PATHINFO_EXTENSION);
                $allowedExts1    = array("doc", "docx", "pdf","txt");
                
                
                    if ($_FILES["resume"]["error"] > 0) {                       
                        echo 'Error 1<br>'.$error3 = $_FILES["document_attach"]["error"];                        
                    } else {                        
                        $document_name = $employee_id.$_FILES['document_attach']['name'][$i];
                        @move_uploaded_file($_FILES["document_attach"]["tmp_name"][$i] , $images_path.'/'.$document_name );                        
                    }
                
                
                $document_path      =   'assets/EmployeeDocuments/'.$document_name;
                
                $doc_data = array(
                                    'document_type'                    => $document_type[$i],
                                    'category'                         => $document_category[$i],
                                    'document'                         => $document[$i],          
                                    'issue_date'                       => $document_date[$i],
                                    'attachment'                        => $document_path,
                                    'emp_id'                            => $employee_id
                                );
                
//                echo 'Documents Data <br><pre>';
//                print_r($doc_data);
                
                
              $doc_id = $this->Hris_model->addDocumentsDetails($doc_data);
            }
                        
            
    //----- Employee Education Details data Array -----\\
                
            $education_title                      =   $_POST['education_title'];
            $education_specialization             =   $_POST['education_specialization'];
            $education_grade                      =   $_POST['education_grade'];
            $education_institute                  =   $_POST['education_institute'];
            $education_country                    =   $_POST['education_country'];
            $education_year                       =   $_POST['education_year'];
            $duration                             =   $_POST['duration'];
            
            
            for($i=0; $i<count($education_title); $i++)
            {
                $education_data = array(
                                    'degree_title'              => $education_title[$i],
                                    'major_subjects'            => $education_specialization[$i],
                                    'degree_grade'              => $education_grade[$i],          
                                    'degree_institute_name'     => $education_institute[$i],
                                    'country'                   => $education_country[$i],
                                    'degree_passing_year'       => $education_year[$i],
                                    'duration'                  => $duration[$i],
                                    'emp_id'                    => $employee_id
                                );
                
//                echo 'Education Data <br><pre>';
//                print_r($education_data);
                
                $education_id = $this->Hris_model->addEducationDetails($education_data);
            }
            
                    
    //----- Employee Trainings/Certification Details data Array -----\\
                
            $training_title                     =   $_POST['training_title'];
            $training_institute                 =   $_POST['training_institute'];
            $training_year                      =   $_POST['training_year'];
            $training_duration                  =   $_POST['training_duration'];
            $training_address                   =   $_POST['training_address'];
            
            
            for($i=0; $i<count($training_title); $i++)
            {
                $training_data = array(
                                    'training_title'                => $training_title[$i],
                                    'training_institute'            => $training_institute[$i],
                                    'training_completion_year'      => $training_year[$i],          
                                    'training_duration'             => $training_duration[$i],
                                    'training_institute_address'    => $training_address[$i],
                                    'emp_id'                        => $employee_id
                                );
//                echo 'Training Data <br><pre>';
//                print_r($training_data);
                
                $training_id = $this->Hris_model->addTrainingDetails($training_data);
            }
            
                    
            
    //----- Employee Skills Details data Array -----\\
                
            $skill_name                         =   $_POST['skill_name'];
            $skill_experience                   =   $_POST['skill_experience'];
            $skill_level                        =   $_POST['skill_level'];
            
            
            for($i=0; $i<count($skill_name); $i++)
            {
                $skill_data = array(
                                    'skill_name'                => $skill_name[$i],
                                    'years_of_experience'       => $skill_experience[$i],
                                    'skill_level'               => $skill_level[$i],    
                                    'emp_id'                    => $employee_id
                                );
                
//                echo 'skill Data <br><pre>';
//                print_r($skill_data);
                
                
                $skill_id = $this->Hris_model->addSkillDetails($skill_data);
            }
            
                    
    //----- Employee  Language Details data Array -----\\
                
            $language                         =   $_POST['language'];
            $language_category                =   $_POST['language_category'];
            $language_level                   =   $_POST['language_level'];
            
            
            for($i=0; $i<count($language); $i++)
            {
                $language_data = array(
                                    'language'                  => $language[$i],                                    
                                    'language_category'         => $language_category[$i],    
                                    'language_level'            => $language_level[$i],    
                                    'emp_id'                     => $employee_id
                                );
                
//                echo 'spoken Data <br><pre>';
//                print_r($language_data);
                
              $language_id = $this->Hris_model->addLanguageDetails($language_data);
            }
            
            
//----- Employee Membership Details data Array -----\\
                
            $membership_title                       =   $_POST['membership_title'];
            $membership_duration                    =   $_POST['membership_duration'];
            $membership_organization_name           =   $_POST['membership_organization_name'];
            $membership_country                     =   $_POST['membership_country'];
            $membership_since                       =   $_POST['membership_since'];
            $membership_renewed                     =   $_POST['membership_renewed'];
            $membership_reg_no                      =   $_POST['membership_reg_no'];
            $membership_subs_amount                 =   $_POST['membership_subs_amount'];
            $membership_paid_by                     =   $_POST['membership_paid_by'];
            
            
            for($i=0; $i<count($membership_title); $i++)
            {
                $membership_data = array(
                                    'membership_title'                      => $membership_title[$i],
                                    'membership_duration'                   => $membership_duration[$i],
                                    'membership_institue_name'              => $membership_organization_name[$i],          
                                    'membership_country'                    => $membership_country[$i],
                                    'membership_since'                      => $membership_since[$i],
                                    'membership_last_renewed'               => $membership_renewed[$i],
                                    'membership_reg_no'                     => $membership_reg_no[$i],
                                    'membership_subscription'               => $membership_subs_amount[$i],
                                    'membership_subscription_paidby'        => $membership_paid_by[$i],
                                    'emp_id'                                => $employee_id
                                );
                
//                echo 'Membership Data <br><pre>';
//                print_r($membership_data);
                
               $membership_id = $this->Hris_model->addMembershipDetails($membership_data);
            }
            
         
    //----- Employee  license Details data Array -----\\
                
            $license_title                          =   $_POST['license_title'];
            $license_institution                    =   $_POST['license_institute'];
            $license_no                             =   $_POST['license_no'];
            $issue_date                             =   $_POST['issue_date'];
            $expiry_date                            =   $_POST['expiry_date'];
            
           // print_r($license_title);
            for($i=0; $i<count($license_title); $i++)
            {
                $license_data = array(
                                    'license_title'                  => $license_title[$i],                                    
                                    'license_institute'              => $license_institution[$i],    
                                    'license_no'                     => $license_no[$i],    
                                    'issue_date'                     => $issue_date[$i],    
                                    'expiry_date'                     => $expiry_date[$i],    
                                    'emp_id'                         => $employee_id
                                );
                
//                echo 'spoken Data <br><pre>';
//                print_r($license_data);
                
               $license_id = $this->Hris_model->addLicenseDetails($license_data);
               
            }
            
         
                    
   
      if($employee_id)
      {
        $this->session->set_userdata('success', "Employee Successfully Added");
        redirect('hris/view_employees');
      }
      else
      {
        $this->session->set_userdata('error_msg', "Error");
        redirect('hris/add_employee_form');
      }
            
  }
  
  // view Employees  
  public function view_employees()
  {
    $this->login_check();
    $result['employee'] = $this->Hris_model->getAllEmployees();
    //$result['employee'] = $this->Hris_model->getAllEmployees();

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/view_employees', $result);
    $this->load->view('hris_ace/hris_footer');      
  }
  
  // get the employee Form to be edited
  public function edit_employee() {
    
    $this->login_check();
    $emp_id  = $this->uri->segment(3);
    $dept_id = $this->uri->segment(4);

    $result['id']          = $emp_id;    
    $result['employee']    = $this->Hris_model->get_gen_emp($emp_id);
    $result['emp_details']    = $this->Hris_model->get_emp_details($emp_id);
    $result['con_details']    = $this->Hris_model->get_emp_Contactdetails($emp_id);
    $result['salary']      = $this->Hris_model->getEmployeesalary($emp_id);
    $result['banks']       = $this->Hris_model->getbankDetails();
    $result['emp_bank_detail']       = $this->Hris_model->get_emp_bankDetails($emp_id);
    $result['personal_details'] = $this->Hris_model->get_emp_personal_details($emp_id);
    $result['religions'] = $this->Hris_model->get_all_religions();
    $result['facilities'] = $this->Hris_model->get_all_facilities();
    $result['countries'] = $this->Hris_model->get_all_countries();
    $result['emp_facilities'] = $this->Hris_model->get_emp_facilities($emp_id);
    $result['dependent']   = $this->Hris_model->getDependent($emp_id);
    $result['nominee']     = $this->Hris_model->getNominee($emp_id);
    $result['medical']     = $this->Hris_model->getmedicalDetails($emp_id);
    $result['education']   = $this->Hris_model->getEducation($emp_id);
    $result['certification']   = $this->Hris_model->getCertification($emp_id);
    $result['skills']      = $this->Hris_model->getSkillsdetails($emp_id);
    $result['lang']        = $this->Hris_model->getlangdetails($emp_id);
    $result['member']      = $this->Hris_model->getmembership($emp_id);
    $result['license']     = $this->Hris_model->getlicenseDetails($emp_id);
    $result['reference']   = $this->Hris_model->getReference($emp_id);
    $result['document']    = $this->Hris_model->getDocument($emp_id);
    $result['docs'] = $this->Hris_model->get_all_documents();
    $result['department']  = $this->Hris_model->getAllDepartments();
    $result['designations'] = $this->Hris_model->DepartmentDesignations($dept_id);
    $result['designation'] = $this->Hris_model->DepartmentDesignations($dept_id, $emp_id);
    $result['exp']         = $this->Hris_model->getexpDetails($emp_id);
    $result['relations'] = $this->Hris_model->get_all_relations();
    $result['social'] = $this->Hris_model->get_all_socials($emp_id);
    $result['cities']      = $this->Hris_model->getAllCities();
    $result['campus']      = $this->Hris_model->getAllCampuses();
    $result['company']     = $this->Hris_model->getAllCompany();
    
   
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/edit_employee', $result);
    $this->load->view('hris_ace/hris_footer');
  }
  
  public function update_employee()
  {
    $this->login_check();    
    $emp_id  = $this->input->post('emp_id');
    $dept_id = $this->input->post('record_department');
    
//    $this->form_validation->set_rules('employee_name', 'Employee Name', 'required');
//    $this->form_validation->set_rules('father_name', 'Father Name', 'required');
//    //$this->form_validation->set_rules('employee_dob', 'Date of Birth', 'required');
//    //$this->form_validation->set_rules('gender', 'Gender', 'required');
//    $this->form_validation->set_rules('highest_qualification', 'Highest Qualification', 'required');
//    $this->form_validation->set_rules('emp_cnic', 'CNIC', 'required');
//    $this->form_validation->set_rules('permanent_address', 'Permanant Address', 'required');
//    $this->form_validation->set_rules('permanent_contact', 'Permanent Contact', 'required');
//    $this->form_validation->set_rules('mobile_1', 'Mobile 1', 'required');
//    $this->form_validation->set_rules('emergency_contact', 'Emergency Contact', 'required');
//    $this->form_validation->set_rules('employee_code', 'Employee Code', 'required');
//    $this->form_validation->set_rules('record_designation', 'Designation', 'required');
//    $this->form_validation->set_rules('record_company', 'Company Name', 'required');
//    $this->form_validation->set_rules('record_department', 'Department', 'required');
//    $this->form_validation->set_rules('campus', 'Campus', 'required');
//    $this->form_validation->set_rules('employee_type', 'Employee Type', 'required');
//    $this->form_validation->set_rules('employee_status', 'Employee Status', 'required');
//    $this->form_validation->set_rules('joining_date', 'Joining Date', 'required');
//    $this->form_validation->set_rules('record_starting_salary', 'Starting Salary', 'required');
//    $this->form_validation->set_rules('current_salary', 'Current Salary', 'required');
    
    if($this->form_validation->run() == FALSE)
    {
      $result['employee']    = $this->Hris_model->getEmployee($emp_id);
      $result['dependent']   = $this->Hris_model->getDependent($emp_id);
      $result['nominee']     = $this->Hris_model->getNominee($emp_id);
      $result['reference']   = $this->Hris_model->getReference($emp_id);
      $result['document']    = $this->Hris_model->getDocument($emp_id);
      $result['education']   = $this->Hris_model->getEducation($emp_id);
      $result['department']  = $this->Hris_model->getAllDepartments();
      //$result['designation'] = $this->Hris_model->DepartmentDesignations($dept_id);
      $result['cities']      = $this->Hris_model->getAllCities();
      $result['campus']      = $this->Hris_model->getAllCampuses();

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/edit_employee', $result);
      $this->load->view('hris_ace/hris_footer');
    }
    else
    {
      //----- Employee Tables Fields Name -----\\
      $contact_field    = $this->Hris_model->hr_contact_fields();
      $education_field  = $this->Hris_model->hr_education_fields();
      $experience_field = $this->Hris_model->hr_experience_fields();
      $record_field     = $this->Hris_model->hr_record_fields();

      //----- Employee Image Upload -----\\
      if ($_FILES['emp_pic']['name']) 
      {
          $empImageName            = $_FILES['emp_pic']['name'];
          $config['upload_path']   = 'assets/images';
          $config['file_name']     = $empImageName;
          $config['overwrite']     = false;
          $config["allowed_types"] = 'jpg|jpeg|png|gif';
          $config["max_size"]      = 5024;
          $config["max_width"]     = 1024;
          $config["max_height"]    = 1000;
          $this->load->library('upload', $config);

          $imagePath = "assets/images/".$_FILES['emp_pic']['name'];

          $this->upload->do_upload('emp_pic');
  //            echo $this->upload->display_errors();          
      }
      else
      {
        $imagePath = $this->input->post('old_emp_pic');
      }

      //----- Employee Contact Data Array -----\\
      $contact_data = array(
          $contact_field[1]  => $this->input->post('employee_name'),
          $contact_field[2]  => $this->input->post('father_name'),
          $contact_field[3]  => $this->input->post('employee_dob'),
          $contact_field[4]  => $this->input->post('place_birth'),
          $contact_field[5]  => $this->input->post('gender'),
          $contact_field[6]  => $this->input->post('blood_group'),
          $contact_field[7]  => $this->input->post('marital_status'),
          $contact_field[8]  => $this->input->post('religion'),
          $contact_field[9]  => $this->input->post('highest_qualification'),
          $contact_field[10] => $this->input->post('emp_cnic'),
          $contact_field[11] => $imagePath,
          $contact_field[12] => $this->input->post('employee_address'),
          $contact_field[13] => $this->input->post('mailing_type'),
          $contact_field[14] => $this->input->post('mailing_contact'),
          $contact_field[15] => $this->input->post('permanent_address'),
          $contact_field[16] => $this->input->post('permanent_type'),
          $contact_field[17] => $this->input->post('permanent_contact'),
          $contact_field[18] => $this->input->post('mobile_1'),
          $contact_field[19] => $this->input->post('mobile_2'),
          $contact_field[20] => $this->input->post('email_1'),
          $contact_field[21] => $this->input->post('email_2'),
          $contact_field[22] => $this->input->post('emergency_contact')
      );
      
      
      //  Update Dependent values \\
      $dependent_id            = $this->input->post('dependent_id'); 
      $dep_pre_count           = $this->input->post('dep_count'); 
      $dependent_name          = $this->input->post('dependent_name');
      $dep_father_name         = $this->input->post('dependent_father_name');
      $dependent_cnic          = $this->input->post('dependent_cnic');
      $dependent_relation      = $this->input->post('dependent_relation');
           
      for($i=0; $i < $dep_pre_count; $i++)
      {
        if(!empty($dependent_name))
        {
          $dependent_data = array(
              'dependent_name'          => $dependent_name[$i],
              'dep_father_husband_name' => $dep_father_name[$i],
              'dependent_cnic'          => $dependent_cnic[$i],
              'dependent_relation'      => $dependent_relation[$i] 
          );          
        }           
        
        $dependent_all_data[] = $dependent_data;
      }
//      echo '<pre>';
//      print_r($dependent_all_data);

      
      // Add More Dependents
      $dep_new_count = count($dependent_name);
      if($dep_new_count > $dep_pre_count)
      {
//        $rem_dep = $dep_new_count - $dep_pre_count;        
        for($i=$dep_pre_count; $i < $dep_new_count; $i++)
        {
          if(!empty($dependent_name[$i]))
          {
            $dependent_data = array(
                'dependent_name'          => $dependent_name[$i],
                'dep_father_husband_name' => $dep_father_name[$i],
                'dependent_cnic'          => $dependent_cnic[$i],
                'dependent_relation'      => $dependent_relation[$i],
                'emp_id'                  => $emp_id
            );          
            
          $this->Hris_model->addDependent($dependent_data);
          }
        }
      }      
      
      // Update Nominee Values \\
      $nominee_id           = $this->input->post('nominee_id');
      $nom_pre_count        = $this->input->post('nom_count');
      $nominee_name         = $this->input->post('nominee_name');
      $nominee_father_name  = $this->input->post('nominee_father_name');
      $nominee_cnic         = $this->input->post('nominee_cnic');
      $nominee_relation     = $this->input->post('nominee_relation');
      
      for($i=0; $i < $nom_pre_count; $i++)
      {
        if(!empty($nominee_name))
        {
          $nominee_data = array(
            'nominee_name'                => $nominee_name[$i],
            'nominee_father_husband_name' => $nominee_father_name[$i],
            'nominee_cnic'                => $nominee_cnic[$i],
            'nominee_relation'            => $nominee_relation[$i]          
          );          
        }
        
        $nominee_all_data[] = $nominee_data;
      }
//      echo '<pre>';
//      print_r($nominee_all_data);
      
      // Add More Nominees
      $nom_new_count = count($nominee_name);      
      if($nom_new_count > $nom_pre_count)
      {        
//        $rem_nominee = $nom_new_count - $nom_pre_count;
        for($i=$nom_pre_count; $i < $nom_new_count; $i++)
        {
          if(!empty($nominee_name[$i]))
          {
            $nominee_data = array(
              'nominee_name'                => $nominee_name[$i],
              'nominee_father_husband_name' => $nominee_father_name[$i],
              'nominee_cnic'                => $nominee_cnic[$i],
              'nominee_relation'            => $nominee_relation[$i],          
              'emp_id'                      => $emp_id          
            ); 
            
            $this->Hris_model->addNominee($nominee_data);
          }          
        }        
      }
      
      
      //--- Education(Degree and Course) Data Inputs ---\\
      $degree_education_id    = $this->input->post('degree_education_id');      
      $course_education_id    = $this->input->post('course_education_id');      
      $edit_degree_title      = $this->input->post('edit_degree_title');
      $edit_degree_institute  = $this->input->post('edit_degree_institute');
      $edit_degree_from       = $this->input->post('edit_degree_from');
      $edit_degree_to         = $this->input->post('edit_degree_to');
      $edit_degree_year       = $this->input->post('edit_degree_year');
      $edit_degree_grade      = $this->input->post('edit_degree_grade');
      $edit_degree_division   = $this->input->post('edit_degree_division');
      $edit_degree_subjects   = $this->input->post('edit_degree_subjects');

      $edit_course_title      = $this->input->post('edit_course_title');
      $edit_course_institute  = $this->input->post('edit_course_institute');
      $edit_course_address    = $this->input->post('edit_course_address');
      $edit_course_duration   = $this->input->post('edit_course_duration');
      $edit_course_from       = $this->input->post('edit_course_from');
      $edit_course_to         = $this->input->post('edit_course_to');
      $edit_course_city       = $this->input->post('edit_course_city');
      
      $degree_count = count($edit_degree_title);   
      
      for($i = 0; $i < $degree_count; $i++)
      {
        if($edit_degree_title[$i]!='')
        {
          $edit_degree_data = array(       
              $education_field[1]   => $edit_degree_title[$i],      
              $education_field[2]   => $edit_degree_institute[$i],      
              $education_field[3]   => $edit_degree_from[$i],      
              $education_field[4]   => $edit_degree_to[$i],      
              $education_field[5]   => $edit_degree_year[$i],      
              $education_field[6]   => $edit_degree_grade[$i],      
              $education_field[7]   => $edit_degree_division[$i],      
              $education_field[8]   => $edit_degree_subjects[$i]    
          );
          
          $degree_all_data[] = $edit_degree_data; 
        }    
      }      
//      echo '<pre>';
//      print_r($degree_all_data);
      
      $course_count = count($edit_course_title);   
      
      for($i = 0; $i < $course_count; $i++)
      {
        if($edit_course_title[$i]!='')
        {
          $edit_course_data = array(            
              $education_field[9]   => $edit_course_title[$i],      
              $education_field[10]  => $edit_course_institute[$i],      
              $education_field[11]  => $edit_course_address[$i],      
              $education_field[12]  => $edit_course_duration[$i],      
              $education_field[13]  => $edit_course_from[$i],      
              $education_field[14]  => $edit_course_to[$i],      
              $education_field[15]  => $edit_course_city[$i]    
          );
          
          $course_all_data[] = $edit_course_data; 
        }        
      }
//      echo '<pre>';
//      print_r($course_all_data);
//      
      // If Add More Education Data    
      if($this->input->post('degree_title')!='' || $this->input->post('course_title')!= '')
      {
        //--- New Education(Degree and Course) Data Inputs ---\\
        $degree_title      = $this->input->post('degree_title');
        $degree_institute  = $this->input->post('degree_institute');
        $degree_from       = $this->input->post('degree_from');
        $degree_to         = $this->input->post('degree_to');
        $degree_year       = $this->input->post('degree_year');
        $degree_grade      = $this->input->post('degree_grade');
        $degree_division   = $this->input->post('degree_division');
        $degree_subjects   = $this->input->post('degree_subjects');

        $course_title      = $this->input->post('course_title');
        $course_institute  = $this->input->post('course_institute');
        $course_address    = $this->input->post('course_address');
        $course_duration   = $this->input->post('course_duration');
        $course_from       = $this->input->post('course_from');
        $course_to         = $this->input->post('course_to');
        $course_city       = $this->input->post('course_city');

        $add_degree_count = count($degree_title);   
        $add_course_count = count($course_title);
        $total_add = $add_degree_count + $add_course_count; 

        for($i = 0; $i < $total_add; $i++)
        {
          if($degree_title[$i]!='' || $course_title[$i]!='')
          {
            $education_data = array(     
                $education_field[1]   => $degree_title[$i],      
                $education_field[2]   => $degree_institute[$i],      
                $education_field[3]   => $degree_from[$i],      
                $education_field[4]   => $degree_to[$i],      
                $education_field[5]   => $degree_year[$i],      
                $education_field[6]   => $degree_grade[$i],      
                $education_field[7]   => $degree_division[$i],      
                $education_field[8]   => $degree_subjects[$i],      
                $education_field[9]   => $course_title[$i],      
                $education_field[10]  => $course_institute[$i],      
                $education_field[11]  => $course_address[$i],      
                $education_field[12]  => $course_duration[$i],      
                $education_field[13]  => $course_from[$i],      
                $education_field[14]  => $course_to[$i],      
                $education_field[15]  => $course_city[$i],     
                $education_field[16]  => $emp_id     
            );
            
            $this->Hris_model->addEmployeeEducation($education_data);              
          }            
        }
      }
//      
//      echo '<pre>';
//      print_r($education_data);die;
      
      //----- Employee Job Experience Data Array -----\\
      $experience_data = array(
          $experience_field[1]  => $this->input->post('company_name'),
          $experience_field[2]  => $this->input->post('company_location'),
          $experience_field[3]  => $this->input->post('nature_of_business'),
          $experience_field[4]  => $this->input->post('job_title'),
          $experience_field[5]  => $this->input->post('job_from'),
          $experience_field[6]  => $this->input->post('job_to'),
          $experience_field[7]  => $this->input->post('reason_for_leaving'),
          $experience_field[8]  => $this->input->post('starting_salary'),
          $experience_field[9]  => $this->input->post('last_drawn_salary')
      );

      // Employee Reference Values \\
      $reference_id           = $this->input->post('reference_id');
      $ref_pre_count          = $this->input->post('ref_count');
      $reference_name         = $this->input->post('reference_name');
      $business_name          = $this->input->post('business_name');
      $reference_job_title    = $this->input->post('reference_job_title');
      $reference_type         = $this->input->post('reference_type');
      $reference_address      = $this->input->post('reference_address');
      $reference_contact      = $this->input->post('reference_contact');
      $reference_email        = $this->input->post('reference_email');
            
      for($i=0; $i <= $ref_pre_count; $i++)
      {
        if(!empty($reference_name))
        {
          $reference_data = array(
              'reference_name'                    => $reference_name[$i],
              'reference_company_business_name'   => $business_name[$i],
              'reference_job_title'               => $reference_job_title[$i],
              'reference_type'                    => $reference_type[$i],
              'reference_address'                 => $reference_address[$i],
              'reference_contact_no'              => $reference_contact[$i],         
              'reference_email'                   => $reference_email[$i]         
          );
        }                  
        $reference_all_data[] = $reference_data;
      }
//      echo '<pre>';
//      print_r($reference_all_data);

      // Add More References
      $ref_new_count = count($reference_name);
      if($ref_new_count > $ref_pre_count)
      {
        for($i=$ref_pre_count; $i < $ref_new_count; $i++)
        {
          if(!empty($reference_name[$i]))
          {
            $reference_data = array(
                'reference_name'                    => $reference_name[$i],
                'reference_company_business_name'   => $business_name[$i],
                'reference_job_title'               => $reference_job_title[$i],
                'reference_type'                    => $reference_type[$i],
                'reference_address'                 => $reference_address[$i],
                'reference_contact_no'              => $reference_contact[$i],
                'reference_email'                   => $reference_email[$i],
                'emp_id'                            => $emp_id         
            );
            
          $this->Hris_model->addReference($reference_data);
          }                  
        }        
      }
      
      // Employee Document Values \\
      $document_id     = $this->input->post('document_id');
      $doc_pre_count   = $this->input->post('doc_count');
      $document_title  = $this->input->post('document_title');
      $document_type   = $this->input->post('document_type');
      $place_of_issue  = $this->input->post('place_of_issue');
      $issue_date      = $this->input->post('issue_date');
      $expiry_date     = $this->input->post('expiry_date');
      $description     = $this->input->post('description');
      
      $old_docImage = $this->input->post('old_document_attch');
      $fil = $_FILES['document_attch']['name'];
//      $update_count = count($old_docImage);
      $doc_new_count = count($document_title);
         
    if($_FILES['document_attch']['name'])
     {
      foreach($_FILES as $key=>$value){
        for( $k = 0; $k < $doc_pre_count ; $k++ ){
          if(!empty($fil[$k])){
            $_FILES['document_attch']['name']     = $value['name'][$k];
            $_FILES['document_attch']['type']     = $value['type'][$k];
            $_FILES['document_attch']['tmp_name'] = $value['tmp_name'][$k];
            $_FILES['document_attch']['error']    = $value['error'][$k];
            $_FILES['document_attch']['size']     = $value['size'][$k]; 
            $ImageName                            = $fil[$k];
            $config['upload_path']                = 'assets/images';
            $config['file_name']                  = $ImageName;
            $config['overwrite']                  = true;
            $config["allowed_types"]              = 'jpg|jpeg|png|gif';
            $config["max_size"]                   = 5024;
            $config["max_width"]                  = 1024;
            $config["max_height"]                 = 1000;

            $this->load->library('upload', $config);
            $oldDocPath[] = 'assets/images/'.$ImageName;

            $this->upload->do_upload('document_attch');
//                echo $this->upload->display_errors();    
          }
          else
          {
            $oldDocPath[] = $old_docImage[$k];
          }               
        }
        };
       }  
     
      for($i=0; $i <= $doc_pre_count; $i++)
      {
        if(!empty($document_title))
        {
          $document_edit_data = array(
              'document_title' => $document_title[$i],
              'document_type'  => $document_type[$i],
              'place_of_issue' => $place_of_issue[$i],
              'issue_date'     => $issue_date[$i],
              'expiry_date'    => $expiry_date[$i],
              'attachment'     => $oldDocPath[$i],
              'description'    => $description[$i]        
          );          
        } 
        
        $document_all_data[] = $document_edit_data;        
      } 
//      echo '<pre>';
//      print_r($document_all_data);
//      die;
      
     if($_FILES['document_attch']['name'][$doc_pre_count])
     {
      foreach($_FILES as $key=>$value){
        for( $k = $doc_pre_count; $k < $doc_new_count ; $k++ ){
            $_FILES['document_attch']['name']     = $value['name'][$k];
            $_FILES['document_attch']['type']     = $value['type'][$k];
            $_FILES['document_attch']['tmp_name'] = $value['tmp_name'][$k];
            $_FILES['document_attch']['error']    = $value['error'][$k];
            $_FILES['document_attch']['size']     = $value['size'][$k]; 
            $ImageName                            = $fil[$k];
            $config['upload_path']                = 'assets/images';
            $config['file_name']                  = $ImageName;
            $config['overwrite']                  = true;
            $config["allowed_types"]              = 'jpg|jpeg|png|gif';
            $config["max_size"]                   = 5024;
            $config["max_width"]                  = 1024;
            $config["max_height"]                 = 1000;

            $this->load->library('upload', $config);
            $docPath[] = 'assets/images/'.$ImageName;

            $this->upload->do_upload('document_attch');
//                echo $this->upload->display_errors();              
                           
          }
        };
       }    
      else
      {
        $docPath[] = "NULL";
      }
      
      // Add More Documents
      if($doc_new_count > $doc_pre_count || $doc_pre_count == 0)
      {
        for($i=$doc_pre_count; $i < $doc_new_count; $i++)
        {
          if(!empty($document_title[$i]))
          {
            $document_data = array(
                'document_title' => $document_title[$i],
                'document_type'  => $document_type[$i],
                'place_of_issue' => $place_of_issue[$i],
                'issue_date'     => $issue_date[$i],
                'expiry_date'    => $expiry_date[$i],
                'attachment'     => $docPath[$i],
                'description'    => $description[$i],
                'emp_id'         => $emp_id          
            );
            $this->Hris_model->addDocument($document_data);
          }
          
//      echo '<pre>';
//      print_r($document_data);
        }
      }
      
      //----- Employee Record Data Array -----\\
      $record_data = array(
          $record_field[1]   => $this->input->post('employee_code'),
          $record_field[2]   => $this->input->post('emp_record_name'),
          $record_field[3]   => $this->input->post('record_designation'),
          $record_field[4]   => $this->input->post('record_company'),
          $record_field[5]   => $this->input->post('record_department'),
          $record_field[6]   => $this->input->post('record_grade'),
          $record_field[7]   => $this->input->post('reporting_to'),
          $record_field[8]   => $this->input->post('campus'),
          $record_field[9]   => $this->input->post('employee_type'),
          $record_field[10]  => $this->input->post('employee_status'),
          $record_field[11]  => $this->input->post('shift'),
          $record_field[12]  => $this->input->post('social_security'),
          $record_field[13]  => $this->input->post('joining_date'),
          $record_field[14]  => $this->input->post('confirmation_date'),
          $record_field[15]  => $this->input->post('record_starting_salary'),
          $record_field[16]  => $this->input->post('current_salary')
      );
      
      $res = $this->Hris_model->updateEmployee($emp_id, $contact_data, $dependent_all_data, $dependent_id, $nominee_all_data, $nominee_id, $degree_all_data, $course_all_data, $degree_education_id, $course_education_id, $experience_data, $reference_all_data, $reference_id, $document_all_data, $document_id, $record_data);
      if($res)
      {
        $this->session->set_userdata('success_msg', "Employee Successfully Updated");
        redirect('hris/view_employees');
      }
      else
      {
        $this->session->set_userdata('error_msg', "ERROR");
        redirect('hris/view_employees');
      }
    }      
  }
  
  // Employee Code check
  public function check_employee()
  {
    $this->login_check();
    
    $emp_data = array(
          'emp_code' => $this->input->get('emp_code')
      );
      
      $res = $this->Hris_model->CheckEmployee($emp_data);
      if($res)
      {
        echo "Employee Code Already Exists";
      }
      else
      {
        echo "Available";
      }    
  }
  
  // Employee Report Page
  public function report_employee() {
    
    $this->login_check();
    $result['department'] = $this->Hris_model->getAllDepartments();
    $result['company'] = $this->Hris_model->getCampany();

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/employee_report', $result);
    $this->load->view('hris_ace/hris_footer');
  }
  
  // Employee Report
  public function search_report_employee() {
    
    $this->login_check();    
    $dept_id = $this->input->post('department');
    $comp_id = $this->input->post('company');
    $dept_data = array(
        'hr_employee_record.department_id' => $dept_id,
        'hr_employee_record.record_company_name' => $comp_id        
    );
    
    $result['employee'] = $this->Hris_model->searchEmployee($dept_data);    
    $res = $result['employee'];
    
    if(!empty($res))
    {
      $this->load->view('hris_ace/hris_header');          
      $this->load->view('hris/employee/search_employee', $result);
      $this->load->view('hris_ace/hris_footer');          
    }
    else
    {      
      $this->session->set_userdata('error_msg', "Record not Found");
      redirect('hris/report_employee');
    }
  }
  
  
  public function faculty_members(){
      $this->login_check();
      $result['campus']     = $this->Hris_model->getAllCampuses();
      //$result['employee'] = $this->Hris_model->get_faculty_report();
      $this->load->view('hris_ace/hris_header');
      //$this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/faculty_memebers', $result);
      $this->load->view('hris_ace/hris_footer'); 
  }
  
  public function search_campus_employees(){
      $this->login_check();
      $campus_id = $_POST['campus'];
      $result['campus']     = $this->Hris_model->getAllCampuses();
      $result['employee'] = $this->Hris_model->get_faculty_report($campus_id);
      $this->load->view('hris_ace/hris_header');
      //$this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/faculty_memebers', $result);
      $this->load->view('hris_ace/hris_footer');
  }
  
  
  public function get_ajax_departments(){
      $this->login_check();
      $company_id = $_GET['company_id'];
      
      $result['department'] = $this->Hris_model->get_departs($company_id);
       $this->load->view('hris/employee/depart_partial', $result);
  }
  
  // view Employee complete Profile
  public function employee_profile()
  {
    $this->login_check();
    $emp_id = $this->uri->segment(3);

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
    
    $dob                   =    $result['employee'][0]['date_of_birth'];
    $result['age']         =    $this->get_age($dob);
   
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');      
    $this->load->view('hris/employee/employee_profile', $result);      
    $this->load->view('hris_ace/hris_footer');      
  }
  
  // Employee Payroll Page
  public function payroll_employee() {
    
    $this->login_check();
    $result['department'] = $this->Hris_model->getAllDepartments();
    $result['campus']     = $this->Hris_model->getAllCampuses();

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/payroll', $result);
    $this->load->view('hris_ace/hris_footer');
  }
  
  // get Designations by Department
  public function desigantion_by_department_id() {
    
    $this->login_check();    
    $department_id = $this->input->get('dept_id');
    
    $result['designations'] = $this->Hris_model->DepartmentDesignations($department_id);  
    $result['employee'] = $this->Hris_model->getAllEmployees();
    $res = $result['designations']; 
        
    if(!empty($res))
    {
      $this->load->view('hris/employee/department_designations', $result);
    }
    else
    {
      echo "No Designation";
    }
  }
  
  // get Employee by Department for Payroll
  public function employee_by_department() {
    
    $this->login_check();    
    $dept_id   = $this->input->post('department');
    $campus_id = $this->input->post('campus');
    
    if(!empty($dept_id))
    {
      $dept_data = array(
        'hr_employee_record.department_id' => $dept_id        
      );
      
      $result['employee'] = $this->Hris_model->searchEmployee($dept_data);     
    }
    else
    {
      $campus_data = array(
        'hr_employee_record.campus_id' => $campus_id        
      );
      
      $result['employee'] = $this->Hris_model->searchEmployeeByCampus($campus_data);
    }    
       
    if($result)
    {
      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/payroll_employees', $result);
      $this->load->view('hris_ace/hris_footer');
    }
  }
  
  // Employee Pay Slip Generate
  public function payslip_generate()
  {
    $emp_id = $this->input->post('chk_emp_id');
    echo '<pre>';
    print_r($emp_id);die;
    
    for($i=0; $i<count($emp_id); $i++)
    {
      $res = $this->Admin_model->getPayrollEmployee($emp_id[$i]);              
    }
    
    
    
    //--- Student's Password send @email ---\\  
//              $config = Array(
//                  'protocol'  => 'smtp',
//                  'smtp_host' => 'ssl://smtp.googlemail.com',
//                  'smtp_port' => 465,
//                  'smtp_user' => 'hafiz.mabuzar@superior.edu.pk', // change it to yours
//                  'smtp_pass' => 'hafizmabuzarsuperior', // change it to yours
//                  'mailtype'  => 'html',
//                  'charset'   => 'iso-8859-1',
//                  'wordwrap'  => TRUE
//              );
//
//              $message = 'Testing email sending';
//              $this->load->library('email', $config);
//              $this->email->set_newline("\r\n");
//              $this->email->from('hafiz.mabuzar@superior.edu.pk'); // change it to yours
//              $this->email->to('hafizmabuzar@gmail.com');// change it to yours
//              $this->email->subject('Password');
//              $this->email->message('<b>Your Password is :</b> student123');
//              $this->email->send();
//    //           show_error($this->email->print_debugger());
    
    
  }
  
  
  //-*-*-*-*- Department Module Start -*-*-*-*-\\
  
  // Add Department Form
  public function add_department_form() {

    $this->login_check();
    $result['roles']   = $this->Hris_model->getRoles();
    $result['company'] = $this->Hris_model->getAllCompany();
    
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/department/add_department', $result);
    $this->load->view('hris_ace/hris_footer'); 
  }

  // Add Department in database
  public function add_department() {

    $this->login_check();

    $this->form_validation->set_rules('department_name', 'Department Name', 'required');
    $this->form_validation->set_rules('roles', 'Department Role', 'required');
    $this->form_validation->set_rules('company', 'Company', 'required');

    if ($this->form_validation->run() == FALSE) {
      
      $result['roles'] = $this->Hris_model->getRoles();
    
      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/department/add_department', $result);
      $this->load->view('hris_ace/hris_footer'); 
    } 
    else {
      $department_data = array(
          'department_name' => $this->input->post('department_name'),
          'account_role_id' => $this->input->post('roles'),
          'company_id'      => $this->input->post('company')
      );
      
      // check Department already exitsts
      $res = $this->Hris_model->checkDepartment($department_data);
      if ($res) {
        $this->session->set_userdata('error_msg', 'Department Already Exists');
        redirect('hris/add_department_form');
      } 
      else {
        $result = $this->Hris_model->addDepartment($department_data);
        
        if ($result) {
          $this->session->set_userdata('success_msg', 'Department Added Successfully');
          redirect('hris/view_departments');
        }
      }
    }
  }

  // display all the Department 
  public function view_departments() {
    $this->login_check();

    $result['department'] = $this->Hris_model->getAllDepartments();

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/department/view_departments', $result);
    $this->load->view('hris_ace/hris_footer');
  }

  public function edit_department() {
    $this->login_check();

    $dept_id = $this->uri->segment(3);
    $result['department'] = $this->Hris_model->getDepartment($dept_id);
    $result['roles']      = $this->Hris_model->getRoles();
    $result['company']    = $this->Hris_model->getAllCompany();

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/department/edit_department', $result);
    $this->load->view('hris_ace/hris_footer');
  }

  // update the Program Dapertment name 
  public function update_department() {

    $this->login_check();    
    $dept_id = $this->input->post('department_id');
    
    $this->form_validation->set_rules('department_name', 'Department Name', 'required');
    $this->form_validation->set_rules('roles', 'Department Role', 'required');
    
    if ($this->form_validation->run() == FALSE) {
      
      $result['department'] = $this->Hris_model->getDepartment($dept_id);
      $result['roles']      = $this->Hris_model->getRoles();

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/department/edit_department', $result);
      $this->load->view('hris_ace/hris_footer');
    }
    else
    {
      // check Department Name already exitsts
      $department_data = array(
            'department_name' => $this->input->post('department_name'),
            'account_role_id' => $this->input->post('roles'),
            'company_id'      => $this->input->post('company')
        );
      $res = $this->Hris_model->checkDepartment($department_data);
      if ($res) {
        $this->session->set_userdata('error_msg', 'Department Already Exists');

        $result['department'] = $this->Hris_model->getDepartment($dept_id);
        $result['roles']      = $this->Hris_model->getRoles();

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/department/edit_department', $result);
        $this->load->view('hris_ace/hris_footer');
      }
      else {
        $department_data = array(
            'department_name' => $this->input->post('department_name'),
            'account_role_id' => $this->input->post('roles'),
            'company_id'      => $this->input->post('company')
        );
        $result = $this->Hris_model->updateDepartment($dept_id, $department_data);

        if ($result) {
          $this->session->set_userdata('success_msg', 'Department updated Successfully');
          redirect('hris/view_departments');
        }
      }
      
    }  
    
  }
  
  //---------------End of Departments----------------\\
  
    
  // Add Designation Form
  public function add_designation_form() {

    $this->login_check();
    $result['department'] = $this->Hris_model->getAllDepartments();
    $result['company'] = $this->Hris_model->getAllCompany();
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/designation/add_designation', $result);
    $this->load->view('hris_ace/hris_footer'); 
  }

  // Add Designation in database
  public function add_designation() {

    $this->login_check();
    
//    $dep = $this->input->post('department');
//    print_r($dep);die;

    $this->form_validation->set_rules('designation_title', 'Designation', 'required');
    $this->form_validation->set_rules('department', 'Department', 'required');

    if ($this->form_validation->run() == FALSE) {

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/designation/add_designation');
      $this->load->view('hris_ace/hris_footer');
    } 
    else 
    {      
      $departments = $this->input->post('department');
      $count = count($departments);

      for($i=0; $i < $count; $i++)
      {
        $designation_data = array(
          'designation_title' => $this->input->post('designation_title'),
          'department_id'     => $departments[$i]
        );
      
        // check Designation already exitsts
        $res = $this->Hris_model->checkDesignation($designation_data);
        if ($res) 
        {
          $exist_dept = $this->Hris_model->getDepartment($departments[$i]); 
          $dept_name = $exist_dept[0]['department_name'];
          
          $this->session->set_userdata('error_msg', 'Designation of '.$dept_name.' Already Exists');
          redirect('hris/add_designation_form');
        }
        
        $result = $this->Hris_model->addDesigantion($designation_data);
      }
      
      if ($result) 
      {
          $this->session->set_userdata('success_msg', 'Designation Added Successfully');
          redirect('hris/view_designations');
      }
    }     
  }

  // display all the Department 
  public function view_designations() {
    $this->login_check();

    $result['designation'] = $this->Hris_model->getAllDesignations();

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/designation/view_designations', $result);
    $this->load->view('hris_ace/hris_footer');
  }

  // get the name of Department to be edited

  public function edit_designation() {
    $this->login_check();

    $desig_id = $this->uri->segment(3);
    $result['designation'] = $this->Hris_model->getDesignation($desig_id);
    $result['department']  = $this->Hris_model->getAllDepartments();
    $result['company'] = $this->Hris_model->getAllCompany();

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/designation/edit_designation', $result);
    $this->load->view('hris_ace/hris_footer');
  }

  // update the Program Dapertment name 
  public function update_designation() {

    $this->login_check();    
    $desig_id = $this->input->post('designation_id');
    
    $this->form_validation->set_rules('designation_title', 'Designation', 'required');
    $this->form_validation->set_rules('department', 'Department', 'required');
    
    if ($this->form_validation->run() == FALSE) {
      
      $result['designation'] = $this->Hris_model->getDesignation($desig_id);
      $result['department']  = $this->Hris_model->getAllDepartments();

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/designation/edit_designation', $result);
      $this->load->view('hris_ace/hris_footer');
    }  
    else
    {
      // check Designation already exitsts
      $designation_data = array(
            'designation_title' => $this->input->post('designation_title'),
            'department_id'     => $this->input->post('department')
        );
      $res = $this->Hris_model->checkDesignation($designation_data);
      if ($res) {
        $this->session->set_userdata('error_msg', 'Designation Already Exists');

        $result['designation'] = $this->Hris_model->getDesignation($desig_id);      
        $result['department']  = $this->Hris_model->getAllDepartments();

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/designation/edit_designation', $result);
        $this->load->view('hris_ace/hris_footer');
      }
      else {
        $designation_data = array(
            'designation_title' => $this->input->post('designation_title'),
            'department_id'     => $this->input->post('department')
        );
        $result = $this->Hris_model->updateDesignation($desig_id, $designation_data);

        if ($result) {
          $this->session->set_userdata('success_msg', 'Designation updated Successfully');
          redirect('hris/view_designations');
        }
      }
    }    
      
  }
  
  //---------------End of Designatin----------------\\
     
  
  //  Add Employee Increment
  public function add_increment()
  {
    $this->login_check();     
    
    $this->form_validation->set_rules('increment_amount', 'Increment', 'required');
    $this->form_validation->set_rules('increment_type', 'Increment Type', 'required');
    if($this->input->post('increment_type') == 'Temporary')
    {      
      $this->form_validation->set_rules('range_date', 'Date From-To', 'required');
    }
    else
    {
      $this->form_validation->set_rules('date', 'Date', 'required');
    }    
    
    if ($this->form_validation->run() == FALSE) {
      
      $emp_data = array('emp_id' => $this->input->post('emp_id'), 'status' => 1);
      $result['salary']   = $this->Hris_model->getSalaryHistory($emp_data); 
      $result['employee'] = $this->Hris_model->getEmployee($this->input->post('emp_id'));
      
      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');      
      $this->load->view('hris/employee/increment_employee', $result);      
      $this->load->view('hris_ace/hris_footer');   
    }
    else
    {
      $emp_id           = $this->input->post('emp_id');
      $range            = $this->input->post('range_date');
      $updated_salary   = $this->input->post('updated_current_salary');      
      $salary           = $this->input->post('current_salary'); 
      $amount           = $this->input->post('increment_amount'); 
      $type             = $this->input->post('increment_type');
      
      $replace_amount         = str_replace(',', '', $amount);
      $replace_updated_salary = str_replace(',', '', $updated_salary); 
      $replace_salary         = str_replace(',', '', $salary); 
      
      if($type == 'Temporary')
      {
          $date_range = explode("-", $range);
          if(strtotime($date_range[0]) < strtotime(date('Y-m-d')))
          {
            if(empty($updated_salary))
            {                
              $add_salary = $replace_salary + $replace_amount;
            }
            else
            { 
              $add_salary = $replace_updated_salary + $replace_amount;
            }

            $new_salary = number_format($add_salary);
          }
          else
          {
            if(empty($updated_salary))
            {
              $new_salary = $salary;
            }
            else
            {
              $new_salary = $updated_salary;
            }
          }        
      }
      else
      {
          if(strtotime($this->input->post('date')) < strtotime(date('Y-m-d')))
          {
            if(empty($updated_current_salary))
            {                
              $add_salary = $replace_salary + $replace_amount;
            }
            else
            { 
              $add_salary = $replace_updated_salary + $replace_amount;
            }

            $new_salary = number_format($add_salary);
          }
          else
          {
            if(empty($updated_salary))
            {
              $new_salary = $salary;
            }
            else
            {
              $new_salary = $updated_salary;
            }            
          }        
      }
    }
      
      $increment_data = array(
          'amount'                      => $amount,
          'type'                        => $this->input->post('increment_type'),
          'date'                        => $this->input->post('date'),
          'from_date'                   => $date_range[0],
          'to_date'                     => $date_range[1],
          'detail'                      => $this->input->post('increment_detail'),
          'emp_id'                      => $this->input->post('emp_id'),
          'updated_current_salary'      => $new_salary,
          'updated_date'                => date('Y-m-d H:i:s'),
          'status'                      => 1          
      );
      
      $res = $this->Hris_model->addSalaryStatus($increment_data);
      if($res)
      {        
        $this->session->set_userdata('success_msg', 'Increment Successfully Added');
         
        $result['netSalary'] = $this->Hris_model->maxSalaryStatus($emp_id);
        $result['employee']  = $this->Hris_model->getEmployee($this->input->post('emp_id'));

        $salary_data = array(
            'emp_id' => $emp_id,
            'status' => 1
        ); 
        $result['salary']   = $this->Hris_model->getSalaryHistory($salary_data); 

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/employee/increment_employee', $result);
        $this->load->view('hris_ace/hris_footer');
      }
      else
      {
        $this->session->set_userdata('error_msg', 'Error');        
      
        $emp_data = array('emp_id' => $this->input->post('emp_id'), 'status' => 1);
        $result['salary']   = $this->Hris_model->getSalaryHistory($emp_data);         
        $result['employee'] = $this->Hris_model->getEmployee($this->input->post('emp_id'));
        
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');      
        $this->load->view('hris/employee/increment_employee', $result);      
        $this->load->view('hris_ace/hris_footer');
      }
  }
  
  // get the Increment to be edited
  public function edit_increment() {
    $this->login_check();

    $salary_id = $this->uri->segment(3);
    $emp_id    = $this->uri->segment(4);
    
    $result['salary']    = $this->Hris_model->getSalaryStatus($salary_id);
    $result['netSalary'] = $this->Hris_model->maxSalaryStatus($emp_id);

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/edit_increment', $result);
    $this->load->view('hris_ace/hris_footer');
  }
  // update Employee Increment
  public function update_increment() {
    
    $this->login_check();   
    
    $salary_id              = $this->input->post('salary_id');
    $emp_id                 = $this->input->post('emp_id');
    $old_amount             = $this->input->post('old_amount');
    $amount                 = $this->input->post('increment_amount');    
    $current_salary         = $this->input->post('current_salary');  
    $updated_current_salary = $this->input->post('updated_current_salary');  
    $type                   = $this->input->post('increment_type');
    $old_type               = $this->input->post('old_type');
    $new_salary             = $current_salary;  
    
    $this->form_validation->set_rules('increment_amount', 'Increment', 'required');
    $this->form_validation->set_rules('increment_type', 'Increment Type', 'required');
    
    if ($this->form_validation->run() == FALSE) {      
      
      $result['salary']   = $this->Hris_model->getSalaryStatus($salary_id);

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/edit_increment', $result);
      $this->load->view('hris_ace/hris_footer');
    }
    else
    {
      $range   = $this->input->post('range_date');   
      $replace_old_amount      = str_replace(',', '', $old_amount);
      $replace_amount          = str_replace(',', '', $amount); 
      $replace_salary          = str_replace(',', '', $current_salary); 
      $replace_updated_salary  = str_replace(',', '', $updated_current_salary); 
      
      if($type == 'Temporary')
      {
        $date_range = explode("-", $range);
        if(strtotime($date_range[0]) < strtotime(date('Y-m-d')))
        { 
          if($replace_old_amount != $replace_amount)
          {
              if($replace_old_amount > $replace_amount)
              {
                 $rem_amount  = $replace_old_amount - $replace_amount;
                 
                 if(empty($updated_current_salary))
                 {
                     $total_salary = $rem_amount - $replace_salary;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
                 else
                 {              
                     $total_salary = $rem_amount - $replace_updated_salary;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }                 
              }
              else
              {
                $rem_amount = $replace_amount - $replace_old_amount;
                
                if(empty($updated_current_salary))
                 {
                     $total_salary = $replace_salary + $rem_amount;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
                 else
                 {              
                     $total_salary = $replace_updated_salary + $rem_amount;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
              }              
          }
          else
          {
            if($old_type != $type)
            {
              $updated_salary = $replace_updated_salary;
            }
            else
            {
              if(empty($updated_current_salary))
              {
                $updated_salary = $replace_amount + $replace_salary;
              }
              else
              {
                $updated_salary = $replace_amount + $replace_updated_salary;
              }              
            }
          }
          
          $new_salary = number_format($updated_salary);
        }
        else
        {
           if(empty($updated_current_salary))
            {
               $new_salary = $current_salary;
            }
            else
            {
               $total_salary = $replace_updated_salary - $replace_amount;
               $updated_salary = str_replace('-', '', $total_salary); 
               $new_salary = number_format($updated_salary);
            }
        }
      }
      else
      {
        if(strtotime($this->input->post('date')) < strtotime(date('Y-m-d')))
        { 
          if($replace_old_amount != $replace_amount)
          {
              if($replace_old_amount > $replace_amount)
              {
                 $rem_amount  = $replace_old_amount - $replace_amount;
                 
                 if(empty($updated_current_salary))
                 {
                     $total_salary = $rem_amount - $replace_salary;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
                 else
                 {              
                     $total_salary = $rem_amount - $replace_updated_salary;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }                 
              }
              else
              {
                $rem_amount = $replace_amount - $replace_old_amount;
                
                if(empty($updated_current_salary))
                 {
                     $total_salary   = $replace_salary + $rem_amount;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
                 else
                 {              
                     $total_salary = $replace_updated_salary + $rem_amount;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
              }              
          }
//          else
//          {
//            if($old_type != $type)
//            {
//              $updated_salary = $replace_updated_salary;
//            }
            else
            {
              if(empty($updated_current_salary))
              {
                $updated_salary = $replace_salary + $replace_amount ;
              }
              else
              {
                $updated_salary = $replace_updated_salary + $replace_amount;
              }              
//            }
          }
          
          $new_salary = number_format($updated_salary);
        }
        else
        {
           if(empty($updated_current_salary))
            {
                $updated_salary   = $replace_salary - $replace_amount;
                $updated_salary = str_replace('-', '', $total_salary);
            }
            else
            {
                $updated_salary   = $replace_updated_salary - $replace_amount;
                $updated_salary = str_replace('-', '', $total_salary); 
            }
            
            $new_salary = number_format($updated_salary);
        }
      }
      
    }
      if($type == 'Permanent')
      {
        $increment_data = array(
          'amount'                     => $amount,
          'type'                       => $this->input->post('increment_type'),
          'date'                       => $this->input->post('date'),
          'from_date'                  => '',
          'to_date'                    => '',
          'detail'                     => $this->input->post('increment_detail'),         
          'updated_current_salary'     => $new_salary,          
          'updated_date'               => date('Y-m-d h:i:s')          
        );
      }
      else
      {
        $increment_data = array(
          'amount'                     => $amount,
          'type'                       => $this->input->post('increment_type'),
          'date'                       => '',
          'from_date'                  => $date_range[0],
          'to_date'                    => $date_range[1],
          'detail'                     => $this->input->post('increment_detail'),         
          'updated_current_salary'     => $new_salary,          
          'updated_date'               => date('Y-m-d h:i:s')          
        );
      }
      
      $res = $this->Hris_model->updateSalaryStatus($salary_id, $increment_data);
      if($res)
      {       
        $this->session->set_userdata('success_msg', 'Increment Successfully Updated');
        
        $result['netSalary'] = $this->Hris_model->maxSalaryStatus($emp_id);
        $result['employee']  = $this->Hris_model->getEmployee($emp_id);

        $salary_data = array(
            'emp_id' => $emp_id,
            'status' => 1
        ); 
        $result['salary']   = $this->Hris_model->getSalaryHistory($salary_data); 

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/employee/increment_employee', $result);
        $this->load->view('hris_ace/hris_footer');
      }
      else
      {
        $this->session->set_userdata('error_msg', 'Error');        
      
        $result['salary']   = $this->Hris_model->getSalaryStatus($salary_id);

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/employee/edit_increment', $result);
        $this->load->view('hris_ace/hris_footer');
      }      
  }
  
  // get the Employee Increments
  public function view_increment() {
    $this->login_check();
    
    $emp_id = $this->uri->segment(3);
    $result['netSalary'] = $this->Hris_model->maxSalaryStatus($emp_id);
    $result['employee']  = $this->Hris_model->getEmployee($emp_id);
    
    $salary_data = array(
        'emp_id' => $emp_id,
        'status' => 1
    ); 
    $result['salary']   = $this->Hris_model->getSalaryHistory($salary_data); 

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/increment_employee', $result);
    $this->load->view('hris_ace/hris_footer');
  }
  
  //  Add Employee Deductionde
  public function add_deduction()
  {
    $this->login_check();     
    
    $this->form_validation->set_rules('deduction_amount', 'deduction', 'required');
    $this->form_validation->set_rules('deduction_type', 'deduction Type', 'required');
    if($this->input->post('deduction_type') == 'Temporary')
    {      
      $this->form_validation->set_rules('range_date', 'Date From-To', 'required');
    }
    else
    {
      $this->form_validation->set_rules('date', 'Date', 'required');
    }    
    
    if ($this->form_validation->run() == FALSE) {
      
      $emp_data = array('emp_id' => $this->input->post('emp_id'), 'status' => 2);
      $result['salary']   = $this->Hris_model->getSalaryHistory($emp_data); 
      $result['employee'] = $this->Hris_model->getEmployee($this->input->post('emp_id'));
      
      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');      
      $this->load->view('hris/employee/deduction_employee', $result);      
      $this->load->view('hris_ace/hris_footer');   
    }
    else
    {
      $emp_id           = $this->input->post('emp_id');
      $range            = $this->input->post('range_date');
      $updated_salary   = $this->input->post('updated_current_salary');      
      $salary           = $this->input->post('current_salary'); 
      $amount           = $this->input->post('deduction_amount'); 
      $type             = $this->input->post('deduction_type');
      
      $replace_updated_salary = str_replace(',', '', $updated_salary);      
      $replace_salary         = str_replace(',', '', $salary);      
      $replace_amount         = str_replace(',', '', $amount);
      
      $date_range = explode("-", $range);
        
      if($type == 'Temporary')
      {
          if(strtotime($date_range[0]) < strtotime(date('Y-m-d')))
          {
            if(empty($updated_salary))
            {                
              $sub_salary = $replace_salary - $replace_amount;
            }
            else
            { 
              $sub_salary = $replace_updated_salary - $replace_amount;
            }

            $new_salary = number_format($sub_salary);
          }
          else
          {
            if(empty($updated_salary))
            {
              $new_salary = $salary;
            }
            else
            {
              $new_salary = $updated_salary;
            }
          }        
      }
      else
      {
          if(strtotime($this->input->post('date')) < strtotime(date('Y-m-d')))
          {
            if(empty($updated_salary))
            {                
              $sub_salary = $replace_salary - $replace_amount;
            }
            else
            {
              $sub_salary = $replace_updated_salary - $replace_amount;
            }

            $new_salary = number_format($sub_salary);
          }
          else
          {
            if(empty($updated_salary))
            {
              $new_salary = $salary;
            }
            else
            {
              $new_salary = $updated_salary;
            }            
          }        
      }
        
      $deduction_data = array(
          'amount'                      => $amount,
          'type'                        => $type,
          'date'                        => $this->input->post('date'),
          'from_date'                   => $date_range[0],
          'to_date'                     => $date_range[2],
          'detail'                      => $this->input->post('deduction_detail'),
          'emp_id'                      => $emp_id,
          'updated_current_salary'      => $new_salary,
          'updated_date'                => date('Y-m-d H:i:s'),
          'status'                      => 2          
      );
      
      $res = $this->Hris_model->addSalaryStatus($deduction_data);
      if($res)
      {        
        $this->session->set_userdata('success_msg', 'Deduction Successfully Added');
        
        $result['netSalary'] = $this->Hris_model->maxSalaryStatus($emp_id);
        $result['employee']  = $this->Hris_model->getEmployee($this->input->post('emp_id'));

        $salary_data = array(
            'emp_id' => $emp_id,
            'status' => 2
        ); 
        $result['salary']   = $this->Hris_model->getSalaryHistory($salary_data); 

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/employee/deduction_employee', $result);
        $this->load->view('hris_ace/hris_footer');
      }
      else
      {
        $this->session->set_userdata('error_msg', 'Error');        
      
        $emp_data = array('emp_id' => $this->input->post('emp_id'), 'status' => 2);
        $result['salary']   = $this->Hris_model->getSalaryHistory($emp_data);         
        $result['employee'] = $this->Hris_model->getEmployee($emp_id);
        
        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');      
        $this->load->view('hris/employee/deduction_employee', $result);      
        $this->load->view('hris_ace/hris_footer');
      }
    }
  }   
  
  // get the Employee Deductions
  public function view_deduction() {
    $this->login_check();
 
    $emp_id = $this->uri->segment(3);
    
    $result['netSalary'] = $this->Hris_model->maxSalaryStatus($emp_id);
    $result['employee']  = $this->Hris_model->getEmployee($emp_id);
    
    $salary_data = array(
        'emp_id' => $emp_id,
        'status' => 2
    ); 
    $result['salary']   = $this->Hris_model->getSalaryHistory($salary_data); 

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/deduction_employee', $result);
    $this->load->view('hris_ace/hris_footer');
  }
 
  
  // get the Deduction to be edited
  public function edit_deduction() {
    $this->login_check();

    $salary_id  = $this->uri->segment(3);
    $emp_id     = $this->uri->segment(4);
    
    $result['salary']    = $this->Hris_model->getSalaryStatus($salary_id);
    $result['netSalary'] = $this->Hris_model->maxSalaryStatus($emp_id);

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/employee/edit_deduction', $result);
    $this->load->view('hris_ace/hris_footer');
  }
  
  // update Employee Deduction
  public function update_deduction() {
    
    $this->login_check();   
    
    $salary_id              = $this->input->post('salary_id');
    $emp_id                 = $this->input->post('emp_id');
    $old_amount             = $this->input->post('old_amount');
    $amount                 = $this->input->post('deduction_amount');    
    $current_salary         = $this->input->post('current_salary');  
    $updated_current_salary = $this->input->post('updated_current_salary');  
    $type                   = $this->input->post('deduction_type');
    $old_type               = $this->input->post('old_type');
    $new_salary             = $current_salary;    
    
    $this->form_validation->set_rules('deduction_amount', 'deduction', 'required');
    $this->form_validation->set_rules('deduction_type', 'deduction Type', 'required');
    
    if ($this->form_validation->run() == FALSE) {      
      
      $result['salary']   = $this->Hris_model->getSalaryStatus($salary_id);

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/edit_deduction', $result);
      $this->load->view('hris_ace/hris_footer');
    }
    else
    {
      $range   = $this->input->post('range_date');   
      $replace_old_amount      = str_replace(',', '', $old_amount);
      $replace_amount          = str_replace(',', '', $amount); 
      $replace_salary          = str_replace(',', '', $current_salary); 
      $replace_updated_salary  = str_replace(',', '', $updated_current_salary); 
      
      if($type == 'Temporary')
      {
        $date_range = explode("-", $range);
        if(strtotime($date_range[0]) < strtotime(date('Y-m-d')))
        { 
          if($replace_old_amount != $replace_amount)
          {
              if($replace_old_amount > $replace_amount)
              {
                 $rem_amount  = $replace_old_amount - $replace_amount;
                 
                 if(empty($updated_current_salary))
                 {
                     $total_salary = $rem_amount + $replace_salary;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
                 else
                 {              
                     $total_salary = $rem_amount + $replace_updated_salary;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }                 
              }
              else
              {
                $rem_amount = $replace_amount - $replace_old_amount;
                
                if(empty($updated_current_salary))
                 {
                     $total_salary = $replace_salary - $rem_amount;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
                 else
                 {              
                     $total_salary = $replace_updated_salary - $rem_amount;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
              }              
          }
          else
          {
            if($old_type != $type)
            {
              $updated_salary = $replace_updated_salary;
            }
            else
            {
              if(empty($updated_current_salary))
              {
                $total_salary   = $replace_amount - $replace_salary;
                $updated_salary = str_replace('-', '', $total_salary);
              }
              else
              {
                $total_salary   = $replace_amount - $replace_updated_salary;
                $updated_salary = str_replace('-', '', $total_salary);
              }              
            }
          }
          
          $new_salary = number_format($updated_salary);
        }
        else
        {
           if(empty($updated_current_salary))
            {
                $total_salary   = $replace_salary - $replace_amount;
                $updated_salary = str_replace('-', '', $total_salary);
            }
            else
            {
                $total_salary   = $replace_updated_salary + $replace_amount;
                $updated_salary = str_replace('-', '', $total_salary); 
            }
            
            $new_salary = number_format($updated_salary);
        }
      }
      else
      {
        if(strtotime($this->input->post('date')) < strtotime(date('Y-m-d')))
        { 
          if($replace_old_amount != $replace_amount)
          {
              if($replace_old_amount > $replace_amount)
              {
                 $rem_amount  = $replace_old_amount - $replace_amount;
                 
                 if(empty($updated_current_salary))
                 {
                     $total_salary = $rem_amount + $replace_salary;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
                 else
                 {              
                     $total_salary = $rem_amount + $replace_updated_salary;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }                 
              }
              else
              {
                $rem_amount = $replace_amount - $replace_old_amount;
                
                if(empty($updated_current_salary))
                 {
                     $total_salary   = $replace_salary - $rem_amount;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
                 else
                 {              
                     $total_salary = $replace_updated_salary - $rem_amount;
                     $updated_salary = str_replace('-', '', $total_salary);
                 }
              }              
          }
//          else
//          {
//            if($old_type != $type)
//            {
//              $updated_salary = $replace_updated_salary;
//            }
            else
            {
              if(empty($updated_current_salary))
              {
                $total_salary   = $replace_salary - $replace_amount ;
                $updated_salary = str_replace('-', '', $total_salary);
              }
              else
              {
                $total_salary   = $replace_updated_salary - $replace_amount;
                $updated_salary = str_replace('-', '', $total_salary);
              }              
//            }
          }
          
          $new_salary = number_format($updated_salary);
        }
        else
        {
           if(empty($updated_current_salary))
            {
                $updated_salary   = $replace_salary + $replace_amount;
                $updated_salary = str_replace('-', '', $total_salary);
            }
            else
            {
                $updated_salary   = $replace_updated_salary + $replace_amount;
                $updated_salary = str_replace('-', '', $total_salary); 
            }
            
            $new_salary = number_format($updated_salary);
        }
      }
      
    }
      if($type == 'Permanent')
      {
        $deduction_data = array(
          'amount'                     => $amount,
          'type'                       => $type,
          'date'                       => $this->input->post('date'),
          'from_date'                  => '',
          'to_date'                    => '',
          'detail'                     => $this->input->post('deduction_detail'),         
          'updated_current_salary'     => $new_salary,          
          'updated_date'               => date('Y-m-d H:i:s')          
        );
      }
      else
      {
        $deduction_data = array(
          'amount'                     => $amount,
          'type'                       => $type,
          'date'                       => '',
          'from_date'                  => $date_range[0],
          'to_date'                    => $date_range[1],
          'detail'                     => $this->input->post('deduction_detail'),         
          'updated_current_salary'     => $new_salary,          
          'updated_date'               => date('Y-m-d H:i:s')          
        );
      }
      
      $res = $this->Hris_model->updateSalaryStatus($salary_id, $deduction_data);
      if($res)
      {        
        $this->session->set_userdata('success_msg', 'Deduction Successfully Updated');
        
        $result['netSalary'] = $this->Hris_model->maxSalaryStatus($emp_id);
        $result['employee']  = $this->Hris_model->getEmployee($emp_id);

        $salary_data = array(
            'emp_id' => $emp_id,
            'status' => 2
        ); 
        $result['salary']   = $this->Hris_model->getSalaryHistory($salary_data); 

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/employee/deduction_employee', $result);
        $this->load->view('hris_ace/hris_footer');
      }
      else
      {
        $this->session->set_userdata('error_msg', 'Error');        
      
        $result['salary']   = $this->Hris_model->getSalaryStatus($salary_id);

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/employee/edit_deduction', $result);
        $this->load->view('hris_ace/hris_footer');
      }      
  }
  
  
  // Add company Form
  public function add_company_form() {

    $this->login_check();
    
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/company/add_company');
    $this->load->view('hris_ace/hris_footer'); 
  }

  // Add company in database
  public function add_company() {

    $this->login_check();

    $this->form_validation->set_rules('company_name', 'Company Name', 'required');

    if ($this->form_validation->run() == FALSE) {
      
      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/company/add_company', $result);
      $this->load->view('hris_ace/hris_footer'); 
    } 
    else {
      $company_data = array(
          'company_name' => $this->input->post('company_name')
      );
      
      // check Company already exitsts
      $res = $this->Hris_model->checkCompany($company_data);
      if ($res) {
        $this->session->set_userdata('error_msg', 'Company Name Already Exists');
        redirect('hris/add_company_form');
      } 
      else {
        $result = $this->Hris_model->addCompany($company_data);
        
        if ($result) {
          $this->session->set_userdata('success_msg', 'Company Added Successfully');
          redirect('hris/view_company');
        }
      }
    }
  }

  // display all the company 
  public function view_company() {
    $this->login_check();

    $result['company'] = $this->Hris_model->getAllCompany();

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/company/view_company', $result);
    $this->load->view('hris_ace/hris_footer');
  }

  public function edit_company() {
    $this->login_check();

    $comp_id = $this->uri->segment(3);
    $result['company'] = $this->Hris_model->getcompany($comp_id);

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/company/edit_company', $result);
    $this->load->view('hris_ace/hris_footer');
  }

  // update the Program Dapertment name 
  public function update_company() {

    $this->login_check();    
    $comp_id = $this->input->post('company_id');
    
    $this->form_validation->set_rules('company_name', 'Company Name', 'required');
    if ($this->form_validation->run() == FALSE) {
      
      $result['company'] = $this->Hris_model->getcompany($comp_id);

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/company/edit_company', $result);
      $this->load->view('hris_ace/hris_footer');
    }
    else
    {
      // check company Name already exitsts
      $company_data = array(
            'company_name' => $this->input->post('company_name')
      );
      
      $res = $this->Hris_model->checkCompany($company_data);
      if ($res) {
        $this->session->set_userdata('error_msg', 'Company Already Exists');

        $result['company'] = $this->Hris_model->getCompany($comp_id);

        $this->load->view('hris_ace/hris_header');
        $this->load->view('hris_ace/hris_side_menu');
        $this->load->view('hris/company/edit_company', $result);
        $this->load->view('hris_ace/hris_footer');
      }
      else {
        $company_data = array(
            'company_name' => $this->input->post('company_name')
        );
        $result = $this->Hris_model->updateCompany($comp_id, $company_data);

        if ($result) {
          $this->session->set_userdata('success_msg', 'Company updated Successfully');
          redirect('hris/view_company');
        }
      }
      
    }  
    
  }
  
  //---------------End of Company----------------\\
  
  
  //  *****    Start Functions for City Module   *****  //      
  // form to Add city 

  public function add_city_form() {

    $this->login_check();
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/city/addcity');
    $this->load->view('hris_ace/hris_footer');
  }

  // for Add city in database

  public function add_city() {

    $this->login_check();

    $this->form_validation->set_rules('city_name', 'City Name', 'required');

    if ($this->form_validation->run() == FALSE) {

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/city/addcity');
      $this->load->view('hris_ace/hris_footer');
    } 
    else 
    {
      $city = array(
          'city_name' => $this->input->post('city_name')
      );
      
      // check city name already exitsts

      $res = $this->Hris_model->checkCity($city);
      if ($res) 
      {
        $this->session->set_userdata('error_msg', 'City Name Already Exists');
        redirect('hris/add_city_form');
      } 
      else 
      {
        $result = $this->Hris_model->addCity($city);

        if ($result) {
          $this->session->set_userdata('success_msg', 'City Added Successfully');
          redirect('hris/view_cities');
        }
      }
    }
  }

  // display all the cities 

  public function view_cities() {
    $this->login_check();

    $result['cities'] = $this->Hris_model->getAllcities();
    
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/city/viewcities', $result);
    $this->load->view('hris_ace/hris_footer');
  }

  // get the name of city to be edited

  public function edit_city() {
    $this->login_check();

    $id = $this->uri->segment(3);
    $result = $this->Hris_model->getCity($id);
    $result['city'] = $result;

    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/city/editcity', $result);
    $this->load->view('hris_ace/hris_footer');
  }

  // update the city name 
  public function update_city() {

    $this->login_check();
    $id = $this->input->post('city_id');

    $this->form_validation->set_rules('city_name', 'City Name', 'required');

    if ($this->form_validation->run() == FALSE) {

      $result = $this->Hris_model->getCity($id);
      $result['city'] = $result;

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/city/editcity', $result);
      $this->load->view('hris_ace/hris_footer');
    }       
    
    // check city name already exitsts 
     $city = array(
          'city_name' => $this->input->post('city_name')
      );
    $res = $this->Hris_model->checkCity($city);
    if ($res) {
      $this->session->set_userdata('error_msg', 'City Name Already Exists');
      
      $result = $this->Hris_model->getCity($id);
      $result['city'] = $result;

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/city/editcity', $result);
      $this->load->view('hris_ace/hris_footer');
    }
    else {
      $city = array('city_name' => $this->input->post('city_name'));
      $result = $this->Hris_model->updateCity($id, $city);

      if ($result) {
        $this->session->set_userdata('success_msg', 'City Name Successfully Updated');
        redirect('hris/view_cities');
      }
    }
  }
  
  // Add Visitor Form
  public function add_visitor_form() {

    $this->login_check();
    
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/visitor/add_visitor');
    $this->load->view('hris_ace/hris_footer'); 
  }
  
  public function add_visitor() {

    $this->login_check();

    $this->form_validation->set_rules('visitor_name', 'Visitor Name', 'required');

    if ($this->form_validation->run() == FALSE) {

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/visitor/add_visitor');
      $this->load->view('hris_ace/hris_footer'); 
    } 
    else 
    {
          $visitor_name = $this->input->post('visitor_name');
          $cnic         = $this->input->post('cnic');
      
      // check visitor name already exitsts
      $res = $this->Hris_model->checkVisitor($cnic, $visitor_name);
      if ($res == 1) 
      {
        $this->session->set_userdata('error_msg', 'Existing Employee Updated to Visitor');
        redirect('hris/add_visitor_form');
      } 
      else 
      {
        $this->session->set_userdata('error_msg', 'Visitor Added Successfully');
        redirect('hris/add_visitor_form');       
      }
    }
  }
  
  
  public function edit_visitor() {
    
    $this->login_check();

    $id = $this->uri->segment(3);
    $result['visitor'] = $this->Hris_model->getVisitor($id);
    
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/visitor/edit_visitor', $result);
    $this->load->view('hris_ace/hris_footer');
  }
  
  public function update_visitor() {

    $this->login_check();

    $this->form_validation->set_rules('visitor_name', 'Visitor Name', 'required');

    if ($this->form_validation->run() == FALSE) {

      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/visitor/add_visitor');
      $this->load->view('hris_ace/hris_footer'); 
    } 
    else 
    {
      $id = $this->input->post('visitor_id');
      $data = array(
          'visitor_name' => $this->input->post('visitor_name'),
          'cnic'         => $this->input->post('cnic')
      );
      
      $result = $this->Hris_model->updateVisitor($id, $data);

      if($result != 0) {
        $this->session->set_userdata('success_msg', 'Visitor Updated Successfully');
        redirect('hris/view_visitors');
      }else{
        $this->session->set_userdata('error_msg', 'Some Error Occurred');
        redirect('hris/edit_visitors/'.$id);        
      }     
    }
  }
  
  public function view_visitors() {

    $this->login_check();
    $result['visitors'] = $this->Hris_model->getAllvisitors();
    
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/visitor/view_visitors', $result);
    $this->load->view('hris_ace/hris_footer'); 
  }
  
  public function test(){
      

echo " I am ".$this->get_age("1985-01-21") ." years old";
  }
  function get_age($birth_date){
        return floor((time() - strtotime($birth_date))/31556926);
 }
 
 
 public function add_campus(){
     $this->login_check();
     
     $result['cities'] = $this->Hris_model->getAllcities();
     
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/campus/add_campus', $result);
    $this->load->view('hris_ace/hris_footer'); 
 }
 
 
 public function save_campus(){
     $this->login_check();
     $this->Hris_model->save_campus_details();
     
     redirect('hris/view_campuses');
 }
 
 public function view_campuses(){
    $this->login_check();
     
    $result['campus'] = $this->Hris_model->get_all_campuses();
     
    $this->load->view('hris_ace/hris_header');
    $this->load->view('hris_ace/hris_side_menu');
    $this->load->view('hris/campus/view_campuses', $result);
    $this->load->view('hris_ace/hris_footer'); 
 }
 
 public function get_campus(){
     $this->login_check();
     $campus_id = $this->uri->segment(3);
     $result['campus'] = $this->Hris_model->get_campus_data($campus_id);
     $result['cities']     = $this->Hris_model->getAllcities();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/campus/edit_campus', $result);
     $this->load->view('hris_ace/hris_footer'); 
 }
 
 
 public function update_campus(){
     $this->login_check();
     
     $campus_id = $this->input->post('campus_id');
     $check = $this->Hris_model->update_campus_data($campus_id);
    // echo $check;
     if($check){
         $this->session->set_userdata('update', 'Campus Updated Sucessfully');
         redirect('hris/view_campuses');
         
     }
 }
 
 public function add_grade(){
     $this->login_check();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/grade/add_grade');
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function save_grades(){
     $this->login_check();
     $this->Hris_model->save_grade_data();
     
     redirect('hris/view_grades');
 }
 
 public function view_grades(){
     $this->login_check();
     $result['grades'] = $this->Hris_model->get_all_grades();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/grade/view_grade', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function get_grade(){
     $this->login_check();
     
     $grade_id = $this->uri->segment(3);
     $result['grades'] = $this->Hris_model->get_grade_by_id($grade_id);
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/grade/edit_grade', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function update_grades(){
     $this->login_check();
     $grade_id = $this->input->post('grade_id');
     
     $check = $this->Hris_model->update_grade_data($grade_id);
     if($check){
     $this->session->set_userdata('update', 'Grade Updated Sucessfully');
     redirect('hris/view_grades');
     }
 }
 
 public function add_bank(){
     $this->login_check();
     $result['cities']     = $this->Hris_model->getAllcities();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/bank/add_bank', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function save_bank(){
     $this->login_check();
     $this->Hris_model->save_bank_details();
     redirect('hris/view_banks');
 }
 
 public function view_banks(){
     $this->login_check();
     $result['banks']     = $this->Hris_model->get_all_banks();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/bank/view_banks', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function get_bank_details(){
     $this->login_check();
     $bank_id = $this->uri->segment(3);
     $result['banks'] = $this->Hris_model->get_bank_by_id($bank_id);
     $result['cities']     = $this->Hris_model->getAllcities();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/bank/edit_bank', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function update_bank(){
     $this->login_check();
     $bank_id = $this->input->post('bank_id');
     $check = $this->Hris_model->update_bank_details($bank_id);
     if($check){
         $this->session->set_userdata('update', 'Bank Details Updated Successfully');
         redirect('hris/view_banks');
     }
 }
 
 public function add_facility(){
     $this->login_check();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/facility/add_facility');
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function save_facility(){
     $this->login_check();
     $this->Hris_model->save_facility_data();
     redirect('hris/view_facilities');
 }
 
 public function view_facilities(){
     $this->login_check();
     $result['facilities'] = $this->Hris_model->get_all_facilities();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/facility/view_facilities', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function get_facility(){
     $this->login_check();
     $facility_id = $this->uri->segment(3);
     $result['facilities'] = $this->Hris_model->get_facility_by_id($facility_id);
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/facility/edit_facility', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function update_facility(){
     $this->login_check();
     $facility_id = $this->input->post('facility_id');
     $ch = $this->Hris_model->update_facility_data($facility_id);
     if($ch){
         $this->session->set_userdata('success_msg', 'Facility Updated Successfully');
         
         redirect('hris/view_facilities');
     }
 }
 
 public function add_religion(){
     $this->login_check();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/religion/add_religion');
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function save_religion(){
     $this->login_check();
     $this->Hris_model->save_religion_data();
     redirect('hris/view_religions');
 }
 
 public function view_religions(){
     $this->login_check();
     $result['religions'] = $this->Hris_model->get_all_religions();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/religion/view_religions', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function get_religion(){
     $this->login_check();
     $religion_id = $this->uri->segment(3);
     $result['religions'] = $this->Hris_model->get_religion_by_id($religion_id);
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/religion/edit_religion', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function update_religion(){
     $this->login_check();
     $religion_id = $this->input->post('religion_id');
     $ch = $this->Hris_model->udpate_religion_data($religion_id);
     if($ch){
         $this->session->set_userdata('success_msg', 'Religion Updated Successfully');
         redirect('hris/view_religions');
     }
 }
 
 public function add_relation(){
     $this->login_check();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/relation/add_relation');
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function save_relation(){
     $this->login_check();
     $this->Hris_model->save_relation_data();
     redirect('hris/view_relations');
 }
 
 public function view_relations(){
     $this->login_check();
     $result['relations'] = $this->Hris_model->get_all_relations();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/relation/view_relations', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function get_relation(){
     $this->login_check();
     $relation_id = $this->uri->segment(3);
     $result['relations'] = $this->Hris_model->get_relation_by_id($relation_id);
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/relation/edit_relation', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function update_relation(){
     $this->login_check();
     $relation_id = $this->input->post('relation_id');
     $ch = $this->Hris_model->update_relation_data($relation_id);
     if($ch){
         $this->session->set_userdata('success_msg', 'Relationship Updated Successfully');
         redirect('hris/view_relations');
     }
 }
 
 public function add_document(){
     $this->login_check();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/document/add_document');
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function save_document(){
     $this->login_check();
     $this->Hris_model->save_document_data();
     redirect('hris/view_documents');
 }
 
 public function view_documents(){
     $this->login_check();
     $result['documents'] = $this->Hris_model->get_all_documents();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/document/view_documents', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function get_document(){
     $this->login_check();
     $doc_id = $this->uri->segment(3);
     $result['documents'] = $this->Hris_model->get_documents_by_id($doc_id);
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/document/edit_document', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function update_document(){
     $this->login_check();
     $doc_id = $this->input->post('doc_id');
     $ch = $this->Hris_model->update_document_data($doc_id);
     if($ch){
         $this->session->set_userdata('success_msg', 'Document Updated Successfully');
         redirect('hris/view_documents');
     }
 }
 
 
 public function add_country(){
     $this->login_check();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/country/add_country');
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function save_country(){
     $this->login_check();
     $this->Hris_model->save_country_data();
     redirect('hris/view_countries');
 }
 
 public function view_countries(){
     $this->login_check();
     $result['countries'] = $this->Hris_model->get_all_countries();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/country/view_countries', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function get_country(){
     $this->login_check();
     $country_id = $this->uri->segment(3);
     $result['countries'] = $this->Hris_model->get_country_by_id($country_id);
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/country/edit_country', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function update_country(){
     $this->login_check();
     $country_id = $this->input->post('country_id');
     
     $ch = $this->Hris_model->update_country_data($country_id);
     if($ch){
         $this->session->set_userdata('success_msg', 'Country Updated Successfully');
         redirect('hris/view_countries');
     }
 }
 
 public function add_salary_type(){
     $this->login_check();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/salaryType/salary_type');
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function save_salary_type(){
     $this->login_check();
     $this->Hris_model->save_sal_details();
     redirect('hris/view_salary_types');
     
 }
 
 public function view_salary_types(){
     $this->login_check();
     $result['types'] = $this->Hris_model->get_sal_details();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/salaryType/view_sal_type', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function get_sal_type(){
     $this->login_check();
     $sal_id = $this->uri->segment(3);
     $result['types'] = $this->Hris_model->get_sal_by_id($sal_id);
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/salaryType/edit_sal_type', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function update_salary_type(){
     $this->login_check();
     $salary_id = $this->input->post('salary_id');
     $ch = $this->Hris_model->update_sal_data($salary_id);
     if($ch){
         $this->session->set_userdata('success_msg', 'Salary Type Updated Successfully');
         redirect('hris/view_salary_types');
     }
 }
 
 
 public function view_cv(){
     $this->login_check();
     $emp_id = $this->uri->segment(3);
     $result['personal'] = $this->Hris_model->get_cv_details($emp_id);
     $result['education']   = $this->Hris_model->getEducation($emp_id);
     $result['exp']         = $this->Hris_model->getexpDetails($emp_id);
     $result['certification']   = $this->Hris_model->getCertification($emp_id);
     $result['skills']      = $this->Hris_model->getSkillsdetails($emp_id);
     $result['lang']        = $this->Hris_model->getlangdetails($emp_id);
     $result['reference']   = $this->Hris_model->getReference($emp_id);
     $result['license']     = $this->Hris_model->getlicenseDetails($emp_id);
     $this->load->view('hris/employee/cv', $result);
 }
 
 public function search_salary(){
     $this->login_check();
     $result['department'] = $this->Hris_model->getAllDepartments();
     $result['company'] = $this->Hris_model->getCampany();
     $this->load->view('hris_ace/hris_header');
     $this->load->view('hris_ace/hris_side_menu');
     $this->load->view('hris/employee/salary_search', $result);
     $this->load->view('hris_ace/hris_footer');
 }
 
 public function search_employee_salary(){
    $dept_id = $this->input->post('department');
    $comp_id = $this->input->post('company');
    $dept_data = array(
        'hr_employee_record.department_id' => $dept_id,
        'hr_employee_record.record_company_name' => $comp_id        
    );
    
    $result['employee'] = $this->Hris_model->searchEmpsal($dept_data);    
    $res = $result['employee'];
    
    if(!empty($res))
    {
      $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/salary_employee', $result);
      $this->load->view('hris_ace/hris_footer');          
    }
    else
    {      
      $this->session->set_userdata('error_msg', "Record not Found");
      redirect('hris/search_salary');
    }
 }
 
 public function get_ajax_salary(){
    $company_id = $_GET['company_id'];
    $result['department'] = $this->Hris_model->get_departs($company_id); 
    $this->load->view('hris/employee/salary_partial', $result);
 }
 
 // hris employee login gernrate company  and departments 
 public function generate_logins(){
     $this->login_check();
     $result['employee'] = $this->Hris_model->getAllEmployees();
     $result['department'] = $this->Hris_model->getAllDepartments();
     $result['company'] = $this->Hris_model->getCampany();
     
     $this->load->view('hris_ace/hris_header');
      $this->load->view('hris_ace/hris_side_menu');
      $this->load->view('hris/employee/employee_logins', $result);
      $this->load->view('hris_ace/hris_footer'); 
 }
 
   // hris employee passwords gentrate

    function getRandomCode( $length = 8 ) 
    {
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$pass = substr( str_shuffle( $chars ), 0, $length );
return $pass;

    } 
    
  // hris  gentrate login and mail
    public function generate_employee_logins() {
        $data = $this->input->post('employee_id');
     
        foreach ($data as $key => $value)
            {
           
              $email = explode("-",$value);
              $emails = $email[1];
              $emp_id = $email[0];
            $logins = $this->getRandomCode();
            if (!empty($emp_id))
                {
                $emp_data = array(
                      'emp_id' => $emp_id,
                      'email' => $emails,
                      'status' => '1',
                      'password' => md5($logins),
                  );
             $insert = $this->Hris_model->add_gen_passwords($emp_data);
               if ($insert > 0)
                  {
                   $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'abdul.samad@superior.edu.pk', 
                        'smtp_pass' => 'SamadShobi123', // change it to yours
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE,
                        );
                                                              
                            $sub='hris superior';
                          //  $data['header']= $this->load->view('userside/packageordermail',$result,TRUE);
                           // $message = $data['header'];
                            $message = 'Welcome to Superior HRIS Employee Portal.</br> Your Login id : '.$emails.' and password : '.$logins ;
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");                            
                            $this->email->from('abdul.samad@superior.edu.pk', HRIS ); // change it to yours
                            //$this->email->to('m.tariq@superior.edu.pk');// change it to yours
                            $this->email->to($emails);// change it to yours
                            $this->email->subject($sub);
                            $this->email->message($message);
                            $this->email->send();
                         }
            }
         }
         $this->session->set_userdata( array(
                'success_msg'    => 'Success ! Employee Account Created'
                   ));
        redirect('hris/generate_logins');
        
    }
    
  // hris employee search for gentrate login
    public function employees_search(){
   
    $dept_id = $this->input->post('department');
    $comp_id = $this->input->post('company');
                $dept_data = array(
                    'hr_employee_record.department_id' => $dept_id,
                    'hr_employee_record.record_company_name' => $comp_id        
                        );
    $result['department'] = $this->Hris_model->getAllDepartments();
    $result['company'] = $this->Hris_model->getCampany();
    $result['employee'] = $this->Hris_model->searchEmpLogs($dept_data);    
    $res = $result['employee'];
    
                    if(!empty($res))
                    {
                        $this->load->view('hris_ace/hris_header');
                        $this->load->view('hris_ace/hris_side_menu');
                        $this->load->view('hris/employee/employee_logins', $result);
                        $this->load->view('hris_ace/hris_footer');       
                    }
                    else
                    {      
                      $this->session->set_userdata('error_msg', "Could Not Generate");
                      redirect('hris/generate_logins');
                    }
    }
    function salary_slip_email()
    {
        $emp_salery = $this->input->post('emp_record');
        foreach($emp_salery as $row)
            {
           $data = explode('-' ,$row);
                $emp_id = $data[0];
                $email = $data[1];
                $salery = $data[2];
          $emp_info = $this->Hris_model->getEmployee($emp_id);
          
          $basesalery = $salery*0.55;
          $hra = $salery*0.25;
          $medical = $salery*0.1;
          $convence = $salery*0.1;
          $pf = $basesalery*0.05;
          $eobi = '480';
          $yearly_salery = $salery*12;
          switch($yearly_salery)
          {
              case($yearly_salery <= 400000):
                  $tax =0;
                  break;
              case($yearly_salery > 400000 && $yearly_salery <= 500000 ):
                  $fortax =($yearly_salery-400000)/12;
                  $tax =$fortax*0.02;
                  break;
               case($yearly_salery > 500000 && $yearly_salery <= 750000 ):
                  $fortax =(($yearly_salery-500000)/12);
                  $tax =($fortax*0.05)+(2000/12);
                  break;
               case($yearly_salery > 750000 && $yearly_salery <= 1400000 ):
                  $fortax =(($yearly_salery-750000)/12);
                  $tax =($fortax*0.1)+(14500/12);
                  break;
                case($yearly_salery > 1400000 && $yearly_salery <= 1500000 ):
                  $fortax =(($yearly_salery-1400000)/12);
                  $tax =($fortax*0.125)+(79500/12);
                  break;
              case($yearly_salery > 1500000 && $yearly_salery <= 1800000 ):
                  $fortax =(($yearly_salery-1500000)/12);
                  $tax =($fortax*0.15)+(92000/12);
                  break;
               case($yearly_salery > 1800000 && $yearly_salery <= 2500000 ):
                  $fortax =(($yearly_salery-1800000)/12);
                  $tax =($fortax*0.175)+(137000/12);
                  break; 
              case($yearly_salery > 2500000 && $yearly_salery <= 3000000 ):
                  $fortax =(($yearly_salery-2500000)/12);
                  $tax =($fortax*0.2)+(259500/12);
                  break;
               case($yearly_salery > 3000000 && $yearly_salery <= 3500000 ):
                  $fortax =(($yearly_salery-3000000)/12);
                  $tax =($fortax*0.225)+(359500/12);
                  break;
               case($yearly_salery > 3500000 && $yearly_salery <= 4000000 ):
                  $fortax =(($yearly_salery-3500000)/12);
                  $tax =($fortax*0.25)+(472000/12);
                  break;
               case($yearly_salery > 4000000 && $yearly_salery <= 7000000 ):
                  $fortax =(($yearly_salery-4000000)/12);
                  $tax =($fortax*0.275)+(597000/12);
                  break;
               case($yearly_salery > 7000000):
                  $fortax =(($yearly_salery-7000000)/12);
                  $tax =($fortax*0.3)+(1422000/12);
                  break;
              
          }
         
         $date = date('M, Y');
         $pf = round($pf);
         $tax = round($tax);
        $totalDeduction = $tax + $pf; 
        $netpay = $salery - $totalDeduction;
         
  $message = '<html>
<head>
    <style>
        .table{font-size: 9px;}     
    </style>
</head>
<body style="font-size: 10px;  width:600px; font-family: Arial; margin-top: 70px;">
<h1 style="text-align: center">SALARY STATEMENT FOR THE MONTH OF '.$date.'</h1>    
<h2>EMPLOYEE INFORMATION</h2>
<table style=" width:600px; float:left; border: 1px solid #000; margin-bottom: 30px" class="table" >
    <tbody style="align:center; width:600px; height: 23px; line-height: 23px; font-size: 12px;">
                   
        <tr style="width: 297px; float: left">
            <th style="width:117px; text-align: left"> Employee Code</th>
            <td style="width:180px; text-align: left"> '. $emp_info[0]['emp_code'].'</td>
        </tr>
        
        <tr style="width: 297px; float: left">
            <th style="width:117px; text-align: left"> Employee Name</th>
            <td style="width:180px; text-align: left"> '.$emp_info[0]['employee_name'].' </td>
        </tr>
                                           
                  
        <tr style="width: 297px; float: left">
            <th style="width:117px; text-align: left"> CNIC</th>
            <td style="width:180px; text-align: left">'.$emp_info[0]['cnic_no'].' </td>
        </tr>
        
        <tr style="width: 297px; float: left">
            <th style="width:117px; text-align: left"> Bank Account</th>
            <td style="width:180px; text-align: left"> '.$emp_info[0]['account_no'].' </td>
        </tr>
                   
                  
        <tr style="width: 297px; float: left">
            <th style="width:117px; text-align: left"> Designation</th>
            <td style="width:180px; text-align: left">'.$emp_info[0]['designation_title'].'  </td>
        </tr>
        
        <tr style="width: 297px; float: left">
            <th style="width:117px; text-align: left"> Department</th>
            <td style="width:180px; text-align: left">'.$emp_info[0]['department_name'].'  </td>
        </tr>
                   
                  
                    
    </tbody>
</table>    


<h2>SALARY DETAILS</h2>
<table style=" width:600px; float:left; border:2px solid #000; margin-bottom: 30px" class="table" >
    <tbody style="align:center; width:600px; height: 23px; line-height: 23px; font-size: 12px;">
                   
        <tr style="width: 293px; float: left; border: 1px solid">
            <th style="width:295px; text-align: center"><b> EARNINGS </b></th>
        </tr>
        
        <tr style="width: 295px; float: left; border: 1px solid">
            <th style="width:295px; text-align: center"><b> DEDUCTIONS </b></th>            
        </tr>
                                           
                  
        <tr style="width: 293px; float: left; border: 1px solid">
            <th style="width:113px; text-align: left;"> Basic</th>
            <td style="width:180px; text-align: left;">'.$basesalery.'</td>
        </tr>
        
        <tr style="width: 295px; float: left; border: 1px solid">
            <th style="width:115px; text-align: left"> P.F</th>
            <td style="width:180px; text-align: left">'.$pf.'</td>
        </tr>
                   
                  
        <tr style="width: 293px; float: left; border: 1px solid">
            <th style="width:113px; text-align: left"> HRA</th>
            <td style="width:180px; text-align: left">'.$hra.'</td>
        </tr>
        
        <tr style="width: 295px; float: left; border: 1px solid">
            <th style="width:115px; text-align: left"> Income Tax</th>
            <td style="width:180px; text-align: left">'.$tax.'</td>
        </tr>
                   
        <tr style="width: 293px; float: left; border: 1px solid">
            <th style="width:113px; text-align: left"> Medical</th>
            <td style="width:180px; text-align: left">'.$medical.'</td>
        </tr>
        
        <tr style="width: 295px; float: left; border: 1px solid">
            <th style="width:115px; text-align: left"> EOBI</th>
            <td style="width:180px; text-align: left">'.$eobi.'</td>
        </tr>
                   
        <tr style="width: 293px; float: left; border: 1px solid">
            <th style="width:113px; text-align: left"> Conveyance</th>
            <td style="width:180px; text-align: left">'.$convence.'</td>
        </tr>
        
        <tr style="width: 295px; float: left; border: 1px solid">
            <th style="width:115px; text-align: left"> Salary Advance</th>
            <td style="width:180px; text-align: left"> 00 </td>
        </tr>
                   
        <tr style="width: 293px; float: left; border: 1px solid">
            <th style="width:113px; text-align: left"> Other1</th>
            <td style="width:180px; text-align: left"> 00</td>
        </tr>
        
        <tr style="width: 295px; float: left; border: 1px solid">
            <th style="width:115px; text-align: left"> Absendt Ded.</th>
            <td style="width:180px; text-align: left"> 00 </td>
        </tr>
                   
        <tr style="width: 293px; float: left; border: 1px solid">
            <th style="width:113px; text-align: left"> Other2</th>
            <td style="width:180px; text-align: left"> 00</td>
        </tr>
        
        <tr style="width: 295px; float: left; border: 1px solid">
            <th style="width:115px; text-align: left"> Load Installment </th>
            <td style="width:180px; text-align: left"> 00 </td>
        </tr>
                   
                  
                    
    </tbody>
</table>    


<h2>SUMMARY</h2>
<table style=" width:598px; float:left; border:2px solid #000;" class="table" >
    <tbody style="align:center; width:600px; height: 23px; line-height: 23px; font-size: 12px;">
                    
                  
        <tr style="width: 297px; float: left; border: 1px solid">
            <th style="width:117px; text-align: left"> Gross Pay</th>
            <td style="width:180px; text-align: left">'.$salery.'</td>
        </tr>
        
        <tr style="width: 297px; float: left; border: 1px solid">
            <th style="width:117px; text-align: left"> Total Deducations</th>
            <td style="width:180px; text-align: left">'.$totalDeduction.'</td>
        </tr>
                   
                  
        <tr style="width: 598px; float: left;">
            <th style="width:118px; text-align: left"> Net Pay :</th>
            <td style="width:480px; text-align: left"> '.$netpay.'</td>
        </tr>
                           
       
                    
    </tbody>
</table>    
</br>
</body>
</html>
';

         $config = Array(
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'eslip@superior.edu.pk', 
                        'smtp_pass' => 'pAKISTAN123', // change it to yours
                        'mailtype' => 'html',
                        'charset' => 'iso-8859-1',
                        'wordwrap' => TRUE,
                        );
                                                              
                            $sub='hris superior';
                          //  $data['header']= $this->load->view('userside/packageordermail',$result,TRUE);
                           // $message = $data['header'];
                           
                            $this->load->library('email', $config);
                            $this->email->set_newline("\r\n");                            
                            $this->email->from('eslip@superior.edu.pk', HRIS ); // change it to yours
                            //$this->email->to('m.tariq@superior.edu.pk');// change it to yours
                            $this->email->to($email);// change it to yours
                            $this->email->subject('Salary Statment For Month '.' '.$date);
                            $this->email->message($message);
                            $this->email->send();
          show_error($this->email->print_debugger()); DIE;
            }
             redirect('hris/search_salary');
    }
 
}
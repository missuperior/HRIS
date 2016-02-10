<?php

class Hris_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    // HRIS Login     
    function hrisLogin($login_data)
    {
        $this->db->select('hris_logins.*, hr_company.*');
        $this->db->join('hr_company', 'hris_logins.company_id = hr_company.company_id');
        $this->db->where($login_data);
        $query = $this->db->get('hris_logins');
        return $query->row();           
    }
    
    //   ***** Start function for City Module *****   //
    
    // check duplication of city name
    
    function checkCity($city)
    {
        $query = $this->db->get_where('cities', $city);
		
        return $query->result_array();
    }
    
    
    // add city in db
    
    function addCity($city)
    {
        $query = $this->db->insert('cities', $city); 
		
        return $this->db->insert_id();
    }
    
    // get a city for update
    
    function getCity($id)
    {       
        $query = $this->db->get_where('cities', array('city_id' => $id));
		
        return $query->result_array();
    }
    
    // update the city name
    
    function updateCity($id,$city)
    {
        $this->db->where('city_id', $id);
        $query = $this->db->update('cities', $city);
		 
        return $query;        
    }
    
    // get all cities from db    
    function getAllcities()
    {
        $this->db->order_by('city_name', 'ASC'); 
        $query = $this->db->get('cities');
		
        return $query->result_array();
    }
    
    //------------- End City Queries -------------\\
    
    
    // get all campuses data from db    
    function getAllCampuses()
    {        
        $this->db->order_by('campus_name', 'ASC'); 
        $query = $this->db->get('campus');

        return $query->result_array();
    }
    
    // get Employee Contact Table Fields Name  
    function hr_contact_fields()
    {
       return  $this->db->list_fields('hr_employee_contact');
    }    
    
    // get Employee Education Table Fields Name  
    function hr_education_fields()
    {
       return  $this->db->list_fields('hr_employee_education');
    }
    
    // get Employee Experience Table Fields Name  
    function hr_experience_fields()
    {
       return  $this->db->list_fields('hr_employee_experience');
    }
    
    // get Employee Record Table Fields Name  
    function hr_record_fields()
    {
       return  $this->db->list_fields('hr_employee_record');
    }
    
  /// ********************* Start Tariq Mayo  
    
    //add employee in hr_employee_record table
    function addEmployeeRecord($record_data)
    {      
      $query = $this->db->insert('emp_gen_details', $record_data);
      //echo $query;
      return $this->db->insert_id();
    }
    
    //add employee in salary detail in hr_employee_salary table
    function addSalaryDetails($salary_data)
    {      
      $query = $this->db->insert('hr_employee_salary', $salary_data);
      return $this->db->insert_id();
    }
    
    //add employee in bank detail in hr_employee_bank table
    function addBankDetails($bank_data)
    {      
      $query = $this->db->insert('hr_employee_bank', $bank_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Facility detail in hr_employee_facilities table
    function addFacilityDetails($facility_data)
    {      
      $query = $this->db->insert('hr_employee_facilities', $facility_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in contact detail in hr_employee_contact table
    function addContactRecord($contact_data)
    {      
      $query = $this->db->insert('hr_employee_contact', $contact_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Dependent detail in hr_employee_dependent table
    function addDependentDetails($dependent_data)
    {      
      $query = $this->db->insert('hr_employee_dependent', $dependent_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Social Media detail in hr_employee_social_media table
    function addSocialMediaDetails($social_media_data)
    {      
      $query = $this->db->insert('hr_employee_social_media', $social_media_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Emergency contact detail in hr_employee_nominee table
    function addEmergencyDetails($emergency_data)
    {      
      $query = $this->db->insert('hr_employee_nominee', $emergency_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Medical detail in hr_employee_medical table
    function addMedicalDetails($medical_data)
    {      
      $query = $this->db->insert('hr_employee_medical', $medical_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Experience detail in hr_employee_experience table
    function addExperienceDetails($experienc_data)
    {      
      $query = $this->db->insert('hr_employee_experience', $experienc_data);
      return $this->db->insert_id();
    }    
    
    
    //add employee in Reference detail in hr_employee_reference table
    function addReferenceDetails($ref_data)
    {      
      $query = $this->db->insert('hr_employee_reference', $ref_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Documents detail in hr_employee_document table
    function addDocumentsDetails($doc_data)
    {      
      $query = $this->db->insert('hr_employee_document', $doc_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Education detail in hr_employee_education table
    function addEducationDetails($education_data)
    {      
      $query = $this->db->insert('hr_employee_education', $education_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in Trainings/Certification detail in hr_employee_training_certificates table
    function addTrainingDetails($training_data)
    {      
      $query = $this->db->insert('hr_employee_training_certificates', $training_data);
      return $this->db->insert_id();
    }
    
    //add employee in skills detail in hr_employee_skills table
    function addSkillDetails($skill_data)
    {      
      $query = $this->db->insert('hr_employee_skills', $skill_data);
      return $this->db->insert_id();
    }
    
    
    //add employee in  language detail in hr_employee_language table
    function addLanguageDetails($language_data)
    {      
      $query = $this->db->insert('hr_employee_language', $language_data);
      return $this->db->insert_id();
    }
    
     
    //add employee in license detail in hr_employee_license table
    function addLicenseDetails($license_data)
    {      
      $query = $this->db->insert('hr_employee_license', $license_data);
      return $this->db->insert_id();
    }
    
     
    
    //add employee in Membershipanguage detail in hr_employee_memberships table
    function addMembershipDetails($membership_data)
    {      
      $query = $this->db->insert('hr_employee_memberships', $membership_data);
      return $this->db->insert_id();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//    // update Employee Current Salary according to Incremetn or Deduction
//    function updateCurrentSalary($emp_id, $salary)
//    {
//      $this->db->where('emp_id', $emp_id);
//      $query = $this->db->update('hr_employee_record', array('current_salary' => $salary));
//      
//      return $query;
//    }
    
    // insert Employee data when education array is non empty
    function addEmployeeDetails($contact_data, $education_all_data, $experience_data, $reference_all_data, $dependent_all_data, $nominee_all_data, $document_all_data)
    {         
      $this->db->insert('hr_employee_contact', $contact_data);
      
      if(!empty($education_all_data))
      {
        foreach($education_all_data as $data)
        {
          $query = $this->db->insert('hr_employee_education', $data);        
        }
      }
      
      if(!empty($reference_all_data[0]['reference_name']))
      {
        foreach($reference_all_data as $data)
        {
          $query = $this->db->insert('hr_employee_reference', $data);        
        }
      }      
      
      if(!empty($dependente_all_data[0]['dependent_name']))
      {
        foreach($dependent_all_data as $data)
        {
          $query = $this->db->insert('hr_employee_dependent', $data);        
        }
      }        
      
      if(!empty($nominee_all_data[0]['nominee_name']))
      {
        foreach($nominee_all_data as $data)
        {
          $query = $this->db->insert('hr_employee_nominee', $data);        
        }
      } 
      
      if(!empty($document_all_data[0]['document_title']))
      {
        foreach($document_all_data as $data)
        {          
          $query = $this->db->insert('hr_employee_document', $data);
        }
      }
      
      if(!empty($experience_data))
      {
        $query = $this->db->insert('hr_employee_experience', $experience_data);
//        echo $this->db->last_query();
      }
      return $query;
    }
    
    function getAllEmployees()
    {
      $this->db->select('emp_gen_details.*, hr_employee_record.*, hr_departments.*, hr_designations.*, campus.*');
      $this->db->from('hr_employee_record');
      $this->db->join('emp_gen_details', 'hr_employee_record.emp_id = emp_gen_details.emp_id', 'LEFT');
      $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
      $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
      $this->db->join('hr_company', 'hr_departments.company_id = hr_company.company_id', 'LEFT');
      $this->db->join('campus', 'hr_employee_record.campus_id = campus.campus_id', 'LEFT');
      if($this->session->userdata('account_role_id') != 2){
        $this->db->where('hr_departments.company_id', $this->session->userdata('company_id'));        
      }
      $this->db->order_by('created_date', 'DESC');
      $this->db->group_by('hr_employee_record.emp_id');
      $query = $this->db->get();
     //echo $this->db->last_query();
      return $query->result_array();
    }
    
    public function get_dep_nominee($emp_id){
        $query = $this->db->query("select hr_employee_dependent.*, relation.*
                 from hr_employee_dependent
                 inner join relation on relation.relation_id = hr_employee_dependent.dependent_relation
                 where emp_id = '$emp_id'
                   ");
        
        return $query->result_array();
    }
    
    function getDependent($emp_id)
    {
      $this->db->select('*');
      $this->db->from('hr_employee_dependent');
      $this->db->where('emp_id', $emp_id);
      $query = $this->db->get();
      
      return $query->result_array();
    }
    
    function addDependent($dependent_data)
    {
      $query = $this->db->insert('hr_employee_dependent', $dependent_data);
      return $query;      
    }
        
    function getNominee($emp_id)
    {
      $this->db->select('*');
      $this->db->from('hr_employee_nominee');
      $this->db->where('emp_id', $emp_id);
      $query = $this->db->get();
    
      return $query->result_array();
    }
    
    function addNominee($nominee_data)
    {
      $query = $this->db->insert('hr_employee_nominee', $nominee_data);
      return $query;      
    }
    
    // Get Refrences from DB \\
    function getReference($emp_id)
    {
      $this->db->select('*');
      $this->db->from('hr_employee_reference');
      $this->db->where('emp_id', $emp_id);
      $query = $this->db->get();
    
      return $query->result_array();
    }
    
    // Add Reference data in DB \\
    function addReference($reference_data)
    {
      $query = $this->db->insert('hr_employee_reference', $reference_data);
      return $query;      
    }
    
    // Get Documents from DB \\ 
    function getDocument($emp_id)
    {
      $this->db->select('*');
      $this->db->from('hr_employee_document');
      $this->db->where('emp_id', $emp_id);
      $query = $this->db->get();
    
      return $query->result_array();
    } 
    
    function addDocument($document_data)
    {
//      echo '<pre>';
//      print_r($document_daata);
      
      $query = $this->db->insert('hr_employee_document', $document_data);
      return $query;      
    }
    
    // check Employee existance 
    function checkEmployee($employee_data)
    {
      $query = $this->db->get_where('hr_employee_record', $employee_data);
      return $query->row();
    }
    
    
    public function get_gen_emp($emp_id){
        $query = $this->db->query("select * from emp_gen_details where emp_id = '$emp_id'");
        return $query->result_array();
    }
    
    public function get_emp_details($emp_id){
        $query = $this->db->query("select * from hr_employee_record where emp_id = '$emp_id'");
        return $query->result_array();
    }
    
    function getEmployee($emp_id)
    {
      $this->db->select('hr_employee_record.*, hr_employee_contact.*, hr_employee_experience.*, hr_company.*, hr_departments.*, hr_designations.*, campus.*, cities.*, hr_employee_bank.*, hr_employee_facilities.*, hr_employee_dependent.*,emp_gen_details.*, religion.*');
      $this->db->from('hr_employee_record');      
      
      $this->db->join('hr_employee_contact', 'hr_employee_record.emp_id = hr_employee_contact.emp_id', 'LEFT');
      $this->db->join('hr_employee_experience', 'hr_employee_record.emp_id = hr_employee_experience.emp_id', 'LEFT');
      $this->db->join('hr_company', 'hr_employee_record.record_company_name = hr_company.company_id', 'LEFT');
      $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
      $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
      $this->db->join('campus', 'hr_employee_record.campus_id = campus.campus_id', 'LEFT');
      $this->db->join('cities', 'hr_employee_contact.place_of_birth = cities.city_id', 'LEFT');
      $this->db->join('hr_employee_bank', 'hr_employee_contact.emp_id = hr_employee_bank.emp_id', 'LEFT');
      $this->db->join('hr_employee_facilities', 'hr_employee_contact.emp_id = hr_employee_facilities.emp_id', 'LEFT');
      $this->db->join('hr_employee_dependent', 'hr_employee_contact.emp_id = hr_employee_dependent.emp_id', 'LEFT');
      $this->db->join('emp_gen_details', 'hr_employee_record.emp_id = emp_gen_details.emp_id', 'LEFT');
      $this->db->join('religion', 'hr_employee_contact.religion = religion.religion_id', 'LEFT');
      $this->db->where(array('hr_employee_record.emp_id' => $emp_id));
      $query = $this->db->get();
     //echo $this->db->last_query();
      return $query->result_array();
    }
    
    function updateEmployee($emp_id, $contact_data, $dependent_all_data, $dependent_id, $nominee_all_data, $nominee_id, $degree_all_data, $course_all_data, $degree_education_id, $course_education_id, $experience_data, $reference_all_data, $reference_id, $document_all_data, $document_id, $record_data)
    {       
      
//      $ere = array($degree_all_data, $course_all_data, $degree_education_id, $course_education_id, $experience_data, $reference_all_data, $reference_id, $document_all_data, $document_id, $record_data);
//      echo '<pre>';
//      var_dump($ere );
//      echo '</pre>';
//      exit;
      
      $this->db->where('hr_employee_contact.emp_id', $emp_id);
      $this->db->update('hr_employee_contact', $contact_data);
      
      $this->db->where('hr_employee_experience.emp_id', $emp_id);
      $this->db->update('hr_employee_experience', $experience_data);
      
      $this->db->where('hr_employee_record.emp_id', $emp_id);            
      $this->db->update('hr_employee_record', $record_data);
      
      foreach($degree_all_data as $key => $value)
      {
        $this->db->where('emp_education_id', $degree_education_id[$key]);
        $this->db->update('hr_employee_education', $value);
      }
      
      foreach($course_all_data as $key => $value)
      {
        $this->db->where('emp_education_id', $course_education_id[$key]);
        $this->db->update('hr_employee_education', $value);
      }
      
      foreach($dependent_all_data as $key => $value)
      {
        $this->db->where('dependent_id', $dependent_id[$key]);
        $this->db->update('hr_employee_dependent', $value);        
      }
      
      foreach($nominee_all_data as $key => $value)
      {
        $this->db->where('nominee_id', $nominee_id[$key]);
        $this->db->update('hr_employee_nominee', $value);
      }
      
      foreach($reference_all_data as $key => $value)
      {
        $this->db->where('reference_id', $reference_id[$key]);
        $this->db->update('hr_employee_reference', $value);        
      }
      
      foreach($document_all_data as $key => $value)
      {
        $this->db->where('document_id', $document_id[$key]);
        $query = $this->db->update('hr_employee_document', $value);
//        echo $this->db->last_query();
      }      
      return $query;
    }
    
    // Add Employee educaton data \\
    function addEmployeeEducation($education_data)
    {
      $query = $this->db->insert('hr_employee_education', $education_data);  
      return $query;      
    }    
    
    function getEducation($emp_id)
    {
      $this->db->select('*');
      $this->db->from('hr_employee_education');
      $this->db->where('emp_id', $emp_id);
      $query = $this->db->get();
    
      return $query->result_array();
    } 
    
    // get Employee by Department
    function searchEmployee($dept_data)
    {
      $this->db->select('hr_employee_record.*, hr_departments.*, hr_designations.*, campus.*');
      $this->db->from('hr_employee_record');
      $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
      $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
      $this->db->join('campus', 'hr_employee_record.campus_id = campus.campus_id', 'LEFT');
      $this->db->order_by('created_date', 'DESC');
      $this->db->where($dept_data);
      $query = $this->db->get();
      
      return $query->result_array();
    }
    
    // get Employee by Campus
    function searchEmployeeByCampus($campus_data)
    {
      $this->db->select('hr_employee_record.*, hr_departments.*, hr_designations.*, campus.*');
      $this->db->from('hr_employee_record');
      $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
      $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
      $this->db->join('campus', 'hr_employee_record.campus_id = campus.campus_id', 'LEFT');
      $this->db->order_by('created_date', 'DESC');
      $this->db->where($campus_data);
      $query = $this->db->get();
      
      return $query->result_array();
    }
    
    function getPayrollEmployee($emp_id)
    {
      $this->db->select('hr_employee_record.*, hr_employee_contact.*, hr_employee_experience.*, hr_company.*, hr_departments.*, hr_designations.*, campus.*, cities.*');
      $this->db->from('hr_employee_record');      
      $this->db->join('hr_employee_contact', 'hr_employee_record.emp_id = hr_employee_contact.emp_id', 'LEFT');
      $this->db->join('hr_employee_experience', 'hr_employee_record.emp_id = hr_employee_experience.emp_id', 'LEFT');
      $this->db->join('hr_company', 'hr_employee_record.record_company_name = hr_company.company_id', 'LEFT');
      $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
      $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
      $this->db->join('campus', 'hr_employee_record.campus_id = campus.campus_id', 'LEFT');
      $this->db->join('cities', 'hr_employee_contact.place_of_birth = cities.city_id', 'LEFT');
      $this->db->where(array('hr_employee_record.emp_id' => $emp_id));
      $query = $this->db->get();
      
      return $query->result_array();
    }
    
    // get Designations for According to the Department    
    function DepartmentDesignations($department_id)
    {       
        $query = $this->db->get_where('hr_designations', array('department_id' => $department_id));
        return $query->result_array();
    }    
    
    // get General Account Roles from db    
    function getRoles()
    {
        $this->db->order_by('role_title', 'ASC'); 
        $query = $this->db->get('gen_account_roles');
		
        return $query->result_array();
    }
    
    // get Employee to generate Payroll
    
    // check Department existance 
    function checkDepartment($department)
    {
        $query = $this->db->get_where('hr_departments', $department);
        return $query->result_array();
    }
    
    // add Department in db    
    function addDepartment($department_data)
    {
        $query = $this->db->insert('hr_departments', $department_data); 
        return $query;    
    }
    
    // get all Departments from db    
    function getAllDepartments()
    {
        $this->db->select('hr_departments.*, gen_account_roles.*, hr_company.company_name');
        $this->db->from('hr_departments');
        $this->db->join('gen_account_roles', 'hr_departments.account_role_id = gen_account_roles.account_role_id', 'INNER');
        $this->db->join('hr_company', 'hr_departments.company_id = hr_company.company_id', 'INNER');
        $this->db->order_by('hr_departments.department_name', 'ASC'); 
        $query = $this->db->get();
		
        return $query->result_array();
    }
    
    // get a Department for update    
    function getDepartment($dept_id)
    {       
        $query = $this->db->get_where('hr_departments', array('department_id' => $dept_id));
        return $query->result_array();
    }
    
    // update the Department name    
    function updateDepartment($dept_id, $department_data)
    {
        $this->db->where('department_id', $dept_id);
        $query = $this->db->update('hr_departments', $department_data);
		 
        return $query;        
    }
    
    //--------------End of Department----------\\
  
    
    
    // check Designation existance 
    function checkDesignation($designation)
    {
        $query = $this->db->get_where('hr_designations', $designation);
        return $query->result_array();
    }
    
    // add Designation in db    
    function addDesigantion($designation_data)
    {
        $query = $this->db->insert('hr_designations', $designation_data); 
        return $query;    
    }
    
    // get all Designations from db    
    function getAllDesignations()
    {
        
        $this->db->select('hr_designations.*, hr_departments.*');
        $this->db->from('hr_designations');
        $this->db->join('hr_departments', 'hr_designations.department_id = hr_departments.department_id', 'INNER');
        $this->db->order_by('hr_designations.designation_title', 'ASC');        
        $query = $this->db->get();
		
        return $query->result_array();
    }
    
    
    // get a Designation for update    
    function getDesignation($desig_id)
    {       
        $query = $this->db->get_where('hr_designations', array('designation_id' => $desig_id));
        return $query->result_array();
    }
    
    // update the Designation Title    
    function updateDesignation($desig_id, $designation_data)
    {
        $this->db->where('designation_id', $desig_id);
        $query = $this->db->update('hr_designations', $designation_data);
		 
        return $query;        
    }
    
    //--------------End of Designation----------\\
    
 
    function addSalaryStatus($salary_data)
    {
      $query = $this->db->insert('hr_employee_salary', $salary_data);      
      return $query;
    }
    
    //get all Salary status of Employee
    function getSalaryHistory($emp_data)
    {
        $query = $this->db->get_where('hr_employee_salary', $emp_data);
        return $query->result_array();
    }
    
    // get Salary for edit
    function getSalaryStatus($salary_id)
    {
        $this->db->select('hr_employee_salary.*, hr_employee_record.current_salary');
        $this->db->from('hr_employee_salary');
        $this->db->join('hr_employee_record', 'hr_employee_salary.emp_id = hr_employee_record.emp_id', 'inner');
        $query = $this->db->where(array('emp_salary_id' => $salary_id));		
        $query = $this->db->get();

        return $query->result_array();
    } 
    
    // update Salary status
    function updateSalaryStatus($salary_id, $salary_data)
    {
        $this->db->where('emp_salary_id', $salary_id);
        $query = $this->db->update('hr_employee_salary', $salary_data);        
        return $query;
    }
    
    //Employee Net Salary after Deductions    
    function maxSalaryStatus($emp_id)
    {
      $query = $this->db->query("SELECT salary_type . * , hr_employee_salary . * 
FROM  `hr_employee_salary` 
INNER JOIN salary_type ON salary_type.sal_type_id = hr_employee_salary.salary_type
WHERE  `salary_amount` !=  ''
AND  `emp_id` =  '$emp_id'
ORDER BY  `salary_date` DESC 
LIMIT 1");
      //echo $this->db->last_query();
      
      return $query->result_array();
    }
    
    
    public function get_emp_bankDetails($emp_id){
        $this->db->select('*');
        $this->db->where('bank_name !=', '');
        $this->db->where('emp_id', $emp_id);
        $this->db->limit('1', '');                    
      $query = $this->db->get('hr_employee_bank');
 
      return $query->result_array();
    }
    
    
    public function get_emp_personal_details($emp_id){
        $query = $this->db->query("select father_name, mother_name, spouse_name, date_of_birth, cnic_no, gender, blood_group, marital_status, religion, nationality, emp_picture
                                    from hr_employee_contact where emp_id = '$emp_id'
                                 ");
        
        return $query->result_array();
    }
    
    // check Company existance 
    function checkCompany($company)
    {
        $query = $this->db->get_where('hr_company', $company);
        return $query->result_array();
    }
    
    // add Company in db    
    function addCompany($company_data)
    {
        $query = $this->db->insert('hr_company', $company_data); 
        return $query;    
    }
    
    // get all Company from db    
    function getAllCompany()
    {
        $this->db->select('hr_company.*');
        $this->db->from('hr_company');
        $this->db->order_by('hr_company.company_name', 'ASC'); 
        $query = $this->db->get();
		
        return $query->result_array();
    }
    
    // get a Company for update    
    function getCompany($dept_id)
    {       
        $query = $this->db->get_where('hr_company', array('company_id' => $dept_id));
        return $query->result_array();
    }
    
    // update the Company name    
    function updateCompany($comp_id, $company_data)
    {
        $this->db->where('company_id', $comp_id);
        $query = $this->db->update('hr_company', $company_data);
        return $query;        
    }
    
    //--------------End of Company----------\\
   
    
    //   ***** Start function for Visitor Module *****   //
    
    // check duplication of Visitor name
    
    function checkVisitor($cnic, $visitor_name)
    {      
      $this->db->select('emp_id');
      $query1 = $this->db->get_where('hr_employee_contact', array('cnic_no' => $cnic));        
      $id = $query1->row();
      $emp_id = $id->emp_id;
      
      if($query1->num_rows() != 0){
        //udpate visitor status in employee record table 
        $this->db->where('emp_id', $emp_id);
        $this->db->update('hr_employee_record', array('visitor' => '1'));
        
        return $a=1;
      }
      else{
          // add visitor in employee record table with remaining fields blank
          $this->db->insert('hr_employee_record', array('employee_name' => $visitor_name, 'visitor' => '1'));
          $emp_id = $this->db->insert_id();
          $this->db->insert('hr_employee_contact', array('emp_name' => $visitor_name, 'cnic_no' => $cnic, 'emp_id' => $emp_id));
      }
    }
    
    
    // get a visitor for update    
    function getVisitor($id)
    {       
        $query = $this->db->get_where('hr_visitors', array('visitor_id' => $id));		
        return $query->row();
    }
    
    // update the visitor    
    function updateVisitor($id, $data)
    {
        $this->db->where('visitor_id', $id);
        $this->db->update('hr_visitors', $data);
		 
        return $this->db->affected_rows();        
    }
    
    // get all visitors from db    
    function getAllvisitors()
    {
        $this->db->select('hr_visitors.*');
        $this->db->order_by('visitor_name', 'ASC');
        $query = $this->db->get('hr_visitors');
		
        return $query->result_array();
    }
    
    //------------- End Visitor Queries -------------\\
    
 //campuses
    
    public function save_campus_details(){
        $data = array(
            'campus_name' => $this->input->post('campus_name'),
            'campus_code' => $this->input->post('campus_code'),
            'city_id' => $this->input->post('city_id')
        );
        
        $query = $this->db->insert_string('campus', $data);
        
        return $this->db->query($query);
    }
    
    public function get_all_campuses(){
        $query = $this->db->query("select campus.*, cities.*
            from campus
            inner join cities on cities.city_id = campus.city_id
        ");
        
        return $query->result_array();
    }
    
    public function get_campus_data($campus_id){
        $query = $this->db->query("select * from campus where campus_id = '$campus_id'");
        
        return $query->result_array();
    }
    
    public function update_campus_data($campus_id){
        $data = array(
            'campus_name' => $this->input->post('campus_name'),
            'campus_code' => $this->input->post('campus_code'),
            'city_id' => $this->input->post('city_id')
        );
        
         $query = $this->db->update_string('campus', $data, " campus_id = '".$campus_id."' ");
    
         $this->db->query($query);
            return 1;
    }
    
    ///end campuses//
    
    ///Grades
    
    public function save_grade_data(){
        $data = array(
            'grade' => $this->input->post('grade')
        );
        
        $query = $this->db->insert_string('grades', $data);
        
        return $this->db->query($query);
    }
    
    public function get_all_grades(){
        $query = $this->db->query("select * from grades");
        
        return $query->result_array();
    }
    
    public function get_grade_by_id($grade_id){
        $query = $this->db->query("select * from grades where grade_id = '$grade_id'");
        
        return $query->result_array();
    }
    
    public function update_grade_data($grade_id){
        $data = array();
        
        $query = $this->db->update_string('grades', $data, "grade_id = '".$grade_id."' ");
        
        $this->db->query($query);
        
        return 1;
    }
    ////End Grades////
    
    ///banks///
    
    public function save_bank_details(){
        $data = array(
            'bank_name' => $this->input->post('bank_name')
            
        );
        
        $query = $this->db->insert_string('banks', $data);
        
        $this->db->query($query);
    }
    
    public function get_all_banks(){
        $query = $this->db->query(" select * from banks");
        
        return $query->result_array();
    }
    
    public function get_all_bank_details(){
        $query = $this->db->query("select * from banks");
        
        return $query->result_array();
    }
    
    public function get_bank_by_id($bank_id){
        $query = $this->db->query("select*
                                   from banks
                                   where bank_id = '$bank_id'");
        
        return $query->result_array();
    }
    
    public function update_bank_details($bank_id){
        $data = array(
            'bank_name' => $this->input->post('bank_name'),
            
        );
        
        $query = $this->db->update_string('banks', $data, "bank_id= '".$bank_id."' ");
        
        $this->db->query($query);
        
        return 1;
    }
    ///end///
    
    ///Facilty
    
    public function save_facility_data(){
        $data = array(
            'facility' => $this->input->post('facility_name')
        );
        $query = $this->db->insert_string('facilities', $data);
        $this->db->query($query);
    }
    
    public function get_all_facilities(){
        $query = $this->db->query("select * from facilities");
        
        return $query->result_array();
    }
    
    public function get_facility_by_id($facility_id){
        $query = $this->db->query("select * from facilities where facility_id = '$facility_id'");
        
        return $query->result_array();
    }
    
    public function update_facility_data($facility_id){
        $data = array(
            'facility' => $this->input->post('facility_name')
        );
        $query = $this->db->update_string('facilities', $data, "facility_id = '".$facility_id."'");
        $this->db->query($query);
        return 1;
    }
    ///End Facilities///
    
    /////Religions///
    
    public function save_religion_data(){
        $data = array(
            'religion' => $this->input->post('religion')
        );
        
        $query = $this->db->insert_string('religion', $data);
        $this->db->query($query);
    }
    
    public function get_all_religions(){
        $query = $this->db->query("select * from religion");
        
        return $query->result_array();
    }
    
    public function get_religion_by_id($religion_id){
        $query = $this->db->query("select * from religion where religion_id = '$religion_id'");
        
        return $query->result_array();
    }
    
    public function udpate_religion_data($religion_id){
       $data = array(
           'religion' => $this->input->post('religion')
       );
       
       $query = $this->db->update_string('religion', $data, "religion_id = '".$religion_id."'");
       
       $this->db->query($query);
       return 1;
    }
    
    /////End Religions///
    
    
    /////Relations/////
    
    public function save_relation_data() {
        $data = array(
            'relationship' => $this->input->post('relation')
        );
        
        $query = $this->db->insert_string('relation', $data);
        $this->db->query($query);
    }
    
    public function get_all_relations(){
        $query = $this->db->query("select * from relation");
        
        return $query->result_array();
    }
    
    public function get_relation_by_id($relation_id){
        $query = $this->db->query("select * from relation where relation_id = '$relation_id'");
        
        return $query->result_array();
    }
    
    public function update_relation_data($relation_id){
        $data = array(
            'relationship' => $this->input->post('relation')
        ); 
        
        $query = $this->db->update_string('relation', $data, "relation_id = '".$relation_id."'");
        $this->db->query($query);
        return 1;
    }
    ///End Relations///
    
    
    ////Documents////
    public function save_document_data(){
        $data = array(
            'doc_name' => $this->input->post('doc_name')
        );
        
        $query = $this->db->insert_string('documents', $data);
        
        $this->db->query($query);
    }
    
    public function get_all_documents(){
        $query = $this->db->query("select * from documents");
        
        return $query->result_array();
    }
    
    public function get_documents_by_id($doc_id){
       $query = $this->db->query("select * from documents where doc_id = '$doc_id'");
        
        return $query->result_array(); 
        
    }
    
    public function update_document_data($doc_id){
        $data = array(
            'doc_name' => $this->input->post('doc_name')
        );
        
        $query = $this->db->update_string('documents', $data, "doc_id = '".$doc_id."'");
        
        $this->db->query($query);
        
        return 1;
    }
    /////End Documents///
    
    
    ///Countries///
    public function save_country_data(){
        $data = array(
            'country' => $this->input->post('country')
        );
        
        $query = $this->db->insert_string('country', $data);
        
        $this->db->query($query);
    }
    
    public function get_all_countries(){
        $query = $this->db->query("select * from country");
        
        return $query->result_array();
    }
    
    public function get_country_by_id($country_id){
        $query = $this->db->query("select * from country where country_id = '$country_id'");
        
        return $query->result_array();
    }
    
    public function update_country_data($country_id){
         $data = array(
            'country' => $this->input->post('country')
        );
        
        $query = $this->db->update_string('country', $data, "country_id = '".$country_id."'");
        
        $this->db->query($query);
        
        return 1;
    }
    ////End Countries///
    
    ///social details
    
    public function get_emp_socialDetails($emp_id){
        $query = $this->db->query("select * from hr_employee_social_media where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    /////end social details////
    
    ////contact details
    
    public function get_emp_contactDetails($emp_id){
        $query = $this->db->query("select * from hr_employee_contact where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    
    ////end contact
    
    ////medical details
    
    public function getmedicalDetails($emp_id){
        $query = $this->db->query("select * from hr_employee_medical where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    ///end medical details
    
    
    /////certification
    
    public function getCertification($emp_id){
        $query = $this->db->query("select * from hr_employee_training_certificates where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    ///end certification
    
    
    /////skills
    
    public function getSkillsdetails($emp_id){
        $query = $this->db->query("select * from hr_employee_skills where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    
    ///end skills
    
    
    ////langugae
    public function getlangdetails($emp_id){
        $query = $this->db->query("select * from hr_employee_language where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    ///end language
    
    ////membership
    
    public function getmembership($emp_id){
        $query = $this->db->query("select * from hr_employee_memberships where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    
    /////end memebership
    
    /////License
    public function getlicenseDetails($emp_id){
        $query = $this->db->query("select * from hr_employee_license where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    
    /////end license
    
    
    /////Experience
    
    public function getexpDetails($emp_id){
        $query = $this->db->query("select * from hr_employee_experience where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    
    /////End Experience
    
    
    /////salary
    
    public function getEmployeesalary($emp_id){
        $query = $this->db->query("select hr_employee_salary.*, salary_type.*
                from hr_employee_salary 
                inner join salary_type on salary_type.sal_type_id = hr_employee_salary.salary_type
                where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    
    ////end salary
    
    
    ////bank detail of employee
    
    public function getbankDetails(){
        $query = $this->db->query("select * from banks");
        
        return $query->result_array();
    }
    
    
    ///end of bank details employee
    
    /////Employee Facility
    
    public function get_emp_facilities($emp_id){
        $query = $this->db->query("select hr_employee_facilities.*, facilities.*
                from hr_employee_facilities
                inner join facilities on facilities.facility_id = hr_employee_facilities.fac_id
                where emp_id = '$emp_id'");
       // echo $this->db->last_query();
        return $query->result_array();
    }
    
    /////End Employee Facility
    
    //salary type
    public function save_sal_details(){
        $data = array(
            'sal_type_name' => $this->input->post('salary_type')
        );
        
        $query = $this->db->insert_string('salary_type', $data);
        
        $this->db->query($query);
    }
    
    public function get_sal_details(){
        $query = $this->db->query("select * from salary_type");
        
        return $query->result_array();
    }
    
    public function get_sal_by_id($sal_id){
        $query = $this->db->query("select * from salary_type where sal_type_id = '$sal_id'");
        
        return $query->result_array();
    }
    
    public function update_sal_data($salary_id){
        $data = array(
            'sal_type_name' => $this->input->post('salary_type')
        );
        
        $query = $this->db->update_string('salary_type', $data, "sal_type_id = '".$salary_id."'");
        
        $this->db->query($query);
        
        return 1;
    }
    ///end salary type
    
    public function addAdditionalRecord($add_data){
        $query = $this->db->insert('hr_employee_record', $add_data);
      return $this->db->insert_id();
    }
    
    ////social details
    
    public function get_all_socials($emp_id){
        $query = $this->db->query("select * from hr_employee_social_media where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    
    ////contact details
    
    
    //////cv details
    
    public function get_cv_details($emp_id){
        $query = $this->db->query("select * from hr_employee_contact where emp_id = '$emp_id'");
        
        return $query->result_array();
    }
    
   
}
<?php

class Hris_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // HRIS Login     
    function hrisLogin($login_data)
    {
        $this->db->select('hris_logins.*, hr_company.*,gen_account_roles.role_title');
        $this->db->join('hr_company', 'hris_logins.company_id = hr_company.company_id', 'LEFT');
        $this->db->join('gen_account_roles', 'gen_account_roles.account_role_id = hris_logins.account_role_id');
        $this->db->where($login_data);
        $query = $this->db->get('hris_logins');
     
        return $query->row();           
    }

    //   ***** Start function for City Module *****   //
    // check duplication of city name

    function checkCity($city) {
        $query = $this->db->get_where('cities', $city);

        return $query->result_array();
    }

    // add city in db

    function addCity($city) {
        $query = $this->db->insert('cities', $city);

        return $this->db->insert_id();
    }

    // get a city for update

    function getCity($id) {
        $query = $this->db->get_where('cities', array('city_id' => $id));

        return $query->result_array();
    }

    // update the city name
 function Departmentgrade($dept_id)
     {
       $query = $this->db->query('select grade_level.grade_level_id,levels.title,grades.class from grade_level 
Inner join grades on grades.grade_id = grade_level.grade_id 
Inner join levels on levels.level_id = grade_level.level_id 
where grade_level.department_id = '.$dept_id);
       
       return $query->result_array(); 
     }
    function updateCity($id, $city) {
        $this->db->where('city_id', $id);
        $query = $this->db->update('cities', $city);

        return $query;
    }

    // get all cities from db    
    function getAllcities() {
        $this->db->order_by('city_name', 'ASC');
        $query = $this->db->get('cities');

        return $query->result_array();
    }

    //------------- End City Queries -------------\\
    // get all campuses data from db    
    function getAllCampuses() {
        $this->db->order_by('campus_name', 'ASC');
        $query = $this->db->get('campus');

        return $query->result_array();
    }

    // get Employee Contact Table Fields Name  
    function hr_contact_fields() {
        return $this->db->list_fields('hr_employee_contact');
    }

    // get Employee Education Table Fields Name  
    function hr_education_fields() {
        return $this->db->list_fields('hr_employee_education');
    }

    // get Employee Experience Table Fields Name  
    function hr_experience_fields() {
        return $this->db->list_fields('hr_employee_experience');
    }

    // get Employee Record Table Fields Name  
    function hr_record_fields() {
        return $this->db->list_fields('hr_employee_record');
    }

    /// ********************* Start Tariq Mayo  
    //add employee in hr_employee_record table
    function addEmployeeRecord($record_data) {
        $query = $this->db->insert('emp_gen_details', $record_data);
        //echo $query;
        return $this->db->insert_id();
    }

    //add employee in salary detail in hr_employee_salary table
    function addSalaryDetails($salary_data) {
        $query = $this->db->insert('hr_employee_salary', $salary_data);
        return $this->db->insert_id();
    }

    //add employee in bank detail in hr_employee_bank table
    function addBankDetails($bank_data) {
        $query = $this->db->insert('hr_employee_bank', $bank_data);
        return $this->db->insert_id();
    }

    //add employee in Facility detail in hr_employee_facilities table
    function addFacilityDetails($facility_data) {
        $query = $this->db->insert('hr_employee_facilities', $facility_data);
        return $this->db->insert_id();
    }

    //add employee in contact detail in hr_employee_contact table
    function addContactRecord($contact_data) {
        $query = $this->db->insert('hr_employee_contact', $contact_data);
        return $this->db->insert_id();
    }

    //add employee in Dependent detail in hr_employee_dependent table
    function addDependentDetails($dependent_data) {
        $query = $this->db->insert('hr_employee_dependent', $dependent_data);
        return $this->db->insert_id();
    }

    //add employee in Social Media detail in hr_employee_social_media table
    function addSocialMediaDetails($social_media_data) {
        $query = $this->db->insert('hr_employee_social_media', $social_media_data);
        return $this->db->insert_id();
    }

    //add employee in Emergency contact detail in hr_employee_nominee table
    function addEmergencyDetails($emergency_data) {
        $query = $this->db->insert('hr_employee_nominee', $emergency_data);
        return $this->db->insert_id();
    }

    //add employee in Medical detail in hr_employee_medical table
    function addMedicalDetails($medical_data) {
        $query = $this->db->insert('hr_employee_medical', $medical_data);
        return $this->db->insert_id();
    }

    //add employee in Experience detail in hr_employee_experience table
    function addExperienceDetails($experienc_data) {
        $query = $this->db->insert('hr_employee_experience', $experienc_data);
        return $this->db->insert_id();
    }

    //add employee in Reference detail in hr_employee_reference table
    function addReferenceDetails($ref_data) {
        $query = $this->db->insert('hr_employee_reference', $ref_data);
        return $this->db->insert_id();
    }

    //add employee in Documents detail in hr_employee_document table
    function addDocumentsDetails($doc_data) {
        $query = $this->db->insert('hr_employee_document', $doc_data);
        return $this->db->insert_id();
    }

    //add employee in Education detail in hr_employee_education table
    function addEducationDetails($education_data) {
        $query = $this->db->insert('hr_employee_education', $education_data);
        return $this->db->insert_id();
    }

    //add employee in Trainings/Certification detail in hr_employee_training_certificates table
    function addTrainingDetails($training_data) {
        $query = $this->db->insert('hr_employee_training_certificates', $training_data);
        return $this->db->insert_id();
    }

    //add employee in skills detail in hr_employee_skills table
    function addSkillDetails($skill_data) {
        $query = $this->db->insert('hr_employee_skills', $skill_data);
        return $this->db->insert_id();
    }

    //add employee in  language detail in hr_employee_language table
    function addLanguageDetails($language_data) {
        $query = $this->db->insert('hr_employee_language', $language_data);
        return $this->db->insert_id();
    }

    //add employee in license detail in hr_employee_license table
    function addLicenseDetails($license_data) {
        $query = $this->db->insert('hr_employee_license', $license_data);
        return $this->db->insert_id();
    }

    //add employee in Membershipanguage detail in hr_employee_memberships table
    function addMembershipDetails($membership_data) {
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
    function addEmployeeDetails($contact_data, $education_all_data, $experience_data, $reference_all_data, $dependent_all_data, $nominee_all_data, $document_all_data) {
        $this->db->insert('hr_employee_contact', $contact_data);

        if (!empty($education_all_data)) {
            foreach ($education_all_data as $data) {
                $query = $this->db->insert('hr_employee_education', $data);
            }
        }

        if (!empty($reference_all_data[0]['reference_name'])) {
            foreach ($reference_all_data as $data) {
                $query = $this->db->insert('hr_employee_reference', $data);
            }
        }

        if (!empty($dependente_all_data[0]['dependent_name'])) {
            foreach ($dependent_all_data as $data) {
                $query = $this->db->insert('hr_employee_dependent', $data);
            }
        }

        if (!empty($nominee_all_data[0]['nominee_name'])) {
            foreach ($nominee_all_data as $data) {
                $query = $this->db->insert('hr_employee_nominee', $data);
            }
        }

        if (!empty($document_all_data[0]['document_title'])) {
            foreach ($document_all_data as $data) {
                $query = $this->db->insert('hr_employee_document', $data);
            }
        }

        if (!empty($experience_data)) {
            $query = $this->db->insert('hr_employee_experience', $experience_data);
//        echo $this->db->last_query();
        }
        return $query;
    }

    function getAllEmployees() {
        $this->db->select('emp_gen_details.*, hr_employee_record.*, hr_departments.*, hr_designations.*, hr_company.*, hr_employee_contact.*');
        $this->db->from('hr_employee_record');
        $this->db->join('emp_gen_details', 'hr_employee_record.emp_id = emp_gen_details.emp_id', 'LEFT');
        $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
        $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
        $this->db->join('hr_company', 'hr_employee_record.record_company_name = hr_company.company_id', 'LEFT');
        $this->db->join('hr_employee_contact', 'hr_employee_record.emp_id = hr_employee_contact.emp_id', 'LEFT');
        if ($this->session->userdata('account_role_id') != 2) {
            $this->db->where('hr_departments.company_id', $this->session->userdata('company_id'));
        }
        $this->db->order_by('emp_gen_details.emp_code', 'ASC');
        $this->db->group_by('hr_employee_record.emp_id');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    public function searchEmpLogs($dept_data) {
        $this->db->select('employee_logins.emp_id as emp_e_acc, emp_gen_details.*, hr_employee_record.*, hr_departments.*, hr_designations.*, hr_company.*, hr_employee_contact.*');
        $this->db->from('hr_employee_record');
        $this->db->join('emp_gen_details', 'hr_employee_record.emp_id = emp_gen_details.emp_id', 'LEFT');
        $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
        $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
        $this->db->join('hr_company', 'hr_employee_record.record_company_name = hr_company.company_id', 'LEFT');
        $this->db->join('hr_employee_contact', 'hr_employee_record.emp_id = hr_employee_contact.emp_id', 'LEFT');
        $this->db->join('employee_logins', 'hr_employee_record.emp_id = employee_logins.emp_id', 'LEFT');
        $this->db->where($dept_data);
        if ($this->session->userdata('account_role_id') != 2) {
            $this->db->where('hr_departments.company_id', $this->session->userdata('company_id'));
        }
        $this->db->order_by('emp_gen_details.emp_code', 'ASC');
        $this->db->group_by('hr_employee_record.emp_id');
        $query = $this->db->get();

        return $query->result_array();
    }

    function get_faculty_report($campus_id) {
        $this->db->select('emp_gen_details.*, hr_employee_record.*, hr_departments.*, hr_designations.*, hr_company.*, hr_employee_education.*, hr_employee_contact.*, campus.*');
        $this->db->from('hr_employee_record');
        $this->db->join('emp_gen_details', 'hr_employee_record.emp_id = emp_gen_details.emp_id', 'LEFT');
        $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
        $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
        $this->db->join('hr_company', 'hr_employee_record.record_company_name = hr_company.company_id', 'LEFT');
        $this->db->join('hr_employee_education', 'hr_employee_record.emp_id = hr_employee_education.emp_id', 'LEFT');
        $this->db->join('hr_employee_contact', 'hr_employee_record.emp_id = hr_employee_contact.emp_id', 'LEFT');
        $this->db->where('campus.campus_id', $campus_id);
        $this->db->join('campus', 'hr_employee_record.campus_id = campus.campus_id', 'LEFT');
        if ($this->session->userdata('account_role_id') != 2) {
            $this->db->where('hr_departments.company_id', $this->session->userdata('company_id'));
        }
        $this->db->order_by('emp_gen_details.emp_code', 'ASC');
        $this->db->group_by('hr_employee_record.emp_id');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    public function get_dep_nominee($emp_id) {
        $query = $this->db->query("select hr_employee_dependent.*, relation.*
                 from hr_employee_dependent
                 inner join relation on relation.relation_id = hr_employee_dependent.dependent_relation
                 where emp_id = '$emp_id'
                   ");

        return $query->result_array();
    }

    function getDependent($emp_id) {
        $this->db->select('*');
        $this->db->from('hr_employee_dependent');
        $this->db->where('emp_id', $emp_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    function addDependent($dependent_data) {
        $query = $this->db->insert('hr_employee_dependent', $dependent_data);
        return $query;
    }

    function getNominee($emp_id) {
        $this->db->select('*');
        $this->db->from('hr_employee_nominee');
        $this->db->where('emp_id', $emp_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    function addNominee($nominee_data) {
        $query = $this->db->insert('hr_employee_nominee', $nominee_data);
        return $query;
    }

    // Get Refrences from DB \\
    function getReference($emp_id) {
        $this->db->select('*');
        $this->db->from('hr_employee_reference');
        $this->db->where('emp_id', $emp_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    // Add Reference data in DB \\
    function addReference($reference_data) {
        $query = $this->db->insert('hr_employee_reference', $reference_data);
        return $query;
    }

    // Get Documents from DB \\ 
    function getDocument($emp_id) {
        $query = $this->db->query("select * from hr_employee_document where emp_id = '$emp_id'");

        return $query->result_array();
    }

    function addDocument($document_data) {
//      echo '<pre>';
//      print_r($document_daata);

        $query = $this->db->insert('hr_employee_document', $document_data);
        return $query;
    }

    // check Employee existance 
    function checkEmployee($employee_data) {
        $query = $this->db->get_where('hr_employee_record', $employee_data);
        return $query->row();
    }

    public function get_gen_emp($emp_id) {
        $query = $this->db->query("select * from emp_gen_details where emp_id = '$emp_id'");
        return $query->result_array();
    }

    public function get_emp_details($emp_id) {
        $query = $this->db->query("select * from hr_employee_record where emp_id = '$emp_id'");
        return $query->result_array();
    }

    function getEmployee($emp_id) {
         $this->db->select('shift.title as shifttitle,levels.title, grades.class,grade_level.*,hr_employee_record.*, hr_employee_contact.*, hr_employee_experience.*, hr_company.*, hr_departments.*, hr_designations.*, campus.*, cities.*, hr_employee_bank.*, hr_employee_facilities.*, hr_employee_dependent.*,emp_gen_details.*, religion.*');
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
      $this->db->join('grade_level', 'hr_employee_record.grade_level_id = grade_level.grade_level_id', 'LEFT');
      $this->db->join('shift', ' hr_employee_record.shift_id = shift.shiftId', 'LEFT');
     $this->db->join('grades', 'grades.grade_id = grade_level.grade_id', 'LEFT');
      $this->db->join('levels', 'levels.level_id = grade_level.level_id', 'LEFT');
     $this->db->where(array('hr_employee_record.emp_id' => $emp_id));
      $query = $this->db->get();
   //  echo $this->db->last_query(); die;
      return $query->result_array();
    }

    function updateEmployee($emp_id, $record_data, $ad_data, $sal_array, $bank_data, $fac_array, $contact_data, $dependent_array, $social_media_data, $emer_array, $med_array, $exp_array, $ref_array, $doc_array, $edu_array, $training_array, $skill_array, $lang_array, $mem_array, $license_array, $document_id, $emp_record_id, $emp_salary_id, $bank_id, $facility_id, $emp_contact_id, $dependent_id, $social_media_id, $nominee_id, $medical_id, $emp_education_id, $training_id, $skills_id, $language_id, $membership_id, $reference_id, $emp_experience_id) {
        ////employee general Inforamtion update

        $data = array(
            'emp_code' => $record_data[0],
            'employee_name' => $record_data[1],
            'soc_sec_num' => $record_data[2],
            'employee_status' => $record_data[3],
            'eobi_num' => $record_data[4],
            'health_ins_num' => $record_data[5],
            'grade' => $record_data[6]
        );


        $query = $this->db->update_string("emp_gen_details", $data, "emp_id='" . $emp_id . "'");
        $this->db->query($query);
        ////employee record table udpate       
        // echo $emp_record_id;

        $ad_array = array(
            'emp_id' => $emp_id,
            'designation_id' => $ad_data[0][1],
            'record_company_name' => $ad_data[0][2],
            'department_id' => $ad_data[0][3],
            'campus_id' => $ad_data[0][4],
            'employee_type' => $ad_data[0][5],
            'employee_addition_type' => $ad_data[0][6],
            'shift' => $ad_data[0][7],
            'joining_date' => $ad_data[0][8],
            'confirmation_date' => $ad_data[0][9],
            'record_starting_salary' => $ad_data[0][10],
            'current_salary' => $ad_data[0][11],
            'probation_period' => $ad_data[0][12],
            'probation_from' => $ad_data[0][13],
            'probation_to' => $ad_data[0][14]
        );


        $ad_query = $this->db->update_string("hr_employee_record", $ad_array, "emp_record_id='" . $emp_record_id . "'");
        //echo $ad_query;
        $this->db->query($ad_query);

        /////employee salary table update

        $sal = array(
            'salary_type' => $sal_array[0][0],
            'salary_amount' => $sal_array[0][1],
            'salary_date' => $sal_array[0][2],
            'emp_id' => $sal_array[0][3]
        );


        $sal_query = $this->db->update_string("hr_employee_salary", $sal, "emp_salary_id='" . $emp_salary_id . "'");
        $this->db->query($sal_query);

        ////bank table update

        $b_array = array(
            'bank_name' => $bank_data[0],
            'account_title' => $bank_data[1],
            'account_no' => $bank_data[2],
            'bank_address' => $bank_data[3],
            'emp_id' => $bank_data[4],
        );

        $bank_query = $this->db->update_string("hr_employee_bank", $b_array, "bank_id='" . $bank_id . "'");
        $this->db->query($bank_query);

        ///facility table update
        $f_array = array(
            'fac_id' => $fac_array[0][0],
            'facility_date_from' => $fac_array[0][1],
            'facility_description' => $fac_array[0][2],
            'emp_id' => $fac_array[0][3]
        );

        $fac_query = $this->db->update_string("hr_employee_facilities", $f_array, "facility_id='" . $facility_id . "'");
        $this->db->query($fac_query);


        ////contact table update
//    echo '<pre>';
//    print_r($contact_data);
        $con_array = array(
            'emp_name' => $contact_data[0],
            'father_name' => $contact_data[1],
            'mother_name' => $contact_data[2],
            'spouse_name' => $contact_data[3],
            'date_of_birth' => $contact_data[4],
            'cnic_no' => $contact_data[5],
            'gender' => $contact_data[6],
            'blood_group' => $contact_data[7],
            'marital_status' => $contact_data[8],
            'religion' => $contact_data[9],
            'nationality' => $contact_data[10],
            'emp_picture' => $contact_data[11],
            'mailing_address' => $contact_data[12],
            'mailing_contact_no' => $contact_data[13],
            'permanent_address' => $contact_data[14],
            'permanent_contact_no' => $contact_data[15],
            'correspondence_address' => $contact_data[16],
            'mobile_1' => $contact_data[17],
            'mobile_2' => $contact_data[18],
            'email_1' => $contact_data[19],
            'email_2' => $contact_data[20],
            'emp_id' => $emp_id,
        );
//      echo '<pre>';
//      print_r($con_array);
//      
        $con_query = $this->db->update_string("hr_employee_contact", $con_array, "emp_contact_id='" . $emp_contact_id . "'");
        //echo $con_query; 

        $this->db->query($con_query);

        ///dependent table update


        $dep_array = array(
            'dependent_name' => $dependent_array[0][0],
            'dependent_relation' => $dependent_array[0][1],
            'dependent_cnic' => $dependent_array[0][2],
            'age' => $dependent_array[0][3],
            'dependent_address' => $dependent_array[0][4],
            'emp_id' => $emp_id
        );

        $dep_query = $this->db->update_string("hr_employee_dependent", $dep_array, "dependent_id='" . $dependent_id . "'");
        $this->db->query($dep_query);


        ///social media update
        $soc_array = array(
            'linked_in' => $social_media_data[0],
            'skype' => $social_media_data[1],
            'facebook' => $social_media_data[2],
            'twitter' => $social_media_data[3],
            'emp_id' => $social_media_data[4],
        );
        $soc_query = $this->db->update_string("hr_employee_social_media", $soc_array, "social_media_id='" . $social_media_id . "'");
        $this->db->query($soc_query);

        ///Emergency contact update

        $em_array = array(
            'nominee_name' => $emer_array[0][0],
            'nominee_relation' => $emer_array[0][1],
            'nominee_email' => $emer_array[0][2],
            'nominee_phone' => $emer_array[0][3],
            'nominee_address' => $emer_array[0][4],
            'emp_id' => $emer_array[0][5],
        );

        $em_query = $this->db->update_string("hr_employee_nominee", $em_array, "nominee_id='" . $nominee_id . "'");
        $this->db->query($em_query);

        ///medical table update

        $md_array = array(
            'name_of_disease' => $med_array[0][0],
            'physical_limitation' => $med_array[0][1],
            'doctor_name' => $med_array[0][2],
            'doctor_contact_no' => $med_array[0][3],
            'doctor_contact_address' => $med_array[0][4],
            'medical_detail' => $med_array[0][5],
            'emp_id' => $med_array[0][6],
        );

        $md_query = $this->db->update_string("hr_employee_medical", $md_array, "medical_id='" . $medical_id . "'");
        $this->db->query($md_query);


        ////experience table update

        $ex_array = array(
            'company_name' => $exp_array[0][0],
            'company_location' => $exp_array[0][1],
            'nature_of_business' => $exp_array[0][2],
            'job_title' => $exp_array[0][3],
            'expereince_from_date' => $exp_array[0][4],
            'experience_to_date' => $exp_array[0][5],
            'reason_of_leaving' => $exp_array[0][6],
            'last_drawn_salary' => $exp_array[0][7],
            'company_address' => $exp_array[0][8],
            'company_contact_no' => $exp_array[0][9],
            'emp_id' => $exp_array[0][10]
        );



        $exp_query = $this->db->update_string("hr_employee_experience", $ex_array, "emp_experience_id='" . $emp_experience_id . "'");
        //echo $exp_query;
        $this->db->query($exp_query);

        ///reference table update

        $re_array = array(
            'reference_name' => $ref_array[0][0],
            'reference_company_business_name' => $ref_array[0][1],
            'reference_job_title' => $ref_array[0][2],
            'reference_type' => $ref_array[0][3],
            'reference_address' => $ref_array[0][4],
            'reference_contact_no' => $ref_array[0][5],
            'emp_id' => $ref_array[0][6]
        );


        $re_query = $this->db->update_string("hr_employee_reference", $re_array, "reference_id='" . $reference_id . "'");
        //$this->db->update_string("hr_employee_reference", $re_array, "reference_id='".$reference_id."'"); 
        //echo $re_query;
        $this->db->query($re_query);

        ///document table update

        $d_array = array(
            'document_type' => $doc_array[0][0],
            'document' => $doc_array[0][1],
            'issue_date' => $doc_array[0][2],
            'attachment' => $doc_array[0][3],
            'emp_id' => $doc_array[0][4]
        );


        $d_query = $this->db->update_string("hr_employee_document", $d_array, "document_id='" . $document_id . "'");
        //echo $d_query;
        $this->db->query($d_query);


        ////Education Table Update

        $ed_array = array(
            'degree_title' => $edu_array[0][0],
            'major_subjects' => $edu_array[0][1],
            'degree_grade' => $edu_array[0][2],
            'degree_institute_name' => $edu_array[0][3],
            'country' => $edu_array[0][4],
            'degree_passing_year' => $edu_array[0][5],
            'duration' => $edu_array[0][6],
            'emp_id' => $edu_array[0][7]
        );



        $ed_query = $this->db->update_string("hr_employee_education", $ed_array, "emp_education_id='" . $emp_education_id . "'");
        // echo $ed_query;
        $this->db->query($ed_query);

        ///training table update

        $t_array = array(
            'training_title' => $training_array[0][0],
            'training_institute' => $training_array[0][1],
            'training_completion_year' => $training_array[0][2],
            'training_duration' => $training_array[0][3],
            'training_institute_address' => $training_array[0][4],
            'emp_id' => $training_array[0][5],
        );

        $t_query = $this->db->update_string("hr_employee_training_certificates", $t_array, "training_id='" . $training_id . "'");
        //echo $t_query;
        $this->db->query($t_query);

        ///skill table update

        $sk_array = array(
            'skill_name' => $skill_array[0][0],
            'years_of_experience' => $skill_array[0][1],
            'skill_level' => $skill_array[0][2],
            'emp_id' => $skill_array[0][3],
        );

        $sk_query = $this->db->update_string("hr_employee_skills", $sk_array, "skills_id='" . $skills_id . "'");
        // echo $sk_query;
        $this->db->query($sk_query);

        ///language table update

        $lan_array = array(
            'language' => $lang_array[0][0],
            'language_category' => $lang_array[0][1],
            'language_level' => $lang_array[0][2],
            'emp_id' => $lang_array[0][3],
        );
        $lan_query = $this->db->update_string("hr_employee_language", $lan_array, "language_id='" . $language_id . "'");
        $this->db->query($lan_query);


        ///membership table update

        $me_array = array(
            'membership_title' => $mem_array[0][0],
            'membership_duration' => $mem_array[0][1],
            'membership_institue_name' => $mem_array[0][2],
            'membership_country' => $mem_array[0][3],
            'membership_since' => $mem_array[0][4],
            'membership_last_renewed' => $mem_array[0][5],
            'membership_reg_no' => $mem_array[0][6],
            'membership_subscription' => $mem_array[0][7],
            'membership_subscription_paidby' => $mem_array[0][8],
            'emp_id' => $mem_array[0][9]
        );

        $me_query = $this->db->update_string("hr_employee_memberships", $me_array, "membership_id='" . $membership_id . "'");
        $this->db->query($me_query);

        ///license table update

        $li_array = array(
            'license_title' => $license_array[0][0],
            'license_institute' => $license_array[0][1],
            'license_no' => $license_array[0][2],
            'issue_date' => $license_array[0][3],
            'expiry_date' => $license_array[0][4],
            'emp_id' => $license_array[0][5],
        );

        $li_query = $this->db->update_string("hr_employee_license", $li_array, "license_id='" . $license_id . "'");
        $this->db->query($li_query);

        return 1;
    }

    // Add Employee educaton data \\
    function addEmployeeEducation($education_data) {
        $query = $this->db->insert('hr_employee_education', $education_data);
        return $query;
    }

    function getEducation($emp_id) {
        $this->db->select('*');
        $this->db->from('hr_employee_education');
        $this->db->where('emp_id', $emp_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    // get Employee by Department
    function searchEmployee($dept_data) {
        $this->db->select('hr_employee_record.*, hr_departments.*, hr_designations.*, campus.*, emp_gen_details.*');
        $this->db->from('hr_employee_record');
        $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
        $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
        $this->db->join('campus', 'hr_employee_record.campus_id = campus.campus_id', 'LEFT');
        $this->db->join('emp_gen_details', 'hr_employee_record.emp_id = emp_gen_details.emp_id', 'LEFT');
        $this->db->order_by('created_date', 'DESC');
        $this->db->where($dept_data);
        $query = $this->db->get();

        return $query->result_array();
    }

    function searchEmpsal($dept_data) {
        $this->db->select('hr_employee_record.*, hr_departments.*, hr_designations.*, campus.*, emp_gen_details.*, hr_employee_contact.*');
        $this->db->from('hr_employee_record');
        $this->db->join('hr_departments', 'hr_employee_record.department_id = hr_departments.department_id', 'LEFT');
        $this->db->join('hr_designations', 'hr_employee_record.designation_id = hr_designations.designation_id', 'LEFT');
        $this->db->join('hr_employee_contact', 'hr_employee_record.emp_id = hr_employee_contact.emp_id', 'LEFT');
        $this->db->join('campus', 'hr_employee_record.campus_id = campus.campus_id', 'LEFT');
        $this->db->join('emp_gen_details', 'hr_employee_record.emp_id = emp_gen_details.emp_id', 'LEFT');
        $this->db->where($dept_data);

        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result_array();
    }

    public function get_departs($company_id) {
        $query = $this->db->query("select * from hr_departments where company_id = '$company_id'");
        return $query->result_array();
    }

    // get Employee by Campus
    function searchEmployeeByCampus($campus_data) {
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

    function getPayrollEmployee($emp_id) {
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
    function DepartmentDesignations($department_id) {
        $query = $this->db->get_where('hr_designations', array('department_id' => $department_id));
        return $query->result_array();
    }

    // get General Account Roles from db    
    function getRoles() {
        $this->db->order_by('role_title', 'ASC');
        $query = $this->db->get('gen_account_roles');

        return $query->result_array();
    }

    function getCampany() {
        $this->db->order_by('company_name', 'ASC');
        $query = $this->db->get('hr_company');

        return $query->result_array();
    }

    // get Employee to generate Payroll
    // check Department existance 
    function checkDepartment($department) {
        $query = $this->db->get_where('hr_departments', $department);
        return $query->result_array();
    }

    // add Department in db    
    function addDepartment($department_data) {
        $query = $this->db->insert('hr_departments', $department_data);
        return $query;
    }

    // get all Departments from db    
    function getAllDepartments() {
        $this->db->select('hr_departments.*, gen_account_roles.*, hr_company.company_name');
        $this->db->from('hr_departments');
        $this->db->join('gen_account_roles', 'hr_departments.account_role_id = gen_account_roles.account_role_id', 'INNER');
        $this->db->join('hr_company', 'hr_departments.company_id = hr_company.company_id', 'INNER');
        $this->db->order_by('hr_departments.department_name', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    // get a Department for update    
    function getDepartment($dept_id) {
        $query = $this->db->get_where('hr_departments', array('department_id' => $dept_id));
        return $query->result_array();
    }

    // update the Department name    
    function updateDepartment($dept_id, $department_data) {
        $this->db->where('department_id', $dept_id);
        $query = $this->db->update('hr_departments', $department_data);

        return $query;
    }

    //--------------End of Department----------\\
    // check Designation existance 
    function checkDesignation($designation) {
        $query = $this->db->get_where('hr_designations', $designation);
        return $query->result_array();
    }

    // add Designation in db    
    function addDesigantion($designation_data) {
        $query = $this->db->insert('hr_designations', $designation_data);
        return $query;
    }

    // get all Designations from db    
    function getAllDesignations() {

        $this->db->select('hr_designations.*, hr_departments.*,hr_company.* ');
        $this->db->from('hr_designations');
        $this->db->join('hr_departments', 'hr_designations.department_id = hr_departments.department_id', 'INNER');
        $this->db->join('hr_company', 'hr_company.company_id = hr_departments.company_id', 'INNER');
        $this->db->order_by('hr_designations.designation_title', 'ASC');
        $query = $this->db->get();


        return $query->result_array();
    }

    // get a Designation for update    
    function getDesignation($desig_id) {
        $query = $this->db->get_where('hr_designations', array('designation_id' => $desig_id));
        return $query->result_array();
    }

    // update the Designation Title    
    function updateDesignation($desig_id, $designation_data) {
        $this->db->where('designation_id', $desig_id);
        $query = $this->db->update('hr_designations', $designation_data);

        return $query;
    }

    //--------------End of Designation----------\\


    function addSalaryStatus($salary_data) {
        $query = $this->db->insert('hr_employee_salary', $salary_data);
        return $query;
    }

    //get all Salary status of Employee
    function getSalaryHistory($emp_data) {
        $query = $this->db->get_where('hr_employee_salary', $emp_data);
        return $query->result_array();
    }

    // get Salary for edit
    function getSalaryStatus($salary_id) {
        $this->db->select('hr_employee_salary.*, hr_employee_record.current_salary');
        $this->db->from('hr_employee_salary');
        $this->db->join('hr_employee_record', 'hr_employee_salary.emp_id = hr_employee_record.emp_id', 'inner');
        $query = $this->db->where(array('emp_salary_id' => $salary_id));
        $query = $this->db->get();

        return $query->result_array();
    }

    // update Salary status
    function updateSalaryStatus($salary_id, $salary_data) {
        $this->db->where('emp_salary_id', $salary_id);
        $query = $this->db->update('hr_employee_salary', $salary_data);
        return $query;
    }

    //Employee Net Salary after Deductions    
    function maxSalaryStatus($emp_id) {
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

    public function get_emp_bankDetails($emp_id) {
        $this->db->select('*');
        $this->db->where('bank_name !=', '');
        $this->db->where('emp_id', $emp_id);
        $this->db->limit('1', '');
        $query = $this->db->get('hr_employee_bank');

        return $query->result_array();
    }

    public function get_emp_personal_details($emp_id) {
        $query = $this->db->query("select emp_contact_id, father_name, mother_name, spouse_name, date_of_birth, cnic_no, gender, blood_group, marital_status, religion, nationality, emp_picture
                                    from hr_employee_contact where emp_id = '$emp_id'
                                 ");

        return $query->result_array();
    }

    // check Company existance 
    function checkCompany($company) {
        $query = $this->db->get_where('hr_company', $company);
        return $query->result_array();
    }

    // add Company in db    
    function addCompany($company_data) {
        $query = $this->db->insert('hr_company', $company_data);
        return $query;
    }

    // get all Company from db    
    function getAllCompany() {
        $this->db->select('hr_company.*');
        $this->db->from('hr_company');
        $this->db->order_by('hr_company.company_name', 'ASC');
        $query = $this->db->get();

        return $query->result_array();
    }

    // get a Company for update    
    function getCompany($dept_id) {
        $query = $this->db->get_where('hr_company', array('company_id' => $dept_id));
        return $query->result_array();
    }

    // update the Company name    
    function updateCompany($comp_id, $company_data) {
        $this->db->where('company_id', $comp_id);
        $query = $this->db->update('hr_company', $company_data);
        return $query;
    }

    //--------------End of Company----------\\
    //   ***** Start function for Visitor Module *****   //
    // check duplication of Visitor name

    function checkVisitor($cnic, $visitor_name) {
        $this->db->select('emp_id');
        $query1 = $this->db->get_where('hr_employee_contact', array('cnic_no' => $cnic));
        $id = $query1->row();
        $emp_id = $id->emp_id;

        if ($query1->num_rows() != 0) {
            //udpate visitor status in employee record table 
            $this->db->where('emp_id', $emp_id);
            $this->db->update('hr_employee_record', array('visitor' => '1'));

            return $a = 1;
        } else {
            // add visitor in employee record table with remaining fields blank
            $this->db->insert('hr_employee_record', array('employee_name' => $visitor_name, 'visitor' => '1'));
            $emp_id = $this->db->insert_id();
            $this->db->insert('hr_employee_contact', array('emp_name' => $visitor_name, 'cnic_no' => $cnic, 'emp_id' => $emp_id));
        }
    }

    // get a visitor for update    
    function getVisitor($id) {
        $query = $this->db->get_where('hr_visitors', array('visitor_id' => $id));
        return $query->row();
    }

    // update the visitor    
    function updateVisitor($id, $data) {
        $this->db->where('visitor_id', $id);
        $this->db->update('hr_visitors', $data);

        return $this->db->affected_rows();
    }

    // get all visitors from db    
    function getAllvisitors() {
        $this->db->select('hr_visitors.*');
        $this->db->order_by('visitor_name', 'ASC');
        $query = $this->db->get('hr_visitors');

        return $query->result_array();
    }

    //------------- End Visitor Queries -------------\\
    //campuses

    public function save_campus_details() {
        $data = array(
            'campus_name' => $this->input->post('campus_name'),
            'campus_code' => $this->input->post('campus_code'),
            'city_id' => $this->input->post('city_id')
        );

        $query = $this->db->insert_string('campus', $data);

        return $this->db->query($query);
    }

    public function get_all_campuses() {
        $query = $this->db->query("select campus.*, cities.*
            from campus
            inner join cities on cities.city_id = campus.city_id
        ");

        return $query->result_array();
    }

    public function get_campus_data($campus_id) {
        $query = $this->db->query("select * from campus where campus_id = '$campus_id'");

        return $query->result_array();
    }

    public function update_campus_data($campus_id) {
        $data = array(
            'campus_name' => $this->input->post('campus_name'),
            'campus_code' => $this->input->post('campus_code'),
            'city_id' => $this->input->post('city_id')
        );

        $query = $this->db->update_string('campus', $data, " campus_id = '" . $campus_id . "' ");

        $this->db->query($query);
        return 1;
    }

    ///end campuses//
    ///Grades

    public function save_grade_data() {
        $data = array(
            'grade' => $this->input->post('grade')
        );

        $query = $this->db->insert_string('grades', $data);

        return $this->db->query($query);
    }

    public function get_all_grades() {
        $query = $this->db->query("select * from grades");

        return $query->result_array();
    }

    public function get_grade_by_id($grade_id) {
        $query = $this->db->query("select * from grades where grade_id = '$grade_id'");

        return $query->result_array();
    }

    public function update_grade_data($grade_id) {
        $data = array();

        $query = $this->db->update_string('grades', $data, "grade_id = '" . $grade_id . "' ");

        $this->db->query($query);

        return 1;
    }

    ////End Grades////
    ///banks///

    public function save_bank_details() {
        $data = array(
            'bank_name' => $this->input->post('bank_name')
        );

        $query = $this->db->insert_string('banks', $data);

        $this->db->query($query);
    }

    public function get_all_banks() {
        $query = $this->db->query(" select * from banks");

        return $query->result_array();
    }

    public function get_all_bank_details() {
        $query = $this->db->query("select * from banks");

        return $query->result_array();
    }

    public function get_bank_by_id($bank_id) {
        $query = $this->db->query("select*
                                   from banks
                                   where bank_id = '$bank_id'");

        return $query->result_array();
    }

    public function update_bank_details($bank_id) {
        $data = array(
            'bank_name' => $this->input->post('bank_name'),
        );

        $query = $this->db->update_string('banks', $data, "bank_id= '" . $bank_id . "' ");

        $this->db->query($query);

        return 1;
    }

    ///end///
    ///Facilty

    public function save_facility_data() {
        $data = array(
            'facility' => $this->input->post('facility_name')
        );
        $query = $this->db->insert_string('facilities', $data);
        $this->db->query($query);
    }

    public function get_all_facilities() {
        $query = $this->db->query("select * from facilities");

        return $query->result_array();
    }

    public function get_facility_by_id($facility_id) {
        $query = $this->db->query("select * from facilities where facility_id = '$facility_id'");

        return $query->result_array();
    }

    public function update_facility_data($facility_id) {
        $data = array(
            'facility' => $this->input->post('facility_name')
        );
        $query = $this->db->update_string('facilities', $data, "facility_id = '" . $facility_id . "'");
        $this->db->query($query);
        return 1;
    }

    ///End Facilities///
    /////Religions///

    public function save_religion_data() {
        $data = array(
            'religion' => $this->input->post('religion')
        );

        $query = $this->db->insert_string('religion', $data);
        $this->db->query($query);
    }

    public function get_all_religions() {
        $query = $this->db->query("select * from religion");

        return $query->result_array();
    }

    public function get_religion_by_id($religion_id) {
        $query = $this->db->query("select * from religion where religion_id = '$religion_id'");

        return $query->result_array();
    }

    public function udpate_religion_data($religion_id) {
        $data = array(
            'religion' => $this->input->post('religion')
        );

        $query = $this->db->update_string('religion', $data, "religion_id = '" . $religion_id . "'");

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

    public function get_all_relations() {
        $query = $this->db->query("select * from relation");

        return $query->result_array();
    }

    public function get_relation_by_id($relation_id) {
        $query = $this->db->query("select * from relation where relation_id = '$relation_id'");

        return $query->result_array();
    }

    public function update_relation_data($relation_id) {
        $data = array(
            'relationship' => $this->input->post('relation')
        );

        $query = $this->db->update_string('relation', $data, "relation_id = '" . $relation_id . "'");
        $this->db->query($query);
        return 1;
    }

    ///End Relations///
    ////Documents////
    public function save_document_data() {
        $data = array(
            'doc_name' => $this->input->post('doc_name')
        );

        $query = $this->db->insert_string('documents', $data);

        $this->db->query($query);
    }

    public function get_all_documents() {
        $query = $this->db->query("select * from documents");

        return $query->result_array();
    }

    public function get_documents_by_id($doc_id) {
        $query = $this->db->query("select * from documents where doc_id = '$doc_id'");

        return $query->result_array();
    }

    public function update_document_data($doc_id) {
        $data = array(
            'doc_name' => $this->input->post('doc_name')
        );

        $query = $this->db->update_string('documents', $data, "doc_id = '" . $doc_id . "'");

        $this->db->query($query);

        return 1;
    }

    /////End Documents///
    ///Countries///
    public function save_country_data() {
        $data = array(
            'country' => $this->input->post('country')
        );

        $query = $this->db->insert_string('country', $data);

        $this->db->query($query);
    }

    public function get_all_countries() {
        $query = $this->db->query("select * from country");

        return $query->result_array();
    }

    public function get_country_by_id($country_id) {
        $query = $this->db->query("select * from country where country_id = '$country_id'");

        return $query->result_array();
    }

    public function update_country_data($country_id) {
        $data = array(
            'country' => $this->input->post('country')
        );

        $query = $this->db->update_string('country', $data, "country_id = '" . $country_id . "'");

        $this->db->query($query);

        return 1;
    }

    ////End Countries///
    ///social details

    public function get_emp_socialDetails($emp_id) {
        $query = $this->db->query("select * from hr_employee_social_media where emp_id = '$emp_id'");

        return $query->result_array();
    }

    /////end social details////
    ////contact details

    public function get_emp_contactDetails($emp_id) {
        $query = $this->db->query("select * from hr_employee_contact where emp_id = '$emp_id'");
        //echo $query;

        return $query->result_array();
    }

    ////end contact
    ////medical details

    public function getmedicalDetails($emp_id) {
        $query = $this->db->query("select * from hr_employee_medical where emp_id = '$emp_id'");

        return $query->result_array();
    }

    ///end medical details
    /////certification

    public function getCertification($emp_id) {
        $query = $this->db->query("select * from hr_employee_training_certificates where emp_id = '$emp_id'");

        return $query->result_array();
    }

    ///end certification
    /////skills

    public function getSkillsdetails($emp_id) {
        $query = $this->db->query("select * from hr_employee_skills where emp_id = '$emp_id'");

        return $query->result_array();
    }

    ///end skills
    ////langugae
    public function getlangdetails($emp_id) {
        $query = $this->db->query("select * from hr_employee_language where emp_id = '$emp_id'");

        return $query->result_array();
    }

    ///end language
    ////membership

    public function getmembership($emp_id) {
        $query = $this->db->query("select * from hr_employee_memberships where emp_id = '$emp_id'");

        return $query->result_array();
    }

    /////end memebership
    /////License
    public function getlicenseDetails($emp_id) {
        $query = $this->db->query("select * from hr_employee_license where emp_id = '$emp_id'");

        return $query->result_array();
    }

    /////end license
    /////Experience

    public function getexpDetails($emp_id) {
        $query = $this->db->query("select * from hr_employee_experience where emp_id = '$emp_id'");

        return $query->result_array();
    }

    /////End Experience
    /////salary

    public function getEmployeesalary($emp_id) {
        $query = $this->db->query("select hr_employee_salary.*, salary_type.*
                from hr_employee_salary 
                inner join salary_type on salary_type.sal_type_id = hr_employee_salary.salary_type
                where emp_id = '$emp_id'");

        return $query->result_array();
    }

    ////end salary
    ////bank detail of employee

    public function getbankDetails() {
        $query = $this->db->query("select * from banks");

        return $query->result_array();
    }

    ///end of bank details employee
    /////Employee Facility

    public function get_emp_facilities($emp_id) {
        $query = $this->db->query("select hr_employee_facilities.*, facilities.*
                from hr_employee_facilities
                inner join facilities on facilities.facility_id = hr_employee_facilities.fac_id
                where emp_id = '$emp_id'");
        // echo $this->db->last_query();
        return $query->result_array();
    }

    /////End Employee Facility
    //salary type
    public function save_sal_details() {
        $data = array(
            'sal_type_name' => $this->input->post('salary_type')
        );

        $query = $this->db->insert_string('salary_type', $data);

        $this->db->query($query);
    }

    public function get_sal_details() {
        $query = $this->db->query("select * from salary_type");

        return $query->result_array();
    }

    public function get_sal_by_id($sal_id) {
        $query = $this->db->query("select * from salary_type where sal_type_id = '$sal_id'");

        return $query->result_array();
    }

    public function update_sal_data($salary_id) {
        $data = array(
            'sal_type_name' => $this->input->post('salary_type')
        );

        $query = $this->db->update_string('salary_type', $data, "sal_type_id = '" . $salary_id . "'");

        $this->db->query($query);

        return 1;
    }

    ///end salary type

    public function addAdditionalRecord($add_data) {
        $query = $this->db->insert('hr_employee_record', $add_data);
        return $this->db->insert_id();
    }

    ////social details

    public function get_all_socials($emp_id) {
        $query = $this->db->query("select * from hr_employee_social_media where emp_id = '$emp_id'");

        return $query->result_array();
    }

    ////contact details
    //////cv details

    public function get_cv_details($emp_id) {
        $query = $this->db->query("select * from hr_employee_contact where emp_id = '$emp_id'");

        return $query->result_array();
    }

    public function get_salary_detail($emp_id) {
        $query = $this->db->query("select * from hr_employee_record 
                                    inner join hr_employee_contact on hr_employee_contact.emp_id = hr_employee_record.emp_id
                                    inner join hr_employee_bank on hr_employee_bank.emp_id = hr_employee_record.emp_id
                                    INNER JOIN hr_designations ON hr_designations.designation_id = hr_employee_record.designation_id
                                    INNER JOIN hr_departments ON hr_departments.department_id = hr_employee_record.department_id
                                    INNER JOIN emp_gen_details ON emp_gen_details.emp_id = hr_employee_record.emp_id
                                    where hr_employee_record.emp_id  = '$emp_id'");
        return $query->result_array();
    }

    public function update_emp_pic($emp_id, $imagePath) {
        $data = array(
            'emp_picture' => $imagePath
        );

        $query = $this->db->update_string("hr_employee_contact", $data, "emp_id='" . $emp_id . "'");
        //echo $query;
        $this->db->query($query);
    }

    function check_emp_login($emp_id) {
        $query = $this->db->get_where('employee_logins', $emp_id);
        return $query->result_array();
    }

    public function add_gen_passwords($emp_data) {
        $this->db->insert('employee_logins', $emp_data);
        return $this->db->insert_id();
    }

//   Benefits   ................. 
    function addBenefit($data) {
        $this->db->insert('benifits', $data);
        //echo $this->db->last_query(); die;
        return $this->db->insert_id();
    }

    function allBenefit($id) {
        if ($id == '' || empty($id)) {
            $query = $this->db->query("select benifits.*,hris_logins.hris_username from benifits inner join hris_logins on hris_logins.hris_login_id =benifits.created_by");
        } else {
            $query = $this->db->query("select * from benifits where benefit_id = " . $id);
        }
        return $query->result_array();
    }

    function delete_benefit($id) {
        $this->db->where('benefit_grade_id', $id);
        $query = $this->db->delete('benefit_grades');

        return $query;
    }

    function editBenefit($id, $data) {
        $this->db->where('benefit_id', $id);
        $query = $this->db->update('benifits', $data);
        //    echo $this->db->last_query(); die;
        return $query;
    }

//  End Benefits   ................. 
// Grades......................... 
    function addGrade($data) {
        $this->db->insert('grades', $data);
        //echo $this->db->last_query(); die;
        return $this->db->insert_id();
    }

    function allGrade($id) {
        if ($id == '' || empty($id)) {
            $query = $this->db->query("select grades.*,hris_logins.hris_username from grades inner join hris_logins on hris_logins.hris_login_id =grades.created_by");
        } else {
            $query = $this->db->query("select * from grades where grade_id = " . $id);
        }

        return $query->result_array();
    }

    function delete_grade($id) {
        $this->db->where('grade_id', $id);
        $query = $this->db->delete('grades');

        return $query;
    }

    function editGrade($id, $data) {
        $this->db->where('grade_id', $id);
        $query = $this->db->update('grades', $data);
        //    echo $this->db->last_query(); die;
        return $query;
    }

    // End Grade ......................  
    // Levels ......................... 
    function addLevel($data) {
        $this->db->insert('levels', $data);
        //echo $this->db->last_query(); die;
        return $this->db->insert_id();
    }

    function allLevel($id) {
        if ($id == '' || empty($id)) {
            $query = $this->db->query("select levels.*,hris_logins.hris_username from levels inner join hris_logins on hris_logins.hris_login_id =levels.created_by");
        } else {
            $query = $this->db->query("select * from levels where level_id = " . $id);
        }

        return $query->result_array();
    }

    function delete_level($id) {
        $this->db->where('level_id', $id);
        $query = $this->db->delete('levels');

        return $query;
    }

    function editLevel($id, $data) {
        $this->db->where('level_id', $id);
        $query = $this->db->update('levels', $data);
        //    echo $this->db->last_query(); die;
        return $query;
    }

    // End Levels ......................  


    function getGradesCampousWise($campus_id) {
        $query = $this->db->query("select * from grades where company_id = " . $campus_id);
        return $query->result_array();
    }

    function getLevelCampusWise($campus_id) {
        $query = $this->db->query("select * from levels where company_id = " . $campus_id);
        return $query->result_array();
    }

    function addGradeLevel($data) {
        //
        $this->db->insert('grade_level', $data);
        //echo $this->db->last_query(); die;
        return $this->db->insert_id();
    }

    function allGradeBenefit($company) {
        $query = $this->db->query("select benefit_grades.*,grades.class,levels.title from benefit_grades "
                . " Inner join benifits on benifits.benefit_id = benefit_grades.benefit_id"
                . " Inner join grades on grades.grade_id = benefit_grades.grade_id"
                . " Inner join levels on levels.level_id = benefit_grades.level_id"
                . " where benefit_grades.company_id = " . $company);
        return $query->result_array();
    }

    function addGradeLevelSalary($sal_data) {
        $this->db->insert('salary', $sal_data);

        // echo $this->db->last_query(); die;
        return $this->db->insert_id();
    }

    function addGradeLevelBenefit($ben_data) {
        $this->db->insert('benefit_grades', $ben_data);
        return $this->db->insert_id();
    }

    function checkGradeLevel($grade_id, $lev, $company_id, $department_id) {
        $query = $this->db->query('select * from grade_level where grade_id = ' . $grade_id . ' and level_id = ' . $lev . ' and company_id=' . $company_id . ' and department_id = ' . $department_id);
        return $query->result_array();
    }

    function viewSalary($company, $department) {
        $query = $this->db->query('select levels.title,grades.class,salary.*,hris_logins.hris_username from salary '
                . ' Inner join grade_level on grade_level.grade_level_id = salary.grade_level_id'
                . ' Inner join grades on grades.grade_id = grade_level.grade_id'
                . ' Inner join levels on levels.level_id = grade_level.level_id'
                . ' inner join hris_logins on hris_logins.hris_login_id =salary.created_by'
                . ' where grade_level.company_id = ' . $company
                . '  and grade_level.department_id = ' . $department);



        return $query->result_array();
    }

    function delete_salary($id) {
        $this->db->where('salary_id', $id);
        $query = $this->db->delete('salary');

        return $query;
    }

    function Add_employee_info($data) {
        $this->db->insert('employee_info', $data);
        return $this->db->insert_id();
    }

    function update_employee_form($id, $data) {
        $this->db->where('emp_id', $id);
        $query = $this->db->update('employee_info', $data);

        return $query;
    }

    function get_department_by_id($dep_id) {
        $query = $this->db->query('select department_name from hr_departments where department_id = ' . $dep_id);
        $department = $query->result_array();
        return $department[0]['department_name'];
    }

    function get_designation_by_id($dep_id) {
        $query = $this->db->query('select designation_title from hr_designations where designation_id = ' . $dep_id);
        $designation = $query->result_array();
        return $designation[0]['designation_title'];
    }

    function getDesignationDepartmentWIse($department_id) {
        $query = $this->db->get_where('hr_designations', array('department_id' => $department_id));
        return $query->result_array();
    }

       function getSummeryReport($company, $department, $employee, $start_date, $end_date) {

        $dep_sql = '';
        $emp_sql = '';
        if ($department != '' || $department != Null) {
            $dep_sql = ' and hr_attendance.department_id = ' . $department;
        }
        if ($employee != '' || $employee != Null) {
            $emp_sql = ' and hr_attendance.emp_id = ' . $employee;
        }

        
     
        
        $query = $this->db->query("SELECT 
            
(SELECT SUM(hr_attendance.work_hour) AS wh FROM hr_attendance WHERE hr_attendance.remarks != 'Absent' AND hr_attendance.remarks != 'leave' AND hr_attendance.campus_id = $company $dep_sql $emp_sql and DATE_FORMAT(hr_attendance.datetime, '%Y-%m-%d') BETWEEN '$start_date' AND '$end_date') AS WH, 
(SELECT COUNT(*) FROM hr_attendance WHERE hr_attendance.remarks != 'Absent' AND hr_attendance.remarks != 'leave' AND hr_attendance.campus_id = $company $dep_sql $emp_sql and DATE_FORMAT(hr_attendance.datetime, '%Y-%m-%d') BETWEEN '$start_date' AND '$end_date') AS WD,
hr_employee_record.record_company_name,hr_attendance.department_id,emp_gen_details.emp_id,emp_gen_details.emp_code,emp_gen_details.employee_name,shift.working_hours,shift.off_days,
            SUM(IF(hr_attendance.remarks= 'Absent', 1, 0)) AS totalAbsent,SUM(IF(hr_attendance.remarks= 'on time', 1, 0)) AS totalOnTime,SUM(IF(hr_attendance.remarks= 'tardiness', 1, 0)) AS totalTardiness,SUM(IF(hr_attendance.remarks= 'full absence', 1, 0)) AS totalFullAbsence,
SUM(IF(hr_attendance.remarks= 'partial absence', 1, 0)) AS totalPartialAbsence,
SUM(IF(hr_attendance.remarks= 'Over-time', 1, 0)) AS totalOverTime,
count(hr_attendance.emp_id) as actual_days
from hr_attendance
Inner join emp_gen_details on emp_gen_details.emp_id = hr_attendance.emp_id
left join hr_employee_record on hr_employee_record.emp_id = emp_gen_details.emp_id 
Inner join shift on shift.shiftId  = hr_attendance.shift_id
where hr_employee_record.record_company_name = $company and DATE_FORMAT(hr_attendance.datetime, '%Y-%m-%d') BETWEEN '$start_date' AND '$end_date'
     $dep_sql
     $emp_sql
group by emp_gen_details.emp_id");


        return $query->result_array();
    }

    function getDetailReport($department, $employee, $start_date, $end_date) {

        $dep_sql = '';
        $emp_sql = '';

        if ($employee != '' || $employee != Null) {
            $emp_sql = ' and hr_attendance.emp_id = ' . $employee;
        }

        $query = $this->db->query("SELECT emp_gen_details.employee_name,emp_gen_details.emp_code,checkIn,checkOut,work_hour,remarks,datetime
                        from hr_attendance
                        Inner join emp_gen_details on emp_gen_details.emp_id = hr_attendance.emp_id
                        where hr_attendance.department_id = $department and DATE_FORMAT(hr_attendance.datetime, '%Y-%m-%d') BETWEEN '$start_date' AND '$end_date' 
                         $emp_sql

order by datetime");

      
        

        return $query->result_array();
    }

    function getCompanyDeapermentName($comp, $department) {


        if ($department != '') {
            $query = $this->db->query(" select hr_departments.department_name,hr_company.company_name"
                    . " from hr_departments"
                    . "   Inner join hr_company on hr_departments.company_id =hr_company.company_id "
                    . "   where  hr_company.company_id = $comp and hr_departments.department_id = $department");
        } else {
            $query = $this->db->query(" select hr_company.company_name"
                    . " from hr_company"
                    . "   where  hr_company.company_id = $comp");
        }

        return $query->result_array();
    }

    function companyOverAllReport($comp) {

        $query = $this->db->query("  SELECT count(*) as totalEmp,hr_departments.department_name FROM hr_employee_record
inner join hr_departments on hr_departments.department_id = hr_employee_record.department_id
where record_company_name = $comp
group by hr_employee_record.department_id");
        return $query->result_array();
    }

    function totalDepartmentCompanyWise($comp) {
        $query = $this->db->query("SELECT count(distinct department_id) as totalDep FROM hr_employee_record
                                    where record_company_name = $comp");

        return $query->result_array();
    }
    
    
    function companyGradeReport($comp) {
        $query = $this->db->query("SELECT grades.* ,emp_gen_details.employee_name from grades
            Inner join emp_gen_details on emp_gen_details.emp_id = grades.created_by
                                    where company_id = $comp");

        return $query->result_array();
    }
    
    function companyLevelReport($comp) {
        $query = $this->db->query("SELECT levels.* ,emp_gen_details.employee_name from levels
            Inner join emp_gen_details on emp_gen_details.emp_id = levels.created_by
                                    where company_id = $comp");

        return $query->result_array();
    }
       function getAllshift()
     {
        $query = $this->db->get_where('shift');
	return $query->result_array();
     }
   function checkleave($leave_data)
     {
        $query = $this->db->get_where('leave_type', $leave_data);
        return $query->result_array();
     }
     function addleavetype($leave_data)
     {
       $query = $this->db->insert('leave_type', $leave_data); 
        return $query;   
     }
     function getAllLeaveType()
     {
         $this->db->select('leave_type.*');
        $this->db->from('leave_type');
        $this->db->order_by('leave_type.leavetype', 'ASC'); 
        $query = $this->db->get();
		
        return $query->result_array();
     }
     function getleavetype($lev_id)
     {
        $query = $this->db->get_where('leave_type', array('leaveid' => $lev_id));
		
        return $query->result_array(); 
     }
     function updateleavetype($lev_id, $leave_data)
    {
$this->db->where('leaveid', $lev_id);
return $this->db->update('leave_type', $leave_data);
    }
    function addleavepolicy($leave_data)
    {
      $query = $this->db->insert('leave_policy', $leave_data); 
        return $query;   
    }
    function getleavepolicy()
{
      $query = $this->db->query('select leave_policy.leave_p_id,leave_policy.leavecount,hr_company.company_name,leave_type.leavetype
 from leave_policy 
INNER JOIN hr_company ON hr_company.company_id = leave_policy.compancy_id
INNER JOIN leave_type ON leave_type.leaveid = leave_policy.leaveid');
       
       return $query->result_array(); 
}
function getleavepolicybyid($lev_policy)
{
     $query = $this->db->query('select leave_policy.*
 from leave_policy 
where leave_policy.leave_p_id='.$lev_policy);
       
       return $query->result_array();
}
function updateleavepolicy($id,$leave_data)
                {
    $this->db->where('leave_p_id', $id);
return $this->db->update('leave_policy', $leave_data);
                }

                
                
                  function getLeavesTypes($comp) {
        $query = $this->db->query("SELECT leave_type.*  from leave_type
            Inner join leave_policy on leave_policy.leaveid = leave_type.leaveid
                                    where compancy_id = $comp");

        return $query->result_array();
    }

     function setAbsentEmployee($data) {
        $this->db->insert('emp_leaves', $data);
        return $this->db->insert_id();
    }

  function getEmployeeShift($emp_id) {
     
        $query = $this->db->query("SELECT shift.off_days  from shift
            Inner join hr_employee_record on  hr_employee_record.shift_id = shift.shiftId
                                    where emp_id = $emp_id");

        return $query->result_array();
    }
       function getTotalLeaves($emp_id,$start_date,$end_date){
        
       
         $query = $this->db->query("SELECT count(*) as TotalLeaves from hr_attendance
              Inner join emp_leaves on  hr_attendance.emp_leave_id = emp_leaves.emp_leave_id
             where emp_leaves.emp_id = $emp_id and DATE_FORMAT(hr_attendance.datetime, '%Y-%m-%d') BETWEEN '".$start_date."' AND '".$end_date."'");

        return $query->result_array();
    }
    
    function get_company_info($company){
         $query = $this->db->query("SELECT * from hr_company where company_id = $company");

        return $query->result_array();
        
    }
    function employee_info_maker($employee_id)
    {
         $query = $this->db->query("select hr_employee_record.emp_id as id ,hr_employee_record.campus_id as campusid, hr_employee_record.department_id as departmentid, hr_employee_record.record_company_name as companyid ,hr_designations.designation_title as designation ,emp_code as employeecode , employee_name as employeename ,date_of_birth as employeedob,company_name as employeecompany,
department_name as employeedepartment ,emp_picture as picture from 
hr_employee_record 
INNER JOIN hr_employee_contact on hr_employee_contact.emp_id = hr_employee_record.emp_id
INNER JOIN hr_company on  hr_company.company_id =  hr_employee_record.record_company_name
INNER JOIN hr_departments on hr_departments.department_id = hr_employee_record.department_id
INNER JOIN emp_gen_details on emp_gen_details.emp_id = hr_employee_record.emp_id
INNER JOIN hr_designations on hr_designations.designation_id = hr_employee_record.designation_id
where hr_employee_record.emp_id =$employee_id");
       
        return $query->result_array();
    }
    function add_employee_detail($emp_data)
    {
         $query = $this->db->insert('employee_info', $emp_data); 
		
        return $this->db->insert_id();
    }
    function update_employee_detail($emp_data,$emp_id)
    {
        $this->db->where('emp_id', $emp_id);
return $this->db->update('employee_info', $emp_data);
    }
                
}

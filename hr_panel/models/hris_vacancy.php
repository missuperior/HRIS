<?php

class Hris_vacancy extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
     // get all cities from db    
    function getAllcities()
    {
        $this->db->order_by('city_name', 'ASC'); 
        $query = $this->db->get('cities');
		
        return $query->result_array();
    }
      // get Designations for According to the Department    
    function DepartmentDesignations($department_id)
    {  
        $query = $this->db->get_where('hr_designations', array('department_id' => $department_id));
        return $query->result_array();
    }  
     // get department for According to the Company    
    function CompanyDepartment($company_id)
    {
         $query = $this->db->get_where('hr_departments', array('company_id' => $company_id));
        return $query->result_array();
    }
    function getAllDegree()
    {
         $query = $this->db->get_where('hr_dgree');
        return $query->result_array();
    }
     //  insert  vacancy  
    function add_vacancy($vacancy)
    {
         $query = $this->db->insert('hr_vecancy', $vacancy); 
	return $this->db->insert_id();
    }
    // get all vacancy 
    function get_vacancy()
    {
$query = $this->db->query("select hr_company.company_name, hr_departments.department_name,hr_designations.designation_title ,
    cities.city_name ,hr_dgree.dgree_name,hr_vecancy.* from hr_vecancy 
INNER JOIN hr_company ON hr_company.company_id = hr_vecancy.company_id
INNER JOIN hr_departments ON hr_departments.department_id = hr_vecancy.department_id
INNER JOIN hr_designations ON hr_designations.designation_id = hr_vecancy.designation_id
INNER JOIN cities ON cities.city_id = hr_vecancy.city_id
INNER JOIN hr_dgree ON hr_dgree.dgree_id = hr_vecancy.min_dgree");
       
        return $query->result_array();
    }
    function get_vacancy_by_id($vacancy_id)
    {
    $query = $this->db->query("select hr_company.company_name, hr_departments.department_name,hr_designations.designation_title ,
        cities.city_name ,hr_dgree.dgree_name,hr_vecancy.* from hr_vecancy 
    INNER JOIN hr_company ON hr_company.company_id = hr_vecancy.company_id
    INNER JOIN hr_departments ON hr_departments.department_id = hr_vecancy.department_id
    INNER JOIN hr_designations ON hr_designations.designation_id = hr_vecancy.designation_id
    INNER JOIN cities ON cities.city_id = hr_vecancy.city_id
    INNER JOIN hr_dgree ON hr_dgree.dgree_id = hr_vecancy.min_dgree where hr_vecancy.vecancy_id = '$vacancy_id' ");

        return $query->result_array();
    }
    function update_vacancy($vacancy,$vid)
    {
    $this->db->where('vecancy_id', $vid);
    $this->db->update('hr_vecancy', $vacancy);
    return   $this->db->affected_rows(); 
    }
    
}
    
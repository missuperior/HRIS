<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload page</title>
<style type="text/css">
body {
	background: #E3F4FC;
	font: normal 14px/30px Helvetica, Arial, sans-serif;
	color: #2b2b2b;
}
a {
	color:#898989;
	font-size:14px;
	font-weight:bold;
	text-decoration:none;
}
a:hover {
	color:#CC0033;
}

h1 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #CC0033;
}
h2 {
	font: bold 14px Helvetica, Arial, sans-serif;
	color: #898989;
}
#container {
	background: #CCC;
	margin: 100px auto;
	width: 945px;
}
#form 			{padding: 20px 150px;}
#form input     {margin-bottom: 20px;}
</style>
</head>
<body>
<div id="container">
<div id="form">

<?php

//include "connection.php"; //Connect to Database

// $deleterecords = "TRUNCATE TABLE tablename"; //empty the table of its current records
// mysql_query($deleterecords);

//Upload File
 $this->load->model('Hris_model');
if (isset($_POST['submit'])) {
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
		echo "<h2>Displaying contents:</h2>";
		readfile($_FILES['filename']['tmp_name']);
	}
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
	//Import uploaded file to Database
	//$handle = fopen('myCSVFile.csv', 'r');
while (($line = fgetcsv($handle)) !== FALSE) {
  //$line is an array of the csv elements
//    echo '<pre>';
//  print_r($line);

  
   $record_data = array(
          'emp_code'                    => $line[0],
          'employee_name'               => $line[1],
          'grade_level_id'              => $line[17],
          'employee_status'             => $line[15],
          'soc_sec_num'                 => $line[14],
          'eobi_num'                    => $line[16],
          
      );
    echo '<pre>';
	  print_r($record_data);
	echo  $employee_id = $this->Hris_model->addEmployeeRecord($record_data);
	  
                $add_data = array(
          'emp_id'                      => $employee_id,
          'designation_id'              => $line[20],
          'record_company_name'         => $line[18],
          'department_id'               => $line[19],
          'campus_id'                   => $line[21],
          'employee_type'               => $line[22],
         
          'shift'                       => $line[23],
          'joining_date'                => $line[39],
          'confirmation_date'           => $line[40],
          'record_starting_salary'      => $line[24],
          'current_salary'              => $line[24],
          'probation_period'            => $line[41],
      
            
              
          );
          
         
           $add_type = $this->Hris_model->addAdditionalRecord($add_data);
              $salary_data = array(
                                  'salary_amount'                   => $line[24],
                                    'emp_id'                          => $employee_id
                                );
              
                 $salary_id = $this->Hris_model->addSalaryDetails($salary_data);
				 
			 $contact_data = array(
                            'emp_name'                      => $line[1],
                            'father_name'                   => $line[2],
                            'mother_name'                   => $line[3],
                            'spouse_name'                   => $line[4],
                            'date_of_birth'                 => $line[8],
                            'cnic_no'                       => $line[5],
                            'gender'                        => $line[6],
                            'blood_group'                   => $line[7],
                            
                           
          
                            'mailing_address'               => $line[11],                            
                            'mailing_contact_no'            => $line[10],
          
                            'permanent_address'             => $line[13],                            
                            'permanent_contact_no'          => $line[10],
							'mobile_1'                      => $line[9],
                            'mobile_2'                      => $line[10],
                            'email_1'                       => $line[11],
                            'email_2'                       => $line[12],
                            'emp_id'                        => $employee_id
                        );
      
       echo 'Contact Data <br><pre>';
               print_r($contact_data);
      
      $contact_id = $this->Hris_model->addContactRecord($contact_data);
	 
	 $education_data = array(
                                    'degree_title'              => $line[25],
                                    'major_subjects'            => $line[26],
                                    'degree_grade'              => $line[27],          
                                    'degree_institute_name'     => $line[28],
                                    'country'                   => $line[29],
                                    'degree_passing_year'       => $line[30],
                                    'duration'                  => $line[31],
                                    'emp_id'                    => $employee_id
                                );
                
//               echo 'Education Data <br><pre>';
//               print_r($education_data);
                
               $education_id = $this->Hris_model->addEducationDetails($education_data);
				 $education_data = array(
                                    'degree_title'              => $line[32],
                                    'major_subjects'            => $line[33],
                                    'degree_grade'              => $line[34],          
                                    'degree_institute_name'     => $line[35],
                                    'country'                   => $line[36],
                                    'degree_passing_year'       => $line[37],
                                    'duration'                  => $line[38],
                                    'emp_id'                    => $employee_id
                                );
                
//               echo 'Education Data <br><pre>';
//               print_r($education_data);
                
                $education_id = $this->Hris_model->addEducationDetails($education_data);
 }
fclose($file);

	print "Import done";

	//view upload form
}else {

	print "Upload new csv by browsing to file and clicking on Upload<br />\n";

	print "<form enctype='multipart/form-data' action='' method='post'>";

	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";

}

?>

</div>
</div>
</body>
</html>


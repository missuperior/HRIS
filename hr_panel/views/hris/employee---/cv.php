
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CV</title>
<style>
    td{
        text-align: left;
        font-family: Cambria !important;
        font-size: 16px;
    }
    
    body{
        font-family: Cambria !important;
        font-size: 16px;
    }
</style>
</head>

<body>
<div style="width:960px; margin:0 auto; border: 1px solid;">
<div style="text-align:center; font-weight:bold; font-size:30px; padding-top:30px;"><i><u>Curriculum Vita</u></i></div>

<div style="font-size:16px; font-weight:bold; padding:30px; line-height:30px;">
    
<u>Personal Information:</u><br />
<?php foreach($personal as $data) { ?>
<div style="float:right;margin-top: -36px;">
<img src="<?php echo base_url(); ?><?php echo $data['emp_picture']; ?>" width="144" height="144" /></div>
<table>
        <tr>
            <td>Name:</td>
            <td><?php echo $data['emp_name']; ?></td>
        </tr>
    
    <tr>
            <td>Father Name:</td>
            <td><?php echo $data['father_name']; ?></td>
        </tr>
    
    <tr>
            <td>Date of Birth:</td>
            <td><?php echo $data['date_of_birth']; ?></td>
        </tr>
    
     <tr>
            <td>Gender:</td>
            <td><?php echo $data['gender']; ?></td>
        </tr>
    
    <tr>
            <td>CNIC#:</td>
            <td><?php echo $data['cnic_no']; ?></td>
        </tr>
    
    <tr>
            <td>Nationality:</td>
            <td><?php echo $data['nationality']; ?></td>
        </tr>
    
    <tr>
            <td>Marital Status:</td>
            <td><?php echo $data['marital_status']; ?></td>
        </tr>
    
    <tr>
            <td>Religion:</td>
            <td><?php echo $data['religion']; ?></td>
        </tr>
    
    <tr>
            <td>House Address:</td>
            <td><?php echo $data['permanent_address']; ?></td>
        </tr>
    
    
    <tr>
            <td>Contact #:</td>
            <td><?php echo $data['permanent_contact_no']; ?></td>
        </tr>
    
    <tr>
            <td>Email ID:</td>
            <td><?php echo $data['email_1']; ?></td>
        </tr>
    </table>


</div>
<?php } ?>
<div style="padding-left:30px;">
  <div  style="font-size:16px; font-weight:bold;"><u>Educational Background: </u></div>
        <?php foreach($education as $data) { ?>
      
    <p style="font-size:14px;font-weight: bold;">
        <?php echo $data['degree_institute_name']; ?>,  <?php echo $data['degree_passing_year']; ?><br/>
      <?php echo $data['degree_title']; ?> with CGPA <?php echo $data['degree_grade']; ?><br />
        Majors in <?php echo $data['major_subjects']; ?>
        </p>
       
      <?php } ?>  
  <br/>
  <div  style="font-size:16px; font-weight:bold;"><u>Professional Experience: </u></div>
       <?php foreach($exp as $data) { ?>
    <p style="font-size:14px;font-weight: bold;">
        <?php echo $data['company_name']; ?><br/>
      <?php echo $data['job_title']; ?> From <?php echo $data['expereince_from_date']; ?> To <?php echo $data['experience_to_date']; ?><br />
       
        </p>
  <?php } ?>
  
        <div style="width:800px; margin:0 auto;">
       <h4>Trainings / Workshops: </h4>
    <table style="margin-left:30px;" width="800px;" border="2" cellspacing="0" cellpadding="0">
  <tr style="color:#fff;">
    <th width="8%" align="center" valign="top" bgcolor="#333333" scope="col">SR</th>
    <th width="41%" align="center" valign="top" bgcolor="#333333" scope="col"><strong>Trainings / Workshops Title</strong></th>
    <th width="10%" align="center" valign="top" bgcolor="#333333" scope="col"><strong>Institute</strong></th>
    <th width="10%" align="center" valign="top" bgcolor="#333333" scope="col"><strong>Location</strong></th>
  </tr>
        <?php
        $i = 1;
        foreach($certification as $data) {?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['training_title']; ?></td>
            <td><?php echo $data['training_institute']; ?></td>
            <td><?php echo $data['training_institute_address']; ?></td>
        </tr>
  <?php $i++;} ?>
</table>

        
    </div>
        
<h4 style="font-family:Arial, Helvetica, sans-serif;">Skills: </h4>
<table>
    <tr>
        <?php foreach($skills as $data) { ?>
        <td><b>Skill Name:</b> <?php echo $data['skill_name']; ?></td>
        <td><b>Years of Experience:</b> <?php echo $data['years_of_experience']; ?></td>
        <td><b>Level:</b> <?php echo $data['skill_level']; ?></td>
        <?php } ?>
    </tr>
</table>
<h4 style="font-family:Arial, Helvetica, sans-serif;"> Languages:   </h4>
<table>
    <tr>
        <?php foreach($lang as $data) { ?>
        <td><b>Language:</b> <?php echo $data['language']; ?></td>
        <td><b>Level:</b> <?php echo $data['language_level']; ?></td>
        <?php } ?>
    </tr>
</table>
<h4 style="font-family:Arial, Helvetica, sans-serif;">  Memberships: (If any)  </h4>
<table>
    <tr>
        <?php foreach($lang as $data) { ?>
        <td><?php echo $data['language']; ?></td>
        <?php } ?>
    </tr>
</table>

<h4 style="font-family:Arial, Helvetica, sans-serif;">  References:  </h4> 
<table>
    <tr>
        <?php foreach($reference as $data) { ?>
        <td><b>Reference Name:</b> <?php echo $data['reference_name']; ?></td>
        <td><b>Reference Company:</b> <?php echo $data['reference_company_business_name']; ?></td>
        <td><b>Reference Job Title:</b> <?php echo $data['reference_job_title']; ?></td>
        <td><b>Reference Contact:</b> <?php echo $data['reference_contact_no']; ?></td>
        <?php } ?>
    </tr>
</table>
<div style="margin-bottom: 10px;margin-top: 10px;">
<button onclick="myFunction()">Print CV</button>
</div>
<script>
function myFunction() {
    window.print();
}
</script>

</div>








</div>














</body>
</html>

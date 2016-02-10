<script>
 $(document).ready(function() {
function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    
                    $('#banner_pre').attr('src', e.target.result);
                    $('#prevbanner_file1').show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("#emp_pic").change(function(){
            readURL(this);
        });
 });
</script>
<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Dashboard</a>

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>

            <li>
                Employee Management

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Information / Data</li>
        </ul><!--.breadcrumb-->

    </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Information / Data
<!--        <small>
          <i class="icon-double-angle-right"></i>
          Common form elements and layouts
        </small>-->
      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
       <a href="" style="text-decoration: none" class="pink">
            <?php 
               // echo validation_errors();
                echo $this->session->userdata('error_msg'); $this->session->unset_userdata('error_msg'); 
            ?>
        </a>
    </h4>
    
    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->

        <div class="row-fluid">
          <div class="span12">
              
            <!-- Tabs Headings -->  
            <button style="font-size: 10px; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " onclick="return show(this.id);" id="1"  class="btn btn-app btn-default btn-mini">
<i class="icon-info bigger-160"></i>
Employment
</button>
 
  <button style="font-size: 10px; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " onclick="return show(this.id);" id="2"  class="btn btn-app  btn-yellow btn-mini">
<i class="icon-user  bigger-160"></i>
Personal
</button>
                <button style="font-size: 10px; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; "  onclick="return show(this.id);" id="3"  class="btn btn-app btn-success btn-mini">
<i class="icon-phone   bigger-160"></i>
Contact
</button>
                     <button style="font-size: 10px; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " onclick="return show(this.id);" id="4"  class="btn btn-app btn-danger btn-mini">
<i class="icon-hospital  bigger-160"></i>
Medical</button>
              
            <button style="font-size: 10px; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; "  onclick="return show(this.id);" id="5" class="btn btn-app btn-info btn-mini">
<i class="icon-briefcase   bigger-160"></i>
Education
</button>   
              
                <button style="font-size: 10px; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; "   onclick="return show(this.id);" id="6"  class="btn btn-app btn-grey btn-mini">
<i class=" icon-road  bigger-160"></i>
Work Exp.
</button>   
                 
             <button style="font-size: 10px; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; "   onclick="return show(this.id);" id="7"  class="btn btn-app  btn-purple btn-mini">
<i class=" icon-random  bigger-160"></i>
References
</button>      
             
              <button style="font-size: 10px; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; "   onclick="return show(this.id);" id="8"  class="btn btn-app btn-info btn-mini">
<i class="icon-folder-open-alt bigger-160"></i>
Documents
</button>         
              <!-- ENd Tabs Headings -->  
              
            <div class="widget-box" style="margin-top:40px;">                          
<!--              <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Employee Personal Information</h4>
              </div>-->

              <div class="widget-body">
                <div class="widget-main">
                  <div class="row-fluid">
                    <form name="employeeform" id="employeeform" method="post" action="<?php echo base_url();?>hris/update_employee_record" enctype="multipart/form-data"                   
                   
                   <!--***************       Start HTML For Step1 (Employement Tab)     ****************-->
                      
                      <div class="step-pane active" id="step1">
                          <!----------Employee Gen Details------------->
                          <?php foreach($employee as $data) { ?>
                          <table id="employee_contact" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Employment details******************* -->
                                    
                                  
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Employment Details</h3>   
                                      </td>
                                  </tr> 

                                  <tr>
                                      <td>                                              
                                          <label style="width: 150px;" class="control-label">Employee ID / Code : </label>
                                          <input style="width: 300px;" type="text" name="employee_code" id="employee_code" class="span6" value="<?php echo $data['emp_code']; ?>" />                                          
                                          <input type="hidden" name="emp_id" value="<?php echo $data['emp_id']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_code'); ?></h6>
                                      </td>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Employee Name:</label>
                                          <input style="width: 300px;" type="text" name="emp_record_name" id="emp_record_name" value="<?php echo $data['employee_name']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('emp_record_name'); ?></h6>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('facility'); ?></h6>
                                          
                                      </td>
                                  </tr>
                                  
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Social Security:</label>
                                          <input style="width: 300px;" type="text" name="social_security" id="social_security" value="<?php echo $data['soc_sec_num']; ?>" class="span6" />
                                      </td>
                                      
                                      <td>  
                                          <label style="width: 200px;" class="control-label">Employee Status:</label>
                                          <select style="width: 301px;" id="employee_status" name="employee_status" >
                                              <option value="">-- Select Status --</option>                                          
                                              <option value="Probationary" <?php if ($data['employee_status'] == 'Probationary') echo 'selected="selected"'; ?>>Probationary</option>																				
                                              <option <?php if ($data['employee_status'] == 'Confirmed') echo 'selected="selected"'; ?> value="Confirmed">Confirmed</option>																				
                                              <option <?php if ($data['employee_status'] == 'On Trial') echo 'selected="selected"'; ?> value="On Trial">On Trial</option>																					
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_status'); ?></h6>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">EOBI #: </label>
                                          <input style="width: 300px;" type="text" name="eobi" id="eobi" value="<?php echo $data['eobi_num']; ?>" class="span6" onkeyup="this.value=formatCurrency(this.value);" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('eobi'); ?></h6>
                                      </td>                                      
                                      <td>
                                          <label style="width: 250px;" class="control-label">Health Insurance #: </label>
                                          <input style="width: 300px;" type="text" name="h_ins_no" id="h_ins_no" value="<?php echo $data['health_ins_num']; ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('h_ins_no'); ?></h6>
                                      </td>
                                  </tr>
                                  
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Grade:</label>
                                          <input style="width: 300px;" type="text" name="record_grade" id="record_grade" class="span6" value="<?php echo $data['grade']; ?>" />
                                      </td>
                                  </tr>
                                   
                              </tbody>
                          </table>
                          <?php } ?>
                          <!-----------------End Gen Details------------------>
                          
                          
                          <!---------------Designation Details----------------->
                          <?php foreach($emp_details as $data) {
                           
                             ?>
                          <table id="additional_details" class="add_child" border="0" width="100%" cellpadding="7">
                              <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Designation Details</h3>   
                                          <input type="hidden" name="emp_record_id" value="<?php echo $data['emp_record_id']; ?>" />
                                      </td>
                                  </tr>
                                  <tr>
                                      
                                      <td>   
                                          <label style="width: 200px;" class="control-label">Company / Institute Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="record_company" name="record_company[]" required>                                 
                                              <option value="">-- Select Company --</option>
                                              <?php foreach ($company as $row) { ?>
                                                  <option value="<?php echo $row['company_id'] ?>" <?php if($data['record_company_name'] == $row['company_id']){echo "selected=selected";} ?>><?php echo $row['company_name'] ?></option> 
                                              <?php } ?>																				
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_company'); ?></h6>
                                      </td>
                                      
                                      <td>  
                                          
                                          <label style="width: 140px;" class="control-label">Department: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="disp" name="record_department[]" required>
                                          <option value="">-- Select Department --</option>
                                      <?php foreach ($department as $row){?>
                                          <option value="<?php echo $row['department_id']?>" <?php if($row['department_id'] == $data['department_id']) echo "selected=selected"; ?>><?php echo $row['department_name']?></option> 
                                      <?php }?>																				
                                          </select>
                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_department'); ?></h6>
                                          
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Designation: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="record_designation" name="record_designation[]" required>
                                              <option value="">-- Select Designation --</option>
                                            
                                            <?php foreach ($designations as $row) {

                                                ?>
                                              <option <?php if ($row['designation_id'] == $data['designation_id'])
                                                echo "selected='selected'"; ?> value="<?php echo $row['designation_id'] ?>"><?php echo $row['designation_title']; ?></option> 
                                            <?php } ?>

                                              <option id="cm" value="166">Chairman Secretariat</option>
                                              <option id="do" value="125">Director Operations</option>
                                              <option id="rs" value="121">Registrar Secretariat</option>
                                              <option id="pd" value="118">Project Director</option>
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_designation'); ?></h6>
                                      </td>
                                      
                                      <td>  
                                            <label style="width: 200px;" class="control-label">Garde:<img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                             <select style="width: 301px;" id="record_grades" name="record_grades[]" required>
                                              <option value="">-- Select Grade --</option>
                                              <?php foreach ($grade as $row) { ?>
                                    <option value="<?php echo $row['grade_level_id']; ?>" <?php if ($row['grade_level_id'] == $data['grade_level_id'])
                                                echo "selected='selected'"; ?>><?php echo $row['title'].'-'.$row['class'] ?></option> 
                                                <?php } ?>
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('campus'); ?></h6>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>  
                                          <label style="width: 200px;" class="control-label">Employee Type:</label>
                                          <select style="width: 301px;" id="employee_type" name="employee_type[]" >
                                              <option value="">-- Select Type --</option>                                          
                                              <option <?php if ($data['employee_type'] == 'Permanent') echo 'selected="selected"'; ?> value="Permanent">Permanent</option>																				
                                              <option <?php if ($data['employee_type'] == 'Contractual') echo 'selected="selected"'; ?>value="Contractual">Contractual</option>																				
                                              <option <?php if ($data['employee_type'] == 'Temporary') echo 'selected="selected"'; ?>value="Temporary">Temporary</option>																					
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_type'); ?></h6>
                                      </td> 
                                      <td> 
                                           <label style="width: 200px;" class="control-label">Campus:<img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="campus" name="campus[]" required>                                 
                                              <option value="">-- Select Campus --</option>
                                              <?php foreach ($campus as $row) { ?>
                                                  <option value="<?php echo $row['campus_id'] ?>"><?php echo $row['campus_name'] ?></option> 
                                              <?php } ?>																				
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('campus'); ?></h6>
                                          
                                      </td> 
                                      
                                  </tr>
                                  

                                  <tr>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Shift:</label>
                                          <select style="width: 301px;" id="shift" name="shift[]"  >
                                              <option value="">-- Select Shift --</option>
                                              <option <?php if ($data['shift'] == 'Morning') echo 'selected="selected"'; ?>value="Morning">Morning</option>
                                              <option <?php if ($data['shift'] == 'Evening') echo 'selected="selected"'; ?>value="Evening">Evening</option>																				
                                              <option <?php if ($data['shift'] == 'Night') echo 'selected="selected"'; ?>value="Night">Night</option>																				
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('shift'); ?></h6>
                                      </td> 
                                      <td>
                                           <label style="width: 140px;" class="control-label">Shift Time: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="shift_time" name="shift_time[]"  required>
                                              <option value="">-- Select Shift Time --</option>
                                             <?php foreach ($shifts as $shift) { ?>
                                  <option value="<?php echo $shift['shiftId']; ?>" <?php if($shift['shiftId'] == $data['shift_id']) echo "selected=selected"; ?>><?php echo $shift['title'] ?></option> 
                                              <?php } ?>																					
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('shift'); ?></h6>
                                      </td>
                                      
                                  </tr>

                                  <tr>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Joining Date:</label>
                                          <input style="width: 300px;" type="date"  name="joining_date[]" id="joining_date" value="<?php echo $data['joining_date']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly  />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('joining_date'); ?></h6>
                                      </td>
                                      <td>
                                          <label style="width: 250px;" class="control-label" >Confirmation Date:</label>
                                          <input style="width: 300px;" type="date" name="confirmation_date[]" id="confirmation_date" value="<?php echo $data['confirmation_date']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly  />
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Starting Salary:</label>
                                          <input style="width: 300px;" type="text" name="record_starting_salary[]" id="record_starting_salary" value="<?php echo $data['record_starting_salary']; ?>" class="span6"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_starting_salary'); ?></h6>
                                      </td>                                      
                                      <td>
                                          <label style="width: 250px;" class="control-label">Current Salary:</label>
                                          <input style="width: 300px;" type="text" name="current_salary[]" id="current_salary" value="<?php echo $data['current_salary']; ?>" class="span6"  />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('current_salary'); ?></h6>
                                      </td>
                                  </tr>

                                  
                                  
                                  
                                  <tr>
                                      <td>   
                                          <label style="width: 250px;" class="control-label">Probation Period :</label>
                                          <select style="width: 301px;" id="probation_period" name="probation_period[]" >
                                              <option value="">-- Select Shift --</option>
                                              <option <?php if ($data['probation_period'] == '3 Months') echo 'selected="selected"'; ?>value="3 Months">3 Months</option>
                                              <option <?php if ($data['probation_period'] == '6 Months') echo 'selected="selected"'; ?>value="6 Months">6 Months</option>
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('probation_period'); ?></h6>
                                      </td> 
                                      <td>
                                          <label style="width: 200px;" class="control-label">Additional Type: </label>
                                          <select style="width: 301px;" id="ad_employee_type" name="ad_employee_type[]" >
                                              <option value="">-- Select Type --</option>                                          
                                              <option <?php if ($data['employee_addition_type'] == 'Full Time') echo 'selected="selected"'; ?> value="Full Time">Full Time </option>																				
                                              <option <?php if ($data['employee_addition_type'] == 'Part Time') echo 'selected="selected"'; ?>value="Part Time">Part Time</option>
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('ad_employee_type'); ?></h6>
                                      </td>
                                  </tr>
                                  
                                  <tr>
                                      <td>   
                                          <label style="width: 250px;" class="control-label">Probation Period From: </label>
                                          <input style="width: 300px;" type="text"  name="probation_from[]" id="child_dob" value="<?php echo $data['probation_from']; ?>" class="span6 date-picker" placeholder="yyyy-mm-dd" readonly  />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('probation_from'); ?></h6>
                                      </td>
                                      <td>
                                          <label style="width: 250px;" class="control-label" >Probation Period To: </label>
                                          <input style="width: 300px;" type="text"  name="probation_to[]" id="child_dob2" value="<?php echo $data['probation_to']; ?>" class="span6 date-picker" placeholder="yyyy-mm-dd" readonly />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('probation_to'); ?></h6>
                                      </td>
                                  </tr>


                                  <tr>
                                      <td colspan="2">
                                          <h5 style="margin-top: 20px; font-size: 20px;" class="lighter block green">Salary Details</h5>   
                                      </td>
                                  </tr> 
                                  <tr>
                                      <td>  
                                          <label style="width: 200px;" class="control-label">Type : </label>
                                          <select style="width: 301px;" id="salary_detail_type" name="salary_detail_type[]">
                                          <option value="">-- Select Type --</option>      
                                          <?php foreach($salary as $row) { ?>
                                              <option value="<?php echo $row['sal_type_id']; ?>" selected><?php echo $row['sal_type_name']; ?></option>                                          
                                              <?php $sal[] = $row;} 
                                            
                                              ?>                                                   
                                      </td> 

                                      <td>
                                          <label style="width: 250px;" class="control-label">Amount : </label>
                                          <input style="width: 300px;" type="text" name="salary_detail_amount[]" id="salary_detail_amount" value="<?php echo $sal[0]['salary_amount']; ?>" class="span6" />
                                          <input type="hidden" name="emp_salary_id" value="<?php echo $sal[0]['emp_salary_id']?>" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('salary_detail_amount'); ?></h6>
                                      </td> 
                                  </tr>

                                  <tr>
                                      <td colspan="2">
                                          <label style="width: 250px;" class="control-label" > Date : </label>
                                          <input style="width: 300px;" type="text" name="salary_detail_date[]" id="salary_detail_date" value="<?php echo $sal[0]['salary_date']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" />
                                      </td>

                                  </tr>
                              </tbody>
                          </table>

                          

                          <span class="add_details" id="add_child" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                            Add More
                          </span>
                          
                          <?php } ?>
                          <!-- ***************    ENd for Designation details******************* -->

                          <!-- ***************    STart for bank details******************* -->
                          <table id="salary_data" border="0" width="100%" cellpadding="7">
                               <?php foreach($emp_bank_detail as $data) {
                                   
                                   ?>
                              <tbody>  
                                 
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px; width: 100%; float: left;" class="lighter block green">Bank Details</h3>   
                                          <input type="hidden" name="bank_id" value="<?php echo $data['bank_id']; ?>">
                                      </td>
                                  </tr> 

                                  <tr>
                                      <td>                                       
                                          <label style="width: 200px;" class="control-label">Bank Name: </label>
                                          <select style="width: 301px;" id="bank_name" name="bank_name" >
                                              <option value="">-- Select Type --</option>                                          
                                              <?php foreach($banks as $emp_bank){
                                                 
                                                  ?>
                                              <option value="<?php echo $emp_bank['bank_name']; ?>" <?php if($emp_bank['bank_name'] == $data['bank_name']) echo "selected=selected"; ?> ><?php echo $emp_bank['bank_name']; ?></option>																				
                                              <?php } ?>
                                          </select>
                                      </td>                                      
                                      <td>
                                          <label style="width: 250px;" class="control-label">Account Title : </label>
                                          <input style="width: 300px;" type="text" name="account_title" id="account_title" value="<?php echo $data['account_title']; ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('account_title'); ?></h6>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Account Number : </label>
                                          <input style="width: 300px;" type="text" name="account_no" id="account_no" value="<?php echo $data['account_no']; ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('account_no'); ?></h6>
                                      </td>                                      
                                      <td>
                                          <label style="width: 250px;" class="control-label">Branch Address : </label>
                                          <input style="width: 300px;" type="text" name="bank_address" id="bank_address" value="<?php echo $data['bank_address']; ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('bank_address'); ?></h6>
                                      </td>
                                  </tr>
                                  <?php } ?>
                          
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px; width: 100%; float: left;" class="lighter block green">Facilities</h3>   
                                      </td>
                                  </tr> 
                                  
                                  </table>
                                   <!-- ***************    ENd for bank details******************* -->
                                   
                                   
                                   <!-- ***************    STart for Facilities details******************* -->
                          
                              <table id="facility_data" border="0" width="100%" cellpadding="7">
                                  <tbody>
                                      <?php foreach($emp_facilities as $emp_fac) { ?>
                                      <tr>
                                          <td>  
                                              <label style="width: 200px;" class="control-label">Facility : </label>
                                              <input type="hidden" name="facility_id" value="<?php echo $emp_fac['facility_id'];?>"/>
                                              <select style="width: 301px;" id="facility" name="facility[]">
                                                  <option value="">-- Select Facility --</option> 
                                                  <?php foreach($facilities as $facility) { ?>
                                                  <option value="<?php echo $facility['facility_id']; ?>" <?php if($emp_fac['fac_id'] == $facility['facility_id']) {echo "selected=selected";}?>><?php echo $facility['facility']; ?></option>																				
                                                  <?php } ?>																					
                                              </select>
                                          </td> 

                                          <td>
                                              <label style="width: 250px;" class="control-label" > Date From : </label>
                                              <input style="width: 300px;" type="text" name="facility_date[]" id="facility_date" value="<?php echo $emp_fac['facility_date_from'];  ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" /> 
                                          </td>

                                      </tr>

                                      <tr>
                                          <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Description : </label>
                                              <textarea style="width: 870px; height: 100px" name="facility_description[]" id="facility_description"><?php echo $emp_fac['facility_description']; ?></textarea>
                                              <!--<input style="width: 884px; height: 100px" type="text" name="facility_description" id="facility_description" value="<?php echo set_value('facility_description'); ?>" class="span6" />-->
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('facility_description'); ?></h6>
                                          </td>                                                                                        
                                      </tr>
                                      <?php } ?>
                                  </tbody>
                              </table>

                              <span class="add_facility" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                                  Add More
                              </span>

                              <!-- ***************    ENd for Facilities details******************* -->


                              </tbody>
                          </table>
                      </div>
                   
                   
                   <!--***************       Start HTML For step2  (Personal Tab)      ****************-->
                   
                   <div class="step-pane active" id="step2">
                          
                          <table id="employee_contact" border="0" width="100%" cellpadding="7">
                              <?php foreach($personal_details as $data) { ?>
                              <tbody>

                                  <!-- ***************    STart for Personel details******************* -->


                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Personal Details</h3>   
                                      </td>
                                  </tr> 

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Father's Name :</label>
                                          <input style="width: 300px;" type="text" name="f_name" id="f_name" value="<?php echo $data['father_name']; ?>" class="span6"/>
                                          <input type="hidden" name="emp_contact_id" value="<?php echo $data['emp_contact_id']; ?>"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('f_name'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 150px;" class="control-label">Mother's Name : </label>
                                          <input style="width: 300px;" type="text" name="m_name" id="m_name" class="span6" value="<?php echo $data['mother_name']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('m_name'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Spouse Name : </label>
                                          <input style="width: 300px;" type="text" name="s_name" id="s_name" value="<?php echo $data['spouse_name']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('s_name'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 150px;" class="control-label" for="email">CNIC :</label>
                                          <input style="width: 300px;" type="text" name="cnic" id="cnic" class="span6" maxlength="15" value="<?php echo $data['cnic_no']; ?>" placeholder="31202-1234567-8" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('cnic'); ?></h6>
                                      </td>

                                  </tr>

                                  
                                  <tr>
                                      <td>  
                                          <label style="width: 190px;" class="control-label">Gender :</label>
                                          <select style="width: 301px;" id="gender" name="gender">
                                              <option value="">-- Select Gender --</option>																			
                                              <option value="Male" <?php if($data['gender'] == 'Male'){echo "selected=selected";}?>>Male</option>																			
                                              <option value="Female" <?php if($data['gender'] == 'Female') echo "selected=selected";?>>Female</option>																			
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('gender'); ?></h6>
                                      </td>
                                      <td>  
                                          <label style="width: 200px;" class="control-label">Blood Group :</label>
                                          <select style="width: 301px;" id="blood_group" name="blood_group" >                                 
                                              <option value="">-- Select Blood Group --</option>
                                              <option value="A+" <?php if($data['blood_group'] == "A+") echo "selected=selected";?>>A+</option>
                                              <option value="A-" <?php if($data['blood_group'] == "A-") echo "selected=selected";?>>A-</option>
                                              <option value="B+" <?php if($data['blood_group'] == "B+") echo "selected=selected";?>>B+</option>
                                              <option value="B-" <?php if($data['blood_group'] == "B-") echo "selected=selected";?>>B-</option>
                                              <option value="O+" <?php if($data['blood_group'] == "O+") echo "selected=selected";?>>O+</option>
                                              <option value="O-" <?php if($data['blood_group'] == "O-") echo "selected=selected";?>>O-</option>
                                              <option value="AB+" <?php if($data['blood_group'] == "AB+") echo "selected=selected";?>>AB+</option>
                                              <option value="AB-" <?php if($data['blood_group'] == "AB-") echo "selected=selected";?>>AB-</option>
                                              																				
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('blood_group'); ?></h6>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>  
                                          <label style="width: 200px;" class="control-label">Marital Status : </label>
                                          <select style="width: 301px;" id="marital_status" name="marital_status" >
                                              <option value="">-- Select Status --</option>                                          
                                              <option value="Single" <?php if($data['marital_status'] == "Single") echo "selected=selected";?>>Single</option>                                                                                       
                                              <option value="Married" <?php if($data['marital_status'] == "Married") echo "selected=selected";?>>Married</option>                                                                                       
                                              <option value="Widowed" <?php if($data['marital_status'] == "Widowed") echo "selected=selected";?>>Widowed</option>                                                                                       
                                              <option value="Divorced" <?php if($data['marital_status'] == "Divorced") echo "selected=selected";?>>Divorced</option>                                                                                       
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('marital_status'); ?></h6>
                                      </td> 
                                      <td>  
                                          <label style="width: 200px;" class="control-label">Religion : </label>
                                          <select style="width: 301px;" id="religion" name="religion" >
                                              <option value="">-- Select Religion --</option> 
                                              <?php foreach($religions as $religion) { ?>
                                              <option value="<?php echo $religion['religion_id']; ?>" <?php if($data['religion'] == $religion['religion_id']) echo "selected=selected";?>><?php echo $religion['religion']; ?></option> 
                                              <?php } ?>
                                              </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('religion'); ?></h6>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Date of Birth : </label>
                                          <input style="width: 300px;" type="text" name="dob" id="dob" value="<?php echo $data['date_of_birth']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('dob'); ?></h6>
                                      </td>
                                      <td>  
                                          <label style="width: 200px;" class="control-label">Nationality : </label>
                                          <select style="width: 301px;" id="nationality" name="nationality" >
                                              <option value="">-- Select Country --</option>
                                              <?php foreach($countries as $nat) { ?>
                                              <option value="<?php echo $nat['country']; ?>" <?php if($data['nationality'] == $nat['country'])echo "selected=selected"; ?>><?php echo $nat['country']; ?></option> 
                                              <?php } ?>
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('nationality'); ?></h6>
                                      </td>


                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px; margin-bottom: 20px;" class="control-label">Upload Employee Image :</label>
                                          <input style="width: 300px;" type="file" name="emp_pic" id="emp_pic" value="<?php echo $data['emp_picture']; ?>" class="span6"  />      
                                          <input style="width: 300px;" type="hidden" name="hidfile" id="emp_pic" value="<?php echo $data['emp_picture']; ?>" class="span6"  />      
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('emp_pic'); ?></h6>
                                      </td>                                      
                                      <td id="prevbanner_file1">
                                          <?php if($data['emp_picture'] == 'NULL') { ?>
                                          <img id="banner_pre" src="<?php echo base_url();?>assets/images/no_image.jpg" width="200" height="125" />
                                          <?php }else{ ?>
                                              <img src="<?php echo base_url(); ?><?php echo $data['emp_picture']; ?>" width="200" height="125" />
                                        <?php  } ?>
                                      </td>
                                  </tr>
                                  <?php } ?>
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Dependents</h3>   
                                      </td>
                                  </tr> 
                              </tbody>
                              
                          </table>

                          <table id="dependent_data" border="0" width="100%" cellpadding="7">
                              
                              <tbody>
                                  <?php foreach($dependent as $data) { ?>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Dependent Name :   </label>
                                          <input style="width: 300px;" type="text" name="d_name[]" id="d_name" value="<?php echo $data['dependent_name']; ?>" class="span6" />
                                          <input type="hidden" name="dependent_id" value="<?php echo $data['dependent_id']; ?>"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('d_name'); ?></h6>
                                      </td>

                                      <td>
                                          <label style="width: 250px;" class="control-label">Relationship : </label>                                         
                                          <select style="width: 301px;" id="d_relationship" name="d_relationship[]">
                                              <option value="">-- Select Relationship --</option> 
                                             <?php foreach($relations as $relation){ ?>
                                              <option value="<?php echo $relation['relation_id']; ?>" <?php if($data['dependent_relation'] == $relation['relation_id']) echo "selected=selected";?>><?php echo $relation['relationship']; ?></option> 
                                              <?php } ?>
                                             </select>
                                      </td> 
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Age : </label>
                                          <input style="width: 300px;" type="text" name="d_age[]" id="d_age" value="<?php echo $data['age']; ?>" class="span6"  />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('d_age'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 150px;" class="control-label" for="email">CNIC Of Dependent : </label>
                                          <input style="width: 300px;" type="text" name="d_cnic[]" id="d_cnic" class="span6" maxlength="15" value="<?php echo $data['dependent_cnic']; ?>" placeholder="31202-1234567-8"  />  
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('d_cnic'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                          <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Address Of Dependent : </label>
                                              <textarea style="width: 870px; height: 100px" name="d_address[]" id="d_address"><?php echo $data['dependent_address']; ?></textarea>
                                              <!--<input style="width: 884px; height: 100px" type="text" name="facility_description" id="facility_description" value="<?php echo set_value('facility_description'); ?>" class="span6" />-->
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('d_address'); ?></h6>
                                          </td>                                                                                        
                                   </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                       
                          <span class="add_dependent" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                       
                        <br>
                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Social Media Details</h3> 
                       
                          <table  border="0" width="100%" cellpadding="7">
                              <tbody>
                                  <?php foreach($social as $data) { ?>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Linked In : </label>
                                          <input style="width: 300px;" type="text" name="linkedin" id="linkedin" value="<?php echo $data['linked_in']; ?>" class="span6" />
                                          <input type="hidden" name="social_media_id" value="<?php echo $data['social_media_id']; ?>"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('linkedin'); ?></h6>
                                      </td>

                                      <td>
                                          <label style="width: 250px;" class="control-label">Skype : </label>
                                          <input style="width: 300px;" type="text" name="skype" id="skype" value="<?php echo $data['skype']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('skype'); ?></h6>
                                      </td> 
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Facebook : </label>
                                          <input style="width: 300px;" type="text" name="facebook" id="facebook" value="<?php echo $data['facebook']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('facebook'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 150px;" class="control-label" for="email">Twitter :</label>
                                          <input style="width: 300px;" type="text" name="twitter" id="twitter" class="span6"  value="<?php echo $data['twitter']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('twitter'); ?></h6>
                                      </td>

                                  </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                          
                 
                      </div>
                   
                   <!-- ***************    ENd for Personal details******************* -->
                   
                   <!--***************       Start HTML For step3  (Contact Tab)      ****************-->
                   
                   <div class="step-pane active" id="step3">
                          
                          <table id="employee_contact" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Contact details******************* -->


                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Contact Details</h3>   
                                      </td>
                                  </tr> 
                                    <?php foreach($con_details as $data) { ?>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Mobile No 1 :</label>
                                          <input style="width: 300px;" type="text" name="mobile_1" id="mobile_1" value="<?php echo $data['mobile_1']; ?>" class="span6"  />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('mobile_1'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 250px;" class="control-label">Mobile No 2 : </label>
                                          <input style="width: 300px;" type="text" name="mobile_2" id="mobile_2" class="span6" value="<?php echo $data['mobile_2']; ?>"   />                                                                                    
                                      </td>

                                  </tr>
                                  
                                                                    
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Work Phone :</label>
                                          <input style="width: 300px;" type="text" name="work_phone" id="work_phone" value="<?php echo $data['mailing_contact_no']; ?>" class="span6"  />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('work_phone'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 250px;" class="control-label">Home Residence Phone : </label>
                                          <input style="width: 300px;" type="text" name="home_phone" id="home_phone" class="span6" value="<?php echo $data['permanent_contact_no']; ?>"  />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('home_phone'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                                                    
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Personal Email : </label>
                                          <input style="width: 300px;" type="email" name="personal_email" id="personal_email" value="<?php echo $data['email_1']; ?>" class="span6"  />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('personal_email'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 250px;" class="control-label">Work Email :</label>
                                          <input style="width: 300px;" type="email" name="work_email" id="work_email" class="span6" value="<?php echo $data['email_2']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('work_email'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                                                    
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Permanent Address :</label>
                                              <textarea style="width: 870px; height: 75px" name="permanent_address" id="permanent_address" ><?php echo $data['permanent_address']; ?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('permanent_address'); ?></h6>
                                      </td> 
                                  </tr>
                                  
                                                                    
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Temporary Address :</label>
                                              <textarea style="width: 870px; height: 75px" name="temporary_address" id="temporary_address"><?php echo $data['mailing_address']; ?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('temporary_address'); ?></h6>
                                              
                                      </td> 
                                  </tr>
                                  
                                                                    
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Correspondence Address :</label>
                                              <textarea style="width: 870px; height: 75px" name="correspondence_address" id="correspondence_address" ><?php echo $data['correspondence_address']; ?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('correspondence_address'); ?></h6>
                                              <input type="checkbox" id="sameas" value="1" onclick="sameAsAbove()" style="opacity:1 !important;">
      <p style="float:left;margin-left: 20px;margin-top:2px;font-weight: bold;">Same as Above</p> <br/>
                                      </td> 
                                  </tr>
                                  
                                     <?php } ?>                                
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Emergency Contact Details</h3>   
                                      </td>
                                  </tr> 
                                  
                                 
                              </tbody>
                          </table>

                          <table id="emergency_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                  <?php foreach($nominee as $data) { ?>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Name of Person : </label>
                                          <input style="width: 300px;" type="text" name="e_name[]" id="e_name" value="<?php echo $data['nominee_name']; ?>" class="span6" />
                                          <input type="hidden" name="nominee_id" value="<?php echo $data['nominee_id']; ?>"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('e_name'); ?></h6>
                                      </td>

                                      <td>
                                          <label style="width: 250px;" class="control-label">Relationship :</label>
                                          <input style="width: 300px;" type="text" name="e_relationship[]" id="e_relationship" value="<?php echo $data['nominee_relation']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('e_relationship'); ?></h6>
                                      </td> 
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Phone :</label>
                                          <input style="width: 300px;" type="text" name="e_phone[]" id="e_phone" value="<?php echo $data['nominee_phone']; ?>" class="span6"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('e_phone'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 150px;" class="control-label" for="email">Email:</label>
                                          <input style="width: 300px;" type="email" name="e_email[]" id="e_email" class="span6" maxlength="150" value="<?php echo $data['nominee_email']; ?>"  />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('e_email'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Address :</label>
                                              <textarea style="width: 870px; height: 100px" name="e_address[]" id="e_address"  ><?php echo $data['nominee_address']; ?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('e_address'); ?></h6>
                                      </td> 
                                  </tr>
                                  <?php } ?>
                                  
                              </tbody>
                          </table>
                       
                          <span class="add_emergency" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          
                 
                      </div>
                   
                   <!-- ***************    ENd for Contact details******************* -->
                   
                   
                     <!--***************       Start HTML For step4 (medical Tab)       ****************-->
                   
                   <div class="step-pane active" id="step4">
                          
                          <table id="medcal_data" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Medical details******************* -->

                                    
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Medical Details</h3>   
                                      </td>
                                  </tr> 
                                    <?php foreach($medical as $data) { ?>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Name of Disease/s if any :</label>
                                          <input style="width: 300px;" type="text" name="disease_name[]" id="disease_name" value="<?php echo $data['name_of_disease']; ?>" class="span6" />
                                          <input type="hidden" name="medical_id" value="<?php echo $data['medical_id']; ?>"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('disease_name'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 250px;" class="control-label">Physical Limitation : </label>
                                          <input style="width: 300px;" type="text" name="physical_limitation[]" id="physical_limitation" class="span6" value="<?php echo $data['physical_limitation']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('physical_limitation'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                                                    
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Name of Doctor : </label>
                                          <input style="width: 300px;" type="text" name="doctor_name[]" id="doctor_name" value="<?php echo $data['doctor_name']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('doctor_name'); ?></h6>
                                      </td>

                                      <td>                                              
                                          <label style="width: 250px;" class="control-label">Doctor's Contact No : </label>
                                          <input style="width: 300px;" type="text" name="doctor_contact_no[]" id="doctor_contact_no" class="span6" value="<?php echo $data['doctor_contact_no']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('doctor_contact_no'); ?></h6>
                                      </td>

                                  </tr>
                                                                    
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Doctor's Contact Address : </label>
                                              <textarea style="width: 870px; height: 75px" name="doctor_address[]" id="doctor_address"><?php echo $data['doctor_contact_address']; ?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('doctor_address'); ?></h6>
                                      </td> 
                                  </tr>
                                  
                                                                    
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Details : </label>
                                              <textarea style="width: 870px; height: 75px" name="medical_details[]" id="medical_details"><?php echo $data['medical_detail']; ?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('medical_details'); ?></h6>
                                      </td> 
                                  </tr>
                                  
                                  <?php } ?>
                              </tbody>
                          </table>
                       
                        <span class="add_medical" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>

                      </div>
                   
                   <!-- ***************    ENd for medical details******************* -->
                   
                   
                   
                   <!--***************       Start HTML For step5 (qualification Tab)       ****************-->
                   
                   <div class="step-pane active" id="step5">
                          
                          <table id="employee_qualification" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Contact details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Education</h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>

                          <table id="education_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                  
                                  <?php foreach($education as $data) { ?>
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Degree Title :</label>
                                          <input style="width: 300px;" type="text" name="education_title[]" id="education_title" value="<?php echo $data['degree_title']; ?>" class="span6 "/>
                                          <input type="hidden" name="emp_education_id" value="<?php echo $data['emp_education_id']; ?>"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('education_title'); ?></h6>
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Specialization :</label>
                                          <input style="width: 300px;" type="text" name="education_specialization[]" id="education_specialization" value="<?php echo $data['major_subjects']; ?>" class="span6 "/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('education_specialization'); ?></h6>
                                      </td>

                                  </tr>

                                  
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Grade/CGPA :</label>
                                          <input style="width: 300px;" type="text" name="education_grade[]" id="education_grade" value="<?php echo $data['degree_grade']; ?>" class="span6 " />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('education_grade'); ?></h6>
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Institute :</label>
                                          <input style="width: 300px;" type="text" name="education_institute[]" id="education_institute" value="<?php echo $data['degree_institute_name']; ?>" class="span6 " />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('education_institute'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Country :</label>
                                          <input style="width: 300px;" type="text" name="education_country[]" id="education_country" value="<?php echo $data['country']; ?>" class="span6 " />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('education_country'); ?></h6>
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Completion Year :</label>
                                          <input style="width: 300px;" type="text" name="education_year[]" id="education_year" value="<?php echo $data['degree_passing_year']; ?>" class="span6 "/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('education_year'); ?></h6>
                                      </td>
                                      
                                      <td>   
                                          <label style="width: 250px;" class="control-label">Duration :</label>
                                          <input style="width: 300px;" type="text" name="duration[]" id="education_year" value="<?php echo $data['duration']; ?>" class="span6 " />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('education_year'); ?></h6>
                                      </td>

                                  </tr>
                                    <?php } ?>
                                  
                              </tbody>
                          </table>
                       
                          <span class="add_education" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          
                 
                       
                       <!--//***********  for trainings and certificates--> 
                       
                       <table id="employee_qualification" border="0" width="100%" cellpadding="7">
                              <tbody>
                                    
                                  <!-- ***************    STart for Contact details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Trainings/Certification</h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>

                          <table id="training_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                 <?php foreach($certification as $data) { ?>
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Title :</label>
                                          <input style="width: 300px;" type="text" name="training_title[]" id="training_title" value="<?php echo $data['training_title']; ?>" class="span6 " />
                                          <input type="hidden" name="training_id" value="<?php echo $data['training_id']; ?>">
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Institute :</label>
                                          <input style="width: 300px;" type="text" name="training_institute[]" id="training_institute" value="<?php echo $data['training_institute']; ?>" class="span6 "/>
                                      </td>

                                  </tr>

                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Completion Year :</label>
                                          <input style="width: 300px;" type="text" name="training_year[]" id="training_year" value="<?php echo $data['training_completion_year']; ?>" class="span6 " />
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Duration :</label>
                                          <input style="width: 300px;" type="text" name="training_duration[]" id="training_duration" value="<?php echo $data['training_duration']; ?>" class="span6 " />
                                      </td>

                                  </tr>
                                                                    
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Institution Address :</label>
                                          <textarea style="width: 300px;" type="text" name="training_address[]" id="training_address" ><?php echo $data['training_institute_address']; ?></textarea>
                                      </td>

                                  </tr>
                                  
                                    <?php } ?>
                                  
                              </tbody>
                          </table>
                       
                          <span class="add_training" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          
                 
                       
                       <!--//***********  for trainings and certificates--> 
                       
                       <table id="employee_qualification" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Contact details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Skills</h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>

                          <table id="skill_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                  <?php foreach($skills as $data) { ?>
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Name :</label>
                                          <input style="width: 300px;" type="text" name="skill_name[]" id="skill_name" value="<?php echo $data['skill_name']; ?>" class="span6 " />
                                          <input type="hidden" name="skills_id" value="<?php echo $data['skills_id']; ?>"/>
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Year of Experience :</label>
                                          <input style="width: 300px;" type="text" name="skill_experience[]" id="skill_experience" value="<?php echo $data['years_of_experience']; ?>" class="span6 "/>
                                      </td>

                                  </tr>

                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Skill Level :</label>
                                          <select name="skill_level[]" style="width:300px">
                                              <option value="Beginner" <?php if($data['skill_level'] == 'Biginner') {echo "selected=selected";}?>>Beginner</option>
                                              <option value="Advanced" <?php if($data['skill_level'] == 'Advanced') {echo "selected=selected";}?>>Advanced</option>
                                              <option value="Expert" <?php if($data['skill_level'] == 'Expert') {echo "selected=selected";}?>>Expert</option>                                              
                                          </select>
                                      </td>
                                                                             
                                  </tr>
                                  
                                  <?php } ?>
                                  
                              </tbody>
                          </table>
                       
                          <span class="add_skill" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          
                 
                       
                       
                       <!--//***********  for trainings and certificates--> 
                       
                       <table id="employee_qualification" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Contact details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Languages </h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>

                          <table id="language1_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                  <?php foreach($lang as $data) { ?>
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Language :</label>
                                          <input style="width: 300px;" type="text" name="language[]" id="language" value="<?php echo $data['language']; ?>" class="span6 " />
                                          <input type="hidden" name="language_id" value="<?php echo $data['language_id']; ?>" />
                                      </td>
                                      
                                      <td>   
                                          <label style="width: 250px;" class="control-label">Category :</label>
                                          <select name="language_category[]" style="width:300px">
                                              <option value="Written" <?php if($data['language_category'] == 'Written'){echo "selected=selected";}?>>Written</option>
                                              <option value="Spoken" <?php if($data['language_category'] == 'Spoken'){echo "selected=selected";}?>>Spoken</option>                                           
                                          </select>
                                      </td>
                                                                             
                                  </tr>
                                  
                                  <tr>                                       
                                      <td colspan="2">   
                                          <label style="width: 250px;" class="control-label">Skill Level :</label>
                                          <select name="language_level[]" style="width:300px">
                                              <option value="Beginner" <?php if($data['language_level'] == "Beginner"){echo "selected=selected";}?>>Beginner</option>
                                              <option value="Advanced" <?php if($data['language_level'] == "Advanced"){echo "selected=selected";}?>>Advanced</option>
                                              <option value="Expert" <?php if($data['language_level'] == "Expert"){echo "selected=selected";}?>>Expert</option>                                              
                                          </select>
                                      </td>
                                                                             
                                  </tr>
                                  
                                  <?php } ?>
                                  
                              </tbody>
                          </table>
                       
                          <span class="add_language1" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          
                       <table id="employee_qualification" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Contact details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Membership </h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>

                          <table id="membership_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                  <?php foreach($member as $data) { ?>
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Membership Title :</label>
                                          <input style="width: 300px;" type="text" name="membership_title[]" id="membership_title" value="<?php echo $data['membership_title']; ?>" class="span6 " />
                                          <input type="hidden" name="membership_id" value="<?php echo $data['membership_id']; ?>"/>
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Validity Duration of Membership :</label>
                                          <input style="width: 300px;" type="text" name="membership_duration[]" id="membership_duration" value="<?php echo $data['membership_duration']; ?>" class="span6 "/>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Name of Organisation/Institution :</label>
                                          <input style="width: 300px;" type="text" name="membership_organization_name[]" id="membership_organization_name" value="<?php echo $data['membership_institue_name']; ?>" class="span6 " />
                                      </td>
                                      
                                       <td> 
                                          <label style="width: 200px;" class="control-label">Country of Institution : </label>
                                          <select style="width: 301px;" id="membership_country" name="membership_country[]" >
                                              <option value="">-- Select Country --</option> 
                                              <?php foreach($countries as $country) { ?>
                                              <option value="<?php echo $country['country']; ?>" <?php if($data['membership_country'] == $country['country']) {echo "selected=selected";}?>><?php echo $country['country']; ?></option> 
                                              <?php } ?>
                                          </select>
                                          
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Membership Since :</label>
                                          <input style="width: 300px;" type="text" name="membership_since[]" id="membership_since" value="<?php $data['membership_since']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" />                                          
                                      </td>
                                      <td>
                                          <label style="width: 250px;" class="control-label" >Last Renewed :</label>
                                          <input style="width: 300px;" type="text" name="membership_renewed[]" id="membership_renewed" value="<?php echo $data['membership_last_renewed']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" />
                                      </td>


                                  </tr>
                                  
                                  
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Registration No :</label>
                                          <input style="width: 300px;" type="text" name="membership_reg_no[]" id="membership_reg_no" value="<?php echo $data['membership_reg_no']; ?>" class="span6 " />
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Amount of Subscription (in Rupees) :</label>
                                          <input style="width: 300px;" type="text" name="membership_subs_amount[]" id="membership_subs_amount" value="<?php echo $data['membership_subscription']; ?>" class="span6 "/>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Subscription Paid by :</label>
                                          <select name="membership_paid_by[]" style="width:300px">
                                              <option value="Individual" <?php if($data['membership_subscription_paidby'] == 'Individual') {echo "selected=selected";}?>>Individual</option>
                                              <option value="Institution" <?php if($data['membership_subscription_paidby'] == 'Institution') {echo "selected=selected";}?>>Institution</option>
                                              <option value="Third Party" <?php if($data['membership_subscription_paidby'] == 'Third Party') {echo "selected=selected";}?>>Third Party</option>                                              
                                          </select>
                                      </td>
                                                                             
                                  </tr>
                                  
                                    <?php } ?>
                                  
                              </tbody>
                          </table>
                       
                          <span class="add_membership" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                       
                       <!--//***********  for trainings and certificates--> 
                       
                       <table id="employee_qualification" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Licenses details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Licenses</h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>

                          <table id="license_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                  <?php foreach($license as $data) { ?>
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">License Title :</label>
                                          <input style="width: 300px;" type="text" name="license_title[]" id="license_title" value="<?php echo $data['license_title']; ?>" class="span6 " />
                                          <input type="hidden" name="license_id" value="<?php echo $data['license_id']; ?>">
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Name of Issuing Organisation/Instituion :</label>
                                          <input style="width: 300px;" type="text" name="license_institute[]" id="license_institute" value="<?php echo $data['license_institute']; ?>" class="span6 "/>
                                      </td>

                                  </tr>

                                  
                                  <tr>
                                       <td>   
                                          <label style="width: 250px;" class="control-label">License No :</label>
                                          <input style="width: 300px;" type="text" name="license_no[]" id="license_no" value="<?php echo $data['license_no']; ?>" class="span6 " />
                                      </td>
                                      
                                       <td>   
                                          <label style="width: 250px;" class="control-label">Issue Date :</label>
                                          <input style="width: 300px;" type="text" name="issue_date[]" id="issue_date" value="<?php echo $data['issue_date']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly />
                                      </td>
                                      
                                      <td>   
                                          <label style="width: 250px;" class="control-label">Expiry Date :</label>
                                          <input style="width: 300px;" type="text" name="expiry_date[]" id="expiry_date" value="<?php echo $data['expiry_date']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly />
                                      </td>

                                  </tr>

                                  <?php } ?>

                                  
                              </tbody>
                          </table>
                       
                          <span class="add_license" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          
                 
                       
                          
                                        
                      </div>
                   
                   <!-- ***************    ENd for qualification details******************* -->
                   
                   
                   
                   <!--***************       Start HTML For step6  (work experience Tab)      ****************-->
                   
                   <div class="step-pane active" id="step6">
                          
                          <table id="employee_contact" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Contact details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Work Experience Details</h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>
                       
                          <table id="experience_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                  <?php foreach($exp as $data) { ?>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Name of Company/Institution : </label>
                                          <input style="width: 300px;" type="text" name="business_name[]" id="business_name" value="<?php echo $data['company_name']; ?>" class="span6" />
                                          <input type="hidden" name="emp_experience_id" value="<?php echo $data['emp_experience_id']; ?>"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('business_name'); ?></h6>
                                      </td>

                                      <td>
                                          <label style="width: 250px;" class="control-label">Nature of Business : </label>
                                          <input style="width: 300px;" type="text" name="business_nature[]" id="business_nature" value="<?php echo $data['nature_of_business']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('business_nature'); ?></h6>
                                      </td> 
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Location of Company : </label>
                                          <input style="width: 300px;" type="text" name="company_location[]" id="company_location" value="<?php echo $data['company_location']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('company_location'); ?></h6>
                                      </td>

                                       <td>                                              
                                          <label style="width: 250px;" class="control-label">Company Contact No : </label>
                                          <input style="width: 300px;" type="text" name="company_contact_no[]" id="company_contact_no" class="span6" value="<?php echo $data['company_contact_no']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('company_contact_no'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Designation : </label>
                                          <input style="width: 300px;" type="text" name="designation[]" id="designation_title" value="<?php echo $data['job_title']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('designation'); ?></h6>
                                      </td>

                                       <td>                                              
                                          <label style="width: 250px;" class="control-label">Last Drawn Salary (in Rupees) : </label>
                                          <input style="width: 300px;" type="text" name="drawn_salary[]" id="drawn_salary" class="span6" value="<?php echo $data['last_drawn_salary']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('drawn_salary'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Date From :</label>
                                          <input style="width: 300px;" type="text" name="date_from[]" id="date_from" value="<?php echo $data['expereince_from_date']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('date_from'); ?></h6>
                                      </td>
                                      <td>
                                          <label style="width: 250px;" class="control-label" >Date To :</label>
                                          <input style="width: 300px;" type="text" name="date_to[]" id="date_to" value="<?php echo $data['experience_to_date']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" />
                                      </td>


                                  </tr>

                                  
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Company Address : </label>
                                              <textarea style="width: 870px; height: 100px" name="company_contact_address[]" id="company_contact_address"><?php echo $data['company_address']; ?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('company_contact_address'); ?></h6>
                                      </td> 
                                  </tr>                                  
                                  
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Reason of leaving : </label>
                                              <textarea style="width: 870px; height: 100px" name="reason_of_leaving[]" id="reason_of_leaving"><?php echo $data['reason_of_leaving']; ?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('reason_of_leaving'); ?></h6>
                                      </td> 
                                  </tr>
                                  <?php } ?>
                              </tbody>
                          </table>
                       
                          <span class="add_experience" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          
                 
                      </div>
                   
                   <!-- ***************    ENd for work experience details******************* -->
                   
                    <!--***************       Start HTML For step7 (reference Tab)       ****************-->
                   
                   <div class="step-pane active" id="step7">
                          
                          <table id="employee_reference" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Contact details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">References Details</h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>

                          <table id="reference_data" border="0" width="100%" cellpadding="7">
                              <tbody>
                                  <?php foreach($reference as $data) {
                                      //echo '<pre>';
                                      //print_r($data);
                                      ?>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Reference Name : </label>
                                          <input style="width: 300px;" type="text" name="reference_name[]" id="reference_name" value="<?php echo $data['reference_name']; ?>" class="span6" />
                                          <input type="hidden" name="reference_id" value="<?php echo $data['reference_id']; ?>"/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('reference_name'); ?></h6>
                                      </td>

                                      <td>
                                          <label style="width: 250px;" class="control-label">Name of Company : </label>
                                          <input style="width: 300px;" type="text" name="reference_company[]" id="reference_company" value="<?php echo $data['reference_company_business_name']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('reference_company'); ?></h6>
                                      </td> 
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Job Title : </label>
                                          <input style="width: 300px;" type="text" name="reference_job_title[]" id="reference_job_title" value="<?php echo $data['reference_job_title']; ?>" class="span6" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('reference_job_title'); ?></h6>
                                      </td>

                                       <td>                                              
                                          <label style="width: 250px;" class="control-label">Reference Contact No : </label>
                                          <input style="width: 300px;" type="text" name="reference_contact_no[]" id="reference_contact_no" class="span6" value="<?php echo $data['reference_contact_no']; ?>" />                                          
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('reference_contact_no'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Reference Type : </label>
                                          <select name="reference_type[]" style="width:300px;">
                                              <option value="Personal" <?php if($data['reference_type']) {echo "Personal";} ?>>Personal</option>
                                              <option value="Professional" <?php if($data['reference_type']) {echo "Professional";} ?>>Professional</option>
                                          </select>
                                      </td>
                                  </tr>
                                  
                                 
                                  <tr>
                                      <td colspan="2">
                                              <label style="width: 250px;" class="control-label">Reference Contact Address : </label>
                                              <textarea style="width: 870px; height: 100px" name="reference_contact_address[]" id="reference_contact_address"><?php echo $data['reference_address'];?></textarea>
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('reference_contact_address'); ?></h6>
                                      </td> 
                                  </tr> 
                                  <?php } ?>
                              </tbody>
                          </table>
                       
                          <span class="add_reference" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          
                 
                      </div>
                   
                   <!-- ***************    ENd for reference details******************* -->
                   
                   
                    <!--***************       Start HTML For step8 (documents Tab)       ****************-->
                   
                   <div class="step-pane active" id="step8">
                          
                          <table id="employee_reference" border="0" width="100%" cellpadding="7">
                              <tbody>

                                  <!-- ***************    STart for Contact details******************* -->
                                  <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Documents Details</h3>   
                                      </td>
                                  </tr>                                   
                              </tbody>
                          </table>
                        <?php foreach($document as $data){
                            //print_r($document);
                            ?>
                          <table id="documents_data" border="0" width="100%" cellpadding="7">
                               
                              <tbody>
                                 
                                  <input type="hidden" name="document_id" value="<?php echo $data['document_id']; ?>"/>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Document Type : </label>
                                          <select name="document_type[]" style="width:300px">
                                              <?php foreach($docs as $doc) { ?>
                                              <option value="<?php echo $doc['doc_name']; ?>" <?php if($data['document_type'] == $doc['doc_name']){echo "selected=selected";}?> ><?php echo $doc['doc_name']; ?></option>
                                              <?php } ?>
                                          </select>
                                      </td>

                                      <td>
                                          <label style="width: 250px;" class="control-label">Category : </label>
                                          <select name="document_category[]" style="width:300px">
                                              <option value="Issued" <?php if($data['category'] == 'Issued'){echo "selected=selected";}?>>Issued</option>
                                              <option value="Submitted" <?php if($data['category'] == 'Submitted'){echo "selected=selected";}?>>Submitted</option>
                                          </select>
                                      </td> 
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Document : </label>
                                          <select name="document[]" style="width:300px">
                                              <option value="Original" <?php if($data['document'] == 'Original'){echo "selected=selected";}?>>Original</option>
                                              <option value="Duplicate" <?php if($data['document'] == 'Duplicate'){echo "selected=selected";}?>>Duplicate</option>
                                          </select>
                                      </td> 

                                       <td>   
                                          <label style="width: 250px;" class="control-label">Submitted/Issued Date :</label>
                                          <input style="width: 300px;" type="text" name="document_date[]" id="document_date" value="<?php echo $data['issue_date']; ?>" class="span6 date-picker" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('document_date'); ?></h6>
                                      </td>

                                  </tr>
                                  
                                  <tr>
                                      <td>
                                          <label style="width: 250px; margin-bottom: 15px;" class="control-label">Select Document : </label>
                                          <input type="file" name="document_attach[]" value="<?php echo $data['attachment']; ?>"/>
                                          <input type="hidden" name="hidden_doc[]" value="<?php echo $data['attachment']; ?>"/>
                                      </td>
                                  </tr>
                                  
                              </tbody>
                              
                          </table>
                       
                          <span class="add_documents" style=" background: none repeat scroll 0 0 #006e6f;   border-radius: 5px;    color: white;    cursor: pointer;    float: left;    height: 30px;    line-height: 30px;    margin-left: 10px;   text-align: center;width: 100px;">
                              Add More
                          </span>
                          <?php } ?>
                 
                      </div>
                   
                   <!-- ***************    ENd for documents details******************* -->
                  
                 </div>
                   
                      </div><!--/widget-main-->
                    
                    </div><!--/widget-body-->
                    <input style="margin-top:20px; float:right" type="submit" value="Update Employee" class="btn btn-info"/>
                   </form> 
                  </div>
                </div>
              </div>

        </div><!--PAGE CONTENT ENDS-->
      </div><!--/.span-->
    </div><!--/.row-fluid-->
  </div><!--/.page-content-->   
</div><!--/.main-container-->







   
  <!-- *******  Start for Date picker  *******-->
 
  
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    
   $( document ).ready(function() {
       $("#step1").show();$("#1").css('background-color', '#299B9B');
       $("#step2").hide();
       $("#step3").hide();
       $("#step4").hide();
       $("#step5").hide();
       $("#step6").hide();
       $("#step7").hide();
       $("#step8").hide();
    });
    
    
  $(function() {
    $('.date-picker').datepicker({
      
      changeMonth:true,
      changeYear:true
      
    }); 
    
    $('.date-picker').on('changeDate', function(ev){
    $(this).datepicker('hide');
     
    });
  });

  function sameAsAbove(){    
      if($('#sameas').is(":checked")) {
            $("#temporary_address").val($("#permanent_address").val());
            $("#correspondence_address").val($("#permanent_address").val());
            
      }else{
            $("#permanent_address").val('');
            $("#correspondence_address").val('');
            
          }
    }
// on tab click show the cliked tab html and hide the all other
function show(id){
    //alert(id);
    if(id == 1){ $("#step1").show(); $("#"+id).css('background-color', '#299B9B');  }else{  $("#step1").hide(); $("#1").css('background-color', '#006E6F'); }
    if(id == 2){ $("#step2").show(); $("#"+id).css('background-color', '#299B9B');  }else{  $("#step2").hide(); $("#2").css('background-color', '#006E6F'); }
    if(id == 3){ $("#step3").show(); $("#"+id).css('background-color', '#299B9B');  }else{  $("#step3").hide(); $("#3").css('background-color', '#006E6F'); }
    if(id == 4){ $("#step4").show(); $("#"+id).css('background-color', '#299B9B');  }else{  $("#step4").hide(); $("#4").css('background-color', '#006E6F'); }
    if(id == 5){ $("#step5").show(); $("#"+id).css('background-color', '#299B9B');  }else{  $("#step5").hide(); $("#5").css('background-color', '#006E6F'); }
    if(id == 6){ $("#step6").show(); $("#"+id).css('background-color', '#299B9B');  }else{  $("#step6").hide(); $("#6").css('background-color', '#006E6F'); }
    if(id == 7){ $("#step7").show(); $("#"+id).css('background-color', '#299B9B');  }else{  $("#step7").hide(); $("#7").css('background-color', '#006E6F'); }
    if(id == 8){ $("#step8").show(); $("#"+id).css('background-color', '#299B9B');  }else{  $("#step8").hide(); $("#8").css('background-color', '#006E6F'); }
}
  
  
  $('.add_salary').click(function() {
        $('#salary_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_salary:last');
});
$('.add_facility').click(function() {
        $('#facility_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_facility:last');
});
$('.add_dependent').click(function() {
        $('#dependent_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_dependent:last');
});
$('.add_emergency').click(function() {
        $('#emergency_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_emergency:last');
});
$('.add_experience').click(function() {
        $('#experience_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_experience:last');
                              $(".date-picker").removeClass('hasDatepicker').datepicker({
        showButtonPanel     :   true
    ,   showOn              :   'button'
    ,   buttonImageOnly     :   true
    ,   buttonImage         :   '../../Image/calendar.gif'
});
});
$('.add_reference').click(function() {
        $('#reference_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_reference:last');
});
$('.add_documents').click(function() {
        $('#documents_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_documents:last');
                              $(".date-picker").removeClass('hasDatepicker').datepicker({
        showButtonPanel     :   true
    ,   showOn              :   'button'
    ,   buttonImageOnly     :   true
    ,   buttonImage         :   '../../Image/calendar.gif'
});
});
$('.add_education').click(function() {
        $('#education_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_education:last');
});

$('.add_details').click(function() {
       $('#additional_details:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_details:last');
                              $(".date-picker").removeClass('hasDatepicker').datepicker({
        showButtonPanel     :   true
    ,   showOn              :   'button'
    ,   buttonImageOnly     :   true
    ,   buttonImage         :   '../../Image/calendar.gif'
});
                            
});



$('.add_medical').click(function() {
        $('#medcal_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_medical:last');
});
$('.add_training').click(function() {
        $('#training_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_training:last');
});
$('.add_skill').click(function() {
        $('#skill_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_skill:last');
});
$('.add_language1').click(function() {
        $('#language1_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_language1:last');
});
$('.add_license').click(function() {
        $('#license_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_license:last');
});
$('.add_membership').click(function() {
        $('#membership_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_membership:last');
                              $(".date-picker").removeClass('hasDatepicker').datepicker({
        showButtonPanel     :   true
    ,   showOn              :   'button'
    ,   buttonImageOnly     :   true
    ,   buttonImage         :   '../../Image/calendar.gif'
});
});


//********** get designation on change of department


function  getDesignations(dept_id){
    //alert(dept_id);
    $.ajax({
                  type: "GET",
                  url: "<?php echo base_url(); ?>hris/desigantion_by_department_id/?dept_id="+dept_id,
                  success: function(html){                    
                  $("#record_designation").html(html);
                 // $("#reporting_to").html(html);
                  }
              });
  }

$(document).ready(function(){
    $('#record_company').change(function(){
           
            var company = this.value;
           //alert(company);
            $.ajax({
                    type: "GET",
                    url: "<?php echo site_url() ?>hris/get_ajax_salary/?company_id="+company,
                    success: function(html){
                        $("#disp").html(html);
                    }
                        
                   
                });
                return false;
                
                
        });
});


$(document).ready(function(){
    $('#disp').change(function(){
           
            var dept_id = this.value;
           //alert(company);
            $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>hris/desigantion_by_department_id/?dept_id="+dept_id,
                        success: function(html){
                        
                           $.ajax({
                    type: "GET",
                    url: "<?php echo base_url(); ?>hris/grade_by_department_id/?dept_id="+dept_id,
                    success: function(html2){
                        $("#record_grades").html(html2);
                       
                    }
                        
                   
                });
                        $("#record_designation").html(html);
                    }
                        
                   
                });
                return false;
                
                
        });
});

  //----  Fields Formats ----\\
  jQuery(function($){
    $("#cnic").mask("99999-9999999-9");          
    $("#d_cnic").mask("99999-9999999-9");          
    $("#mobile_1").mask("9999-9999999");    
    $("#mobile_2").mask("9999-9999999");        
    $("#dependent_cnic").mask("99999-9999999-9");    
    $("#nominee_cnic").mask("99999-9999999-9");    
    $("#nominee_contact").mask("9999-9999999");      
  });

    $('#employeeform').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            email_1: { 
                email:true
            },
            email_2: { 
                email:true
            }
        },                
        highlight: function(e) {
            $(e).closest('.control-group').removeClass('info').addClass('error');
        },
        submitHandler: function(form) {
            document.departmentForm.action = "<?php //echo base_url(); ?>hris/add_department";
            document.departmentForm.submit();
        }
    });
  
</script>


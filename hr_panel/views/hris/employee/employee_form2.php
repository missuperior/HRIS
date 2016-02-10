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
                echo validation_errors();
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
              <div style="width:11.5%; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Employment</h4>
              </div>
            
              <div style="width:10%; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Personal</h4>
              </div>
              
              <div style="width:10%; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Contact</h4>
              </div>
              
              <div style="width:10%; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Medical</h4>
              </div>
              
              <div style="width:14.5%; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Qualification</h4>
              </div>
              
              <div style="width:14.5%; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Work Experience</h4>
              </div>
              
              <div style="width:10%; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">References</h4>
              </div>
              
              <div style="width:10%; float: left; color: white; background-color:  #006E6F; font-weight: bold; cursor: pointer; " class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Documents</h4>
              </div>
              
              <!-- ENd Tabs Headings -->  
              
            <div class="widget-box" style="margin-top:40px;">                          
<!--              <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Employee Personal Information</h4>
              </div>-->

              <div class="widget-body">
                <div class="widget-main">
                  <div class="row-fluid">
                    <?php
                    $attributes = array('id' => 'employeeform', 'onsubmit' => 'return employeeRecord();');
                    echo form_open_multipart('hris/add_employee_record', $attributes); 
                    ?>
                     
                    <div class="step-pane active" id="step1">
<!--                      <div style="text-align: center;">
                        <img src="<?php echo base_url(); ?>assets/images/w_1.png" border="0" />
                      </div>-->
                        <table id="employee_contact" border="0" width="100%" cellpadding="7">
                          <tbody>
                            <tr>
                              <td colspan="2">
                                <h3 style="margin-top: 20px" class="lighter block green">Self</h3>   
                              </td>
                            </tr>                          
                                                        
                            <tr>
                                        <td>
                                        <label style="width: 130px;" class="control-label">Employee Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="emp_record_name" id="emp_record_name" value="<?php echo set_value('emp_record_name'); ?>" class="span6" />
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('emp_record_name'); ?></h6>
                                      </td>
                                      
                                      <td>                                              
                                        <label style="width: 150px;" class="control-label">Employee ID / Code : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="employee_code" id="employee_code" class="span6" value="<?php echo set_value('employee_code'); ?>" />
                                        <h6 style="color:red; margin: 0px;" id="code_error"></h6>
                                        <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_code'); ?></h6>
                                      </td>
                                      
                                    </tr>

                                    <tr>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Department: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="record_department" name="record_department">
                                          <option selected="selected" value="">-- Select Department --</option>                                                        
                                            <?php foreach ($department as $row){?>
                                            <option <?php if(set_value('record_department')==$row['department_id']) echo 'selected="selected"';?> value="<?php echo $row['department_id']?>"><?php echo $row['department_name']?></option> 
                                            <?php }?>																			
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('record_department'); ?></h6>
                                      </td>
                                      <td>   
                                        <label style="width: 200px;" class="control-label">Company / Institute Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="record_company" name="record_company">                                 
                                          <option value="">-- Select Company --</option>
                                          <?php foreach ($company as $row){?>
                                              <option <?php if(set_value('record_company')==$row['company_id']) echo 'selected="selected"';?> value="<?php echo $row['company_id']?>"><?php echo $row['company_name']?></option> 
                                          <?php }?>																				
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('record_company'); ?></h6>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Designation: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="record_designation" name="record_designation">
                                            <option value="">-- Select Designation --</option>
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('record_designation'); ?></h6>
                                      </td>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Grade:</label>
                                        <input style="width: 300px;" type="text" name="record_grade" id="record_grade" class="span6" value="<?php echo set_value('record_grade'); ?>" />
                                      </td>
                                    </tr>
                                    
                                    <tr>
                                      <td>  
                                        <label style="width: 190px;" class="control-label">Additional Designation:</label>
                                        <select style="width: 301px;" id="reporting_to" name="reporting_to">
                                          <option value="">-- Select Designation --</option>																			
                                        </select>
                                      </td>
                                      <td>  
                                        <label style="width: 200px;" class="control-label">Campus:<img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="campus" name="campus">                                 
                                          <option value="">-- Select Campus --</option>
                                            <?php foreach ($campus as $row){?>
                                            <option value="<?php echo $row['campus_id']?>"><?php echo $row['campus_name']?></option> 
                                            <?php }?>																				
                                        </select>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>  
                                        <label style="width: 200px;" class="control-label">Employee Type: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="employee_type" name="employee_type">
                                          <option value="">-- Select Type --</option>                                          
                                          <option<?php if(set_value('employee_type')=='Permanent') echo 'selected="selected"';?> value="Permanent">Permanent</option>																				
                                          <option <?php if(set_value('employee_type')=='Contractual') echo 'selected="selected"';?>value="Contractual">Contractual</option>																				
                                          <option <?php if(set_value('employee_type')=='Temporary') echo 'selected="selected"';?>value="Temporary">Temporary</option>																					
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_type'); ?></h6>
                                      </td> 
                                      <td>  
                                        <label style="width: 200px;" class="control-label">Employee Status: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="employee_status" name="employee_status">
                                          <option value="">-- Select Status --</option>                                          
                                          <option <?php if(set_value('employee_status')=='Probationary') echo 'selected="selected"';?>value="Probationary">Probationary</option>																				
                                          <option <?php if(set_value('employee_status')=='Confirmed') echo 'selected="selected"';?>value="Confirmed">Confirmed</option>																				
                                          <option <?php if(set_value('employee_status')=='On Trial') echo 'selected="selected"';?>value="On Trial">On Trial</option>																					
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_status'); ?></h6>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Shift:</label>
                                        <select style="width: 301px;" id="shift" name="shift">
                                          <option value="">-- Select Shift --</option>
                                          <option <?php if(set_value('shift')=='Morning') echo 'selected="selected"';?>value="Morning">Morning</option>
                                          <option <?php if(set_value('shift')=='Evening') echo 'selected="selected"';?>value="Evening">Evening</option>																				
                                        </select>
                                      </td> 
                                      <td>
                                        <label style="width: 250px;" class="control-label">Social Security/Health Insurance #:</label>
                                        <input style="width: 300px;" type="text" name="social_security" id="social_security" value="<?php echo set_value('social_security'); ?>" class="span6" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Joining Date: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="joining_date" id="joining_date" value="<?php echo set_value('joining_date'); ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('joining_date'); ?></h6>
                                      </td>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Confirmation Date:</label>
                                        <input style="width: 300px;" type="text" name="confirmation_date" id="confirmation_date" value="<?php echo set_value('confirmation_date'); ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Starting Salary: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="record_starting_salary" id="record_starting_salary" value="<?php echo set_value('record_starting_salary'); ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('starting_salary'); ?></h6>
                                      </td>                                      
                                      <td>
                                        <label style="width: 130px;" class="control-label">Current Salary: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="current_salary" id="current_salary" value="<?php echo set_value('current_salary'); ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('current_salary'); ?></h6>
                                      </td>
                                    </tr>
                            
                            

<!--                            <tr>
                              <td>
                                <label style="width: 330px;" class="control-label">Date of Birth: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                <input style="width: 300px;" type="text" name="employee_dob" id="employee_dob" maxlength="10" value="<?php echo set_value('employee_dob'); ?>" class="span6" placeholder="YYYY-MM-DD" maxlength="10"/>
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_dob'); ?></h6>
                              </td>
                              <td>
                               <label style="width: 130px;" class="control-label">Place of Birth:</label>
                               <select style="width: 301px;" id="place_birth" name="place_birth">                                 
                                  <option value="">-- Select City --</option>
                                  <?php foreach ($cities as $row){?>
                                      <option value="<?php echo $row['city_id']?>"><?php echo $row['city_name']?></option> 
                                  <?php }?>																				
                                </select>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <label style="width: 130px;" class="control-label">Gender: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                <label class="blue" style="float: left; margin-right: 10px;">
                                  <input name="gender" value="male" type="radio" checked="checked" />
                                  <span class="lbl"> Male </span>
                                </label>
                                <label class="blue">
                                  <input name="gender" value="female" type="radio" />
                                  <span class="lbl"> Female </span>
                                </label>
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('gender'); ?></h6>
                              </td>
                              <td>
                                <label style="width: 130px;" class="control-label">Marital Status:</label>
                                <label class="blue" style="float: left; margin-right: 10px;">
                                  <input name="marital_status" id="marital_status" value="single" type="radio" />
                                  <span class="lbl"> Single </span>
                                </label>
                                <label class="blue">
                                  <input name="marital_status" id="marital_status" value="married" type="radio" />
                                  <span class="lbl"> Married</span>
                                </label>
                              </td>
                            </tr>

                            <tr>
                              <td>
                               <label style="width: 130px;" class="control-label">Blood Group :</label>
                               <select style="width: 301px;" id="blood_group" name="blood_group">
                                  <option value="">-- Select Blood Group  --</option>
                                  <option value="A+">A+</option>																				
                                  <option value="B+">B+</option>																				
                                  <option value="A-">A-</option>																				
                                  <option value="B-">B-</option>																				
                                  <option value="AB+">AB+</option>																				
                                  <option value="AB-">AB-</option>																				
                                  <option value="O+">O+</option>																				
                                  <option value="O-">O-</option>																				
                                </select>
                              </td>
                              <td>
                                <label style="width: 130px;" class="control-label">Religion:</label>
                                <select style="width: 301px;" id="religion" name="religion">
                                  <option value="">-- Select Religion  --</option>
                                  <option value="Islam">Islam</option>																				
                                  <option value="Christian">Christianity</option>																				
                                  <option value="Hinduism">Hinduism</option>																				
                                  <option value="Jews">Jews</option>																				
                                  <option value="Sikhism">Sikhism</option>																				
                                  <option value="Budhist">Budhist</option>																				
                                </select>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <label style="width: 180px;" class="control-label">Highest Qualification: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                <select style="width: 301px;" id="highest_qualification" name="highest_qualification">
                                  <option value="">-- Select Qualification  --</option>
                                  <option value="Middle">Middle</option>																				
                                  <option value="Matriculation">Matriculation</option>																				
                                  <option value="Intermediate">Intermediate</option>																				
                                  <option value="Bachelor">Bachelor</option>																				
                                  <option value="BS">BS</option>																				
                                  <option value="BS">BS(Hons)</option>																				
                                  <option value="Masters">Masters</option>																				
                                  <option value="MS">MS</option>																					
                                  <option value="M.Phil">M.Phil</option>																				
                                  <option value="Phd">Phd</option>																				
                                </select>
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('highest_qualification'); ?>
                              </td>
                              <td>
                                <label style="width: 130px;" class="control-label">CNIC: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                <input style="width: 300px;" type="text" name="emp_cnic" id="emp_cnic" value="<?php echo set_value('emp_cnic'); ?>" class="span6" placeholder="e.g: 30605-1234567-8" />
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('emp_cnic'); ?></h6>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                <label style="width: 130px;" class="control-label">Employee Picture:</label>
                                <input style="width: 300px;" type="file" name="emp_pic" id="" class="span6" />
                              </td>
                            </tr>

                            <tr>
                              <td colspan="2">
                                <h3 style="margin-top: 20px" class="lighter block green">Contact Information</h3>   
                              </td>                            
                            </tr>

                            <tr>
                              <td>
                                <label style="width: 130px;" class="control-label">Mailing Address:</label>
                                <input style="width: 300px;" type="text" name="employee_address" id="employee_address" value="<?php echo set_value('employee_address'); ?>" class="span6" />
                              </td>
                              <td>
                                <label style="width: 130px;" class="control-label">Type of Address :</label>
                                <select style="width: 301px;" id="mailing_type" name="mailing_type">
                                  <option value="">-- Select Type  --</option>
                                  <option value="Residential">Residential</option>																				
                                  <option value="Office">Office</option>																				
                                </select>
                              </td>
                            </tr>

                            <tr>
                              <td colspan="2">
                                <label style="width: 130px;" class="control-label">Mailing Contact#:</label>
                                <input style="width: 300px;" type="text" name="mailing_contact" id="mailing_contact" value="<?php echo set_value('mailing_contact'); ?>" class="span6" placeholder="e.g: 0423-1234567" />
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <label style="width: 150px;" class="control-label">Permanent Address: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                <input style="width: 300px;" type="text" name="permanent_address" id="permanent_address" value="<?php echo set_value('permanent_address'); ?>" class="span6" />
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('permanent_address'); ?></h6>
                              </td>
                              <td>
                                <label style="width: 130px;" class="control-label">Type of Address :</label>
                                <select style="width: 301px;" id="permanent_type" name="permanent_type">
                                  <option value="">-- Select Type  --</option>
                                  <option value="Residential">Residential</option>																				
                                  <option value="Office">Office</option>																				
                                </select>
                              </td>
                            </tr>

                            <tr>
                              <td colspan="2">
                                <label style="width: 230px;" class="control-label">Permanent Address Contact #: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                <input style="width: 300px;" type="text" name="permanent_contact" id="permanent_contact" value="<?php echo set_value('permanent_contact'); ?>" class="span6" placeholder="e.g: 0423-1234567" />
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('permanent_contact'); ?></h6>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                <label style="width: 230px;" class="control-label">Mobile # 1: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                <input style="width: 300px;" type="text" name="mobile_1" id="mobile_1" value="<?php echo set_value('mobile_1'); ?>" class="span6" placeholder="e.g: 0333-1234567" />
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('mobile_1'); ?></h6>
                              </td>
                              <td>
                                <label style="width: 300px;" class="control-label">Mobile # 2:</label>
                                <input style="width: 300px;" type="text" name="mobile_2" id="mobile_2" value="<?php echo set_value('mobile_2'); ?>" class="span6" placeholder="e.g: 0333-1234567" />
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('mobile_2'); ?></h6>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <div class="control-group">
                                  <label class="control-label" for="form-field-1">Email 1 :</label>
            
                                  <div class="controls">
                                    <input style="width: 300px;" type="text" name="email_1" id="email_1" value="<?php echo set_value('email_1'); ?>" class="span6" />
                                    <h6 style="color:red; margin: 0px;"><?php echo form_error('email_1'); ?></h6>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="control-group">
                                  <label class="control-label" for="form-field-1">Email 2 :</label>
            
                                  <div class="controls">
                                    <input style="width: 300px;" type="text" name="email_2" id="email_2" value="<?php echo set_value('email_2'); ?>" class="span6" />
                                    <h6 style="color:red; margin: 0px;"><?php echo form_error('email_2'); ?></h6>
                                   </div>
                                </div>
                               </td>
                            </tr>

                            <tr>
                              <td colspan="2">
                                <label style="width: 230px;" class="control-label">Emergency Contact #: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                <input style="width: 300px;" type="text" name="emergency_contact" id="emergency_contact" value="<?php echo set_value('emergency_contact'); ?>" class="span6"placeholder="e.g: 0333-1234567 OR 0423-1234567" />
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('emergency_contact'); ?></h6>
                              </td>
                            </tr>                            
                            
                            <tr>
                              <td colspan="2">
                                <div id="cloned_input"></div>
                              </td>
                            </tr>-->
                            
                          </tbody>
                        </table>
                      
                      <h3 style="margin-top: 20px" class="lighter block green">Family Bio Data of Dependants</h3>
                      <table id="family_data" border="0" width="100%" cellpadding="7">
                          <tbody>

                            <tr>
                              <td>
                                <label style="width: 150px;" class="control-label">Dependant Name:</label>
                                <input style="width: 300px; float: left;" type="text" name="dependent_name[]" id="dependent_name" value="<?php echo set_value('dependent_name'); ?>" class="span6" />
                              </td>
                              <td>
                                <label style="width: 260px;" class="control-label">Dependant Father/Husband Name:</label>
                                <input style="width: 300px; float: left;" type="text" name="dependent_father_name[]" id="dependent_father_name" value="<?php echo set_value('dependent_father_name'); ?>" class="span6" />
                              
                                
                              </td>                             
                            </tr>
                            
                            <tr>
                              <td>
                                <label style="width: 150px;" class="control-label">Dependant CNIC:</label>
                                <input style="width: 300px; float: left;" type="text" name="dependent_cnic[]" id="dependent_cnic" value="<?php echo set_value('dependent_cnic'); ?>" class="span6" placeholder="e.g: 30605-1234567-8" />
                              </td>
                              <td>
                                <label style="width: 200px;" class="control-label">Relationship with Employee:</label>
                               <select style="width: 301px;" id="dependent_relation" name="dependent_relation[]">
                                  <option value="">-- Select Relationship --</option>
                                  <option value="Father">Father</option>
                                  <option value="Mother">Mother</option>
                                  <option value="Brother">Brother</option>																				
                                  <option value="Sister">Sister</option>																				
                                  <option value="Sonr">Son</option>																				
                                  <option value="Daughter">Daughter</option>																				
                                  <option value="Spouse">Spouse</option>																				
                                  <option value="Other">Other</option>																				
                                </select>
                              </td>
                            </tr>
                            
<!--                            <tr>
                              <td></td>
                              <td><input type="text" id="dep_other" name="dep_other[]" placeholder="Dependent Other Relation" /></td>
                            </tr>-->
                            
                            <tr>
                              <td colspan="2">
                                <hr/>                                
                              </td>
                            </tr>
                            
                          </tbody>
                        </table>
                      
                        <span class="add_family" style="float: left; margin-top: -20px; cursor: pointer; color: #567f48;">
                          Add More
                        </span>

                      <h3 style="margin-top: 20px" class="lighter block green">Next of Kin</h3> 
                      
                      <table id="nominee_data" border="0" width="100%" cellpadding="7">
                          <tbody>

                            <tr>
                              <td>
                                <label style="width: 150px;" class="control-label">Nominee Name:</label>
                                <input style="width: 300px;" type="text" name="nominee_name[]" id="nominee_name" value="<?php echo set_value('nominee_name'); ?>" class="span6" />
                              </td>
                              <td>   
                                <label style="width: 260px;" class="control-label">Nominee Father/Husband Name:</label>
                                <input style="width: 300px;" type="text" name="nominee_father_name[]" id="nominee_name" value="<?php echo set_value('nominee_name'); ?>" class="span6" />
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <label style="width: 150px;" class="control-label">Nominee CNIC:</label>
                                <input style="width: 300px;" type="text" name="nominee_cnic[]" id="nominee_cnic" value="<?php echo set_value('nominee_cnic'); ?>" class="span6" placeholder="e.g: 30605-1234567-8" />
                              </td>
                              <td>
                               <label style="width: 270px;" class="control-label">Nominee Relationship with Employee:</label>
                               <select style="width: 301px;" id="nominee_reltion" name="nominee_relation[]">
                                  <option value="">-- Select Relationship --</option>
                                  <option value="Father">Father</option>
                                  <option value="Mother">Mother</option>
                                  <option value="Brother">Brother</option>																				
                                  <option value="Sister">Sister</option>																				
                                  <option value="Sonr">Son</option>																				
                                  <option value="Daughter">Daughter</option>																				
                                  <option value="Spouse">Spouse</option>																				
                                  <option value="Other">Other</option>																				
                                </select>
                              </td>
                            </tr>
                            
<!--                            <tr>
                              <td></td>
                              <td><input type="text" id="nominee_other" name="nominee_other[]" placeholder="Nominee Other Relation" /></td>
                            </tr>                            -->
                            
                            <tr>
                              <td colspan="2">
                                <hr/>                                
                              </td>
                            </tr>
                            
                          </tbody>
                        </table>
                      
                        <span class="add_nominee" style="float: left; margin-top: -20px; cursor: pointer; color: #567f48;">
                          Add More
                        </span>
                        
                      <span id="next_1" style="float: right;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Next</span>  
                      
                      </div>

                      <div class="step-pane" id="step2">                        
<!--                      <div style="text-align: center;">
                        <img src="<?php echo base_url(); ?>assets/images/w_2.png" border="0" />
                      </div>-->

                        <div class="row-fluid">
                          <h3 style="margin-top: 20px" class="lighter block green">Education Background </h3>   
                              
                          <table id="education-table" class="table-bordered" style="border: none;">
                            <tbody>
                            <th>Degree Title</th>
                            <th>Institute</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Year</th>
                            <th>Grade/CGPA</th>
                            <th>Division</th>
                            <th>Major Subjects</th>
                           
                            <?php for($i=0; $i<=7; $i++){ ?>
                            <tr class="degree_<?php echo $i;?>">
                              <td><input style="width: 130px;" type="text" name="degree_title[]" id="" class="span6" />
                              </td>
                              <td><input style="width: 130px;" type="text" name="degree_institute[]" id="" class="span6" />
                              </td>
                              <td><input style="width: 80px;" type="text" name="degree_from[]" id="" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                              </td>
                              <td><input style="width: 80px;" type="text" name="degree_to[]" id="" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                              </td>
                              <td><input style="width: 50px;" type="text" name="degree_year[]" id="" class="span6" />
                              </td>
                              <td><input style="width: 90px;" type="text" name="degree_grade[]" id="" class="span6" />
                              </td>
                              <td><input style="width: 60px;" type="text" name="degree_division[]" id="" class="span6" />
                              </td>
                              <td><input style="width: 115px;" type="text" name="degree_subjects[]" id="" class="span6" />
                              </td>
                            </tr>
                            <tr class="rowMore_<?php echo $i; ?>">
                              <td colspan="8">
                                <span class="addDegree_<?php echo $i; ?>" style="float: right; cursor: pointer; color: #567f48;">
                                  Add More
                                </span>                                
                              </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                          
                          <br /><br /><br />
                         
                          <h3 style="margin-top: 20px" class="lighter block green">Training Courses / Certifications</h3>   
                         <table id="course-table" class="table-bordered" style="border: none;">
                            <tbody>
                            <th>Title</th>
                            <th>Institute</th>
                            <th>Address</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Duration</th>
                            <th>City</th>
                            
                            <?php for($i=0; $i<=7; $i++){ ?>
                            <tr class="course_<?php echo $i;?>">
                              <td><input style="width: 120px;" type="text" name="course_title[]" id="" class="span6" />
                              </td>
                              <td><input style="width: 120px;" type="text" name="course_institute[]" id="" class="span6" />
                              </td>
                              <td><input style="width: 140px;" type="text" name="course_address[]" id="" class="span6" />
                              </td>
                              <td><input style="width: 80px;" type="text" name="course_from[]" id="" class="span6" placeholder="DD-MM-YYYY" maxlength="10"/>
                              </td>
                              <td><input style="width: 80px;" type="text" name="course_to[]" id="" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                              </td>
                              <td><input style="width: 75px;" type="text" name="course_duration[]" id="" class="span6" />
                              </td>
                              <td><select style="width: 125px;" id="" name="course_city[]">
                                    <option value="">--- City ---</option>
                                    <?php foreach ($cities as $row){?>
                                      <option value="<?php echo $row['city_id']?>"><?php echo $row['city_name']?></option> 
                                    <?php }?>																				
                                  </select>
                              </td>
                            </tr>
                            <tr class="rowCourse_<?php echo $i; ?>">
                              <td colspan="7">
                                <span class="addCourse_<?php echo $i; ?>" style="float: right; cursor: pointer; color: #567f48;">
                                  Add More
                                </span>
                              </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                          
                          <br /><br />
                          
                          <span id="next_2" style="float: right;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Next</span>  
                          <span id="prev_2" style="float: left;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Prev</span>  

                         </div>
                            </div>

                            <div class="step-pane" id="step3">
<!--                            <div style="text-align: center;">
                              <img src="<?php echo base_url(); ?>assets/images/w_3.png" border="0" />
                            </div>-->
                              
                              <table id="sample-table-2" border="0" width="100%" cellpadding="7">
                                  <tbody>
                                    <tr>
                                      <td colspan="2">
                                        <h3 style="margin-top: 20px" class="lighter block green">Job Background / Working Experience </h3>   
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Company Name:</label>
                                        <input style="width: 300px;" type="text" name="company_name" id="company_name" class="span6" />
                                        </td>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Company Location:</label>
                                        <select style="width: 301px;" id="company_location" name="company_location">                                 
                                          <option value="">-- Select City --</option>
                                          <?php foreach ($cities as $row){?>
                                              <option value="<?php echo $row['city_id']?>"><?php echo $row['city_name']?></option> 
                                          <?php }?>																				
                                        </select>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 200px;" class="control-label">Nature of Business:</label>
                                        <input style="width: 300px;" type="text" name="nature_of_business" id="nature_of_business" class="span6" />
                                      </td>
                                      <td>   
                                        <label style="width: 130px;" class="control-label">Job Title:</label>
                                        <input style="width: 300px;" type="text" name="job_title" id="job_title" class="span6" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">From Date:</label>
                                        <input style="width: 300px;" type="text" name="job_from" id="job_from" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                      </td>
                                      <td>
                                        <label style="width: 130px;" class="control-label">To Date:</label>
                                        <input style="width: 300px;" type="text" name="job_to" id="dob" value="<?php echo set_value('dob'); ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                      </td>
                                     </tr>

                                    <tr>
                                      <td colspan="2">
                                        <label style="width: 140px;" class="control-label">Reason of Leaving:</label>
                                        <input style="width: 300px;" type="text" name="reason_for_leaving" id="reason_for_leaving" class="span6" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 140px;" class="control-label">Starting Salary:</label>
                                        <input style="width: 300px;" type="text" name="starting_salary" id="starting_salary" class="span6" onkeyup="this.value=formatCurrency(this.value);" />
                                      </td>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Last Drawn Salary:</label>
                                        <input style="width: 300px;" type="text" name="last_drawn_salary" id="last_drawn_salary" class="span6" onkeyup="this.value=formatCurrency(this.value);" />
                                      </td>
                                    </tr>
                                    
                                  </tbody>
                                </table>
                              
                              <h3 style="margin-top: 20px" class="lighter block green">References</h3>   

                              <table id="reference_data" border="0" width="100%" cellpadding="7">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Reference Name:</label>
                                        <input style="width: 300px;" type="text" name="reference_name[]" id="reference_name" class="span6" />
                                      </td>
                                      <td>   
                                        <label style="width: 200px;" class="control-label">Company / Business Name:</label>
                                        <input style="width: 300px;" type="text" name="business_name[]" id="business_name" class="span6" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Job Title:</label>
                                        <input style="width: 300px;" type="text" name="reference_job_title[]" id="reference_job_title" class="span6" />
                                      </td>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Reference Type:</label>
                                        <select style="width: 301px;" id="reference_type" name="reference_type[]">
                                          <option value="">-- Select Type --</option>
                                          <option value="Personal">Personal</option>																				
                                          <option value="Professional">Professional</option>																				
                                        </select>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Address:</label>
                                        <input style="width: 300px;" type="text" name="reference_address[]" id="reference_address" class="span6" />
                                      </td>
                                      <td>   
                                        <label style="width: 200px;" class="control-label">Contact #:</label>
                                        <input style="width: 300px;" type="text" name="reference_contact[]" id="reference_contact" class="span6" placeholder="e.g: 0333-1234567 OR 0423-1234567" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td colspan="2">
                                        <label style="width: 130px;" class="control-label">Email:</label>
                                        <input style="width: 300px;" type="text" name="reference_email[]" id="reference_email" class="span6" />
                                      </td>
                                    </tr>
                                    
                                    <tr>
                                      <td colspan="2">
                                        <hr/>
                                      </td>
                                    </tr>
                                    
                                  </tbody>
                                </table>
                              
                              <span class="add_reference" style="float: left; margin-top: -20px; cursor: pointer; color: #567f48;">
                                Add More
                              </span>
                              
                              <h3 style="margin-top: 20px" class="lighter block green">Documents</h3>   

                              <table id="document_data" border="0" width="100%" cellpadding="7">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Document Title:</label>
                                        <input style="width: 300px;" type="text" name="document_title[]" id="document_title" class="span6" />
                                      </td>
                                      <td>   
                                        <label style="width: 200px;" class="control-label">Document Type:</label>
                                        <select style="width: 301px;" id="document_type" name="document_type[]">
                                          <option value="">-- Select Type --</option>
                                          <option value="Experience Letter">Experience Letter</option>																				
                                          <option value="CV">CV</option>																				
                                        </select>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td colspan="2">
                                        <label style="width: 130px;" class="control-label">Place of Issue:</label>
                                        <input style="width: 300px;" type="text" name="place_of_issue[]" id="place_of_issue" class="span6" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Issue Date:</label>
                                        <input style="width: 300px;" type="text" name="issue_date[]" id="issue_date" value="<?php echo set_value('dob'); ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                      </td>                                      
                                      <td>
                                        <label style="width: 130px;" class="control-label">Expiry Date:</label>
                                        <input style="width: 300px;" type="text" name="expiry_date[]" id="expiry_date" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />

                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Attachment:</label>
                                        <input style="width: 300px;" type="file" name="document_attch[]" id="document_attch" class="span6" />
                                      </td>
                                      <td>   
                                        <label style="width: 200px;" class="control-label">Description:</label>
                                        <textarea rows="5" cols="30" name="description[]"></textarea>  
                                      </td>
                                    </tr>
                                    
                                    <tr>
                                      <td colspan="2">
                                        <hr/>
                                      </td>
                                    </tr>
                                    
                                  </tbody>
                                </table>
                                
                              <span class="add_document" style="float: left; margin-top: -20px; cursor: pointer; color: #567f48;">
                                Add More
                              </span>
                              <br/><br/>
                              
                              <span id="next_3" style="float: right;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Next</span>  
                              <span id="prev_3" style="float: left;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Prev</span>  

                            </div>

                            <div class="step-pane" id="step4">
<!--                              <div style="text-align: center;">
                                <img src="<?php echo base_url(); ?>assets/images/w_4.png" border="0" />
                              </div>-->
                              <table id="sample-table-2" border="0" width="100%" cellpadding="7">
                                  <tbody>
                                    <tr>
                                      <td colspan="2">
                                        <h3 style="margin-top: 20px" class="lighter block green">Employment Record</h3>   
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>                                              
                                        <label style="width: 150px;" class="control-label">Employee ID / Code : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="employee_code" id="employee_code" class="span6" value="<?php echo set_value('employee_code'); ?>" />
                                        <h6 style="color:red; margin: 0px;" id="code_error"></h6>
                                        <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_code'); ?></h6>
                                      </td>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Employee Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="emp_record_name" id="emp_record_name" value="<?php echo set_value('emp_record_name'); ?>" class="span6" />
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('emp_record_name'); ?></h6>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Department: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="record_department" name="record_department">
                                          <option selected="selected" value="">-- Select Department --</option>                                                        
                                            <?php foreach ($department as $row){?>
                                            <option <?php if(set_value('record_department')==$row['department_id']) echo 'selected="selected"';?> value="<?php echo $row['department_id']?>"><?php echo $row['department_name']?></option> 
                                            <?php }?>																			
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('record_department'); ?></h6>
                                      </td>
                                      <td>   
                                        <label style="width: 200px;" class="control-label">Company / Institute Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="record_company" name="record_company">                                 
                                          <option value="">-- Select Company --</option>
                                          <?php foreach ($company as $row){?>
                                              <option <?php if(set_value('record_company')==$row['company_id']) echo 'selected="selected"';?> value="<?php echo $row['company_id']?>"><?php echo $row['company_name']?></option> 
                                          <?php }?>																				
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('record_company'); ?></h6>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Designation: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="record_designation" name="record_designation">
                                            <option value="">-- Select Designation --</option>
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('record_designation'); ?></h6>
                                      </td>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Grade:</label>
                                        <input style="width: 300px;" type="text" name="record_grade" id="record_grade" class="span6" value="<?php echo set_value('record_grade'); ?>" />
                                      </td>
                                    </tr>
                                    
                                    <tr>
                                      <td>  
                                        <label style="width: 140px;" class="control-label">Reporting To:</label>
                                        <select style="width: 301px;" id="reporting_to" name="reporting_to">
                                          <option value="">-- Select Designation --</option>																			
                                        </select>
                                      </td>
                                      <td>  
                                        <label style="width: 200px;" class="control-label">Campus:<img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="campus" name="campus">                                 
                                          <option value="">-- Select Campus --</option>
                                            <?php foreach ($campus as $row){?>
                                            <option value="<?php echo $row['campus_id']?>"><?php echo $row['campus_name']?></option> 
                                            <?php }?>																				
                                        </select>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>  
                                        <label style="width: 200px;" class="control-label">Employee Type: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="employee_type" name="employee_type">
                                          <option value="">-- Select Type --</option>                                          
                                          <option<?php if(set_value('employee_type')=='Permanent') echo 'selected="selected"';?> value="Permanent">Permanent</option>																				
                                          <option <?php if(set_value('employee_type')=='Contractual') echo 'selected="selected"';?>value="Contractual">Contractual</option>																				
                                          <option <?php if(set_value('employee_type')=='Temporary') echo 'selected="selected"';?>value="Temporary">Temporary</option>																					
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_type'); ?></h6>
                                      </td> 
                                      <td>  
                                        <label style="width: 200px;" class="control-label">Employee Status: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <select style="width: 301px;" id="employee_status" name="employee_status">
                                          <option value="">-- Select Status --</option>                                          
                                          <option <?php if(set_value('employee_status')=='Probationary') echo 'selected="selected"';?>value="Probationary">Probationary</option>																				
                                          <option <?php if(set_value('employee_status')=='Confirmed') echo 'selected="selected"';?>value="Confirmed">Confirmed</option>																				
                                          <option <?php if(set_value('employee_status')=='On Trial') echo 'selected="selected"';?>value="On Trial">On Trial</option>																					
                                        </select>
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_status'); ?></h6>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Shift:</label>
                                        <select style="width: 301px;" id="shift" name="shift">
                                          <option value="">-- Select Shift --</option>
                                          <option <?php if(set_value('shift')=='Morning') echo 'selected="selected"';?>value="Morning">Morning</option>
                                          <option <?php if(set_value('shift')=='Evening') echo 'selected="selected"';?>value="Evening">Evening</option>																				
                                        </select>
                                      </td> 
                                      <td>
                                        <label style="width: 250px;" class="control-label">Social Security/Health Insurance #:</label>
                                        <input style="width: 300px;" type="text" name="social_security" id="social_security" value="<?php echo set_value('social_security'); ?>" class="span6" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>   
                                        <label style="width: 140px;" class="control-label">Joining Date: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="joining_date" id="joining_date" value="<?php echo set_value('joining_date'); ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('joining_date'); ?></h6>
                                      </td>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Confirmation Date:</label>
                                        <input style="width: 300px;" type="text" name="confirmation_date" id="confirmation_date" value="<?php echo set_value('confirmation_date'); ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                      </td>
                                    </tr>

                                    <tr>
                                      <td>
                                        <label style="width: 130px;" class="control-label">Starting Salary: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="record_starting_salary" id="record_starting_salary" value="<?php echo set_value('record_starting_salary'); ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('starting_salary'); ?></h6>
                                      </td>                                      
                                      <td>
                                        <label style="width: 130px;" class="control-label">Current Salary: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                        <input style="width: 300px;" type="text" name="current_salary" id="current_salary" value="<?php echo set_value('current_salary'); ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                                      <h6 style="color:red; margin: 0px;"><?php echo form_error('current_salary'); ?></h6>
                                      </td>
                                    </tr>                                    
                                    
                                  </tbody>
                                </table>
                              
                              <button style="float: right;" id="gritter-without-image" class="btn btn-success">Finish</button>
                              <span id="prev_4" style="float: left;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Prev</span>  

                            </div>
                                                
                          <?php echo form_close(); ?>
                        </div>
                  
                      </div><!--/widget-main-->
                    </div><!--/widget-body-->
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

<!-- *******  End for Date picker  *******-->

<script type="text/javascript" language="javascript">

$('.add_family').click(function() {
        $('#family_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_family:last');
});
$('.add_nominee').click(function() {
        $('#nominee_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_nominee:last');
});
$('.add_reference').click(function() {
        $('#reference_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_reference:last');
});
$('.add_document').click(function() {
//  jQuery.noConflict();
        $('#document_data:last').clone()
                              .find("input:text").val("").end()
                              .find("input:file").val("").end()
//                              .find("#expiry_date").datepicker()
                              .insertBefore('.add_document:last');
});
</script>


<script type="text/javascript">

$(document).ready(function(){
      $('#employee_name').on('keyup' ,function(){
         var name = $('#employee_name').val();
         $('#emp_record_name').val(name);
      });
      $('#emp_record_name').on('keyup' ,function(){
         var name = $('#emp_record_name').val();
         $('#employee_name').val(name);
      });
  });

  $(document).ready(function(){
      $('#record_department').on('change' ,function(){
         var dept = $('#record_department').val();
            $.ajax({
                  type: "GET",
                  url: "<?php echo base_url(); ?>hris/desigantion_by_department_id/?dept_id="+dept,
                  success: function(html){                    
                  $("#record_designation").html(html);
                  $("#reporting_to").html(html);
                  }
              });
              return false;  
      }); 
      
      $('#employee_code').on('keyup' ,function(){
         var code = $('#employee_code').val();
            $.ajax({
                  type: "GET",
                  url: "<?php echo base_url(); ?>hris/check_employee/?emp_code="+code,
                  success: function(html){                    
                      $("#code_error").text(html);
                  }
              });
              return false;  
      }); 
    });

//--- Employee form wizard ---\\
$(document).ready(function(){
  $("#step1").show();
  $("#step2").hide();
  $("#step3").hide();
  $("#step4").hide();
  $("#dep_other").hide();
  $("#nominee_other").hide();

    $('#dependent_relation').on('change' ,function(){
      var dept = $('#dependent_relation').val();
      if(dept == 'Other')
      {
        $('#dep_other').show();          
      }
      else
      {
        $('#dep_other').hide();          
      }      
    });
  
  $('#nominee_realtion').on('change' ,function(){
      var nomi = $('#nominee_realtion').val();
      if(nomi == 'Other')
      {
        $('#nominee_other').show();          
      }
      else
      {
        $('#nominee_other').hide();          
      }      
    });
});

$("#next_1").click(function()
{  
  var name     = $("#employee_name").val();
  var father   = $("#father_name").val();
  var dob      = $("#employee_dob").val();
//  var gender   = $("#gender").val();
  var highest  = $("#highest_qualification").val();
  var cnic     = $("#emp_cnic").val();
  var address  = $("#permanent_address").val();
  var contact  = $("#permanent_contact").val();
  var mobile1  = $("#mobile_1").val();
  var emerg    = $("#emergency_contact").val();
  var campus    = $("#campus_id").val();

  if(name == '')
    {
      $("#employee_name").focus();
      $("#employee_name").css("border-color", "red"); 
    }
  if(father == '')
    {
      $("#father_name").focus();
      $("#father_name").css("border-color", "red");     
    }
  if(dob == '')
    {
      $("#employee_dob").focus();
      $("#employee_dob").css("border-color", "red");     
    }
  
//  if(gender == '')
//    {
//      $("#gender").focus();
//      $("#gender").css("color", "red");     
//    }
  if(highest == '')
    {
      $("#highest_qualification").focus();
      $("#highest_qualification").css("border-color", "red");     
    }
  if(cnic == '')
    {
      $("#emp_cnic").focus();
      $("#emp_cnic").css("border-color", "red");     
    }
  if(address == '')
    {
      $("#permanent_address").focus();
      $("#permanent_address").css("border-color", "red");     
    }
  if(contact == '')
    {
      $("#permanent_contact").focus();
      $("#permanent_contact").css("border-color", "red");     
    }
  if(mobile1 == '')
    {
      $("#mobile_1").focus();
      $("#mobile_1").css("border-color", "red");     
    }
  if(emerg == '')
    {
      $("#emergency_contact").focus();
      $("#emergency_contact").css("border-color", "red");     
    }
   
  if(name !='' && father!='' && dob!='' && highest!='' && cnic!='' && address!='' && contact!='' && mobile1!='' && emerg!='')
  {
    $("#step1").hide();
    $("#step2").fadeIn();
    $("#step3").hide();
    $("#step4").hide();      
  }
  else
    {
      alert('Empty Field');
    }
  
});

$("#next_2").click(function()
{
  $("#step1").hide();
  $("#step2").hide();
  $("#step3").fadeIn();
  $("#step4").hide();
});

$("#prev_2").click(function()
{
  $("#step1").fadeIn();
  $("#step2").hide();
  $("#step3").hide();
  $("#step4").hide();
});

$("#next_3").click(function()
{
  $("#step1").hide();
  $("#step2").hide();
  $("#step3").hide();
  $("#step4").fadeIn();
});

$("#prev_3").click(function()
{
  $("#step1").hide();
  $("#step2").fadeIn();
  $("#step3").hide();
  $("#step4").hide();
});

$("#prev_4").click(function()
{
  $("#step1").hide();
  $("#step2").hide();
  $("#step3").fadeIn();
  $("#step4").hide();
});

//--- Add More Degree Rows ---\\
$(document).ready(function(){
  $(".degree_0").show();
  $(".rowMore_0").show();
  $(".degree_1").hide();
  $(".degree_2").hide();
  $(".degree_3").hide();
  $(".degree_4").hide();
  $(".degree_5").hide();
  $(".degree_6").hide();
  $(".degree_7").hide();
  $(".rowMore_1").hide();
  $(".rowMore_2").hide();
  $(".rowMore_3").hide();
  $(".rowMore_4").hide();
  $(".rowMore_5").hide();
  $(".rowMore_6").hide();
  $(".rowMore_7").hide();
});

$(".addDegree_0").click(function()
{
  $(".degree_1").show();
  $(".rowMore_1").show();
  $(".rowMore_0").hide();
});

$(".addDegree_1").click(function()
{
  $(".degree_2").show();
  $(".rowMore_2").show();
  $(".rowMore_1").hide();
});

$(".addDegree_2").click(function()
{
  $(".degree_3").show();
  $(".rowMore_3").show();
  $(".rowMore_2").hide();
});

$(".addDegree_3").click(function()
{
  $(".degree_4").show();
  $(".rowMore_4").show();
  $(".rowMore_3").hide();
});

$(".addDegree_4").click(function()
{
  $(".degree_5").show();
  $(".rowMore_4").hide();
});

$(".addDegree_5").click(function()
{
  $(".degree_5").show();
  $(".rowMore_4").hide();
});

$(".addDegree_6").click(function()
{
  $(".degree_6").show();
  $(".rowMore_5").hide();
});


//--- Add More Course Rows ---\\
$(document).ready(function(){
  $(".course_0").show();
  $(".rowCourse_0").show();
  $(".course_1").hide();
  $(".course_2").hide();
  $(".course_3").hide();
  $(".course_4").hide();
  $(".course_5").hide();
  $(".course_6").hide();
  $(".course_7").hide();
  $(".rowCourse_1").hide();
  $(".rowCourse_2").hide();
  $(".rowCourse_3").hide();
  $(".rowCourse_4").hide();
  $(".rowCourse_5").hide();
  $(".rowCourse_6").hide();
  $(".rowCourse_7").hide();
});

$(".addCourse_0").click(function()
{
  $(".course_1").show();
  $(".rowCourse_1").show();
  $(".rowCourse_0").hide();
});

$(".addCourse_1").click(function()
{
  $(".course_2").show();
  $(".rowCourse_2").show();
  $(".rowCourse_1").hide();
});

$(".addCourse_2").click(function()
{
  $(".course_3").show();
  $(".rowCourse_3").show();
  $(".rowCourse_2").hide();
});

$(".addCourse_3").click(function()
{
  $(".course_4").show();
  $(".rowCourse_4").show();
  $(".rowCourse_3").hide();
});

$(".addCourse_4").click(function()
{
  $(".course_5").show();
  $(".rowCourse_4").hide();
});

$(".addCourse_5").click(function()
{
  $(".course_6").show();
  $(".rowCourse_4").hide();
});

$(".addCourse_4").click(function()
{
  $(".course_5").show();
  $(".rowCourse_4").hide();
});

function employeeRecord()
{
  var code     = $("#employee_code").val();
  var name     = $("#emp_record_name").val();
  var desig    = $("#record_designation").val();
  var company  = $("#record_company").val();
  var dept     = $("#record_department").val();
  var type     = $("#employee_type").val();
  var status   = $("#employee_status").val();
  var join     = $("#joining_date").val();
  var starting = $("#record_starting_salary").val();
  var current  = $("#current_salary").val();
  var campus  = $("#campus").val();

    if(code == '')
    {
      $("#employee_code").focus();
      $("#employee_code").css("border-color", "red");
    }
    if(name == '')
    {
      $("#emp_record_name").focus();
      $("#emp_record_name").css("border-color", "red");  
    }
    if(desig == '')
    {
      $("#record_designation").focus();
      $("#record_designation").css("border-color", "red"); 
      
    }
    if(company == '')
    {
      $("#record_company").focus();
      $("#record_company").css("border-color", "red"); 
    }
    if(dept == '')
    {
      $("#record_department").focus();
      $("#record_department").css("border-color", "red"); 
    }
    if(type == '')
    {
      $("#employee_type").focus();
      $("#employee_type").css("border-color", "red");
      
    }
    if(status == '')
    {
      $("#employee_status").focus();
      $("#employee_status").css("border-color", "red");       
    }
    if(join == '')
    {
      $("#joining_date").focus();
      $("#joining_date").css("border-color", "red");       
    }
    if(starting == '')
    {
      $("#record_starting_salary").focus();
      $("#record_starting_salary").css("border-color", "red");       
    }
    if(current == '')
    {
      $("#current_salary").focus();
      $("#current_salary").css("border-color", "red");       
    }
    if(campus == '')
    {
      $("#campus").focus();
      $("#campus").css("border-color", "red");       
    }    
    
  if(code=='' || name=='' || desig=='' || company=='' || dept=='' || type=='' || status=='' || join=='' || starting=='' || current=='' || campus=='')
  {
    return false;
  }   
}


$(function() {
    $('.date-picker').datepicker({
      changeMonth:true,
      changeYear:true
    });
    
     $('.date-picker').on('changeDate', function(ev){
    $(this).datepicker('hide');
    });
  });

  //----  Fields Formats ----\\
  
//  jQuery(function($){
//    $("#emp_cnic").mask("99999-9999999-9");          
//    $("#mobile_1").mask("9999-9999999");    
//    $("#mobile_2").mask("9999-9999999");        
//    $("#dependent_cnic").mask("99999-9999999-9");    
//    $("#nominee_cnic").mask("99999-9999999-9");    
//    $("#nominee_contact").mask("9999-9999999");      
//  });


  $('#father_name').keyup(function () {  
        this.value = this.value.replace(/[^a-zA-Z \.]/g,''); 
  });
  $('#employee_name').keyup(function () {  
        this.value = this.value.replace(/[^a-zA-Z \.]/g,''); 
  });
  $('#emp_record_name').keyup(function () {  
        this.value = this.value.replace(/[^a-zA-Z \.]/g,''); 
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


<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + '' + num + '');
}
//  End -->
</script>
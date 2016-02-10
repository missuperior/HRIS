
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
      <li class="active">Edit Employee</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Information / Data
<!--        <small>s
          <i class="icon-double-angle-right"></i>
          Common form elements and layouts
        </small>-->
      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
      <a href="" style="text-decoration: none" class="pink">
        <?php
            echo validation_errors();
            echo $this->session->userdata('error_msg');$this->session->unset_userdata('error_msg'); 
        ?>
      </a>
    </h4>

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->

        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Employee Personal Information</h4>
              </div>

              <div class="widget-body">
                <div class="widget-main">
                  <div class="row-fluid">
                    <?php
                    $attributes = array('id' => 'employeeform', 'onsubmit' => 'return employeeRecord();');
                    echo form_open_multipart('hris/update_employee', $attributes);
                    ?>

                    <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $id; ?>" />

                    <div class="step-pane active" id="step1">
                      <div style="text-align: center;">
                        <img src="<?php echo base_url(); ?>assets/images/w_1.png" border="0" />
                      </div>
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
                              <input style="width: 300px;" type="text" name="employee_name" id="employee_name" value="<?php echo $employee[0]['emp_name']; ?>" class="span6" />
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_name'); ?>
                            </td>
                            <td>   
                              <label style="width: 130px;" class="control-label">Father's Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="father_name" id="father_name" value="<?php echo $employee[0]['father_name']; ?>" class="span6" />
                              <h6 style="color:red; margin: 0px;"><?php echo form_error('father_name'); ?>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Date of Birth: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="employee_dob" id="employee_dob" value="<?php echo $employee[0]['date_of_birth']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_dob'); ?>
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">Place of Birth:</label>
                             <select style="width: 301px;" id="place_birth" name="place_birth">                                 
                                <option value="">-- Select City --</option>
                                <?php foreach ($cities as $row) { ?>
                                  <option <?php if ($row['city_id'] == $employee[0]['place_of_birth'])
                                  echo "selected='selected'"; ?> value="<?php echo $row['city_id'] ?>"><?php echo $row['city_name'] ?></option> 
                                  <?php } ?>																				
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Gender: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <label class="blue" style="float: left; margin-right: 10px;">
                                <input <?php if ($employee[0]['gender'] == 'male')
                                    echo "checked='checked'"; ?> name="gender" value="male" type="radio" />
                                <span class="lbl"> Male </span>
                              </label>
                              <label class="blue">
                                <input <?php if ($employee[0]['gender'] == 'female')
                                    echo "checked='checked'"; ?> name="gender" value="female" type="radio" />
                                <span class="lbl"> Female </span>
                              </label>
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('gender'); ?>
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">Marital Status:</label>
                              <label class="blue" style="float: left; margin-right: 10px;">
                                <input <?php if ($employee[0]['marital_status'] == 'single')
                                    echo "checked='checked'"; ?> name="marital_status" id="marital_status" value="single" type="radio" />
                                <span class="lbl"> Single </span>
                              </label>
                              <label class="blue">
                                <input <?php if ($employee[0]['marital_status'] == 'married')
                                    echo "checked='checked'"; ?> name="marital_status" id="marital_status" value="married" type="radio" />
                                <span class="lbl"> Married</span>
                              </label>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Blood Group :</label>
                              <select style="width: 301px;" id="blood_group" name="blood_group">
                                 <option value="">-- Select Blood Group  --</option>
                                  <option <?php if ($employee[0]['blood_group'] == 'A+')  echo "selected='selected'"; ?> value="A+">A+</option>																				
                                  <option <?php if ($employee[0]['blood_group'] == 'B+')  echo "selected='selected'"; ?> value="B+">B+</option>																				
                                  <option <?php if ($employee[0]['blood_group'] == 'A-')  echo "selected='selected'"; ?> value="A-">A-</option>																				
                                  <option <?php if ($employee[0]['blood_group'] == 'B-')  echo "selected='selected'"; ?> value="B-">B-</option>																				
                                  <option <?php if ($employee[0]['blood_group'] == 'AB+')  echo "selected='selected'"; ?> value="AB+">AB+</option>																				
                                  <option <?php if ($employee[0]['blood_group'] == 'AB-')  echo "selected='selected'"; ?> value="AB-">AB-</option>																				
                                  <option <?php if ($employee[0]['blood_group'] == 'O+')  echo "selected='selected'"; ?> value="O+">O+</option>																				
                                  <option <?php if ($employee[0]['blood_group'] == 'O-')  echo "selected='selected'"; ?> value="O-">O-</option>                                																			
                              </select>
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">Religion:</label>
                              <select style="width: 301px;" id="religion" name="religion">
                                <option value="">-- Select Religion  --</option>
                                <option <?php if ($employee[0]['religion'] == 'Islam')echo "selected='selected'"; ?> value="Islam">Islam</option>																				
                                <option <?php if ($employee[0]['religion'] == 'Christian')echo "selected='selected'"; ?> value="Christian">Christianity</option>																				
                                <option <?php if ($employee[0]['religion'] == 'Hinduism')echo "selected='selected'"; ?> value="Hinduism">Hinduism</option>																				
                                <option <?php if ($employee[0]['religion'] == 'Jews')echo "selected='selected'"; ?> value="Jews">Jews</option>																				
                                <option <?php if ($employee[0]['religion'] == 'Sikhism')echo "selected='selected'"; ?> value="Sikhism">Sikhism</option>																				
                                <option <?php if ($employee[0]['religion'] == 'Budhist')echo "selected='selected'"; ?> value="Budhist">Budhist</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 180px;" class="control-label">Highest Qualification: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <select style="width: 301px;" id="highest_qualification" name="highest_qualification">
                                <option value="">-- Select Qualification  --</option>
                                
                                <option value="">-- Select Qualification  --</option>
                                <option <?php if ($employee[0]['highest_qualification'] == 'Middle')echo "selected='selected'"; ?> value="Middle">Middle</option>																				
                                <option <?php if ($employee[0]['highest_qualification'] == 'Matriculation')echo "selected='selected'"; ?> value="Matriculation">Matriculation</option>																				
                                <option <?php if ($employee[0]['highest_qualification'] == 'Intermediate')echo "selected='selected'"; ?> value="Intermediate">Intermediate</option>																				
                                <option <?php if ($employee[0]['highest_qualification'] == 'Bachelor')echo "selected='selected'"; ?> value="Bachelor">Bachelor</option>																				
                                <option <?php if ($employee[0]['highest_qualification'] == 'BS')echo "selected='selected'"; ?> value="BS">BS</option>																				
                                <option <?php if ($employee[0]['highest_qualification'] == 'BS(Hons)')echo "selected='selected'"; ?> value="BS">BS(Hons)</option>																				
                                <option <?php if ($employee[0]['highest_qualification'] == 'Masters')echo "selected='selected'"; ?> value="Masters">Masters</option>																				
                                <option <?php if ($employee[0]['highest_qualification'] == 'MS')echo "selected='selected'"; ?> value="MS">MS</option>																					
                                <option <?php if ($employee[0]['highest_qualification'] == 'M.Phil')echo "selected='selected'"; ?> value="M.Phil">M.Phil</option>																				
                                <option <?php if ($employee[0]['highest_qualification'] == 'Phd')echo "selected='selected'"; ?> value="Phd">Phd</option>
                              </select>
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('highest_qualification'); ?>
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">CNIC: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="emp_cnic" id="emp_cnic" value="<?php echo $employee[0]['cnic_no']; ?>" class="span6" placeholder="e.g: 30605-1234567-8" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('emp_cnic'); ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Employee Picture:</label>
                              <input style="width: 300px;" type="file" name="emp_pic" id="emp_pic" class="span6" />                              
                            </td>
                            <td>
                              <?php if ($employee[0]['emp_picture'] != 'NULL') { ?>
                                <img src="<?php echo base_url();echo $employee[0]['emp_picture'] ?>" width="150" height="150" border="0" />
                              <?php } else { ?>
                                <img src="<?php echo base_url(); ?>assets/images/no_image.jpg" width="150" height="150" border="0" />
                              <?php } ?>
                              <input type="hidden" id="old_emp_pic" name="old_emp_pic" value="<?php echo $employee[0]['emp_picture'] ?>" />
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
                              <input style="width: 300px;" type="text" name="employee_address" id="employee_address" value="<?php echo $employee[0]['mailing_address']; ?>" class="span6" />
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">Type of Address :</label>
                              <select style="width: 301px;" id="mailing_type" name="mailing_type">
                                <option value="">-- Select Type  --</option>
                                <option <?php if ($employee[0]['mailing_address_type'] == 'Residential') echo "selected='selected'"; ?> value="Residential">Residential</option>																				
                                <option <?php if ($employee[0]['mailing_address_type'] == 'Office') echo "selected='selected'"; ?> value="Office">Office</option>																				
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td colspan="2">
                              <label style="width: 130px;" class="control-label">Mailing Contact#:</label>
                              <input style="width: 300px;" type="text" name="mailing_contact" id="mailing_contact" value="<?php echo $employee[0]['mailing_contact_no']; ?>" class="span6" placeholder="e.g: 0423-1234567" />
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 150px;" class="control-label">Permanent Address: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="permanent_address" id="permanent_address" value="<?php echo $employee[0]['permanent_address']; ?>" class="span6" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('permanent_address'); ?>
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">Type of Address :</label>
                              <select style="width: 301px;" id="permanent_type" name="permanent_type">
                                <option value="">-- Select Type  --</option>
                                <option <?php if ($employee[0]['permanent_address_type'] == 'Residential') echo "selected='selected'"; ?> value="Residential">Residential</option>																				
                                <option <?php if ($employee[0]['permanent_address_type'] == 'Office') echo "selected='selected'"; ?> value="Office">Office</option>																				
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td colspan="2">
                              <label style="width: 230px;" class="control-label">Permanent Address Contact #: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="permanent_contact" id="permanent_contact" value="<?php echo $employee[0]['permanent_contact_no']; ?>" class="span6" placeholder="e.g: 0423-1234567" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('permanent_contact'); ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label style="width: 230px;" class="control-label">Mobile # 1: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="mobile_1" id="mobile_1" value="<?php echo $employee[0]['mobile_1']; ?>" class="span6" placeholder="e.g: 0333-1234567" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('mobile_1'); ?>
                            </td>
                            <td>
                              <label style="width: 230px;" class="control-label">Mobile # 2:</label>
                              <input style="width: 300px;" type="text" name="mobile_2" id="mobile_2" value="<?php echo $employee[0]['mobile_2']; ?>" class="span6" placeholder="e.g: 0333-1234567" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('mobile_2'); ?>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <div class="control-group">
                                  <label class="control-label" for="form-field-1">Email 1 :</label>
            
                                  <div class="controls">
                                    <input style="width: 300px;" type="text" name="email_1" id="email_1" value="<?php echo $employee[0]['email_1']; ?>" class="span6" />
                                    <h6 style="color:red; margin: 0px;"><?php echo form_error('email_1'); ?></h6>
                                  </div>
                              </div>
                            </td>
                            <td>
                              <div class="control-group">
                                  <label class="control-label" for="form-field-1">Email 2 :</label>
            
                                  <div class="controls">
                                    <input style="width: 300px;" type="text" name="email_2" id="email_2" value="<?php echo $employee[0]['email_2']; ?>" class="span6" />
                                    <h6 style="color:red; margin: 0px;"><?php echo form_error('email_2'); ?></h6>
                                  </div>
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td colspan="2">
                              <label style="width: 230px;" class="control-label">Emergency Contact #: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="emergency_contact" id="emergency_contact" value="<?php echo $employee[0]['emergency_contact_no']; ?>" class="span6"placeholder="e.g: 0333-1234567 OR 0423-1234567" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('emergency_contact'); ?>
                            </td>
                          </tr>

                          </tbody>
                        </table>
                      
                      <h3 style="margin-top: 20px" class="lighter block green">Family Bio Data of Dependants</h3>
                      
                      <input type="hidden" name="dep_count" value="<?php echo count($dependent);?>" />
                      <?php
                          foreach ($dependent as $row) {
                      ?> 
                      <input style="width: 300px;" type="hidden" name="dependent_id[]" id="dependent_id" value="<?php echo $row['dependent_id']; ?>" class="span6" />
                              
                      <table id="family_data" border="0" width="100%" cellpadding="7">
                          <tbody>

                          <tr>
                            <td>
                              <label style="width: 150px;" class="control-label">Dependant Name:</label>
                              <input style="width: 300px;" type="text" name="dependent_name[]" id="dependent_name" value="<?php echo $row['dependent_name']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 260px;" class="control-label">Dependant Father/Husband Name:</label>
                              <input style="width: 300px;" type="text" name="dependent_father_name[]" id="dependent_father_name" value="<?php echo $dependent[0]['dep_father_husband_name']; ?>" class="span6" />
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 150px;" class="control-label">Dependant CNIC:</label>
                              <input style="width: 300px;" type="text" name="dependent_cnic[]" id="dependent_cnic" value="<?php echo $row['dependent_cnic']; ?>" class="span6" placeholder="e.g: 30605-1234567-8" />
                            </td>
                            <td>
                              <label style="width: 200px;" class="control-label">Relationship with Employee:</label>
                              <select style="width: 301px;" id="dependent_relation" name="dependent_relation[]">
                                <option value="">-- Select Relationship --</option>                                  
                                <option <?php if ($row['dependent_relation'] == 'Father')echo "selected='selected'"; ?> value="Father">Father</option>
                                <option <?php if ($row['dependent_relation'] == 'Brother')echo "selected='selected'"; ?> value="Brother">Brother</option>
                                <option <?php if ($row['dependent_relation'] == 'Sister')echo "selected='selected'"; ?> value="Sister">Sister</option>																				
                                <option <?php if ($row['dependent_relation'] == 'Son')echo "selected='selected'"; ?> value="son">Son</option>																				
                                <option <?php if ($row['dependent_relation'] == 'Daughter')echo "selected='selected'"; ?> value="Daugghter">Daughter</option>																				
                                <option <?php if ($row['dependent_relation'] == 'Spouse')echo "selected='selected'"; ?> value="Spouse">Spouse</option>																				
                                <option <?php if ($row['dependent_relation'] == 'Other')echo "selected='selected'"; ?> value="Other">Other</option>																				
                              </select>
                            </td>
                          </tr>
                          
                          <tr>
                            <td colspan="2">
                              <hr/>
                            </td>
                          </tr>

                          </tbody>
                        </table>
                      
                      <?php }?>
                      
                      <?php if(empty($dependent)){ ?>
                      
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
                      <?php }?>                      
                      
                      <span class="add_family" style="float: left; margin-top: -20px; cursor: pointer; color: #567f48;">
                          Add More
                      </span>
                      
                      
                      <h3 style="margin-top: 20px" class="lighter block green">Next of Kin</h3>
                      <input type="hidden" name="nom_count" value="<?php echo count($nominee);?>" />

                      <?php
                          foreach ($nominee as $row) {                         
                      ?> 
                      <input style="width: 300px;" type="hidden" name="nominee_id[]" id="nominee_id" value="<?php echo $row['nominee_id']; ?>" class="span6" />
                              
                      <table id="nominee_data" border="0" width="100%" cellpadding="7">
                          <tbody>
                          <tr>
                            <td>
                              <label style="width: 150px;" class="control-label">Nominee Name:</label>
                              <input style="width: 300px;" type="text" name="nominee_name[]" id="nominee_name" value="<?php echo $row['nominee_name']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 260px;" class="control-label">Nominee Father/Husband Name:</label>
                              <input style="width: 300px;" type="text" name="nominee_father_name[]" id="nominee_name" value="<?php echo $row['nominee_father_husband_name']; ?>" class="span6" />
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 150px;" class="control-label">Nominee CNIC:</label>
                              <input style="width: 300px;" type="text" name="nominee_cnic[]" id="nominee_cnic" value="<?php echo $row['nominee_cnic']; ?>" class="span6" placeholder="e.g: 30605-1234567-8" />
                            </td>
                            <td>
                              <label style="width: 270px;" class="control-label">Nominee Relationship with Employee:</label>
                              <select style="width: 301px;" id="nominee_relation" name="nominee_relation[]">
                                <option value="">-- Select Relationship --</option>                                  
                                <option <?php if ($row['nominee_relation'] == 'Father')echo "selected='selected'"; ?> value="Father">Father</option>
                                <option <?php if ($row['nominee_relation'] == 'Brother')echo "selected='selected'"; ?> value="Brother">Brother</option>
                                <option <?php if ($row['nominee_relation'] == 'Sister')echo "selected='selected'"; ?> value="Sister">Sister</option>																				
                                <option <?php if ($row['nominee_relation'] == 'Son')echo "selected='selected'"; ?> value="Son">Son</option>																				
                                <option <?php if ($row['nominee_relation'] == 'Daughter')echo "selected='selected'"; ?> value="Daughter">Daughter</option>																				
                                <option <?php if ($row['nominee_relation'] == 'Spouse')echo "selected='selected'"; ?> value="Spouse">Spouse</option>																				
                                <option <?php if ($row['nominee_relation'] == 'Other')echo "selected='selected'"; ?> value="Other">Other</option>																				
                              </select>
                            </td>
                          </tr>
                          
                          <tr>
                            <td colspan="2">
                              <hr/>
                            </td>
                          </tr>

                        </tbody>
                      </table>                      
                      <?php }?>
                      
                      <?php if(empty($nominee)){ ?>
                      
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
                               <select style="width: 301px;" id="nominee_realtion" name="nominee_realtion[]">
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
                      <?php }?>
                      
                      <span class="add_nominee" style="float: left; margin-top: -20px; cursor: pointer; color: #567f48;">
                          Add More
                      </span>
                      
                      <br /><br />

                      <span id="next_1" style="float: right;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Next</span>  
                      <br /><br />
                    </div>

                    <div class="step-pane" id="step2">                        
                      <div style="text-align: center;">
                        <img src="<?php echo base_url(); ?>assets/images/w_2.png" border="0" />
                      </div>

                      <div class="row-fluid">
                        <h3 style="margin-top: 20px" class="lighter block green">Education Background </h3>   

                        <table id="degree_data" class="table-bordered" style="border: none;">
                          <tbody>
                          <th>Degree Title</th>
                          <th>Institute</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Year</th>
                          <th>Grade/CGPA</th>
                          <th>Division</th>
                          <th>Major Subjects</th>

                          <?php
                          foreach ($education as $row) {
                            if ($row['degree_title'] != '') {
                              ?>                           
                              <tr>
                                <td>
                                  <input type="hidden" id="degree_count" value="1" />
                                  <input type="hidden" name="degree_education_id[]" value="<?php echo $row['emp_education_id'] ?>" />                                  
                                  <input style="width: 130px;" type="text" name="edit_degree_title[]" value="<?php echo $row['degree_title']; ?>" class="span6" />
                                </td>
                                <td><input style="width: 130px;" type="text" name="edit_degree_institute[]" value="<?php echo $row['degree_institute_name']; ?>" class="span6" />
                                </td>
                                <td><input style="width: 88px;" type="text" name="edit_degree_from[]" value="<?php echo $row['degree_from_date']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                </td>
                                <td><input style="width: 88px;" type="text" name="edit_degree_to[]"  value="<?php echo $row['degree_to_date']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                </td>
                                <td><input style="width: 50px;" type="text" name="edit_degree_year[]" value="<?php echo $row['degree_passing_year']; ?>" class="span6" />
                                </td>
                                <td><input style="width: 85px;" type="text" name="edit_degree_grade[]" value="<?php echo $row['degree_grade']; ?>" class="span6" />
                                </td>
                                <td><input style="width: 60px;" type="text" name="edit_degree_division[]" value="<?php echo $row['degree_division']; ?>" class="span6" />
                                </td>
                                <td><input style="width: 100px;" type="text" name="edit_degree_subjects[]" value="<?php echo $row['major_subjects']; ?>" class="span6" />
                                </td>
                              </tr>
                            <?php 
                          } }?>
                          </tbody>
                        </table>

                        <table id="degree-table" class="table-bordered" style="border: none;">
                          <thead id="add_degree_head">
                            <th>Degree Title</th>
                            <th>Institute</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Year</th>
                            <th>Grade/CGPA</th>
                            <th>Division</th>
                            <th>Major Subjects</th>                            
                          </thead>
                            
                          <tbody>                                                    
                          <?php for ($i = 0; $i <= 5; $i++) { ?>                           
                              <tr class="degree_<?php echo $i; ?>">
                                <td><input style="width: 130px;" type="text" name="degree_title[]" class="span6" />
                                </td>
                                <td><input style="width: 130px;" type="text" name="degree_institute[]" class="span6" />
                                </td>
                                <td><input style="width: 88px;" type="text" name="degree_from[]" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                </td>
                                <td><input style="width: 88px;" type="text" name="degree_to[]" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                </td>
                                <td><input style="width: 50px;" type="text" name="degree_year[]" class="span6" />
                                </td>
                                <td><input style="width: 85px;" type="text" name="degree_grade[]" class="span6" />
                                </td>
                                <td><input style="width: 60px;" type="text" name="degree_division[]" class="span6" />
                                </td>
                                <td><input style="width: 100px;" type="text" name="degree_subjects[]" class="span6" />
                                </td>
                              </tr>
                              <tr class="rowMore_<?php echo $i; ?>">
                                <td colspan="7">
                                  <span class="addDegree_<?php echo $i; ?>" style="cursor: pointer; color: #567f48;">
                                    Add More
                                  </span>
                                </td>
                              <?php } ?>
                              </tr>
                          </tbody>
                        </table>


                        <br /><br /><br />

                        <h3 style="margin-top: 20px" class="lighter block green">Training Courses / Certifications</h3>   
                        <table id="course_data" class="table-bordered" style="border: none;">
                          <tbody>
                          <th>Title</th>
                          <th>Institute</th>
                          <th>Address</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Duration</th>
                          <th>City</th>

                          <?php
                          foreach ($education as $row) {
                            if ($row['course_title'] != '') {
                              ?>   
                              <tr>
                                <td>
                                  <input type="hidden" id="course_count" value="1" />
                                  <input type="hidden" name="course_education_id[]" value="<?php echo $row['emp_education_id'] ?>" />
                                  <input style="width: 130px;" type="text" name="edit_course_title[]" id="" value="<?php echo $row['course_title']; ?>" class="span6" />
                                </td>
                                <td><input style="width: 130px;" type="text" name="edit_course_institute[]" id="" value="<?php echo $row['course_institute_name']; ?>" class="span6" />
                                </td>
                                <td><input style="width: 130px;" type="text" name="edit_course_address[]" id="" value="<?php echo $row['course_institute_address']; ?>" class="span6" />
                                </td>
                                <td><input style="width: 88px;" type="text" name="edit_course_from[]" id="" value="<?php echo $row['course_from_date']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                </td>
                                <td><input style="width: 88px;" type="text" name="edit_course_to[]" id="" value="<?php echo $row['course_to_date']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                </td>
                                <td><input style="width: 70px;" type="text" name="edit_course_duration[]" id="" value="<?php echo $row['course_duration']; ?>" class="span6" />
                                </td>
                                <td>
                                  <select style="width: 100px;" id="" name="edit_course_city[]">
                                    <option value="">--- City ---</option>
                                      <?php foreach ($cities as $city) { ?>
                                      <option <?php if ($city['city_id'] == $row['education_city_id'])
                                          echo "selected='selected'"; ?> value="<?php echo $city['city_id'] ?>"><?php echo $city['city_name'] ?></option> 
                                      <?php } ?>																				
                                  </select>
                                </td>
                              </tr> 
                            <?php 
                              } }?>
                          </tbody>
                        </table>

                        <table id="course-table" class="table-bordered" style="border: none;">
                          <thead id="add_course_head">                            
                          <th>Title</th>
                          <th>Institute</th>
                          <th>Address</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Duration</th>
                          <th>City</th>
                          </thead>
                          <tbody>

                          <?php for ($i = 0; $i <= 5; $i++) { ?>
                              <tr class="course_<?php echo $i; ?>">
                                <td><input style="width: 130px;" type="text" name="course_title[]" id="" class="span6" />
                                </td>
                                <td><input style="width: 130px;" type="text" name="course_institute[]" id="" class="span6" />
                                </td>
                                <td><input style="width: 130px;" type="text" name="course_address[]" id="" class="span6" />
                                </td>
                                <td><input style="width: 88px;" type="text" name="course_from[]" id="" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                </td>
                                <td><input style="width: 88px;" type="text" name="course_to[]" id="" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                                </td>
                                <td><input style="width: 70px;" type="text" name="course_duration[]" id="" class="span6" />
                                </td>
                                <td>
                                  <select style="width: 100px;" id="" name="course_city[]">
                                    <option value="">--- City ---</option>
                                    <?php foreach ($cities as $row) { ?>
                                      <option value="<?php echo $row['city_id'] ?>"><?php echo $row['city_name'] ?></option> 
                                    <?php } ?>
                                  </select>
                                </td>
                              </tr>
                              <tr class="rowCourse_<?php echo $i; ?>">
                                <td colspan="7">
                                  <span class="addCourse_<?php echo $i; ?>" style="cursor: pointer; color: #567f48;">
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
                      <div style="text-align: center;">
                        <img src="<?php echo base_url(); ?>assets/images/w_3.png" border="0" />
                      </div>

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
                              <input style="width: 300px;" type="text" name="company_name" id="company_name" value="<?php echo $employee[0]['exp_company_name']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 140px;" class="control-label">Company Location:</label>
                              <select style="width: 301px;" id="company_location" name="company_location">                                 
                                <option value="">-- Select City --</option>
                                  <?php foreach ($cities as $row) { ?>
                                  <option <?php if ($row['city_id'] == $employee[0]['company_location'])
                                    echo "selected='selected'"; ?> value="<?php echo $row['city_id'] ?>"><?php echo $row['city_name'] ?></option> 
    <?php } ?>																				
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 200px;" class="control-label">Nature of Business:</label>
                              <input style="width: 300px;" type="text" name="nature_of_business" id="nature_of_business" value="<?php echo $employee[0]['nature_of_business']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 130px;" class="control-label">Job Title:</label>
                              <input style="width: 300px;" type="text" name="job_title" id="job_title" value="<?php echo $employee[0]['job_title']; ?>" class="span6" />
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">From Date:</label>
                              <input style="width: 300px;" type="text" name="job_from" id="job_from" value="<?php echo $employee[0]['expereince_from_date']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">To Date:</label>
                              <input style="width: 300px;" type="text" name="job_to" id="dob" value="<?php echo $employee[0]['experience_to_date']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                            </td>
                          </tr>

                          <tr>
                            <td colspan="2">
                              <label style="width: 140px;" class="control-label">Reason of Leaving:</label>
                              <input style="width: 300px;" type="text" name="reason_for_leaving" id="reason_for_leaving" value="<?php echo $employee[0]['reason_of_leaving']; ?>" class="span6" />
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 140px;" class="control-label">Starting Salary:</label>
                              <input style="width: 300px;" type="text" name="starting_salary" id="starting_salary" value="<?php echo $employee[0]['starting_salary']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 140px;" class="control-label">Last Drawn Salary:</label>
                              <input style="width: 300px;" type="text" name="last_drawn_salary" id="last_drawn_salary" value="<?php echo $employee[0]['last_drawn_salary']; ?>" class="span6" />
                            </td>
                          </tr>
                            
                            
                        </tbody>
                      </table>
                      
                      <h3 style="margin-top: 20px" class="lighter block green">References</h3>   
                      
                       <?php foreach($reference as $row){?>          
                      <input type="hidden" name="ref_count" value="<?php echo count($reference);?>" />
                      <input style="width: 300px;" type="hidden" name="reference_id[]" id="reference_id" value="<?php echo $row['reference_id']; ?>" class="span6" />

                      <table id="reference_data" border="0" width="100%" cellpadding="7">
                        <tbody>
                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Reference Name:</label>
                              <input style="width: 300px;" type="text" name="reference_name[]" id="reference_name" value="<?php echo $row['reference_name']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 200px;" class="control-label">Company / Business Name:</label>
                              <input style="width: 300px;" type="text" name="business_name[]" id="business_name" value="<?php echo $row['reference_company_business_name']; ?>" class="span6" />
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Job Title:</label>
                              <input style="width: 300px;" type="text" name="reference_job_title[]" id="reference_job_title" value="<?php echo $row['reference_job_title']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 140px;" class="control-label">Reference Type:</label>
                              <select style="width: 301px;" id="reference_type" name="reference_type[]">
                                <option value="">-- Select Type --</option>
                                <option value="Ref Type">Reference</option>
                                <option <?php if ($row['reference_type'] == 'Ref Type')echo "selected='selected'"; ?> value="Ref Type">Reference</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Address:</label>
                              <input style="width: 300px;" type="text" name="reference_address[]" id="reference_address" value="<?php echo $row['reference_address']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 200px;" class="control-label">Contact #:</label>
                              <input style="width: 300px;" type="text" name="reference_contact[]" id="reference_contact" value="<?php echo $row['reference_contact_no']; ?>" class="span6" placeholder="e.g: 0333-1234567 OR 0423-1234567" />
                            </td>
                          </tr>

                          <tr>
                            <td colspan="2">
                              <label style="width: 130px;" class="control-label">Email:</label>
                              <input style="width: 300px;" type="text" name="reference_email[]" id="reference_email" value="<?php echo $row['reference_email']; ?>" class="span6" />
                            </td>
                          </tr>
                          
                          <tr>
                            <td colspan="2"><hr /></td>
                          </tr>
                        
                        </tbody>
                      </table>
                                 
                      <?php }?>
                      
                      <?php if(empty($reference)){ ?>
                      <table id="reference_data" border="0" width="100%" cellpadding="7">
                        <tbody>
                          <tr>
                            <td>
                              <input type="hidden" name="ref_count" value="<?php echo count($reference);?>" />                      
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
                      <?php }?>
                      
                      <span class="add_reference" style="float: left; margin-top: -20px; cursor: pointer; color: #567f48;">
                        Add More
                      </span>
                              
                      <h3 style="margin-top: 20px" class="lighter block green">Documents</h3>   
                              
                      <?php foreach($document as $row){ ?>
                      
                      <input type="hidden" name="doc_count" value="<?php echo count($document);?>" />
                      <input style="width: 300px;" type="hidden" name="document_id[]" id="document_id" value="<?php echo $row['document_id']; ?>" class="span6" />
                      <input style="width: 300px;" type="hidden" name="old_document_attch[]" id="document_attch" value="<?php echo $row['attachment'] ?>" class="span6" />

                      <table id="document_data" border="0" width="100%" cellpadding="7">
                        <tbody>
                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Document Title:</label>
                              <input style="width: 300px;" type="text" name="document_title[]" id="document_title" value="<?php echo $row['document_title']; ?>" class="span6" />
                            </td>
                            <td>   
                              <label style="width: 200px;" class="control-label">Document Type:</label>
                              <select style="width: 301px;" id="document_type" name="document_type[]">
                                <option value="">-- Select Type --</option>
                                <option <?php if ($row['document_type'] == 'Experience Letter')echo "selected='selected'"; ?> value="Experience Letter">Experience Letter</option>
                                <option <?php if ($row['document_type'] == 'CV')echo "selected='selected'"; ?> value="CV">CV</option>
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td colspan="2">
                              <label style="width: 130px;" class="control-label">Place of Issue:</label>
                              <input style="width: 300px;" type="text" name="place_of_issue[]" id="place_of_issue" value="<?php echo $row['place_of_issue']; ?>" class="span6" />
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Issue Date:</label>
                              <input style="width: 300px;" type="text" name="issue_date[]" id="issue_date" value="<?php echo $row['issue_date']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                            </td>                                      
                            <td>
                              <label style="width: 130px;" class="control-label">Expiry Date:</label>
                              <input style="width: 300px;" type="text" name="expiry_date[]" id="expiry_date" value="<?php echo $row['expiry_date']; ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10"" />

                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Attachment:</label>
                              <input style="width: 300px;" type="file" name="document_attch[]" id="document_attch" class="span6" />
                            </td>
                            <td colspan="2">
                              <label style="width: 200px;" class="control-label">Description:</label>
                              <textarea rows="5" cols="30" name="description[]"><?php echo $row['description']; ?></textarea>  
                            </td>
                          </tr>
                          
                          <tr>
                            <td colspan="2"><hr /></td>
                          </tr>

                        </tbody>
                      </table>
                      <?php }?>
                      
                      <?php if(empty($document)){?>
                      <table id="document_data" border="0" width="100%" cellpadding="7">
                        <tbody>
                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Document Title:</label>
                              <input style="width: 300px;" type="text" name="document_title[]" id="document_title" class="span6" />
                              <input style="width: 300px;" type="hidden" name="doc_count" id="doc_count" value="<?php echo count($document); ?>" class="span6" />
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
                      <?php }?>
                      
                      <span class="add_document" style="float: left; margin-top: -20px; cursor: pointer; color: #567f48;">
                        Add More
                      </span>
                      <br/><br/><br/>
                      
                      <div style="display: inline;">
                         <?php 
                         foreach($document as $row){
                         if ($row['attachment'] != 'NULL') { ?>
                        <img style="margin-right: 20px;" src="<?php echo base_url();?><?php echo $row['attachment']; ?>" width="100" height="100" border="0" />
                          <?php }else{?>
                            <img style="margin-right: 20px;" src="<?php echo base_url();?>assets/images/no_image.jpg" width="100" height="100" border="0" />
                          <?php }}?>                            
                      </div>
                      
                      <br/><br/>
                      
                      <span id="next_3" style="float: right;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Next</span>  
                      <span id="prev_3" style="float: left;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Prev</span>  

                      <br /><br />
                    </div>

                    <div class="step-pane" id="step4">
                      <div style="text-align: center;">
                        <img src="<?php echo base_url(); ?>assets/images/w_4.png" border="0" />
                      </div>
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
                              <input style="width: 300px;" type="text" name="employee_code" id="employee_code" value="<?php echo $employee[0]['emp_code'] ?>" class="span6" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_code'); ?></h6>
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">Employee Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="emp_record_name" id="emp_record_name" value="<?php echo $employee[0]['employee_name'] ?>" class="span6" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('emp_record_name'); ?>
                            </td>
                          </tr>

                          <tr>
                            <td>   
                              <label style="width: 140px;" class="control-label">Department: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <select style="width: 301px;" id="record_department" name="record_department">
                                <option selected="selected">-- Select Department --</option>                                                        
                                  <?php foreach ($department as $row) { ?>
                                  <option <?php if ($row['department_id'] == $employee[0]['department_id'])
                                    echo "selected='selected'"; ?> value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name'] ?></option> 
                                  <?php } ?>																				
                              </select>
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('record_department'); ?>
                            </td>
                            <td>   
                              <label style="width: 200px;" class="control-label">Company / Institute Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <select style="width: 301px;" id="record_company" name="record_company">
                                <option value="">-- Select Institute --</option>
                                <?php foreach ($company as $row) { ?>
                                  <option <?php if ($row['company_id'] == $employee[0]['record_company_name'])
                                    echo "selected='selected'"; ?> value="<?php echo $row['company_id'] ?>"><?php echo $row['company_name'] ?></option> 
                                <?php } ?>																				
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>   
                              <label style="width: 140px;" class="control-label">Designation: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <select style="width: 301px;" id="record_designation" name="record_designation">
                                <option value="">-- Select Designation --</option>
                                  <?php foreach ($designation as $row) { ?>
                                  <option <?php if ($row['designation_id'] == $employee[0]['designation_id'])
                                    echo "selected='selected'"; ?> value="<?php echo $row['designation_id'] ?>"><?php echo $row['designation_title']; ?></option> 
                                  <?php } ?>
                              </select>
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('record_designation'); ?>
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">Grade:</label>
                              <input style="width: 300px;" type="text" name="record_grade" id="record_grade" value="<?php echo $employee[0]['grade'] ?>" class="span6" />
                            </td>
                          </tr>

                          <tr>
                            <td>  
                              <label style="width: 140px;" class="control-label">Reporting To:</label>
                              <select style="width: 301px;" id="reporting_to" name="reporting_to">                                
                                <option value="">-- Select Designation --</option>																			
                                  <?php foreach ($designation as $row) { ?>
                                  <option <?php if ($row['designation_id'] == $employee[0]['reporting_to'])
                                    echo "selected='selected'"; ?> value="<?php echo $row['designation_id'] ?>"><?php echo $row['designation_title']; ?></option> 
                                  <?php } ?>
                                  
                                  <?php if($employee['department_id'] != 25){ ?>
                                    <option <?php if($employee[0]['designation_id'] == 166){ echo "selected='selected'";}?> value="01">Chairman Secretariat</option>
                                  <?php }?>
                                  <?php if($employee['department_id'] != 24){ ?>                                  
                                    <option <?php if($employee[0]['designation_id'] == 125){ echo "selected='selected'";}?> value="02">Director Operations</option>
                                  <?php }?>
                                  <?php if($employee['department_id'] != 20){ ?>                                  
                                    <option <?php if($employee[0]['designation_id'] == 121){ echo "selected='selected'";}?> value="03">Registrar Secretariat</option>
                                  <?php }?>
                                  <?php if($employee['department_id'] != 22){ ?>                                  
                                    <option <?php if($employee[0]['designation_id'] == 118){ echo "selected='selected'";}?> value="04">Project Director Secretariat </option>
                                  <?php } ?>																				
                              </select>
                            </td>
                            <td>  
                              <label style="width: 200px;" class="control-label">Campus: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <select style="width: 301px;" id="campus" name="campus">                                 
                                  <?php foreach ($campus as $row) { ?>
                                  <option <?php if ($row['campus_id'] == $employee[0]['campus_id'])
                                    echo "selected='selected'"; ?> value="<?php echo $row['campus_id'] ?>"><?php echo $row['campus_name'] ?></option> 
                                  <?php } ?>																				
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>  
                              <label style="width: 200px;" class="control-label">Employee Type: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <select style="width: 301px;" id="employee_type" name="employee_type">
                                <option value="">-- Select Type --</option>  
                                <option <?php if ($employee[0]['employee_type'] == 'Permanent') echo "selected='selected'"; ?> value="Permanent">Permanent</option>
                                <option <?php if ($employee[0]['employee_type'] == 'Contractual') echo "selected='selected'"; ?> value="Contractual">Contractual</option>
                                <option <?php if ($employee[0]['employee_type'] == 'Temporary') echo "selected='selected'"; ?> value="Temporary">Temporary</option>
                              </select>
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_type'); ?>
                            </td> 
                            <td>  
                              <label style="width: 200px;" class="control-label">Employee Status: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <select style="width: 301px;" id="employee_status" name="employee_status">
                                <option value="">-- Select Status --</option>																					
                                <option <?php if ($employee[0]['employee_status'] == 'Probationary') echo "selected='selected'"; ?> value="Probationary">Probationary</option>
                                <option <?php if ($employee[0]['employee_status'] == 'Confirmed') echo "selected='selected'"; ?> value="Confirmed">Confirmed</option>
                                <option <?php if ($employee[0]['employee_status'] == 'On Trial') echo "selected='selected'"; ?> value="On Trial">On Trial</option>
                              </select>
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('employee_status'); ?>
                            </td>
                          </tr>

                          <tr>
                            <td>   
                              <label style="width: 140px;" class="control-label">Shift:</label>
                              <select style="width: 301px;" id="shift" name="shift">
                                <option value="">-- Select Shift --</option>																			
                                <option <?php if ($employee[0]['shift'] == 'Morning') echo "selected='selected'"; ?> value="Morning">Morning</option>
                                <option <?php if ($employee[0]['shift'] == 'Evening') echo "selected='selected'"; ?> value="Evenings">Evening</option>
                              </select>
                            </td> 
                            <td>
                              <label style="width: 250px;" class="control-label">Social Security/Health Insurance #:</label>
                              <input style="width: 300px;" type="text" name="social_security" id="social_security" value="<?php echo $employee[0]['social_security'] ?>" class="span6" />
                            </td>
                          </tr>

                          <tr>
                            <td>   
                              <label style="width: 140px;" class="control-label">Joining Date: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="joining_date" id="joining_date" value="<?php echo $employee[0]['joining_date'] ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('joining_date'); ?>
                            </td>
                            <td>
                              <label style="width: 130px;" class="control-label">Confirmation Date:</label>
                              <input style="width: 300px;" type="text" name="confirmation_date" id="confirmation_date" value="<?php echo $employee[0]['confirmation_date'] ?>" class="span6" placeholder="DD-MM-YYYY" maxlength="10" />
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <label style="width: 130px;" class="control-label">Starting Salary: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="record_starting_salary" id="record_starting_salary" value="<?php echo $employee[0]['record_starting_salary'] ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('record_starting_salary'); ?>
                            </td>                                      
                            <td>
                              <label style="width: 130px;" class="control-label">Current Salary: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                              <input style="width: 300px;" type="text" name="current_salary" id="current_salary" value="<?php echo $employee[0]['current_salary'] ?>" class="span6"onkeyup="this.value=formatCurrency(this.value);" />
                            <h6 style="color:red; margin: 0px;"><?php echo form_error('current_salary'); ?>
                            </td>
                          </tr>                                    

                        </tbody>
                      </table>

                      <br /><br />
                      <button style="float: right;" id="gritter-without-image" class="btn btn-success">Update</button>
                      <span id="prev_4" style="float: left;" class="btn btn-danger btn-small tooltip-error" data-original-title="<i class='icon-bolt red'></i> Top Danger" data-placement="top" data-rel="popover">Prev</span>  

                      <br /><br />
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

<script type="text/javascript">

$('.add_family').click(function() {
        $('#family_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_family:first');
});

$('.add_nominee').click(function() {
        $('#nominee_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_nominee:first');
});

$('.add_reference').click(function() {
        $('#reference_data:last').clone()
                              .find("input:text").val("").end()
                              .insertBefore('.add_reference:first');
});

$('.add_document').click(function() {
        $('#document_data:last').clone()        
                              .find("input:text").val("").end()
                              .find("input:file").val("").end()                                               
                              .insertBefore('.add_document:first');
});

  $(document).ready(function(){  
  
    $("#course_data").hide();
    $("#degree_data").hide();
    var course = $('#course_count').val();
    var degree = $('#degree_count').val();
    
    if(course == 1)      {
      $('#course_data').show();
    }
    if(degree == 1)      {
      $('#degree_data').show();
    }
  
    $('#employee_name').on('keyup' ,function(){
      var name = $('#employee_name').val();
      $('#emp_record_name').val(name);
    });
    $('#emp_record_name').on('keyup' ,function(){
      var name = $('#emp_record_name').val();
      $('#employee_name').val(name);
    });

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
  });

  //--- Employee form wizard ---\\
  $(document).ready(function(){
    $("#step1").show();
    $("#step2").hide();
    $("#step3").hide();
    $("#step4").hide();     
  });

  $("#next_1").click(function()
  {
    var name     = $("#employee_name").val();
    var father   = $("#father_name").val();
    var  dob     = $("#employee_dob").val();
    var gender   = $("#gender").val();
    var highest  = $("#highest_qualification").val();
    var cnic     = $("#employee_cnic").val();
    var address  = $("#permanent_address").val();
    var contact  = $("#permanent_contact").val();
    var mobile1  = $("#mobile_1").val();
    var emerg    = $("#emergency_contact").val();

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
    if(gender == '')
    {
      $("#gender").focus();
      $("#gender").css("color", "red");     
    }
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

if(name !='' && father!='' && dob!='' && gender!='' && highest!='' && cnic!='' && address!='' && contact!='' && mobile1!='' && emerg!='')
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
$(".degree_0").hide();
$("#add_degree_head").hide();
$(".rowMore_0").show();
$(".degree_1").hide();
$(".degree_2").hide();
$(".degree_3").hide();
$(".degree_4").hide();
$(".degree_5").hide();
$(".rowMore_1").hide();
$(".rowMore_2").hide();
$(".rowMore_3").hide();
$(".rowMore_4").hide();
$(".rowMore_5").hide();
});

$(".addDegree_0").click(function()
{  
 var course = $("#degree_count").val();
if(course != 1)
{
  $("#add_degree_head").show();
}
$(".degree_0").show();
$(".rowMore_0").hide();
$(".rowMore_1").show();
});

$(".addDegree_1").click(function()
{
$(".degree_1").show();
$(".rowMore_1").hide();
$(".rowMore_2").show();
});

$(".addDegree_2").click(function()
{
$(".degree_2").show();
$(".rowMore_2").hide();
$(".rowMore_3").show();
});

$(".addDegree_3").click(function()
{
$(".degree_3").show();
$(".rowMore_3").hide();
$(".rowMore_4").show();
});

$(".addDegree_4").click(function()
{
$(".degree_4").show();
$(".rowMore_4").hide();
});

//--- Add More Course Rows ---\\
$(document).ready(function(){
$(".course_0").hide();
$("#add_course_head").hide();
$(".rowCourse_0").show();
$(".course_1").hide();
$(".course_2").hide();
$(".course_3").hide();
$(".course_4").hide();
$(".course_5").hide();
$(".rowCourse_1").hide();
$(".rowCourse_2").hide();
$(".rowCourse_3").hide();
$(".rowCourse_4").hide();
$(".rowCourse_5").hide();
});

$(".addCourse_0").click(function()
{
var course = $("#course_count").val();
if(course != 1)
{
  $("#add_course_head").show();
}
$(".course_0").show();
$(".rowCourse_0").hide();
$(".rowCourse_1").show();
});

$(".addCourse_1").click(function()
{
$(".course_1").show();
$(".rowCourse_1").hide();
$(".rowCourse_2").show();
});

$(".addCourse_2").click(function()
{
$(".course_2").show();
$(".rowCourse_2").hide();
$(".rowCourse_3").show();
});

$(".addCourse_3").click(function()
{
$(".course_3").show();
$(".rowCourse_3").hide();
$(".rowCourse_4").show();
});

$(".addCourse_4").click(function()
{
$(".course_4").show();
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
var campus   = $("#campus").val();

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
});

//----  Fields Formats ----\\
  
//jQuery(function($){
//$("#emp_cnic").mask("99999-9999999-9");    
//$("#mailing_contact").mask("9999-9999999");    
//$("#permanent_contact").mask("9999-9999999");    
//$("#mobile_1").mask("9999-9999999");    
//$("#mobile_2").mask("9999-9999999");    
//$("#emergency_contact").mask("9999-9999999");    
//$("#dependent_cnic").mask("99999-9999999-9");    
//$("#nominee_cnic").mask("99999-9999999-9");    
//$("#nominee_contact").mask("9999-9999999");    
//$("#reference_contact").mask("9999-9999999");    
//});
  
  $('#father_name').keyup(function () {  
        this.value = this.value.replace(/[^a-zA-Z \.]/g,''); 
  });
  $('#employee_name').keyup(function () {  
        this.value = this.value.replace(/[^a-zA-Z \.]/g,''); 
  });
  $('#dependant_name').keyup(function () {  
        this.value = this.value.replace(/[^a-zA-Z \.]/g,''); 
  });  
  $('#dependant_father_name').keyup(function () {  
        this.value = this.value.replace(/[^a-zA-Z \.]/g,''); 
  });  
  $('#nominee_name').keyup(function () {  
        this.value = this.value.replace(/[^a-zA-Z \.]/g,''); 
  });  
  $('#nominee_father_name').keyup(function () {  
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
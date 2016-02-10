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
                vacancy Management

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
              
           
              
            <div class="widget-box" style="margin-top:40px;">                          
              <div class="widget-header widget-header-blue widget-header-flat">
                <h4 class="lighter">Add Vacancy Detail </h4>
              </div>

              <div class="widget-body">
                <div class="widget-main">
                  <div class="row-fluid">
                    <form name="vacancyform" id="vacancyform" method="post" action="<?php echo base_url();?>vacancy/add_vacancy_record" enctype="multipart/form-data"                   
                    
                   <!--***************       Start HTML For Vacancy Create  ****************-->
                     <table id="additional_details" class="add_child" border="0" width="100%" cellpadding="7">
                              <tr>
                                      <td colspan="2">
                                          <h3 style="margin-top: 20px; font-size: 36px;" class="lighter block green">Vacancy Details</h3>   
                                      </td>
                                  </tr>
                                  <tr>
                                       <td>   
                                          <label style="width: 200px;" class="control-label">Company / Institute Name: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select onchange="getdepartment(this.value)" style="width: 301px;" id="record_company" name="record_company" required>                                 
                                              <option value="">-- Select Company --</option>
                                              <?php foreach ($company as $row) { ?>
                                                  <option <?php if (set_value('record_company') == $row['company_id']) echo 'selected="selected"'; ?> value="<?php echo $row['company_id'] ?>"><?php echo $row['company_name'] ?></option> 
                                              <?php } ?>																				
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_company'); ?></h6>
                                      </td>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Department: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select onchange="getDesignations(this.value)" style="width: 301px;" id="record_department" name="record_department"  required>
                                              <option selected="selected" value="">-- Select Department --</option>                                                        
                        </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_department'); ?></h6>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Designation: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="record_designation" name="record_designation" required>
                                              <option value="">-- Select Designation --</option>
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_designation'); ?></h6>
                                      </td>
                                       <td>  
                                          <label style="width: 190px;" class="control-label">Gender : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="gender" name="gender" required>
                                              <option value="">-- Select Gender --</option>																			
                                              <option value="Male">Male</option>																			
                                              <option value="Female">Female</option>																			
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('gender'); ?></h6>
                                      </td>

                                  </tr>
 <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Minimum Age: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <input style="width: 300px;" type="number" name="record_min_age" id="record_min_age" class="span5" required/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_min_age'); ?></h6>
                                      </td>                                      
                                      <td>
                                          <label style="width: 250px;" class="control-label">Maximum Age: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <input style="width: 300px;" type="number" name="record_max_age" id="record_max_age" class="span5"  required/>
                                           
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_max_age'); ?></h6>
                                      </td>
                                     
                                  </tr>
                                  <tr>
                                      
                                      <td>  
                                          <label style="width: 200px;" class="control-label">Job Type: </label>
                                          <select style="width: 301px;" id="ad_job_type" name="ad_job_type" required>
                                              <option value="">-- Select Type --</option>                                          
                                              <option value="Full Time/Permanent">Full Time/Permanent </option>																				
                                              <option value="Part Time/Permanent">Part Time/Permanent</option>
                                              <option value="Full Time/Contract">Full Time/Contract </option>																				
                                              <option value="Part Time/Contract">Part Time/Contract </option>
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('ad_job_type'); ?></h6>
                                      </td> 
                                       <td>   
                                          <label style="width: 140px;" class="control-label">Shift: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="shift" name="shift"  required>
                                              <option value="">-- Select Shift --</option>
                                              <option value="Morning">Morning</option>
                                              <option value="Evening">Evening</option>																				
                                              <option value="Night">Night</option>																				
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('shift'); ?></h6>
                                      </td> 
                                  </tr>
                                  <tr>
                                      
                                      <td>  
                                          <label style="width: 200px;" class="control-label">City: </label>
                                          <select style="width: 301px;" id="vc_city" name="vc_city" required>
                                              <option value="">-- Select City --</option>
                                               <?php foreach($cities as $rcity){ ?>
                                              <option value="<?php echo $rcity['city_id'];?>"><?php echo  $rcity['city_name']; ?></option>
                                              <?php } ?>
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('vc_city'); ?></h6>
                                      </td> 
                                       <td>   
                                          <label style="width: 140px;" class="control-label">Minimum Degree:<img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="min_degree" name="min_degree"  required>
                                              
                                              <option value="">-- Select Degree --</option>
                                             	 <?php foreach($degree as $rdegree){ ?>
                                              <option value="<?php echo $rdegree['dgree_id'];?>"><?php echo  $rdegree['dgree_name']; ?></option>
                                              <?php } ?>																	
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('min_degree'); ?></h6>
                                      </td> 
                                  </tr>
                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Minimum Experience: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <input style="width: 300px;" type="number" name="record_min_experience" id="record_min_experience" class="span5" required/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_min_experience'); ?></h6>
                                      </td>                                      
                                      <td>
                                          <label style="width: 250px;" class="control-label">Maximum Experience: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <input style="width: 300px;" type="number" name="record_max_experience" id="record_max_experience" class="span5"  required/>
                                           
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('record_max_experience'); ?></h6>
                                      </td>
                                     
                                  </tr>
                                  
                                 <tr>
                                     <td colspan="2">
                                              <label style="width: 250px;" class="control-label">job detail: </label>
                                              <textarea style="width: 870px; height: 100px" name="job_description" id="job_description"></textarea>
                                              <!--<input style="width: 884px; height: 100px" type="text" name="facility_description" id="facility_description" value="<?php echo set_value('facility_description'); ?>" class="span6" />-->
                                              <h6 style="color:red; margin: 0px;"><?php echo form_error('job_description'); ?></h6>
                                          </td>                                                                                        
                                      </tr>
                                  <tr>
                                      <td>   
                                          <label style="width: 140px;" class="control-label">Start Date: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <input style="width: 300px;" type="date"  name="start_date" id="start_date" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly required />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('start_date'); ?></h6>
                                      </td>
                                      <td>
                                          <label style="width: 250px;" class="control-label" >End Date:</label>
                                          <input style="width: 300px;" type="date" name="end_date" id="end_date" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly  />
                                            <h6 style="color:red; margin: 0px;"><?php echo form_error('end_date'); ?></h6>
                                      </td>
                                  </tr>

                                  <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">Minimum Salary: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <input style="width: 300px;" type="number" name="min_salary" id="min_salary" class="span5" required/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('min_salary'); ?></h6>
                                      </td>                                      
                                      <td>
                                          <label style="width: 250px;" class="control-label">Maximum Salary: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <input style="width: 300px;" type="number" name="max_salary" id="max_salary" class="span5"  required/>
                                           
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('max_salary'); ?></h6>
                                      </td>
                                      <td style="width: 50px; float:left; margin-left:-100px;" >
                                          <label style="width: 50px;" >
                                                <input  name="visible" type="checkbox" class="span2"  />
                                               <span class="lbl">invisible</span>
                                            </label>
                                      </td>
                                     
                                  </tr>

                                      <tr>
                                      <td>
                                          <label style="width: 250px;" class="control-label">No of Vacancies: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <input style="width: 300px;" type="number" name="no_vacancy" id="no_vacancy" class="span5" required/>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('no_vacancy'); ?></h6>
                                      </td>                                      
                                     
                                      <td>
                                          <label>
                                                    <input name="traveling-Required" type="checkbox" class="span5"  />
                                                    <span class="lbl">traveling Required</span>
                                            </label>
                                      </td>
                                  </tr>

                                  <tr>
                                       <td>   
                                          <label style="width: 140px;" class="control-label">Status: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
                                          <select style="width: 301px;" id="status" name="status"  required>
                                              <option value="">-- Select Status --</option>
                                              <option value="1">Active</option>
                                              <option value="0">In Active</option>																				
                                             																				
                                          </select>
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('shift'); ?></h6>
                                      </td> 
                                      <td></td>
                                  </tr>
                                  
                                
                                  
                                

                              </tbody>
                          </table>

                           <input style="margin-top:20px; float:right" type="submit" value="Add Vacancy" class="btn btn-info"/>
                      </div>
                  
                   
                 </div>
                  
                      </div><!--/widget-main-->
                     
                    </div><!--/widget-body-->
                    
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
                  url: "<?php echo base_url(); ?>vacancy/desigantion_by_department_id/?dept_id="+dept_id,
                  success: function(html){                    
                  $("#record_designation").html(html);
                 // $("#reporting_to").html(html);
                  }
              });
  }

//********** get department on change of companey

function  getdepartment(cmpny_id){
   $.ajax({
                  type: "GET",
                  url: "<?php echo base_url(); ?>vacancy/department_by_company_id/?com_id="+cmpny_id,
                  success: function(html){                    
                  $("#record_department").html(html);
                 
                  }
              });
  }

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
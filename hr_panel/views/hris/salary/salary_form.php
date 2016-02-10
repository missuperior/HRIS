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
                Grade/Class

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Add Grade/Salary</li>
        </ul><!--.breadcrumb-->

    </div>

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Add Grade/Salary
            </h1>
        </div><!--/.page-header--><br /><br />

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <h4 class="lighter">
                    <a href="" style="text-decoration: none" class="pink">
                        <?php echo $this->session->userdata('error');
                        $this->session->unset_userdata('error');
                        ?>
                    </a>
                    <a href="" style="text-decoration: none" class="green">
                        <?php echo $this->session->userdata('success');
                        $this->session->unset_userdata('success');
                        ?>
                    </a>
                </h4>

                <?php $attributes = array('id' => 'designationForm', 'class' => 'form-horizontal');
                echo form_open('hris/add_salary', $attributes);
                ?>
                
                
                
                
                
                
                    <div class="control-group">
                    <label class="control-label" for="form-field-1">Company :</label>

                    <div class="controls">
                        <select style="width: 230px;" id="company" name="company">                                 
                  <option value="">-- Select Campany --</option>
                  <?php foreach ($company as $row_c) { ?>
                    <option value="<?php echo $row_c['company_id'] ?>"><?php echo $row_c['company_name'] ?></option> 
<?php } ?>																				
                </select>
                        <h6 style="color: red;"><?php echo form_error('title'); ?></h6>
                         <div id="disp"></div>
                         <div id="designation_disp"></div>
                    </div>
                    
                   
                </div>
                
                
                
                
                
                
                <div class="control-group">
                    <label class="control-label" for="form-field-1">Grade :</label>

                    <div class="controls">
                        <select id="grade" name="grade">
                            <option value="">Select Grade</option>
                            <?php foreach ($grades as $grade) { ?>
                                <option value="<?php echo $grade['grade_id']; ?>"><?php echo $grade['class']; ?></option>
<?php } ?>

                        </select>
                        <h6 style="color: red;"><?php echo form_error('title'); ?></h6>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="form-field-1">Level :</label>

                    <div class="controls">
                        <select id="level" name="level[]" multiple size="5">
                            <option value="">Select Level</option>
                            <?php foreach ($levels as $level) { ?>
                                <option value="<?php echo $level['level_id']; ?>"><?php echo $level['title']; ?></option>
<?php } ?>

                        </select>
                        <h6 style="color: red;"><?php echo form_error('title'); ?></h6>
                    </div>
                </div>
                <br /><br />
                <hr size="5px" color="gray">
                <div class="control-group">
                    <label class="control-label" for="form-field-1">Benefit :</label>

                    <div class="controls">

<?php foreach ($benefits as $ben) { ?>
                            <input type="checkbox" value="<?php echo $ben['benefit_id'] ?>" name="benefits[]" style="opacity: 1; position: relative;" >
                            &nbsp;&nbsp;  <input type="text" name="<?php echo $ben['benefit_id'] ?>_benefit_value" placeholder="<?php echo $ben['title'].'( '.$ben['default_value'].' ) '; ?>">
                           
                            <br/>
<?php } ?>


                        <h6 style="color: red;"><?php echo form_error('title'); ?></h6>
                    </div>
                </div>
                <br /><br />
                <hr size="5px" color="gray">
                <div class="control-group">
                    <label class="control-label" for="form-field-1">Salary :</label>

                    <div class="controls">

                      <input type="text" id="min_sal" name="min_sal" placeholder="Min Salary" class='txtboxToFilter'><br/>
                      <input type="text" id="mid_sal" name="mid_sal"  placeholder="Mid  Salary" class='txtboxToFilter'>   <br/>
                      <input type="text" id="max_sal" name="max_sal"  placeholder="Max Salary" class='txtboxToFilter'><br/>
                      <input type="text" id="sub_scale" name="sub_scale"  placeholder="Sub-Scale Salary" class='txtboxToFilter'><br/>

                        <h6 style="color: red;"><?php echo form_error('title'); ?></h6>
                    </div>
                </div>
                <br /><br />

                <div class="form-actions">
                    <button class="btn btn-info">
                        <i class="icon-ok bigger-150"></i>
                        Save
                    </button>

                </div><!--PAGE CONTENT ENDS-->

<?php echo form_close(); ?>

            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->   
</div><!--/.main-container-->

<script type="text/javascript">
    $(document).ready(function () {
        
        
          $('#company').change(function () {
    
    
    
    var company = this.value;
      //alert(company);
      $.ajax({
        type: "GET",
        url: "<?php echo site_url() ?>hris/get_ajax_salary/?company_id=" + company+'&page_name=salary',
        success: function (html) {
          $("#disp").html(html);
        }


      });
      return false;


    });
        
        
        $(".txtboxToFilter").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A
                            (e.keyCode == 65 && e.ctrlKey === true) ||
                            // Allow: Ctrl+C
                                    (e.keyCode == 67 && e.ctrlKey === true) ||
                                    // Allow: Ctrl+X
                                            (e.keyCode == 88 && e.ctrlKey === true) ||
                                            // Allow: home, end, left, right
                                                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                                        // let it happen, don't do anything
                                        return;
                                    }
                                    // Ensure that it is a number and stop the keypress
                                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                        e.preventDefault();
                                    }
                                });
                    });
            $('#designationForm').validate({
                errorElement: 'span',
                errorClass: 'help-inline',
                focusInvalid: false,
                rules: {
                    title: {
                        required: true
                    },
                    type: {
                        required: true
                    },
                    default_value: {
                        required: true,
                        number: true
                    },
                     type: {
                        required: true
                    },
                    min_sal: {
                        required: true
                    },
                    mid_sal: {
                        required: true
                    },
                    max_sal: {
                        required: true
                    },
                    sub_scale: {
                        required: true
                    },
                    grade:{
                       required: true 
                    },
                    level:{
                       required: true 
                    },
                    company:{
                       required: true  
                    },
                    department :{
                        required: true  
                    }
                },
                highlight: function (e) {
                    $(e).closest('.control-group').removeClass('info').addClass('error');
                },
                submitHandler: function (form) {
                    document.designationForm.action = "<?php //echo base_url();   ?>hris/add_benefit";
                    document.designationForm.submit();
                }
            });

            jQuery(function ($) {
                //$("#default_value").mask("99999-9999999-9");
            });
            
            
            function getDesignation(dep){
               company = $('#company').val();
                   $.ajax({
        type: "GET",
        url: "<?php echo site_url() ?>hris/get_ajax_designation/?company_id=" + company+'&department='+dep,
        success: function (html) {
          $("#designation_disp").html(html);
        }


      });
            }

</script> 
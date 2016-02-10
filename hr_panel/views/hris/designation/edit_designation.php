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
        Designation

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Edit Designations</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Edit Designations
      </h1>
    </div><!--/.page-header--><br /><br />

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->
        
        <h4 class="lighter">
           <a href="" style="text-decoration: none" class="pink">
                <?php echo $this->session->userdata('error_msg'); $this->session->unset_userdata('error_msg'); ?>
            </a>
        </h4>

        <?php $attributes = array('id' => 'designationForm', 'class' => 'form-horizontal');
              echo form_open('hris/update_designation', $attributes); ?>
        
         <div class="control-group">
            <label class="control-label" for="state">Company :</label>
        <div class="controls">
                <span class="span12">
                    <select style="width: 220px;" id="department" name="department" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select Company --</option>
                        <?php foreach ($company as $row){?>
                        <option value="<?php echo $row['company_id']?>"><?php echo $row['company_name']?></option> 
                        <?php }?>																			
                    </select>
                  <h6 style="color: red;"><?php echo form_error('company'); ?></h6>
                  </span>
            </div>
            </div>
        
        <div class="control-group">
            <label class="control-label" for="state">Department :</label>

            <div class="controls">
                <span class="span12">
                    <select style="width: 220px;" id="department" name="department" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select Department --</option>
                        <?php foreach ($department as $row){?>
                        <option <?php if($row['department_id'] == $designation[0]['department_id']) echo "selected='selected'"; ?> value="<?php echo $row['department_id']?>"><?php echo $row['department_name']?></option> 
                        <?php }?>																			
                    </select>
                  <h6 style="color: red;"><?php echo form_error('department'); ?></h6>
                  </span>
            </div>
        </div>
        
        <div class="control-group">
          <input type="hidden" name="designation_id" value="<?php echo $designation[0]['designation_id']?>" />
          <label class="control-label" for="form-field-1">Designation :</label>

          <div class="controls">
            <input type="text" id="designation_title" name="designation_title" value="<?php echo $designation[0]['designation_title']?>" placeholder="e.g: Human Resource" />
            <h6 style="color: red;"><?php echo form_error('designation_title'); ?></h6>
          </div>
        </div>
        
        
        
        <br /><br />
  
        <div class="form-actions">
          <button class="btn btn-info">
            <i class="icon-ok bigger-150"></i>
              Update
          </button>

      </div><!--PAGE CONTENT ENDS-->
      
      <?php echo form_close(); ?>
      
    </div><!--/.span-->
  </div><!--/.row-fluid-->
</div><!--/.page-content-->   
</div><!--/.main-container-->

<script type="text/javascript">
    $('#designationForm').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            designation_title: { 
                required: true
            },
            department: { 
                required: true
            }
        },                
        highlight: function(e) {
            $(e).closest('.control-group').removeClass('info').addClass('error');
        },
        submitHandler: function(form) {
            document.designationForm.action = "<?php echo base_url(); ?>hris/update_designation";
            document.designationForm.submit();
        }
    });

</script> 
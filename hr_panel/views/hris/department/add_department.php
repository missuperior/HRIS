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
        Department

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Add Department</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Add Department
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

        <?php $attributes = array('id' => 'departmentForm', 'class' => 'form-horizontal');
              echo form_open('hris/add_department', $attributes); ?>
        
        <div class="control-group">
            <label class="control-label" for="state">Company :</label>

            <div class="controls">
                <span class="span12">
                    <select style="width: 220px;" id="company" name="company" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select Company --</option>                                                        
                        <?php foreach ($company as $row){?>
                        <option value="<?php echo $row['company_id']?>"><?php echo $row['company_name']?></option> 
                        <?php }?>																			
                    </select>
                </span>
              <h6 style="color:red; margin: 0px;"><?php echo form_error('roles'); ?></h6>
            </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="form-field-1">Department :</label>

          <div class="controls">
            <input type="text" id="department_name" name="department_name" placeholder="e.g: Human Resource" />
            <h6 style="color:red; margin: 0px;"><?php echo form_error('department_name'); ?></h6>
          </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="state">Role :</label>

            <div class="controls">
                <span class="span12">
                    <select style="width: 220px;" id="roles" name="roles" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select Role --</option>                                                        
                        <?php foreach ($roles as $row){?>
                        <option value="<?php echo $row['account_role_id']?>"><?php echo $row['role_title']?></option> 
                        <?php }?>																			
                    </select>
                </span>
              <h6 style="color:red; margin: 0px;"><?php echo form_error('roles'); ?></h6>
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
    $('#departmentForm').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            company: { 
                required: true
            },
            department_name: { 
                required: true
            },
            roles: { 
                required: true
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
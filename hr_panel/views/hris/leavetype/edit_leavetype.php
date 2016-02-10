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
        Leave

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Add Leave Type</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Update Leave Type
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

        <?php $attributes = array('id' => 'companyForm', 'class' => 'form-horizontal');
              echo form_open('hris/update_leavetype', $attributes); ?>
         <input type="hidden" name="leave_type_id" value="<?php echo $leave[0]['leaveid']; ?>" />
        <div class="control-group">
          <label class="control-label" for="form-field-1">Leave Type  :</label>

          <div class="controls">
              
            <input type="text" id="leave_type_name" name="leave_type_name" value="<?php echo $leave[0]['leavetype']; ?>" placeholder="" />
            <h6 style="color:red; margin: 0px;"><?php echo form_error('leave_type_name'); ?></h6>
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
    $('#companyForm').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            company_name: { 
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
            document.companyForm.action = "<?php //echo base_url(); ?>hris/add_company";
            document.companyForm.submit();
        }
    });

</script> 
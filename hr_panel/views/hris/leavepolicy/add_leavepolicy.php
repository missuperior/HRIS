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
        Leave Policy

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Add Leave Policy</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Add Leave Policy
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
              echo form_open('hris/add_leave_policy', $attributes); ?>
         <div class="control-group">
            <label class="control-label" for="state">Company :</label>
 <?php if( $this->session->userdata('company_id')=='0' ){ ?>
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
                      <?php } else { ?>
            <div class="controls">
                <span class="span12">
                    <select style="width: 220px;" id="company" name="company" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select Company --</option>                                                        
                           <option value="<?php echo $this->session->userdata('company_id'); ?>"><?php echo$this->session->userdata('company_name'); ?></option> 																			
                    </select>
                </span>
              <h6 style="color:red; margin: 0px;"><?php echo form_error('roles'); ?></h6>
            </div>
            
                   
                      <?php } ?>
           
        </div>
         <div class="control-group">
            <label class="control-label" for="state">Leave type :</label>

        <div class="controls">
                <span class="span12">
                    <select style="width: 220px;" id="company" name="leavetype" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select Leave Type --</option>                                                        
                        <?php foreach ($leavetype as $row){?>
                        <option value="<?php echo $row['leaveid']?>"><?php echo $row['leavetype']?></option> 
                        <?php }?>																			
                    </select>
                </span>
              <h6 style="color:red; margin: 0px;"><?php echo form_error('roles'); ?></h6>
            </div>
         </div>
        <div class="control-group">
          <label class="control-label" for="form-field-1">Leave Policy count:</label>

          <div class="controls">
              <input type="number" id="leavecount" name="leavecount" placeholder="" />
            <h6 style="color:red; margin: 0px;"><?php echo form_error('leavecount'); ?></h6>
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
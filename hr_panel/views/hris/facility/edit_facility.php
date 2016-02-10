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
        Facility

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Edit Facility</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Edit Facility
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
        <?php foreach($facilities as $facility) { ?>
        <?php $attributes = array('id' => 'cityForm', 'class' => 'form-horizontal');
              echo form_open('hris/update_facility', $attributes); ?>
        <div class="control-group">
          <label class="control-label" for="form-field-1">Add Facility :</label>

          <div class="controls">
            <input type="text" id="city_name" name="facility_name" value="<?php echo $facility['facility']; ?>" placeholder="" />
            <input type="hidden" name="facility_id" value="<?php echo $facility['facility_id']; ?>"/>
            <h6 style="color:red; margin: 0px;"><?php echo form_error('facility_name'); ?></h6>
          </div>
        </div>
        
        <?php } ?>
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
    $('#cityForm').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            city_name: { 
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
            document.cityForm.action = "<?php //echo base_url(); ?>hris/add_city";
            document.cityForm.submit();
        }
    });

</script> 
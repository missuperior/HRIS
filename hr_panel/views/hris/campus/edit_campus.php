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
        city

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Edit Campus</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Edit Campus
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
        
        <?php $attributes = array('id' => 'campusForm', 'class' => 'form-horizontal');
              echo form_open('hris/update_campus', $attributes); ?>
        <?php foreach($campus as $data) { ?>
        <div class="control-group">
          <label class="control-label" for="form-field-1">Campus:</label>

          <div class="controls">
            <input type="text" id="city_name" name="campus_name" value="<?php echo $data['campus_name']; ?>" placeholder="" />
            <input type="hidden" name="campus_id" value="<?php echo $data['campus_id']; ?>"/>
            <h6 style="color:red; margin: 0px;"><?php echo form_error('campus_name'); ?></h6>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="form-field-1">Campus Code:</label>

          <div class="controls">
            <input type="text" id="campus_code" name="campus_code" value="<?php echo $data['campus_code']; ?>" placeholder="" />
            <h6 style="color:red; margin: 0px;"><?php echo form_error('campus_code'); ?></h6>
          </div>
        </div>
        
        <div class="control-group">
            <div class="control">
            <label class="control-label" for="form-field-1">City:</label>
                <span class="span3" style="margin-left: 21px !important;">
                    <select style="width: 220px;" id="company" name="city_id" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select City --</option>                                                        
                        <?php foreach ($cities as $row){?>
                        <option value="<?php echo $row['city_id']?>" <?php if($row['city_id'] == $data['city_id']){echo "selected=selected";}?>><?php echo $row['city_name']?></option> 
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
              Update
          </button>

      </div><!--PAGE CONTENT ENDS-->
      <?php } ?>
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
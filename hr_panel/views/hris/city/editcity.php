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
      <li class="active">Edit city</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Edit city
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

        <?php $attributes = array('id' => 'cityForm', 'class' => 'form-horizontal');
              echo form_open('hris/update_city', $attributes); ?>
        
        <div class="control-group">
          <label class="control-label" for="email">City Name:</label>
            
          <div class="controls">
            <div class="span12">
              <input style="width: 188px;" type="text" name="city_name" id="city_name" value="<?php echo $city[0]['city_name']; ?>" class="span5" />
              <input type="hidden" name="city_id" value="<?php echo $city[0]['city_id']; ?>"  class="input-xlarge">
              <h6 style="color:red; margin: 0px;"><?php echo form_error('city_name'); ?></h6>          
            </div>
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
  $('#cityForm').validate({
    errorElement: 'span',
    errorClass: 'help-inline',
    focusInvalid: false,
    rules: {
      city: {
        required: true
      }
    },
    
    highlight: function(e) {
      $(e).closest('.control-group').removeClass('info').addClass('error');
    },
    submitHandler: function(form) {
      document.validationForm.action = "<?php echo base_url(); ?>hris/update_city";
      document.validationForm.submit();
    }
  });
  
</script>  
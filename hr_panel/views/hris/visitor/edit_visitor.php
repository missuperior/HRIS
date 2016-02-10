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
        Visitor

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Add Visitor</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Edit Visitor
      </h1>
    </div><!--/.page-header--><br /><br />

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->

        <h4 class="lighter">
          <a href="" style="text-decoration: none" class="pink">
            <?php echo $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg'); ?>
          </a>
        </h4>

        <?php $attributes = array('id' => 'designationForm', 'class' => 'form-horizontal');
        echo form_open('hris/update_visitor', $attributes); ?>
        
        <input type="hidden" id="visitor_id" name="visitor_id" value="<?php echo $visitor->visitor_id; ?>" />
        
        <div class="control-group">
          <label class="control-label" for="form-field-1">Visitor Name :</label>

          <div class="controls">
            <input type="text" id="visitor_name" name="visitor_name" value="<?php echo $visitor->visitor_name; ?>" />
            <h6 style="color: red;"><?php echo form_error('visitor_name'); ?></h6>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="form-field-1">CNIC # :</label>

          <div class="controls">
            <input type="text" id="cnic" name="cnic" value="<?php echo $visitor->cnic; ?>" />
            <h6 style="color: red;"><?php echo form_error('cnic'); ?></h6>
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
      visitor_name: { 
        required: true
      },
      cnic: { 
        required: true
      }
    },                
    highlight: function(e) {
      $(e).closest('.control-group').removeClass('info').addClass('error');
    },
    submitHandler: function(form) {
      document.designationForm.action = "<?php //echo base_url();  ?>hris/add_visitor";
      document.designationForm.submit();
    }
  });
  
  jQuery(function($){
    $("#cnic").mask("99999-9999999-9");
  });
  
</script> 
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
        Benefit

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Edit Benefit</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Edit Benefit
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
        echo form_open('hris/edit_benefit', $attributes); ?>
        <input type="hidden" name="id" value="<?php echo $benefits[0]['benefit_id']; ?>">
        <div class="control-group">
          <label class="control-label" for="form-field-1">Title :</label>

          <div class="controls">
              <input type="text" id="title" name="title" value="<?php echo $benefits[0]['title']; ?>"/>
            <h6 style="color: red;"><?php echo form_error('title'); ?></h6>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label">Type :</label>

          <div class="controls">
            <input type="text" id="type" name="type" value="<?php echo $benefits[0]['type']; ?>"/>
            <h6 style="color: red;"><?php echo form_error('type'); ?></h6>
          </div>
        </div>
          <div class="control-group">
          <label class="control-label"  >Default Value :</label>

          <div class="controls">
            <input type="text" id="default_value" name="default_value" value="<?php echo $benefits[0]['default_value']; ?>"/>
            <h6 style="color: red;"><?php echo form_error('default_value'); ?></h6>
          </div>
        </div>

           <div class="control-group">
          <label class="control-label"  >Status :</label>

          <div class="controls">
            <select id="status" name="status">
                <option value="1" <?php if($benefits[0]['status']==1){ echo 'selected';} ?>>Active</option>
                <option value="0" <?php if($benefits[0]['status']==0){ echo 'selected';} ?>>De-active</option>
            </select>
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
      default_value:{
          required:true,
          number : true
      }
    },                
    highlight: function(e) {
      $(e).closest('.control-group').removeClass('info').addClass('error');
    },
    submitHandler: function(form) {
      document.designationForm.action = "<?php //echo base_url();  ?>hris/add_benefit";
      document.designationForm.submit();
    }
  });
  
  jQuery(function($){
    //$("#default_value").mask("99999-9999999-9");
  });
  
</script> 
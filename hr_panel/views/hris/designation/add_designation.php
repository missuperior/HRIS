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
      <li class="active">Add Designation</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Add Designation
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
        echo form_open('hris/add_designation', $attributes); ?>
        
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
                  <h6 style="color: red;"><?php echo form_error('company'); ?></h6>
                  </span>
            </div>
            </div>
        
        <div class="control-group">
                    <label class="control-label" for="state">Department :</label>
        <div id="dis">
                    <div class="controls">
                        <span class="span12">
                           <select multiple="" name="department[]" id="department" class="chzn-select" data-placeholder="Choose Department...">
<!--                            <select style="width: 220px;" id="department" name="department" class="select2" data-placeholder="Click to Choose...">-->
                              <option value="">-- Select Department --</option>     
                            </select>           
                          <h6 style="color: red;"><?php echo form_error('department'); ?></h6>
                        </span>
                    </div>
            </div>
                </div>
        
        <div class="control-group">
          <label class="control-label" for="form-field-1">Designation :</label>

          <div class="controls">
            <input type="text" id="designation_title" name="designation_title" placeholder="e.g: Project Manager" />
            <h6 style="color: red;"><?php echo form_error('designation_title'); ?></h6>
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
      document.designationForm.action = "<?php //echo base_url();  ?>hris/add_designation";
      document.designationForm.submit();
    }
  });
  
  $(function() {
    $(".chzn-select").chosen(); 
  });

</script> 
<script language="javascript">
    
    $(document).ready(function(){
       
        $('#company').change(function(){
           
            var company = this.value;
           //alert(company);
            $.ajax({
                    type: "GET",
                    url: "<?php echo site_url() ?>hris/get_company_dpt/?company_id="+company,
                    success: function(html){
                        $("#dis").html(html);
                    }
                        
                   
                });
                return false;
                
                
        });
     });
        
</script>
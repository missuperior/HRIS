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
        Employee Management

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Edit Deduction</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Edit Deduction
<!--        <small>
          <i class="icon-double-angle-right"></i>
          Common form elements and layouts
        </small>-->
      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
       <a href="" style="text-decoration: none" class="pink">
        </a>
    </h4>
    
    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->
        
        <?php 
        $attribute = array('id' => 'deductionForm', 'class' => 'form-horizontal');
        echo form_open('hris/update_deduction', $attribute); 
        ?>
        <input type="hidden" id="salary_id" name="salary_id" value="<?php echo $salary[0]['emp_salary_id']; ?>" />
        <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $salary[0]['emp_id']; ?>" />
        <input type="hidden" id="old_amount" name="old_amount" value="<?php echo $salary[0]['amount']; ?>" />
        <input type="hidden" id="old_type" name="old_type" value="<?php echo $salary[0]['type']; ?>" />
        
         <?php 
          if(empty($netSalary[0]['updated_current_salary'])){          
        ?>
            <input type="hidden" id="current_salary" name="current_salary" value="<?php echo $salary[0]['current_salary']; ?>" />
        <?php }else{?>
            <input type="hidden" id="updated_current_salary" name="updated_current_salary" value="<?php echo $netSalary[0]['updated_current_salary']; ?>" />
        <?php 
        }
        ?>
        
         <div class="control-group">
          <label class="control-label" for="form-field-1">Deduction : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>

          <div class="controls">
            <input type="text" id="deduction_amount" name="deduction_amount" value="<?php echo $salary[0]['amount'] ?>" placeholder="" onkeyup="this.value=formatCurrency(this.value);" />
            <h6 style="color:red; margin: 0px;"><?php echo form_error('deduction_amount'); ?></h6>
          </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="state">Type : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>

            <div class="controls">
                <span class="span12">
                    <select style="width: 248px;" id="deduction_type" name="deduction_type" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select Type --</option>  
                      <option value="Permanent" <?php if($salary[0]['type']=='Permanent') echo 'selected="Selected"'; ?>>Permanent</option>                                                        
                      <option value="Temporary" <?php if($salary[0]['type']=='Temporary') echo 'selected="Selected"'; ?>>Temporary</option>                                                        
                    </select>
                </span>
            <h6 style="color:red; margin: 0px;"><?php echo form_error('deduction_type'); ?></h6>
            </div>
        </div>
        
        <div id="deduction_date" class="control-group">
          <label class="control-label">Date : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
          
          <div class="controls">
            <div class="span12">
              <div class="control-group">
            <div class="row-fluid input-prepend">
              <input type="text" name="date" id="date" value="<?php echo $salary[0]['date'] ?>" style="width: 220px;" class="span10 date-picker" data-date-format="yyyy-mm-dd" />
              <span class="add-on">
                <i class="icon-calendar"></i>
              </span>
              <h6 style="color:red; margin: 0px;"><?php echo form_error('date'); ?></h6>                                                
            </div>
          </div>
              </div>
          </div>          
        </div>
                
        <div id="date_range" class="control-group">
          <label class="control-label" for="id-date-picker-1">Date From-To : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>
               
          <div class="controls">
            <div class="span12">
              <?php
              $arr[0] = $salary[0]['from_date'];  
              $arr[1] = $salary[0]['to_date'];  
              $range_date = implode("-", $arr);
              ?>
              <div class="control-group">
            <div class="row-fluid input-prepend">
              <span class="add-on">
                <i class="icon-calendar"></i>
              </span>
              <input class="span10" type="text" name="range_date" id="range_date" value="<?php echo $range_date?>" style="width: 220px;" />                                                
              <h6 style="color:red; margin: 0px;"><?php echo form_error('range_date'); ?></h6>
            </div>
          </div>
              </div>
          </div>          
        </div>
        
        <div class="control-group">
          <label class="control-label" for="form-field-1">Detail :</label>

          <div class="controls">
            <textarea cols="50" rows="5" name="deduction_detail">
              <?php echo $salary[0]['detail'] ?>
            </textarea>
            <h6 style="color:red; margin: 0px;"><?php echo form_error('deduction_detail'); ?></h6>
          </div>
        </div>
        
        <div class="form-actions">
          <button class="btn btn-info">
            <i class="icon-ok bigger-150"></i>
              Update
          </button>
      </div><!--PAGE CONTENT ENDS-->
      
      <?php echo form_close(); ?>        
                
        </div><!--PAGE CONTENT ENDS-->
      </div><!--/.span-->
    </div><!--/.row-fluid-->
  </div><!--/.page-content-->   
</div><!--/.main-container-->


   <script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/date-time/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/date-time/daterangepicker.min.js"></script>
    
<script type="text/javascript">
  
  $('#deductionForm').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            deduction_amount: { 
                required: true
            },
            deduction_type: { 
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
  
  $(document).ready(function(){ 
    var type = $('#deduction_type').val();
    if(type == 'Temporary')
    {        
      $('#date_range').show();
      $('#deduction_date').hide();
    }
    else
    {        
      $('#date_range').hide();
      $('#deduction_date').show();
    }

  });
  
  $( "#deduction_type" ).change(function() {    
    var type = $('#deduction_type').val();
    if(type == 'Temporary')
    {        
      $('#date_range').show();
      $('#deduction_date').hide();
    }
    else
    {        
      $('#date_range').hide();
      $('#deduction_date').show();
    }

  });
    
  
  $(function() {
    $('.date-picker').datepicker({
      changeMonth:true,
      changeYear:true
    });
                                			
  });
  
  // for chosen and date range
  $(".chzn-select").chosen(); 

  $('#range_date').daterangepicker().prev().on(ace.click_event, function(){
    $(this).next().focus();
  });
      
</script>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+','+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + '' + num + '');
}
//  End -->
</script>
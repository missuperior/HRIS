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
      <li class="active">Employee Deduction</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Employee Deduction
<!--        <small>
          <i class="icon-double-angle-right"></i>
          Common form elements and layouts
        </small>-->
      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
      <a href="" style="text-decoration: none" class="pink">                       
        <?php echo $this->session->userdata('success_msg');$this->session->unset_userdata('success_msg'); ?>
      </a>
    </h4>
    
    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->
        
        
        <table class="table table-striped table-bordered table-hover">
          <tbody>
        
              <tr>                                                                        
                <th>Code</th>
                <td><?php echo $employee[0]['emp_code']; ?></td>
              </tr>
              <tr>                                                                        
                <th>Name</th>
                <td><?php echo $employee[0]['employee_name']; ?></td>
              </tr>
              <tr>                                                                        
                <th>Department</th>
                <td><?php echo $employee[0]['department_name']; ?></td>
              </tr>
              <tr>                                                                        
                <th>Designation</th>
                <td><?php echo $employee[0]['designation_title']; ?></td>
              </tr>
              <tr>                                                                        
                <th>Net Salary</th>
                <td>
                <?php                
                  if(!empty($netSalary[0]['updated_current_salary']))
                  {
                    echo $netSalary[0]['updated_current_salary'];
                  }
                  else
                  {                    
                    echo $employee[0]['current_salary'];
                  }
                  ?></td>
              </tr>
              <tr>                                                                        
                <th>Joining Date</th>
                <td><?php echo date("d F, Y",strtotime($employee[0]['joining_date'])); ?></td>
              </tr>
                      
          </tbody>
        </table>
        
        <?php if(!empty($salary)){ ?>
        <div id="sal_history">
        <h3>Deduction History</h3>
        
        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Deduction</th>
              <th>Deduction Type</th>
              <th>Date</th>
              <th>From</th>
              <th>To</th>
              <th>Details</th>
              <th>Action</th>
            </tr>
          </thead>
                                          
          <tbody>
            <?php
            $i = 0;
            foreach ($salary as $row) {
              ?>
              <tr>                                                                                        
                <td><?php echo $i + 1; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td>
                <?php 
                  if(!empty($row['date'])){
                    echo date("d F, Y",strtotime($row['date'])); 
                  }
                  else
                  {
                    echo 'N/A';
                  }
                  ?>
                </td>
                <td>
                <?php 
                  if(!empty($row['from_date'])){
                    echo date("d F, Y",strtotime($row['from_date'])); 
                  }
                  else
                  {
                    echo 'N/A';
                  }
                  ?>
                </td>
                <td>
                <?php 
                  if(!empty($row['to_date'])){
                    echo date("d F, Y",strtotime($row['to_date'])); 
                  }
                  else
                  {
                    echo 'N/A';
                  }
                  ?>
                </td>
                <td><?php echo $row['detail']; ?></td>                          
            
                <td class="td-actions">
                  <div class="hidden-phone visible-desktop action-buttons">
                    <a class="green" href="<?php echo base_url() ?>hris/edit_deduction/<?php echo $row['emp_salary_id']; ?>/<?php echo $employee[0]['emp_id']; ?>">
                      <i class="icon-pencil bigger-130" title="Edit"></i>                                                            
                    </a>
                  </div>                                                   
                </td>
              </tr>
            <?php 
            $i++;
            } ?>
          </tbody>
        </table>
        </div>
        <?php } ?>
        
        
        <h3>Add Deduction</h3>
        
        <?php 
        $attribute = array('id' => 'deductionForm', 'class' => 'form-horizontal');
        echo form_open('hris/add_deduction', $attribute); 
        ?>
        <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $employee[0]['emp_id']; ?>" />
        <input type="hidden" id="current_salary" name="current_salary" value="<?php echo $employee[0]['current_salary']; ?>" />
        <input type="hidden" id="updated_current_salary" name="updated_current_salary" value="<?php echo $netSalary[0]['updated_current_salary']; ?>" />
        
         <div class="control-group">
          <label class="control-label" for="form-field-1">Deduction : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>

          <div class="controls">
            <input type="text" id="deduction_amount" name="deduction_amount" placeholder="" onkeyup="this.value=formatCurrency(this.value);" />
            <h6 style="color:red; margin: 0px;"><?php echo form_error('deduction_amount'); ?></h6>
          </div>
        </div>
        
        <div class="control-group">
            <label class="control-label" for="state">Type : <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>

            <div class="controls">
                <span class="span12">
                    <select style="width: 248px;" id="deduction_type" name="deduction_type" class="select2" data-placeholder="Click to Choose...">
                      <option value="">-- Select Type --</option>                                                        
                      <option value="Permanent">Permanent</option>                                                        
                      <option value="Temporary">Temporary</option>                                                        
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
                  <input type="text" name="date" id="date" value="<?php echo set_value('date'); ?>" style="width: 220px;" class="span10 date-picker" data-date-format="yyyy-mm-dd" />
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
              <div class="control-group">
                <div class="row-fluid input-prepend">
                  <span class="add-on">
                    <i class="icon-calendar"></i>
                  </span>                                                                                                                          
                  <input class="span10" type="text" name="range_date" id="range_date" style="width: 220px;" />                                                
                  <h6 style="color:red; margin: 0px;"><?php echo form_error('range_date'); ?></h6>                                                
                </div>
              </div>
            </div>
          </div>
        </div>
          
        <div class="control-group">
          <label class="control-label" for="form-field-1">Detail :</label>

          <div class="controls">
            <textarea cols="50" rows="5" name="deduction_detail"></textarea>
            <h6 style="color:red; margin: 0px;"><?php echo form_error('deduction_detail'); ?></h6>
          </div>
        </div>
        
        <div class="form-actions">
          <button class="btn btn-info">
            <i class="icon-ok bigger-150"></i>
              Save
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
    $('#date_range').hide();     
    $('#sal_history').hide();
    
    var history = $('#emp_id').val();
    if(history != '')
      {      
        $('#sal_history').show();   
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
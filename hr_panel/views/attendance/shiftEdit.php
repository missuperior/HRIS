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
        Shift Management

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Add Shift</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Shift Management
 <!--        <small>
           <i class="icon-double-angle-right"></i>
           Common form elements and layouts
         </small>-->
      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
      <a href="" style="text-decoration: none" class="pink">
        <?php
        echo $this->session->userdata('error_msg');
        $this->session->unset_userdata('error_msg');
        ?>
      </a>
    </h4>

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->


        <div class="widget-box">
          <div class="widget-header widget-header-small">
            <h5 class="lighter">Edit Shift</h5>
          </div>

          <div class="widget-body">
            <div class="widget-main" style="min-height: 40px">

       
<form target="_blank" id="employeeform" method="POST" action="<?php echo  base_url()?>attendance/EditShift" />
              <div class="control-group">
<!--                <label class="control-label" for="form-input-readonly">Readonly field</label>-->

                <div class="controls">
                  <input  id="title" name="title" value="<?php echo $shift[0]['title']; ?>" type="text">
                  &nbsp; &nbsp;
                  <input id="id-disable-check" name="is_flex" type="checkbox"  <?php if($shift[0]['shift_type']=='flexible')echo 'checked'; ?>>
                  <label class="lbl" for="id-disable-check"> Is it Flexible!</label>
                  
                  
                  
                  
                  <div id="flex_block" style="display: <?php if($shift[0]['shift_type']=='flexible') echo 'block'; else echo 'none' ; ?>;">
                  <div class="controls" >
                     <label class="control-label" for="form-input-readonly">Flexible Timing Start</label>
                <input name="ftime1" value="<?php echo $shift[0]['flexible_start']; ?>" style="display:block;" id="time1"/>
              </div>
                    <div class="controls">
                     <label class="control-label" for="form-input-readonly">Flexible Timing End</label>
                <input name="ftime2" value="<?php echo $shift[0]['flexible_end']; ?>" style="display:block;" id="time2"/>
              </div>
                  </div>
                  
                    <div id="fix_block" style="display: <?php if($shift[0]['shift_type']=='regular') echo 'block'; else echo 'none' ; ?>;">
                  <div class="controls" >
                     <label class="control-label" for="form-input-readonly">Fix Timing Start</label>
                <input name="dtime1" value="<?php echo $shift[0]['In']; ?>" style="display:block;" id="time1"/>
              </div>
                    <div class="controls">
                     <label class="control-label" for="form-input-readonly">Fix Timing End</label>
                <input name="dtime2" value="<?php echo $shift[0]['Out']; ?>" style="display:block;" id="time2"/>
              </div>
                  </div>
                
                  
                </div>

<div class="controls">
  <label class="control-label" for="form-input-readonly">Relaxation Minutes</label>
  <select id="relaxation" name="relaxation">
    <?php for($i=5;$i<55;){ ?>
    
    <option value="<?php echo $i; ?>" <?php if($shift[0]['relaxation']==$i) echo 'selected';?>><?php echo $i; ?></option>;
   <?php   $i=  $i+5;
    }?>

  </select>
  
</div>
<div class="controls">
  <label class="control-label" for="form-input-readonly">Relaxation Minutes Total occurrences</label>
  <select id="relaxation-occur" name="relaxation-occur">
    <?php for($i=1;$i<16;$i++){ ?>
      <option value="<?php echo $i; ?>" <?php if($shift[0]['total_occuer']==$i) echo 'selected'; ?>><?php echo $i; ?></option>';
     
   <?php }?>

  </select>
  
</div>
<div class="controls">
  <label class="control-label" for="form-input-readonly">Shift Type</label>
  <select id="shift_schedule" name="shift_schedule">
    <option value="M" <?php if($shift[0]['shift_schedule']=='M') echo 'selected'; ?>>Morning</option>
    <option value="E" <?php if($shift[0]['shift_schedule']=='E') echo 'selected'; ?>>Evening</option>
    <option value="N" <?php if($shift[0]['shift_schedule']=='N') echo 'selected'; ?>>Night</option>
  </select>
  
</div>


<div class="controls">
  <label class="control-label" for="form-input-readonly">Total Working Hours</label>
  <input type="text" id="total_hours" name="total_hours" value="<?php echo $shift[0]['working_hours']; ?>">
</div>
<div class="controls">
  <label class="control-label" for="form-input-readonly">Off days</label>
 <select name="off-days[]" multiple >

   
   <option value="sat" <?php if(in_array('sat', $offDays)) echo 'selected="selected"' ;  ?>>Saturday</option>
  <option value="sun" <?php if(in_array('sun', $offDays)) echo 'selected="selected"'; ?>>Sunday</option>
  <option value="mon" <?php if(in_array('mon', $offDays)) echo 'selected="selected"'; ?>>Monday</option>
  <option value="tue" <?php if(in_array('tue', $offDays)) echo 'selected="selected"'; ?>>Tuesday</option>
<option value="wed" <?php if(in_array('wed', $offDays)) echo 'selected="selected"'; ?>>Wednesday</option>
<option value="thr" <?php if(in_array('thr', $offDays)) echo 'selected="selected"'; ?>>Thursday</option>
<option value="fri" <?php if(in_array('fri', $offDays)) echo 'selected="selected"'; ?>>Friday</option>
 </select> 
</div>
 <button id="search_attendance" class="btn btn-purple btn-small" style="margin-top:0px;" >
                           Update Shift
                           
                        </button>

              </div>
<input type="hidden" name="id" value="<?php echo $shift[0]['shiftId'];?>">
          </form>

            </div>
          </div>
        </div>


        <div id="disp"></div>


      </div><!--PAGE CONTENT ENDS-->
    </div><!--/.span-->
  </div><!--/.row-fluid-->
</div><!--/.page-content-->   
</div><!--/.main-container-->

<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
<!--<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>-->

<script language="javascript">
  // $.noConflict();
  $(document).ready(function () {
    $('input[id="time1"]').ptTimeSelect();
    $('input[id="time2"]').ptTimeSelect();
    $('#time input').ptTimeSelect({
      containerClass: "timeCntr",
      containerWidth: "350px",
      setButtonLabel: "Select",
      minutesLabel: "min",
      hoursLabel: "Hrs"
    });
    $('#company').change(function () {

      var company = this.value;
      //alert(company);
      $.ajax({
        type: "GET",
        url: "<?php echo site_url() ?>hris/get_ajax_salary/?company_id=" + company,
        success: function (html) {
          $("#disp").html(html);
        }


      });
      return false;


    });
  });
  $(function () {
    $('.date-picker').datepicker({
      changeMonth: true,
      changeYear: true

    });

    $('.date-picker').on('changeDate', function (ev) {
      $(this).datepicker('hide');

    });
  });
  $('#employeeform').validate({
    errorElement: 'span',
    errorClass: 'help-inline',
    focusInvalid: false,
    rules: {
      department: {
        required: true
      },
      company: {
        required: true
      }
    },
    att_date: {
      required: true
    },
    submitHandler: function (form) {
      document.validationForm.action = "<?php echo base_url(); ?>attendance/add_initial_form_data";
      document.validationForm.submit();
    }

  });
</script>

<script type="text/javascript" language="javascript" class="init">
  $(document).ready(function () {
    $('#example').DataTable({
      dom: 'T<"clear">lfrtip',
      tableTools: {
        "sRowSelect": "single"
      }
    });
  });
  
  
  $('#id-disable-check').change(function(){
     if(this.checked) {
       $('#fix_block').hide();
        $('#flex_block').show();
         
    }else{
      $('#flex_block').hide();
      $('#fix_block').show();
    }
   
  });
  
</script>
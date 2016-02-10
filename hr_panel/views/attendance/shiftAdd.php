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
            <h5 class="lighter">Add Shift</h5>
          </div>

          <div class="widget-body">
            <div class="widget-main" style="min-height: 40px">

       
<form target="_blank" id="employeeform" method="POST" action="<?php echo  base_url()?>attendance/saveShift" />
              <div class="control-group">
<!--                <label class="control-label" for="form-input-readonly">Readonly field</label>-->

                <div class="controls">
                  <input  id="title" name="title" type="text" placeholder="Shift Title">
                  &nbsp; &nbsp;
                  <input id="id-disable-check" name="is_flex" type="checkbox" >
                  <label class="lbl" for="id-disable-check"> Is it Flexible!</label>
                  
                  <div id="flex_block" style="display: none;">
                  <div class="controls" >
                     <label class="control-label" for="form-input-readonly">Flexible Timing Start</label>
                <input name="ftime1" value="" style="display:block;" id="time1"/>
              </div>
                    <div class="controls">
                     <label class="control-label" for="form-input-readonly">Flexible Timing End</label>
                <input name="ftime2" value="" style="display:block;" id="time2"/>
              </div>
                  </div>
                    <div id="fix_block" style="display: block;">
                  <div class="controls" >
                     <label class="control-label" for="form-input-readonly">Fix Timing Start</label>
                <input name="dtime1" value="" style="display:block;" id="time1"/>
              </div>
                    <div class="controls">
                     <label class="control-label" for="form-input-readonly">Fix Timing End</label>
                <input name="dtime2" value="" style="display:block;" id="time2"/>
              </div>
                  </div>
                  
                </div>

<div class="controls">
  <label class="control-label" for="form-input-readonly">Relaxation Minutes</label>
  <select id="relaxation" name="relaxation">
    <?php for($i=5;$i<55;){ 
      echo '<option value="'.$i.'">'.$i.'</option>';
      $i=  $i+5;
    }?>

  </select>
  
</div>
<div class="controls">
  <label class="control-label" for="form-input-readonly">Relaxation Minutes Total occurrences</label>
  <select id="relaxation-occur" name="relaxation-occur">
    <?php for($i=1;$i<16;$i++){ 
      echo '<option value="'.$i.'">'.$i.'</option>';
     // $i=  $i+5;
    }?>

  </select>
  
</div>
<div class="controls">
  <label class="control-label" for="form-input-readonly">Shift Type</label>
  <select id="shift_schedule" name="shift_schedule">
    <option value="M">Morning</option>

    <option value="E">Evening</option>
    <option value="N">Night</option>
  </select>
  
</div>
<div class="controls">
  <label class="control-label" for="form-input-readonly">Total Working Hours</label>
  <input type="text" id="total_hours" name="total_hours">
</div>
<div class="controls">
  <label class="control-label" for="form-input-readonly">Off days</label>
 <select name="off-days[]" multiple >
  <option value="sat">Saturday</option>
  <option value="sun">Sunday</option>
  <option value="mon">Monday</option>
  <option value="tue">Tuesday</option>
<option value="wed">Wednesday</option>
<option value="thr">Thursday</option>
<option value="fri">Friday</option>
 </select> 
</div>
 <button id="search_attendance" class="btn btn-purple btn-small" style="margin-top:0px;" >
                           Add Shift
                           
                        </button>

              </div>

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
    $('input[name="ftime1"]').ptTimeSelect();
    $('input[name="ftime2"]').ptTimeSelect();
    $('input[name="dtime1"]').ptTimeSelect();
    $('input[name="dtime2"]').ptTimeSelect();
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
      } ,
    title: {
      required: true
    }
    },
     highlight: function(e) {
      $(e).closest('.control').removeClass('info').addClass('error');
    }
        ,
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
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
        Attendance Management

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Absent Marking</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Absent Marking

      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
       <a href="" style="text-decoration: none" class="pink">
                <?php
                echo $this->session->userdata('error_msg');
                $this->session->unset_userdata('error_msg');
                ?>
            </a>
             <a href="" style="text-decoration: none" class="green">
                <?php
                echo $this->session->userdata('success');
                $this->session->unset_userdata('success');
                ?>
            </a>
    </h4>

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->
        
        
           
        
        
     
        	<div class="row-fluid">
								<div class="span12 widget-container-span">
									<div class="widget-box">
										<div class="widget-header">
											<h5 class="smaller">Absent Marking </h5>

                                <div class="widget-toolbar no-border">
                                        <ul class="nav nav-tabs" id="myTab">
                                                <li class="active">
                                                        <a data-toggle="tab" href="#home">General </a>
                                                </li>

                                                <li>
                                                        <a data-toggle="tab" href="#profile">Search By Code</a>
                                                </li>
                                                 <li>
                                                        <a data-toggle="tab" href="#leave">Mark Attendance</a>
                                                </li>

                                        </ul>
                                </div>
										</div>
 <form id="employeeform" method="POST" action="<?php echo base_url() ?>attendance/parse_raw_attendance" />
 <input type="hidden" name="from" value="manual">
										<div class="widget-body">
											<div class="widget-main padding-6">
												<div class="tab-content">
													<div id="home" class="tab-pane in active">
														 <?php if( $this->session->userdata('company_id')=='0' ){ ?>
                        <div class="row-fluid" style="float:left; width:190px">
                            <select style="width: 180px;" id="company" name="company">                                 
                              <option value="">-- Select Campany --</option>
                              <?php foreach ($company as $row_c){?>
                                  <option value="<?php echo $row_c['company_id']; ?>"><?php echo $row_c['company_name']; ?></option> 
                              <?php }?>																				
                            </select>
                        </div>
                      <?php } else { ?>
                      <div class="row-fluid" style="float:left; width:190px;">
                          <select style="width: 180px;" id="company" name="company">                                 
                              <option value="">-- Select Campany --</option>
                             
                                  <option value="<?php echo $this->session->userdata('company_id'); ?>"><?php echo$this->session->userdata('company_name'); ?></option> 
                              																			
                            </select>
                        </div>
                      <?php } ?>
                        
                        <div id="disp"></div>
                               <div id="employee_block"></div>
                            </div>

                            <div id="profile" class="tab-pane">
                               <div class="controls"style="margin-left:100px;">
                                   <label class="control-label" for="form-input-readonly">Employee Code: &nbsp;&nbsp;</label>
                            <input type="text" id="code" name="code" placeholder="Enter Employee Code">
                           
                            <a onclick="getempbycode()"  class="btn btn-purple btn-small" style="margin-top:-10px;" >
                            Search
                            <i class="icon-search icon-on-right bigger-110"></i>
                        </a>
                               </div>
                                <div id="employee_show"></div>

                            </div>
                <div id="leave" class="tab-pane">
                               
                              

                       
                      
             <div class="row-fluid" style="float:left; width:190px">
        
<!--              <label style="width: 100px;" class="row-fluid">Start Date: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>-->
                                         <input style="width: 150px;" type="date"  name="att_date" placeholder="Attendance Date" id="att_date" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly required />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('joining_date'); ?></h6>
             
             </div>
                               <div id="employee_status"></div>            
                          <button  id="check_attendance_status" class="btn btn-purple btn-small" style="margin-top:0px; margin-right:25px; float:left;" >
                                   Attendance Status

                                </button>
                      <div id="att_status_div" style="display: none;">


     <div class="row-fluid" id="date_limit"> 

                                    <div id="fix_block" >
                                        <div class="controls" style="float:left; width:110px;margin-right:25px;" >
                                         <input name="dtime1" placeholder="Time IN" value="" id="time1" />
                                        </div>
                                        <div class="controls" style="float:left; width:110px;">
                                         <input placeholder="Time OUT" style="width:110px;" name="dtime2" value="" id="time2"/>
                                        </div>
                                    </div>
  <button  id="search_attendance" class="btn btn-purple btn-small" style="margin-top:0px;float:right;width:140px;" >
                                    Mark Attendance

                                </button>
                                </div>

                        
</div>

                            </div>
                      
               </form>

                            </div>

                            </div>
</div>
                                                                                 
										</div>
									</div>
                                                                </div>
							</div>
   
        </div><!--PAGE CONTENT ENDS-->
      </div><!--/.span-->
    </div><!--/.row-fluid-->
  </div><!--/.page-content-->   
</div><!--/.main-container-->

<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.ptTimeSelect.js"></script>
<script language="javascript">
     // $.noConflict();
    $(document).ready(function(){
        
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
        
        
       $('#check_attendance_status').click(function () {

            var company = this.value;
            //alert(company);
            $.ajax({
                type: "POST",
                data: {
                emp_id: $('#employee').val(),
                att_date: $('#att_date').val(),
                
            },
                url: "<?php echo site_url() ?>attendance/check_emp_att_status",
                success: function (html) {
                    $("#employee_status").html(html);
                    $('#att_status_div').show();
                  //  $('#check_attendance_status').hide();
                }


            });
            return false;


        });
        $('#company').change(function(){
          
            var company = this.value;
           //alert(company);
            $.ajax({
                    type: "GET",
                    url: "<?php echo site_url() ?>hris/get_ajax_salary/?company_id="+company+'&page_name=report',
                    success: function(html){
                        $("#disp").html(html);
                    }
                        
                   
                });
                return false;
                
                
        });
        
        
            
        
     });
         $(function() {
    $('.date-picker').datepicker({
      
      changeMonth:true,
      changeYear:true
      
    }); 
    
    $('.date-picker').on('changeDate', function(ev){
    $(this).datepicker('hide');
     
    });
  });
     $('#employeeform').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            department: { 
                required:true
            },
            company: { 
                required:true
            }
        },                
        att_date: { 
                required:true
            },
            
        submitHandler: function(form) {
                    document.validationForm.action = "<?php echo base_url(); ?>attendance/add_initial_form_data";
                    document.validationForm.submit();                }  
       
    });
    
    function getEmployee(val){
         $.ajax({
        type: "POST",
        data: {
          company: $('#company').val(),
          department: $('#department').val(),
          page_from : 'report'
        },
        url: "<?php echo site_url() ?>attendance/search_employee_for_shift",
        success: function (data) {
         
           $("#employee_block").html(data);
         
        }


      });
    }
    function getempbycode()
    {
       
         $.ajax({
        type: "POST",
        data: {
          code: $('#code').val()
         
        },
        url: "<?php echo site_url() ?>attendance/search_employee_by_code",
        success: function (data) {
         
           $("#employee_show").html(data);
         
        }


      });
    }
</script>

 <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                    $('#example').DataTable( {
                            dom: 'T<"clear">lfrtip',
                            tableTools: {
                                    "sRowSelect": "single"
                            }
                    } );
            } );
 </script>
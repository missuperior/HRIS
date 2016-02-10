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
      <li class="active">Attendance Report</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Attendance Report
<!--        <small>
          <i class="icon-double-angle-right"></i>
          Common form elements and layouts
        </small>-->
      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
       <a href="" style="text-decoration: none" class="pink">
            <?php echo $this->session->userdata('error_msg'); $this->session->unset_userdata('error_msg'); ?>
        </a>
    </h4>
    
    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->
        
        
            <div class="widget-box">
                <div class="widget-header widget-header-small">
                    <h5 class="lighter">Search Attendance</h5>
                </div>

                <div class="widget-body">
                    <div class="widget-main" style="min-height: 40px">
                      <form target="_blank" class="form-horizontal" id="employeeform" method="POST" action="<?php echo  base_url()?>attendance/get_att_company" />
                    
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
                      <div class="row-fluid" style="float:left; width:190px">
                            <select style="width: 180px;" id="company" name="company">                                 
                              <option value="">-- Select Campany --</option>
                             
                                  <option value="<?php echo $this->session->userdata('company_id'); ?>"><?php echo$this->session->userdata('company_name'); ?></option> 
                              																			
                            </select>
                        </div>
                      <?php } ?>
                        
                        <div id="disp"></div>
                        

                        
                      
             <div class="row-fluid" style="float:left; width:130px">
        
               <!--<label style="width: 100px;" class="row-fluid">Start Date: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>-->
                                          <input style="width: 100px;" type="date"  name="att_date" placeholder="Start Date" id="att_date" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly required />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('joining_date'); ?></h6>
             
             </div>
                                       <div class="row-fluid" style="float:left; width:130px">     
                                          <!--<label style="width: 100px;" class="row-fluid">End Date: <img src="<?php echo base_url() ?>assets/img/star.jpg" width="6"/></label>-->
                                          <input style="width: 100px;" type="date"  name="end_date" placeholder="End Date" id="end_date" class="span6 date-picker" data-date-format="yyyy-mm-dd" readonly required />
                                          <h6 style="color:red; margin: 0px;"><?php echo form_error('joining_date'); ?></h6>
                                       </div>
                                          
                        
                        <button id="search_attendance" class="btn btn-purple btn-small" style="margin-top:0px;" >
                            Search
                            <i class="icon-search icon-on-right bigger-110"></i>
                        </button>
                      
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

<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<!--<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>-->
<script language="javascript">
     // $.noConflict();
    $(document).ready(function(){
     
        $('#company').change(function(){
           
            var company = this.value;
           //alert(company);
            $.ajax({
                    type: "GET",
                    url: "<?php echo site_url() ?>hris/get_ajax_salary/?company_id="+company,
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
            end_date: { 
                required:true
            },
        submitHandler: function(form) {
                    document.validationForm.action = "<?php echo base_url(); ?>attendance/add_initial_form_data";
                    document.validationForm.submit();                }  
       
    });
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
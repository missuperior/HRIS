<style>
    
    .dataTable th[class*=sort]:after{
        display: none;
    }
    input[type=checkbox]{
        opacity:1;
    }
</style>
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
        Employee Login Management

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">View Employees</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">

    <div class="page-header position-relative">
      <h1>
        Employee Logins          
      </h1>
    </div><!--/.page-header-->

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->
	<?php if($this->session->userdata('success_msg') != ""){ ?>
        <div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                                <i class="icon-remove"></i>
                        </button>

                        <i class="icon-ok green"></i>

                <?php echo $this->session->userdata('success_msg');$this->session->unset_userdata('success_msg'); ?>	
                </div>
        <?php } ?>
        <div class="widget-box">
                <div class="widget-header widget-header-small">
                    <h5 class="lighter">Search Employee</h5>
                </div>

                <div class="widget-body">
                    <div class="widget-main" style="min-height: 40px">
                    <?php echo form_open('hris/employees_search', array('target' => '_blank')); ?>
                        <div class="row-fluid" style="float:left; width:250px">
                            <select style="width: 230px;" id="company" name="company">                                 
                              <option value="">-- Select Campany --</option>
                              <?php foreach ($company as $row_c){?>
                                  <option value="<?php echo $row_c['company_id']?>"><?php echo $row_c['company_name']?></option> 
                              <?php }?>																				
                            </select>
                        </div>
                        
                        <div id="disp"></div>
                        

                        <button id="search_btn" name="search" class="btn btn-purple btn-small" style="margin-top:0px;" >
                            Search
                            <i class="icon-search icon-on-right bigger-110"></i>
                        </button>
                      
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        
        
        <div id="disp"></div>
        
        <?php if(isset($_POST['search'])) { ?>
        
        <div class="row-fluid">
          <div class="span12">                                                                     

            <div class="row-fluid">                                    
              <div class="table-header">
                <h3>All Employees</h3>
              </div>
                <?php echo form_open('hris/generate_employee_logins', array('target' => '_blank')); ?>
                <table id="example" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <td colspan="5"><img class="nav-user-photo" src="<?php echo base_url();?>assets/images/logo.png" width="50" height="50" />
              <span style="font-size: 22px; font-weight: bold; margin-left: 20px;">Human Resource Information System</span></td>
            <td colspan="2"><span style="font-size: 18px; font-family:sans-serif;">Employee Login Details</span></td>
          </tr>
          <tr>
            <th>#</th>
            <th>Check All &nbsp;&nbsp;&nbsp;<input type="checkbox" id="selectall"></th>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Email</th>
            
<!--        <th style="width: 26px;">Action</th>-->
          </tr>
        </thead>

        <tbody>
          <?php
            
          $i = 0;
          foreach ($employee as $row) {
              $this->load->model('Hris_model'); 
                  $emp_id = array(
                      'emp_id' => $row['emp_id']
                  );
               $data_emp_login = $this->Hris_model->check_emp_login($emp_id);
                if(empty($data_emp_login[0]['emp_id'])){ $color = ''; } else {  $color = 'background-color:red; text:bold; color:#fff;'; }
          ?>
            <tr>                                                                                        
                <td style="<?php echo $color ; ?>"><?php echo $i + 1; ?></td>
              <td style="<?php echo $color ; ?>">
                  <?php if(empty($data_emp_login[0]['emp_id'])){   ?>
                 <input type="checkbox" name="employee_id[]" value="<?php echo $row['emp_id'].'-'.$row['email_2']; ?>" class="selectedId">
                  <?php } ?>
                </td>
              <td style="<?php echo $color ; ?>"><?php echo $row['employee_name']; ?></td>
              <td style="<?php echo $color ; ?>"><?php echo $row['designation_title']; ?></td>
              <td style="<?php echo $color ; ?>"><?php echo $row['department_name']; ?></td>
              <td style="<?php echo $color ; ?>"><?php echo $row['email_2']; ?></td>
              
 
            </tr>
            <?php $i++;
          } ?>

        </tbody>
      </table>
                <div style="float:left;width:100%;margin-bottom: 30px;">
                <div style="float:left;"><input type="checkbox" name="gen_email"></div>
                <div style="float:left;margin-left: 30px;font-weight: bold;">Email</div>
                <div style="float:left;margin-left: 20px;"><input type="checkbox" name="gen_sms"></div>
                <div style="float:left;margin-left: 50px;font-weight: bold;">SMS</div>
                </div>
                <button id="search_btn" name="gen_password" class="btn btn-purple btn-small" style="margin-top:0px;" >
                            Generate Password
                            <i class="icon-circle icon-on-right bigger-110"></i>
                        </button>
                
                <?php echo form_close(); ?>
            </div>
          </div>
        </div> 
        <?php } ?>
      </div><!--/.span-->
    </div><!--/.row-fluid-->
  </div><!--/.page-content-->


</div><!--/.main-content-->
</div><!--/.main-container-->    


<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<!--inline scripts related to this page-->



<script type="text/javascript">
  $(function() {
    var oTable1 = $('#sample-table-2').dataTable( {
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null,
        { "bSortable": false }
      ] } );
    			
    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    function tooltip_placement(context, source) {
      var $source = $(source);
      var $parent = $source.closest('table')
      var off1 = $parent.offset();
      var w1 = $parent.width();
			
      var off2 = $source.offset();
      var w2 = $source.width();
			
      if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
      return 'left';
    }
  })
</script>

<script type="text/javascript">
    $(document).ready(function () {
    $('#selectall').click(function () {
        $('.selectedId').prop('checked', this.checked);
    });

    $('.selectedId').change(function () {
        var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
        $('#selectall').prop("checked", check);
    });
});
</script>

<!--<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>-->
<script language="javascript">
    
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
        
</script>
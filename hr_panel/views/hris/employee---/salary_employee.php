
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
        <?php if($this->session->userdata('success_msg') != ''){?>
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
                              <option value="">-- Select Company --</option>
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
       
<div class="row-fluid">
  <div class="span12">                                                                     

    <div class="row-fluid">                                    
      <div class="table-header">
<!--        <h3>Search Result</h3>-->
      </div>
<form action="<?php echo base_url()?>hris/salary_slip_email/" method="POST">
<!--      <table id="sample-table-2" class="table table-striped table-bordered table-hover">-->
      <table id="example" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <td colspan="5"><img class="nav-user-photo" src="<?php echo base_url();?>assets/images/logo.png" width="50" height="50" />
              <span style="font-size: 22px; font-weight: bold; margin-left: 20px;">Human Resource Information System</span></td>
            <td colspan="2"><span style="font-size: 18px; font-family:sans-serif;">Employee Report</span></td>
          </tr>
          <tr>
            <th><label>
                          <input  type="checkbox" id="selectall"/>
                          <span class="lbl"></span>
                        </label></th>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Email</th>
            
<!--        <th style="width: 26px;">Action</th>-->
          </tr>
        </thead>

        <tbody>
            
          <?php
          $i = 0;
          foreach ($employee as $row) {
          ?>
            <tr>                                                                                        
              <td><label>
                          <input type="checkbox"  name="emp_record[]" value="<?php echo $row['emp_id'].'-'.$row['email_2'].'-'.$row['current_salary'] ?>" />
                          
                          <span class="lbl"></span>
                        </label></td>
              <td><?php echo $row['employee_name']; ?></td>
              <td><?php echo $row['designation_title']; ?></td>
              <td><?php echo $row['department_name']; ?></td>
              <td><?php echo $row['current_salary']; ?></td>
              <td><?php echo $row['email_2']; ?></td>
              

  <!--                                                <td class="td-actions">
    <div class="hidden-phone visible-desktop action-buttons">
      
     <a style="cursor: pointer" onClick="window.open('<?php //echo base_url()."accounts/print_challan/"  ?>&print=yes','Print Voucher','width=638,height=400')">Print Voucher</a>
    </div>                                                   
  </td>                                                 -->
            </tr>
            <?php $i++;
          } ?>
                         

        </tbody>
      </table>
         <button class="btn btn-info" style="float: right; margin-top: 5px;">
                Submit
              </button> 
        </form>
    </div>
  </div>
</div>
        </div>
<!--
     <script>
        var base_url = "<?php echo base_url();?>";        
            </script>   -->
<!--    <script src="<?php //echo base_url();?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php //echo base_url();?>assets/js/dataTables.tableTools.js"></script>

 <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                    $('#example').DataTable( {
                            dom: 'T<"clear">lfrtip',
                            tableTools: {
                                    "sRowSelect": "single"
                            }
                    } );
            } );
 </script>-->
            
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<!--inline scripts related to this page-->



<script type="text/javascript">
  $(function() {
    var oTable1 = $('#sample-table-2').dataTable( {
      "aoColumns": [
        { "bSortable": true },
        null,null,null,
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

        

<style>
    
    .dataTable th[class*=sort]:after{
        display: none;
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
        Employee Management

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
        Employee Module           
      </h1>
    </div><!--/.page-header-->

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->

        <h4 class="lighter">
          <a href="" style="text-decoration: none" class="pink">                       
            <?php echo $this->session->userdata('success_msg');$this->session->unset_userdata('success_msg'); ?>
          </a>
        </h4>							

        <div class="row-fluid">
          <div class="span12">                                                                     

            <div class="row-fluid">                                    
              <div class="table-header">
                <h3>All Employees</h3>
              </div>

              <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Company</th>
                   
                    
                    <th style="width: 26px;">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $i = 0;
                
                  foreach ($employee as $k=> $row) {
                      if(in_array()){
                          
                      }
                    ?>
                    <tr id="ch">
                      <td><?php echo $i + 1; ?></td>
                      <td>
                          <input type="hidden" name="emp_id" id="emp_<?php echo $row['emp_id']; ?>" value="<?php echo $row['emp_id']; ?>" />
  <?php echo $row['employee_name']; ?>
                      </td>
                      
                      <td><?php echo $row['emp_code']; ?></td>
                      <td><?php echo $row['designation_title']; ?></td>
                      <td><?php echo $row['department_name']; ?></td>
                      <td><?php echo $row['company_name']; ?></td>
                      
                      

                      <td class="td-actions">
                        <div class="hidden-phone visible-desktop action-buttons">

                          <a class="green" href="<?php echo base_url() ?>hris/edit_employee/<?php echo $row['emp_id']; ?>/<?php echo $row['department_id']; ?>">
                            <i class="icon-pencil bigger-130" title="Edit"></i>                                                            
                          </a>
                          <a class="" href="<?php echo base_url() ?>hris/employee_profile/<?php echo $row['emp_id']; ?>">                                                            
                            <i class="fa fa-user" title="View Profile"></i>                                                         
                          </a>
<!--                          <a href="<?php //echo base_url(); ?>hris/view_increment/<?php //echo $row['emp_id']; ?>">
                            <i class="fa fa-arrow-up" title="Increment"></i>
                          </a>                                                                                           -->
<!--                          <a href="<?php //echo base_url(); ?>hris/view_deduction/<?php //echo $row['emp_id']; ?>">
                            <i class="fa fa-arrow-down" title="Deduction"></i>
                          </a>-->
                            <a href="<?php echo base_url(); ?>hris/view_cv/<?php echo $row['emp_id']; ?>" style="float:right;">
                                <img src="<?php echo base_url(); ?>assets/images/cv.png" width="13" height="15" />
                          </a>
                        </div>                                                   
                      </td>
                    </tr>
                   
  <?php $i++;
} ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>                
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

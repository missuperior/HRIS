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
      <li class="active">Payroll</li>      
    </ul><!--.breadcrumb-->    

  </div>

  <div class="page-content">

    <div class="page-header position-relative">
      <h1>
        Payroll           
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
      
      <?php echo form_open('hris/payslip_generate'); ?>
        
        <button class="btn btn-info" style="float: right;">
<!--      <i class="icon-ok bigger-150"></i>-->
          Pay Slips Generate
        </button>

        <div class="row-fluid">          
          
          <div class="span12">                                                                     

            <div class="row-fluid">                                    
              <div class="table-header">
                <h3>All Employees</h3>
              </div>

              <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th class="center">
                      <label>
                        <input type="checkbox" />
                        <span class="lbl"></span>
                      </label>
                    </th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Campus</th>
                    <th>Status</th>
                    <th>Shift</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  foreach ($employee as $row) {
                    ?>
                    <tr>
                      <td class="center">
                        <label>
                          <input type="checkbox" id="chk_emp_id" name="chk_emp_id[]" value="<?php echo $row['emp_id'] ?>" />
                          <span class="lbl"></span>
                        </label>
                      </td>
                      <td>
                        <input type="hidden" value="<?php echo $row['emp_id']; ?>" />
                        <?php echo $row['employee_name']; ?>
                      </td>
                      <td><?php echo $row['designation_title']; ?></td>
                      <td><?php echo $row['department_name']; ?></td>
                      <td><?php echo $row['campus_name']; ?></td>
                      <td><?php echo $row['employee_status']; ?></td>
                      <td><?php echo $row['shift']; ?></td>

                    </tr>
  <?php $i++;
} ?>

                </tbody>
              </table>
            </div>
          </div>
        </div> 
        
      <?php echo form_close(); ?>
        
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
        { "bSortable": false },
        null,null,null,null,null,
        { "bSortable": true }
      ] } );
    
    $('table th input:checkbox').on('click' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });
						
        });
    			
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

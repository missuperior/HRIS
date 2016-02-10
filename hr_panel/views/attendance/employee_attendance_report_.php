<br/><br/>
<div class="row-fluid">
  <div class="span12">                                                                     

    <div class="row-fluid">                                    
      <div class="table-header">
<!--        <h3>Search Result</h3>-->
      </div>

<!--      <table id="sample-table-2" class="table table-striped table-bordered table-hover">-->
      <table id="example" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr style="font-size: 10px">                                               
                                               <td colspan="3"><img width="60" src="<?php echo base_url();?>assets/avatars/challan_logo.png" /><b style="  font-size: 20px;    margin-left: 10px;">Superior Group of Colleges</b></td>
                                               <td colspan="3"><h3 style="text-align:right">Attendance Report</h3></td>                                                                                                                                                
                                           </tr>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Attendance Date</th>
                    <th>CheckIn</th>
                    <th>CheckOut</th>
                    <th>Status</th>
                   
                    
                    
                   
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $i = 0;
                
                  foreach ($emp_data as $k=> $row) {
                      if(in_array()){
                          
                      }
                    ?>
                    <tr>
                      <td><?php echo $i + 1; ?></td>
                      <td>
                        <input type="hidden" value="<?php echo $row['emp_id']; ?>" />
  <?php echo $row['employee_name']; ?>
                      </td>
                      
                      <td><?php echo $row['datetime']; ?></td>
                      <td><?php echo $row['checkIn']; ?></td>
                      <td><?php echo $row['checkOut']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                    
                      
                      

<!--                      <td class="td-actions">
                        <div class="hidden-phone visible-desktop action-buttons">

                          <a class="green" href="<?php echo base_url() ?>hris/edit_employee/<?php echo $row['emp_id']; ?>/<?php echo $row['department_id']; ?>">
                            <i class="icon-pencil bigger-130" title="Edit"></i>                                                            
                          </a>
                          <a class="" href="<?php echo base_url() ?>hris/employee_profile/<?php echo $row['emp_id']; ?>">                                                            
                            <i class="fa fa-user" title="View Profile"></i>                                                         
                          </a>
                          <a href="<?php echo base_url(); ?>hris/view_increment/<?php echo $row['emp_id']; ?>">
                            <i class="fa fa-arrow-up" title="Increment"></i>
                          </a>                                                                                           
                          <a href="<?php echo base_url(); ?>hris/view_deduction/<?php echo $row['emp_id']; ?>">
                            <i class="fa fa-arrow-down" title="Deduction"></i>
                          </a>
                            <a href="<?php echo base_url(); ?>hris/view_cv/<?php echo $row['emp_id']; ?>">
                                <img src="<?php echo base_url(); ?>assets/images/cv.png" width="20" height="20"/>
                          </a>
                        </div>                                                   
                      </td>-->
                    </tr>
                   
  <?php $i++;
} ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>                
     

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
        null,null,null,null,null,null,
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
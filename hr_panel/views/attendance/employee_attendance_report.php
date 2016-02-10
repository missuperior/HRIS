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
          <tr>
            <td colspan="5"><img class="nav-user-photo" src="<?php echo base_url();?>assets/images/logo.png" width="50" height="50" />
              <span style="font-size: 22px; font-weight: bold; margin-left: 20px;">Human Resource Information System</span></td>
            <td colspan="2"><span style="font-size: 18px; font-family:sans-serif;">Employee Attendance Report</span></td>
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
      </table>
    </div>
  </div>
</div>

     <script>
        var base_url = "<?php echo base_url();?>";        
            </script>   
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.tableTools.js"></script>

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
        

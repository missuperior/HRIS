<br/><br/>
<div class="row-fluid">
  <div class="span12">                                                                     

    <div class="row-fluid">                                    
      <div class="table-header">
<!--        <h3>Search Result</h3>-->
      </div>

<!--      <table id="sample-table-2" class="table table-striped table-bordered table-hover">-->
      <form method="post" action="<?php echo site_url() ?>attendance/shift_assign">
            <div class="widget-main" style="min-height: 40px">

          <div class="row-fluid" style="float:left; width:250px">
            <select style="width: 230px;" id="shift" name="shift">                                 
              <option value="">-- Select Shift --</option>
              <?php foreach ($shifts as $shift) { ?>
                <option value="<?php echo $shift['shiftId']; ?>"><?php echo $shift['title'] ?></option> 
<?php } ?>																				
            </select>
          </div>


        </div>
      <table id="example" class="table table-striped table-bordered table-hover">
        <thead>
<!--          <tr>
            <td colspan="5"><img class="nav-user-photo" src="<?php echo base_url();?>assets/images/logo.png" width="50" height="50" />
              <span style="font-size: 22px; font-weight: bold; margin-left: 20px;">Human Resource Information System</span></td>
            <td colspan="2"><span style="font-size: 18px; font-family:sans-serif;">Employee Report</span></td>
          </tr>-->
          <tr>
            <th>
                <label>
                          <input  type="checkbox" id="selectall"/>
                          <span class="lbl"></span>
                        </label>
            </th>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
           
           
            <th>Shift</th>
<!--        <th style="width: 26px;">Action</th>-->
          </tr>
        </thead>

        <tbody>
          <?php
         
          foreach ($employee as $row) {
          ?>
            <tr>                                                                                        
              <td><input type="checkbox" name="emp_id[]" value="<?php echo $row['emp_id']; ?>" style="opacity: 1;">
             
              </td>
              <td><?php echo $row['employee_name']; ?></td>
              <td><?php echo $row['designation_title']; ?></td>
              <td><?php echo $row['department_name']; ?></td>
             
              <td><?php echo $row['shift']; ?></td>

                                           
            </tr>
            <?php 
          } ?>

        </tbody>
       
      </table>
         <button id="assign-shift" class="btn btn-purple btn-small" style="margin-top:0px;" type="submit">
                            Assign Shift
                           
                        </button>
        </form>
    </div>
  </div>
</div>

     <script>
        var base_url = "<?php echo base_url();?>";        
            </script>   
    <script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/dataTables.tableTools.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>

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
        

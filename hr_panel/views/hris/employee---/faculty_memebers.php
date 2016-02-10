<br/><br/>
<div class="row-fluid">
  <div class="span12">                                                                     

    <div class="row-fluid">                                    
      <div class="table-header">
<!--        <h3>Search Result</h3>-->
      </div>
        
        <div class="widget-box">
                <div class="widget-header widget-header-small">
                    <h5 class="lighter">Search Employee</h5>
                </div>

                <div class="widget-body">
                    <div class="widget-main" style="min-height: 40px">
                    <?php echo form_open('hris/search_campus_employees', array('target' => '_blank')); ?>
                        <div class="row-fluid" style="float:left; width:250px">
                            <select style="width: 230px;" id="company" name="campus">                                 
                              <option value="">-- Select Campus --</option>
                              <?php foreach ($campus as $row_c){?>
                                  <option value="<?php echo $row_c['campus_id']?>"><?php echo $row_c['campus_name']?></option> 
                              <?php }?>																				
                            </select>
                        </div>
                        <button id="search_btn" name="search" class="btn btn-purple btn-small" style="margin-top:0px;" >
                            Search
                            <i class="icon-search icon-on-right bigger-110"></i>
                        </button>
                      
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

<!--      <table id="sample-table-2" class="table table-striped table-bordered table-hover">-->
        <?php if(isset($_POST['search'])) { ?>
      <table id="example" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <td colspan="5"><img class="nav-user-photo" src="<?php echo base_url();?>assets/images/logo.png" width="50" height="50" />
              <span style="font-size: 22px; font-weight: bold; margin-left: 20px;">Human Resource Information System</span></td>
            <td colspan="5"><span style="font-size: 18px; font-family:sans-serif;">Details of Faculty Members</span></td>
          </tr>
          <tr>
            <th>#</th>
            <th>Campus</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Highest Degree</th>
            <th>Specialization</th>
            <th>CNIC#</th>
            <th>Joining Date</th>
<!--        <th style="width: 26px;">Action</th>-->
          </tr>
        </thead>

        <tbody>
          <?php
          $i = 0;
          foreach ($employee as $row) {
          ?>
            <tr>                                                                                        
              <td><?php echo $i + 1; ?></td>
              <td><?php echo $row['campus_name']; ?></td>
              <td><?php echo $row['employee_name']; ?></td>
              <td><?php echo $row['designation_title']; ?></td>
              <td><?php echo $row['degree_title']; ?></td>
              <td><?php echo $row['major_subjects']; ?></td>
              <td><?php echo $row['cnic_no']; ?></td>
              <td><?php 
              $date = $row['joining_date'];
              echo date("d-M-y", strtotime($date));
              ?></td>
           </tr>
            <?php $i++;
          } ?>

        </tbody>
      </table>
        <?php } ?>
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
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
                        <td colspan="2"><img class="nav-user-photo" src="<?php echo base_url(); ?>assets/images/logo.png" width="50" height="50" />
                            <span style="font-size: 22px; font-weight: bold; margin-left: 20px;">Human Resource Information System</span></td>
                        <td colspan="2"><span style="font-size: 18px; font-family:sans-serif;">Employee Attendance Report Company Wise</span>
                            <span style="font-size: 12px; color: red;">  <?php echo '<br>' . $info[0]['company_name'] . ' --- ' . $info[0]['department_name']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Emp Code</th>
<!--                        <th>Campus</th>
                        <th>Status</th>
                        <th>Shift</th>-->




                    </tr>
                </thead>

                <?php
                $i = 0;

                foreach ($employee as $row) {
                    ?>
                    <tr>                                                                                        
                       
                        <td><?php echo $row['employee_name']; ?></td>
                        <td><?php echo $row['designation_title']; ?></td>
                        <td><?php echo $row['department_name']; ?></td>
                        <td><?php echo $row['emp_code']; ?></td>
<!--                        <td><?php echo $row['campus_name']; ?></td>
                        <td><?php echo $row['employee_status']; ?></td>
                        <td><?php echo $row['shift']; ?></td>-->


                    </tr>
                    <?php }
                ?>
                
            </table>
        </div>
    </div>
</div>

<script>
    var base_url = "<?php echo base_url(); ?>";
</script>   
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dataTables.tableTools.js"></script>

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'T<"clear">lfrtip',
            tableTools: {
                "sRowSelect": "single"
            }
        });
    });
</script>


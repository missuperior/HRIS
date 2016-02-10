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
                        <td colspan="4"><img class="nav-user-photo" src="<?php echo base_url(); ?>assets/images/logo.png" width="50" height="50" />
                            <span style="font-size: 18px; font-weight: bold; margin-left: 20px;">Human Resource Information System</span></td>
                        <td colspan="4"><span style="font-size: 18px; font-family:sans-serif;">Employee Attendance Detail Report</span>
                            <span style="font-size: 12px; color: red;">  <?php echo '<br>'.$start_date.' to '.$end_date; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Emp Code</th>
                        <th>Date</th>
                        <th>In</th>
                        <th>Out</th>
                        <th>Status</th>
                        <th>Working Hour</th>
                      




                    </tr>
                </thead>

                <?php
                $i = 0;

                foreach ($summery_report as $k => $row) {
                    ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td>

                            <?php echo $row['employee_name']; ?>
                        </td>
                          <td>

                            <?php echo $row['emp_code']; ?>
                        </td>
                        <td><?php echo $row['datetime']; ?></td>
                        <td><?php echo $row['checkIn']; ?></td>
                        <td><?php echo $row['checkOut']; ?></td>
                        <td><?php echo $row['remarks']; ?></td>
                        <td><?php echo $row['work_hour']; ?></td>
                      


                    </tr>

                    <?php $i++;
                }
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



















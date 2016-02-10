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
                        <td colspan="7"><img class="nav-user-photo" src="<?php echo base_url().$this->session->userdata('company_image');?>" width="50" height="50" />
                            <span style="font-size: 18px; font-weight: bold; margin-left: 20px;"> <?php  echo $this->session->userdata('company_name'); ?></span></td>
                        <td colspan="7"><span style="font-size: 18px; font-family:sans-serif;">Employee Attendance Report</span>
                            <span style="font-size: 12px; color: red;">  <?php echo '<br>' . $start_date . ' to ' . $end_date; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Emp Code</th>
                        <th>Working Days</th>
                        <th>Actual Days</th>
                        <th>Total Working Hours</th>
                        <th>Total Actual Hours</th>
                        <th>On Time</th>
                        <th>Absent</th>
                        <th>Leaves</th>
                        <th>Tardiness</th>
                        <th>Full Absence</th>
                        <th>Partial Absence</th>
                        <th>Over Time</th>




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

                        <td><?php echo $row['WD']+$row['totalAbsent'] + $row['leave_days']; ?></td>
                        <td><?php
                        
                        $actualDays = $row['WD'];
                        echo $actualDays; ?></td>
                        <td><?php echo $row['total_working_hours']; ?></td>
                        <td><?php echo $row['WH']; ?></td>
                        <td><?php echo $row['totalOnTime']; ?></td>
                        <td><?php echo $row['totalAbsent']; ?></td>

                        <td><?php echo $row['leave_days']; ?></td>
                        <td><?php echo $row['totalTardiness']; ?></td>
                        <td><?php echo $row['totalFullAbsence']; ?></td>
                        <td><?php echo $row['totalPartialAbsence']; ?></td>
                        <td><?php echo $row['totalOverTime']; ?></td>



                    </tr>

                    <?php
                    $i++;
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


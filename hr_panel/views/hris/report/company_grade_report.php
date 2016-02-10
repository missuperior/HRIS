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
                        
                        <td colspan="3"><span style="font-size: 18px; font-family:sans-serif;">Employee Attendance Report Company Wise</span>
                            <span style="font-size: 12px; color: red;">  <?php echo '<br>' . $info[0]['company_name']; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th><?php 
                        
                        if($from=='grade')
                            echo 'Class'; 
                        else
                            echo 'Title';
                        ?></th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Created By</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
               
                foreach ($grades as $row) {
                    ?>
                    <tr>                                                                                        
                        <td><?php echo $i; ?></td>

                        <td><?php 
                        
                        if($from=='grade')
                            echo $row['class']; 
                        else
                            echo $row['title'];
                        ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo date('Y-m-d',strtotime($row['created_date'])); ?></td>
                        <td><?php echo $row['employee_name']; ?></td>

                    </tr>
                    <?php
                    $i++;
                 
                }
                ?>
              
                </tbody>
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
            },
              "sEmptyTable": "Loading data from server"
        });
    });
</script>


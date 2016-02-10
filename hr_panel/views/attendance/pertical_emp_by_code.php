<div class="alert alert-info">
<?php if(!empty($employee)){ ?>
    
    <table id="example" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Employee Code</th>
                        <th>Department</th>
                        <th>Designation</th>
                        
                      </tr>
                </thead>

                <?php
                $i = 0;

                foreach ($employee as $k => $row) {
                    ?>
               
                   <tr>
                   <td>
                <input style="opacity: 1;" type="checkbox" name="employee" id="employee" value="<?php echo $row['emp_id']; ?>">
                   </td>
                        <td><?php echo $i + 1; ?></td>
                        <td>
                         <?php echo $row['employee_name']; ?>
                        </td>
                        <td><?php echo $row ['emp_code']; ?></td>
                        <td><?php echo $row ['department_name']; ?></td>
                        <td><?php echo $row['designation_title']; ?></td>
                       
                      


                    </tr>

                    <?php $i++;
                }
                ?>
            </table>
    
<?php } else { ?>
<?php echo 'Record Not Found'; }?>
</div>
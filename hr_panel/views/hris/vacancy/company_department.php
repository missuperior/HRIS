<option value="">-- Select Department --</option>
<?php foreach ($department as $row) { ?>
  <option  value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name']; ?></option> 
<?php } ?>
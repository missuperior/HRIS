<option value="">-- Select Designation --</option>
<?php foreach ($designations as $row) { ?>
  <option <?php if ($row['designation_id'] == $employee[0]['reporting_to'])
    echo "selected='selected'"; ?> value="<?php echo $row['designation_id'] ?>"><?php echo $row['designation_title']; ?></option> 
<?php } ?>

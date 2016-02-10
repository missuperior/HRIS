<option value="">-- Select Designation --</option>
<?php foreach ($designations as $row) { ?>
  <option <?php if ($row['designation_id'] == $employee[0]['reporting_to'])
    echo "selected='selected'"; ?> value="<?php echo $row['designation_id']; ?>"><?php echo $row['designation_title']; ?></option> 
<?php } ?>

  <option id="cm" value="166">Chairman Secretariat</option>
  <option id="do" value="125">Director Operations</option>
  <option id="rs" value="121">Registrar Secretariat</option>
  <option id="pd" value="118">Project Director</option>

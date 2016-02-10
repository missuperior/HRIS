<option value="">-- Select Grade --</option>
<?php foreach ($grade as $row) { ?>
  <option value="<?php echo $row['grade_level_id']; ?>"><?php echo $row['title'].'-'.$row['class'] ?></option> 
<?php } ?>


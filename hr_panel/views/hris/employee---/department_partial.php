                    <div class="controls">
                        <span class="span12">
                          <select multiple="" name="department[]" id="department" class="chzn-select" data-placeholder="Choose Department...">
<!--                            <select style="width: 220px;" id="department" name="department" class="select2" data-placeholder="Click to Choose...">-->
                              <option value="">-- Select Department --</option>                                                        
                                <?php foreach ($department as $row) { ?>
                                  <option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name'] ?></option> 
                                <?php } ?>																			
                            </select>           
                          <h6 style="color: red;"><?php echo form_error('department'); ?></h6>
                        </span>
                    </div>


<script type="text/javascript">
  $(function() {
    $(".chzn-select").chosen(); 
  });

</script> 
<div class="row-fluid" style="float:left; width:250px">
    <select style="width: 230px;" id="designation" name="designation">                                 
                              <option value="">-- Select Designation --</option>
                              <?php foreach ($designation as $row){?>
                                  <option value="<?php echo $row['designation_id']?>"><?php echo $row['designation_title']?></option> 
                              <?php }?>																				
                            </select>
                        </div>
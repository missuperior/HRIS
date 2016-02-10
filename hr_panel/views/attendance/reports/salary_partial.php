<div class="row-fluid" style="float:left; width:250px">
    <select style="width: 230px;" id="department" name="department" <?php if($page_name=='report'){ echo 'onchange=getEmployee(this.value);'; }?>>                                 
                              <option value="">-- Select Department --</option>
                              <?php foreach ($department as $row){?>
                                  <option value="<?php echo $row['department_id']?>"><?php echo $row['department_name']?></option> 
                              <?php }?>																				
                            </select>
                        </div>

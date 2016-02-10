  <div class="row-fluid" style="float:left; width:190px">
                            <select style="width: 180px;" id="employee" name="employee">                                 
                              <option value="">-- Select Employee --</option>
                              <?php foreach ($employee as $row_c){?>
                                  <option value="<?php echo $row_c['emp_id']?>"><?php echo $row_c['employee_name']?></option> 
                              <?php }?>																				
                            </select>
                        </div>

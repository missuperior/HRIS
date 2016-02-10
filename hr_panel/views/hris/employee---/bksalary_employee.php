<br/><br/>
<div class="row-fluid">
  <div class="span12">                                                                     

    <div class="row-fluid">                                    
      <div class="table-header">
<!--        <h3>Search Result</h3>-->
      </div>
<form action="<?php echo base_url()?>hris/salary_slip_email/" method="POST">
<!--      <table id="sample-table-2" class="table table-striped table-bordered table-hover">-->
      <table id="example" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <td colspan="5"><img class="nav-user-photo" src="<?php echo base_url();?>assets/images/logo.png" width="50" height="50" />
              <span style="font-size: 22px; font-weight: bold; margin-left: 20px;">Human Resource Information System</span></td>
            <td colspan="2"><span style="font-size: 18px; font-family:sans-serif;">Employee Report</span></td>
          </tr>
          <tr>
            <th><label>
                          <input type="checkbox" />
                          <span class="lbl"></span>
                        </label></th>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Email</th>
            
<!--        <th style="width: 26px;">Action</th>-->
          </tr>
        </thead>

        <tbody>
            
          <?php
          $i = 0;
          foreach ($employee as $row) {
          ?>
            <tr>                                                                                        
              <td><label>
                          <input type="checkbox"  name="emp_id[]" value="<?php echo $row['emp_id'] ?>" />
                          <span class="lbl"></span>
                        </label></td>
              <td><?php echo $row['employee_name']; ?></td>
              <td><?php echo $row['designation_title']; ?></td>
              <td><?php echo $row['department_name']; ?></td>
              <td><?php echo $row['current_salary']; ?></td>
              <td><?php echo $row['email_2']; ?></td>
              

  <!--                                                <td class="td-actions">
    <div class="hidden-phone visible-desktop action-buttons">
      
     <a style="cursor: pointer" onClick="window.open('<?php //echo base_url()."accounts/print_challan/"  ?>&print=yes','Print Voucher','width=638,height=400')">Print Voucher</a>
    </div>                                                   
  </td>                                                 -->
            </tr>
            <?php $i++;
          } ?>
                         

        </tbody>
      </table>
         <button class="btn btn-info" style="float: right; margin-top: 5px;">
                Submit
              </button> 
        </form>
    </div>
  </div>
</div>
<!--
     <script>
        var base_url = "<?php echo base_url();?>";        
            </script>   -->
<!--    <script src="<?php //echo base_url();?>assets/js/jquery.dataTables.js"></script>
    <script src="<?php //echo base_url();?>assets/js/dataTables.tableTools.js"></script>

 <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                    $('#example').DataTable( {
                            dom: 'T<"clear">lfrtip',
                            tableTools: {
                                    "sRowSelect": "single"
                            }
                    } );
            } );
 </script>-->
            
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<!--inline scripts related to this page-->



<script type="text/javascript">
  $(function() {
    var oTable1 = $('#sample-table-2').dataTable( {
      "aoColumns": [
        { "bSortable": true },
        null,null,null,
        { "bSortable": false }
      ] } );
    			
    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
    function tooltip_placement(context, source) {
      var $source = $(source);
      var $parent = $source.closest('table')
      var off1 = $parent.offset();
      var w1 = $parent.width();
			
      var off2 = $source.offset();
      var w2 = $source.width();
			
      if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
      return 'left';
    }
  })
</script>

        

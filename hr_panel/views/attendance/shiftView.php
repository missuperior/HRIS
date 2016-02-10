<style>
    
    .dataTable th[class*=sort]:after{
        display: none;
    }
</style>
<div class="main-content">
  <div class="breadcrumbs" id="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        <i class="icon-home home-icon"></i>
        <a href="#">Dashboard</a>

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>

      <li>
        Shift Management

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">View Shift</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">

    <div class="page-header position-relative">
      <h1>
        Shift Module           
      </h1>
    </div><!--/.page-header-->

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->

        <h4 class="lighter">
          <a href="" style="text-decoration: none" class="pink">                       
            <?php echo $this->session->userdata('success_msg');$this->session->unset_userdata('success_msg'); ?>
          </a>
        </h4>							

        <div class="row-fluid">
          <div class="span12">                                                                     

            <div class="row-fluid">                                    
              <div class="table-header">
                <h3>All Shifts</h3>
              </div>

              <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>CheckIn</th>
                    <th>CheckOut</th>
                    <th>Relaxation</th>
                     <th>Working Hours</th>
                   
                    <th>Off Days</th>
                    <th>Flexible Start </th>
                    <th>Flexible End</th>
                   
                    
                    <th style="width: 26px;">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $i = 0;
                
                  foreach ($shifts as $k=> $row) {
                      if(in_array()){
                          
                      }
                    ?>
                    <tr id="ch">
                      <td><?php echo $i + 1; ?></td>
                      <td>
                          <input type="hidden" name="shift_id" value="<?php echo $row['shiftId']; ?>" />
  <?php echo $row['title']; ?>
                      </td>
                      
                      <td><?php echo $row['shift_type']; ?></td>
                      <td><?php echo $row['In']; ?></td>
                      <td><?php echo $row['Out']; ?></td>
                      <td><?php echo $row['relaxation']; ?></td>
                      <td><?php echo $row['working_hours']; ?></td>
                      <td><?php echo $row['off_days']; ?></td>
                         <td><?php echo $row['flexible_start']; ?></td>
                          
                            <td><?php echo $row['flexible_end']; ?></td>
                      
                      

                      <td class="td-actions">
                        <div class="hidden-phone visible-desktop action-buttons">

                          <a class="green" href="<?php echo base_url() ?>attendance/edit_shift/<?php echo $row['shiftId']; ?>/<?php echo $row['department_id']; ?>">
                            <i class="icon-pencil bigger-130" title="Edit"></i>                                                            
                          </a>
                          <a class="red" href="<?php echo base_url() ?>attendance/delete_shift/<?php echo $row['shiftId']; ?>">                                                            
                            <i class="fa icon-remove" title="Delete"></i>                                                         
                          </a>
  
<!--                            <a href="<?php echo base_url(); ?>hris/view_cv/<?php echo $row['emp_id']; ?>" style="float:right;">
                                <img src="<?php echo base_url(); ?>assets/images/cv.png" width="13" height="15" />
                          </a>-->
                        </div>                                                   
                      </td>
                    </tr>
                   
  <?php $i++;
} ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>                
      </div><!--/.span-->
    </div><!--/.row-fluid-->
  </div><!--/.page-content-->


</div><!--/.main-content-->
</div><!--/.main-container-->    


<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<!--inline scripts related to this page-->



<script type="text/javascript">
  $(function() {
    var oTable1 = $('#sample-table-2').dataTable( {
      "aoColumns": [
        { "bSortable": true },
        null,null,null,null,null,
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

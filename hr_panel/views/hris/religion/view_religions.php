<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>							
                <a href="" style="text-decoration: none">Admissions </a>
            </li>						
        </ul><!--.breadcrumb-->

        <div class="nav-search" id="nav-search">
            <form class="form-search" />
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="icon-search nav-search-icon"></i>
            </span>
            </form>
        </div><!--#nav-search-->
    </div>

    <div class="page-content">

        <div class="page-header position-relative">
            <h1>
                Religion Module           
            </h1>
        </div><!--/.page-header-->

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <h4 class="lighter">
                    <a href="" style="text-decoration: none" class="pink">

                        <?php echo $this->session->userdata('success_msg');
                        $this->session->unset_userdata('success_msg'); ?>
                    </a>
                </h4>							

                <div class="row-fluid">
                    <div class="span12">                                                                     

                        <div class="row-fluid">                                    
                            <div class="table-header">
                                <h3>All Religions</h3>
                            </div>

                            <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Religion Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = 0;

                                    foreach ($religions as $row) {
                                        $i++;
                                        ?>
                                        <tr>

                                            <td>
    <?php echo $i; ?>
                                            </td>
                                            <td><?php echo $row['religion']; ?></td>

                                            <td class="td-actions">
                                                <div class="hidden-phone visible-desktop action-buttons">

                                                    <a class="green" href="<?php echo base_url() ?>hris/get_religion/<?php echo $row['religion_id']; ?>">
                                                        <i class="icon-pencil bigger-130"></i>
                                                    </a>                                                       
                                                </div>                                                   
                                            </td>                                                 
                                        </tr>
<?php } ?>

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
                null,
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
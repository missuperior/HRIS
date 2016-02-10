<div class="main-content">
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="#">Dashboard</a>                
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
                Benefit Info
            </h1>
        </div><!--/.page-header-->
        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->
                <h4 class="lighter">                    
                    <a href="#modal-wizard" data-toggle="modal" class="pink"> 
                        <?php echo validation_errors(); ?>
                        <?php echo $this->session->userdata('error');
                        $this->session->unset_userdata('error'); ?> 
<?php echo $this->session->userdata('success');
$this->session->unset_userdata('success'); ?> </a>
                </h4>
                <div class="hr hr-18 hr-double dotted"></div>            
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="lighter">Dashboard</h4>                               
                            </div>
                            <form action="<?php echo  base_url()?>hris/get_emp_com_overall_report" method="post" target="_blank" id="designationForm" class="form-horizontal">
                            
                            <div class="widget-body">
                                <div class="widget-main">  

                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1">Company :</label>

                                        <div class="controls">
                                            <select style="width: 230px;" id="company" name="company">                                 
                                                <option value="">-- Select Campany --</option>
                                                <?php foreach ($company as $row_c) { ?>
                                                    <option value="<?php echo $row_c['company_id'] ?>"><?php echo $row_c['company_name'] ?></option> 
<?php } ?>																				
                                            </select>
                                            <h6 style="color: red;"><?php echo form_error('title'); ?></h6>
                                            <div id="disp"></div>
                                            <div id="designation_disp"></div>
                                        </div>
                                        <div id="disp"></div>

                                    </div>
                                    <input type="submit" value="Get OverAll Report" >                


                                  
                                </div><!--/widget-main-->
                            </div><!--/widget-body-->
                           
                            </form>
                        </div>
                    </div>
                </div>               
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->  
</div><!--/.main-content-->
<!-- *******  Start for Date picker  *******-->


<!-- *******  End for Date picker  *******-->

<!-- *******************************   Form Validations   ****************************** -->

<script type="text/javascript">

    $(document).ready(function () {

    });
    $('#designationForm').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            company: {
                required: true
            }
        },
        highlight: function (e) {
            $(e).closest('.control-group').removeClass('info').addClass('error');
        },
        submitHandler: function (form) {
            document.validationForm.action = "<?php echo base_url(); ?>admission_r/add_initial_form_data";
            document.validationForm.submit();
        }
    });




   
</script>   
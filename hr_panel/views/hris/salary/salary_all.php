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
                                    <input type="button" value="Get Grade/Level" id="get_ajax_grade_level">                


                                    <div id="grade_level"></div>
                                </div><!--/widget-main-->
                            </div><!--/widget-body-->
                        </div>
                    </div>
                </div>               
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->  
</div><!--/.main-content-->
<!-- *******  Start for Date picker  *******-->

<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
                                            $(function () {
                                                $('.date-picker').datepicker({
                                                    changeMonth: true,
                                                    changeYear: true
                                                });
                                                $('.date-picker').on('changeDate', function (ev) {
                                                    $(this).datepicker('hide');
                                                });
                                            });
</script>
<!-- *******  End for Date picker  *******-->

<!-- *******************************   Form Validations   ****************************** -->

<script type="text/javascript">

    $(document).ready(function () {


        $('#company').change(function () {


            var company = this.value;
            //alert(company);
            $.ajax({
                type: "GET",
                url: "<?php echo site_url() ?>hris/get_ajax_salary/?company_id=" + company + '&page_name=salary',
                success: function (html) {
                    $("#disp").html(html);
                }


            });
            return false;


        });
    });
    $('#initialform').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            campaign: {
                required: true
            },
            s_date: {
                required: true
            },
            e_date: {
                required: true
            },
            campus: {
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

    function changeSource(value) {
        if (value == 'news') {
            $('#gallery-div').hide();
            $('#news-div').show();
        } else if (value == 'gallery') {
            $('#news-div').hide();
            $('#gallery-div').show();
        }
    }

    $('#get_ajax_grade_level').click(function () {

company = $('#company').val();

       department = $('#department').val();
        //alert(company);
        $.ajax({
            type: "GET",
            url: "<?php echo site_url() ?>hris/get_ajax_grade_level/?company_id=" + company + '&department='+department,
            success: function (html) {
                $("#grade_level").html(html);
            }


        });
        return false;


    });

   
</script>   
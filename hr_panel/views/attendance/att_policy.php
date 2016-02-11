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
                Attendance Management

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Attendance Policy </li>
        </ul><!--.breadcrumb-->

    </div>

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Add Attendance Policy

            </h1>
        </div><!--/.page-header-->

        <h4 class="lighter">
            <a href="" style="text-decoration: none" class="pink">
                <?php
                echo $this->session->userdata('error_msg');
                $this->session->unset_userdata('error_msg');
                ?>
            </a>
            <a href="" style="text-decoration: none" class="green">
                <?php
                echo $this->session->userdata('success_msg');
                $this->session->unset_userdata('success_msg');
                ?>
            </a>
        </h4>

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->






                <div class="row-fluid">
                    <div class="span12 widget-container-span">
                        <div class="widget-box">
                            <div class="widget-header">
                                <h5 class="smaller"> Add Attendance Policy </h5>


                            </div>
                            <form id="employeeform" method="POST" action="<?php echo base_url() ?>attendance/parse_raw_attendance" />
                            <input type="hidden" name="from" value="manual">
                            <div class="widget-body">
                                <div class="widget-main padding-6">
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane in active">
                                            <div class="row-fluid" style="float:left; width:190px">
                                                <select style="width: 180px;" id="company" name="company">   
                                                    <?php if ($this->session->userdata('company_id') == '0') { ?>

                                                        <option value="">-- Select Campany --</option>
                                                        <?php foreach ($company as $row_c) { ?>
                                                            <option value="<?php echo $row_c['company_id']; ?>"><?php echo $row_c['company_name']; ?></option> 
                                                        <?php } ?>																				

                                                    <?php } else { ?>

                                                        <option value="">-- Select Campany --</option>

                                                        <option value="<?php echo $this->session->userdata('company_id'); ?>"><?php echo$this->session->userdata('company_name'); ?></option> 


                                                    <?php } ?>
                                                </select>
                                            </div>
                                              <div class="row-fluid" id="date_limit"> 

                                    <div id="fix_block" >
                                   
                                        <div class="row-fluid">
                                            <label class="control-label" for="form-input-readonly">Time Out</label>
                                            <input name="dtime2" value="" id="time2" type="number"/>
                                        </div>
                                    </div>

                                </div>
                                        </div>









                                        <button id="search_attendance" class="btn btn-purple btn-small" style="margin-top:0px;" >
                                            Mark Attendance Policy

                                        </button>
                                    </div>

                                </div>

                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div><!--PAGE CONTENT ENDS-->
</div><!--/.span-->
</div><!--/.row-fluid-->
</div><!--/.page-content-->   
</div><!--/.main-container-->

<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>

<script language="javascript">
    $(document).ready(function () {

    });

</script>

<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'T<"clear">lfrtip',
            tableTools: {
                "sRowSelect": "single"
            }
        });
    });
</script>
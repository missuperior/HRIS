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
                Grade

                <span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                </span>
            </li>
            <li class="active">Add Grade</li>
        </ul><!--.breadcrumb-->

    </div>

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                Add Grade
            </h1>
        </div><!--/.page-header--><br /><br />

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <h4 class="lighter">
                    <a href="" style="text-decoration: none" class="pink">
                        <?php echo $this->session->userdata('error');
                        $this->session->unset_userdata('error');
                        ?>
                    </a>
                     <a href="" style="text-decoration: none" class="green">
                        <?php echo $this->session->userdata('success');
                        $this->session->unset_userdata('success');
                        ?>
                    </a>
                </h4>

                <?php $attributes = array('id' => 'designationForm', 'class' => 'form-horizontal');
                echo form_open('hris/add_grade_benefit', $attributes);
                ?>

                  <div class="control-group">
                    <label class="control-label"  >Grade :</label>

                    <div class="controls">
                        <select id="grade" name="grade">
                            <option value="">Select Grade</option>
                            <?php
                            foreach ($grade as $grd) {
                              echo '<option value="'.$grd['grade_id'].'">';
                              echo $grd['class'];
                              echo '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                   <div class="control-group">
                    <label class="control-label"  >Level :</label>

                    <div class="controls">
                        <select id="level" name="level">
                            <option value="">Select Level</option>
                            <?php
                            foreach ($levels as $level) {
                              echo '<option value="'.$level['level_id'].'">';
                              echo $level['title'];
                              echo '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br /><br />

                <div class="form-actions">
                    <button class="btn btn-info">
                        <i class="icon-ok bigger-150"></i>
                        Save
                    </button>

                </div><!--PAGE CONTENT ENDS-->

<?php echo form_close(); ?>

            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->   
</div><!--/.main-container-->

<script type="text/javascript">
    $('#designationForm').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            grade: {
                required: true
            },
            benefit: {
                required: true
            } ,
             level: {
                required: true
            } 
        },
        highlight: function (e) {
            $(e).closest('.control-group').removeClass('info').addClass('error');
        },
        submitHandler: function (form) {
            document.designationForm.action = "<?php //echo base_url();   ?>hris/add_grade";
            document.designationForm.submit();
        }
    });

    jQuery(function ($) {
        //$("#default_value").mask("99999-9999999-9");
    });

</script> 
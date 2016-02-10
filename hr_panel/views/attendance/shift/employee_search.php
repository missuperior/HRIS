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
        Employee Management

        <span class="divider">
          <i class="icon-angle-right arrow-icon"></i>
        </span>
      </li>
      <li class="active">Employee Report</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Employee Report
<!--        <small>
          <i class="icon-double-angle-right"></i>
          Common form elements and layouts
        </small>-->
      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
      <a href="" style="text-decoration: none" class="pink">
        <?php echo $this->session->userdata('error_msg');
        $this->session->unset_userdata('error_msg'); ?>
      </a>
    </h4>
     <h4 class="lighter">
      <a href="" style="text-decoration: none" class="green">
        <?php echo $this->session->userdata('success_msg');
        $this->session->unset_userdata('success_msg'); ?>
      </a>
    </h4>

    <div class="row-fluid">
      <div class="span12">
        <!--PAGE CONTENT BEGINS-->


        <div class="widget-box">
          <div class="widget-header widget-header-small">
            <h5 class="lighter">Search Employee</h5>
          </div>

          <div class="widget-body">
            <div class="widget-main" style="min-height: 40px">

              <?php if( $this->session->userdata('company_id')=='0' ){ ?>
                        <div class="row-fluid" style="float:left; width:190px">
                            <select style="width: 180px;" id="company" name="company">                                 
                              <option value="">-- Select Campany --</option>
                              <?php foreach ($company as $row_c){?>
                                  <option value="<?php echo $row_c['company_id']; ?>"><?php echo $row_c['company_name']; ?></option> 
                              <?php }?>																				
                            </select>
                        </div>
                      <?php } else { ?>
                      <div class="row-fluid" style="float:left; width:190px">
                            <select style="width: 180px;" id="company" name="company">                                 
                              <option value="">-- Select Campany --</option>
                             
                                  <option value="<?php echo $this->session->userdata('company_id'); ?>"><?php echo$this->session->userdata('company_name'); ?></option> 
                              																			
                            </select>
                        </div>
                      <?php } ?>

              <div id="disp"></div>


              <button id="search_btn_m" class="btn btn-purple btn-small" style="margin-top:0px;" >
                Search
                <i class="icon-search icon-on-right bigger-110"></i>
              </button>


            </div>
          </div>
        </div>


        <div id="disp"></div>


    

        <div id="shift-employee">

        </div>
<!--        <div id="assign-shift_div" style="display: none;">
         
          </div>-->
      </div><!--PAGE CONTENT ENDS-->
    </div><!--/.span-->
  </div><!--/.row-fluid-->
</div><!--/.page-content-->   
</div><!--/.main-container-->

<script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
<!--<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>-->
<script language="javascript">

  $(document).ready(function () {
 
    $('#company').change(function () {
    
    
    
    var company = this.value;
      //alert(company);
      $.ajax({
        type: "GET",
        url: "<?php echo site_url() ?>hris/get_ajax_salary/?company_id=" + company,
        success: function (html) {
          $("#disp").html(html);
        }


      });
      return false;


    });


    $('#search_btn_m').click(function () {

      var company = this.value;
      //alert(company);
      $.ajax({
        type: "POST",
        data: {
          company: $('#company').val(),
          department: $('#department').val()
        },
        url: "<?php echo site_url() ?>attendance/search_employee_for_shift",
        success: function (data) {
         // $("#shift-employee").html(html);
           $("#shift-employee").html(data);
          $('#assign-shift_div').show();
        }


      });
      return false;


    });

       $('#assign-shift').click(function () {  alert('678686');
//      var someObj = {};
//      someObj.fruitsGranted = [];
//      someObj.fruitsDenied = [];

//      $("input:checkbox").each(function () {
//        var $this = $(this);
//
//        if ($this.is(":checked")) {
//          someObj.fruitsGranted.push($this.attr("id"));
//        } else {
//          someObj.fruitsDenied.push($this.attr("id"));
//        }
//      });
      
      //console.log(someObj.fruitsGranted);
      
    });

  });

</script>
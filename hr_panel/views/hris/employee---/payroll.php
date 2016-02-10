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
      <li class="active">Employee Payroll</li>
    </ul><!--.breadcrumb-->

  </div>

  <div class="page-content">
    <div class="page-header position-relative">
      <h1>
        Employee Payroll
<!--        <small>
          <i class="icon-double-angle-right"></i>
          Common form elements and layouts
        </small>-->
      </h1>
    </div><!--/.page-header-->

    <h4 class="lighter">
       <a href="" style="text-decoration: none" class="pink">
            <?php echo $this->session->userdata('error_msg'); $this->session->unset_userdata('error_msg'); ?>
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
                    <?php echo form_open('hris/employee_by_department'); ?>
                        <div class="row-fluid" style="float:left; width:250px"> 
                            <select style="width: 230px;" id="department" name="department">                                 
                              <option value="">-- Department Wise --</option>
                              <?php foreach ($department as $row){?>
                                  <option value="<?php echo $row['department_id']?>"><?php echo $row['department_name']?></option> 
                              <?php }?>																				
                            </select>
                        </div>
                      
                        <div class="row-fluid" style="float:left; width:250px">                         
                              <select style="width: 230px;" id="campus" name="campus">                                 
                                <option value="">-- Campus Wise --</option>
                                <?php foreach ($campus as $row){?>
                                    <option value="<?php echo $row['campus_id']?>"><?php echo $row['campus_name']?></option> 
                                <?php }?>																				
                              </select>
                          </div>

                        <button id="search_btn" class="btn btn-purple btn-small" style="margin-top:0px;" >
                            Search
                            <i class="icon-search icon-on-right bigger-110"></i>
                        </button>
                      
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        
        
        <div id="disp"></div>
        

        </div><!--PAGE CONTENT ENDS-->
      </div><!--/.span-->
    </div><!--/.row-fluid-->
  </div><!--/.page-content-->   
</div><!--/.main-container-->
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
      <li class="active">Employee Profile</li>
    </ul><!--.breadcrumb-->

  </div>

    <div class="page-content">
        
        <div class="page-header position-relative">
            <h1>
                Employee Profile          
            </h1>
        </div><!--/.page-header-->
        
        <div class="row-fluid">
          <div class="span12">
            <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                      <li class="active">
                        <a data-toggle="tab" href="#employment" style="background: #006E6F !important; color:#fff !important;">
                          <i class="green icon-home bigger-110"></i>
                          Employment
                        </a>
                      </li>

                      <li>
                        <a data-toggle="tab" href="#personal" style="background: #006E6F !important; color:#fff !important;">
                          <i class="green fa fa-phone"></i>
                          Personal
                        </a>
                      </li>
                      
                      <li>
                        <a data-toggle="tab" href="#contact" style="background: #006E6F !important; color:#fff !important;">                          
                          <i class="green fa fa-pencil-square-o"></i>
                          Contact
                        </a>
                      </li>
                      
                      <li>
                        <a data-toggle="tab" href="#medical" style="background: #006E6F !important; color:#fff !important;">
                          <i class="green fa fa-users"></i>
                          Medical
                        </a>
                      </li>

                      <li>
                        <a data-toggle="tab" href="#qualification" style="background: #006E6F !important; color:#fff !important;">
                          <i class="green fa fa-file-text"></i>
                          Qualification
                        </a>
                      </li>
                      
                      <li>
                        <a data-toggle="tab" href="#experience" style="background: #006E6F !important; color:#fff !important;">
                          <i class="green fa fa-file-text"></i>
                          Work Experience
                        </a>
                      </li>
                      
                      <li>
                        <a data-toggle="tab" href="#reference" style="background: #006E6F !important; color:#fff !important;">
                          <i class="green fa fa-file-text"></i>
                          Reference
                        </a>
                      </li>
                      
                    </ul>

                    <div class="tab-content">
                      <div id="employment" class="tab-pane in active">
                        
                        <div>
                        <div id="user-profile-1" class="user-profile row-fluid">
                          <div class="span3 center">
                            <div>
                              <?php
                              if($employee[0]['emp_picture'] != 'NULL')
                              {
                              ?>

                              <span class="profile-picture">
                                  <img id="avatar" class="editable" src="<?php echo base_url();?><?php echo $employee[0]['emp_picture']; ?>" width="150" height="150"/>
                              </span>
                              <?php }else{ ?>
                              
                              <span class="profile-picture">
                                <img id="avatar" class="editable" src="<?php echo base_url();?>assets/images/no-img.png" width="150" height="150"/>
                              </span>
                              
                              <?php }?>
                              
                              <div class="space-4"></div>

                              <div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
                                <div class="inline position-relative">
                                  <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-circle light-green middle"></i>
                                    &nbsp;
                                    <span class="white middle bigger-120"><?php echo $employee[0]['employee_name'] ?></span>
                                  </a>

                                  <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                                    <li class="nav-header"> Change Status </li>

                                    <li>
                                      <a href="#">
                                        <i class="icon-circle green"></i>
                                        &nbsp;
                                        <span class="green">Available</span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#">
                                        <i class="icon-circle red"></i>
                                        &nbsp;
                                        <span class="red">Busy</span>
                                      </a>
                                    </li>

                                    <li>
                                      <a href="#">
                                        <i class="icon-circle grey"></i>
                                        &nbsp;
                                        <span class="grey">Invisible</span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>

                            <!--                    <div class="space-6"></div>-->

                            <!--                    <div class="profile-contact-info">
                                                  <div class="profile-contact-links align-left">
                                                    <a class="btn btn-link" href="#">
                                                      <i class="icon-plus-sign bigger-120 green"></i>
                                                      Add as a friend
                                                    </a>

                                                    <a class="btn btn-link" href="#">
                                                      <i class="icon-envelope bigger-120 pink"></i>
                                                      Send a message
                                                    </a>

                                                    <a class="btn btn-link" href="#">
                                                      <i class="icon-globe bigger-125 blue"></i>
                                                      www.alexdoe.com
                                                    </a>
                                                  </div>

                                                  <div class="space-6"></div>

                                                  <div class="profile-social-links center">
                                                    <a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
                                                      <i class="middle icon-facebook-sign icon-2x blue"></i>
                                                    </a>

                                                    <a href="#" class="tooltip-info" title="" data-original-title="Visit my Twitter">
                                                      <i class="middle icon-twitter-sign icon-2x light-blue"></i>
                                                    </a>

                                                    <a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
                                                      <i class="middle icon-pinterest-sign icon-2x red"></i>
                                                    </a>
                                                  </div>
                                                </div>-->

                            <!--                    <div class="hr hr12 dotted"></div>-->

                            <!--                    <div class="clearfix">
                                                  <div class="grid2">
                                                    <span class="bigger-175 blue">25</span>

                                                    <br />
                                                    Followers
                                                  </div>

                                                  <div class="grid2">
                                                    <span class="bigger-175 blue">12</span>

                                                    <br />
                                                    Following
                                                  </div>
                                                </div>-->

                            <div class="hr hr16 dotted"></div>
                          </div>

                          <div class="span9">
                              <!-------------Square Boxes---------------->
                              
<!--                            <div class="center">
                              <span class="btn btn-app btn-small btn-light no-hover">
                                <span class="bigger-150 blue"> 0 </span>

                                <br />
                                <span class="smaller-90"> Leaves </span>
                              </span>

                              <span class="btn btn-app btn-small btn-yellow no-hover">
                                <span class="bigger-175"> 0 </span>

                                <br />
                                <span class="smaller-90"> Absents </span>
                              </span>

                              <span class="btn btn-app btn-small btn-pink no-hover">
                                <span class="bigger-175"> 0 </span>

                                <br />
                                <span class="smaller-90"> Presents </span>
                              </span>

                              <span class="btn btn-app btn-small btn-grey no-hover">
                                <span class="bigger-175"> 0 </span>

                                <br />
                                <span class="smaller-90"> Increment </span>
                              </span>

                              <span class="btn btn-app btn-small btn-success no-hover">
                                <span class="bigger-175"> 0 </span>

                                <br />
                                <span class="smaller-90"> Deduction </span>
                              </span>

                              <span class="btn btn-app btn-small btn-primary no-hover">
                                <span class="bigger-175"> 0 </span>

                                <br />
                                <span class="smaller-90"> Loan </span>
                              </span>
                            </div>-->

<!------------------End Square Boxes------------------>

                            <div class="space-12"></div>
                            <!---------------Gen Information-------------->

                            <div class="profile-user-info profile-user-info-striped">
                                <h3 style="text-align: center;">Job Details</h3>
                                <div class="profile-info-row">
                                <div class="profile-info-name">  ID/Code </div>

                                <div class="profile-info-value">
                                  <span class="editable" id="username"><?php echo $employee[0]['emp_code'] ?></span>
                                </div>
                              </div>
                                
                              <div class="profile-info-row">
                                <div class="profile-info-name"> First Name </div>

                                <div class="profile-info-value">
                                  <span class="editable" id="username"><?php echo $employee[0]['employee_name'] ?></span>
                                </div>
                              </div>
                                <?php if(!empty($employee[0]['employee_status'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Status </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $employee[0]['employee_status'];
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                
                                <?php if(!empty($employee[0]['soc_sec_num'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Security </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $employee[0]['soc_sec_num'];
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                
                                
                                <?php if(!empty($employee[0]['health_ins_num'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Insurance </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $employee[0]['health_ins_num'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                
                                <?php if(!empty($employee[0]['eobi_num'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> EOBI# </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $employee[0]['eobi_num'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                
                                
                                <?php if(!empty($employee[0]['grade'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Grade </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $employee[0]['grade'];
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                <!----------End Gen Information------------------->
                                
                                <!-----------Additional Information----------------->
                                
                                <h3 style="text-align: center;">Designation Details</h3>
                                <?php
                                $dep_id = 0;
                                foreach($employee as $k=>$data) { ?>
                              <div class="profile-info-row">
                                <div class="profile-info-name"> Department </div>

                                <div class="profile-info-value">
                                  <span class="editable" id="country"><?php echo $data['department_name'] ?></span>
                                  
                                </div>
                              </div>

                              <div class="profile-info-row">
                                <div class="profile-info-name"> Company </div>

                                <div class="profile-info-value">
                                  <span class="editable" id="age"><?php echo $data['company_name'];?></span>
                                </div>
                              </div>

                              <div class="profile-info-row">
                                <div class="profile-info-name"> Designation </div>

                                <div class="profile-info-value">
                                  <span class="editable" id="signup">
                                  <?php
                                 echo $data['designation_title']; 
                                  ?>
                                  </span>
                                </div>
                              </div>

                              
                                
<!--                                <div class="profile-info-row">
                                <div class="profile-info-name"> Additional Designation </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    //echo $employee[0]['reporting_to'];
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>-->
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Campus </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $data['campus_name'];
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Type </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $data['employee_type'];
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                
                                
                                
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Shift </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $data['shift'];
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                
                                
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Joining </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    $join_date = $data['joining_date'];
                                    echo date('d-M-Y', strtotime($join_date));
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Confirmation </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    $con_date = $data['confirmation_date'];
                                    echo date('d-M-Y', strtotime($con_date));
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                
                              
                              <?php if(!empty($data['record_starting_salary'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Salary </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $data['record_starting_salary'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>

                                    <?php if(!empty($data['current_salary'])){ ?>
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Current Salary </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    echo $data['current_salary'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>

                                <?php } ?>

                                    <?php if(!empty($data['probation_period'])){ ?>
                                
                              <div class="profile-info-row">
                                <div class="profile-info-name"> Probation </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    
                                    echo $data['probation_period'];
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>

                                <?php if(!empty($data['probation_from'])){ ?>
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Probation From </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                    $probation_from = $data['probation_from'];
                                    echo date("d-M-Y", strtotime($probation_from));
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>

                                    <?php if(!empty($data['probation_to'])){ ?>
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Probation To </div>

                                <div class="profile-info-value">
                                  <?php 
                                                      
                                     $probation_to = $data['probation_to'];
                                     echo date("d-M-Y", strtotime($probation_to));
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                
                                <?php if(!empty($netSalary[0]['sal_type_name'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Salary Type </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $netSalary[0]['sal_type_name'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                               <?php } ?>
                                
                               <?php if(!empty($netSalary[0]['salary_amount'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Amount </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $netSalary[0]['salary_amount'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                
                                <?php if(!empty($netSalary[0]['salary_date'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name"> Date </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $netSalary[0]['salary_date'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                              <br/>
                               
                               <!-----------------End Additional Information---------------------> 
                               
                               
                                
                                <?php 
                                $dept_id = $data[$k]['department_id'];
                               //echo $data[0]['department'];
                                //echo count($dep_id);
                                
                                if(sizeof($data['department_id']) > '1' || sizeof($data['department_id']) == '0'){
                                  // echo $dep_id;
                                echo '<h3 style="text-align:center;">Additional</h3>';
                               
                                    }
                                $dep_id++;} ?>
                               <?php if(!empty($data['bank_name'])){ ?>
                               
                               <h3 style="text-align: center;">Bank Details</h3>

                                <div class="profile-info-row">
                                <div class="profile-info-name"> Bank Name </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $data['bank_name'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                
                               <?php if(!empty($data['account_title'])){ ?>
                               
                                <div class="profile-info-row">
                                <div class="profile-info-name">Title </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $data['account_title'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                               <?php } ?> 
                               
                               <?php if(!empty($data['account_no'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name">Account Number </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $data['account_no'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                
                               
                               <?php if(!empty($data['bank_address'])){ ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name">Address </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $data['bank_address'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                               <?php if(!empty($facilities[0]['facility'])){ ?>
                                <h3 style="text-align: center;">Facilities</h3>
                                <?php foreach($facilities as $row) { ?>
                                <div class="profile-info-row">
                                <div class="profile-info-name">Facility </div>
                                
                                <div class="profile-info-value">
                                  <?php echo $row['facility'];?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name">Facility Date From </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $row['facility_date_from'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                
                                <div class="profile-info-row">
                                <div class="profile-info-name">Description </div>

                                <div class="profile-info-value">
                                  <?php 
                                         
                                    echo $row['facility_description'];
                                    
                                  
                                  ?>
                                  <span class="editable" id="login"></span>
                                </div>
                              </div>
                                <?php } ?>
                                <?php } ?>
                              <!--                      <div class="profile-info-row">
                                                      <div class="profile-info-name"> About Me </div>

                                                      <div class="profile-info-value">
                                                        <span class="editable" id="about">Editable as WYSIWYG</span>
                                                      </div>
                                                    </div>-->
                            </div>

                            <div class="space-20"></div>

<!--                            <div class="widget-box transparent">
                              <div class="widget-header widget-header-small">
                                <h4 class="blue smaller">
                                  <i class="icon-rss orange"></i>
                                  Recent Activities
                                </h4>

                                <div class="widget-toolbar action-buttons">
                                  <a href="#" data-action="reload">
                                    <i class="icon-refresh blue"></i>
                                  </a>

                                  &nbsp;
                                  <a href="#" class="pink">
                                    <i class="icon-trash"></i>
                                  </a>
                                </div>
                              </div>

                              <div class="widget-body">
                                <div class="widget-main padding-8">
                                  <div id="profile-feed-1" class="profile-feed">
                                    <div class="profile-activity clearfix">
                                      <div>
                                        <?php
                                        if($employee[0]['emp_picture'] != 'NULL')
                                        {
                                        ?>
                                        <img class="pull-left" src="<?php echo base_url();echo $employee[0]['emp_picture']; ?>" />
                                        <?php }?>
                                        <a class="user" href="#"> <?php echo $employee[0]['employee_name'] ?> </a>
                                        has got 10,000 Increment.

                                        <div class="time">
                                          <i class="icon-time bigger-110"></i>
                                          an hour ago
                                        </div>
                                      </div>

                                      <div class="tools action-buttons">
                                        <a href="#" class="blue">
                                          <i class="icon-pencil bigger-125"></i>
                                        </a>

                                        <a href="#" class="red">
                                          <i class="icon-remove bigger-125"></i>
                                        </a>
                                      </div>
                                    </div>

                                    <div class="profile-activity clearfix">
                                      <div>
                                        <?php
                                        if($employee[0]['emp_picture'] != 'NULL')
                                        {
                                        ?>
                                        <img class="pull-left" src="<?php echo base_url();echo $employee[0]['emp_picture']; ?>" />
                                        <?php }?>
                                        <a class="user" href="#"> <?php echo $employee[0]['employee_name'] ?> </a>
                                        has been promoted as Team Lead.

                                        <div class="time">
                                          <i class="icon-time bigger-110"></i>
                                          4 hours ago
                                        </div>
                                      </div>

                                      <div class="tools action-buttons">
                                        <a href="#" class="blue">
                                          <i class="icon-pencil bigger-125"></i>
                                        </a>

                                        <a href="#" class="red">
                                          <i class="icon-remove bigger-125"></i>
                                        </a>
                                      </div>
                                    </div>

                                    <div class="profile-activity clearfix">
                                      <div>
                                        <?php
                                        if($employee[0]['emp_picture'] != 'NULL')
                                        {
                                        ?>
                                        <img class="pull-left" src="<?php echo base_url();echo $employee[0]['emp_picture']; ?>" />
                                        <?php }?>
                                        <a class="user" href="#"> <?php echo $employee[0]['employee_name'] ?> </a>
                                        has been made permanent.

                                        <div class="time">
                                          <i class="icon-time bigger-110"></i>
                                          6 hours ago
                                        </div>
                                      </div>

                                      <div class="tools action-buttons">
                                        <a href="#" class="blue">
                                          <i class="icon-pencil bigger-125"></i>
                                        </a>

                                        <a href="#" class="red">
                                          <i class="icon-remove bigger-125"></i>
                                        </a>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="hr hr2 hr-double"></div>

                            <div class="space-6"></div>

                            <div class="center">
                              <a href="#" class="btn btn-small btn-primary">
                                <i class="icon-rss bigger-150 middle"></i>

                                View more activities
                                <i class="icon-on-right icon-arrow-right"></i>
                              </a>
                            </div>-->
                          </div>
                        </div>
                      </div>
                      
                      </div>
                     

                      <div id="personal" class="tab-pane">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>                            
                            <tr>                                                                        
                              <th>Father Name</th>
                              <td><?php echo $employee[0]['father_name']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Mother Name</th>
                              <td><?php echo $employee[0]['mother_name']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Spouse Name</th>
                              <td><?php echo $employee[0]['spouse_name']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>CNIC Number</th>
                              <td><?php echo $employee[0]['cnic_no']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Gender</th>
                              <td><?php echo $employee[0]['gender']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Blood Group</th>
                              <td><?php echo $employee[0]['blood_group']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Marital Status</th>
                              <td><?php echo $employee[0]['marital_status']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Religion</th>
                              <td><?php echo $employee[0]['religion']; ?></td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Date of Birth</th>
                              <td>                             
                                <?php
                                if(!empty($employee[0]['date_of_birth']))
                                {
                                  $dob = str_replace("/", "-", $employee[0]['date_of_birth']);  
                                  echo date("d F,Y",strtotime($dob)); 
                                }
                                else
                                {
                                 echo '';
                                }
                                ?>
                              </td>
                            </tr>
                            
                            <tr>                                                                        
                              <th>Nationality</th>
                              <td><?php echo $employee[0]['nationality']; ?></td>
                            </tr>
                            
                
                          </tbody>
                        </table>
                        
                        
                        <?php if(!empty($dependent[0]['dependent_name'])){ ?>
                        <h3>Dependent</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Dependent Name</th>
                              <th>Relationship</th>
                              <th>Age</th>
                              <th>CNIC</th>
                              <th>Address</th>
                            </tr>
                          </thead>
            
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($dependent as $row) {
                              if(!empty($row['dependent_name'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $row['dependent_name']; ?></td>
                                <td><?php echo $row['relationship']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['dependent_cnic']; ?></td>
                                <td><?php echo $row['dependent_address']; ?></td>
                                                                
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table> 
                        <?php }?>
                        
                        <?php if(!empty($nominee[0]['nominee_name'])){ ?>
                        <h3>Social Media Details</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>LinkedIn</th>
                              <th>Skype</th>
                              <th>Facebook</th>
                              <th>Twitter</th>
                            </tr>
                          </thead>
            
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($socials as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $row['linked_in']; ?></td>
                                <td><?php echo $row['skype']; ?></td>
                                <td><?php echo $row['facebook']; ?></td>
                                <td><?php echo $row['twitter']; ?></td>                                
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>
                        
                        <?php }?>
                        
                      </div>

                      <div id="contact" class="tab-pane">
                        
                        <div id="degree_div">
                        <h3>Contact Details</h3>                                                
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Mobile No.1</th>
                              <th>Mobile No.2</th>
                              <th>Work Phone</th>
                              <th>Home Residence Phone</th>
                              <th>Personal Email</th>
                              <th>Work Email</th>
                              <th>Permanent Address</th>
                              <th>Temporary Address</th>
                              <th>Correspondence Address</th>
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($contacts as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['mobile_1']; ?></td>
                                <td><?php echo $row['mobile_2']; ?></td>
                                <td><?php echo $row['work_phone']; ?></td>
                                <td><?php echo $row['permanent_contact_no']; ?></td>
                                <td><?php echo $row['email_1']; ?></td>
                                <td><?php echo $row['email_2']; ?></td>
                                <td><?php echo $row['permanent_address']; ?></td>
                                <td><?php echo $row['mailing_address']; ?></td>
                                <td><?php echo $row['correspondence_address']; ?></td>
                                                               
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>
                        </div>
                        
                        <div id="degree_div">
                        <h3>Emergency Contact Details</h3>                                                
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name of the Person</th>
                              <th>Relationship</th>
                              <th>Phone</th>
                              <th>Email</th>
                              <th>Address</th>
                              
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($nominee as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['nominee_name']; ?></td>
                                <td><?php echo $row['nominee_relation']; ?></td>
                                <td><?php echo $row['nominee_phone']; ?></td>
                                <td><?php echo $row['nominee_email']; ?></td>
                                <td><?php echo $row['nominee_address']; ?></td>
                               
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>
                        </div>  
                        
                      </div>
                      
                      <div id="medical" class="tab-pane">
                        
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>                            
                            <tr>                                                                        
                              <th>Name of Disease</th>
                              <td><?php echo $medical[0]['name_of_disease']; ?></td>
                            </tr>                            
                            <tr>                                                                        
                              <th>Physical Limitation</th>
                              <td><?php echo $medical[0]['physical_limitation']; ?></td>
                            </tr>                            
                            <tr>                                                                        
                              <th>Nature of Doctor</th>
                              <td><?php echo $medical[0]['doctor_name']; ?></td>
                            </tr>                            
                            <tr>                                                                        
                              <th>Doctor's Contact</th>
                              <td><?php echo $medical[0]['doctor_contact_no']; ?></td>
                            </tr>                            
                            <tr>                                                                        
                              <th>Doctor's Address</th>
                              <td>
                              <?php
                                echo $medical[0]['doctor_contact_address'];
                                ?>
                              </td> 
                            </tr>                            
                            <tr>                                                                        
                              <th>Medical Details</th>
                              <td>
                              <?php
                                echo $medical[0]['medical_detail'];
                                ?>
                              </td>
                            </tr>                            
                           
                
                          </tbody>
                        </table>
                       </div>
                      
                      <div id="qualification" class="tab-pane">
                        <h3>Education</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Degree Title</th>
                              <th>Specialization</th>
                              <th>Grade/CGPA</th>
                              <th>Institute</th>
                              <th>Completion Year</th>
                              
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($education as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['degree_title']; ?></td>
                                <td><?php echo $row['major_subjects']; ?></td>
                                <td><?php echo $row['degree_grade']; ?></td>
                                <td><?php echo $row['degree_institute_name']; ?></td>
                                <td><?php echo $row['degree_passing_year']; ?></td>
                               
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table> 
                        
                        
                        <h3>Training/Certification</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Institute</th>
                              <th>Completion Year</th>
                              <th>Duration</th>
                              <th>Institution Address</th>
                              
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($certification as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['training_title']; ?></td>
                                <td><?php echo $row['training_institute']; ?></td>
                                <td><?php echo $row['training_completion_year']; ?></td>
                                <td><?php echo $row['training_duration']; ?></td>
                                <td><?php echo $row['training_institute_address']; ?></td>
                               
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>
                        
                        
                        
                        <h3>Skills</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Years of Experience</th>
                              <th>Skill Level</th>
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($skills as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['skill_name']; ?></td>
                                <td><?php echo $row['years_of_experience']; ?></td>
                                <td><?php echo $row['skill_level']; ?></td>
                                
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>
                        
                        
                        <h3>Languages</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Language</th>
                              <th>Category</th>
                              <th>Skill Level</th>
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($lang as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['language']; ?></td>
                                <td><?php echo $row['language_category']; ?></td>
                                <td><?php echo $row['language_level']; ?></td>
                                
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>
                        
                        
                        <h3>Membership</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Membership Title</th>
                              <th>Validity Duration</th>
                              <th>Organization/Institute</th>
                              <th>Country of Institute</th>
                              <th>Membership Since</th>
                              <th>Last Renewal</th>
                              <th>Registration Number</th>
                              <th>Amount</th>
                              <th>Paid By</th>
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($member as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['membership_title']; ?></td>
                                <td><?php echo $row['membership_duration']; ?></td>
                                <td><?php echo $row['membership_institue_name']; ?></td>
                                <td><?php echo $row['membership_country']; ?></td>
                                <td><?php echo $row['membership_since']; ?></td>
                                <td><?php echo $row['membership_last_renewed']; ?></td>
                                <td><?php echo $row['membership_reg_no']; ?></td>
                                <td><?php echo $row['membership_subscription']; ?></td>
                                <td><?php echo $row['membership_subscription_paidby']; ?></td>
                                
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>
                        
                        
                        
                        <h3>License</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>License Title</th>
                              <th>Organization/Institute</th>
                              <th>License Number</th>
                              <th>Issue Date</th>
                              <th>Expiry Date</th>
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($license as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['license_title']; ?></td>
                                <td><?php echo $row['license_institute']; ?></td>
                                <td><?php echo $row['license_no']; ?></td>
                                <td><?php
                                $issue_date = $row['issue_date'];
                                echo date('d-M-Y', strtotime($issue_date)); ?></td>
                                <td><?php
                                $expiry_date = $row['expiry_date'];
                                echo date('d-M-Y', strtotime($expiry_date)); ?></td>
                               
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>
                        
                      </div>
                        
                        
                        
                        <div id="experience" class="tab-pane">
                        
                        <h3>Work Experience Details</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Name Company/Institute</th>
                              <th>Nature of Business</th>
                              <th>Location of Company</th>
                              <th>Company Contact No.</th>
                              <th>Designation</th>
                              <th>Last Drawn Salary</th>
                              <th>Date from</th>
                              <th>Date to</th>
                              <th>Company Address</th>
                              <th>Reason of Leaving</th>
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($exp as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['company_name']; ?></td>
                                <td><?php echo $row['nature_of_business']; ?></td>
                                <td><?php echo $row['company_location']; ?></td>
                                <td><?php echo $row['company_contact_no']; ?></td>
                                <td><?php echo $row['job_title']; ?></td>
                                <td><?php echo $row['last_drawn_salary']; ?></td>
                                <td><?php
                                $date_from = $row['expereince_from_date'];
                                echo date('d-M-Y', strtotime($date_from)); ?></td>
                                <td><?php $date_to = $row['experience_to_date'];
                                echo date('d-M-Y', strtotime($date_to)); ?></td>
                                <td><?php echo $row['company_address']; ?></td>
                                <td><?php echo $row['reason_of_leaving']; ?></td>
                               
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>                      
                        
                      </div>
                        
                        
                        
                        <div id="reference" class="tab-pane">
                        
                        <h3>Reference Details</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Reference Name</th>
                              <th>Name of Company</th>
                              <th>Job Title</th>
                              <th>Reference Contact No.</th>
                              <th>Reference Type</th>
                              <th>Reference Address</th>
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($reference as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['reference_name']; ?></td>
                                <td><?php echo $row['reference_company_business_name']; ?></td>
                                <td><?php echo $row['reference_job_title']; ?></td>
                                <td><?php echo $row['reference_contact_no']; ?></td>
                                <td><?php echo $row['reference_type']; ?></td>
                                <td><?php echo $row['reference_address']; ?></td>
                               
                               
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>                       
                        
                      </div>
                        
                        
                        
                        <div id="documents" class="tab-pane">
                        
                        <h3>Document Details</h3>
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <?php
//                        if(empty($education['degree_title'])){
//                          echo '';
//                        }
//                        else
//                        {                         
                        ?>
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Document Type</th>
                              <th>Category</th>
                              <th>Document</th>
                              <th>Issued/Submitted Date</th>
                              
                            </tr>
                          </thead>
                          <?php 
//                          }
                          ?>
                          <tbody>
                            <?php
                            $i = 0;
                            foreach ($document as $row) {
                              if(!empty($row['emp_id'])){
                              ?>
                              <tr>                                                                                        
                                <td><?php echo $i + 1; ?>
                                  <input type="hidden" id="degree_null" value="1" />
                                </td>                                
                                <td><?php echo $row['document_type']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['document']; ?></td>
                                <td><?php
                                $issue_date = $row['issue_date'];
                                echo date('d-M-Y', strtotime($issue_date)); ?></td>
                                
                              </tr>
                                <?php
                                $i++;
                              }}
                              ?>
                          </tbody>
                        </table>                       
                        
                      </div>

              </div>
            </div>
          </div><!--/span-->
                                                                  
          <div class="vspace-6"></div>
                                                                  
          
        </div><!--/row-->
        
        
        </div><!--/.page-content-->

        
    </div><!--/.main-content-->
</div><!--/.main-container-->  
 
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/x-editable/bootstrap-editable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/x-editable/ace-editable.min.js"></script>

    <!--ace scripts-->

    <!--inline scripts related to this page-->

    <script type="text/javascript">
      
      $(document).ready(function(){       
        $('#degree_div').hide();        
        $('#course_div').hide();
        
        if($('#degree_null').val() == 1)
        {
          $('#degree_div').show();        
        }
        if($('#course_null').val() == 1)
        {
          $('#course_div').show();        
        }
      });
      
      //////////////////////////////
      $('#profile-feed-1').slimScroll({
        height: '250px',
        alwaysVisible : true
      });
      
      $('.profile-social-links > a').tooltip();
      
      $('.easy-pie-chart.percentage').each(function(){
        var barColor = $(this).data('color') || '#555';
        var trackColor = '#E2E2E2';
        var size = parseInt($(this).data('size')) || 72;
        $(this).easyPieChart({
          barColor: barColor,
          trackColor: trackColor,
          scaleColor: false,
          lineCap: 'butt',
          lineWidth: parseInt(size/10),
          animate:false,
          size: size
        }).css('color', barColor);
      });
      
      ///////////////////////////////////////////
                                
                                
      $(function() {
        var oTable1 = $('#sample-table-2').dataTable( {
          "aoColumns": [
            { "bSortable": true },
            null,null,null,null,null,null,
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
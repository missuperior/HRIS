<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

   
        
                </div>
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="#">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>

						<li>
			
						</li>
						<li class="active">User Profile</li>
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
							User Profile 
                                                        <!--<a href="#modal-wizard" onload="test()" data-toggle="modal" class="pink"> Wizard Inside a Modal Box </a>-->
						</h1>
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
	<?php if($this->session->userdata('success_msg')!= ''){?>
               <div class="alert alert-block alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                                <i class="icon-remove"></i>
                        </button>

                        <i class="icon-ok green"></i>

                <?php echo $this->session->userdata('success_msg'); $this->session->unset_userdata('success_msg'); ?>	
                </div>
        <?php } ?>

							<div class="hr dotted"></div>

						

							<div class="show">
								<div id="user-profile-2" class="user-profile row-fluid">
									<div class="tabbable">
										<ul class="nav nav-tabs padding-18">
											<li class="active">
												<a data-toggle="tab" href="#home">
													<i class="green icon-user bigger-120"></i>
													Wall
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
													<i class="orange icon-rss bigger-120"></i>
													Profile
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#quali">
													<i class="blue icon-quote-left bigger-120"></i>
													Qualification
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#exp">
													<i class="pink icon-windows bigger-120"></i>
													Work Experience
												</a>
                                                                                        </li>
                                                                                        <li>
                                                                                            <a data-toggle="tab" href="#ref">
													<i class="pink icon-plus bigger-120"></i>
													Reference
												</a>
                                                                                        </li>
                                                                                        
                                                                                        
                                                                                        <li>
                                                                                            <a data-toggle="tab" href="#membership">
													<i class="orange icon-rss bigger-120"></i>
                                                                                                        Memberships
												</a>
											</li>
                                                                                        
                                                                                        <li>
                                                                                            <a data-toggle="tab" href="#contact">
													<i class="blue icon-phone-sign bigger-120"></i>
													Contact info
												</a>
											</li>
                                                                                        
                                                                                        <li>
                                                                                            <a data-toggle="tab" href="#correction">
													<i class="red icon-save bigger-120"></i>
													Corrections
												</a>
											</li>
										</ul>

										<div class="tab-content no-border padding-24">
											<div id="home" class="tab-pane in active">
												<div class="row-fluid">
                                                                                                    
                                                                                                   
													<div class="span3 center">
														<span class="profile-picture">
                                                                                                                          
                                                                                                       
                                                                                                                    <?php if(!empty($emp_pic[0]['emp_temp_pic'])){ ?>
															<img class="editable" src="<?php echo base_url().$emp_pic[0]['emp_temp_pic']; ?>" />
															<?php } elseif($employee[0]['gender']=='Male'){ ?>
                                                                                                                        <img class="editable" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url(); ?>user_assets/assets/avatars/profile-pic.jpg" />
                                                                                                                        
                                                                                                                        <?php } else if($employee[0]['gender']=='Female'){ ?>
                                                                                                                     <img class="editable" alt="Alex's Avatar" id="avatar2" src="<?php echo base_url(); ?>user_assets/assets/avatars/profile_female.jpg" />
                                                                                                                    <?php } ?>
														</span>
                                                                                                            
                                                                                                            <?php foreach($employee as $data){ ?>
                                                                                                            <?php  if ($this->session->userdata('cor_status') != '1'){ ?> 
                                                                                                            <form method="post" action="<?php echo base_url(); ?>employees/update_picture" enctype="multipart/form-data">
                                                                                                                <input type="hidden" name="emp_id" value="<?php echo $data['emp_id']; ?>">
														<div class="space space-4"></div>
<!--                                                                                                                <a href="#" class="btn btn-small btn-block btn-success">
-->                                                                                                                    <input type="file" name="image" /><!--
														</a>-->
                                                                                                              
														<input type="submit" name="submit" class="btn btn-small btn-block btn-primary" />
															
                                                                                                                </form>
                                                                                                            <?php } ?>
													</div><!--/span-->
                                                                                                        
													<div class="span9">
														<h4 class="blue">
															<span class="middle"><?php echo $data['employee_name']; ?></span>

															
														</h4>

														<div class="profile-user-info">
															<div class="profile-info-row">
																<div class="profile-info-name"> Designation </div>

																<div class="profile-info-value">
																	<span><?php echo $data['designation_title']; ?></span>
																</div>
															</div>
                                                                                                                    
                                                                                                                    <div class="profile-info-row">
																<div class="profile-info-name"> Department </div>

																<div class="profile-info-value">
																	<span><?php echo $data['department_name']; ?></span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name"> Location </div>

																<div class="profile-info-value">
																	<i class="icon-map-marker light-orange bigger-110"></i>
																	<span>Gullberg-III</span>
																	<span>Lahore</span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name"> Age </div>

																<div class="profile-info-value">
																	<span><?php
                                                                                                                                       print_r($age);
                                                                                                                                        echo $age[0]; ?></span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name"> Joined </div>

																<div class="profile-info-value">
																	<span><?php $join_date = $data['joining_date'];
                                                                                                                                                echo date('d-M-Y', strtotime($join_date));?></span>
																</div>
															</div>

															<div class="profile-info-row">
																<div class="profile-info-name"> Last Online </div>

																<div class="profile-info-value">
																	<span>3 hours ago</span>
																</div>
															</div>
														</div>

														<div class="hr hr-8 dotted"></div>

													</div><!--/span-->
                                                                                                        
												</div><!--/row-fluid-->
                                                                                                    <div class="profile-social-links center" style="float: left;margin-left: 7%;margin-top:16px;">
                                                                                                        <a href="<?php
                                                                                                        if(!empty($data['facebook'])){
                                                                                                        echo $data['facebook']; } ?>" class="tooltip-info" title="" data-original-title="Visit my Facebook">
													<i class="middle icon-facebook-sign icon-2x blue"></i>
												</a>

												<a href="<?php
                                                                                                if(!empty($data['twitter'])){
                                                                                                echo $data['twitter']; } ?>" class="tooltip-info" title="" data-original-title="Visit my Twitter">
                                                                                                
													<i class="middle icon-twitter-sign icon-2x light-blue"></i>
												</a>

												<a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
													<i class="middle icon-pinterest-sign icon-2x red"></i>
												</a>
											</div>
												<div class="space-20"></div>

												
											</div><!--#home-->
                                                                                        
                                                                            
                                                                                       

											<div id="profile" class="tab-pane">
												<div class="profile-feed row-fluid">
												            	<div class="row-fluid">
								<div class="span3 pricing-span-header">
									<div class="widget-box transparent">
										<div class="widget-header">
											<h5 class="bigger lighter">Profile </h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="unstyled list-striped pricing-table-header">
													<li> Father Name:</li>
													<li> Mother Name: </li>
													<li>Spouse Name:</li>
													<li>CNIC#:</li>
													<li> Gender: </li>
													<li> Blood Group:</li>
													<li>Marital Status:</li>
													<li> Religion:</li>
													<li>Date of Birthday: </li>
                                                                                                        <li> Nationality: </li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="span3 pricing-span" style="max-width: 300px !important;">
									<div class="widget-box pricing-box-small">
										<div class="widget-header header-color-blue">
											<h5 class="bigger lighter"></h5>
										</div>
                                                                               
										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="unstyled list-striped pricing-table">
													<li><?php echo $data['father_name']; ?></li>
													<li><?php echo $data['mother_name']; ?></li>
													<li><?php echo $data['spouse_name']; ?></li>
													<li><?php echo $data['cnic_no']; ?></li>
													<li><?php echo $data['gender']; ?></li>
													<li><?php echo $data['blood_group']; ?></li>
													<li><?php echo $data['marital_status']; ?></li>
													<li><?php echo $data['religion']; ?></li>
													<li><?php echo date("F j, Y ", strtotime($data['date_of_birth'])); ?></li>
                                                                                                        <li><?php echo $data['nationality']; ?></li>
													
												</ul>

												
											</div>

											<div>
												<a href="#" class="btn btn-block btn-small btn-primary">
													<span></span>
												</a>
											</div>
										</div>
                                                                            
									</div>
								</div>

								
							</div>
                                                                 	
                                                                                                       
                                                                                            <?php } ?>
                                                                                                    
                                                                                                    <?php foreach($dependent as $data){ 
                                                                                                if(!empty($data['dependent_id'])){
                                                                                                ?>
                                                                                                    
                                                                                                    <div class="span3">
									<div class="widget-box pricing-box">
										<div class="widget-header header-color-green">
											<h5 class="bigger lighter"></h5>
										</div>

										<div class="widget-body">
											<div class="widget-main">
                                                                                            
												<ul class="unstyled spaced2">
													<li>
														<i class="icon-ok green"></i>
                                                                                                                Dependant Name: <span style="color:#000;font-weight: bold;"><?php echo $data['dependent_name']; ?></span>
													</li>
                                                                                                        
                                                                                                        <li>
														<i class="icon-ok green"></i>
                                                                                                                Relationship: <span style="color:#000;font-weight: bold;"><?php echo $data['dependent_relation']; ?></span>
													</li>
                                                                                                        
                                                                                                        <li>
														<i class="icon-ok green"></i>
                                                                                                                Age: <span style="color:#000;font-weight: bold;"><?php echo $data['age']; ?></span>
													</li>
                                                                                                        
                                                                                                        <li>
														<i class="icon-ok green"></i>
                                                                                                                CNIC#: <span style="color:#000;font-weight: bold;"><?php echo $data['dependent_cnic']; ?></span>
													</li>
                                                                                                        
                                                                                                        <li>
														<i class="icon-ok green"></i>
                                                                                                                Address: <span style="color:#000;font-weight: bold;"><?php echo $data['dependent_address']; ?></span>
													</li>
                                                                                                        
												</ul>
                                                                                                
												<hr />
												
											</div>

											<div>
												<a href="#" class="btn btn-block btn-success">
													<span></span>
												</a>
											</div>
										</div>
									</div>
								</div>
                                                                         
                                                                           <?php } ?>                         
                                                                           <?php } ?>                         
                                                                                                    
													<!--/span-->
												</div><!--/row-->

												<div class="space-12"></div>

												
											</div><!--/#feed-->

											<div id="quali" class="tab-pane">
                                                                                            						<div class="profile-users clearfix">
													
												     <div class="row-fluid">
								<h3 class="header smaller lighter blue"></h3>
								<div class="table-header">
									Education
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Degree Title</th>
											<th>Specialization</th>
											<th class="hidden-480">Grade/CGPA</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Institute
											</th>
											<th class="hidden-480">Completion Year</th>
											
											
										</tr>
									</thead>
                                                                        <tbody>
                                                                        <?php  if( !empty($education[0]['degree_title'])) { foreach($education as $data){ ?>
									
										<tr>
												<td>
												<?php echo $data['degree_title']; ?>
											</td>
                                                                                        <td>
												<?php echo $data['major_subjects']; ?>
											</td>
                                                                                        <td>
												<?php echo $data['duration']; ?>
											</td>
											<td><?php echo $data['degree_institute_name']; ?></td>
											<td class="hidden-phone"><?php echo $data['degree_passing_year']; ?></td>

											
										</tr>


										
									
                                                                        <?php } } else { ?>
                                                                                 <tr>
								<td colspan="5" style="padding-left:10px;">No Record Found !</td>
							    </tr>
                                                                        <?php } ?>
                                                                                </tbody>
								</table>
							</div>
                                                                                                                                            
                                                                                                                                            
                                                                                   <div class="row-fluid">
								<h3 class="header smaller lighter blue"></h3>
								<div class="table-header">
									Certifications
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Title</th>
											<th>Institution</th>
											<th class="hidden-480">Completion Year</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Duration
											</th>
											<th class="hidden-480">Institution Address</th>
											
											
										</tr>
									</thead>
                                                                       
                                                                       
									<tbody>
                                                                              <?php if( !empty($certification[0]['training_title'])) { ?>
                                                                            <?php foreach($certification as $data){ ?>
										
                                                                            <tr>
												<td>
												<?php echo $data['training_title']; ?>
											</td>
                                                                                        <td>
												<?php echo $data['training_institute']; ?>
											</td>
                                                                                        <td>
												<?php echo $data['training_completion_year']; ?>
											</td>
											<td>6</td>
											<td class="hidden-phone"><?php echo $data['training_institute_address']; ?></td>

											
										</tr>

                                                                        <?php }
                                                                              } else { ?>
                                                                                <tr>
								<td colspan="5" style="padding-left:10px;">No Record Found !</td>
							    </tr>
                                                                        <?php } ?>

									</tbody>	
									
                                                                        
								</table>
							</div>
                                                                         
                                                                                                                                            
                                                                                                                                            
                                                                    <div class="row-fluid">
								<h3 class="header smaller lighter blue"></h3>
								<div class="table-header">
									Skills
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Name</th>
											<th>Years of Experience</th>
											<th class="hidden-480">Skill Level</th>
		
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php if(!empty($skills[0]['skill_name'])){ foreach($skills as $data){ ?>
									
										<tr>
												<td>
												<?php echo $data['skill_name']; ?>
											</td>
                                                                                        <td>
												<?php echo $data['years_of_experience']; ?>
											</td>
                                                                                        <td>
												<?php echo $data['skill_level']; ?>
											</td>
											
										</tr>
                                                                            <?php } } else { ?>
                                                                                <tr>
								<td colspan="3" style="padding-left:10px;">No Record Found !</td>
							    </tr>
                                                                        <?php } ?>
                                                                                </tbody>
								</table>
							</div>
                                                                                                                                            
                                                            <div class="row-fluid">
								<h3 class="header smaller lighter blue"></h3>
								<div class="table-header">
									Languages
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Language</th>
											<th>Category</th>
											<th class="hidden-480">Skill Level</th>
		
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php if(!empty($lang[0]['language'])){ foreach($lang as $data){ ?>
									
										<tr>
												<td>
												<?php echo $data['language']; ?>
											</td>
                                                                                        <td>
												<?php echo $data['language_category']; ?>
											</td>
                                                                                        <td>
												<?php echo $data['language_level']; ?>
											</td>
											
										</tr>


										
									
                                                                        <?php }  } else { ?>
                                                                                <tr>
								<td colspan="3" style="padding-left:10px;">No Record Found !</td>
							    </tr>
                                                                        <?php } ?>
                                                            </tbody>
								</table>
							</div>
                                                                                                                                            
												</div>

												<div class="hr hr10 hr-double"></div>

												
											</div><!--/#friends-->

											<div id="exp" class="tab-pane">
												<div class="row-fluid">
								<h3 class="header smaller lighter blue">Work Experience</h3>
								<div class="table-header">
									Employees Work Experience
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Company</th>
											<th>Business</th>
											<th class="hidden-480">Location</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Contact No.
											</th>
											<th class="hidden-480">Designation</th>
											<th class="hidden-480">Last Salary</th>
											<th class="hidden-480">Date From</th>
											<th class="hidden-480">Date To</th>
											<th class="hidden-480">Company Address</th>
											<th class="hidden-480">Leaving Reason</th>

										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php if(!empty($exp[0]['experience_to_date'])){ foreach($exp as $data){ ?>
									
										<tr>
												<td>
												<?php echo $data['company_name']; ?>
											</td>
											<td><?php echo $data['nature_of_business']; ?></td>
											<td class="hidden-480"><?php echo $data['company_location']; ?></td>
											<td class="hidden-phone"><?php echo $data['company_contact_no']; ?></td>

											<td class="hidden-480">
												<?php echo $data['job_title']; ?>
											</td>
                                                                                        <td class="hidden-480">
												<?php echo $data['last_drawn_salary']; ?>
											</td>
                                                                                        <td class="hidden-480">
												<?php echo $data['expereince_from_date']; ?>
											</td>
                                                                                        <td class="hidden-480">
												<?php echo $data['experience_to_date']; ?>
											</td>
                                                                                        <td class="hidden-480">
												<?php echo $data['company_address']; ?>
											</td>
                                                                                        <td class="hidden-480">
												<?php echo $data['reason_of_leaving']; ?>
											</td>
                                                                                       

											
										</tr>


										
									
                                                                        <?php }} else { ?>
                                                                                <tr>
								<td colspan="10" style="padding-left:10px;">No Record Found !</td>
							    </tr>
                                                                        <?php } ?>
                                                            </tbody>
								</table>
							</div>
											</div><!--/#pictures-->
                                                                                        
                                                                                        
                                                                                        
                                                                                        <!-------------reference------------------------>
                                                                                        <div id="ref" class="tab-pane">
                                                                                            
												<div class="row-fluid">
								<h3 class="header smaller lighter blue">Employee Reference</h3>
								<div class="table-header">
									Employee Reference
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Reference Name</th>
											<th>Company</th>
											<th class="hidden-480">Job Title</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Contact No.
											</th>
											<th class="hidden-480">Reference Type</th>
											<th class="hidden-480">Reference Address</th>
											
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php  if(!empty($reference[0]['reference_name'])){ foreach($reference as $data){ 
                                                                               
                                                                                ?>
									
										<tr>
												<td>
												<?php echo $data['reference_name']; ?>  
											</td>
											<td><?php echo $data['reference_company_business_name']; ?></td>
											<td class="hidden-480"><?php echo $data['reference_job_title']; ?></td>
											<td class="hidden-phone"><?php echo $data['reference_contact_no']; ?></td>

											<td class="hidden-480">
												<?php echo $data['reference_type']; ?>
											</td>
                                                                                        <td class="hidden-480">
												<?php echo $data['reference_address']; ?>
											</td>
                                                             	
										</tr>


										
									
                                                                            <?php } } else{ ?>
                                                                                <tr>
                                                                                   <td colspan="6" style="padding-left:10px;">No Record Found !</td>
                                                                                </tr>
                                                                        <?php } ?>
                                                                                </tbody>
								</table>
							</div>
											</div>
                                                                                        <!-------------/#reference------------------------>
                                                                                        
                                                                                        
                                                                                        
                                                                                        <!---#contact--->
                                                                                        <div id="contact" class="tab-pane">
                                                                                            
												<div class="profile-users clearfix">
													
												<div class="row-fluid">
								<div class="span3 pricing-span-header">
									<div class="widget-box transparent">
										<div class="widget-header">
											<h5 class="bigger lighter">General Contact Details</h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="unstyled list-striped pricing-table-header">
													<li>Mobile No. 1 </li>
													<li>Mobile No. 2</li>
													<li>Work Phone</li>
													<li>Home Phone</li>
													<li>Personal Email</li>
													<li>Work Email</li>
													<li>Permanent Address</li>
													<li>Temporary Address</li>
													<li>Correspondence Address</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="span3 pricing-span" style="max-width: 300px !important;">
									<div class="widget-box pricing-box-small">
										<div class="widget-header header-color-blue">
											<h5 class="bigger lighter"></h5>
										</div>
                                                                                    <?php foreach($contacts as $data){ ?>
										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="unstyled list-striped pricing-table">
													<li><?php echo $data['mobile_1']; ?></li>
													<li><?php echo $data['mobile_2']; ?></li>
													<li><?php echo $data['work_phone']; ?></li>
													<li><?php echo $data['permanent_contact_no']; ?></li>
													<li><?php echo $data['email_1']; ?></li>
													<li><?php echo $data['email_2']; ?></li>
													<li><?php echo $data['permanent_address']; ?></li>
													<li><?php echo $data['mailing_address']; ?></li>
													<li><?php echo $data['correspondence_address']; ?></li>

													
												</ul>

												
											</div>

											<div>
												<a href="#" class="btn btn-block btn-small btn-primary">
													<span></span>
												</a>
											</div>
										</div>
                                                                            <?php } ?>
									</div>
								</div>

								
							</div>
                                                                                                    
                                                                                                    
                                                                                                    <div class="row-fluid" style="margin-top:45px;">
								<div class="span3 pricing-span-header">
									<div class="widget-box transparent">
										<div class="widget-header">
											<h5 class="bigger lighter">Emergency Contact Details</h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<ul class="unstyled list-striped pricing-table-header">
													<li>Name of the person</li>
													<li>Relationship</li>
													<li>Phone</li>
													<li>Email</li>
													<li>Address</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="span3 pricing-span" style="max-width: 300px !important;">
									<div class="widget-box pricing-box-small">
										<div class="widget-header header-color-green">
											<h5 class="bigger lighter"></h5>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
                                                                                            <?php foreach($nominee as $data){ ?>
												<ul class="unstyled list-striped pricing-table">
													<li><?php echo $data['nominee_name']; ?></li>
													<li><?php echo $data['nominee_relation']; ?></li>
													<li><?php echo $data['nominee_phone']; ?></li>
													<li><?php echo $data['nominee_email']; ?></li>
													<li><?php echo $data['nominee_address']; ?></li>
													
													
												</ul>

												<?php } ?>
											</div>

											<div>
												<a href="#" class="btn btn-block btn-small btn-success">
													<span></span>
												</a>
											</div>
										</div>
									</div>
								</div>

								
							</div>
												<div class="hr hr10 hr-double"></div>

												
											</div>
                                                                                        <!---/#contact--->
                                                                                     
                                                                                        
                                                                                        
                                                                                        
                                                                                        
										</div>
                                                                                        
                                                                                        
                                                                                        <!----membership--->
                                                                                        
                                                                                        <div id="membership" class="tab-pane">
												<div class="row-fluid">
								<h3 class="header smaller lighter blue">Employee Membership</h3>
								<div class="table-header">
									Employee Membership
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Membership Title</th>
											<th>Duration</th>
											<th class="hidden-480">Organization</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												Institute Country
											</th>
											<th class="hidden-480">Membership Since</th>
											<th class="hidden-480">Last Renewal</th>
											<th class="hidden-480">Registration Number</th>
											<th class="hidden-480">Amount</th>
											<th class="hidden-480">Paid By</th>
											
										</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php if(!empty($member[0]['membership_title'])){ foreach($member as $data){ ?>
									
										<tr>
												
                                                                                <td><?php echo $data['membership_title']; ?></td>
                                                                                <td><?php echo $data['membership_duration']; ?></td>
                                                                                <td><?php echo $data['membership_institue_name']; ?></td>
                                                                                <td><?php echo $data['membership_country']; ?></td>
                                                                                <td><?php echo $data['membership_since']; ?></td>
                                                                                <td><?php echo $data['membership_last_renewed']; ?></td>
                                                                                <td><?php echo $data['membership_reg_no']; ?></td>
                                                                                <td><?php echo $data['membership_subscription']; ?></td>
                                                                                <td><?php echo $data['membership_subscription_paidby']; ?></td>	
										</tr>


										
									
                                                                        <?php }} else{ ?>
                                                                                <tr>
                                                                                   <td colspan="9" style="padding-left:10px;">No Record Found !</td>
                                                                                </tr>
                                                                        <?php } ?>
                                                                                </tbody>
								</table>
							</div>
                                                                                            
                                                                                            
                                                                                            <div class="row-fluid">
								<h3 class="header smaller lighter blue">Employee Licenses</h3>
								<div class="table-header">
									Employee Licenses
								</div>

								<table id="sample-table-2" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>License Title</th>
											<th class="hidden-480">Organization</th>

											<th class="hidden-phone">
												<i class="icon-time bigger-110 hidden-phone"></i>
												License Number
											</th>
											<th class="hidden-480">Issue Date</th>
											<th class="hidden-480">Expiry Date</th>
											</tr>
									</thead>
                                                                        <tbody>
                                                                            <?php if(!empty($license[0]['license_title'])){ foreach ($license as $row) {
                                                                            ?>
									<tr>
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


										
									
                                                                        <?php }} else{ ?>
                                                                                <tr>
                                                                                   <td colspan="5" style="padding-left:10px;">No Record Found !</td>
                                                                                </tr>
                                                                        <?php } ?>
                                                                       </tbody>
								</table>
							</div>
                                                                                            
											</div>
                                                                                        <!----/#membership--->
                                                                                        
                                                                                        
                                                                                        <!------correct info----->
                                                                                        
                                                                                        <div id="correction" class="tab-pane">
												<div class="row-fluid">
								<h3 class="header smaller lighter blue">Employee Information for Correction</h3>
								<div class="table-header">
									Employee Info
								</div>
                                                                <?php  if ($this->session->userdata('cor_status') != '1'){ ?> 
                                                                <form method="POST" action="<?php echo base_url(); ?>employees/correct_info" enctype="multipart/form-data">
                                                                <div class="row-fluid">
									<div class="span12">
									<h4 class="header green">Add Your CV , Correction And Suggestion </h4>
                                                                        <input type="hidden" name="emp_id" value="<?php echo $this->session->userdata('emp_id'); ?>"/>   
                                                                         <input type="file" name="cv" />
									<div class="widget-box">
										<div class="widget-header widget-header-small header-color-blue">  </div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<textarea class="span12" name="emp_correction" data-provide="markdown" rows="10"></textarea>
											</div>

											<div class="widget-toolbox padding-4 clearfix">
												<div class="btn-group pull-left">
													<button class="btn btn-small btn-info">
														<i class="icon-remove bigger-125"></i>
														Cancel
													</button>
												</div>

												<div class="btn-group pull-right">
                                                                                                    <button class="btn btn-small btn-purple" type="submit">
														<i class="icon-save bigger-125"></i>
														Save
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>                     
                                                                              
                                                                
								</div>
                                                                </form>
                                                                <?php } else { ?>
                                                               <div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Oh Sorry!
										</strong>
                                                                                  Your Old Suggestion are pending .......
										<br />
									</div>
                                                                <?php } ?>
								</div>
                                                                   
								</div>
                                                                                        
                                                                                        <!------#/correct info----->
                                                                                      
									</div>
								</div>
							</div>

							

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

				<!--/#ace-settings-container-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
<!--               	<div id="modal-wizard" class="modal hide" style="display:block;">
								<div class="modal-header" data-target="#modal-step-contents">
									<ul class="wizard-steps clearfix">
										<li data-target="#modal-step1" class="active">
											<span class="step">1</span>
											<span class="title">Validation states</span>
										</li>

										<li data-target="#modal-step2">
											<span class="step">2</span>
											<span class="title">Alerts</span>
										</li>

										<li data-target="#modal-step3">
											<span class="step">3</span>
											<span class="title">Payment Info</span>
										</li>

										<li data-target="#modal-step4">
											<span class="step">4</span>
											<span class="title">Other Info</span>
										</li>
									</ul>
								</div>

								<div class="modal-body step-content" id="modal-step-contents">
									<div class="step-pane active" id="modal-step1">
										<div class="center">
											<h4 class="blue">Step 1</h4>
										</div>
									</div>

									<div class="step-pane" id="modal-step2">
										<div class="center">
											<h4 class="blue">Step 2</h4>
										</div>
									</div>

									<div class="step-pane" id="modal-step3">
										<div class="center">
											<h4 class="blue">Step 3</h4>
										</div>
									</div>

									<div class="step-pane" id="modal-step4">
										<div class="center">
											<h4 class="blue">Step 4</h4>
										</div>
									</div>
								</div>

								<div class="modal-footer wizard-actions">
									<button class="btn btn-small btn-prev">
										<i class="icon-arrow-left"></i>
										Prev
									</button>

									<button class="btn btn-success btn-small btn-next" data-last="Finish ">
										Next
										<i class="icon-arrow-right icon-on-right"></i>
									</button>

									<button class="btn btn-danger btn-small pull-left" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>
								</div>
							</div>PAGE CONTENT ENDS-->
                                                    

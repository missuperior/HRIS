<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>HRIS</title>

<!--        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
        
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />


        <!--basic styles-->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
        
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />
        
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/dataTables.tableTools.css" />
        
        <!--inline styles related to this page-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
           
        <style>
          #step-container label{
           margin-bottom: 10px;
          }
          #step-container select option{
            padding: 5px;             
          }
          #increment_amount{
           background-image:url(http://localhost/hris/assets/images/pkr_icon.png);
	   background-repeat:no-repeat;
           padding-left: 40px;
           width: 200px;
          }
          #deduction_amount{
           background-image:url(http://localhost/hris/assets/images/pkr_icon.png);
	   background-repeat:no-repeat;
           padding-left: 40px;
           width: 200px;
          }
          
          #record_designation > #cm{
            display: none;
          }
          #record_designation > #do{
            display: none;
          }
          #record_designation > #rs{
            display: none;
          }
          #record_designation > #pd{
            display: none;
          }
	   
        </style>
        
    </head>
    
        <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a href="<?php base_url(); ?>dashboard" class="brand">
                        <small>
                          <?php if($this->session->userdata('company_name') == 'Daily Nai Baat'){ ?>  
                            <img src="<?php echo base_url();?>assets/avatars/nb_logo.png" />
                          <?php }else{?>
                            <img src="<?php echo base_url();?>assets/avatars/logo.png" width="40" height="40" border="1" />
                          <?php } ?>
                            Superior Group - Human Resource Information System
                        </small>
                    </a><!--/.brand-->

                    <ul class="nav ace-nav pull-right">
                       
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                              <!--<img style="margin-right: 10px;" src="<?php //echo base_url();?>assets/avatars/nb_logo.png" />-->
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php echo $this->session->userdata('username');?>
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
<!--                                <li>
                                    <a href="#">
                                        <i class="icon-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="icon-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>-->

                                <li>
                                    <a href="<?php echo base_url(); ?>employees/logout">
                                        <i class="icon-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!--/.ace-nav-->
                </div><!--/.container-fluid-->
            </div><!--/.navbar-inner-->
        </div>

        <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>
          
                    <!--[if !IE]>-->

<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->

        <script src="<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js"></script>



        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>
        
        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>

        <!--ace scripts-->

        <script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/ace.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>        
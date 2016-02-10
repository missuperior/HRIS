<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>HRIS - Login</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--basic styles-->

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css" />

    <!--[if IE 7]>
      <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!--page specific plugin styles-->

    <!--fonts-->

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

    <!--ace styles-->

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-responsive.min.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />

    <!--[if lte IE 8]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!--inline styles related to this page-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

  <body class="login-layout">
    <div class="main-container container-fluid">
      <div class="main-content">
        <div class="row-fluid">
          <div class="span12">
            <div class="login-container">
              <div class="row-fluid">
                <div class="center">
                  <h1>
                    <i class="icon-leaf green"></i>
                    <span class="red">The</span>
                    <span class="white">HRIS</span>
                  </h1>

                </div>
              </div>

              <div class="space-6"></div>

              <div class="row-fluid">
                <div class="position-relative">
                  <div id="login-box" class="login-box visible widget-box no-border">
                    <div class="widget-body">


                      <div class="widget-main">
                        <h6 style="color:red">
                        <?php echo $this->session->flashdata('error');?>                        
                        </h6>
                        
                        <h4 class="header blue lighter bigger">
                          <i class="icon-coffee green"></i>
                          Enter Username and Password
                        </h4>

                        <div class="space-6"></div>

                        <?php echo form_open('hris/hris_login');?>
                          <fieldset>
                            <label>
                              <span class="block input-icon input-icon-right">
                                <input type="text" name="username" class="span12" placeholder="Username" />                                
                                <i class="icon-user"></i>
                                <h6 style="color:red; margin: 0px;"><?php echo form_error('username'); ?></h6>
                              </span>
                            </label>

                            <label>
                              <span class="block input-icon input-icon-right">
                                <input type="password" name="password" class="span12" placeholder="Password" />
                                <i class="icon-lock"></i>
                                <h6 style="color:red; margin: 0px;"><?php echo form_error('password'); ?></h6>
                              </span>
                            </label>

                            <div class="space"></div>

                            <div class="clearfix">

                              <button class="width-35 pull-right btn btn-small btn-primary">
                                <i class="icon-key"></i>
                                Login
                              </button>
                            </div>

                            <div class="space-4"></div>
                          </fieldset>
                        
                        <?php form_close(); ?>


                      </div><!--/widget-main-->


                    </div><!--/widget-body-->
                  </div><!--/login-box-->



                </div><!--/position-relative-->
              </div>
            </div>
          </div><!--/.span-->
        </div><!--/.row-fluid-->
      </div>
    </div><!--/.main-container-->        

  </body>
</html>
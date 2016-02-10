<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>HRIS :=: Login</title>
    <meta name="description" content="Custom Login Form Styling with CSS3" />
    <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="../favicon.ico"> 
    
    <?php if($company_info[0]['css_type']=='green') { ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style_green.css" />
    <?php }else { ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
    <?php }?>
   
    <script src="<?php echo base_url(); ?>assets/js/modernizr.custom.63321.js"></script>
    <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
  </head>
  <body>
    <div class="container">

      <div id="header">
        <a href="#"><img src="<?php echo base_url().$company_info[0]['image_path'];?>" />
        
        </a>
<!--          <h1 style="color:#fff"><?php echo $company_info[0]['company_name'];?></h1>-->
      </div>
      <div class="clr"></div>
      <a href="landing.php"></a>
      <div id="middlearea">
        
        <section class="main">
          <?php echo form_open('hris/hris_login', array('class' => 'form-1')); ?>
          <!--				<form class="form-1">-->
          
          <span style="color: red;"><?php echo $this->session->userdata('error'); ?></span>
          <p class="field">
            <input type="text" name="username" id="username" placeholder="Username">
            <i class="icon-user icon-large"></i>
          <h6 style="color:red; margin: 0px;"><?php echo form_error('username'); ?></h6>
          </p>
          <p class="field">
            <input type="password" name="password" id="password" placeholder="Password">
            <i class="icon-lock icon-large"></i>            
          <h6 style="color:red; margin: 0px;"><?php echo form_error('password'); ?></h6>
          </p>
          <p class="submit">
            <button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
          </p>

          <?php form_close(); ?>
        </section>
      </div>
      <div class="clr"></div>
      <div id="footer">
        <p class="pone">Copyright © <?php echo date('Y'); ?> . All rights reserved</p>
        <p class="ptwo">Powered by <a href="#">Superior Solutions</a></p>
      </div>
    </div>
  </body>
</html>
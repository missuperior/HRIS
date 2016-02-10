<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Employee Login Screen</title>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/logins/css/style.css">
    <style>
        #header{
            padding: 15px;
            background-color: #057c7f;
            width: 100%;
            text-align: center;
        }
        
        #footer{
            position: absolute;
            top: 80%;
            background-color: #057c7f;
            height: 170px;
            width: 100%;
        }
        
        .pone{
            text-align: center;
            font-weight: bold;
            color: #fff;
            padding: 30px;
        }
        
        .ptwo{
            text-align: center;
            font-weight: bold;
            color: #fff;
         
        }
    </style>
  </head>

  <body>
      
      
              <div id="header">
                  
        <a href="#"><img src="<?php echo base_url(); ?>assets/images/logo.png" /></a>
                  
      </div>
      
          

    <div class="wrapper">
	<div class="container">
       
            
		<h1>Welcome</h1>
                <div style="text-align: center;color:#fff;font-weight: bold;"><?php echo $this->session->userdata('error', 'Please Provide Correct Credentials'); $this->session->unset_userdata('error');?></div>
		
                <form class="form" method="post" action="<?php echo base_url(); ?>employees/login_confirm">
			<input type="text" name="email" placeholder="Email Here">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="submit" id="login-button">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
      
<div id="footer">
    <p class="pone">Copyright © 2014 Superior university. All rights reserved</p>
        <p class="ptwo">Powered by <a href="#" style="color: #51C5A4; text-decoration: none;">Superior Solutions</a></p>
</div>    
  </body>
</html>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="<?php echo base_url(); ?>assets/logins/js/index.js"></script>

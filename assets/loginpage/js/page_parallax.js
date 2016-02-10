/*!

	Surmoi - Resume, CV, vCard, Portfolio Template
	Copyright (c) 2015, Subramanian 

	Author: Subramanian
	Profile: themeforest.net/user/FMedia/
	
	Version: 1.0.0
	Release Date: April 2015
	
*/	


"use strict";

		  
		
		
/* Initialize Typewritting Text effect */


			 
			  
			
$(document).ready(function(){

		
		
	/* Portfolio masonry plugi-n initilize */	
		$(function(){
	  
			var $container = $('.masonry_items');
			var $optionSets = $('#options .option-set'),
			  $optionLinks = $optionSets.find('a');
	
			  $optionLinks.on('click', function() {
				var $this = $(this);
				
				// don't proceed if already selected
				if ( $this.hasClass('selected') ) {
				  return false;
				}
				var $optionSet = $this.parents('.option-set');
				$optionSet.find('.selected').removeClass('selected');
				$this.addClass('selected');
				
				$container.find(".item").removeClass("selPopup");
				
				// make option object dynamically, i.e. { filter: '.my-filter-class' }
				   var options = {},
					  key = $optionSet.attr('data-option-key'),
					  value = $this.attr('data-option-value');
				  // parse 'false' as false boolean
				  value = value === 'false' ? false : value;
				  options[ key ] = value;
				  
				  $container.find(value).addClass("selPopup");
				  
				  if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
					// changes in layout modes need extra logic
					changeLayoutMode( $this, options )
				  } else {
					// otherwise, apply new options
					$container.isotope( options );

				  }
				
				return false;
			  });
		});
		
		
		
		
		
		// Email submit action			
		$(".mainForm #email_submit").on('click', function() {
								
			$('.mainForm #reply_message').removeClass();
			$('.mainForm #reply_message').html('')
			var regEx = "";	 
							
			// validate Name				
			var name = $(".mainForm input#name").val();  
			regEx=/^[A-Za-z .'-]+$/; 
			if (name == "" || name == "Name"  || !regEx.test(name)) { 
				$(".mainForm input#name").val(''); 
				$(".mainForm input#name").focus();  
				return false;  
			}
			
			// validate Email						  
			var email = $(".mainForm input#email").val();  
			regEx=/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;											
			if (email == "" || email == "Email" || !regEx.test(email)) { 
				$(".mainForm input#email").val(''); 
				$(".mainForm input#email").focus();  
				return false;  
			}  
			
			// validate comment			
			var comments = $(".mainForm textarea#comments").val(); 
			if (comments == "" || comments == "Comments..." || comments.length < 2) { 
				$(".mainForm textarea#comments").val(''); 
				$(".mainForm textarea#comments").focus();  
				return false;  
			}  
								
			var dataString = 'name='+ $(".mainForm input#name").val() + '&email=' + $(".mainForm input#email").val() + '&comments=' + $(".mainForm textarea#comments").val();									
			$('.mainForm #reply_message').addClass('email_loading');
			
			// Send form data to mailer.php 
			$.ajax({
				type: "POST",
				url: "php/mailer.php",
				data: dataString,
				success: function() {
					$('.mainForm #reply_message').removeClass('email_loading');
					$('.mainForm #reply_message').addClass('list3');
					$('.mainForm #reply_message').html("Mail sent sucessfully")
					.hide()
					.fadeIn(1500);
						}
					});
			return false;				
		});	
				
				
		
	
			
			
});	

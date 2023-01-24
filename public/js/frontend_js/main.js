	$(document).ready(function() {

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					
				},

				username: {
					required: true,					
					remote:"/check-username"					
				},

				pass: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#pass"
				},
				email: {
					required: true,
					email: true,
					remote:"/check-email"					
				},
				
				agree: "required"
			},

			messages: {				
				name:"please enter Your name",
				password:{ 
					required: "Please enter a password",
					minlength: "Your password must consist of at least 5 characters"
				},

				username:{
					required:"Please Enter your User name",
					remote:"user name already Exist"
				},
				email:{
					required:"Please enter a valid email address",
					email: "Please Enter a valid email Address",
					remote:"Email Already Exist"
				},
				
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				
				agree: "Please accept our policy",
				 
			}
		});		

			// validate dating form on keyup and submit
			$("#msform").validate({
				rules: {
					dob: {
						required: true
						
					},
					gender: {
						required: true
						
					},
					height: {
						required: true
						
					},
					marital_status: {
						required: true
											
					},
					about_myself:{
						required:true,
						minlength:20
					},
					partner_details:{
						required:true,
						minlength:20	
					}					
					
				},
	
				messages: {				
					dob: "Please Enter Your Date of Birth",
					gender:"Please Select Your Gender",
					height:"Please Select Your Height",
					marital_status:"Please choose your Status", 

					about_myself:{
						required: "Please provide your details",
						minlength: "Your details mustbe lengthy 20 characters long"
					},
					about_partner:{
						required: "Please provide your Partner details",
						minlength: "Your details mustbe lengthy 20 characters long"
					}				
					 
				}
			});	

	$(".deleteAction").click(function() {
		var Action = $(this).attr('rel');
		var deleteRoute = $(this).attr('rel1');		
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: true,
			dangerMode: true
		},
			function() {
				window.location.href="/"+deleteRoute+"/"+action;
			});
	});		
		
	
	});
	
	
<?php session_start();

include('header_footer/header.html');

?>

<div class="container">
	<div id="calendar" >

		<style>

			#calendar {
				max-width: 900px;
				margin: 0 auto;
			}

		</style>

		<div id='calendar'></div>
		<div id="msg"></div>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src='Style/js/fullcalendar.min.js'></script>
		<script>

			$(document).ready(function() {
				
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today ',
						center: ' title    ',
						right: ' month, agendaWeek ,agendaDay'
					},
					defaultDate: '2016-05-12',
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					events: {
					        url: 'php/calendar.php',
					        type: 'POST',
					        error: function() {
					            alert('There was an error while fetching events!');
					        },
					        color: '#07889b',   // a non-ajax option
					        textColor: 'white' // a non-ajax option
					    },
					timeFormat: 'H(:mm)' // uppercase H for 24-hour clock



					
	
				});

				//customize values to suit your needs.
			var max_file_size 		= 8048576; //maximum allowed file size
			var allowed_file_types 	= ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg']; //allowed file types
			var message_output_el 	= 'output'; //ID of an element for response output
			var loadin_image_el 	= 'loading-img'; //ID of an loading Image element

			//You may edit below this line but not necessarily
			var options = { 
				//dataType:  'json', //expected content type
				target: '#' + message_output_el,   // target element(s) to be updated with server response 
				beforeSubmit: before_submit,  // pre-submit callback 
				success: after_success,  // post-submit callback 
				resetForm: true        // reset the form after successful submit 
			}; 

			$('#upload_form').submit(function(){
				$(this).ajaxSubmit(options); //trigger ajax submit
				return false; //return false to prevent standard browser submit
			}); 

			function before_submit(formData, jqForm, options){
				var proceed = true;
				var error = [];	
				/* validation ##iterate though each input field
				if you add extra text or email fields just add "required=true" attribute for validation. */
				$(formData).each(function(){ 
					
					//check any empty required file input
					if(this.type == "file" && this.required == true && !$.trim(this.value)){ //check empty text fields if available
						error.push( this.name + " is empty!");
						proceed = false;
					}
					
					//check any empty required text input
					if(this.type == "text" && this.required == true && !$.trim(this.value)){ //check empty text fields if available
						error.push( this.name + " is empty!");
						proceed = false;
					}
					
					//check any invalid email field
					var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
					if(this.type == "email" && !email_reg.test($.trim(this.value))){ 
						error.push( this.name + " contains invalid email!");
						proceed = false;          
					}
					
					//check invalid file types and maximum size of a file
					if(this.type == "file"){
						if(window.File && window.FileReader && window.FileList && window.Blob){
							if(this.value !== ""){
								if(allowed_file_types.indexOf(this.value.type) === -1){
									error.push( "<b>"+ this.value.type + "</b> is unsupported file type!");
									proceed = false;
								}
				
								//allowed file size. (1 MB = 1048576)
								if(this.value.size > max_file_size){ 
									error.push( "<b>"+ bytes_to_size(this.value.size) + "</b> is too big! Allowed size is " + bytes_to_size(max_file_size));
									proceed = false;
								}
							}
						}else{
							error.push( "Please upgrade your browser, because your current browser lacks some new features we need!");
							proceed = false;
						}
					}
					
				});	
				
				$(error).each(function(i){ //output any error to element
					$('#' + message_output_el).html('<div class="error">'+error[i]+"</div>");
				});	
				
				if(!proceed){
					return false;
				}
				
				$('#' + loadin_image_el).show();
			}

			//Callback function after success
			function after_success(data){
				$('#' + message_output_el).html(data);
				console.log(data);
				$('#' + loadin_image_el).hide();
			}

			//Callback function to format bites bit.ly/19yoIPO
			function bytes_to_size(bytes){
			   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
			   if (bytes == 0) return '0 Bytes';
			   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
			   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
			}

				
			});

		</script>
	</div>

	<div id="invite">
		<h2>Invites</h2><br/>
		<div class="container" id = "event1">	
			<div class="row">
				
				<div class="col-xs-8">
					<a href="events.php">
						<p> Super Amazing Gamenight</p>
						<p>Steve's House</p>
						<p>16:30-23:30</p>
					</a>
					<a href="#" class="btn btn-success">Join</a>
					<a href="#" class="btn btn-danger">Decline</a>
				</div>
				<div class="col-xs-4" id="pic1">
					<a href="events.php"><img src="Style/Images/members.png" alt="" style="width:80px; height: 70px; margin-right: 60px; margin-left: -40px;"></a>
					<p>5</p>
				</div>
				
			</div>
		</div>
		<br/><br/><br/>
	</div>

	<div id="createEvent">
		<form class="form-horizontal" id="newEvent" >
			<fieldset>

			<!-- Create Event Form -->
			<div class="col-xs-8">
				<legend>Create Event</legend>
			</div>
			<!-- <div class="col-xs-2"><a href="#" id="eventCal" class="addEvent" disabled><span class="glyphicon glyphicon-ok"></span></a></div> -->
			

			<!-- Friends List -->
			<div class="form-group row">
			  
			 <div class="col-xs-12">

			  	<!-- Options should be autopopulated from friendlist database of user -->
			  	<div id="Eventsuccess"></div>
			  	<fieldset>
			  		<label>Select the special people to invite:</label>
			    	<select id="members" name="member" class="form-control" multiple="multiple" data-native-menu="false">
						<option value="1">Dave</option>
			      		<option value="2">John</option> 
			      		<option value="3">Shaily</option> 
			      		<option value="4">Kelvin</option> 
			      		<option value="5">Andrew</option> 
			      		<option value="6">Liana</option> 
			      		<option value="7">Arya</option> 
			    	</select>
			    </fieldset>
			  </div>
			  
			  
			</div>


			<!-- Event Name-->
			<div class="form-group">
			  <div class="col-xs-12">
			  <input id="eventName" name="eventname" type="text" placeholder="Event name" class="form-control input-md" required=""/>
			    
			  </div>
			</div>

			<!-- Event Location-->
			<div class="form-group">
			  <div class="col-xs-12">
			  <input id="eventLocation" name="eventLocation" type="text" placeholder="Location" class="form-control input-md" required=""/>
			    
			  </div>
			</div>

			<!-- Event Date and Time -->
			<div class="form-group">
			  	<div class="col-xs-12">
			  		<div class="row">
			  			<div class="col-xs-5">
			  				<input type="date" id="datePicker"  class="form-control input-md" required/>
			  			</div>
			  			<div class="col-xs-2">
			  				<p>:</p>
			  			</div>
			  			<div class="col-xs-5">
			  				<input type="date" id="datePicker2"  class="form-control input-md" required/>
			  			</div>
			  		</div>
			  		
					
				</div>
			</div>
			<div class="form-group">
			  <div class="col-xs-12">
			  	
			    <div class="row">
			  			<div class="col-xs-5">
			  				<input type="text" id="timepicker1" class=" form-control input-md"  placeholder="Start Time(24hr)" required/>
			  			</div>
			  			<div class="col-xs-2">
			  				<p>:</p>
			  			</div>
			  			<div class="col-xs-5">
			  				<input type="text" id="timepicker2" class=" form-control input-md"  placeholder="End Time(24hr)" required/>
			  			</div>
			  		</div>
			  </div>
			</div>
			<button id="submitEvent" name="submit" class="btn btn-success">Make it</button>
			<a href="#" id ="reset" name="reset" type="reset">| Cancel</a>
			
			<br/><br/><br/><br/><br/>

			
			</fieldset>
		</form>

			<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
			 <script src="Style/js/createEvent.js"></script> -->
	</div>

	

	<div id="settings">
		
		<div id="menuSettings">
			<a href="#" id="mEditProfile" class="btn setting">Edit Profile</a>
			<a href="#" id="mChangePass" class="btn setting">Change Password</a>
			<a href="#" id="mEmailPref" class="btn setting">Email Preferences</a>
		</div>
		<hr/>

		<div id="editProfile">
			<h2>Edit Profile: </h2>
			<br/>
			
			<form id="profileUpdate">
				<a href="#changeProfilePic" style="width:260px;">Change Profile Picture</a><br/><br/>
				<!-- <input style="background-color: white" type="text" id="pic" name="pic" style="width:100%;"/><br/><br/> -->
				<!-- <label style="width:260px;">Change Cover Picture:  </label> -->
				<!-- <input style="background-color: white" type="text" id="coverPic" name="coverPic" style="width:100%;"/><br/><br/> -->
				<a href="#changeCoverPic" style="width:260px;">Change Cover Picture</a>
				<label style="width:260px;">Name: </label>
				<input type="text" id="name" name="name" style="width:100%;"/><br/><br/>
				<label style="width:260px;">Email: </label>
				<input type="email"id="email" name="email" style="width:100%;"/><br/><br/>
				<p>Make Account Private:</p>
		        <select style="background-color: white" id="private">
		        	<option>No</option>
					<option>Yes</option>
		        </select><br/><br/>
		          <div id="success"></div>
				<button id="submitChanges" name="submit" class="btn btn-success">Submit</button>
				<a href="#" id="rst" style="color:#ff0000">| Back</a>
				<br/><br/><br/>
			</form>
			<br/><br/><br/>
		</div>
		<div id="changePass">
			<h2>Change Password: </h2>
			<br/>
			<form id="passUpdate">
				<label style="width:260px;">Old Password: </label>
				<input type="password" name="name" style="width:100%;"/><br/><br/>
				<label style="width:260px;">New Password: </label>
				<input type="password" name="email" style="width:100%;"/><br/><br/>
				<label style="width:260px;">New Password Confirmation: </label>
				<input type="password" id="newPassword" name="username" style="width:100%;"/><br/><br/>
				<div id="passwordMessage"></div>
				<button id="changePass" name="submit" class="btn btn-success">Change Password</button>
				<a href="#" id="back" style="color:#ff0000">| Back</a>
				<br/><br/><br/>
			</form>
			<br/><br/><br/>
		</div>
		<div id="emailPref">
			<h3>Subscribe to:</h3><br/>
			<input type="checkbox"/> Reminder emails
			<p style="margin-left:20px; font-size: 90%;">Stay up to date with things you have missed</p><br/>
			<input type="checkbox"/> New emails
			<p style="margin-left:20px; font-size: 90%;">Find out first about new products</p><br/>
			<input type="checkbox"/> Research emails
			<p style="margin-left:20px; font-size: 90%;">Provide feedback and participate in research studies</p><br/><br/>
		</div>
		
	</div>

	
	<div id="friends">
		<h2>Friends</h2>
		<hr/>
		<div id="friendsList">
			<div class='row'>
			</div>

		<br/><br/><br/>
		</div>

		<br/><br/><br/>

		 
	</div>

	<!-- ====================== -->
			<div id="changeProfilePic" class="modalDialog1">
				
				<div id="upload-wrapper">
				    <div align="center">
				        <h3>Change Profile Picture:</h3>
				        <form action="profileProcess.php" method="post" enctype="multipart/form-data" id="upload_form">
				        <input name="image_file" type="file" required  /><br/>
				        <input type="submit" class="btn btn-success" value="Change" id="submit-btn" />
				        <img src="Style/Images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
				        </form>
				        <div id="output"></div>
				    </div>
				    <a href="#close" title="Close" class="close1">X</a>
				</div>
			</div>


			<div id="changeCoverPic" class="modalDialog1">
				
				<div id="upload-wrapper">
				    <div align="center">
				        <h3>Change Cover Picture:</h3>
				        <form action="coverProcess.php" method="post" enctype="multipart/form-data" id="upload_form">
				        <input name="image_file" type="file" required="true" /><br/>
				        <input type="submit" class="btn btn-success" value="Change" id="submit-btn" />
				        <img src="Style/Images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
				        </form>
				        <div id="output"></div>
				    </div>
				    <a href="#close" title="Close" class="close1">X</a>
				</div>
			</div>
<!-- ========================== -->
	</div>

	<div id="profile">
		
		<div class="jumbotron" id="j2">
			
		</div>
		<div class='bg-default row'>
                            <div class='col-xs-5'>
                                <a href='#' id='updateInfo'><span class= 'glyphicon glyphicon-pencil' style='font-size: 18px; margin-left: 53px;'><p>Edit<span></p></a>
                            </div>
                            <div class='col-xs-2'>
                            </div>
                            <div class='col-xs-5'>
                                <a href='#'><span class='glyphicon glyphicon-th-list' style='font-size: 18px; margin-left: 50px;'><br/></span><br/><p style='margin-left: 35px;'>Activities</p></a>
                            </div>
                            
           </div>
		<div class="container">
			<div class="row">
		        <div class="profile-header-container">   
		    		
		            <div id="infoProfile">
							
					</div>

		        </div> 
			</div>
			
		</div>

		
		<span></span>
	</div>





<?php include('header_footer/footer.html'); ?>	
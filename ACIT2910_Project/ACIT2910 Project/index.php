<?php session_start();

include('header_footer/header.html');

?>
<div id="login">
		<!-- LOGIN -->

		<form class="form-horizontal container" method="POST" action="php/check_login.php" id="Login">
			<fieldset>

				<!-- Login Form -->
				<div class="col-xs-4"></div>
				<div class="col-xs-4">
					<legend>Login</legend>
				</div>
				<div class="col-xs-4"></div>

				<!-- Login Username-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="user"></label>  
				  <div class="col-md-4">
				  <input id="user" name="user" type="text" placeholder="Username" class="form-control input-md" required="">
				    
				  </div>
				</div>

				<!-- Login Password-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="password"></label>
				  <div class="col-md-4">
				    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
				    <span class="help-block">Forget Password?</span>
				  </div>
				</div>

				<!-- Submit Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="submit"></label>
				  <div class="col-md-4">
				    <button id="loginSubmit" name="submit" class="btn btn-primary">Log in</button>
				  </div>
				  <a href="#createAccount">Create an Account</a>
				</div>

			</fieldset>
		</form>
	</div>

	<div id="createAccount" class="modalDialog">
		<a href="#close" title="Close" class="close1">X</a>
		<!-- SIGNUP -->
		<form style="text-align: center;" id="addUser">
			<fieldset>

				<!-- Create Form -->
				<h2 style="color: white">Come Join Us</h2><br/><br/>
				

				<div class="formStuff">
					<!-- <input id="addPic" name="addPic" type="file" placeholder="Add a Picture" required=""><br/><br/> -->
					<input id="addName" name="addName" type="text" placeholder="New Name" required=""><br/><br/>
					<input id="addEmail" name="addEmail" type="email" placeholder="New Email"  required=""> <br/><br/>
					<input id="addUsername" name="addUsername" type="text" placeholder="New Username" required=""> <br/><br/>
					<input id="addPassword" name="addPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" placeholder="New Password" required title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br/><br/>
					<span style="color: white">Gender</span> 
					<select name="gender" id="addGender" style="background-color: white">
						<option>Unspecified</option>
						<option>Female</option>	
						<option>Male</option>
					</select><br/><br/>
					<button id="submitUser" name="submit" class="btn btn-primary">Sign Me Up!</button>
					<button id ="reset" name="reset" type="reset" style="color:white">| Cancel</button>
					<div id="success"></div>
				</div>
				
			    

			</fieldset>
		</form>
	</div>

<?php
include "connect.php";
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$email=trim($_POST['email']);
	$password=md5($_POST['userpass']);
	$contactno=$_POST['number'];
	$status=1;
	$sql=mysqli_query($con,"insert into user(fullname,userEmail,password,contactNo,status) values('$fullname','$email','$password','$contactno','$status')");
	 
	echo '<script type="text/javascript"> alert("Registration successfull. Now You can login !")
			window.location.href="sign.php";
			</script>';
	
	
}
 


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
	<title> USER | Registration </title>
	<link rel="stylesheet"  href="css/index.css">
	    <script src="js/jquery.js"></script>
    <script src=" js/bootstrap.min.js"></script>
			<script>
			function userAvailability() {
				//$("#loaderIcon").show();
				jQuery.ajax({
				url: "chack_availability.php",
				data:'email='+$("#email").val(),
				type: "POST",
				success:function(data){
				$("#user-availability-status1").html(data);
				//$("#loaderIcon").hide();
				},
				error:function (){}
				});
				}
			</script>


</head>



<body style="background-image: url(img/3.jpeg);">
	<div class="div1">
		<form  method="post" enctype="multipart/form-data">
		
			<h2>Registration</h2>
			   
			   <div class="innerdiv">

			   		<br> 
					<input type="text" name="fullname" id="firstname" placeholder="Full Name" required="required" autofocus class="in" autocomplete="" onblur="inputAlphabet()"><br>
					<span id="p1" style="font-size:14px;color: red;"></span>
					<br><br>
					<script type="text/javascript">
function inputAlphabet() {
	var firstname = document.getElementById('firstname');
var alphaExp = /^[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/;
if (firstname.value.match(alphaExp)) {
	document.getElementById('p1').innerText = "";
return true;
} else {
document.getElementById('p1').innerText = "* Please use Alphabets only, don't left Whitespace at Start and End *";
firstname.focus();
return false;
}
}

		</script>
					<label>
					<input type="email" name="email" id="email" placeholder="User Id" autofocus  class="in" autocomplete="on" onkeyup="emailValidation()" onBlur="userAvailability()"><br>			
					<span id="user-availability-status1" style="font-size:14px;"></span></label>
					<br>
					<p id="p3"></p>
					<script type="text/javascript">
						function emailValidation() {
							var inputtext = document.getElementById('email');
var emailExp = /^[w-.+]+@[a-zA-Z0-9.-]+.[a-zA-z0-9]{2,4}$/;
if (inputtext.value.match(emailExp)) {
	document.getElementById('p3').innerText = "";
return true;
} else {
document.getElementById('p3').innerText = " * Please enter a valid email address *"; // This segment displays the validation rule for email.
inputtext.focus();
return false;
}
}

					</script><br>

					<input type="Password" name="userpass" placeholder="Password" required="required" autofocus class="in" autocomplete="" >
					<br><br><br>

					<input type="text" name="number" placeholder="Contact No." required="required" autofocus class="in" autocomplete="" maxlength="10" onkeypress="isInputNumber(event)"><br>
					<script type="text/javascript">
						function isInputNumber(evt)
						{
							var ch = String.fromCharCode(evt.which);
							if (!(/[0-9]/.test(ch))) {
								evt.preventDefault();
							}
						}
					</script>
					<br><br>
.
			 		<button   type="submit" name="submit" id="submit"  class="bu"> Register</button>
			 		<br><br>
		            <hr>

		            	<div class="sign" >
		                	Already Registered<br/>
		                	<a style="text-decoration: none;" href="sign.php">
		                   	Sign in
		                	</a>
		           	 	</div>
 
		       </div>

		</form>		
	</div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
				

</body>
</html>
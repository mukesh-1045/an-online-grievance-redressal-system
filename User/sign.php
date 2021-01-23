<?php
session_start();
error_reporting(0);
include("connect.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM user WHERE userEmail='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");

	echo '<script> alert("invalid id or password") </script>';
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
  		
  		.button {
  position: relative;
  background-color: blue;
  border: none;
  font-size: 16px;
  color: #ffff;
  padding: 5px;
  width: 200px;
  text-align: center;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.button:after {
  content: "";
  background: #90EE90;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px!important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}
  	</style>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> USER | Log In</title>
	<link rel="stylesheet"  href="css/sign.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body style="background-image: url(img/3.jpeg);">
	<div class="div1">
		<form  method="post"  enctype=""multipart/form-data"">
		
			<h2>Log In</h2>
			 	
			   <div class="innerdiv">

			   		<br> 
					
					<input type="email" name="username" placeholder="User Id" required="required"   autofocus  class="in" autocomplete="off">
					<span id="user-availability-status1" style="font-size:12px;"></span>
					<br><br>

					<input type="Password" name="password" placeholder="Password" required="required" autofocus class="in" autocomplete="" >
					<br><br>

					 <label >
		                
		                    <a  href="forgot.php" style="color: red; text-decoration: none;" > Forgot Password?</a>
		
		                
		            </label><br><br>

			 		<button  class="button" type="submit" name="submit"  class="bu" style="letter-spacing: 2px;"> Sign In</button>
			 		<br><br>
		            <hr>

		            	<div class="sign" >
		                	 Don't have an account yet?<br/>
		                	<a class="" href="index.php">
		                    Create an account
		                	</a>
		           	 	</div>

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
		</form>		
	</div>

</body>
</html>
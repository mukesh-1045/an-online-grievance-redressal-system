<?php
session_start();
error_reporting(0);
include("connect.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");

$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
echo '<script type="text/javascript"> alert("Invalid Password or Id !!!")
			window.location.href="index.php";
			</script>';
 
exit();

}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta ="viewport" content="width=device-width, initial-scale=1.0">
	<title>ADMIN | SIGN IN</title>
	<link rel="stylesheet"  href="css1/index.css">
 </head>
<body style="background-image: url(img/bg1.jpeg);">
	<!-- <div class="head">
		<ul> 
			<li>
				<a href="../user/index.php">Back To Portal</a>
			</li>
		</ul>
	</div> -->
	<div class="div1" >
		<form method="post" enctype="multipart/form-data">

			<div style="text-align: center;letter-spacing: 5px; height: 234px;">
				<h2>Sign In</h2>

				<div>
					<input type="text" name="username" placeholder="Username" style="">
				</div><br>

				<div>
					<input type="password" name="password" placeholder="Password">
				</div><br>

				<div class="innerdiv"><hr>
					<button type="submit" name="submit" id="bu" style="align-items: center; margin-left:10px;margin-top: 10px;" >Submit</button>
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
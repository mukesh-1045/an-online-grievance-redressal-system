<?php
session_start();
include('connect.php');

if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['password'])."' && username='".$_SESSION['alogin']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
echo "<script> alert('Password Changed Successfully !!'); </script>";
}
else
{
echo "<script> alert('Old Password not match !!'); </script>";
}
}
?>


<!DOCTYPE html>
<html>
<head >
	<title >CHANGE PASSWORD</title>
	<link rel="stylesheet"  href="css/ch_pass.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>

   <script type="text/javascript">
    var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirmpassword').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
  </script>
<?php include('side_bar.php');?>
</head> 
<body style="background-color: white;">
  <form method="post" enctype="multipart/form-data" style= "margin-top: 50px; margin-left: 400px;">
  <h1 style="font-family:'Alegreya'; margin-left: -50px;"><i class="fas fa-unlock"></i> Change Password</h1>
<div style="background-color: white; margin-right: 300px; margin-top: 40px;padding: 20px; border: 2px solid black; box-shadow: 4px 10px ">
<h2 <i class="far fa-user"></i> Admin Change Password</h2>
  <div class="c1">
      <label>Current Password 
            <input type="password" name="password" placeholder="Current Password" required="required"> 
      </label>
  </div>   
                <br><br>
  <div class="c2">
        <label> New Password
              <input type="password" name="newpassword"  placeholder="New Password" required="required"  id="password">
        </label>
  </div>
                <br><br>
  <div class="c3">
        <label > Confirm Password
              <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" required="required"
                                    onkeyup="check();" />
                                    <span id='message'></span> 
              </label>       
  </div>

                <br><br>
  <div style="padding-left:25% ">
                       <button type="submit" name="submit" class="btn">Submit</button>
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
<?php } ?>

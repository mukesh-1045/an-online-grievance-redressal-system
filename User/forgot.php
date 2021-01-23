<?php
session_start();
error_reporting(0);
include("connect.php");
if(isset($_POST['change']))
{
   $email=$_POST['email'];
    $contact=$_POST['contact'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM user WHERE userEmail='$email' and contactNo='$contact'");
$num=mysqli_fetch_array($query);
if($num>0)
{
mysqli_query($con,"update user set password='$password' WHERE userEmail='$email' and contactNo='$contact' ");
echo '<script type="text/javascript"> alert("Password Changed successfull. Now You can login !")
      window.location.href="sign.php";
      </script>';
  


}
else
{
 echo " <script>alert('invalid email or contact no');</script>";
 
}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> USER | Forgot Password </title>
	<link rel="stylesheet"  href="css/forgot.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


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
  <style type="text/css">
    .div1{

  border: 1px solid blue;
  
  
  text-align: center;
  color: white;
  background-color: blue;
  border-radius: 10px;
  border-bottom-left-radius: 0px;
  border-bottom-right-radius: 0px;
}
  </style>


</head>


<body style="background-image: url(img/3.jpeg);">

   <form method="post" enctype="multipart/form-data">


        <div style=" background-color: white; border: 2px solid black; margin-left: 350px;margin-right: 300px; margin-top: 130px; box-shadow: 4px 10px ; border-radius: 14px; padding-bottom: 50px">
        	<div class="div1">
             <h1 style="margin-left: 25px;font-family: sans-serif"> Forgot Password </h1></div>
             <h2 style="margin-left: 70px;font-family: sans-serif"> Enter you details below to reset your password:</h2>


            <div class="c1" style="margin-left: 200px">
	                        <!--  <label style="margin-left: 50px" >Email</label> -->
	                               <i class="fas fa-user"></i><input  type="Email" name="email" required="required" autocomplete="off" placeholder="Email" style="border: none;border-bottom: 1px solid black; outline: none; background: none; margin-left: 10px">
            </div>   
                                  <br>
            <div class="c2" style="margin-left: 200px">
	                        <!--  <label style="margin-left: 50px" > Contact No</label> -->
	                               <i class="fas fa-phone"></i><input type="text" name="contact" required="required" placeholder="Contact" autocomplete="off" style="border: none;border-bottom: 1px solid black; outline: none; background: none; margin-left: 10px" maxlength="10" onkeypress="isInputNumber(event)">
                                 <script type="text/javascript">
            function isInputNumber(evt)
            {
              var ch = String.fromCharCode(evt.which);
              if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
              }
            }
          </script>
            </div> 
                                  <br>  
            <div class="c3" style="margin-left: 200px">
                             <!-- <label style="margin-left: 50px"> New Password</label> -->
                                   <i class="fas fa-key"></i><input type="password" name="password" required="required" id="password" placeholder="Password" style="border: none;border-bottom: 1px solid black; outline: none; background: none; margin-left: 10px">
                              
            </div>
                                  <br>
            <div class="c4" style="margin-left: 200px">
                             <!-- <label style="margin-left: 50px"> Confirm Password </label> -->
                                   <i class="fas fa-unlock-alt"></i><input type="password" name="confirmpassword" id="confirmpassword" required="required" placeholder="Confirm Password" 
                                    onkeyup="check();" style="border: none;border-bottom: 1px solid black; outline: none; background: none; margin-left: 10px">
                                     <span id='message'></span> 
                                     
            </div>

                                   <br>
            <div style="padding-left:10% ">
                             <button type="button" name="submit" class="btn" style="margin-right: 10px"
                              onclick="window.location.href='sign.php'" >  Cancel
                             </button>

                             <button class="btn1" style="margin-left: 17px" type="submit" name="change" >change
                             </button>
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
        </div>

    </form>

</body>
</html>
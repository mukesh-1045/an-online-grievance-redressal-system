<?php session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{ ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> ADMIN | Dashboard </title>

  <link rel="stylesheet"  href="css/dashboard.css">
</head>
<body>
   <?php include("side_bar.php");?>
            <div class="blue-bg" style="text-align: center; width: 150px;">
              <img src="img/pending.png" style="padding: 1px; border-radius: 50%;border: 1px solid black;" >
              <div class="count" style=" font-family: sans-serif;"> 
                <?php               
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null");
$num1 = mysqli_num_rows($rt);
{?>
                  <h3><?php echo htmlentities($num1);?></h3>
                </div>
              <div class="title">pending</div>
            </div>
<?php } ?>

            <div class="orange-bg" style="text-align: center; width: 150px;">
              <img src="img/processing.png" style="padding: 1px; border-radius: 50%;">
              <div class="count" style=" font-family: sans-serif;" >
                <?php 
  $status="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
                  <h3><?php echo htmlentities($num1);?></h3>
                </div>
              <div class="title">processing</div>
            </div>
<?php } ?>

            <div class="yellow-bg" style="text-align: center; width: 150px;">
              <img src="img/solved.png" style="padding: 1px; border-radius: 50%;border: 1px solid black ">
              <div class="count" style=" font-family: sans-serif;">
                <?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?>
                  <h3><?php echo htmlentities($num1);?></h3>
                </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>              <div class="title">completed</div>
            </div>
<?php } ?> 
</body>
</html>
<?php } ?>
<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css1/side_bar.css">

</head>
<body>

<div class="sidenav">
  <button class="dropdown-btn">Manage Complaints 
    <i class="fa fa-caret-down"></i>
  </button>
   <div class="dropdown-container">
    <a href="notprocess-complaint.php">Not Process Yet Complaint
                      <?php
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status is null");
$num1 = mysqli_num_rows($rt);
{?>
  <b class="b"><?php echo htmlentities($num1); ?></b>
                      <?php } ?>
    </a>
    <a href="inprocess-complaint.php">Pending Complaint
                   <?php 
  $status="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="b"><?php echo htmlentities($num1); ?></b>
<?php } ?></a>
    <a href="closed-complaint.php">Closed Complaints
       <?php 
  $status="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where status='$status'");
$num1 = mysqli_num_rows($rt);
{?><b class="bg"><?php echo htmlentities($num1); ?></b>
<?php } ?></a>
  </div>
  <button class="dropdown-btn">Complaints as Users
    <i class="fa fa-caret-down"></i>
  </button>
   <div class="dropdown-container">
    <a href="Student Complaint.php">Student Complaint
                      <?php
                      $statu="Student";
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where usertype='$statu' ");
$num1 = mysqli_num_rows($rt);
{?>
  <b class="b"><?php echo htmlentities($num1); ?></b>
                      <?php } ?>
    </a>
    <a href="Teacher Complaint.php">Teacher Complaint
                   <?php 
  $statu="Teacher";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where usertype='$statu'");
$num1 = mysqli_num_rows($rt);
{ ?>
<b class="b"><?php echo htmlentities($num1); ?></b>
<?php } ?></a>
    <a href="Non-teaching Complaints.php">Non-teaching Complaints
       <?php 
  $statu="Non-teaching staff";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where usertype='$statu'");
$num1 = mysqli_num_rows($rt);
{?><b class="bg"><?php echo htmlentities($num1); ?></b>
<?php } ?></a>
 <a href="Parents Complaints.php">Parents Complaints
       <?php 
  $statu="Parents";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where usertype='$statu'");
$num1 = mysqli_num_rows($rt);
{?><b class="bg"><?php echo htmlentities($num1); ?></b>
<?php } ?></a>
 <a href="Others Complaints.php">Others Complaints
       <?php 
  $statu="Others";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints where usertype='$statu'");
$num1 = mysqli_num_rows($rt);
{?><b class="bg"><?php echo htmlentities($num1); ?></b>
<?php } ?></a>
  </div>
    <a href="dashboard.php">Dashboard</a>
  <a href="manage-users.php">Manage User</a>
  <a href="change_pass.php">Change Password</a>
  <a href="user-logs.php">User Login Log</a>
  <a href="r.php">Report</a>
  <a href="logout.php">Logout</a>
  
 
  
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

<script>

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html> 

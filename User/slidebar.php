<!DOCTYPE html>
<html>
<aside>
   
<head>
  <meta charset="utf-8">
  <title>DashBord</title>
  <link rel="stylesheet"  href="css/slidebar1.css">
</head>
<body>
    <div class="sidebar">
    <!-- <a href="#"><img src="img\b.png" style="margin-bottom: 20px;margin-top: 20px"></a> -->
    <?php
    session_start();
    error_reporting(0);
  include "connect.php";

  if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
   $query=mysqli_query($con,"select fullname,userPic from user where userEmail='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
                  <p ><a href="profile.php">
<?php $userphoto=$row['userPic'];
if($userphoto==""):
?>
<img src="img/b.png"   width="100" height="100" alt="Photo Size Is More Than 2MB Can't Be Displayed" >
<?php else:?>
  <img src="img/<?php echo htmlentities($userphoto);?>"   width="100" height="100" border-radius="50px" alt="Photo Size Is More Than 2MB Can't Be Displayed">

<?php endif;?>
</a>
</p>
    <h3 style="color: white;text-transform: uppercase;"><?php echo htmlentities($row['fullname']);?></h3>
                  <?php } ?>
                <?php } ?>
       <ul class="menu">
        <li class="active"><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="change_pass.php">Change Password</a></li>
        <li><a href="reg_comp.php">Make Complaint</a></li>
        <li><a href="complaint-history.php">Complaint History</a></li>
        <li><a href="logout.php">Log Out</a></li>
        </ul>
        
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.js">
        <script type="text/javascript">
          $(document).on('click','ul li a', function() {
              $(this).addClass('active').siblings().removeClass('active')
          })
        </script>
  </script>  
  
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
</aside>
</html>
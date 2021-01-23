<?php
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:sign.php');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$imgfile=$_FILES["image"]["name"];

$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));

$allowed_extensions = array(".jpg",".jpeg",".png",".gif",".JPG");

if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
$imgnewfile=md5($imgfile).$extension;
move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$imgnewfile);

$query=mysqli_query($con,"update user set userPic='$imgnewfile' where userEmail='".$_SESSION['login']."'");
if($query)
{
echo "<script> alert(' Profile photo Successfully !!');</script>";
}
else
{
echo" <script> alert('Profile photo not updated !!'); </script>";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>User | Change Pic</title>
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  </head>

   <?php include("slidebar.php");?>

  <body style="margin-left: 350px; background-color: #0982;}; ">

  
     
     
     
          	<h2 style="margin-top: 40px;"><i class="fas fa-user-edit"></i> Update  Profile Photo</h2>
          	
          	
          	
 <?php $query=mysqli_query($con,"select * from user where userEmail='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

  <h3 class="mb" style="text-transform: capitalize; margin-left: 50px;margin-top: 20px;"><i class="fas fa-user-tie"></i>&nbsp;&nbsp;<?php echo htmlentities($row['fullname']);?>'s Profile</h3>
    
                      <form  enctype="multipart/form-data"  method="post"  >







<div  style="margin-left: 50px;"><br><br>
<label >User Photo</label>
<div style="margin-left: 80px;" >
<?php $userphoto=$row['userPic'];
if($userphoto==""):
?>
<img src="img/b.png" width="256" height="256" alt="Photo Size Is More Than 2MB Can't Be Displayed" border="1px solid black" >
<?php else:?>
	<img src="img/<?php echo htmlentities($userphoto);?>" width="256" height="256" alt="Photo Size Is More Than 2MB Can't Be Displayed" border="1px solid black">

<?php endif;?>
</div>

</div>

<div style="margin-left: 50px;" ><br><br>
<label >Upload New Photo</label>
<div >
<input type="file" name="image"  required />
</div>

</div>







<?php } ?>

                          <div style="margin-left: -80px; margin-top: 40px;">
                           <div  style="padding-left:25%">
<button type="submit" name="submit" style="padding: 10px 50px;" class="button" >Submit</button>
</div>
</div>

                          </form>
                         
                          
          	
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
<?php } ?>

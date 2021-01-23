<?php
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
	{ 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$contactno=$_POST['contactno'];

$query=mysqli_query($con,"update user set fullName='$fname',contactNo='$contactno' where userEmail='".$_SESSION['login']."'");
if($query)
{
echo "<script>alert('Profile Successfully !!');</script>";
}
else 
{
echo "<script>alert('Profile not updated !!');</script>";
}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> USER | Profile </title>

	<link rel="stylesheet" type="text/css" href="css\pro.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet'>

</head>
<?php include("slidebar.php");?>

<body  style="background-color: white;">
 
<h2  style="font-family:'Alegreya'; margin-left: 320px;"> <i class="fas fa-user-tie"></i> Profile</h2>
 
<div style="margin-left: 370px; margin-right: 200px; background-color:gray; box-shadow: 4px 10px ">

<?php $query=mysqli_query($con,"select * from user where userEmail='".$_SESSION['login']."'");
	//$sql =$con->query("SELECT * FROM user WHERE userEmail = '".$_SESSION['login']."'");

 while($row=mysqli_fetch_array($query))
	//foreach($sql AS $row) 
	{
	 // echo "name: " . $row['fullname']. "gender: " . $row["userEmail"]. "dob " . $row["contactNo"]. " - email: " . $row["regDate"]. " - password: " . $row["updateDate"]. " - mob: " . $row["status"] ."img:".$row["userPic"] ;
	
 
 ?>
 <div class="as">  
 <h3 style="text-transform: capitalize;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($row['fullname']);?>'s Profile</h3>
 <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last Updated at :&nbsp;&nbsp;<?php echo htmlentities($row['UpdateDate']);?></h4>

<form method="post" enctype="multipart/form-data">
	<br>

	<div>
		<label class="col">Full Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['fullname']);?>" onblur="inputAlphabet()"  id="firstname"><br>
		<span id="p1" style="font-size:14px;color: red;"></span>
	</div><br><br>
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
	<div>
	<label class="col">User Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['userEmail']);?>" readonly >
	</div><br><br>
	<div>

	<label class="col">Contact No</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="contactno" required="required" value="<?php echo htmlentities($row['contactNo']);?> " maxlength="10" onkeypress="isInputNumber(event) ">
		<script type="text/javascript">
						function isInputNumber(evt)
						{
							var ch = String.fromCharCode(evt.which);
							if (!(/[0-9]/.test(ch))) {
								evt.preventDefault();
							}
						}
					</script>
	</div><br><br>

	<div>
		<label class="col">Register Date</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['regDate']);?>" readonly >
	</div><br><br>
	
	<div>
		<label class="col" style="margin-top: 0px;">User Photo</label>
		<div style="margin-left: 150px; margin-top: 0px;">
		<?php $userphoto=$row['userPic'];
if($userphoto==""):
?>
<img src="img\b.png" width="256" height="256" border="1px black" alt="Photo Size Is More Than 2MB Can't Be Displayed">
<a href="update-image.php" style="text-decoration: none;text-align: center; ">Change Photo</a>
<?php else:?>

		 <img src="img\<?php echo htmlentities($userphoto);?>" width="256" height="256" border="1px black" alt="Photo Size Is More Than 2MB Can't Be Displayed">
		 <a href="update-image.php" style="text-decoration: none;color: solid black">Change Photo</a>
	
<?php endif;?>
</div>
	</div><br><br> 

<?php } ?>


	<div style="margin-left: 200px;padding-top: 20px;">
		
			<button type="submit" name="submit" style="color: white;background-color: rgb(0,153,255);height: 35px;border-radius: 10px;width: 150px;">Submit</button>

	</div><br><br>

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

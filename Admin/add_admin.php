<?php 
include('connect.php');
error_reporting(0);

if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$pass=md5( $_POST['password'] );

	$sql=mysqli_query($con,"INSERT INTO admin(`username`,`password`) VALUES ('$username','$pass')");
	echo "$sql";
	if ($sql) {
		echo "<script> alert('inserted ');</script>";			
	}
	else{
		echo "<script> alert('not inserted');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta ="viewport" content="width=device-width, initial-scale=1.0">
	<title> admin | add admin</title>

</head>
<body>

	<div>
		
		<form method="post" enctype="multipart/form-data">

			<div>
				<h2>ADD ADMIN</h2>
				<div>
					<label>Username</label>
					<div>
						<input type="text" name="username" placeholder="Enter new Username">
					</div>
				</div>

				<div>
					<label>Password</label>
					<div>
						<input type="Password" name="password" placeholder="Enter new Password">
					</div>
				</div>
				<div>
					<input type="submit" name="submit">
				</div>

			</div>
		</form>
	</div>

</body>
</html>
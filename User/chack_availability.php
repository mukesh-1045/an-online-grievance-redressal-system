<?php 
require_once("connect.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	 
	    $query  = " SELECT `userEmail` FROM `user` WHERE userEmail='$email' ";
		$result =mysqli_query($con, $query );
 
		$count=mysqli_num_rows($result);
		// echo "<span style='color:green'>$count</span>";
		
if( $count > 0 )
{
	 echo "<span style='color:red'> Email already exists .</span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
} 
else
{
	echo "<span style='color:green'> Email available for Registration .</span>";
    echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>

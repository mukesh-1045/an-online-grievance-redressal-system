<?php
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{


if(isset($_POST['submit']))
{
$sdate=$_POST['startdate'];
$edate=$_POST['enddate'];

}
}
 ?>

 <!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: ;
  color: solid black;
}
</style>
	<?php include('side_bar.php');?>

	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>ADMIN | REPORT</title>

	<style type="text/css">
		th{
			border: 1px solid black;
			color: solid black;
			background-color: ;
		}
		td{
		border: 1px solid black;	
		}
	
		a {
			text-decoration: none;
			color: blue;
		}
	
	</style>
</head>
<body >
<div style="margin-left: 320px;">
	<div style="background-image: linear-gradient(to bottom left,lightblue,white);">
	<h2>Report</h2>
	<div>
	<hr>
	
	<form method="post" action="" enctype="multipart/form-data" style="">
		<label style="margin-left: 20px">From: 
		<input type="date" name="startdate" placeholder="enter the start date" style="">
		</label>
						
		<label style="margin-left: 20px">To: 
		<input type="date" name="enddate" placeholder="enter the last date"></label>
         &nbsp;&nbsp;&nbsp;&nbsp;	
         <button type="submit" name="submit" style=" background-color: white;color: black;border: 2px solid #4CAF50; width: 12%;height: 30px;">SHOW</button>
</form>
		<hr><br>

		
			

</div>
<div style=" background-image: linear-gradient(to bottom right, lightblue, white,grey); ">

		 <table cellpadding="10" cellspacing="0" id="customers" border="0"width="100%" style="border: 1px solid black; border-collapse: collapse;">
		 	<thead style="border: 1px solid black;">
		 	<tr style="border: 1px solid black;">
		 		<th>#</th>
		 		<th>Complaint number</th>
		 		<th>Complainant Name</th>
		 		<th>Reg date</th>
		 		<th>Status</th>
		 		<th>Action</th>
		 	</tr>
		 	</thead>
		 	<tbody>
		 		<?php

		 	$query=mysqli_query($con,"select tblcomplaints.*,user.fullname as name from tblcomplaints join user on user.id=tblcomplaints.userId  WHERE tblcomplaints.regDate BETWEEN '$sdate' AND '$edate' ORDER BY tblcomplaints.regDate DESC");	
		 		
	$cnt=0;	
while($row=mysqli_fetch_array($query))
{
$cnt=$cnt+1;	
?>

		 	<tr>
		 		<td><?php echo htmlentities($cnt);?></td>	
		 		<td><?php echo htmlentities($row['complaintNumber']); ?></td>
		 		<td><?php echo htmlentities($row['name']); ?></td>
		 		<td><?php echo htmlentities($row['regDate']); ?></td>
		 		<td align="center"><?php 
                                    $status=$row['status'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                      Not process yet
                                    <?php } else { ?>

                                   	<?php echo htmlentities($row['status']); ?></td>
                                   <?php } ?>

                </td>

		 		<td><button style="width: 90%; height: 60%;padding: 5px 7px; border-radius: 8px; color: blue; background-color: white;"> <a href="complaintd.php?cid=<?php echo htmlentities($row['complaintNumber']);?>"> view details</a></button></td>
		 	</tr>
		 	 
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
<?php } ?>
</tbody>
</table>
</div>

</body>
</html>
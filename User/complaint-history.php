<?php 
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?>



<!DOCTYPE html>
<html lang="en">
  <head>

 
<style type="text/css">
 table th{
    color: solid black;
    background-color: ;
  }
</style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/complaint-history.css">

    <title> USER | Complaint History</title>

  </head>

  <body style="background-color: #0982;">


<?php include("slidebar.php");?>
        <div >
            <h1 style="text-align: center;margin-left: 300px;">Your Complaint History</h1>
          <div style=" background-color: white; margin-left: 280px;margin-right: 20px;">
            <div style=" background-image: linear-gradient(to bottom right, lightblue, white,grey); ">
                      <div >
                          <section >
                            <table id="customers">
                              <thead>
                              <tr>
                                  <th>Complaint Number</th>
                                  <th>Reg Date</th>
                                  <th>last Updation date</th>
                                  <th >Status</th>
                                  <th>Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
  <?php 
  $query=mysqli_query($con,"select * from tblcomplaints where userId='".$_SESSION['id']."'");
  while($row=mysqli_fetch_array($query))
{
  ?>
                              <tr>
                                  <td align="center"><?php echo htmlentities($row['complaintNumber']);?></td>
                                  <td align="center"><?php echo htmlentities($row['regDate']);?></td>
                                 <td align="center"><?php echo  htmlentities($row['lastUpdationDate']);

                                 ?></td>
                                  <td align="center"><?php 
                                    $status=$row['status'];
                                    if($status=="" or $status=="NULL")
                                    { ?>
                                      <button type="button"  style=" background-color: white;color: black;border: 2px solid #008CBA; width: 80%;height: 30px;" >Not Process Yet</button>
                                   <?php }
 if($status=="in process"){ ?>
<button type="button"  style=" background-color: white;color: black;border: 2px solid #f44336; width: 80%;height: 30px;">In Process</button>
<?php }
if($status=="closed") {
?>
<button type="button" style=" background-color: white;color: black;border: 2px solid #555555; width: 80%;height: 30px;" >Closed</button>
<?php } ?>
                                   <td align="center">
                                   <a href="complaint-details.php?cid=<?php echo htmlentities($row['complaintNumber']);?>">
                      <button type="button" style=" background-color: white;color: black;border: 2px solid #4CAF50; width: 80%;height: 30px;"  >View Details</button></a>
                                   </td>
                                </tr>
                              <?php } ?>
                            
                              </tbody>
                          </table>
                          </section>
                  </div>
               </div>   
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
    
  </body>
</html>
<?php } ?>

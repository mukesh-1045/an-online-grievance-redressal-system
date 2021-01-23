<?php session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> USER | Complaint Details </title>

   <link rel="stylesheet" type="text/css" href="css\cmp_details.css">
  </head>

  <body style="margin-left: 300px;">

<?php include('slidebar.php');?>
   
          	<h1> Complaint Details</h1>
            <hr>

 <?php $query=mysqli_query($con,"select * from tblcomplaints where userId='".$_SESSION['id']."' and complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{?>
  <div class="del">
   	<div>
    <label><b>Complaint Number : </b></label><?php echo htmlentities($row['complaintNumber']);?> 
     </div><br>
        
        <div>      		 
        <label><b>Reg. Date : </b> </label> <?php echo htmlentities($row['regDate']);?>     
         </div><br>
          	 <div>          
        <label><b>Type of Complaint : </b> </label> <?php echo htmlentities($row['type']);?>     
         </div><br>
          <div>          
        <label><b>Complaint as : </b> </label> <?php echo htmlentities($row['usertype']);?>     
         </div><br>
          <div>
            <label><b>Subject of Complaint :</b></label> <?php echo htmlentities($row['noc']);?> 
          </div><br>

            <div> 
              <label ><b>File :</b></label>
              <?php $cfile=$row['complaintFile'];
                   if($cfile=="" || $cfile=="NULL")
                       {
                          echo htmlentities("File NA");
                        }
                    else{ ?>
                          <a href="complaintdocs/<?php echo htmlentities($row['complaintFile']);?>" target='_blank'> View File</a>
                        <?php } ?>
            </div><br>

                 <div>
                    <label ><b>Complaint Details :</b></label> <?php echo htmlentities($row['complaintDetails']);?> 
                  </div><br> 



<?php 
$ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>

                    <div>
                      <label ><b>Remark:</b></label>
                      <?php echo  htmlentities($rw['remark']); ?>&nbsp;&nbsp;  
                    </div><br>
                    
                      <div> 
                      <label><b>Remark Date:</b></label> <?php echo  htmlentities($rw['rdate']); ?> 
                      </div><br> 

                        <div>
                       <label ><b>Status:</b></label> 
                      <?php  echo  htmlentities($rw['sstatus']); ?>
                       </div><br>
            
                           <div> 
                            <?php } ?>      
                           <label ><b>Final Status :</b></label>
               
              <p style="color:red ; text-transform: uppercase; "><?php 

if($row['status']=="NULL" || $row['status']=="" )
{
echo "Not Process yet";
} else{
              echo htmlentities($row['status']);
}
              ?></p>
               
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


<?php } ?>
		</div>
  </body>
</html>
<?php } ?>

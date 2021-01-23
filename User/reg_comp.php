<?php
session_start();
error_reporting(0);
include('connect.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$type=$_POST['type'];
$noc=$_POST['noc'];
$complaintdetials=$_POST['complaindetails'];
$compfile=$_FILES["compfile"]["name"];
$usertype=$_POST['usertype'];


move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$compfile);
$query=mysqli_query($con,"insert into tblcomplaints(userId,type,usertype,noc,complaintDetails,complaintFile) values('$uid','$type','$usertype','$noc','$complaintdetials','$compfile')");


$sql=mysqli_query($con,"select complaintNumber from tblcomplaints  order by complaintNumber desc limit 1");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['complaintNumber'];
}
$complainno=$cmpn;
echo '<script> alert("Your complain has been successfully filled and your complaintno is  "+"'.$complainno.'")</script>';
}

?>



<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<title> USER | Register Complaint </title>
	<link rel="stylesheet" type="text/css" href="css\reg_comp1.css"> 
</head>
<body>
 
 <?php include("slidebar.php");?>
 <?php
           if(isset($_POST['submit'])) 
           {
             require 'PHPMailerAutoload.php';
             require 'critalcal.php';

                            $mail = new PHPMailer;
                             $noc=$_POST['noc'];
                             


                            // $mail->SMTPDebug = 3;                               // Enable verbose debug output

                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = EMAIL;                 // SMTP username
                            $mail->Password = PASS;                           // SMTP password
                            $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to

                            $mail->setFrom(EMAIL, 'MGM POLY');
                            $mail->addAddress(EMAIL1);     // Add a recipient
                             
                            $mail->addReplyTo(EMAIL1, 'PRINCIPAL SIR');
                            // $mail->addCC($_POST['email'], $_POST['name']);
                             
                            $mail->isHTML(true);                                  // Set email format to HTML

                            $mail->Subject = 'New Complaint';
                            $mail->Body    = "You have new complaint subjected as : ";
                            $mail->Body    .= addslashes(trim($_POST['noc']));
                           
                            // $mail->AltBody = $_POST['email'] ;

                            if(!$mail->send()) {
                                echo 'Message could not be sent.';
                                echo 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
                                // echo '<script> alert("Message has been sent")</script>';
                            }
                                       }
        ?>   
        <!-- <?php echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n"; ?> --> 

<h2 style="font-family:Times New Roman, Times, serif; "><i class="far fa-envelope"></i>   Registration</h2>

<form method="post" enctype="multipart/form-data" name="complaint">

<table style="margin-left: 400px" style="margin-right: 20px" >
  <tr>
    <th></th>
    <th></th>
   </tr>
  <tr>
     <td padding: 20px><label class="col">Who you are as per </label></td>
     <td><select name="usertype" required="required"  >
          <option value="Student">Student</option>
          <option value="Teacher">Teacher</option>
          <option value="Non-teaching staff">Non-teaching staff</option>
          <option value="Parents">Parents</option>
          <option value="Others">Others</option>

        </select> 
     </td>
   </tr>
     <tr>
     <td padding: 20px><label class="col">Type of Complaint</label></td>
     <td><select name="type" required="required"  >
          <option value="Administration">Administration</option>
          <option value="Academic">Academic</option>
        </select> 
     </td>
   </tr>
  <tr>
  	<td style="padding: 20px"><label class="col" >Subject of Complaint</label></td>
    <td><input type="text" name="noc"  value="" required="required" autofocus="" autocomplete="off"></td>
  </tr>
  
  <tr>
    <td><label class="cl">Complaint Details 
      (max 2000 words) </label></td>
    <td><textarea name="complaindetails" required="required" cols="10" rows="10"  maxlength="2000" autofocus="" autocomplete="off">
	  </textarea></td>
  </tr>
  
  <tr>
    <td style="padding: 20px"><label class="cl2">Complaint Related Doc(if any) </label></td>
    <td><input type="file" name="compfile"  value=""></td>
  </tr>
  
  <!-- <tr> 
    <td>
  </td>
  </tr> -->
  
  </table>

<div class="cl3" style="padding: 30px; align-items: center;margin-left: 300px;">
         <button type="submit" name="submit" style="color: white;background-color: rgba(51,53,53,1); height: 35px;border-radius: 10px;width: 150px;">Submit</button>
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

<?php
session_start();
$_SESSION['alogin']=="";
session_unset();
session_destroy();
$_SESSION['errmsg']="You have successfully logout";
echo '<script type="text/javascript"> alert("You have successfully logout!!!")
			
			</script>';
?>
<script language="javascript">
document.location="index.php";
</script>

<?php
include "../connection.php";
$alid=$_GET['id'];
//echo $alid;
$sql= mysqli_query($conn,"update apply_leave set status='Rejected' where alid='$alid'");
if($sql)
{
	//echo "successfully";
	echo "<script> alert('Rejected Apllied');</script>";
	echo "<script>window.open('all_applied_leave.php','_self')</script>";
	
}
else
{
	echo "something wrong";
}


?>
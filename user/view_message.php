<?php
include "../authentication/authentication.php";
?>
<?php
include "../authentication/arole.php";
?>
<?php
include "../connection.php";
if(isset($_POST['reply']))
{
	//echo "successfully";
	$mid=$_POST['messageid'];
	//echo $mid;
	$uid=$_POST['User_id'];
	//echo $uid;
	$m =mysqli_real_escape_string($conn,$_POST['replymessage']);
	$query=mysqli_query($conn,"insert into task_reply (reply,message_id,reply_by)values('$m','$mid','$uid') ");
	if($query)
	{
		//echo "successfully inserted";
		//echo "<script>alert('reply sent successfully');</script>";
		//unset($m);
		//session_destroy();
		//exist();
		//echo "<script> open('dashboaed.php',_'self');</script>";
		echo "<script> alert('successfully updation');</script>";
		//echo "<script>window.open('dashboard.php','_self');</script>";
		//echo "<script> alert('successfully updation');</script>";
		echo "<script>window.open('usertask.php','_self');</script>";
	
	
	}
	else
	{
		echo "something_error".mysqli_error();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
   
    <title> view_message </title>
<style>


p{
	font-size:20px;
	font-style:italic;
	
}
.navWidth
{
	background-color:teal;
	min-height:500px;
	padding-top:40px;
	 border-left:20px solid red;
    border-right:20px solid red;
	margin-top:60px;
	
	
	
}

.fixed-header , .fixed-footer
{
	width:100%;
	
}

	body{
	width:100%;
	overflow:auto;
	overflow-x:hidden;
	
}

a:hover
{
text-decoration:none;
	opacity:1;
	color:white;

	}
	a{
		color:white;
	}
.widthnav
{
	width:100%
}
textarea{
	
	border-bottom:2px solid black;
	background-color:teal;
}
.thover:hover
{
	background-image:linear-gradient( red,yellow);
}

</style>
<script>

</script>
</head>
<body>

 
<?php
include "header.php";
?>
 <div class=" container-fluid navWidth">
 
 <div class="row brd">
 <div class="col-lg-12">
 <div class="col-sm-3">
 <h5><b><i>Details Message<i/></b></h5>
</div>
 <?php
$messageid=$_GET['id'];
include"../connection.php";
$ia=$_SESSION['user_id'];

//echo $messageid;
$sql=mysqli_query($conn,"select * from task where t_id='$messageid'");
$numrow=mysqli_num_rows($sql);
$data=mysqli_fetch_assoc($sql);
 ?>
 
<div class="col-sm-12" style="color:white; padding:15px;">
<?php
echo $data['task'];
?></div>

<div class="col-sm-2">
<p><b>Reply:</b></p>

</div>
<div class="col-sm-10 " style="margin-left:100px;">

<form method="post" action="">
<input type="hidden" name="messageid" value="<?php echo $messageid; ?>" />
<input type="hidden" name="User_id" value="<?php echo $ia;?>" />

<textarea name="replymessage" rows="5" style="width:100%; background-color:#d9d9d9; padding:5px; border-bottom:2px solid red; " class="thover" placeholder="reply message...."  required></textarea>
 <center> <button type="submit" class="btn btn-primary " name="reply" style="border-bottom:2px solid red;"  > Submit Reply</button>
 <button type="reset" class="btn btn-secondary  " name="reset" style="border-bottom:2px solid red;" >Cancel</button></center>
</form>
</div>

</div>
</div>
</div>
 <footer class="fixed-footer">
<div class="row bg-dark">
<div class="col-lg-12 col-md-12 col-sm-12">
<p style="color:white; float:right;"> copyright to EMP.PVT.LTD</P>

</div>
</div>
</footer>
</div>


</body>
</html>
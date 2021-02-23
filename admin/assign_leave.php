
<?php
include "../authentication/authentication.php";
?>
<?php
include "../authentication/role.php";
?>
 <?php
 include"../connection.php";
 //$result='';
 if(isset($_POST['Submit']))
 {
	 
	 
    $emplist=$_POST['emp'];
	$vldfrm=$_POST['vldfrm'];
	$vldto=$_POST['vldto'];
	$cleave=$_POST['cleave'];
	$mleave=$_POST['mleave'];
	
	 //print_r($emplist);
	  $a =$_POST['assign'];
	  //echo $a;
	  foreach($emplist as $e){
	   $sql="insert into assign_leave(id,v_from,v_to,c_leave,m_leave,userid,assigned_by)values('','$vldfrm','$vldto','$cleave','$mleave','$e','$a')";
	   $query=mysqli_query($conn,$sql);
 }
if($query)
{
	//echo "insertion ";
	echo "<script> alert('leave assigned successfully');</script>";
	echo "<script>window.open('assign_leave.php','_self');</script>";
	//header('location:login.php');
	//echo"<script> window.open('task.php', '_self');</script>";
	//$result='leave assigned successfully';
}
else
{
	echo  "failed";
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
   
    <title> Assigne Employee Leave</title>
<style>


p{
	font-size:20px;
	font-style:italic;
	
}
.navWidth
{
	background-color:teal;
	padding-top:10px;
	 border-left:20px solid red;
     border-right:20px solid red;
	 margin-top:65px;
	
	
	
}
h4
{
color:white;	
}
.role{

	height:60px;
	
	margin-top:10px;
	padding-top:10px;
}
input[type=radio] {
    
	width:50px;
	height: 20px;
	
   
    
}
 a:hover
{
text-decoration:none;
	opacity:1;
	color:#000;

	}

nav a:hover
{
text-decoration:none;
	opacity:1;
	color:red;

	}
	a{
		color:white;
	}
h1
{
	margin:0;
	padding:0 0 20px;
	text-align:center;
	font-size:22px;
	
	
}
.login-box padding{
	margin:0px;
	padding:0px;
	font-weight:bold;
	
}
.heading
{
margin-left:45%;
margin-bottom:0.60em;
padding-top: 30px;
color:red;

}
.bor{
	border:5px solid red;
}

a{
	color:white;

}
body{
	width:100%;
	overflow:auto;
	overflow-x:hidden;
	}
.widthnav
{
	width:100%
}



.fixed-header , .fixed-footer
{
	width:100%;
		
}
.thover:hover
{
	background-image:linear-gradient( red,yellow);
}
placeholder:

</style>

</script>
</head>
<body>
<?php
include "header.php";?>
 <div class="container navWidth">
 <fieldset>
 <legend><b> Assigne Leave</b> &nbsp <button class="btn btn-primary" ><a href="all_leave.php" style="margin:5px;">All Leave</a></button> &nbsp <button class="btn btn-primary"> <a href="all_applied_leave.php"  style="margin:5px;">All Applied leave by Employee</a></button></legend>
 
    
  <form action="" method="post" name="empform" id="empform">
     
  <div class="form-group"  style="background-color:#d9d9d9; padding:10px;" >
     <label for="emp" class="" control-label> <b>Employee_list:</b></label>
	 
	
	 <?php

include "../connection.php";
$ttl=0;
$slctalusr=mysqli_query($conn, "select * from employee where role='employee'order by id DESC");
$countuser= mysqli_num_rows($slctalusr);

	// echo $countuser;
	while($data=mysqli_fetch_assoc($slctalusr))
	{
		//$ttl=$ttl+1;
		$i=$data['id'];
?>
      <div class="form-check-inline  " >
  <label class="form-check-label " > 
    <input type="checkbox" class="form-check-input" name="emp[]"  value='<?php echo $data['id']; ?>' checked=""/><?php echo $data['e_name']; ?>
  </label>
</div>


	<?php } ?>
</div>   
   <input type="hidden" name ="assign" value="<?php echo $_SESSION['user_id']; ?>">
	  <div class="form-group " style="background-color:#d9d9d9; padding:5px;">
	
      <label for="msg" class="col-lg-3" control-label> <b>Valid From:</b></label>
	  
	   <input type="date" name ="vldfrm" value="" class="form-control" required>
	  
  
 	
      <label for="msg" class="col-lg-3" control-label> <b>Valid To:</b></label>
	  
	   <input type="date" name ="vldto" value="" class="form-control" required>
	  
	
  </div>

  
	  <div class="form-group " style="background-color:#d9d9d9; padding:5px;">
	
      <label for="msg" class="col-lg-3" control-label> <b>Casual Leave</b></label>
	   <input type="text" name ="cleave" value="" placeholder="no of leave" class="form-control" required>
	 
 <label for="msg" class="col-lg-3" control-label> <b>Medical Leave</b></label>
	   <input type="text" name ="mleave" value="" placeholder="no of leave" class="form-control" required>
	 	 </div>
	  
	  
 <center> <button type="submit" class="btn btn-primary " name="Submit" >Submit</button>
 <button type="reset" class="btn btn-secondary  " name="reset" >Cancel</button></center>
</div>
</form>
</fieldset>
</div>


 <footer>
<div class="row bg-dark">
<div class="col-lg-12 col-md-12 col-sm-12">
<p style="color:white; float:right;"> copyright to EMP.PVT.LTD</P>
</div>

</div>
</footer>

</section>
</div>
</body>
</html>
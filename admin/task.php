
<?php
include "../authentication/authentication.php";
?>
<?php
include "../authentication/role.php";
?>
 <?php
 include"../connection.php";
 if(isset($_POST['Submit']))
 {
	 
	 $m= mysqli_real_escape_string($conn,$_POST['message']);
	 
    $emplist=$_POST['emp'];
	
	 //print_r($emplist);
	  $a =$_POST['assign'];
	  //echo $a;
	  foreach($emplist as $e){
	   $sql="insert into task(t_id,task,user_id,assigned_by)values('','$m','$e','$a')";
	   $query=mysqli_query($conn,$sql);
 }
if($query)
{
	//echo "insertion ";
	echo "<script> alert('message sent successfully');</script>";
	//header('location:login.php');
	echo"<script> window.open('task.php', '_self');</script>";
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
   
    <title> admin</title>
<style>


p{
	font-size:20px;
	font-style:italic;
	
}
.navWidth
{
	background-color:teal;
	padding-top:80px;
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
nav a:hover
{
text-decoration:none;
	opacity:1;
	color:red;

	}

a:hover
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
	position:relative;
	overflow-x:hidden;
}
.widthnav
{
	width:100%
}



.fixed-header , .fixed-footer
{
	width:100%;
		position:fixed;
	
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
 <div class="container-fluid navWidth">

 <fieldset>
 <legend><b> Assigne Task</b> <a href="all_task.php" class="btn btn-primary" style="margin:5px;">All Task</a></legend>
 
    
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
	
      <label for="msg" class="" control-label> <b>Message:</b></label>
  <textarea class="form-control thover" rows="10"  name="message"  placeholder="message/task" required></textarea> 
  </div>

  

 <center> <button type="submit" class="btn btn-primary " name="Submit" >Submit</button>
 <button type="reset" class="btn btn-secondary  " name="reset" >Cancel</button></center>
</div>
</form>
</fieldset>
</div>

<div class="container-fluid ">
 <footer>
<div class="row bg-dark">
<div class="col-lg-12 col-md-12 col-sm-12">
<p style="color:white; float:right;" class=""> copyright to EMP.PVT.LTD</P>
</div>

</div>
</footer>
</div>
</section>
</div>
</body>
</html>
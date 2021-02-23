<?php
include "../authentication/authentication.php";
?>
<?php
include "../authentication/role.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
   
    <title> Admin</title>
<style>



.navWidth
{
	background-color:teal;
	min-height:500px;
	 border-left:20px solid red;
     border-right:20px solid red;
	
	margin-top:65px;
	
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


.fixed-header , .fixed-footer
{
	width:100%;
	
	
	
}

a{
	
	

}
a:hover
{
text-decoration:none;
	opacity:1;
	color:#000;

	}
	a{
		color:white;
	}

body{
	width:100%;
	overflow:auto;
	overflow-x:hidden;
}
nav a:hover
{
   text-decoration:none;
	opacity:1;
	color:red;

	}

</style>
</head>

<body class="">

<?php
include "header.php";
?>



 <div class="container-fluid navWidth">
 <div class="row ">
  <div class="col-lg-12 col-md-12 col-sm-12 ">
  <center>
 <div class="col-sm-3"> <b>All Task</b></div>
 </center>
 <table class="table table-stript table-hover ">
 




 <tr>
 <td>Sr.</td>
 <td>Task</td>
 <td>Date</td>
 
<td>Action</td>
 </tr>


 
 <?php

include "../connection.php";
$ttl=0;
//$ia=$_SESSION['authentication'];
$ia=$_SESSION['user_id'];
$slctalusr=mysqli_query($conn, "select * from task");
$countuser= mysqli_num_rows($slctalusr);
if($countuser>0)
{
	// echo $countuser;
	while($data=mysqli_fetch_assoc($slctalusr))
	{
		$ttl=$ttl+1;
		$i=$data['t_id'];
		?>
	
	<tr>
 <td><?php echo $ttl;?></td>
 <td ><a href=" view_message.php? id=<?php echo $i ;?>" class="textcolor"><?php echo  substr($data['task'],0,20); ?></a></td>
 

<td><?php echo $data['date_time']; ?></td>
<td><a href=" view_message.php? id=<?php echo $i ;?>" class="textcolor">View</a></td>
 
 
 </tr>
 <br>

	<?php
	
	}
	 
}
else
{
	echo "no data found";
}
	
 ?>
</table>  
</div>
</div>
</div>

<div class="container-fluid bg-dark">
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
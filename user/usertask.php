<?php
include "../authentication/authentication.php";
?>
<?php
include "../authentication/arole.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
   
    <title> Task </title>
<style>


.navWidth
{
    background-color:teal;
	min-height:500px;
	padding-top:40px;
	margin-top:60px;
	
	 border-left:20px solid red;
    border-right:20px solid red;
	
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

.fixed-header , .fixed-footer
{
	width:100%;
	
}
a{
	color:white;
}
a:hover{
	text-decoration:none;
	color:red;
	opacity:1;
}




.textcolor
{
	color:black;
}	

body{
	width:100%;
	overflow:auto;
	overflow-x:hidden;
	
}	
</style>
<script>
</script>
</head>
<body>

 <?php
include "header.php";
?>

 <div class="container-fluid navWidth  ">
 <div class="row brd">
 <div class="col-lg-12">
 <fieldset>
 <legend><b> All Task List</b></legend>

 <table class="table table-stript table-hover tbl" cellspacing>
 <tr>
 <th>Sr.</th>
 <th>Task</th>
 <th>Date</th>
 
<th>Action</th>
 </tr>


 
 <?php

include "../connection.php";
$ttl=0;
//$ia=$_SESSION['authentication'];
$ia=$_SESSION['user_id'];
$slctalusr=mysqli_query($conn, "select * from task where user_id='$ia'");
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

 
 
 </fieldset>
 </div></div>
</div>
<section>
 <footer class="fixed-footer">
<div class="row bg-dark">
<div class="col-lg-12 col-md-12 col-sm-12">
<p style="color:white; float:right;"> copyright to EMP.PVT.LTD</P>
</div>
</div>
</footer>
</section>


</body>
</html>

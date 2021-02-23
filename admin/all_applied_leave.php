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
   
    <title> All Employee Leave</title>
<style>



.navWidth
{
	margin-top:65px;
	
	background-color:teal;
	min-height:500px;
	 border-left:20px solid red;
     border-right:20px solid red;
	
	
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
 <div class="col-sm-6"> <h3><i> <b>All Applied Leave lists</b></i></h3> </div>
 </center>
 <table class="table  table-striped table-hover table-borderless ">
 



<thead class="thead-dark">
 <tr>
 <th>Sr.</th>
 <th>Employee name</th>
 <th>Casual Leave</th>
 <th>Medical leave</th>
 <th> From</th>
 <th> To</th>
 
<th>Status</th>
<th>Leave Approved</th>

 </tr>

<thead>
 
 <?php

include "../connection.php";
$ttl=0;
//$ia=$_SESSION['authentication'];
$ia=$_SESSION['user_id'];
//echo $ia;
$slctalusr=mysqli_query($conn, "select * from apply_leave a inner join employee e on a.applyby=e.id ");
$countuser= mysqli_num_rows($slctalusr);
if($countuser>0)
{
	// echo $countuser;
	while($data=mysqli_fetch_assoc($slctalusr))
	{
		$ttl=$ttl+1;
		$i=$data['alid'];
		?>
	
	<tr>
 <td><?php echo $ttl;?></td>
 <td ><?php echo $data['e_name']; ?></td>
 

<td><?php echo $data['cleave']; ?></td>
<td><?php echo $data['mleave']; ?></td>
<td><?php echo $data['vlfrm']; ?></td>
<td><?php echo $data['vlto']; ?></td>
<td><?php echo $data['status']; ?></td>
<td><button class="btn btn-primary"><a href="applyapproved.php ? id=<?php echo $i ;?>" class="textcolor">Approved</a></button>&nbsp| &nbsp <button class="btn btn-danger"><a href="applyreject.php ? id=<?php echo $i ;?>" class="textcolor">Reject</a></button></td>
 
 
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